<?php

if ( preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']) ) {
     die('You are not allowed to call this page directly.');
}
/**
 * template_tags.php - Tempalte tags for the featured page widget plugin.
 *
 * @package Featured Page Widget
 * @subpackage includes
 * @author GrandSlambert
 * @copyright 2009-2011
 * @access public
 * @since 2.0
 */
if ( !function_exists('get_the_featured_post_image') ) {

     function get_the_featured_post_image($post_id = NULL) {
          global $this_instance, $_wp_additional_image_sizes;
          $post_id = ( NULL === $post_id ) ? get_the_ID() : $post_id;

          $content = '';
          $postimage = false;

          if ( $postimage = get_post_meta($post_id, 'featured-image', true) ) {
               switch ($this_instance['thumbnail_size']) {
                    default:
                         $width = $_wp_additional_image_sizes[$this_instance['thumbnail_size']]['width'];
                         $height = $_wp_additional_image_sizes[$this_instance['thumbnail_size']]['height'];
               }
               $content.= '<img src="' . $postimage . '" width="' . $width . '" height="' . $height . '" border="0" class="align' . $this_instance['imagealign'] . ' fpw-image-' . $this_instance['imagealign'] . '" />';
          } elseif ( function_exists('has_post_thumbnail') and has_post_thumbnail() and $this_instance['useimageas'] == 'image' ) {
               $content.= get_the_post_thumbnail($post_id, $this_instance['thumbnail_size'], array('title' => get_the_title(), 'class'=>'align'. $this_instance['linkalign']));
          }

          if ( $content != '' ) {
               return '<a title="' . get_the_title() . '" href="' . get_permalink() . '">' . $content . '</a>';
          } else {
               return false;
          }
     }

}

if ( !function_exists('has_featured_post_image') ) {

     /**
      * Check if the post has a featured image.
      * 
      * @param int $post_id
      * @return boolean
      */
     function has_featured_post_image($post_id = NULL) {
          return get_the_featured_post_image($post_id);
     }

}
if ( !function_exists('the_featured_post_image') ) {

     /**
      * Get the featured post image.
      *
      * @param int $post_id
      */
     function the_featured_post_image($post_id = NULL) {
          echo get_the_featured_post_image($post_id);
     }

}

if ( !function_exists('get_the_featured_post_content') ) {

     /**
      * Return the content to display with the featured post.
      *
      * @global array $this_instance
      * @param int $post_id
      * @return string
      */
     function get_the_featured_post_content($post_id = NULL, $length = NULL, $notags = NULL) {
          global $this_instance;

          $length = ( NULL === $length) ? $this_instance['length'] : $length;
          $notags = ( NULL === $notags) ? false : $notags;
          $post_id = ( NULL === $post_id ) ? get_the_ID() : $post_id;

          if ( $excerpt = get_post_meta($post_id, 'featured-text', true) ) {
               $content = $excerpt;
          } else {
               $FP = new FeaturedPageWidget();
               $content = $FP->trim_excerpt(get_the_content(), $length, $notags);
          }

          return $content;
     }

}

if ( !function_exists('the_featured_post_content') ) {

     /**
      * Display the content for the featured post.
      *
      * @param int $post_id
      */
     function the_featured_post_content($post_id = NULL, $length = NULL, $notags = NULL) {
          echo get_the_featured_post_content($post_id, $length, $notags);
     }

}

if ( !function_exists('get_the_featured_post_more_link') ) {

     /**
      * Get the more link for the current featured post.
      *
      * @param int $post_id
      * @return string
      */
     function get_the_featured_post_read_more_link($post_id = NULL) {
          global $this_instance;
          $post_id = ( NULL === $post_id ) ? get_the_ID() : $post_id;

          $content = '<a title="' . get_the_title() . '" href="' . get_permalink() . '">';

          if ( $post_image = get_post_meta($post_id, 'featured-link', true) ) {
               $content.= '<img src="' . $post_image . '" border="0" class="align' . $this_instance['imagealign'] . ' fpw-image-' . $this_instance['imagealign'] . '" />';
          } elseif ( function_exists('has_post_thumbnail') and has_post_thumbnail() and $this_instance['useimageas'] == 'link' ) {
               $content.= get_the_post_thumbnail($post_id, $this_instance['thumbnail_size']);
          } else {
               $content.= $this_instance['linktext'];
          }

          $content.= '</a>';
          return $content;
     }

}

if ( !function_exists('the_featured_post_read_more_link') ) {

     function the_featured_post_read_more_link($post_id = NULL) {
          echo get_the_featured_post_read_more_link($post_id);
     }

}