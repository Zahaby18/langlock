# Elementor WPML Independent

A helper plugin for users running WPML together with Elementor. It keeps the Elementor content of each language independent, so when you duplicate or translate a page, a Theme Builder template, or any Elementor template, the layout and content of one language never pull from or overwrite another (cross-translation sync).

## The problem it solves

When WPML and Elementor are used together, Elementor meta data often gets copied and synced across languages. As a result, editing the layout in one language can overwrite or pull in the layout of another, especially for Theme Builder and templates (`elementor_library`). This plugin prevents that sync so every language keeps its own independent design.

## Features

- Prevents cross-translation sync of Elementor meta for `elementor_library` (Theme Builder, templates, headers, footers, and similar).
- Sets the Elementor editor language to match the post being edited, so the editor does not pull content from another language.
- Works out of the box with no settings page. Just activate it.
- Theme independent. No need to add code to `functions.php`.

## Requirements

- WordPress 5.0 or newer
- PHP 7.0 or newer
- Elementor plugin
- WPML plugin (WPML Multilingual CMS and its related add-ons)

## Installation

1. Download the `elementor-wpml-independent.zip` file.
2. In your WordPress dashboard, go to Plugins, then Add New.
3. Click Upload Plugin, choose the `.zip` file, then click Install Now.
4. Once installed, click Activate.

No extra configuration is needed. The plugin starts working immediately after activation.

## Usage

After activation, keep working with Elementor and WPML as usual. When you translate or duplicate a page or a Theme Builder template, adjust the layout of each language as needed. Changes in one language will not overwrite another.

## Notes

- The plugin only limits sync within the Elementor context, so regular text translation through WPML keeps working normally.
- It is recommended to back up your site before making large changes to multilingual layouts.

## License

GPL-2.0-or-later

## Author

GenWork
