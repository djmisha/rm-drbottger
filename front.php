<?
	// Template Name: Home
?>

<?get_header()?>


<div class="welcome-parallax will-parallax parallax-welcome">
	<div class="welcome" id="skiptomaincontent">
		<div class="welcome-cta">
			<!-- <div class="wow fadeInUp"  data-wow-delay=".15s"> -->
				<div class="home-logo">
				<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt=""> </a><span></span> <h1> <span>David A. Bottger, MD</span></h1>
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
				<a href="<?php the_field('schedule_a_consultation_link'); ?>" class="button" rel="nofollow">Schedule a Consultation</a>
			<!-- </div> -->
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
		<?php $count = 3; ?>
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
		<span class="button"><i class="fas fa-user-alt"></i> <?php the_field('home_reviews_name'); ?> </span>
	</div>
</section>


<section class="home-breast-aug will-parallax parallax-home-breast">
	<div class="home-breast-content wow fadeInUp"  data-wow-delay=".15s">
		<h2><?php the_field('breast_augmentation_headline'); ?></h2>
		<?php the_field('breast_augmentation_content'); ?>
	</div>
</section>


<section class="home-aug-buttons wow fadeIn"  data-wow-delay=".25s">
	<a href="<?php the_field('learn_more_about_breast_augmentation_button'); ?>" class="button" rel="nofollow">Learn More about Breast Augmentation</a>
	<a href="<?php the_field('view_photo_gallery_button'); ?>" class="button" rel="nofollow">View Photo Gallery</a>
</section> 


<section class="home-more-procedures">
	<div class="bg-p-overlay"></div>
	<h2><?php the_field('featured_procedures_headline'); ?></h2>
	<div class="the-holder">
		<div class="the-slider">
			<?php if(have_rows('two-procedures')): ?>
				<?php while(have_rows('two-procedures')): the_row(); ?>
					<div class="carousel-cell">
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
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>



<section class="patient-testis">
	<h2><?php the_field('patient_testimonials_headline'); ?></h2>
	<?php if(have_rows('patient_testis')): ?>
		<ul>
			<?php while(have_rows('patient_testis')): the_row(); ?>
				<li>
					<img src="<?php the_sub_field('image'); ?>" alt="icon">
					<?php the_sub_field('content'); ?>
				</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	<a href="<?php the_field('patient_testis_link'); ?>" rel="nofollow" class="button">More Testimonials</a>
</section>

<?get_footer()?>