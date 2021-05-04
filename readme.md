# Kern Transit Theme Reference

This guide is intended to cover the layout and features of the El Dorado Transit Theme. Any changes in functionality or additional template pages should be reflected here. Known site issues and suggestions for improvement should be submitted via Github's issue tracker.

This site was built using [Bones](#bones), a lightweight Wordpress development theme.

###Contents

* [Theme Features](#theme-features)
* [Template Files](#template-files)
* [GTFS Update](#gtfs-update)
* [Plugins](#plugins)
* [Bones](#bones)

##Theme Features

####Custom Post Types

The theme contains 6 custom post types: Route, Dar (Dial-a-ride), Timetable, Alert, News, and Contact Profile. Route, Timetable, and Dar posts are automatically generated from transit data, and require the *Advanced Custom Fields* plugin to function correctly. 

New alerts and news items can be created from the lefthand menu of the wp-admin area. For alerts to be displayed, they must be tagged with the appropriate alert zone. An alert can be tagged with multiple routes, as well as *All Routes* or *All Dial-a-Ride*. The complete list of tags is available under *Alert Zone* in the Alerts menu.

An optional expiration date can be set when creating a new post, using the Post Expirator plugin.

Contact Profiles are not currently used on the site.

####Menus

The Kern Transit Theme has two menus editable from the wp-admin area under *Appearance:Menus*, **Footer Links** and **Secondary Links Right Menu**. 

##Template Files

##GTFS Update

The GTFS Update for this theme is performed by visiting *Tools:CSV Site Update* in the wp-admin area. GTFS feed data is taken from the file `/wp-content/transit-data/route_and_dar_data.tsv`.

Timetables should be located in `transit-data/route-html/` and must follow the naming convention **route-_number\_direction_.html**.

##Plugins

- Contact Form 7
- Advanced Custom Fields
- Quick Page/Post Redirect Plugin
- Admin Menu Editor

##Bones

Bones is designed to make the life of developers easier. It's built
using HTML5 & has a strong semantic foundation.
It's constantly growing so be sure to check back often if you are a
frequent user. I'm always open to contribution. :)

Designed by Eddie Machado
https://themble.com/bones

License: WTFPL
License URI: https://sam.zoy.org/wtfpl/
Are You Serious? Yes.

#### Special Thanks to:
Paul Irish & the HTML5 Boilerplate
Yoast for some WP functions & optimization ideas
Andrew Rogers for code optimization
David Dellanave for speed & code optimization
and several other developers. :)

#### Submit Bugs & or Fixes:
https://github.com/eddiemachado/bones/issues

To view Release & Update Notes, read the log.txt file inside
the library folder.

For more news and to see why my parents constantly ask me what I'm
doing with my life, follow me on twitter: @eddiemachado

#### Helpful Tools & Links

Yeoman generator to quickly install Bones Wordpress starter theme into your Wordpress theme folder
by 0dp
https://github.com/0dp/generator-wp-bones


