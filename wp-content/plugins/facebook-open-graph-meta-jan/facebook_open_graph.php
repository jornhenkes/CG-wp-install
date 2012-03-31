<?php
/*
  Plugin Name: Facebook Open Graph Meta Jan
  Plugin URI: http://jannesmannes.nl
  Description: Facebook Open Graph Meta is a wordpress plugin that will help you to add facebook open graph protocol meta data in your blog.
  Author: Jan Henkes
  Version: 0.1
  Author URI: http://jannesmannes.nl
 */
define ('pluginDirName', 'facebook-open-graph-meta-jan');

$fbappId    = get_option('fbog_appid');
$fbadmins   = get_option('fbog_admins');
$fbimage    = get_option('fbog_image');

function facebook_open_graph_init(){
    global $fbappId, $fbadmins, $fbimage;
    if (have_posts()):while(have_posts()):the_post();endwhile;endif;
    
    $title          =   single_post_title('', FALSE);
    $url            =   get_permalink();

    
    echo <<< EOD

<!-- Facebook Open Graph --> 
<meta property="fb:app_id" content="$fbappId" />
<meta property="fb:admins" content="$fbadmins" />

EOD;
    
    if (is_single() || is_page() ) { 
        $description    =   strip_tags(get_the_excerpt($post->ID));
        $image          =   get_first_image();
        
        echo <<< EOD
<meta property="og:title" content="$title" />
<meta property="og:description" content="$description" />
<meta property="og:type" content="kinderenjeugdkampen:camp" />
<meta property="og:url" content="$url"/>
EOD;
    } else {
        $sitename           =   get_bloginfo('name');
        $description        =   get_bloginfo('description');
        $url                =   get_bloginfo('url');
        echo <<< EOD
<meta property="og:site_name" content="$sitename" />
<meta property="og:description" content="$description" />
<meta property="og:type" content="website" />
<meta property="og:image" content="$fbimage" />
<meta property="og:url" content="$url"/>
EOD;
    } 
}

function get_first_image() {
    global $fbappId, $fbadmins, $fbimage;
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if(empty($first_img)){ //Defines a default image
        $first_img =  $fbimage;
    }
    return $first_img;
}

//*************** Admin function ***************
function fbopengraph_admin() {
    include_once 'fbopengraph_admin.php';
}


function admin_actions() {
    add_options_page("Facebook Open Graph Jan", "Facebook Open Graph Jan", 1, "Facebook_Open_Graph_Jan", "fbopengraph_admin");
}

add_action('wp_head', 'facebook_open_graph_init');
add_action('admin_menu', 'admin_actions');

//Setting Links
/**
 * Add Settings link to plugins - code from GD Star Ratings
 */
function add_settings_link($links, $file) {
    static $this_plugin;
    if (!$this_plugin)
        $this_plugin = plugin_basename(__FILE__);

    if ($file == $this_plugin) {
        $settings_link = '<a href="admin.php?page=Facebook_Open_Graph_Jan">' . __("Settings", "Facebook Open Graph") . '</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
 }
 
 add_filter('plugin_action_links', 'add_settings_link', 10, 2 );