=== Docile ===

Contributors: templatesell
Theme URI: https://www.templatesell.com/item/docile
Author URI: https://www.templatesell.com/
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready, blog, news
Requires at least: 6.0
Requires PHP: 7.4
Tested up to: 7.1
Stable tag: 1.1.3
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Docile is a elegant and easy to use WordPress magazine theme. It comes with 10+ custom widgets, customizer based theme settings, powerful theme options and many more. This theme has search option, off-canvas sidebar, multiple sidebar options, footer options, featured slider, promo boxed, footer widgets and many more. Besides that, this theme comes with added custom widgets for trending news, post grid, slider and many more.It comes with primary color option to change the whole site color with a single click. More Details: https://www.templatesell.com/item/docile

== Description ==

Docile is a elegant and easy to use WordPress magazine theme. It comes with 10+ custom widgets, customizer based theme settings, powerful theme options and many more. This theme has search option, off-canvas sidebar, multiple sidebar options, footer options, featured slider, promo boxed, footer widgets and many more. Besides that, this theme comes with added custom widgets for trending news, post grid, slider and many more.It comes with primary color option to change the whole site color with a single click. More Details: https://www.templatesell.com/item/docile

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Docile includes support for Infinite Scroll in Jetpack.

== Changelog ==
= 1.1.3 - August 21 2026 =
* Fixed - The top bar menu had no styling for its sub-levels, so on any site
  whose top menu has children - including a fresh install, where WordPress falls
  back to listing pages - the whole tree rendered as an indented browser-default
  list sprawling above the header. It is a dropdown now, with keyboard focus
  support.
* Fixed - Tags never appeared on a single post. The printf() that drew them had
  no placeholder in its format string, so the tag list was passed in and thrown
  away, leaving a bare tag icon.
* Fixed - The word "Trending" was passed to esc_html() with the text domain as a
  second argument. esc_html() takes one argument, so the domain was discarded and
  the word could not be translated.
* Fixed - Previous and next post labels were CSS content: strings, which no
  translator can reach and no screen reader announces reliably. They are real
  translated text now.
* Fixed - load_theme_textdomain() was called without a path, so a translation
  shipped inside the theme was never loaded.
* Fixed - The custom background filter carried another theme's prefix
  (refined_magazine_), and its default colour had a trailing space.
* Fixed - Both "dismiss" links on the pro notice were plain GET requests with no
  nonce, so any page an administrator visited could dismiss the notice for them.
  Both are nonce-checked, and the dismiss control now has a name a screen reader
  can announce.
* Fixed - The offcanvas panel trapped keyboard focus with no way out: Tab cycled
  inside it and Escape did nothing. Escape closes it, focus returns to the
  button that opened it, and the button reports its state with aria-expanded.
* Fixed - Cards for posts with no featured image printed white text over a
  #f7f7f7 placeholder - a contrast ratio of about 1.05:1, so the headline was
  invisible. The placeholder is dark.
* Fixed - The default copyright line had the year 2021 baked into it, so every
  install made since showed a stale year.
* Fixed - The mismatched vendor-prefixed transitions on the sticky header told
  three browsers to animate "position" over ten seconds while the other two were
  told "all, 500ms".
* Fixed - style-rtl.css replaces style.css outright and had never picked up the
  rule that underlines links inside post content, so on a right-to-left site a
  link in a paragraph was distinguished from its surroundings by colour alone.
* Fixed - .post-content a underlined every link inside an article, including the
  headline, the byline and the post navigation, because .post-content wraps the
  whole article and not only the prose.
* Fixed - "aarticle" in the dynamic CSS never matched an element, so post format
  badges missed the primary colour; ".top-menu > ul > li" was dead for the same
  kind of reason.
* Fixed - wp_register_script() was passed true where it expects a version, so
  the custom widget script was versioned "1" and loaded in the head.
* Changed - The customizer's primary colour now repaints all 218 selectors that
  carry an accent. It used to repaint 98 of them, so on a site with a colour
  other than the default red, the comment form, the search buttons, the 404
  links, the checkbox ticks, the quote mark and the post format badges all
  stayed red while everything around them changed.
* Changed - The front page loop is laid out as a news grid - one sheet, stories
  ruled off from each other, kickers above headlines - rather than as separate
  rounded cards. On a phone it becomes a horizontal list, thumbnail beside
  headline, so several stories fit on a screen.
* Changed - One button treatment across the theme. The search button on the 404
  page was black, the one in the sidebar was grey, the block search button was
  another colour again and none of them matched the comment form's submit.
* Changed - Corner radii reduced from fifteen distinct values to one scale, and
  transition durations from fifteen to four. Circles that were written as half
  the element's height are written as circles, so they stay circular if the
  height changes.
* Changed - Google Fonts are bundled with the theme instead of being fetched
  from fonts.googleapis.com on every page view.
* Changed - Sidebar and footer widgets are styled again. Since WordPress 5.8 the
  default widgets are blocks, and every rule for them in this theme was scoped
  under .post-excerpt - the post body - so in a sidebar they matched nothing and
  fell back to browser defaults.
