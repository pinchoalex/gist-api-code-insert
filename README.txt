=== Gist API Code insert ===
Contributors: pinchoalex
Tags: Gist, Github, Code highlight
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Inserts Github Gist code directly in to your posts via shortcode without using js embed script

== Description ==

Unlike the standard embedding method that use script like this <script src="https://gist.github.com/..."></script>
to embed gist code, Gist API Code insert plugin inserts code directly in to your posts using simple shortcode and
highlights it with prism code highlighter.

**Examples**

Add all files from a gist:

	[apCI id="123456789"]

Add single file from a gist:

	[apCI id="123456789" file="filename.php"]

Add single file from a gist with raw file link:

	[apCI id="123456789" file="filename.php" raw="yes" ]

== Installation ==

1. Upload plugin files to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Where I can find shortcode button? =

* You can find shortcode button in your classic code editor`s tool bar.

== Screenshots ==

1. Plugin`s shortcode button in WP classic editor
2. Highlighted code example from gist api via shortcode

== Changelog ==

= 1.0.0 =

* Initial plugin release.