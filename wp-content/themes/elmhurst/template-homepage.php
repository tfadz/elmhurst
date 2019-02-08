<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main container" role="main">
    <section class="elm-home-hero" style=" background:url(<?php the_field('homepage_hero_image'); ?>);
  background-size: cover;
  background-position: bottom center;">

     <h1><?php the_field('homepage_hero_title'); ?></h1>
     <h2><?php the_field('homepage_hero_intro'); ?></h2>

     <article class="buckets">
      <?php if(have_rows('homepage_spotlights')) : while(have_rows('homepage_spotlights')) : the_row();
        $sTitle = get_sub_field('s_title');
        $sText = get_sub_field('s_text'); 
        $sIcon = get_sub_field('s_icon');  
        $sLink = get_sub_field('s_link'); 
      ?>

      <a class="buckets__item buckets__item--forms" href="<?php echo $sLink; ?>">
        <h3><?php echo $sTitle; ?></h3>
        <div><?php echo $sText; ?></div>
        <div><?php echo $sIcon; ?></div>
      </a>

    <?php endwhile; endif; ?>

     </article>

  
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
