<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); 


if (have_posts()) : while (have_posts()) : the_post(); ?>
<meta property="og:image" content=""/>
<?php
    $main_kampkleur = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_1_numInSet_0', true);
    $secons_main_kampkleur = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_11_numInSet_0', true);
    $sec_kampkleur = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_10_numInSet_0', true);
    //kampprijzen
    $prijs = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_2_numInSet_0', true);
    $prijs1 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_12_numInSet_0', true);
    $prijs2 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_13_numInSet_0', true);
    $prijs3 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_14_numInSet_0', true);
    
    $datum = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_3_numInSet_0', true);
    $locatie = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_6_numInSet_0', true);
    $priester = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_7_numInSet_0', true);
    $leeftijd = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_5_numInSet_0', true);
    $tekst_uitgelicht = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_9_numInSet_0', true);
    // Featured content
    $featured_title = get_post_meta($post->ID, '_simple_fields_fieldGroupID_2_fieldID_1_numInSet_0', true);
    $featured_content = get_post_meta($post->ID, '_simple_fields_fieldGroupID_2_fieldID_2_numInSet_0', true);
    $featured_images = get_post_meta($post->ID, '_simple_fields_fieldGroupID_2_fieldID_3_numInSet_0', true);
    // Extra content
    $extra_content_title_1 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_3_fieldID_1_numInSet_0', true);
    $extra_content_1 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_3_fieldID_2_numInSet_0', true);
    $extra_content_title_2 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_3_fieldID_3_numInSet_0', true);
    $extra_content_2 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_3_fieldID_4_numInSet_0', true);
    $extra_content_title_3 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_3_fieldID_5_numInSet_0', true);
    $extra_content_3 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_3_fieldID_6_numInSet_0', true);
    // custom kamplogo
    $custom_logo = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_15_numInSet_0', true);
    
    $extra_mededeling = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_17_numInSet_0', true);
   	$aanmeld_button = simple_fields_get_post_value(get_the_id(), array(1, 16), true);
    
    $aanmeld_parameter = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_18_numInSet_0', true);
    
    $downloadlink_1 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_19_numInSet_0', true);
    $downloadlink_2 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_20_numInSet_0', true);
    $downloadlink_3 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_21_numInSet_0', true);
    $downloadlink_4 = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_22_numInSet_0', true);
    
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
                <li>&gt; <?php echo $prijs ?></li>
                <?php if ( strlen( $prijs1 ) > 0 ) : ?>
                	<li>&gt; <?php echo $prijs1 ?></li>
               	<?php endif; ?>
                <?php if ( strlen( $prijs2 ) > 0 ) : ?>
                	<li>&gt; <?php echo $prijs2 ?></li>
               	<?php endif; ?>
                <?php if ( strlen( $prijs3 ) > 0 ) : ?>
                	<li>&gt; <?php echo $prijs3 ?></li>
               	<?php endif; ?>
                <li>&gt; Priester: <?php echo $priester ?></li>
                <?php if ( !empty($downloadlink_1) ): ?>
              	<li>&gt; <?php echo wp_get_attachment_link( $downloadlink_1, '' );?></li>
               	<?php endif; ?> 
                <?php if ( !empty($downloadlink_2) ): ?>
              	<li>&gt; <?php echo wp_get_attachment_link( $downloadlink_2, '' );?></li>
               	<?php endif; ?> 
                <?php if ( !empty($downloadlink_3) ): ?>
              	<li>&gt; <?php echo wp_get_attachment_link( $downloadlink_3, '' );?></li>
               	<?php endif; ?> 
                <?php if ( !empty($downloadlink_4) ): ?>
              	<li>&gt; <?php echo wp_get_attachment_link( $downloadlink_4, '' );?></li>
               	<?php endif; ?> 


            </ul>
         </div>
         <?php if ($aanmeld_button == 'Aanmeldbutton zichtbaar') : ?>
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
