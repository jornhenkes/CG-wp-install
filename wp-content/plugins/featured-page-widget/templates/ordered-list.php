<?php
if ( preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']) ) {
     die('You are not allowed to call this page directly.');
}
/**
 * order-list.php - Displays entries as an ordered list with the excerpt as the title of the link.
 *
 * This can be copied to a folder named 'featured-page-widget' in your theme
 * to customize the output.
 *
 * @package Featured Page Widget
 * @subpackage templates
 * @author GrandSlambert
 * @copyright 2009-2011
 * @access public
 * @since 2.0
 */
?>
<ul class="featured-post-list">
     <?php if ( $featured->have_posts() ) : while ($featured->have_posts()) : $featured->the_post(); ?>

               <li id="featured_post_title_<?php the_id(); ?>" class="featured-post-title">
                    <a href="<?php the_permalink(); ?>" title="<?php the_featured_post_content(get_the_id(), 10, true); ?> "><?php the_title(); ?></a>
               </li>

     <?php endwhile;
          endif; ?>
</ul>
