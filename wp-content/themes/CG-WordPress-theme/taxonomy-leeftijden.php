<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); 

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

$custom_fields = xydac_cloud('leeftijden');
$custom_field = $custom_fields[$term->slug];
$link = get_bloginfo( 'url' ) . '/leeftijden/' . $term->slug . '/';
?>		
<div id="slideshow">
    <img src="<?php echo $custom_field['slideshow-image']; ?>" />
</div>
<div id="slideshow_navigatie_holder">
    <div id="slideshow_navigatie">
    </div>
</div>
<a href="<?php get_bloginfo('url') ?>" alt="" id="cg_logo_holder">
    <img src="<?php bloginfo('template_directory'); ?>/images/CG-logo_transparant.png" width="916" height="149" alt="CG Logo Transparant">
</a>
<div id="main" role="main" class="taxonomy">
    <header style="background-color:#<?php echo $custom_field['kleur']; ?>">
      <h2><?php echo $custom_field['maintitle']; ?></h2>
    </header>
    <div id="kampen-categories">

    	<?php if (have_posts()) : ?>
          	<?php while (have_posts()) : the_post(); ?>
      	        <?php
    				$main_kampkleur = null; $leeftijd = null;
    			    $main_kampkleur = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_1_numInSet_0', true);
    			    $leeftijd = get_post_meta($post->ID, '_simple_fields_fieldGroupID_1_fieldID_5_numInSet_0', true);
    			?>
    	        <a href="<?php echo get_permalink(); ?>">
        	        <div class="category">
        	            <div class="thumbnail">
        	                <div class="age_bubble" style="background-color: #<?php echo $main_kampkleur; ?>;">
        	                    <?php echo $leeftijd; ?>
        	                </div>
        	                <?php
                            //Get the Thumbnail URL
                            $thumnail_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID));
                            ?>
                            
                            <img src="<?php echo $thumnail_src[0]; ?>" alt="<?php echo the_title(); ?>" />
                            
        	            </div>
        	            <div class="category_title" id="" style="color: #<?php echo $main_kampkleur; ?>;">
        	                <?php echo the_title(); ?>
        	            </div>
        	            <div class="short_description" id="">
        	                <?php echo the_excerpt(); ?>
        	            </div>
        	        </div>
    	        </a>
            <?php endwhile; ?>
    	<?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>
