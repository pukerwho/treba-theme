<?php 
get_header(); 
$countNumber = tutCount(get_the_ID()); 
?>

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
        <div>
          <span class="italic"><?php _e("Автор", "treba-wp"); ?></span>: 
          <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
            <span class="italic"><?php echo carbon_get_the_post_meta('crb_post_author'); ?></span>
            <div class="flex items-center text-sm">
              <!-- instagram -->
              <?php if (carbon_get_the_post_meta('crb_post_author_instagram')): ?>
                <div class="italic pb-2 pr-3"><a href="<?php echo carbon_get_the_post_meta('crb_post_author_instagram'); ?>" class="text-indigo-500">Instagram</a></div>
              <?php endif; ?>
              <!-- facebook --> 
              <?php if (carbon_get_the_post_meta('crb_post_author_facebook')): ?>
                <div class="italic pb-2"><a href="<?php echo carbon_get_the_post_meta('crb_post_author_facebook'); ?>" class="text-indigo-500">Facebook</a></div>
              <?php endif; ?>
            </div>

          <?php else: ?>
            <?php echo get_the_author(); ?>
          <?php endif; ?>
        </div>
        
      </div>
      <div class="flex flex-col xl:flex-row xl:-mx-4">
        <div class="w-full xl:w-3/4 xl:px-4 mb-6 xl:mb-0">
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full object-cover rounded-lg border shadow-xl p-5 mr-4 mb-6" itemprop="image">
          <div class="content" itemprop="articleBody">
            <?php the_content(); ?>
          </div>
        </div>
        <div class="w-full xl:w-1/4  xl:px-4">
          <div class="sticky top-4">
            
            <div class="border-b border-gray-300 pb-4 mb-4">
              <div class="text-lg"><?php _e("Поділитись", "treba-wp"); ?></div>
              <div>
                <?php do_action('show_social_share_buttons'); ?>
              </div>
            </div>
            <div class="flex items-center mb-2">
              <div class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </div>
              <div>
                <span class="italic"><?php _e("Переглядів", "treba-wp"); ?></span>: <?php echo $countNumber; ?>
              </div>
            </div>
            <div class="flex items-center">
              <div class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
              </div>
              <span class="italic"><?php _e("Дата", "treba-wp"); ?></span>: <?php echo get_the_date('d.m.Y'); ?>
            </div>
          </div>
          
          
        </div>
      </div>
      
    <article>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</main>

<?php get_footer(); ?>