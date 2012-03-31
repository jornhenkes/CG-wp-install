<?php
if ( preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']) ) {
     die('You are not allowed to call this page directly.');
}
/**
 * widget-form.php - For for managing the widget..
 *
 * @package Featured Page Widget
 * @subpackage includes
 * @author GrandSlambert
 * @copyright 2009-2011
 * @access public
 * @since 0.1
 */
?>

<p>
     <label for="<?php print $this->get_field_id('title'); ?>"><?php _e('Widget Title (Leave blank to use page title)', 'featured-page-widget'); ?></label>
     <input id="<?php print $this->get_field_id('title'); ?>" name="<?php print $this->get_field_name('title'); ?>" type="text" value="<?php print $instance['title']; ?>" />
     <label>
          <input name="<?php print $this->get_field_name('linktitle'); ?>" id="<?php print $this->get_field_id('linktitle'); ?>" type="checkbox" value="1" <?php checked($instance['linktitle']); ?> /> <?php _e('Link title to Entry', 'featured-page-widget'); ?></label>
</p>
<h3><?php _e('Contents', 'featured-page-widget'); ?></h3>

<p>
     <label for="<?php print $this->get_field_id('category'); ?>"><?php _e('Feature posts in', 'featured-page-widget'); ?></label>
     <?php wp_dropdown_categories(array('name' => $this->get_field_name('category'), 'id' => $this->get_field_id('category'), 'show_option_none' => __('Choose individual pages below', 'featured-page-widget'), 'selected' => $instance['category'] )); ?>
</p>

<p>
     <label for="<?php print $this->get_field_id('page'); ?>">
          <?php _e('Featured Page(s) (CTRL-Click to select multiple)', 'featured-page-widget'); ?>
     </label>
     <select name="<?php print $this->get_field_name('page'); ?>[]" size="1" style="height:100px;" multiple="multiple" id="<?php print $this->get_field_id('page'); ?>">
          <?php print $this->get_pages($instance['page']); ?>
     </select>
</p>
<p>
     <label for="<?php print $this->get_field_id('template'); ?>">
          <?php _e('Template', 'featured-page-widget'); ?> :
     </label>
     <select name="<?php print $this->get_field_name('template'); ?>" id="<?php print $this->get_field_id('template'); ?>">
          <?php foreach ( $this->get_widget_templates() as $template => $name ) : ?>
               <option value="<?php echo $template; ?>" <?php selected($instance['template'], $template); ?>><?php echo $name; ?></option>
          <?php endforeach; ?>
          </select>
     </p>
     <p>
          <label for="<?php print $this->get_field_id('items'); ?>">
          <?php _e('How many to display per page', 'featured-page-widget'); ?> :
          </label>
          <select name="<?php print $this->get_field_name('items'); ?>" id="<?php print $this->get_field_id('items'); ?>">
               <option value="all" <?php selected($instance['items'], 'all'); ?>><?php _e('Show All', 'featured-page-widget'); ?></option>
          <?php for ( $ictr = 1; $ictr <= 10; ++$ictr ) : ?>
                    <option value="<?php echo $ictr; ?>" <?php selected($instance['items'], $ictr); ?>><?php echo $ictr; ?></option>
          <?php endfor; ?>
               </select>
          </p>
          <p>
               <label>
                    <input name="<?php print $this->get_field_name('hidewidget'); ?>" id="<?php print $this->get_field_id('hidewidget'); ?>" type="checkbox" value="1" <?php checked($instance['hidewidget'], 1); ?> />
          <?php _e('Do not include current post in content.', 'featured-page-widget'); ?>
               </label>
          </p>
          <p>
               <label for="<?php print $this->get_field_id('length'); ?>">
          <?php _e('Excerpt Length:', 'featured-page-widget'); ?>
               </label>
               <input id="<?php print $this->get_field_id('length'); ?>" name="<?php print $this->get_field_name('length'); ?>" type="text" value="<?php print $instance['length']; ?>" />
          </p>
          <h3><?php _e('Page Links', 'featured-page-widget'); ?></h3>
          <p>
               <label for="<?php print $this->get_field_id('target'); ?>">
          <?php _e('Link Target:', 'featured-page-widget'); ?>
               </label>
               <select name="<?php print $this->get_field_name('target'); ?>" id="<?php print $this->get_field_id('target'); ?>">
                    <option value="0" <?php selected($instance['target'], false); ?>><?php _e('No Link Target', 'featured-page-widget'); ?></option>
                    <option value="_blank" <?php selected($instance['target'], '_blank'); ?>><?php _e('New Window', 'featured-page-widget'); ?></option>
                    <option value="_top" <?php selected($instance['target'], '_top'); ?>><?php _e('Top Window', 'featured-page-widget'); ?></option>
               </select>
          </p>
          <p>
               <label for="<?php print $this->get_field_id('linkalign'); ?>">
          <?php _e('Link Alignment:', 'featured-page-widget'); ?>
               </label>
               <select name="<?php print $this->get_field_name('linkalign'); ?>" id="<?php print $this->get_field_id('linkalign'); ?>">
                    <option value="none" <?php selected($instance['linkalign'], 'none'); ?> ><?php _e('No Link Alignment', 'featured-page-widget'); ?></option>
                    <option value="left" <?php selected($instance['linkalign'], 'left'); ?> ><?php _e('Align Left', 'featured-page-widget'); ?></option>
                    <option value="center" <?php selected($instance['linkalign'], 'center'); ?> ><?php _e('Align Centered', 'featured-page-widget'); ?></option>
                    <option value="right" <?php selected($instance['linkalign'], 'right'); ?> ><?php _e('Align Right', 'featured-page-widget'); ?></option>
               </select>
          </p>
          <h3><?php _e('Featured Image Usage', 'featured-page-widget'); ?></h3>

