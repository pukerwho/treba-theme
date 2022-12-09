<?php get_header(); ?>

<?php echo get_template_part('template-parts/menu'); ?>

<main>
  <div class="container mx-auto">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article itemscope itemtype="http://schema.org/Article">
      
      <h1 class="text-2xl uppercase font-bold mb-4" itemprop="headline"><?php the_title(); ?></h1>
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
            <a itemprop="item" href="<?php echo get_post_type_archive_link('dictionary'); ?>" class="text-indigo-400 dark:text-indigo-500">
              <span itemprop="name"><?php _e( 'Словник', 'treba-wp' ); ?></span>
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
      <h2 class="text-2xl text-center uppercase font-bold mb-6"><?php _e("Словник", "treba-wp"); ?></h2>
      <div class="flex flex-wrap lg:-mx-4 mb-4">
        <?php 
          $current_id = get_the_ID();
          $other_dictionary = new WP_Query( array( 
            'post_type' => 'dictionary', 
            'posts_per_page' => 20,
            'order' => 'DESC',
            'post__not_in' => array($current_id),
          ) );
          if ($other_dictionary->have_posts()) : while ($other_dictionary->have_posts()) : $other_dictionary->the_post(); 
        ?>
          <?php echo get_template_part('template-parts/dictionary-item'); ?>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>