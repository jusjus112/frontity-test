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

class Utilities {

  /**
   * Get the icon based on the post id given by WordPress.
   * Returns an unique icon or bootstrap by default.
   *
   * @see FontAwesome Icons: https://fontawesome.com
   * @param $id String post id
   * @return string font icon id
   */
  public static function getIconByName($id){
    switch ($id){
      case "menu-dashboard": return "card-list";
      case "menu-media": return "camera";
      case "menu-posts-elementor_library": return "archive";
      case "menu-users": return "people";
      case "menu-tools": return "gear";
      default: return "bootstrap";
    }
  }

  /**
   * Formatting given assets based on their given extension.
   * It will translate imports such as 'script' to '/path/script.min.js'.
   *
   * @see Google's style & structure: (https://google.github.io/styleguide/)
   * @see Utilities::format($extension, $array = array())
   * @format [style name] => [file name (without _ and .min.css )]
   * @param $extension String extension name like css or js
   * @param array $array array with the given keys and values
   * @return array returns formatted array with the proper paths
   */
  public static function format(String $extension, array $array = array()){
    // Return the same array when extension is empty
    if (empty($extension)) return $array;
    $_LIB_ARRAY = array();
    $_FORMATTED = array();

    foreach ($array as $key => $value){
      // Check if key is in the node or libs folder
      if (preg_match('/node*|https*/i', $key)){
        // Remove the keys from the main array and rearrange them
        $_LIB_ARRAY[$key] = $value;
        continue;
      }
      // Replace the key with the formatted values
      $first = preg_filter('/$/', '.min.' . $extension, $key);
      $second = preg_filter('/^/', 'assets/' . $extension . '/' . ($extension == "css" ? "_" : ""), $first);

      $_FORMATTED[$second] = $value;
    }

    // Return the array together with the formatted keys
    return array_merge($_FORMATTED, $_LIB_ARRAY);
  }

  /**
   * @param String $haystack
   * @param String $needle
   * @return bool
   */
  public static function endsWith(String $haystack, String $needle) {
    $length = strlen( $needle );
    if( !$length ) {
      return true;
    }
    return substr( $haystack, -$length ) === $needle;
  }

  /**
   * @param array $array
   * @return string
   */
  public static function array2Uri(array $array = array()){
    $str = "";
    foreach ($array as $key){
      $str .= '/' . $key;
    }
    return $str;
  }

  /**
   * @param String $string
   * @return array
   */
  public static function uri2String(String $string = ""){
    $array = array();
    foreach (explode("/", $string) as $key){
      array_push($key);
    }
    return $array;
  }

}