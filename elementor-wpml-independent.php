<?php
/**
 * Plugin Name:       Elementor WPML Independent
 * Description:        Mencegah cross-translation sync antar bahasa untuk Elementor (Theme Builder, Templates, dan page) saat digunakan bersama WPML, sehingga konten tiap bahasa berdiri sendiri.
 * Version:           1.0.0
 * Author:            GenWork
 * License:           GPL-2.0-or-later
 * Requires at least: 5.0
 * Requires PHP:      7.0
 */

// Cegah akses langsung.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// === WPML + Elementor: Prevent cross-translation sync (elementor_library ONLY) ===

if ( ! function_exists( '_is_elementor_library_context' ) ) {
    function _is_elementor_library_context( $meta_key, $post_id = null ) {
        if ( strpos( $meta_key, '_elementor' ) !== 0 ) {
            return false;
        }
        if ( $post_id && get_post_type( $post_id ) !== 'elementor_library' ) {
            return false;
        }
        if ( ! $post_id && isset( $_REQUEST['editor_post_id'] ) ) {
            $post_id = (int) $_REQUEST['editor_post_id'];
            if ( get_post_type( $post_id ) !== 'elementor_library' ) {
                return false;
            }
        }
        return true;
    }
}

add_filter( 'wpml_should_copy_post_meta', function ( $should_copy, $meta_key ) {
    if ( _is_elementor_library_context( $meta_key ) ) {
        return false;
    }
    return $should_copy;
}, 1, 2 );

add_filter( 'wpml_post_meta_key_is_copy_once', function ( $copy_once, $meta_key ) {
    if ( _is_elementor_library_context( $meta_key ) ) {
        return false;
    }
    return $copy_once;
}, 1, 2 );

add_filter( 'wpml_custom_field_values_for_post_signature', function ( $value, $meta_key ) {
    if ( _is_elementor_library_context( $meta_key ) ) {
        return null;
    }
    return $value;
}, 1, 2 );

add_action( 'wp_ajax_elementor_ajax', function () {
    if ( ! isset( $_REQUEST['editor_post_id'] ) ) {
        return;
    }

    $post_id = (int) $_REQUEST['editor_post_id'];
    if ( get_post_type( $post_id ) !== 'elementor_library' ) {
        return;
    }

    $post_lang = apply_filters( 'wpml_element_language_code', null, [
        'element_id'   => $post_id,
        'element_type' => 'post_elementor_library',
    ] );

    if ( $post_lang ) {
        do_action( 'wpml_switch_language', $post_lang );
    }
}, 0 );
