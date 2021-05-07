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
 * @package    Imports.class.php
 * @author     We'R Media (https://www.wermedia.nl)
 * @copyright  2021 - We'R Social Media B.V.
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0.0
 * @link       http://pear.php.net/package/PackageName
 * @see        google's style & structure: (https://google.github.io/styleguide/)
 * @since      File available since Release 1.0.0
 */

class Imports {

  /**
   * Enqueuing the styles assets for this theme. Formatting it to
   * google's style & structure: (https://google.github.io/styleguide/)
   *
   * @uses Utilities::format($extension, $array = array())
   * @format [style name] => [file name (without _ and .min.css )]
   * @return string[] Minified stylesheets to import
   * @see enqueue_assets()
   */
  public static function getStyles(){
    // Add theme custom styles.
    // Add external libraries from the includes folder
    return \Utilities::format('css', array(
      "admin-style" => array(),
      "main" => array(),
      "node_modules/bootstrap/dist/css/bootstrap.min.css" => array(),
      "node_modules/bootstrap-icons/font/bootstrap-icons.css" => array(),
      "node_modules/slick-carousel/slick/slick.css" => array(),
      "node_modules/sweetalert2/dist/sweetalert2.min.css" => array(),
    ));
  }

  /**
   * Enqueuing the script assets for this theme. Formatting it to
   * google's style & structure: (https://google.github.io/styleguide/)
   * Jquery is required by default, there is no need to require it again!
   *
   * @format [script name] => [file name (without _ and .min.js )]
   * @uses Utilities::format($extension, $array = array())
   * @return string[] Minified scripts to import
   * @see enqueue_assets()
   */
  public static function getScripts(){
    // Add theme custom scripts.
    // Add external libraries from the includes folder
    return \Utilities::format('js', array(
      "admin-style" => array(),
      "script" => array(),
      "node_modules/bootstrap/dist/js/bootstrap.min.js" => array(),
      "node_modules/parallax-js/dist/parallax.min.js" => array(),
      "node_modules/slick-carousel/slick/slick.min.js" => array(),
      "node_modules/sweetalert2/dist/sweetalert2.min.js" => array(),

      // GASP - Greensock
      "node_modules/gsap/dist/gsap.min.js" => array()
    ));
  }

}