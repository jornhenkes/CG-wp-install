<?php
/*
Plugin Name: IE6 Upgrade Option
Plugin URI: http://www.doc4design.com/plugins/ie6-upgrade
Description: Generates an optional IE6 upgrade message as a plugin with output for all browsers
Version: 2.6
Author: Doc4
Author URI: http://www.doc4design.com
*/

/******************************************************************************

Copyright 2010  Doc4 : info@doc4design.com

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
The license is also available at http://www.gnu.org/copyleft/gpl.html

*********************************************************************************/

add_action('wp_footer','add_footer');

	function add_footer() {
		ob_start();
		
		echo '<span id="ftf_link"></span>';
		echo '<script src="' . plugins_url("ie6-upgrade-option/warning.js") . '" type="text/javascript" charset="ISO-8859-1"></script>';
		echo '<script type="text/javascript" charset="ISO-8859-1"> 
				
			var ftf = new ftf();
			ftf.instance_name 	= "ftf"; 
			ftf.icon_size 	 	= "regular";
			ftf.output_to 	 	= "ftf_link"; 
                     
			/*
			This feature is a Version 2.0 feature. It is the upgrade of the previous localization option. 
			This must be a valid JSON file with the appropriate language translations.
			You must upload the language JSON file to your website for use. (ie. ftf.lang_external = "includes/cs.json";)
			*/
			ftf.lang_external	 	 = "' . plugins_url("ie6-upgrade-option/lang/en.json") . '";

			/*
			If users browser has a 3(failed) rating.
			Would you like the script to automatically popup onload?
			The default value is true.
			*/	
			ftf.onload 		= true;

			ftf.css_external 		= "' . plugins_url("ie6-upgrade-option/style.css") . '";

			/*
			The following are the three different approval levels you may set to specific browsers:
			1 = Pass/Recommended
			2 = Pass/Acceptable
			3 = Fail

			Any other number will return an error. 

			The following are the default values for each browser but can be easily changed by 
			resetting the values using the following method.
			*/
			ftf.rate = {
			"firefox" : 1,
			"chrome" : 1,
			"opera" : 1,
			"safari" : 1,
			"ie6" : 3,		
			"ie7" : 2,		
			"ie8" : 1,
			"ie9" : 1
			};
			
			/*
			The following are the default values for each browser icon. Version 3.0 requires you to host your own icons.
			You can download a zip of all the icons above. 
			*/
			ftf.icons = {

			"firefox" : "' . plugins_url("ie6-upgrade-option/icons/32/firefox.gif") . '",
			"chrome" : 	"' . plugins_url("ie6-upgrade-option/icons/32/chrome.gif") . '",
			"opera" : 	"' . plugins_url("ie6-upgrade-option/icons/32/opera.gif") . '",
			"safari" : 	"' . plugins_url("ie6-upgrade-option/icons/32/safari.gif") . '",
			"ie6" : 	"' . plugins_url("ie6-upgrade-option/icons/32/ie9.gif") . '",		
			"ie7" : 	"' . plugins_url("ie6-upgrade-option/icons/32/ie9.gif") . '",		
			"ie8" : 	"' . plugins_url("ie6-upgrade-option/icons/32/ie9.gif") . '",
			"ie9" : 	"' . plugins_url("ie6-upgrade-option/icons/32/ie9.gif") . '"

			};		

			ftf.init(
			);

			</script>';

		ob_get_contents();
	}	

// Never comment out the php ending tag below or the sky will fall on your head
?>