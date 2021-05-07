<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
//$check = new ElementorChecker();
//if (!$check->elementorExists()){
//  echo $check->getWarning();
//  return;
//}

get_header();

if ( is_singular() ) {
  get_template_part( 'theme/single' );
}else {
  if (is_404()){
    get_template_part( 'theme/404' );
    return;
  }
  the_content();
}

get_footer();