* Changed - Small text that was #989ea6 on white, about 2.9:1, is now #6b7280 at
  5.1:1, which meets WCAG AA. Submenu links were #818181 with no hover change at
  all.
* Changed - Requires PHP raised from 5.3 to 7.4, Requires at least to 6.0, and
  Tested up to to 7.1. readme.txt had claimed PHP 4.7, which is not a version
  that exists, and a Stable tag of 1.0.0 while the theme was 1.1.2.
* Added - Block patterns, block styles, editor styles and align-wide support.
  css/editor-styles.css shipped as an empty file, and the editor was told to
  load Muli and Roboto while the front end loaded Arimo and Heebo, so a post
  never looked in the editor the way it would look published.
* Added - Visible keyboard focus rings, and a prefers-reduced-motion block.
= 1.1.2 - February 10 2022 =
* Tested with WP 5.9
* Fixed widget blocks

= 1.1.1 - August 13 2021 =
* Tested with WP 5.8
* Disable new widget screen

= 1.1.0 - April 13 2021 =
* Fixed trending news link

= 1.0.9 - April 08 2021 =
*Tested with 5.7 version of WP
* Changed year of copyright text

= 1.0.8 - February 06 2021 =
* Pro notice for backend is added

= 1.0.7 - December 18 2020 =
* Pro notice for backend is added

= 1.0.6 - December 16 2020 =
* Added Upgrade to pro and about page

= 1.0.5 - December 15 2020 =
* Pagination issues fixed

= 1.0.4 - December 14 2020 =
* Screenshot changed
* Fixed some minor CSS issues
* Fixed background of widget issues

= 1.0.3 - December 11 2020 =
* Recommended demo importer plugin

= 1.0.2 - December 10 2020 =
* Fixed reviewer issues
* Changed some minor CSS issues

= 1.0.1 - December 04 2020 =
* Added default header image
* Fixed customizer error
* Tested with PHP 7.4
* Changed header layout and added a top menu
* Fixed some minor CSS issues

= 1.0.0 - November 14 2020 =
* Initial release

== Credits ==

Docile is free WordPress theme by, Template Sell.
Docile is distributed under the terms of the GNU GPL v2 or later.

* Based on Underscores https://underscores.me/, (C) 2012-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
* BreadcrumbTrail, Copyright (c) 2008 - 2015, Justin Tadlock http://themehybrid.com/plugins/breadcrumb-trail
* Theia Sticky Sidebar https://github.com/WeCodePixels/theia-sticky-sidebar [MIT license]
* Iscroll JS https://github.com/cubiq/iscroll/blob/master/LICENSE  [The MIT License (MIT)] Copyright (c) 2008-2013 Matteo Spinelli, http://cubiq.org
* Slick Slider https://github.com/kenwheeler/slick/blob/master/LICENSE [The MIT License (MIT)]
* Font-Awesome https://github.com/FortAwesome/Font-Awesome FontAwesome 4.6.3 Copyright 2012 Dave Gandy Font License: SIL OFL 1.1 Code License: MIT License http://fontawesome.io/license/
* Aamir Afridi http://aamirafridi.com/jquery/jquery-marquee-plugin https://github.com/tobia/Pause/blob/master/LICENSE.txt GNU GENERAL PUBLIC LICENSE

== Screenshot Images [CCO License] ==

Image for theme screenshot Copyright rawpixel.com
License: CC0 1.0 Universal (CC0 1.0)
Source: https://pxhere.com/en/photo/1431501

Image for theme screenshot Copyright Pxhere
License: CC0 1.0 Universal (CC0 1.0)
Source: https://pxhere.com/en/photo/962915

Image for theme screenshot Copyright Pxhere
License: CC0 1.0 Universal (CC0 1.0)
Source: https://pxhere.com/en/photo/892653

Image for theme screenshot Copyright Pxhere
License: CC0 1.0 Universal (CC0 1.0)
Source: https://pxhere.com/en/photo/1338927

Image for theme screenshot Copyright Pxhere
License: CC0 1.0 Universal (CC0 1.0)
Source: https://pxhere.com/en/photo/893407

Image for theme screenshot Copyright Pxhere
License: CC0 1.0 Universal (CC0 1.0)
Source: https://pxhere.com/en/photo/100103

Image for theme screenshot Copyright Pxhere
License: CC0 1.0 Universal (CC0 1.0)
Source: https://pxhere.com/en/photo/314577

Image for theme screenshot Copyright Kristin Hardwick
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/recording-studio-YA3HZPUFYL

Image for theme screenshot Copyright Matt Moloney
License: CC0 1.0 Universal (CC0 1.0)
https://stocksnap.io/photo/city-woman-6OQINKDPSR

Image for default header image Copyright  Ian Livesey
License: CC0 1.0 Universal (CC0 1.0)
https://stocksnap.io/photo/sunset-beach-1FU4KJBQSZ

* Sidebar icons for the customizer are self created and license under GPL.
* Header Advertisement Banner is self created and license under GPL.