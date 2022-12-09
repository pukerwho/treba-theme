<?php get_header(); ?>

<?php echo get_template_part('template-parts/menu'); ?>

<main>
  <div class="container mx-auto">
    <h1 class="text-2xl lg:text-4xl uppercase font-bold mb-6"><?php the_archive_title(); ?></h1>
    <div class="flex flex-wrap lg:-mx-4 mb-4">
      <?php 
        global $wp_query, $wp_rewrite;  
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        $new_dictionary = new WP_Query( array( 
          'post_type' => 'dictionary', 
          'posts_per_page' => 32,
          'paged' => $current, 
          'order' => 'DESC'
        ) );
        if ($new_dictionary->have_posts()) : while ($new_dictionary->have_posts()) : $new_dictionary->the_post(); 
      ?>
        <?php echo get_template_part('template-parts/dictionary-item'); ?>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <div class="b_pagination text-center">
      <?php 
        $big = 9999999991; // уникальное число
        echo paginate_links( array(
          'format' => '?page=%#%',
          'total' => $new_dictionary->max_num_pages,
          'current' => $current,
          'prev_next' => true,
          'next_text' => (''),
          'prev_text' => (''),
        )); 
      ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>