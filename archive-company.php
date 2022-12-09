<?php get_header(); ?>

<?php echo get_template_part('template-parts/menu'); ?>

<main>
  <div class="container mx-auto">
    <h1 class="text-2xl lg:text-4xl uppercase font-bold mb-6"><?php the_archive_title(); ?></h1>
    <div class="flex flex-wrap items-center text-sm -mx-1 mb-4">
      <?php 
      $services = get_terms(array( 'taxonomy' => 'services', 'parent' => 0 ));
      foreach($services as $service): ?>
        <div class="mb-2 px-1">
          <div class="relative bg-zinc-200 dark:bg-zinc-700 hover:bg-white dark:hover:bg-zinc-800 border border-zinc-200 dark:border-transparent rounded-lg px-4 py-2">
            <a href="<?php echo get_term_link($service->term_id, 'services') ?>" class="absolute-link"></a>
            <div><span class=""><?php echo $service->name; ?></span></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="flex flex-wrap lg:-mx-4 mb-2">
      <?php 
        global $wp_query, $wp_rewrite;  
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        $all_company = new WP_Query( array( 
          'post_type' => 'company',
          'paged' => $current, 
          'posts_per_page' => 20,
          'order' => 'DESC'
        ) );
        if ($all_company->have_posts()) : while ($all_company->have_posts()) : $all_company->the_post(); 
      ?>
        <div class="w-full lg:w-1/2 lg:px-4 mb-4">
          <?php get_template_part('template-parts/company-item'); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <div class="b_pagination text-center">
      <?php 
        $big = 9999999991; // уникальное число
        echo paginate_links( array(
          'format' => '?page=%#%',
          'total' => $all_company->max_num_pages,
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