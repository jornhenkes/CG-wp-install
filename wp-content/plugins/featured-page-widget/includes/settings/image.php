<?php
if ( preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']) ) {
     die('You are not allowed to call this page directly.');
}
/**
 * image.php - Settings page.
 *
 * @package Featured Page Widget
 * @subpackage includes/settings
 * @author GrandSlambert
 * @copyright 2009-2011
 * @access public
 * @since 1.4
 */
?>

<div class="postbox">
     <h3 class="handl" style="margin:0;padding:3px;cursor:default;">
          <?php _e('Default Image Settings', 'featured-page-widget'); ?>
     </h3>
     <div class="table featured-page-settings-table">
          <table class="form-table">
               <tr align="top">
                    <th scope="row"><label for="widget_image_align"><?php _e('Default Image Alignment', 'featured-page-widget'); ?></label></th>
                    <td><select name="<?php print $this->optionsName; ?>[image_align]" id="widget_image_align">
                              <option value="none" <?php selected($this->options->image_align, 'none'); ?> ><?php _e('No Image Alignment', 'featured-page-widget'); ?></option>
                              <option value="left" <?php selected($this->options->image_align, 'left'); ?> ><?php _e('Align Left', 'featured-page-widget'); ?></option>
                              <option value="center" <?php selected($this->options->image_align, 'center'); ?> ><?php _e('Align Centered', 'featured-page-widget'); ?></option>
                              <option value="right" <?php selected($this->options->image_align, 'right'); ?> ><?php _e('Align Right', 'featured-page-widget'); ?></option>
                         </select>
                    </td>
               </tr>
               <tr align="top">
                    <th scope="row"><label for="thumbnail_size"><?php _e('Default Thumbnail Size', 'featured-page-widget'); ?></label></th>
                    <td>
                         <select id="thumbnail_size" name="<?php print $this->optionsName; ?>[thumbnail_size]">
                              <option value="none" <?php selected($this->options->thumbnail_size, 'none'); ?> ><?php _e('No Thumbnail', 'featured-page-widget'); ?></option>
                              <option value="thumbnail" <?php selected($this->options->thumbnail_size, 'thumbnail'); ?> ><?php _e('Thumbnail (150x150px)', 'featured-page-widget'); ?></option>
                              <option value="medium" <?php selected($this->options->thumbnail_size, 'medium'); ?> ><?php _e('Medium (300x300px)', 'featured-page-widget'); ?></option>
                              <option value="large" <?php selected($this->options->thumbnail_size, 'large'); ?> ><?php _e('Large (640x640px)', 'featured-page-widget'); ?></option>

                              <?php foreach ( $_wp_additional_image_sizes as $name => $size ) : ?>
                                   <option value="<?php echo $name; ?>" <?php selected($this->options->thumbnail_size, $name); ?> ><?php echo $name; ?> (<?php echo $size['width']; ?>x<?php echo $size['height']; ?>px)</option>
                              <?php endforeach; ?>
                              </select>     
                         </td>
                    </tr>
                    <tr align="top">
                         <th valign="top" scope="row"><label for="small_image"><?php _e('Small image size', 'featured-page-widget'); ?></label></th>
                         <td>
                              <input type="text" name="<?php print $this->optionsName; ?>[small-image][0]" id="small_image" value="<?php echo $this->options->small_image[0]; ?>" /> X
                              <input type="text" name="<?php print $this->optionsName; ?>[small-image][1]" id="small_image" value="<?php echo $this->options->small_image[1]; ?>" /> px
                         </td>
                    </tr>
                    <tr align="top">
                         <th valign="top" scope="row"><label for="full_image"><?php _e('Full image size', 'featured-page-widget'); ?></label></th>
                         <td>
                              <input type="text" name="<?php print $this->optionsName; ?>[full-image][0]" id="full_image" value="<?php echo $this->options->full_image[0]; ?>" /> X
                              <input type="text" name="<?php print $this->optionsName; ?>[full-image][1]" id="full_image" value="<?php echo $this->options->full_image[1]; ?>" /> px
                         </td>
                    </tr>
                    <tr align="top">
                         <th valign="top" scope="row"><label for="hard_crop"><?php _e('Crop Method', 'featured-page-widget'); ?></label></th>
                         <td>
                              <label><input type="radio" name="<?php print $this->optionsName; ?>[hard-crop]" id="hard_crop_yes" value="1" <?php checked($this->options->hard_crop, 1); ?> /> <?php _e('Hard - Maintain aspect', 'featured-page-widget'); ?> </label>
                              <input type="radio" name="<?php print $this->optionsName; ?>[hard-crop]" id="hard_crop_no" value="0" <?php checked($this->options->hard_crop, 0); ?> /> <?php _e('Soft - Proportional resize', 'featured-page-widget'); ?> </label>
                         </td>
                    </tr>
                    <tr align="top">
                         <th valign="top" scope="row"><label for="warning"><strong><?php _e('Image Notice', 'featured-page-widget'); ?></strong></label></th>
                         <td>
                         <?php
                                   if ( class_exists('RegenerateThumbnails') ) {
                                        printf(__('If you change the sizes of these images, you must run the %1$s command from %2$s by %3$s to create and register the images.', 'featured-page-widget'),
                                                '<a href="' . admin_url('tools.php?page=regenerate-thumbnails') . '">' . __('Regenerate Thumbnails', 'featured-page-widget') . '</a>',
                                                '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' . __('Regenerate Thumbnails', 'featured-page-widget') . '</a>',
                                                '<a href="http://profiles.wordpress.org/users/Viper007Bond/" target="_blank">Viper007Bond</a>'
                                        );
                                   } else {
                                        printf(__('If you change the sizes of the images on this page, your existing images will not automatically be resized. I suggest using the %1$s plugin by %2$s which will recreate all the image sizes. This only needs to be done if you change these image sizes.', 'featured-page-widget'),
                                                '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' . __('Regenerate Thumbnails', 'featured-page-widget') . '</a>',
                                                '<a href="http://profiles.wordpress.org/users/Viper007Bond/" target="_blank">Viper007Bond</a>'
                                        );
                                   }
                         ?>
                    </td>

               </tr>
          </table>
     </div>
</div>