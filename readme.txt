=== Cache Time ===
Contributors: wesg
Tags: time, clock, cache
Requires at least: 2.0
Tested up to: 2.6
Stable tag: 1.02

Cache Time is a simple, but yet advanced plugin that displays the time that the current page was cached.

== Description ==

Cache Time displays the time that the current page was cached, and prints it via the cache_time(); function. It takes into account the different time zones of the Wordpress blog, and whether or not WP-Cache has blocked the current URL for caching.

It has been tested with WP 2.6 and WP-Cache only, so please contact me with any questions or concerns with other systems. WP-Super-Cache should work, but it is not officially tested.

Be sure to check out my other plugins at <a href="http://wordpress.org/extend/plugins/profile/wesg">my Wordpress profile</a>.

= USAGE =

1. Anywhere inside the Wordpress template pages, copy `<?php cache_time(); ?>` to print the plugin's output.

= CUSTOMIZATION =

There are 3 elements that can be customized with Cache Time:

1. *Text displayed when page is cached* --
Open cache-time.php inside the Cache-time folder with your favorite text editor and find line 27 that says `$cached = 'Page cached on: ';`. Change the text between the quotes for your own message.
1. *Text displayed if no cache is present* --
Similar to above, find line 29 that says `$not_cached = 'Time is now: ';` and change the text between the quotes.
1. *Date Format* --
Again inside the cache-time.php file, line 36 can be changed to display your choice of information. More details about customizing the date can be found at <a href="http://www.w3schools.com/php/func_date_gmdate.asp">w3schools</a>.

= LIMITATIONS =

1. Currently Cache Time only works with WP-Cache, though theoretically it should work with WP-Super-Cache as well.

== Installation ==

1. Copy the folder cache-time into your WordPress plugins directory (wp-content/plugins).
1. Log in to WordPress Admin. Go to the Plugins page and click Activate.
1. Wherever you wish to display the information, use `<?php cache_time(); ?>` inside your Template pages.


== Frequently Asked Questions ==

= What is the point of this plugin? =
Cache Time is meant to display the time that your website last cached the current page, for both you and your users benefit. There are many instances where users want the most current information, and this is an easy way to show how current that info is.

= Is WP-Cache the only caching plugin that works with Cache Time? =
Officially, yes. WP-Super-Cache may work, though I have not tested it.

= OK, but what if I don't have WP-cache installed? =
If no caching system is installed, the plugin simply displays the current time.