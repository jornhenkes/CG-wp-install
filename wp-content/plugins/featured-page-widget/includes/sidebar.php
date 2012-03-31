<?php
if ( preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']) ) {
     die('You are not allowed to call this page directly.');
}
/**
 * footer.php - Footer for all plugin management pages.
 *
 * @package Featured Page Widget
 * @subpackage includes
 * @author GrandSlambert
 * @copyright 2009-2011
 * @access public
 * @since 1.4
 */
?>
<div class="postbox" >
     <h3 class="handl" style="margin:0; padding:3px;cursor:default;"><?php _e('Plugin Information', 'featured-page-widget'); ?></h3>
     <div style="padding:5px;">
          <p><?php _e('This page sets the defaults for each widget. Each of these settings can be overridden when you add a featured page to the sidebar.', 'featured-page-widget'); ?></p>
          <p><?php _e('You are using', 'featured-page-widget'); ?> <strong> <a href="http://plugins.grandslambert.com/plugins/featured-page-widget.html" target="_blank"><?php print $this->pluginName; ?> <?php print $this->version; ?></a></strong> by <a href="http://grandslambert.com" target="_blank">GrandSlambert</a>.</p>
     </div>
</div>
<div class="postbox">
     <h3 class="handl" style="margin:0; padding:3px;cursor:default;"><?php _e('Usage', 'featured-page-widget'); ?></h3>
     <div style="padding:5px;">
          <p>
               <?php
               /* translators: This is displayed in the "Usage" on the settings page. The parameter will be replaced with a link to the Appearance > Widgets page. */
               printf(__('After setting the defaults, you can add widgets on the %1$s screen. Each of the defaults to the left can be overridden for each individual instance. You can also customize how the widget text appears using the following custom fields on the page.', 'featured-page-widget'), '<a href="' . get_option('siteurl') . '/wp-admin/widgets.php">' . __('Appearance &raquo; Widgets', 'featured-page-widget') . '</a>');
               ?>
          </p>
          <ul>
               <li><strong>featured-text</strong>: <?php _e('The plugin will use the text in this custom field in place of an excerpt from the page. Full HTML is supported in this field.', 'featured-page-widget'); ?></li>
               <li><strong>featured-image</strong>: <?php _e('Add an image to the widget using the alignment set in the widget settings.', 'featured-page-widget'); ?></li>
               <li><strong>featured-link</strong>: <?php _e('A full URL to an image to use in place of a text link.', 'featured-page-widget'); ?></li>
          </ul>
     </div>
</div>
<div class="postbox">
     <h3 class="handl" style="margin:0; padding:3px;cursor:default;">
          <?php _e('Recent Contributors', 'featured-page-widget'); ?>
          </h3>
          <div style="padding:5px;">
               <p><?php _e('GrandSlambert would like to thank these wonderful contributors to this plugin!', 'featured-page-widget'); ?></p>
          <?php $this->contributor_list(); ?>
     </div>
</div>