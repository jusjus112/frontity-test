<?php


class ElementorChecker {

  /**
   * Function to check if the plugin Elementor exists inside the WordPress installation.
   * Elementor is the best FREE WordPress Website Builder, with over 5 million active installs.
   * Create beautiful sites and pages using a drag and drop interface.
   *
   * @return bool returns if elementor exists inside the current wordpress installation.
   */
  public function elementorExists(){
    return function_exists( 'elementor_pro_load_plugin' );
  }

  /**
   * Get the HTML warning for when Elementor is not installed in the WordPress installation.
   * Returns either a markdown for the admin dashboard, or for any regular visitor.
   *
   * @return string returns the error with the static warning.
   */
  public function getWarning(){
    // TODO: Check if us normal visitor, then return something else.
    return '<div class="alert alert-danger" role="alert">Elementor is not installed!</div>';
  }

}