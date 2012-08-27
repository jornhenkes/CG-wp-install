<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); 


if (have_posts()) : while (have_posts()) : the_post(); ?>
<meta property="og:image" content=""/>
<?php
    $main_kampkleur = get_post_meta($post->ID, 'info_hoofdkleur', true);
    $secons_main_kampkleur = get_post_meta($post->ID, 'info_tweede_kampkleur', true);
    $sec_kampkleur = get_post_meta($post->ID, 'info_accentkleur', true);
    $prijzen = $wpdb->get_results("
        SELECT * FROM $wpdb->postmeta WHERE post_id = $post->ID
        AND meta_key = 'info_kampprijs'
        ORDER by meta_id ASC
        ");    
    $datum = get_post_meta($post->ID, 'info_kampdata', true);
    $locatie = get_post_meta($post->ID, 'info_locatie', true);
    $priester = get_post_meta($post->ID, 'info_priester', true);
    $leeftijd = get_post_meta($post->ID, 'info_leeftijd', true);
    $tekst_uitgelicht = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_9_numInSet_0', true);
    // Featured content
    $featured_title = get_post_meta($post->ID, 'uitgelicht_titel', true);
    $featured_content = get_post_meta($post->ID, 'uitgelicht_inhoud', true);
    $featured_images = get_post_meta($post->ID, 'uitgelicht_afbeelding', true);
    // Extra content
    $extra_content_title_1 = get_post_meta($post->ID, 'tv_titel_links', true);
    $extra_content_1 = get_post_meta($post->ID, 'tv_tekstveld_links', true);
    $extra_content_title_2 = get_post_meta($post->ID, 'tv_titel_midden', true);
    $extra_content_2 = get_post_meta($post->ID, 'tv_tekstveld_midden', true);
    $extra_content_title_3 = get_post_meta($post->ID, 'tv_titel_rechts', true);
    $extra_content_3 = get_post_meta($post->ID, 'tv_tekstveld_rechts', true);
    // custom kamplogo
    $custom_logo = get_post_meta($post->ID, 'info_kamplogo', true);
    
    $extra_mededeling = get_post_meta($post->ID, 'info_mededeling', true);
   	$aanmeld_button = get_post_meta($post->ID, 'info_aanmeldbutton', true);
    
    $aanmeld_parameter = get_post_meta($post->ID, 'info_parameter_voor_aanmeldformulier', true);
    $downloadlink = get_post_custom_values('info_downloadlink');
    
?>
<?php echo wp_get_attachment_image("full" ); ?>
<div id="slideshow">
    <?php
      if( function_exists( 'attachments_get_attachments' ) )
      {
        $attachments = attachments_get_attachments();
        $total_attachments = count( $attachments );
        if( $total_attachments ) : ?>
          <?php for( $i=0; $i<$total_attachments; $i++ ) : ?>
            <img src="<?php echo $attachments[$i]['location']; ?>" />
          <?php endfor; ?>
        <?php endif; ?>
    <?php } ?>
</div>
<div id="slideshow_navigatie_holder">
    <div id="slideshow_navigatie">
    </div>
</div>
<a href="<?php echo get_bloginfo('url'); ?>" alt="" id="cg_logo_holder">
    <?php echo wp_get_attachment_image( $custom_logo, "full" ); ?>
</a>

<div id="main" role="main">
  <article <?php post_class( the_slug() ) ?> id="post-<?php the_ID(); ?>" main_color="<?php echo $main_kampkleur ?>">
    <header style="background-color:#<?php echo $main_kampkleur ?>">
      <h2><?php the_title(); ?></h2>
      <h3><?php 
      
      $terms = wp_get_post_terms( $post->ID, 'leeftijden', $args );
      
      foreach ( $terms as $term ) 
      {

		$custom_fields = xydac_cloud('leeftijden');
		$custom_field = $custom_fields[$term->slug];
      	
      	echo '<a href="/' . $term->taxonomy . '/' . $term->slug . '">' . $custom_field['maintitle'] . '</a>';
      }
      
      ?></h3>
    </header>
    <div class="page-content" id="main-content">
        <?php if ( strlen( $extra_mededeling ) > 0 ) : ?>
            <div class="mededeling-active" id="mededeling">
                <?php echo $extra_mededeling ?>
            </div>
       	<?php endif; ?>
        <span class="the_excerpt"><?php the_excerpt(); ?></span>
        <?php the_content('Read the rest of this entry &raquo;'); ?>
    </div>
    <div class="sidebar" id="kamp_sidebar">
        <div class="sidebar_box" id="fblike">
            <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID));
            ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light" scrolling="no"
            frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:250px; height:30px"></iframe>
        </div>
        <div class="sidebar_box" id="kamp_meta" style="background-color:#<?php echo $secons_main_kampkleur ?>; border-color: #<?php echo $main_kampkleur ?>">
            <ul class="meta_content" style="color: #<?php echo $sec_kampkleur ?>">
                <li>&gt; <?php echo $datum ?></li>
                <li>&gt; <?php echo $leeftijd ?></li>
               <?php
               if (isset($prijzen)) {
               foreach( $prijzen as $prijs ) {
                echo '<li>&gt; ' . $prijs->meta_value . '</li>'; 
                 } } ?>
                <li>&gt; Priester: <?php echo $priester ?></li>
                
               <?php
               if (isset($downloadlink)) {
               foreach( $downloadlink as $link ) {
                echo '<li>&gt; ' . wp_get_attachment_link( $link, '' ) . '</li>'; 
                 }
                    };?>
            </ul>
         </div>
         <?php if ($aanmeld_button == 1) : ?>
             <a href="<?php echo $aanmeld_parameter; ?>" title="Aanmelden">
                 <div class="sidebar_box" id="aanmelden_button">
                      Aanmelden
                 </div>
             </a>
       	 <?php endif; ?>
    </div>
    <div id="featured_box" style="background-color:#<?php echo $secons_main_kampkleur ?>; border-color: #<?php echo $main_kampkleur ?>">
        <h3 style="color: #<?php echo $sec_kampkleur ?>"><?php echo $featured_title ?></h3>
        <?php echo wp_get_attachment_image( $featured_images, "featured-page-image-full" ); ?>
        
        <div id="featured_content">
            <?php echo $featured_content ?>
        </div>
    </div>
    
    <footer>
        <div class="colums" id="first">
            <h4 style="color:#<?php echo $secons_main_kampkleur ?>"><?php echo $extra_content_title_1 ?></h4>
            <?php echo $extra_content_1 ?>
        </div>

        <div class="colums" id="second">
            <h4 style="color:#<?php echo $secons_main_kampkleur ?>"><?php echo $extra_content_title_2 ?></h4>
            <?php echo $extra_content_2 ?>
        </div>
    
        <div class="colums" id="last">
            <h4 style="color:#<?php echo $secons_main_kampkleur ?>"><?php echo $extra_content_title_3 ?></h4>
            <?php echo $extra_content_3 ?>
        </div>
    </footer>
  </article>
</div>
<?php endwhile; else: ?>

  <p>Sorry, no posts matched your criteria.</p>

</div>

<?php endif; ?>

<?php get_footer(); ?>
