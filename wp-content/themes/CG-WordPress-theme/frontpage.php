
<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 * Template name: Frontpage
 */

get_header(); ?>
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
<a href="<?php get_bloginfo('url') ?>" alt="" id="cg_logo_holder">
    <img src="<?php bloginfo('template_directory'); ?>/images/CG-logo_transparant.png" width="916" height="149" alt="CG Logo Transparant">
</a>
<div id="news">
<?php
$i = 0;
$the_query = new WP_Query( 'posts_per_page=4' );
if (have_posts()) : 	
	while ( $the_query->have_posts() ) : $the_query->the_post();
	$i++; ?>
		<div class="post">
		<h1><?php the_title(); ?></h1>
		<?php if ($i == '1'){ ?>
			<div class="excerpt">
				<?php the_excerpt(); ?>
			</div>
		<?php } ?>
		
	<?php 
	endwhile;
endif;
wp_reset_postdata();
?>
</div>

<div id="kampen-categories">
    <?php
    $terms = get_terms( 'leeftijden', 'orderby=id&order=ASC' );
    
    foreach ( $terms as $term ) 
    {
        $custom_fields = xydac_cloud('leeftijden');
        
        $custom_field = $custom_fields[$term->slug];
        
        $link = get_bloginfo( 'url' ) . '/leeftijden/' . $term->slug . '/';
                
        ?>
        <a href="<?php echo $link ?>">
        <div class="category">
            <div class="thumbnail">
                <div class="age_bubble" style="background-color: <?php echo $custom_field['kleur']; ?>;">
                    <?php echo $term->name; ?>
                </div>
                <img src="<?php echo $custom_field['thumbnail']; ?>" alt="<?php echo $custom_field['maintitle']; ?> - <?php echo $term->name; ?>" />
            </div>
            <div class="category_title" id="" style="color: <?php echo $custom_field['kleur']; ?>;">
                <?php echo $custom_field['maintitle']; ?></p>
            </div>
            <div class="short_description" id="">
                <?php echo $custom_field['short_description']; ?>
            </div>
                
        </div>
        </a>
        <?php
    }
    ?>
</div>
<div class="dynamic_sidebar" id="frontpage-top-row">
    <?php dynamic_sidebar( 'frontpage-top-row' ); ?>
</div>
<div class="dynamic_sidebar" id="frontpage-middle-row">
    <?php dynamic_sidebar( 'frontpage-middle-row' ); ?>
</div>
<div class="dynamic_sidebar" id="frontpage-bottom-row">
    <?php dynamic_sidebar( 'frontpage-bottem-row' ); ?>
</div>

<?php get_footer(); ?>


