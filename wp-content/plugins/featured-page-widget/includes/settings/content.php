<?php
if ( preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']) ) {
     die('You are not allowed to call this page directly.');
}
/**
 * content.php - The Content Settings tab.
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
     <h3 class="handl" style="margin:0;padding:3px;cursor:default;"><?php _e('Default Content Settings', 'featured-page-widget'); ?></h3>
     <div class="table featured-page-settings-table">
          <table class="form-table">
               <tr align="top">
                    <th scope="row"><label for="widget_length"><?php _e('Default Content Length', 'featured-page-widget'); ?></label></th>
                    <td><input name="<?php print $this->optionsName; ?>[length]" id="widget_length" type="text" value="<?php echo $this->options->length; ?>" /></td>
               </tr>
               <tr align="top">
                    <th scope="row"><label for="allowed_tags"><?php _e('Allowed Tags', 'featured-page-widget'); ?></label></th>
                    <td>
                         <input name="<?php print $this->optionsName; ?>[allowed-tags]" id="allowed_tags" type="text" value="<?php echo $this->options->allowed_tags; ?>" /><br />
                         <small><?php _e('A comma seperated list of tags to allow', 'featured-page-widget'); ?></small>
                    </td>
               </tr>
               <tr align="top">
                    <th scope="row"><label for="widget_hide_widget"><?php _e('Hide on Selected Page', 'featured-page-widget'); ?></label></th>
                    <td>
                         <input name="<?php print $this->optionsName; ?>[hide_widget]" id="widget_hide_widget" type="checkbox" value="1" <?php checked($this->options->hide_widget, 1); ?> />
                         <small><?php _e('If only one page is selected, otherwise a different random page is displayed', 'featured-page-widget'); ?></small>
                    </td>
               </tr>
               <tr align="top">
                    <th scope="row"><label for="<?php echo $this->optionsName; ?>_post_types"><?php _e('Post Types to Include', 'featured-page-widget'); ?></label></th>
                    <td>
                         <?php
                         if ( function_exists('get_post_types') ) {
                              $types = get_post_types(array('public' => true));
                         } else {
                              $types = array('post', 'page');
                         }
                         ?>

                         <?php foreach ( $types as $type ) : ?>
                              <label class="featured-page-widget-post-type"><input type="checkbox" name="<?php echo $this->optionsName; ?>[post_types][]" value="<?php echo $type; ?>" <?php checked(in_array($type, $this->options->post_types), 1); ?> /> <?php echo ucfirst($type); ?></label>
                              <?php endforeach; ?>

                    </td>
          </table>
     </div>
</div>