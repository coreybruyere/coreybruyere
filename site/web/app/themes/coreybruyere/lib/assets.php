<?php

namespace Roots\Sage\Assets;

/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/dist/styles/main.css
 *
 * Enqueue scripts in the following order:
 * 1. /theme/dist/scripts/modernizr.js
 * 2. /theme/dist/scripts/main.js
 */

class JsonManifest {
  private $manifest;

  public function __construct($manifest_path) {
    if (file_exists($manifest_path)) {
      $this->manifest = json_decode(file_get_contents($manifest_path), true);
    } else {
      $this->manifest = [];
    }
  }

  public function get() {
    return $this->manifest;
  }

  public function getPath($key = '', $default = null) {
    $collection = $this->manifest;
    if (is_null($key)) {
      return $collection;
    }
    if (isset($collection[$key])) {
      return $collection[$key];
    }
    foreach (explode('.', $key) as $segment) {
      if (!isset($collection[$segment])) {
        return $default;
      } else {
        $collection = $collection[$segment];
      }
    }
    return $collection;
  }
}

function asset_path($filename) {
  $dist_path = get_template_directory_uri() . DIST_DIR;
  $directory = dirname($filename) . '/';
  $file = basename($filename);
  static $manifest;

  if (empty($manifest)) {
    $manifest_path = get_template_directory() . DIST_DIR . 'assets.json';
    $manifest = new JsonManifest($manifest_path);
  }

  if (array_key_exists($file, $manifest->get())) {
    return $dist_path . $directory . $manifest->get()[$file];
  } else {
    return $dist_path . $directory . $file;
  }
}

// function assets() {

//   // Critical CSS
//   if (WP_ENV == 'development') {
//     include get_stylesheet_directory() . '/critical.script.php';
//     echo '<style>';
//     include get_stylesheet_directory() . '/custom-critical.css.php';
//     echo '</style>';
//   } else {
//     wp_enqueue_style('sage_css', asset_path('styles/main.css'), false, null);
//   }

//   if (is_single() && comments_open() && get_option('thread_comments')) {
//     wp_enqueue_script('comment-reply');
//   }

//   wp_enqueue_script('modernizr', asset_path('scripts/modernizr.js'), [], null, true);
//   wp_enqueue_script('sage_js', asset_path('scripts/main.js#async'), null, true);
// }
// add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);


function assets() {

  // Critical/Async CSS
  if (WP_ENV == 'production') {
    if (isset($_COOKIE['fullCSS']) && $_COOKIE['fullCSS'] === 'true' ) {
      // Load CSS traditionally if cookie is set
      wp_enqueue_style('sage_css', asset_path('styles/main.css'), false, null);

    } else {
      // Load critical CSS is no cookie is set
      echo '<style>';
      include_once( get_stylesheet_directory() . '/dist/styles/critical.css');
      echo '</style>';

      // Async CSS, set cookie, and provide noscript fallback
      include get_stylesheet_directory() . '/critical.script.php';
    }
  // Dev styling
  } else {
    wp_enqueue_style('sage_css', asset_path('styles/main.css'), false, null);
  }

  // Comment script
  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  // All other JS
  // wp_enqueue_script('modernizr', asset_path('scripts/modernizr.js'), [], null, true);
  wp_enqueue_script('picturefill', asset_path('scripts/picturefill.js#async'), [], null, true);
  wp_enqueue_script('sage_js', asset_path('scripts/main.js#async'), null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

