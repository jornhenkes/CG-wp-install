<?php
if ( preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']) ) {
     die('You are not allowed to call this page directly.');
}
/**
 * settings.php - View for the Settings page.
 *
 * @package Better RSS Widget
 * @subpackage includes
 * @author GrandSlambert
 * @copyright 2009-2011
 * @access public
 * @since 1.4
 */
/* Flush the rewrite rules */
global $wp_rewrite, $wp_query;
$wp_rewrite->flush_rules();

if ( isset($_REQUEST['tab']) ) {
     $selectedTab = $_REQUEST['tab'];
} else {
     $selectedTab = 'content';
}

$tabs = array(
     'content' => __('Content Settings', 'featured-page-widget'),
     'links' => __('Link Settings', 'featured-page-widget'),
     'image' => __('Image Settings', 'featured-page-widget'),
     'administration' => __('Administration', 'featured-page-widget'),
);
?>

<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;" class="overDiv"></div>
<div class="wrap">
     <form method="post" action="options.php" id="featured_page_widget_settings">
          <input type="hidden" id="home_page_url" value ="<?php echo site_url(); ?>" />
          <div class="icon32" id="icon-featured-page-widget"><br/></div>
          <h2><?php echo $this->pluginName; ?> &raquo; <?php _e('Plugin Settings', 'featured-page-widget'); ?> </h2>
          <?php if ( isset($_REQUEST['reset']) ) : ?>
               <div id="settings-error-featured-page-widget_upated" class="updated settings-error">
                    <p><strong><?php _e('Featured Page Widget settings have been reset to defaults.', 'featured-page-widget'); ?></strong></p>
               </div>
          <?php endif; ?>
          <?php settings_fields($this->optionsName); ?>
                    <input type="hidden" name="<?php echo $this->optionsName; ?>[random-value]" value="<?php echo rand(1000, 100000); ?>" />
                    <input type="hidden" name="active_tab" id="active_tab" value="<?php echo $selectedTab; ?>" />
                    <ul id="featured_page_widget_tabs">
               <?php foreach ( $tabs as $tab => $name ) : ?>
                         <li id="featured_page_widget_<?php echo $tab; ?>" class="featured-page-widget<?php echo ($selectedTab == $tab) ? '-selected' : ''; ?>">
                              <a href="#top" onclick="featured_page_widget_show_tab('<?php echo $tab; ?>')"><?php echo $name; ?></a>
                         </li>
               <?php endforeach; ?>
                         <li id="featured_page_widget_save" class="featured-page-widget save-tab">
                              <a href="#top" onclick="featured_page_settings_save()"><?php _e('Save Settings', 'featured-page-widget'); ?></a>
                         </li>
                    </ul>

                    <div style="width:49%; float:left">
               <?php foreach ( $tabs as $tab => $name ) : ?>
                              <div id="featured_page_widget_box_<?php echo $tab; ?>" style="display: <?php echo ($selectedTab == $tab) ? 'block' : 'none'; ?>">
                    <?php require_once('settings/' . $tab . '.php'); ?>
                         </div>
               <?php endforeach; ?>
                         </div>

                         <div  style="width:49%; float:right">
               <?php require_once($this->pluginPath . 'includes/sidebar.php'); ?>
                         </div>


                    </form>
     <?php require_once($this->pluginPath . 'includes/footer.php'); ?>

</div>
