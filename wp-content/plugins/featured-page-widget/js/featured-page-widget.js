/**
 * featured-page-widget.js - Javascript for the Settings page.
 *
 * @package Featured Page Widget
 * @subpackage includes
 * @author GrandSlambert
 * @copyright 2009-2011
 * @access public
 * @since 1.4
 */

/* Function to change tabs on the settings pages */
function featured_page_widget_show_tab(tab) {
     /* Close Active Tab */
     activeTab = document.getElementById('active_tab').value;
     document.getElementById('featured_page_widget_box_' + activeTab).style.display = 'none';
     document.getElementById('featured_page_widget_' + activeTab).removeAttribute('class','featured-page-widget-selected');

     /* Open new Tab */
     document.getElementById('featured_page_widget_box_' + tab).style.display = 'block';
     document.getElementById('featured_page_widget_' + tab).setAttribute('class','featured-page-widget-selected');
     document.getElementById('active_tab').value = tab;
}

/* Function to invoke the save feature for the settings */
function featured_page_settings_save() {
     document.getElementById('featured_page_widget_settings').submit();
}

/* Function to verify selection to reset options */
function featured_page_reset_options(element) {
     if (element.checked) {
          if (prompt('Are you sure you want to reset all of your options? To confirm, type the word "reset" into the box.') == 'reset' ) {
               document.getElementById('featured_page_widget_settings').submit();
          } else {
               element.checked = false;
          }
     }
}

function onClickRedirectHome(element)
{
     var field = document.getElementById('featured_page_widget_redirect_url');
     var url = document.getElementById('home_page_url').value;

     if (element.checked)
     {
          field.value = url;
          field.readOnly = true;
     }
     else
     {
          field.readOnly = false;
     }
}
