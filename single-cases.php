<?php get_header(); ?>

<?php echo get_template_part('template-parts/menu'); ?>

<main>
  <div class="container mx-auto">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article itemscope itemtype="http://schema.org/Article">
      
      <h1 class="text-2xl uppercase font-bold mb-4" itemprop="headline"><?php the_title(); ?></h1>
      <div class="text-sm opacity-75 border-b border-gray-200 mb-3 pb-3">
        <div><span class="italic"><?php _e("Автор", "treba-wp"); ?></span>: <?php echo get_the_author(); ?></div>
        <div><span class="italic"><?php _e("Дата", "treba-wp"); ?></span>: <?php echo get_the_date('d.m.Y'); ?></div>
      </div>
      <div class="content mb-6" itemprop="articleBody">
        <?php the_content(); ?>
      </div>
      <!-- Хлебные крошки -->
      <div class="breadcrumbs text-sm text-gray-800 dark:text-gray-200 mb-20" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <ul class="flex items-center flex-wrap -mr-4">
          <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item px-4 pl-8">
            <a itemprop="item" href="<?php echo home_url(); ?>" class="text-indigo-400 dark:text-indigo-500">
              <span itemprop="name"><?php _e( 'Головна', 'treba-wp' ); ?></span>
            </a>                        
            <meta itemprop="position" content="1">
          </li>
          <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item px-4">
            <a itemprop="item" href="<?php echo get_post_type_archive_link('cases'); ?>" class="text-indigo-400 dark:text-indigo-500">
              <span itemprop="name"><?php _e( 'Кейси', 'treba-wp' ); ?></span>
            </a>                        
            <meta itemprop="position" content="2">
          </li>
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item text-gray-600 px-4">
            <span itemprop="name"><?php the_title(); ?></span>
            <meta itemprop="position" content="3" />
          </li>
        </ul>
      </div>
      <!-- END Хлебные крошки -->
    <article>
    <?php endwhile; endif; wp_reset_postdata(); ?>
    <div>
      <h2 class="text-2xl text-center uppercase font-bold mb-6"><?php _e("Інші кейси", "treba-wp"); ?></h2>
      <div class="flex flex-wrap">
        <?php 
          $current_id = get_the_ID();
          $other_cases = new WP_Query( array( 
            'post_type' => 'cases', 
            'posts_per_page' => 3,
            'post__not_in' => array($current_id),
            'order'    => 'DESC',
          ) );
          if ($other_cases->have_posts()) : while ($other_cases->have_posts()) : $other_cases->the_post(); 
        ?>
          <div class="w-full border-b last-of-type:border-none border-gray-200 dark:border-zinc-500 pb-4 mb-4">
            <?php echo get_template_part('template-parts/case-item'); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>