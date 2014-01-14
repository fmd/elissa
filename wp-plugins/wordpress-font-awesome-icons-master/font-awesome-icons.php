<?php
/*
Plugin Name: Font Awesome Icons
Plugin URI: http://terrytsang.com
Description: Use Font Awesome Icons on your Wordpress site and you can either use html code or shortcode.
Version: 1.0
Author: Terry Tsang
Author URI: http://terrytsang.com/
Author Email: terrytsang811@gmail.com
Credits: Font Awesome by Dave Gandy - http://fortawesome.github.com/Font-Awesome
*/

/*
Copyright (C) 2013 Terry Tsang

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class FontAwesome {
	public function __construct() {
		add_action( 'init', array( &$this, 'init' ) );
		add_action( 'admin_init', array( &$this, 'fontawesome_post_button' ) );
	}
	
	public function init() {
		//load stylesheet
		add_action( 'wp_enqueue_scripts', array( &$this, 'fontawesome_plugin_stylesheet') );
		
		//add shortcode
		add_shortcode( 'icon', array( &$this, 'fontawesome_icons_shortcode') );
		add_shortcode( 'iconlists', array( &$this, 'fontawesome_icons_lists_shortcode') );
		
		add_filter( 'widget_text', 'do_shortcode' );
		add_filter( 'comment_text', 'do_shortcode' );
		add_filter( 'the_excerpt', 'do_shortcode' );
		add_filter( 'the_title', 'do_shortcode' );
	}
	
	public function fontawesome_plugin_stylesheet() {
		global $wp_styles;
		
		wp_enqueue_style( 'fontawesome-styles', plugins_url( 'css/font-awesome.css', __FILE__  ) );
		wp_enqueue_style( 'fontawesome-ie7-styles', plugins_url( 'css/font-awesome-ie7.min.css', __FILE__  ) );
		
		$wp_styles->add_data('fontawesome-ie7-styles', 'conditional', 'lte IE 7');
	}
	
	public function fontawesome_icons_shortcode( $atts, $content = null )
	{
		extract( 
			shortcode_atts( array( 'name' => '', 'url' => '', 'target' => '' ), $atts ) 
		);
		
		//clean link url and text
		$url = esc_url($url);
		$content = esc_html($content);
		
		if(empty($url))
		{
			if(empty($content))
				$output = '<i class="'.$name.'"></i>';
			else
				$output = '<i class="'.$name.'"></i> '.$content;
		}
		else
		{
			if(empty($target))
				$output = '<a class="btn" href="'.$url.'"><i class="'.$name.'"></i> '.$content.'</a>';
			else
				$output = '<a class="btn" href="'.$url.'" target="'.$target.'"><i class="'.$name.'"></i> '.$content.'</a>';
			
		}

		return $output;
	}
	
	public function fontawesome_icons_lists_shortcode( $atts, $content = null )
	{
		extract(
			shortcode_atts( array( 'name' => '' ), $atts )
		);
	
		//clean link url and text
		$content = esc_html($content);
	
		if(!empty($content) && !empty($name))
		{
			$output = '<ul class="icons" style="list-style: none;">';
			$content = explode("|", $content);
			
			foreach($content as $list)
			{
				$list = trim($list);
				$output .= '<li><i class="'.$name.'"></i> '.$list.'</li>';
			}
			
			$output .= "</ul>";
		}
		
		return $output;
	}
	
	public function fontawesome_post_button() {
	
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
			return;
		}
	
		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_external_plugins', array( &$this, 'add_fontawesome_plugin') );
			add_filter( 'mce_buttons', array( &$this, 'register_fontawesome_button') );
		}
	
	}
	
	public function add_fontawesome_plugin( $plugin_array ) {
		$plugin_array['fontawesome'] = plugins_url( 'js/font-awesome.js', __FILE__  );
		$plugin_array['fontawesomelists'] = plugins_url( 'js/font-awesome-lists.js', __FILE__  );
		return $plugin_array;
	}
	
	public function register_fontawesome_button( $buttons ) {
   		array_push( $buttons, "|", "fontawesome" );
   		array_push( $buttons, "|", "fontawesomelists" );
   		return $buttons;
	}
	
	
}
$fontawesome = new FontAwesome();