<?php

// Load the NV library
require_once 'nv/NV.php';
require_once 'nv/class/page_content.php';
require_once 'nv/class/page_share.php';
require_once 'nv/class/Menu.php';

// Initialize the NV library (also returns requirements check)
if (NV::init()) {

}

add_filter('json_prepare_post', function ($data, $post, $context) {
  $data['portfolio_information'] = array(
    'url' => get_post_meta($post['ID'], 'url', true),
    'include_in_portfolio' => get_post_meta($post['ID'], 'include_in_portfolio', true),
    'thumbnail' => get_post_meta($post['ID'], 'thumbnail', true),
    'thumbnail_caption' => get_post_meta($post['ID'], 'thumbnail_caption', true),
    'thumbnail_label' => get_post_meta($post['ID'], 'thumbnail_label', true),
    'case_study_text' => get_post_meta($post['ID'], 'case_study_text', true),
    'case_study_picture' => get_post_meta($post['ID'], 'case_study_picture', true),
    'project_tier_level' => get_post_meta($post['ID'], 'project_tier_level', true),
    'user_story' => get_post_meta($post['ID'], 'user_story', true),
    'client' => get_post_meta($post['ID'], 'client', true),
    'additional_pieces' => get_post_meta($post['ID'], 'additional_pieces', true),
  );
  return $data;
}, 10, 3);

class MV_Cleaner_Walker_Nav_Menu extends Walker
{

  var $tree_type = array('post_type', 'taxonomy', 'custom');
  var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');

  function start_lvl(&$output, $depth)
  {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"sub-menu\">\n";
  }

  function end_lvl(&$output, $depth)
  {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  function start_el(&$output, $item, $depth, $args)
  {
    global $wp_query;
    $indent = ($depth) ? str_repeat("\t", $depth) : '';
    $class_names = $value = '';
    $classes = empty($item->classes) ? array() : (array)$item->classes;
    $classes = in_array('current-menu-item', $classes) ? array('current-menu-item') : array();
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = strlen(trim($class_names)) > 0 ? ' class="' . esc_attr($class_names) . '"' : '';
    $id = apply_filters('nav_menu_item_id', '', $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
    $output .= $indent . '<span' . $id . $value . $class_names . '>';
    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
    $attributes .= ' class = "tiny round button button_' . $item->ID . '"';
    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }

  function end_el(&$output, $item, $depth)
  {
    $output .= "</span>\n";
  }

}

class header_walker extends Walker
{

	var $tree_type = array('post_type', 'taxonomy', 'custom');
	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');

	function start_lvl(&$output, $depth)
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	function end_lvl(&$output, $depth)
	{
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el(&$output, $item, $depth, $args)
	{
		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = '';
		$value = ' class="small-2 columns" ';
		$classes = empty($item->classes) ? array('') : (array)$item->classes;
		$classes = in_array('current-menu-item', $classes) ? array('current-menu-item') : array();
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = strlen(trim($class_names)) > 0 ? ' class="' . esc_attr($class_names) . '"' : '';
		$id = apply_filters('nav_menu_item_id', '', $item, $args);
		$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
		$output .= $indent . '<li' . $id . $value . $class_names . '>';
		$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
		$attributes .= ' class = "menu-item menu-item-type-post_type menu-item-object-page menu-item-' . $item->ID . '"';
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	function end_el(&$output, $item, $depth)
	{
		$output .= "</span>\n";
	}

}

add_action('init', 'get_portfolio_category');

function get_portfolio_category()
{
  add_rewrite_rule('portfolio/category/([^/]*)/?$', 'index.php?page_id=12&profile_category=$matches[1]', 'top');
}

add_filter('query_vars', 'register_custom_query_vars', 1);

function register_custom_query_vars($vars)
{
  array_push($vars, 'profile_category');
  return $vars;
}


function get_pins()
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://pinterestapi.co.uk/topshelfdesign/pins',
  ));
  $pins = json_decode(curl_exec($curl));
  curl_close($curl);
  return $pins->body;
}

function format_date_ordinal($date) {
	/*$date = explode(' ', $date); //
	$ends = array('th','st','nd','rd','th','th','th','th','th','th');
	if (($number %100) >= 11 && ($number%100) <= 13)
		$abbreviation = $number. 'th';
	else
		$abbreviation = $number. $ends[$number % 10];
		*/
		
	//return date("F j<sup>S</sup>, Y", strtotime($date));
	return date("F", strtotime($date)).' '.date("j", strtotime($date)).'<sup>'.date("S", strtotime($date)).'</sup> '.date("Y", strtotime($date));
}
