<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  if (is_single()) {
    $classes[] = 's-single';
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');


/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


/**
 * Enable webp images to be uploaded
 */
function cc_mime_types($mimes) {
  $mimes['webp'] = 'image/webp';
  return $mimes;
}
add_filter('upload_mimes', __NAMESPACE__ . '\\cc_mime_types');


/**
 * Add async to scripts
 */
function add_async_forscript($url) {
  if (strpos($url, '#async') === false)
    return $url;
  else if (is_admin())
    return str_replace('#async', '', $url);
  else
    return str_replace('#async', '', $url)."' async='async";
}
add_filter('clean_url', __NAMESPACE__ . '\\add_async_forscript', 11, 1);


/**
 * Add async to scripts
 */
function acf_custom_menu_name( $settings )
{
  $settings['title'] = 'Social Media';
  $settings['pages'] = array('Links');
  return $settings;
}
add_filter('acf/options_page/settings', __NAMESPACE__ . '\\acf_custom_menu_name');


/**
 * Add SVG support to WP admin
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', __NAMESPACE__ . '\\cc_mime_types');


/**
 * Redirect to index page when previewing changes in admin
 */
function redirect_admin_view_cpt_page() {

  $queried_post_type = get_query_var('work');
  if ( is_single() && 'work' ==  $queried_post_type ) {
    wp_redirect( home_url());
    exit;
  }
}
add_action( 'template_redirect', __NAMESPACE__ . '\\redirect_admin_view_cpt_page' );


/**
 * Remove prefix from archive title
 */
function remove_archive_prefix($title) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif ( is_year() ) {
    $title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
  } elseif ( is_month() ) {
    $title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
  } elseif ( is_day() ) {
    $title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
  } elseif ( is_tax( 'post_format' ) ) {
    if ( is_tax( 'post_format', 'post-format-aside' ) ) {
      $title = _x( 'Asides', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
      $title = _x( 'Galleries', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
      $title = _x( 'Images', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
      $title = _x( 'Videos', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
      $title = _x( 'Quotes', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
      $title = _x( 'Links', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
      $title = _x( 'Statuses', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
      $title = _x( 'Audio', 'post format archive title' );
    } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
      $title = _x( 'Chats', 'post format archive title' );
    }
  } elseif ( is_post_type_archive() ) {
    $title = post_type_archive_title( '', false );
  } elseif ( is_tax() ) {
    $title = single_term_title( '', false );
  } else {
    $title = __( 'Archives' );
  }
  return $title;
  }
add_filter('get_the_archive_title', __NAMESPACE__ . '\\remove_archive_prefix');


/**
 * Add schema markup
 */
function html_tag_schema() {
  $schema = 'http://schema.org/';

  // Is single post
  if(is_single())
  {
    $type = "Article";
  }
  // Contact form page ID
  else if( is_page(1) )
  {
    $type = 'ContactPage';
  }
  // Is author page
  elseif( is_author() )
  {
    $type = 'ProfilePage';
  }
  // Is search results page
  elseif( is_search() )
  {
    $type = 'SearchResultsPage';
  }
  //Is of movie post type
  elseif(is_singular('work'))
  {
    $type = 'CreativeWork';
  }
  // Is of book post type
  // elseif(is_singular('books'))
  // {
  //   $type = 'Book';
  // }
  else
  {
    $type = 'WebPage';
  }

  echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}


/**
 * Remove Lame emoji icons
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/**
 * Add Image Sizes
 */
add_image_size('hero-1x', 765, 400);
add_image_size('hero-2x', 1415, 740);
add_image_size('hero-3x', 2835, 1480);
add_image_size('featured-full-1x', 700, 300);
add_image_size('featured-full-2x', 1400, 600);
add_image_size('featured-clip-1x', 500, 450);
add_image_size('featured-clip-2x', 1000, 900);

