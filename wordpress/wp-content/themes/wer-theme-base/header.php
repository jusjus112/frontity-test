<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 */

//defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--

 __        __     _  ____    __  __            _  _
 \ \      / /___ ( )|  _ \  |  \/  |  ___   __| |(_)  __ _
  \ \ /\ / // _ \|/ | |_) | | |\/| | / _ \ / _` || | / _` |
   \ V  V /|  __/   |  _ <  | |  | ||  __/| (_| || || (_| |
    \_/\_/  \___|   |_| \_\ |_|  |_| \___| \__,_||_| \__,_|

 https://www.wermedia.nl - It's our business to improve yours

-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php get_template_part("theme/_header-meta"); ?>
    <?php wp_head(); ?>
  </head>
<body <?php body_class(); ?>>
<?php

wer_body_open();

//if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
  get_template_part( 'theme/_header' );
//}