<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="maximum-scale=5.0, user-scalable=yes, width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<title><?php wp_title(""); ?></title>

	<?php if(!is_404()): ?>
		<?php miniCSS::url( 'https://fonts.googleapis.com/css?family=Open+Sans:400' ); ?>
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
		<div class="nav-bar-phone">
			<?php if(have_rows('locations', 'option')): ?>
				<?php while(have_rows('locations', 'option')): the_row(); ?>
					<a href="<?php the_sub_field('phone_link'); ?>" class="head-phone track-outbound"><i class="fas fa-mobile-alt"></i><?php the_sub_field('phone'); ?></a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div> 
		<!-- <div class="menu-trigger">
			<div class="hamburger"></div>
			<div class="hamburger"></div>
			<div class="hamburger"></div>
		</div> -->
	</div>

	<?php 
		// Inside Page Logo
		// Does not show on Homepage or Custom Landing Pages 
		if(!is_front_page() and !is_page_template('page-landing.php')): 
	 ?>
		<section>
			<div class="inside-header-logo"></div>
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
			<a href="<?php the_field('virtual_consult_link', 'option'); ?>"  class="virtual-consulation virtual-consulation-page-title sidebar-button"> <div> <i class="fas fa-user-tie"></i> <i class="far fa-comment-alt"></i> Virtual Consultation </div> </a>
			<h1><?php echo $category_title ?> Gallery</h1>
		<?php elseif(this_is('gallery-child')): ?>
			<?php $category_title =  get_the_title($post->in_cat_ID); ?>
			<h1><?php echo $category_title ?> Gallery</h1>
			<a href="<?php the_field('virtual_consult_link', 'option'); ?>"  class="virtual-consulation virtual-consulation-page-title sidebar-button"> <div> <i class="fas fa-user-tie"></i> <i class="far fa-comment-alt"></i> Virtual Consultation </div> </a>
		<?php elseif(this_is('gallery')): ?>
			<h1>Photo Gallery</h1>
			<a href="<?php the_field('virtual_consult_link', 'option'); ?>"  class="virtual-consulation virtual-consulation-page-title sidebar-button"> <div> <i class="fas fa-user-tie"></i> <i class="far fa-comment-alt"></i> Virtual Consultation </div> </a>
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
	</section>

<?php endif; ?>

