<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="maximum-scale=5.0, user-scalable=yes, width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<title><?php wp_title(""); ?></title>

	<?php if(!is_404()): ?>
		<?php miniCSS::url( 'https://fonts.googleapis.com/css?family=Open+Sans:400,600' ); ?>
		<link rel="stylesheet" href="https://use.typekit.net/uzs6owq.css">
	<?php endif; ?>

	<?php wp_head()?>

</head>

<?php bodyClass(); ?>

<a href="#skiptomaincontent" style="display:none;">Skip to main content</a>

<header class="site-header <?php echo is_front_page() ? 'front-header' : 'int-header will-parallax parallax-internal-header'; ?>" <?php get__header__image(); ?> >

	<div class="nav-bar">
		<nav>
			<?php wp_nav_menu( array(
				'menu' 		=> 'Main',
				'container_class' => 'menu-wrap',
				'menu_id'	=> 'menu-main',
				'menu_class' => 'main-menu',
			)); ?>
		</nav> 
		<div class="nav-bar-extras">
			<?php if(have_rows('locations', 'option')): ?>
				<?php while(have_rows('locations', 'option')): the_row(); ?>
					<a href="<?php the_sub_field('map_link', 'option'); ?>" class="track-outbound head-address" data-label="Address - Header" target="_blank"  rel="noopener">
						<i class="fas fa-map-marker-alt"></i>
					</a>
					<a href="<?php the_sub_field('phone_link'); ?>" class="head-phone track-outbound" data-label="Phone - Header"><i class="fas fa-mobile-alt"></i><?php the_sub_field('phone'); ?></a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div> 
		<div class="menu-trigger">
			<i class="fal fa-bars"></i>
			<i class="fal fa-window-close"></i>
		</div>
	</div>

	<?php 
		// Inside Page Logo
		if(!is_front_page()): 
	 ?>
		<section>
			<div class="inside-header-logo">
				<a href="<?php bloginfo('url'); ?>">
					<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="logo">
				</a>
			</div>
		</section>
	<?php endif; ?>


</header> 



<?php if(!is_front_page() ): 
	// Inside Page Breadcrumbs and Page Title 
	// Does not show on homepage
?>
	<section class="site-crumbs">
		<?php echo __salaciouscrumb(); ?>
	</section>

	<section class="page-title">
		<?php if(is_front_page()): ?>
			<h1><?php // do nothing if homepage  ?></h1>
		<?php elseif(this_is('gallery-case')): ?>
			<?php $category_title =  get_the_title($post->in_cat_ID); ?>
			<h1><?php echo $category_title ?> Gallery</h1>
		<?php elseif(this_is('gallery-child')): ?>
			<?php $category_title =  get_the_title($post->in_cat_ID); ?>
			<h1><?php echo $category_title ?> Gallery</h1>
		<?php elseif(this_is('gallery')): ?>
			<h1>Plastic Surgery Before & After Photos</h1>
		<?php elseif (get_post_type() =='news-room'): ?>
			<div class="heading-text"> Newsroom </div>
		<?php elseif (is_search()): ?>
			<div class="heading-text"> Search Results </div>
		 <?php elseif (is_home() or is_archive()): ?>
			<div class="heading-text"> Blog</div>
		<?php elseif (is_single()): ?>
			<div class="heading-text"> Blog</div>
		<?php else: ?> 
			<h1><?the_title();?></h1>
		<?php endif; ?>
		<div class="page-title-line"></div>
	</section>

<?php endif; ?>

