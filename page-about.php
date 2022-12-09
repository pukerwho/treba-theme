<?php
/*
Template Name: About
*/
?>
<?php get_header(); ?>

<?php echo get_template_part('template-parts/menu'); ?>

<main>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="container mx-auto">
    <h1 class="text-2xl uppercase font-bold mb-4"><?php the_title(); ?></h1>
    <div class="content">
      <?php the_content(); ?>
    </div>
  </div>
  <?php endwhile; endif; wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>