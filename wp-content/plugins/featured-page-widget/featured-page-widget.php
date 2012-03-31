<?php

/*
  Plugin Name: Featured Page Widget
  Plugin URI: http://plugins.grandslambert.com/plugins/featured-page-widget.html
  Description: Feature pages on your sidebar including an excerpt and either a text or image link to the page.
  Version: 2.2
  Author: grandslambert
  Author URI: http://grandslambert.com/

 * *************************************************************************

  Copyright (C) 2009-2011 GrandSlambert

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.

 * *************************************************************************

 */

/* Class Declaration */

class FeaturedPageWidget extends WP_Widget {
     /* Plugin Variables */

     var $version = '2.2';
     var $make_link = false;
     var $options = array();

     /* Options page name */
     var $optionsName = 'featured-page-widget-options';
     var $menuName = 'featured-pages-settings';
     var $pluginName;

     /**
      * Method constructor
      */
     function FeaturedPageWidget() {
          /* Load the language support */
          $langDir = dirname(plugin_basename(__FILE__)) . '/lang';
          load_plugin_textdomain('featured-page-widget', false, $langDir, $langDir);

          /* Plugin Details */
          $this->pluginName = __('Featured Page Widget', 'featured-page-widget');

          /* translators: This is the description shown on the Widgets page. */
          $widget_ops = array('description' => __('Feature a page on your sidebar. By GrandSlambert.', 'featured-page-widget'));
          $control_ops = array('width' => 400, 'height' => 350);
          /* translators: This is the title of the widget on the Widgets page. */
          $this->WP_Widget('featured_page_widget', __($this->pluginName, 'featured-page-widget'), $widget_ops, $control_ops);

          /* Plugin paths */
          $this->pluginPath = WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__)) . '/';
          $this->pluginURL = WP_PLUGIN_URL . '/' . basename(dirname(__FILE__)) . '/';
          $this->templatesPath = WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__)) . '/templates/';
          $this->templatesURL = WP_PLUGIN_URL . '/' . basename(dirname(__FILE__)) . '/templates/';

          /* Get required files */
          require_once($this->pluginPath . 'includes/template_tags.php');

          /* Load the plugin settings */
          $this->load_settings();

          /* WordPress Actions */
          add_action('admin_menu', array(&$this, 'admin_menu'));
          add_action('admin_init', array(&$this, 'admin_init'));
          add_action('wp_loaded', array(&$this, 'wp_loaded'));
          add_action('wp_print_styles', array(&$this, 'wp_print_styles'));
          add_action('update_option_' . $this->optionsName, array(&$this, 'update_option'), 10);

          /* WordPress Filters */
          add_filter('plugin_action_links', array(&$this, 'plugin_action_links'), 10, 2);

          /* Add shortcodes */
          add_shortcode('featured_pages', array(&$this, 'featured_pages_shortcode'));

          /* Add Image Sizes */
          add_image_size('featured-page-image-small', $this->options->small_image[0], $this->options->small_image[1], $this->options->hard_crop);
          add_image_size('featured-page-image-full', $this->options->full_image[0], $this->options->full_image[1], $this->options->hard_crop);
     }

     /**
      * Load the plugin settings.
      */
     function load_settings() {
          $options = get_option($this->optionsName);

          $defaults = array(
               'length' => 55,
               'link_title' => '',
               'link_text' => __('Read More', 'featured-page-widget'),
               'target' => 'None',
               'link_align' => 'center',
               'image_align' => 'right',
               'allowed_tags' => 'p',
               'post_types' => array('page'),
               'allowed_tags_formatted' => '',
               'hide_widget' => false,
               /* Added in version 1.4 */
               'thumbnail_size' => 'thumbnail',
               'small_image' => array(100, 75),
               'full_image' => array(200, 125),
               'hard_crop' => isset($options['hard_crop']) ? $options['hard_crop'] : true,
          );

          $this->options = wp_parse_args($options, $defaults);

          /* Convert pre-2.1 settings */
          if ( isset($this->options['allowed-tags']) ) {
               $this->options['allowed_tags'] = $this->options['allowed-tags'];
               $this->options['allowed_tags_formatted'] = $this->options['allowed_tags_formatted'];
               $this->options['small_image'] = $this->options['small-image'];
               $this->options['full_image'] = $this->options['full-image'];
               $this->options['hard_crop'] = $this->options['hard-crop'];
          }

          /* Build the list of allowed tags in excerpts */
          $tags = explode(',', $this->options['allowed_tags']);
          foreach ( $tags as $tag ) {
               $this->options['allowed_tags_formatted'].= '<' . $tag . '>';
          }

          $this->options = (object) $this->options;
     }

     /**
      * Register front end styles.
      */
     function wp_loaded() {
          wp_register_style('featured-widget-css', $this->get_template('featured-page-widget', '.css', 'url'));
     }

     /**
      * Add items to the header of the web site.
      */
     function wp_print_styles() {
          wp_enqueue_style('featured-widget-css');
     }

     /**
      * Register the options for Wordpress MU Support
      */
     function admin_init() {
          register_setting($this->optionsName, $this->optionsName);
          wp_register_style('featured-page-widget-admin-css', $this->pluginURL . 'includes/featured-page-widget-admin.css');
          wp_register_script('featured-page-widget-js', $this->pluginURL . 'js/featured-page-widget.js');
     }

     /**
      * Print the administration styles.
      */
     function admin_print_styles() {
          wp_enqueue_style('featured-page-widget-admin-css');
     }

     /**
      * Print the scripts needed for the admin.
      */
     function admin_print_scripts() {
          wp_enqueue_script('featured-page-widget-js');
     }

     /**
      * Add the admin page for the settings panel.
      *
      * @global string $wp_version
      */
     function admin_menu() {
          /* translators: This is used in the title of page and should start with a blank space. */
          $page = add_options_page($this->pluginName . __(' Settings', 'featured-page-widget'), $this->pluginName, 'manage_options', $this->menuName, array(&$this, 'options_panel'));

          add_action('admin_print_styles-' . $page, array(&$this, 'admin_print_styles'));
          add_action('admin_print_scripts-' . $page, array(&$this, 'admin_print_scripts'));
     }

     /**
      * Add a configuration link to the plugins list.
      *
      * @staticvar object $this_plugin
      * @param array $links
      * @param array $file
      * @return array
      */
     function plugin_action_links($links, $file) {
          static $this_plugin;

          if ( !$this_plugin ) {
               $this_plugin = plugin_basename(__FILE__);
          }

          if ( $file == $this_plugin ) {
               /* translators: This is the link displayed on the Plugins page to the settings page for the plugin. */
               $settings_link = '<a href="' . admin_url('options-general.php?page=' . $this->menuName) . '">' . __('Settings', 'featured-page-widget') . '</a>';
               array_unshift($links, $settings_link);
          }

          return $links;
     }

     /**
      * Settings management panel.
      */
     function options_panel() {
          global $_wp_additional_image_sizes;
          include($this->pluginPath . 'includes/settings.php');
     }

     /**
      * Check on update option to see if we need to reset the options.
      * @param <array> $input
      * @return <boolean>
      */
     function update_option($input) {
          if ( $_REQUEST['confirm-reset-options'] ) {
               delete_option($this->optionsName);
               wp_redirect(admin_url('options-general.php?page=' . $this->menuName . '&tab=' . $_POST['active_tab'] . '&reset=true'));
               exit();
          } else {
               wp_redirect(admin_url('options-general.php?page=' . $this->menuName . '&tab=' . $_POST['active_tab'] . '&updated=true'));
               exit();
          }
     }

     /**
      * Shortcode handler
      *
      * @global object $post
      * @param array $atts
      * @return string
      */
     function featured_pages_shortcode($atts) {
          global $post, $this_instance;
          $old_post = $post;


          $defaults = array(
               'template' => 'standard',
               'pages' => get_option('sticky_posts'),
               'items' => 5,
               'length' => $this->options->length,
               'orderby' => 'title',
               'order' => 'ASC',
               'post_types' => $this->options->post_types,
               'ignore_sticky' => true,
               'useimageas' => false,
               'thumbnail_size' => $this->options->thumbnail_size,
               'imagealign' => $this->options->image_align,
               'linktext' => $this->options->link_text,
               'linkalign' => $this->options->link_align
          );

          $instance = $this_instance = $atts = wp_parse_args($atts, $defaults);

          /* Get the list of pages */
          $args = array(
               'post__in' => (is_array($atts['pages'])) ? $atts['pages'] : explode(',', $atts['pages']),
               'posts_per_page' => $atts['items'],
               'orderby' => $atts['orderby'],
               'order' => $atts['order'],
               'post_type' => $atts['post_types'],
               'ignore_sticky_posts' => $atts['ignore_sticky'],
          );

          $featured = new WP_Query($args);

          /* Create and return the content */
          ob_start();
          include($this->get_template($atts['template']));
          $content = ob_get_contents();
          ob_end_clean();

          $post = $old_post;
          return $content;
     }

     /**
      * Method to create the widget.
      *
      * @param array $args
      * @param array $instance
      * @return false
      */
     function widget($args, $instance) {
          global $post, $_wp_additional_image_sizes, $this_instance;

          $old_post = $post;
          if ( !isset($instance['linktitle']) ) {
               $instance['linktitle'] = false;
          }

          $this_instance = $instance = $this->defaults($instance);

          if ( (isset($instance['error']) && $instance['error']) or !isset($instance['page']) ) {
               return;
          }

          extract($args, EXTR_SKIP);

          /* Remove current page from list of pages if set */
          if ( $instance['hidewidget'] and in_array($post->ID, $instance['page']) ) {
               $pages = array_flip($instance['page']);
               unset($pages[$post->ID]);
               $instance['page'] = array_flip($pages);
          }

          /* Get the list of pages */
          if ( $instance['category'] != -1 ) {
               $pages = array_flip($this->options->post_types);
               unset($pages['page']);
               $this->options->post_types = array_flip($pages);
               $args = array(
                    'category__in' => $instance['category'],
                    //'post__not_in' => array($post->ID),
                    'posts_per_page' => $instance['items'],
                    'orderby' => 'rand',
                    'post_type' => $this->options->post_types,
                    'ignore_sticky_posts' => true,
               );
          } else {
               $args = array(
                    'post__in' => $instance['page'],
                    'posts_per_page' => $instance['items'],
                    'orderby' => 'rand',
                    'post_type' => $this->options->post_types,
                    'ignore_sticky_posts' => true,
               );
          }

          $featured = new WP_Query($args);

          /* Output the widget */
          print $before_widget;

          if ( $instance['title'] ) {
               print $before_title;

               if ( $instance['linktitle'] ) {
                    print $this->make_link($featured->posts[0]->ID, $instance['title'], $instance['target']);
               } else {
                    print $instance['title'];
               }

               print $after_title;
          }

          include ($this->get_template($instance['template']));

          print $after_widget;

          $post = $old_post;
     }

     /**
      * Build the link to the post or page.
      *
      * @param integer $id
      * @param string $text
      * @param string $target
      * @return string
      */
     function make_link($id, $text, $target = false) {
          $output = '<a href="' . get_permalink($id) . '" ';
          if ( $target )
               $output.= 'target="' . $target . '"';
          $output.= '>' . $text . '</a>';

          return $output;
     }

     /**
      * Trim the content to a set number of words.
      *
      * @global object $post
      * @param string $text
      * @param integer $length
      * @return string
      */
     function trim_excerpt($text, $length = NULL, $notags = false) {
          global $post;

          $length = ( NULL === $length) ? $this->options->length : $length;
          $notags = ( NULL === $notags) ? false : $notags;

          $allowed_tags = (false === $notags) ? $this->options->allowed_tags_formatted : '';
          $text = apply_filters('the_content', $text);
          $text = str_replace(']]>', ']]&gt;', $text);
          $text = strip_tags($text, $allowed_tags);
          $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
          $words = explode(' ', $text, $length + 1);
          if ( count($words) > $length ) {
               array_pop($words);
               array_push($words, '');
               $text = implode(' ', $words);
          }

          /* Close any open tags. */
          if ( !$notags ) {
               $tags = explode(',', $this->options->allowed_tags);
               foreach ( $tags as $tag ) {
                    if ( $tag != '' ) {
                         $text.= '</' . $tag . '>';
                    }
               }
          }

          return $text;
     }

     /**
      * Widget Update method
      * @param array $new_instance
      * @param array $old_instance
      * @return array
      */
     function update($new_instance, $old_instance) {
          return $new_instance;
     }

     /**
      * Widget Defaults
      */
     function defaults($instance) {
          $defaults = array(
               'template' => 'standard',
               'title' => '',
               'linktitle' => $this->options->link_title,
               /* Page Settings */
               'category' => 14,
               'page' => array(),
               'items' => 1,
               'add_title' => false,
               'hidewidget' => $this->options->hide_widget,
               /* Link Settings */
               'length' => $this->options->length,
               'target' => $this->options->target,
               'linkalign' => $this->options->link_align,
               'linktext' => $this->options->link_text,
               /* Image Settings */
               'imagealign' => $this->options->image_align,
               'thumbnail_size' => $this->options->thumbnail_size,
               'useimageas' => 'none'
          );

          return wp_parse_args($instance, $defaults);
     }

     /**
      * Widget form.
      *
      * @param array $instance
      */
     function form($instance) {
          global $_wp_additional_image_sizes;
          if ( count($instance) < 1 ) {
               $instance = $this->defaults($instance);
          }
          include( $this->pluginPath . 'includes/widget-form.php');
     }

     /**
      * Get list of pages as select options
      */
     function get_pages($selected = NULL, $name = 'page') {

          if ( !is_array($selected) ) {
               $selected = array($selected);
          }

          $pages = get_posts(array('post_type' => $this->options->post_types, 'posts_per_page' => -1, 'showposts' => -1, 'orderby' => 'title', 'order' => 'asc'));

          $output = '';

          foreach ( $pages as $page ) {
               $output.= '<option value="' . $page->ID . '"';
               if ( in_array($page->ID, $selected) ) {
                    $output.= ' selected';
               }
               $output.= '>' . $page->post_title . ' (' . ucfirst($page->post_type) . ')' . "</option>\n";
          }

          return $output;
     }

     /**
      * Return a list of template files in the theme folder and plugin folder.
      *
      * @return array
      */
     function get_widget_templates() {
          $templates = array();

          if ( $handle = @opendir(get_stylesheet_directory() . '/featured-page-widget') ) {
               while (false !== ($file = readdir($handle))) {
                    if ( $file != "." && $file != ".." && preg_match('/.php/', $file) ) {
                         $file = str_replace('.php', '', $file);
                         $name = str_replace('-', ' ', $file);
                         $templates[$file] = ucfirst($name) . "<br>";
                    }
               }

               closedir($handle);
          }

          if ( $handle = opendir($this->pluginPath . '/templates') ) {
               while (false !== ($file = readdir($handle))) {
                    if ( $file != "." && $file != ".." && $file != 'list.php' && preg_match('/.php/', $file) ) {
                         $file = str_replace('.php', '', $file);
                         $name = str_replace('-', ' ', $file);
                         $templates[$file] = ucfirst($name) . "<br>";
                    }
               }

               closedir($handle);
          }

          return $templates;
     }

     /**
      * Retrieve a template file from either the theme or the plugin directory.
      *
      * @param <string> $template    The name of the template.
      * @return <string>             The full path to the template file.
      */
     function get_template($template = NULL, $ext = '.php', $type = 'path') {
          if ( $template == NULL ) {
               return false;
          }

          $themeFile = get_stylesheet_directory() . '/featured-page-widget/' . $template . $ext;

          if ( file_exists($themeFile) ) {
               if ( $type == 'url' ) {
                    $file = get_bloginfo('template_url') . '/featured-page-widget/' . $template . $ext;
               } else {
                    $file = get_stylesheet_directory() . '/featured-page-widget/' . $template . $ext;
               }
          } elseif ( $type == 'url' ) {
               $file = $this->templatesURL . $template . $ext;
          } else {
               $file = $this->templatesPath . $template . $ext;
          }

          return $file;
     }

     /**
      * Display the list of contributors.
      * @return boolean
      */
     function contributor_list() {
          $this->showFields = array('NAME', 'LOCATION', 'COUNTRY');
          print '<ul>';

          $xml_parser = xml_parser_create();
          xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, true);
          xml_set_element_handler($xml_parser, array($this, "start_element"), array($this, "end_element"));
          xml_set_character_data_handler($xml_parser, array($this, "character_data"));

          if ( !(@$fp = fopen('http://wordpress.grandslambert.com/xml/featured-page-widget/contributors.xml', "r")) ) {
               print 'There was an error getting the list. Try again later.';
               return;
          }

          while ($data = fread($fp, 4096)) {
               if ( !xml_parse($xml_parser, $data, feof($fp)) ) {
                    die(sprintf("XML error: %s at line %d",
                                    xml_error_string(xml_get_error_code($xml_parser)),
                                    xml_get_current_line_number($xml_parser)));
               }
          }

          xml_parser_free($xml_parser);
          print '</ul>';
     }

     /**
      * XML Start Element Procedure.
      */
     function start_element($parser, $name, $attrs) {
          if ( $name == 'NAME' ) {
               print '<li class="rp-contributor">';
          } elseif ( $name == 'ITEM' ) {
               print '<br><span class="rp_contributor_notes">Contributed: ';
          }

          if ( $name == 'URL' ) {
               $this->make_link = true;
          }
     }

     /**
      * XML End Element Procedure.
      */
     function end_element($parser, $name) {
          if ( $name == 'ITEM' ) {
               print '</li>';
          } elseif ( $name == 'ITEM' ) {
               print '</span>';
          } elseif ( in_array($name, $this->showFields) ) {
               print ', ';
          }

          $this->make_link = false;
     }

     /**
      * XML Character Data Procedure.
      */
     function character_data($parser, $data) {
          if ( $this->make_link ) {
               print '<a href="http://' . $data . '" target="_blank">' . $data . '</a>';
               $this->make_link = false;
          } else {
               print $data;
          }
     }

     /**
      * Displayes any data sent in textareas.
      *
      * @param <type> $input
      */
     function debug($input) {
          $contents = func_get_args();

          foreach ( $contents as $content ) {
               echo '<textarea style="width:49%; height:250px; float: left;">';
               print_r($content);
               echo '</textarea>';
          }

          echo '<div style="clear: both"></div>';
     }

}

add_action('widgets_init', create_function('', 'return register_widget("FeaturedPageWidget");'));

register_activation_hook(__FILE__, 'featured_page_activate');

function featured_page_activate() {

     /* Compile old options into new options Array */
     $new_options = array();
     $options = array('length', 'hide_widget', 'link_text', 'link_title', 'target', 'link_align', 'image_align', 'image_width');

     foreach ( $options as $option ) {
          if ( $old_option = get_option('featured_page_widget_' . $option) ) {
               $new_options[$option] = $old_option;
               delete_option('featured_page_widget_' . $option);
          }
     }
     if ( !add_option('featured-page-widget-options', $new_options) ) {
          update_option('featured-page-widget-options', $new_options);
     }
}
