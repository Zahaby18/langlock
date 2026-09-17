# LangLock

Keep the Elementor layout of every language independent on a multilingual site.

LangLock is a small helper plugin for sites that run Elementor together with a multilingual plugin. When you duplicate or translate a page, a Theme Builder template, or any Elementor template, the layout and content of one language never pulls from or overwrites another language. This is usually called cross-translation sync, and it is the reason a translated header or footer sometimes shows the design of the wrong language.

## The problem it solves

When Elementor content is synced across languages, editing the layout in one language can overwrite or pull in the layout of another, especially for Theme Builder and library templates. LangLock blocks that sync so every language keeps its own independent design.

## Features

- Stops cross-language sync of Elementor meta, so each language keeps its own layout.
- Sets the Elementor editor language to match the post being edited, so the editor never loads content from another language.
- Works out of the box with no settings page. Activate it and it starts working.
- Theme independent. No code needed in `functions.php`.

## Requirements

- WordPress 5.0 or newer
- PHP 7.0 or newer
- Elementor (Elementor Pro for Theme Builder templates)
- WPML Multilingual CMS and its related add-ons

## Installation

1. Download `langlock.zip`.
2. In your WordPress dashboard, go to Plugins, then Add New.
3. Click Upload Plugin, choose the `.zip` file, then click Install Now.
4. Once installed, click Activate.

No configuration is needed. The plugin starts working right after activation.

## Usage

After activation, keep working with Elementor and your multilingual setup as usual. When you translate or duplicate a page or a Theme Builder template, adjust the layout of each language as needed. Changes in one language will not overwrite another.

## Notes

- The plugin only limits sync inside the Elementor context, so regular text translation keeps working normally.
- Back up your site before making large changes to multilingual layouts.

## License

GPL-2.0-or-later

## Author

GenWork

Elementor and WPML are trademarks of their respective owners. LangLock is an independent product and is not affiliated with, endorsed by, or sponsored by Elementor Ltd. or OnTheGoSystems.