<?php if ( function_exists('has_post_thumbnail') ) : ?>
                         <p>
                              <label for="<?php print $this->get_Field_id('useimageas'); ?>">
          <?php _e('Use thumbnail as', 'featured-page-widget'); ?>
                    </label>
                    <select name="<?php print $this->get_field_name('useimageas'); ?>" id="<?php print $this->get_field_id('useimageas'); ?>">
                         <option value="none" <?php selected($instance['useimageas'], 'none'); ?>><?php _e('Ignore post thumbnail', 'featured-page-widget'); ?></option>
                         <option value="image" <?php selected($instance['useimageas'], 'image'); ?>><?php _e('Page Image', 'featured-page-widget'); ?></option>
                         <option value="link" <?php selected($instance['useimageas'], 'link'); ?>><?php _e('Read More Link', 'featured-page-widget'); ?></option>
                    </select>
               </p>
<?php endif; ?>

                         <p>
                              <label for="<?php print $this->get_field_id('imagealign'); ?>"><?php _e('Image Alignment:', 'featured-page-widget'); ?></label>
                              <select name="<?php print $this->get_field_name('imagealign'); ?>" id="<?php print $this->get_field_id('imagealign'); ?>">
                                   <option value="none" <?php selected($instance['imagealign'], 'none'); ?> ><?php _e('No Image Alignment', 'featured-page-widget'); ?></option>
                                   <option value="left" <?php selected($instance['imagealign'], 'left'); ?> ><?php _e('Align Left', 'featured-page-widget'); ?></option>
                                   <option value="center" <?php selected($instance['imagealign'], 'center'); ?> ><?php _e('Align Center', 'featured-page-widget'); ?></option>
                                   <option value="right" <?php selected($instance['imagealign'], 'right'); ?> ><?php _e('Align Right', 'featured-page-widget'); ?></option>
                              </select>
                         </p>
                         <p>
                              <label for="<?php print $this->get_field_id('thumbnail_size'); ?>"><?php _e('Image Size:', 'featured-page-widget'); ?></label>
                              <select id="<?php echo $this->get_field_id('thumbnail_size'); ?>" name="<?php echo $this->get_field_name('thumbnail_size'); ?>">
                                   <option value="none" <?php selected($instance['thumbnail_size'], 'none'); ?> ><?php _e('No Thumbnail', 'featured-page-widget'); ?></option>
                                   <option value="thumbnail" <?php selected($instance['thumbnail_size'], 'thumbnail'); ?> ><?php _e('Thumbnail (150x150px)', 'featured-page-widget'); ?></option>
                                   <option value="medium" <?php selected($instance['thumbnail_size'], 'medium'); ?> ><?php _e('Medium (300x300px)', 'featured-page-widget'); ?></option>
                                   <option value="large" <?php selected($instance['thumbnail_size'], 'large'); ?> ><?php _e('Large (640x640px)', 'featured-page-widget'); ?></option>

          <?php foreach ( $_wp_additional_image_sizes as $name => $size ) : ?>
                              <option value="<?php echo $name; ?>" <?php selected($instance['thumbnail_size'], $name); ?> ><?php echo $name; ?> (<?php echo $size['width']; ?>x<?php echo $size['height']; ?>px)</option>
          <?php endforeach; ?>
     </select>
</p>
