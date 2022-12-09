<?php get_header(); ?>

<?php echo get_template_part('template-parts/menu'); ?>

<main>
  <div class="container mx-auto">
    <h1 class="text-2xl lg:text-4xl uppercase font-bold mb-6"><?php the_archive_title(); ?></h1>
    <div class="flex flex-wrap">
      <?php 
        global $wp_query, $wp_rewrite;  
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        $all_cases = new WP_Query( array( 
          'post_type' => 'cases',
          'paged' => $current, 
          'posts_per_page' => 10,
          'order' => 'DESC'
        ) );
        if ($all_cases->have_posts()) : while ($all_cases->have_posts()) : $all_cases->the_post(); 
      ?>
        <div class="w-full border-b last-of-type:border-none border-gray-200 dark:border-zinc-500 pb-4 mb-4">
          <?php echo get_template_part('template-parts/case-item'); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <div class="b_pagination text-center">
      <?php 
        $big = 9999999991; // уникальное число
        echo paginate_links( array(
          'format' => '?page=%#%',
          'total' => $all_cases->max_num_pages,
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