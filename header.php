<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#1D1E22" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
  
	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <header class="block lg:hidden">
    <div class="flex justify-between items-center py-4">
      <div class="flex items-center text-xl relative px-2">
        <a href="<?php echo get_home_url(); ?>" class="absolute-link"></a>
        <span class="inline-block w-[20px] h-[20px] bg-indigo-500 mr-2"></span>
        <span class="uppercase italic font-black">Treba</span>
      </div>
      <div class="menu-toggle-open px-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </div>
    </div>
  </header>
  <div class="wrap">