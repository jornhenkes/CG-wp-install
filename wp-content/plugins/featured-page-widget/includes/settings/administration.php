<?php
if ( preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']) ) {
     die('You are not allowed to call this page directly.');
}
/**
 * admin.php - View for the administration tab.
 *
 * @package Featured Page Widget
 * @subpackage includes
 * @author GrandSlambert
 * @copyright 2009-2011
 * @access public
 * @since 1.4
 */
?>

<div class="postbox">
     <h3 class="handl" style="margin:0;padding:3px;cursor:default;">
          <?php _e('Administration', 'featured-page-widget'); ?>
     </h3>
     <div class="table featured-page-settings-table">
          <table class="form-table cp-table">
               <tbody>
                    <tr align="top">
                         <th scope="row"><label for="index_press_reset_options"><?php _e('Reset to default: ', 'featured-page-widget'); ?></label></th>
                         <td><input type="checkbox" id="index_press_reset_options" name="confirm-reset-options" value="1" onclick="featured_page_reset_options(this)" /></td>
                    </tr>
                    <!--
                    <tr align="top">
                         <th scope="row"><label for="index_press_backup_options"><?php _e('Back-up Options: ', 'featured-page-widget'); ?></label></th>
                         <td><input type="checkbox" id="index_press_backup_options" name="confirm-backup-options" value="1" onclick="backupOptions(this)" /></td>
                    </tr>
                    <tr align="top">
                         <th scope="row"><label for="index_press_restore_options"><?php _e('Restore Options: ', 'featured-page-widget'); ?></label></th>
                         <td><input type="file" id="index_press_restore_options" name="featured-page-widget-restore-options"/></td>
                    </tr>
                    -->
               </tbody>
          </table>
     </div>
</div>