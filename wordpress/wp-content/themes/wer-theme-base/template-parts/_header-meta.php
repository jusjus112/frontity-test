<?php
// Get the current post id
$post_id = get_the_ID();

// Get the page settings manager
$page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

// Get the settings model for current post
$page_settings_model = $page_settings_manager->get_model( $post_id );

// Retrieve the color we added before
$menu_item_color = $page_settings_model->get_settings( 'thumbnail' );

set_post_thumbnail($post_id, $menu_item_color['id']);