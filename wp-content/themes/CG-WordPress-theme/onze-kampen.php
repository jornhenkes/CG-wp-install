<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 * Template Name: onze kampen
 */

get_header(); 


if (have_posts()) : while (have_posts()) : the_post(); ?>

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
    <img src="<?php bloginfo('template_directory'); ?>/images/CG-logo_transparant.png" width="916" height="149" alt="CG Logo Transparant">
</a>

<div id="main" role="main">
  <article <?php post_class( the_slug() ) ?> id="post-<?php the_ID(); ?>" main_color="<?php echo $main_kampkleur ?>">
      <header style="background-color:#<?php echo $main_kampkleur ?>">
          <h2><?php the_title(); ?></h2>
        </header>
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
  </article>
</div>

<?php endwhile; else: ?>

  <p>Sorry, no posts matched your criteria.</p>

</div>

<?php endif; ?>

<?php get_footer(); ?>
