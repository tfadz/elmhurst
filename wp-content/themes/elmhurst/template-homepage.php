<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main container" role="main">
      
     <h1><?php the_field('homepage_hero_title'); ?></h1>
     <h2><?php the_field('homepage_hero_intro'); ?></h2>

     <section class="elm-spotlights">
      <?php if(have_rows('homepage_spotlights')) : while(have_rows('homepage_spotlights')) : the_row();

      ?>

     </section>

  
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
