<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
</div> <!--! end of #container -->

<footer>
    <div id="footer-menu">
      <?php wp_nav_menu( array('menu' => 'Footer menu' )); ?>
    </div>
    <div id="copyrights">
       <img src="<?php bloginfo('template_directory'); ?>/images/footer_CG.png" width="968" height="56" alt="Footer CG">
        © 2011 
        <a href="<?php get_bloginfo('siteurl') ?>" alt="De Christengemeenschap Kinder- en Jeugdkampen"> De Christengemeenschap Kinder- en Jeugdkampen</a> | 
        <a href="<?php get_bloginfo('siteurl') ?>/contact/" alt="Contact pagina">Contact</a> | 
        <a href="<?php get_bloginfo('siteurl') ?>/informatie/algemene-voorwaarden/" alt="Algemene voorwaarden">Algemene voorwaarden</a> | 
        <a href="#" alt="#">Terug naar boven</a>
    </div>  
</footer>

  <?php wp_footer(); ?>

</body>
</html>
