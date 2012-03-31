=== Featured Page Widget ===
Contributors: grandslambert
Donate link: http://plugins.grandslambert.com/featured-page-widget-donate
Tags: widget, page, feature, buttons, links, excerpt, shortcode
Requires at least: 2.8
Tested up to: 3.1
Stable tag: trunk

Allows you to feature pages on your sidebar using an excerpt of the page and a text or image link to the page.

== Description ==

Allows you to feature pages on your sidebar using an excerpt of the page and a text or image link to the page.

= Features =

* Feature posts for a selected category, or by selecting individual pages.
* Added support for custom templates - includes 4 different templates.
* Added support for custom post types.
* Added support for post thumbnails.
* Added an option to set what tags are allowed in excerpts.
* Supports loading pages with the WPML plugin (for multi-langauge sites).
* Set up a random featured page by selecting multiple pages on the widget form.
* Added option to hide the widget if only one page is selected and user is viewing that page.
* Allows multiple widgets each featuring a different page.
* Use the page title or enter your own title for each widget.
* Option to link the widget title to the page.
* Uses an excerpt of your page or predefined text stored in the "featured-text" custom field.
* Set a default excerpt length which you can override for each widget.
* Adds a text link under the content, or uses the image in the "featured-link" custom field to link to the page.
* Choose alignment of link text or image in widget.
* Add an image using the "featured-image" custom field and set the alignment in the widget.

= Languages =

This plugin includes the following translations. Translations listed with no translator were created by the plugin developer using Google Translate. If you can improve these, you can get your name listed here!

* Spanish
* French

== Installation ==

1. Upload `featured-page-widget` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Configure the default settings on the settings panel.
4. Add widgets to your sidebar.

== Changelog ==

= 2.2 - March 3rd, 2011 =

* Fixed an error in the widget form that prevented featuring selected pages.

= 2.1 - March 2nd, 2011 =

* Fixed an issue where the option to link the title to the post could not be turned off.
* Added support to select a category for the featured posts OR the old way of selecting individual posts (Category selection only allows one category. Patch submitted to WordPress to allow multiple selection.)
* Added Spanish and French translation files.

= 2.0 - February 25th, 2011 =

* Add a shortcode to display featured pages within posts and pages.
* Add templates to widget and shortcode layout to allow users to customize output.

= 1.7 - February 24th, 2011 =

* Fixed an issue that created an infinite loop if only one page was selected.
* Fixed some language file issues and added a new language file.

= 1.6 - February 19th, 2011 =

* Fixed an issue where language files would not load.
* Fixed an issue where widget would be hidden on the first page of a list regardless of number of pages selected.

= 1.5 - February 12th, 2011 =

* Added an option to display the post title in the content if the widget title has been set.
* Added an option to display multiple posts (at random) rather than just one.
* Added tag ID and classes to all blocks for styling support.

= 1.4 - Feburary 11th, 2011 =

* Cleaned up the code and fixed some internal links.
* Fixed the permalinks so they work for all post types.
* Fixed the left align source code so it spaces the image from the content correctly.
* Added support for loading pages with the WPML plugin.
* Added two customizable image sizes so you can customize the images for your widget.

= 1.3 - August 1st, 2010 =

* Added the ability to feature any post type, including custom types.
* Added support for post thumbnails on themes that support them.

= 1.2 - January 15th, 2010 =

* Fixed an issue on the Widget Form where defaults were always used.
* Added a "none" option for image alignment.
* Added a setting to allow user to indicate which tags are allowed in excerpts.
* Changed name from "Featured Page Widget" to "Feature Pages" to better fit in menus.
* Add support for language translation.

= 1.1 - December 18th, 2009 =

* Code cleanup and optimization.

= 1.0 - December 17th, 2009 =

* Fixed a bug to allow the plugin to work in Wordpress MU.

= 0.7 - October 19th, 2009 =

* Added a "Random" option by selecting multiple pages on the widget form. Will retain old settings without any updates.
* Added option to hide the widget if only one page is selected and user is viewing that page.
* Cleaned up some extra code left during debugging.

= 0.6 - October 16th, 2009 =

* Added basic instructions in the FAQ section and on the plugin settings page.
* Added the ability to include an image in the widget using custom fields.
* Image alignment and width added to default settings and to individual widget settings.
* Image is linked to the post.

 =0.5 - October 15th, 2009 =

* First release

== Upgrade Notice ==

= 2.2 =
If using widget to featured selected pages, you need to update and then edit your widgets.

= 2.1 =
Fixed some laugnage stuff and added a new feature.

= 2.0 =
No requirement to update - but some new features make the plugin more verstaile.

= 1.7 =
Fixes an infinite loop issue that affected widgets with only one page selected.

= 1.4 =
Fixes a couple of issues and cleans up the code.

= 1.3 =
Adds features from Wordpress 3.0.

= 1.1 =
Not a required upgrade, but more optimized code.

= 1.0 - Decmeber 17th, 2009 =
This version runs on Wordpress MU, no changes for standalone version.

== Frequently Asked Questions ==

= Can I set the text to use in the widget? =

Certainly. By default the plugin will create an excerpt from your page content in the length specified on the widget. However, if you would prefer to write different lead-in text, you can create a custom field with the name "featured-text". The plugin will then use the contents in the value for this custom field for use in the widget.

= Can I use a button or graphic for the post link? =

By default, the plugin uses the text set in the settings for the link in the widget. If you want to use an image instead, you will need to edit the actual page and either set a featured image or create a custom field for the featured page with the name "featued-link" and place the full URL of the image in the value field.

= How do I add an image to the widget? =

To add an image, you need to edit the page itself, not the widget, and set the featured image for the page, if your theme supports it, or add a cutom field named "featured-image" and place the full URL to the image in the value field.

= Can I have the widget feature a random page? =

As of version 0.7 you can now select multiple pages on the widget form and the widget will select a random page to feature with each page load. The widget will never display the current page as the featured page unless only one page is featured.

= Where can I get support? =

http://support.grandslambert.com/forum/featured-page-widget

== Screenshots ==

* Sample widget output.