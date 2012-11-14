=== Test&Target MBox Shortcode ===
Contributors: petethechop
Tags: mbox, adobe, testing
Requires at least: 2.5.1
Tested up to: 3.3.1
Stable tag: 1.5.1

Provides a shortcode to wrap your content with, which will automatically be converted to the proper mbox syntax for use with Adobe Test&Target.

== Description ==

Provides a shortcode to wrap your content with, which will automatically be converted to the proper mbox syntax for use with [Adobe Test&Target](https://microsite.omniture.com/t2/help/en_US/tnt/help/). Works as a wrapper for text and images within the WordPress post/page editor.

Also provides a settings page where you can add the URL path to your mbox.js file to be automatically included in the page head. You can upload the mbox.js file via the media uploader and copy/paste the full path.

= Usage =

[mbox name="myMbox"]My Test Content[/mbox]

Where "myMbox" is the name of your mbox and "My Test Content" is the content you are testing using Adobe Test&Target.

For best results, do not leave a space or line break after the first tag or after the last, even if wrapping multiple paragraphs. Doing so will likely cause extra line breaks or paragraphs to appear on the page.
(Note: this is an issue with the way WordPress handles shortcodes, not with this plugin)

**Good Example:**

[mbox name="myMbox"]Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.[/mbox]


**Bad Example:**

[mbox name="myMbox"]

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.

[/mbox]

== Installation ==

1. Unzip tnt-mbox-shortcode.zip and upload the contained files to the /wp-content/plugins/ directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Make sure to [include your mbox.js file in the header.php](https://microsite.omniture.com/t2/help/en_US/tnt/help/#Referencing%20mbox.js) of your theme (plans to automate that using this plugin are coming soon).
1. Place the [mbox name="myMbox"]My Test Content[/mbox] shortcode in your templates.

== Frequently Asked Questions ==

= Is Adobe Test&Target a free program? =

While this plugin is free to download and use, it requires a subscription to the Test&Target system provided by Adobe for a fee. A similar free option is to use [Google Website Optimizer](http://www.google.com/websiteoptimizer).

= The shortcode seems to be working, but the names aren't showing up in Test&Target =

It may take a minute or two for the names to show up. You can also manually refresh in Test&Target. If they still aren't showing up, make sure to [include your mbox.js file in the header.php](https://microsite.omniture.com/t2/help/en_US/tnt/help/#Referencing%20mbox.js) of your theme (plans to automate that using this plugin are coming soon).

= Does this plugin support Dynamic Mboxes? =

No. [Dynamic Mboxes](https://microsite.omniture.com/t2/help/en_US/tnt/help/#About%20Dynamic%20Mboxes) are more advanced than this plugin is currently capable of dealing with. Those will have to be manually added to your theme. Furthermore, if you are using Dynamic Mboxes, chances are you are capable of editing your theme and don't need this plugin in the first place.

== Changelog ==

= 1.5.1 =
* Bug Fix

= 1.5 =
* Link to upload mbox.js file from the Options page

= 1.1 =
* Options page with mbox.js url field to automatically add the js file to <head>

= 1.0.2 =
* plugin row meta links added

= 1.0.1 =
* donation link added

= 1.0 =
* Initial release.

== Upgrade Notice ==
