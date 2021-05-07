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
 * @package    Widgets.class.php
 * @author     We'R Media (https://www.wermedia.nl)
 * @copyright  2021 - We'R Social Media B.V.
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0.0
 * @see        google's style & structure: (https://google.github.io/styleguide/)
 * @since      File available since Release 1.0.0
 */

require_once "socials/Socials.widget.php";
require_once "post-carousel/PostCarousel.widget.php";
require_once "google-map/GoogleMap.widget.php";
require_once "portfolio/Portfolio.php";

class Widgets {

  public static function getWidgets(){
    return array(
      new Socials(),
      new PostCarousel(),
      new GoogleMap(),
      new Portfolio()
    );
  }

}