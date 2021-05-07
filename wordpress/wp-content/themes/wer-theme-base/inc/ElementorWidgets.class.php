<?php

/**
 * PHP version 7.4+
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @project    Template14
 * @package    ElementorWidgets.class.php
 * @author     We'R Media (https://www.wermedia.nl)
 * @copyright  2021 - We'R Social Media B.V.
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0.0
 * @link       http://pear.php.net/package/PackageName
 * @see        google's style & structure: (https://google.github.io/styleguide/)
 * @since      File available since Release 1.0.0
 */

class ElementorWidgets {

  protected static $_INSTANCE = null;

  public static function getInstance() {
    if (!isset(static::$_INSTANCE)) {
      static::$_INSTANCE = new static;
    }
    return static::$_INSTANCE;
  }

  protected function __construct() {
    add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
  }

  public function register_widgets() {
    include_once "widgets/Widgets.class.php";
    foreach(Widgets::getWidgets() as $key){
      \Elementor\Plugin::instance()->widgets_manager->register_widget_type($key);
    }
  }
}

add_action( 'init', 'my_elementor_init' );
function my_elementor_init() {
  ElementorWidgets::getInstance();
}

function add_elementor_widget_categories( $elements_manager ) {
  $elements_manager->add_category(
    'wer-media',
    [
      'title' => "We'R Media",
      'icon' => 'fa fa-plug',
    ]
  );

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );