<?php

/**
 * Wer functions and definitions
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package 	WordPress
 */

defined( 'ABSPATH' ) || exit;

include_once 'constants.php';
include_once 'inc/Imports.class.php';
include_once 'inc/UserUtilities.class.php';
include_once 'inc/Utilities.class.php';
include_once 'inc/ElementorChecker.class.php';

require_once('inc/ElementorWidgets.class.php');
require_once('inc/api/Endpoints.class.php');

set_include_path(get_include_path().":".__TEMPLATE_URL);

  /**
   *
   */
  function setup_theme(){
    load_theme_textdomain( 'wer-template-base', __TEMPLATE_URL . '/languages' );
    $GLOBALS['content_width'] = apply_filters( 'hello_elementor_content_width', 800 );

    /*
     * Gutenberg wide images.
     */
    add_theme_support( 'align-wide' );

    /*
     * WooCommerce.
     */
    // WooCommerce in general.
    add_theme_support( 'woocommerce' );
    // Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
    // zoom.
    add_theme_support( 'wc-product-gallery-zoom' );
    // lightbox.
    add_theme_support( 'wc-product-gallery-lightbox' );
    // swipe.
    add_theme_support( 'wc-product-gallery-slider' );
    /* End of woocommerce */

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      )
    );
    add_theme_support(
      'custom-logo',
      array(
        'height'      => 100,
        'width'       => 350,
        'flex-height' => true,
        'flex-width'  => true,
      )
    );
  }

  add_action( 'after_setup_theme', 'setup_theme', 0);

  $ep = new Endpoints();
  $ep->registerStyleEndpoints();

  /**
   *
   * @uses Imports::getStyles(), Imports::getScripts()
   */
  function enqueue_assets() {
    // Merging the styles and scripts
    $list = array_merge(Imports::getStyles(), Imports::getScripts());

//    echo "<pre>";
//    var_dump($list);
//    echo "</pre>";

    // Scanning the assets folders for imports
    foreach ($list as $key => $value) :
      // Continue loop if contains any admin related files.
      if (strpos($key, "admin")) continue;

      // Get the path from the file
      $path = pathinfo($key);

      // Continue loop if contains any .map related files.
      if (strpos($path['extension'], "map")) continue;

      // Enqueue based on the file extension
      switch ($path['extension']){
        case "css":
          // Register style based on given key and extension
          wp_register_style( $key,  __TEMPLATE_URL . "/" . $key, $value);
          wp_enqueue_style( $key);
          break;
        case "js":
          // Register script based on given key and extension
          wp_register_script($key, __TEMPLATE_URL . "/" . $key, array_merge($value, array( 'jquery' )));
          wp_enqueue_script($key);
          break;
      }
      endforeach;
  }
  add_action( 'wp_enqueue_scripts', 'enqueue_assets' );

  function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'Default' ));
  }
  add_action( 'init', 'wpb_custom_new_menu' );

  // If view is admin, load all the admin styles and scripts.
  if (is_admin()){
    include_once 'inc/admin/admin-functions.php';
  }

  // Wrapper function to deal with backwards compatibility.
  if ( ! function_exists( 'wer_body_open' ) ) {
    function wer_body_open() {
      if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
      } else {
        do_action( 'wp_body_open' );
      }
    }
  }

  // Automatic Theme Update
  add_filter( 'auto_update_theme', '__return_true' );
  add_filter( 'show_admin_bar', '__return_false' );