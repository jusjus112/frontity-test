<?php

/**
 * Admin Functions Variables
 */

$disable_non_user_dashboard = false;


/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */

$check = new ElementorChecker();
$util = new UserUtilities();

if ($check->elementorExists()) {

  function enqueue_admin_style() {
    $util = new UserUtilities();
    global $disable_non_user_dashboard;

    wp_enqueue_style('admin-style', __TEMPLATE_URL . '/assets/css/_admin-style.min.css');
    wp_enqueue_style('admin-style-bar', __TEMPLATE_URL . '/assets/css/_admin-bar.min.css');
    wp_enqueue_style('admin-style-categories-tags', __TEMPLATE_URL . '/assets/css/_admin-categories-tags.min.css');
    wp_enqueue_style('admin-style-editor', __TEMPLATE_URL . '/assets/css/_admin-editor.min.css');
    wp_enqueue_style('admin-style-footer', __TEMPLATE_URL . '/assets/css/_admin-footer.min.css');
    wp_enqueue_style('admin-style-header', __TEMPLATE_URL . '/assets/css/_admin-header.min.css');
    wp_enqueue_style('admin-style-login', __TEMPLATE_URL . '/assets/css/_admin-login.min.css');
    wp_enqueue_style('admin-style-metalinks', __TEMPLATE_URL . '/assets/css/_admin-metalinks.min.css');
    wp_enqueue_style('admin-style-notices', __TEMPLATE_URL . '/assets/css/_admin-notices.min.css');
    wp_enqueue_style('admin-style-posts', __TEMPLATE_URL . '/assets/css/_admin-posts.min.css');
    wp_enqueue_style('admin-style-sidebar', __TEMPLATE_URL . '/assets/css/_admin-sidebar.min.css');
    wp_enqueue_style('admin-style-dashboard', __TEMPLATE_URL . '/assets/css/_admin-general-dashboard.min.css');
    wp_enqueue_style('admin-style-buttons', __TEMPLATE_URL . '/assets/css/_admin-buttons.min.css');
    wp_enqueue_style('admin-style-tables', __TEMPLATE_URL . '/assets/css/_admin-tables.min.css');

    if (!$util->isAdmin() && !$disable_non_user_dashboard){
      $screen = get_current_screen();

      if ($screen->id == "dashboard") {

        wp_enqueue_style('admin-user-bootstrap-style', __TEMPLATE_URL . '/node_modules/bootstrap/dist/css/bootstrap.min.css');
        wp_enqueue_style('admin-user-bootstrap-icons-style', __TEMPLATE_URL . '/node_modules/bootstrap-icons/font/bootstrap-icons.css');
        wp_enqueue_style('admin-user-tooltip-style', __TEMPLATE_URL . '/node_modules/css-tooltip/dist/css-tooltip.min.css');
        wp_enqueue_style('admin-slick-style', __TEMPLATE_URL . '/node_modules/slick-carousel/slick/slick.css');
        wp_enqueue_style('admin-user-style', __TEMPLATE_URL . '/assets/css/_admin-user.min.css');

        wp_enqueue_script('admin-slick-script', __TEMPLATE_URL . '/node_modules/slick-carousel/slick/slick.min.js');
        wp_enqueue_script('admin-user-script', __TEMPLATE_URL . '/assets/js/admin-user.min.js');
      }
    }
  }
  add_action('admin_enqueue_scripts', 'enqueue_admin_style');

//  add_filter('category_template', function($original){
//    global $post;
//    $post_name = $post->post_name;
//    $post_type = $post->post_type;
//    $base_name = 'single-' . $post_type . '-' . $post_name . '.php';
//    $template = locate_template($base_name);
//    if ($template && ! empty($template)) return $template;
//    return $original;
//  });

  add_action( 'elementor/element/wp-post/document_settings/before_section_end', 'YOUR_FUNCTION' , 10, 2 );
  add_action( 'elementor/element/wp-page/document_settings/before_section_end', 'YOUR_FUNCTION' , 10, 2 );
  function YOUR_FUNCTION( \Elementor\Core\DocumentTypes\PageBase $page ) {
    $page->add_control(
      'thumbnail',
      [
        'label' => __( 'Featured Image'),
        'type' => \Elementor\Controls_Manager::MEDIA
      ]
    );
  }

  add_action('init', 'my_remove_editor_from_post_type');
  function my_remove_editor_from_post_type() {
    remove_post_type_support( 'page', 'editor' );
  }

  if (!$util->isAdmin() && !$disable_non_user_dashboard) {

    // Add code after opening body tag.
    add_action( 'in_admin_header', 'wpdoc_add_custom_body_open_code' );
    add_action( 'wp_dashboard_setup', 'add_custom_body_open_code' );

    function add_custom_body_open_code() {
      $screen = get_current_screen();
      if ($screen->id == "dashboard") {
        get_template_part("theme/admin/_user-dashboard");
      }
    }

  }

  function insertTemplateURI() {
    echo "<script>
            var TEMPLATE_URL = '".__TEMPLATE_URL."';
            var ADMIN_URL = '". admin_url() ."'
          </script>
        ";
  }
  add_action( 'admin_head', 'insertTemplateURI' );

}else{
  global $error;
  // Elementor does not exists and theme should be deprecated.
  $message = __(
    'This theme is designed to work perfectly with Elementor Page Builder plugin.',
    'wer-theme-base'
  );
  new WP_Error('broke', $message);
}