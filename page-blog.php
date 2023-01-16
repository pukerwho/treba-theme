<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>

<?php echo get_template_part('template-parts/menu'); ?>

<main>
  <div class="container mx-auto">
    <h1 class="flex items-center text-2xl lg:text-4xl font-semibold mb-6">
      <span class="mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
        </svg>
      </span>
      <span><?php _e("Всі записи", "treba-wp"); ?></span>
    </h1>
    <div class="flex flex-wrap items-center mb-4 -mx-1">
      <?php $all_cats = get_terms( array( 
        'taxonomy' => 'category', 
        'parent' => 0, 
        'hide_empty' => false,
        'exclude'  => 1,
      ));
      foreach ( array_slice($all_cats, 0, 9) as $all_cat ): ?>
        <div class="px-1 mb-2">
          <a href="<?php echo get_term_link($all_cat); ?>" class="inline-block bg-indigo-100 dark:bg-zinc-700 hover:bg-indigo-200 hover:dark:bg-zinc-800 rounded px-4 py-2"><?php echo $all_cat->name ?></a>
        </div>
      <?php endforeach; ?>
    </div>
    <?php 
      global $wp_query, $wp_rewrite;  
      $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
      $all_posts = new WP_Query( array( 
        'post_type' => 'post',
        'paged' => $current, 
        'posts_per_page' => 5,
        'order' => 'DESC'
      ) );
      if ($all_posts->have_posts()) : while ($all_posts->have_posts()) : $all_posts->the_post(); 
    ?>
      <div class="mb-5">
        <?php echo get_template_part('template-parts/post-item'); ?>
      </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
    <div>
      <?php 
        $big = 9999999991; // уникальное число
        echo paginate_links( array(
          'format'  => 'page/%#%',
          'total' => $all_posts->max_num_pages,
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