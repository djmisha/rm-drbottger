<?
	// Template Name: Home
?>

<?get_header()?>


<div class="welcome-parallax will-parallax parallax-welcome">
	<div class="welcome" id="skiptomaincontent">
		<div class="welcome-cta">
			<div class="wow fadeInUp"  data-wow-delay=".15s">
				<div class="home-logo">
					<h1>
						<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt=" THIS IS THE H1">
					</h1>
				</div>
				<div class="home-addy">
					<?php if(have_rows('locations', 'option')): ?>
						<?php while(have_rows('locations', 'option')): the_row(); ?>
							<a href="<?php the_sub_field('map_link', 'option'); ?>" class="track-outbound" data-label="Address - Footer" target="_blank"  rel="noopener">
								<?php the_sub_field('address', 'option'); ?> <?php the_sub_field('city', 'option'); ?>
							</a>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<a href="" class="button">Schedule a Consultation</a>
			</div>
		</div>
	</div>
</div> 


<section class="home-doctor">
	<div class="doc-content">
		<img src="<?php bloginfo('template_directory'); ?>/images/img-doctor.jpg" alt="doctor" class="doc-image">
		<h2><?php the_field('doctor_head'); ?></h2>
		<?php the_field('doctor_cont'); ?>
		<?php if(have_rows('doctor_logos')): ?>
			<ul class="home-buttons-list" >
				<?php while(have_rows('doctor_logos')): the_row(); ?>
					<li>
						<img src="<?php the_sub_field('logo'); ?>" alt="logo image">
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		<a href="<?php the_field('doctor_bio_button'); ?>" class="button">Read My Biography</a>
	</div>
</section>


<div class="home-featured-procedures">
	<?php if(have_rows('featured_procedures_1')): ?>
		<?php $count = 3 ?>
		<ul>
			<?php while(have_rows('featured_procedures_1')): the_row(); ?>
				<li style="background-image: url('<?php the_sub_field('image'); ?>');" class="wow fadeIn" data-wow-offset="0" data-wow-delay=".<?echo $count; ?>0s" data-wow-duration="1.5s" >
					<a href="<?php the_sub_field('link'); ?>" rel="nofollow">
						<div class="feat-overlay"></div>
						<div class="the-seth">
							<div class="the-seth-button">
								<?php the_sub_field('headline'); ?>
							</div>	
								
						</div>
					</a>
				</li>
			<?php $count++; ?>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
</div>


<section class="home-reviews">
	<div class="the-review">
		<h2><?php the_field('home_reviews_headline'); ?></h2>
		<div class="the-stars">
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
		</div>
		<?php the_field('home_reviews_content'); ?>
		<span class="button">RevMary Jo Martin <i class="fas fa-facebook"></i></span>
	</div>
</section>


<section class="home-breast-aug will-parallax parallax-home-breast">
	<div class="home-breast-content wow fadeInUp"  data-wow-delay=".15s">
		<h2><?php the_field('breast_augmentation_headline'); ?></h2>
		<?php the_field('breast_augmentation_content'); ?>
	</div>
</section>

<section class="home-aug-buttons wow fadeInUp"  data-wow-delay=".15s">
	<a href="" class="button" rel="nofollow">Learn More about Breast Augmentation</a>
	<a href="" class="button" rel="nofollow">View Photo Gallery</a>
</section> 


<section class="bg-procedures">
	<h2><?php the_field('featured_procedures_headline'); ?></h2>
	<div class="the-slider">
		<?php if(have_rows('featured_procedures_slideshow')): ?>
				<?php while(have_rows('featured_procedures_slideshow')): the_row(); ?>
					<div>
						<img src="<?php the_sub_field('image'); ?>" alt="icon">
						<h3><?php the_sub_field('title'); ?></h3>
						<?php the_sub_field('content'); ?>
						<a href="<?php the_sub_field('link'); ?>" class="button">Learn More</a>
					</div>
				<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?get_footer()?>