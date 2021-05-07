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

class Endpoints {

  public function register(){
    $elementorStyles = $this->openStyleDir("css", WP_CONTENT_DIR . '\plugins\elementor\assets');
    return $elementorStyles;
  }

  /**
   *
   * @uses Utilities::endsWith($haystack, $needle)
   * @uses openStyleDir($dir, $subDir)
   * @param String $dir
   * @param String $subDir
   * @return array
   */
  private function openStyleDir(String $dir, String $subDir = ""){
    if (empty($dir)){
      return array();
    }

    $data = array();
    $uri = $subDir . '\\' . $dir;
    if ($handle = opendir($uri)) {
      while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
          if (!Utilities::endsWith($entry, ".css")){
            $subDir .= "\\" . $entry;
            $data = array_merge($data, $this->openStyleDir($entry, $uri));
            continue;
          }
          array_push($data, $uri . '\\' .$entry);
        }
      }
    }
    return $data;
  }

  /**
   * Enqueuing the styles assets for this theme. Formatting it to
   * google's style & structure: (https://google.github.io/styleguide/)
   *
   * @uses Utilities::format($extension, $array = array())
   * @format [style name] => [file name (without _ and .min.css )]
   * @used const __API_VERSION = "v1" (Default)
   * @see enqueue_assets()
   */
  public function registerStyleEndpoints(){
    add_action( 'rest_api_init', function () {
      register_rest_route( 'wer/' . __API_VERSION, '/styles/', array(
        'methods' => 'GET',
        'callback' => function(){
          return $this->register();
        },
      ) );
    } );
  }

}