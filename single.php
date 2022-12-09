<?php get_header(); ?>

<?php echo get_template_part('template-parts/menu'); ?>

<main>
  <div class="container mx-auto">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article itemscope itemtype="http://schema.org/Article">
      <!-- Хлебные крошки -->
      <div class="breadcrumbs text-sm text-gray-800 dark:text-gray-200 mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <ul class="flex items-center flex-wrap -mr-4">
          <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item px-4 pl-8">
            <a itemprop="item" href="<?php echo home_url(); ?>" class="text-indigo-400 dark:text-indigo-500">
              <span itemprop="name"><?php _e( 'Головна', 'treba-wp' ); ?></span>
            </a>                        
            <meta itemprop="position" content="1">
          </li>
          <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item px-4">
            <a itemprop="item" href="<?php echo get_page_url('page-blog'); ?>" class="text-indigo-400 dark:text-indigo-500">
              <span itemprop="name"><?php _e( 'Блог', 'treba-wp' ); ?></span>
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
      <h1 class="text-2xl uppercase font-bold mb-4" itemprop="headline"><?php the_title(); ?></h1>
      <div class="text-sm opacity-75 border-b border-gray-200 mb-3 pb-3">
        <div><span class="italic"><?php _e("Автор", "treba-wp"); ?></span>: <?php echo get_the_author(); ?></div>
        <div><span class="italic"><?php _e("Дата", "treba-wp"); ?></span>: <?php echo get_the_date('d.m.Y'); ?></div>
      </div>
      <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full lg:w-1/2 h-full float-left object-cover rounded-lg mr-4 mb-6" itemprop="image">
      <div class="content" itemprop="articleBody">
        <?php the_content(); ?>
      </div>
    <article>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</main>

<?php get_footer(); ?>