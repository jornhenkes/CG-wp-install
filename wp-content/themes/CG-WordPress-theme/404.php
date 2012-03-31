<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/stylesheets/jquery.panorama.css" type="text/css" media="screen" title="no title" charset="utf-8">
<script src="<?php bloginfo('template_directory'); ?>/javascripts/jquery.panorama.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css" media="screen">
    #container{
        overflow: hidden !important;
    }
</style>
<div id="slideshow">
   	<img src="<?php bloginfo('template_directory'); ?>/images/panohigh.jpg" class="panorama" width="11031" height="400" />
</div>

<div id="main" role="main">
  <article <?php post_class( the_slug() ) ?> id="post-<?php the_ID(); ?>" main_color="<?php echo $main_kampkleur ?>">
    <header style="background-color:#<?php echo $main_kampkleur ?>">
      <h2>Sorry, de pagina die je zocht is niet gevonden..</h2>
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

<?php get_footer(); ?>
