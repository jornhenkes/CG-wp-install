<?php
if ( preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']) ) {
     die('You are not allowed to call this page directly.');
}
/**
 * links.php - The Default Links settings tab.
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
          <?php _e('Default Link Settings', 'featured-page-widget'); ?>
     </h3>
     <div class="table featured-page-settings-table">
          <table class="form-table">
               <tr align="top">
                    <th scope="row"><label for="widget_link_text"><?php _e('Link Text when no link image is present', 'featured-page-widget'); ?></label></th>
                    <td><input name="<?php print $this->optionsName; ?>[link_text]" id="widget_link_text" type="text" value="<?php print $this->options->link_text; ?>" /></td>
               </tr>
               <tr align="top">
                    <th scope="row"><label for="widget_link_title"><?php _e('Link Title to Post', 'featured-page-widget'); ?></label></th>
                    <td><input name="<?php print $this->optionsName; ?>[link_title]" id="widget_link_title" type="checkbox" value="1" <?php checked($this->options->link_title, 1); ?> /></td>
               </tr>
               <tr align="top">
                    <th scope="row"><label for="widget_target"><?php _e('Default Link Target', 'featured-page-widget'); ?></label></th>
                    <td><select name="<?php print $this->optionsName; ?>[target]" id="widget_target">
                              <option><?php _e('No Link target', 'featured-page-widget'); ?></option>
                              <option value="_blank" <?php selected($this->options->target, '_blank'); ?> ><?php _e('New Window', 'featured-page-widget'); ?></option>
                              <option value="_top" <?php selected($this->options->target, '_top'); ?> ><?php _e('Top Window', 'featured-page-widget'); ?></option>
                         </select></td>
               </tr>
               <tr align="top">
                    <th scope="row"><label for="widget_link_align"><?php _e('Default Link Alignment', 'featured-page-widget'); ?></label></th>
                    <td><select name="<?php print $this->optionsName; ?>[link_align]" id="widget_link_align">
                              <option value="none" <?php selected($this->options->link_align, 'none'); ?> ><?php _e('No Link Alignment', 'featured-page-widget'); ?></option>
                              <option value="left" <?php selected($this->options->link_align, 'left'); ?> ><?php _e('Align Left', 'featured-page-widget'); ?></option>
                              <option value="center" <?php selected($this->options->link_align, 'center'); ?> ><?php _e('Align Centered', 'featured-page-widget'); ?></option>
                              <option value="right" <?php selected($this->options->link_align, 'right'); ?> ><?php _e('Align Right', 'featured-page-widget'); ?></option>
                         </select>
                    </td>
               </tr>
          </table>
     </div>
</div>