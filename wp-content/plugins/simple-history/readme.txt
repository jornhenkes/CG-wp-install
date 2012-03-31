=== Plugin Name ===
Contributors: eskapism, MarsApril
Donate link: http://eskapism.se/sida/donate/
Tags: history, log, changes, changelog, audit, trail, pages, attachments, users, cms, dashboard, admin
Requires at least: 2.9.2
Tested up to: 3.3.1
Stable tag: 0.5

View changes made by users within WordPress. See who created a page, uploaded an attachment or approved an comment, and more.

== Description ==

Simple History shows recent changes made within WordPress, directly on your dashboard or on a separate page.

The plugin works as a log/history/audit log/version history of all (most, anyway) events that occur in WordPress. For example:

* see what articles have been created, modified or deleted
* see what attachments have been uploaded, modified or deleted
* see what plugins that have been activated or deactivated
* search through the history/log to find the change/post/article you are looking for

There is also a **RSS feed of changes** available, so you can keep track of the changes made
via your favorite RSS reader on your phone, on your iPad, or on your computer.

It’s a plugin that is good to have on websites where several people are 
involved in editing the content.

#### Example scenarios

Keep track of what other people are doing:
_"Has someone done anything today? Ah, Sarah uploaded 
the new press release and created an article for it. Great! Now I don't have to do that."_

Or for debug purposes:
_"The site feels very slow since yesterday. Has anyone done anything special? ... Ah, Steven activated 'naughy-plugin-x',
that must be it."_

#### See it in action
See the plugin in action with this short screencast:
[youtube http://www.youtube.com/watch?v=4cu4kooJBzs]

#### Add your own events to simple history
If you are a plugin developer and would like to add your own things/events to Simple History
you can do that by calling the function simple_history_add like this:
`<?php
# will return “Plugin your_plugin_name Edited”
simple_history_add("action=edited&object_type=plugin&object_name=your_plugin_name");
?>`

`<?php simple_history_add("action=repaired&object_type=starship&object_name=USS Enterprise"); ?>`

####  Translations/Languages

This plugin is available in the following languages:

* English
* German
* Simplified Chinese

#### Donation and more plugins
* If you like this plugin don't forget to [donate to support further development](http://eskapism.se/sida/donate/).
* More [WordPress CMS plugins](http://wordpress.org/extend/plugins/profile/eskapism) by the same author.

== Installation ==

1. Upload the folder "simple-history" to "/wp-content/plugins/"
1. Activate the plugin through the "Plugins" menu in WordPress
1. Done!

Now Simple History will be visible both on the dashboard and in the menu under pages.

== Feedback ==
Like the plugin? Dislike it? Got bugs or feature request?
Great! Contact me at par.thernstrom@gmail.com or at twitter.com/eskapism and hopefully 
I can do something about it.

== Screenshots ==

1. Simple History as it looks on your (well, mine anyway..) dashboard.

2. Simple History settings. Choose to show the plugin on your dashboard, or as a separately page. Or both. Or none, since you can choose
to only use the secret RSS feed to keep track of the changes on you web site/WordPress installation.

3. The RSS feed with changes, as shown in Firefox.

== Changelog ==

= 0.5 =
- Added author to RSS
- Added german translation, thanks http://www.fuerther-freiheit.info/
- Added swedish translation, thanks http://jockegustin.se
- Better support for translation

= 0.4 =
- Added: Now you can search the history
- Added: Choose if you wan't to load/show more than just 5 rows from the history

= 0.3.11 =
- Fixed: titles are now escaped

= 0.3.10 =
- Added chinese translation
- Fixed a variable notice
- More visible ok-message after setting a new RSS secret

= 0.3.9 =
- Attachment names were urlencoded and looked wierd. Now they're not.
- Started to store plugin version number

= 0.3.8 =
- Added chinese translation
- Uses WordPress own human_time_diff() instead of own version
- Fix for time zones

= 0.3.7 =
- Directly after installation of Simple History you could view the history RSS feed without using any secret. Now a secret is automatically set during installation.

= 0.3.6 =
- Made the RSS-feature a bit easier to find: added a RSS-icon to the dashboard window - it's very discrete, you can find it at the bottom right corner. On the Simple History page it's a bit more clear, at the bottom, with text and all. Enjoy!
- Added POT-file

= 0.3.5 =
- using get_the_title instead of fetching the title directly from the post object. should make plugins like qtranslate work a bit better.
- preparing for translation by using __() and _e() functions. POT-file will be available shortly.
- Could get cryptic "simpleHistoryNoMoreItems"-text when loading a type with no items.

= 0.3.4 =
- RSS-feed is now valid, and should work at more places (could be broken because of html entities and stuff)

= 0.3.3 =
- Moved JavaScript to own file
- Added comments to the history, so now you can see who approved a comment (or unapproved, or marked as spam, or moved to trash, or restored from the trash)

= 0.3.2 =
- fixed some php notice messages + some other small things I don't remember..

= 0.3.1 =
- forgot to escape html for posts
- reduced memory usage... I think/hope...
- changes internal verbs for actions. some old history items may look a bit weird.
- added RSS feed for recent changes - keep track of changes via your favorite RSS-reader

= 0.3 =
- page is now added under dashboard (was previously under tools). just feel better.
- mouse over on date now display detailed date a bit faster
- layout fixes to make it cooler, better, faster, stronger
- multiple events of same type, performed on the same object, by the same user, are now grouped together. This way 30 edits on the same page does not end up with 30 rows in Simple History. Much better overview!
- the name of deleted items now show up, instead of "Unknown name" or similar
- added support for plugins (who activated/deactivated what plugin)
- support for third party history items. Use like this:
simple_history_add("action=repaired&object_type=starship&object_name=USS Enterprise");
this would result in somehting like this:
Starship "USS Enterprise" repaired
by admin (John Doe), just now
- capability edit_pages needed to show history. Is this an appropriate capability do you think?

= 0.2 =
* Compatible with 2.9.2

= 0.1 =
* First public version. It works!
