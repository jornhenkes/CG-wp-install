=== IE6 Upgrade Option ===
Contributors: Doc4, Free the Foxes
Donate link: http://www.doc4design.com/donate
Tags: ie6, internet explorer, internet explorer 6, ie6 warning, ie6 message, no ie6, no more ie6, ie6 upgrade, explorer upgrade, internet explorer upgrade, internet explorer message, ie6 close button, explorer destroyer, browser warning message, browser warning, ie7, ie8, opera, firefox, safari, chrome, google chrome, ie9, ie7, ie8,
Requires at least: 2.8
Tested up to: 3.1
Stable tag: 2.6


== Description ==

= Plugin URL =
http://www.doc4design.com/plugins/ie6-upgrade/

IE6 Upgrade Option utilizes the 25K script created by Free the Foxes: http://www.freethefoxes.com/ as a WordPress plugin. Originally this plugin utilized a smaller 7K script but it's limits had been met in terms of language support, ease-of-use and options for using the warning messages on browsers other than IE6 (refer to the ie6-upgrade-option.php file for instructions on multiple browser usage).

The warning message is displayed using a Lightbox effect that hovers over the page content. The idea is to display a warning message, simply and politely, informing the user that their browser is out of date while providing links to download newer, more optimal browser choices. Optional browser links included are: IE9, Firefox, Opera, Safari, and Chrome. While this plugin was originally intended for use with IE6 it has now been expanded, due to popular demand, to include a warning message capable of being displayed in any browser. Don't like Firefox? Simply adjust the FTF rating and ask your users to use IE8. This is not limited to a a single browser either, feel free to use the multi-browser version to display the warning in IE6, IE7 and Chrome simultaneously as a example.

The web page will remain visible through the transparent Lightbox and the user is given the option of closing the window, agreeing that their experience may be severely degraded or downloading a new browser. The javascript then installs a cookie preventing the window from appearing again. The script is loaded in the site footer in two ways: selectively (as in the case of the basic setup) or permanent (if desiring to use this for browsers other than IE6).

To change the text to reflect the language of your choice simply open the "lang" folder and create your own .json file to replace the default message, then be sure to add your new language code to the ie6-upgrade-option.php file. Current translations include: English, French, German, Spanish, Hungarian, Swedish, Brazilian Portuguese, Dutch and Norwegian Bokm&acirc;l.


== Screenshots ==
View Screenshots:
http://www.doc4design.com/plugins/ie6-upgrade
 

== Installation ==
To install the plugin just follow these simple steps:

1. Download the plugin and expand it.
2. Copy the ie6-upgrade-option folder into your plugins folder ( wp-content/plugins ).
3. Log-in to the WordPress administration panel and visit the Plugins page.
4. Locate the IE6 Upgrade Option plugin and click on the activate link.
5. Replace the ie6-upgrade-option with the version from the "multi-browser" folder to enable use of this plugin within more browsers than IE6.

= Translations =
1. Open the "lang" folder and duplicate one of the language files.
2. Alter the warning message to the language of your choice.
3. Change the file name to your language code: "en.json" for English.
4. Upload the file into the "lang" folder.
5. Open the "ie6-upgrade-option.php" file.
6. Change line 59 by replacing the "en.json" url with your new language file name.

= Additional Browser Warnings =
Browser warnings can be applied to browsers other than IE6 by following a few simple instructions included as comments in the "ie6-upgrade-option.php" file.


== Changelog ==

= 2.5.1 =
* Corrected the image file extensions from .png to .gif

= 2.5 =
* Updated plugin to recognize IE9
* Updated all browser icons and download links
* Tweaked some CSS in the style sheet
* Added French translation courtesy of: TOnin

= 1.9 =
* Added Dutch translation courtesy of: Marc Verbeeck
* Added Norwegian - Bokm&acirc;l translation courtesy of: Kjetil Flekk&oslash;y
* Added Brazilian Portuguese translation courtesy of: Raoni


= 1.7 =
* Added Spanish translations courtesy of: Melvis Leon
* Added Swedish translations courtesy of: Jimmy

= 1.1 =
* Includes z-index value of 3000 to keep the lightbox on top of objects


== Credits & Thanks ==

= Recent Donations = 
* Bill Hollings

= Thanks =
* TOnin
* Mark Verbeeck
* Kjetil Flekk&oslash;y
* Raoni
* Melvis Leon
* Jimmy

= Translations =
* French: TOnin
* Dutch: Marc Verbeeck - http://www.rodenbachschool.be/
* Norwegian Bokm&acirc;l: Kjetil Flekk&oslash;y - http://www.kjetil@dolcevita.no
* Brazilian Portuguese: Raoni - http://www.agenciaad.com.br
* Spanish: Melvis Leon
* Swedish: Jimmy - http://www.angrycreative.se/
