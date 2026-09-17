<?php
/**
 * Plugin Name:       LangLock
 * Description:       Keeps the Elementor layout of each language independent on multilingual sites. Translating or duplicating a page, a Theme Builder template, or any Elementor template never pulls from or overwrites the design of another language.
 * Version:           1.0.0
 * Author:            GenWork
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       langlock
 * Requires at least: 5.0
 * Requires PHP:      7.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Prevent cross-language sync of Elementor meta on multilingual sites.

if ( ! function_exists( 'langlock_is_layout_meta_context' ) ) {
    function langlock_is_layout_meta_context( $meta_key, $post_id = null ) {
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
    if ( langlock_is_layout_meta_context( $meta_key ) ) {
        return false;
    }
    return $should_copy;
}, 1, 2 );

add_filter( 'wpml_post_meta_key_is_copy_once', function ( $copy_once, $meta_key ) {
    if ( langlock_is_layout_meta_context( $meta_key ) ) {
        return false;
    }
    return $copy_once;
}, 1, 2 );

add_filter( 'wpml_custom_field_values_for_post_signature', function ( $value, $meta_key ) {
    if ( langlock_is_layout_meta_context( $meta_key ) ) {
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
