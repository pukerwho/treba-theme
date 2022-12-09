<div class="relative border dark:border-zinc-500 rounded-lg hover:shadow-md transition-shadow duration-300">
  <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
  <div class="flex lg:-mx-4">
    <div class="w-full lg:w-3/4 lg:px-4">
      <div class="h-full flex flex-col justify-between p-4">
        <!-- categories -->
        <div class="flex items-center mb-2">
          <?php
          $post_categories = get_the_terms( $new_posts->ID, 'category' );
          foreach ($post_categories as $post_category){ ?>
            <a href="<?php echo get_term_link($post_category->term_id, 'category') ?>" class="text-sm bg-indigo-100 dark:bg-zinc-700 px-2 py-1"><?php echo $post_category->name; ?></a> 
          <?php } ?>
        </div>
        <!-- end categories -->
        <div class="text-xl lg:text-2xl font-medium mb-2"><?php the_title(); ?></div>
        <div class="flex items-center text-sm opacity-75 ">
          <div class="mr-4"><?php echo get_the_date('d.m.Y'); ?></div>
          <div class="mr-4">|</div>
          <div class="flex items-center mr-3">
            <div class="mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
              </svg>
            </div>
            <div><?php echo get_comments_number(); ?>;</div>
          </div>

          <div class="flex items-center">
            <div class="mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <div><?php echo get_post_meta( get_the_ID(), 'post_count', true ); ?>;</div>
          </div>
        </div>
      </div>
      
    </div>
  
    <div class="hidden lg:block w-1/4 lg:px-4">
      <?php 
        $medium_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
      ?>
      <img 
      class="w-full h-[160px] object-cover rounded-r-lg" 
      alt="<?php the_title(); ?>" 
      src="<?php echo $medium_thumb; ?>" 
      srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w" 
      loading="lazy" 
      data-src="<?php echo $medium_thumb; ?>" 
      data-srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w">
    </div>
  </div>
</div>