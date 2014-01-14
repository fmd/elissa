=== Plugin Name ===
Contributors: terrytsang
Plugin Name: Wordpress Font Awesome Icons
Plugin URI:  http://www.terrytsang.com/
Tags: wordpress, font awesome, icons, lists, buttons, social
Requires at least: 3.0
Tested up to: 3.5.1
Stable tag: 1.0.0
Version: 1.0.0
Credits: Font Awesome by Dave Gandy - http://fortawesome.github.com/Font-Awesome

Use Font Awesome Icons on your Wordpress site and you can either use html code or shortcode.

== Description ==

This is a plugin that allows you to use Font Awesome Icons by Dave Gandy in your Wordpress site. You can use html, shortcode or
text editor new icons to add font awesome icons to post/page content, widget, post/page title and many possiblities.

More code examples on the Font Awesome Icons please refer: http://fortawesome.github.com/Font-Awesome/#code

For all 249 icons name, please use the doc/font-awesome-icons-list.jpg as reference.

Example:

HTML
-----
1) Icons Only
<i class="icon-ok"></i>

2) Inline Icons
<i class="icon-ok"></i> Icon OK

3) Icons Text with Link URL
<a href="www.example.com"><i class="icon-ok"></i> Icon OK</a>

4) Icons Text with Link URL (New Window/Tab)
<a href="www.example.com" target="_blank"><i class="icon-ok"></i> Icon OK</a>

5) Larger Icons
<p><i class="icon-ok icon-large"></i> Icon OK</p>
<p><i class="icon-ok icon-2x"></i> Icon OK Large</p>
<p><i class="icon-ok icon-3x"></i> Icon OK Larger</p>
<p><i class="icon-ok icon-4x"></i> Icon OK Largest</p>

6) Lists
<ul class="icons" style="list-style:none">
    <li><i class="icon-ok"></i> Lists</li>
    <li><i class="icon-ok"></i> Buttons</li>
    <li><i class="icon-ok"></i> Button groups</li>
    <li><i class="icon-ok"></i> Navigation</li>
    <li><i class="icon-ok"></i> Prepended form inputs</li>
</ul>

 
Shortcode
---------

1) Icons Only
[icon name="icon-ok"]

2) Inline Icons
[icon name="icon-ok"] Icon OK[/icon]

3) Icons Text with Link URL
[icon name="icon-ok" url="www.example.com"] Icon OK[/icon]

4) Icons Text with Link URL (New Window/Tab)
[icon name="icon-ok" url="www.example.com" target="_blank"] Icon OK[/icon]

5) Larger Icons
<p>[icon name="icon-ok icon-large"] Icon OK[/icon]</p>
<p>[icon name="icon-ok icon-2x"] Icon OK Large[/icon]</p>
<p>[icon name="icon-ok icon-3x"] Icon OK Larger[/icon]</p>
<p>[icon name="icon-ok icon-4x"] Icon OK Largest[/icon]</p>

6) Lists
[iconlists name="icon-ok"] Lists|Buttons|Button groups|Navigation|Prepended form inputs[/iconlists]


Current version : 1.0.0


== Installation ==

1. Upload the entire *wordpress-font-awesome-icons* folder to the */wp-content/plugins/* directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. You can use shortcode or html in text editor, widget or title.
4. That's it. You're ready to go and cheers!


== Changelog ==

= 1.0.0 =

* Initial Release

