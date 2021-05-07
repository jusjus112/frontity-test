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
 * @package    single.php
 * @author     We'R Media (https://www.wermedia.nl)
 * @copyright  2021 - We'R Social Media B.V.
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Version
 * @link       http://pear.php.net/package/PackageName
 * @see        google's style & structure: (https://google.github.io/styleguide/)
 * @since      File available since Release $Version
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>
<?php
while ( have_posts() ) : the_post();
  ?>

  <main <?php post_class( 'site-main' ); ?> role="main">
    <header class="page-header">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>
    <div class="page-content">
      <?php the_content(); ?>
      <div class="post-tags">
        <?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
      </div>
      <?php wp_link_pages(); ?>
    </div>

    <?php comments_template(); ?>
  </main>

<?php
endwhile;
