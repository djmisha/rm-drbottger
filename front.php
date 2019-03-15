<?
	// Template Name: Home
?>

<?get_header()?>


<div class="welcome-parallax will-parallax parallax-welcome">
	<div class="welcome" id="skiptomaincontent">
		<section class="welcome-cta">
			<div class="wow fadeInUp"  data-wow-delay=".15s">
			<h2><?php the_field('welcome_headline'); ?>
				<strong><?php the_field('welcome_subheadline'); ?></strong> 
			</h2>
			<?php the_field('welcome_content'); ?>
			<?php if(have_rows('welcome_buttons')): ?>
				<ul>
					<?php while(have_rows('welcome_buttons')): the_row(); ?>
						<li>
							<a href="<?php the_sub_field('link'); ?>" rel="nofollow" class="button"><?php the_sub_field('text'); ?></a>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
			</div>
			<div class="welcome-bottom">
				<div class="wow fadeInUp" data-wow-delay=".15s">
					
				<?php if(have_rows('welcome_logos')): ?>
					<div class="welcome-logos">
						<?php while(have_rows('welcome_logos')): the_row(); ?>
							<img src="<?php the_sub_field('image'); ?>" alt="logo">
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				<div class="sub-content">
					<?php the_field('welcome_subcontent'); ?>
				</div>
				</div>
			</div>
		</section>
	</div>
</div> 


<section class="home-doctor">
	<h2 class="wow fadeIn" data-wow-offset="0" data-wow-delay=".15s"><?php the_field('doctor_headline'); ?></h2>
	<img src="<?php bloginfo('template_directory'); ?>/images/img-doctor.jpg" alt="doctor picture" class="wow fadeInLeft" data-wow-offset="0" data-wow-delay=".15s">
	<div class="wow fadeIn" data-wow-offset="0" data-wow-delay=".15s">
		<?php the_field('doctor_content'); ?>
	</div>
	<?php if(have_rows('doctor_buttons')): ?>
		<ul class="home-buttons-list wow fadeIn" data-wow-offset="0" data-wow-delay=".15s">
			<?php while(have_rows('doctor_buttons')): the_row(); ?>
				<li>
					<a href="<?php the_sub_field('link'); ?>" rel="nofollow" class="button"><?php the_sub_field('text'); ?></a>
				</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
</section>


<section class="home-doctor-quote">
	<div class="wow fadeIn" data-wow-offset="0" data-wow-delay=".30s" data-wow-duration="1.5s">
		<?php the_field('doctor_quote'); ?>
	</div>
</section>


<section class="home-patients">
	<div class="home-patients-content wow fadeInUp" data-wow-offset="0" data-wow-delay=".15s" data-wow-duration="1.5s">
		<div class="actual-patient-tab">Actual Patient</div>
		<h2><?php the_field('patient_results_headline'); ?></h2>
		<?php the_field('patient_results_content'); ?>
		<a href="<?php the_field('patient_results_button_link-1'); ?>" rel="nofollow" class="button">Schedule a Consultation</a>
	</div>
	<div class="results-slides wow fadeInUp" data-wow-offset="0" data-wow-delay=".30s" data-wow-duration="1.5s">

	<?php if( have_rows('case') ): ?>
		<div class="cases">
			<?php while( have_rows('case') ): the_row();
				$category = get_sub_field('category');
				$patient = get_sub_field('patient');
				?>

				<?php 
				 
				echo do_shortcode( '[bnacasecustom category="' . $category . '" patient="' . $patient . '"  imageset="3" casecount="1" addtags="false" ]' ) ?>

			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	</div>
	<div class="last-button wow fadeInUp" data-wow-offset="100" data-wow-delay=".3">
		<a href="<?php the_field('view_our_gallery_button_link-1'); ?>" rel="nofollow" class="button">View Our Gallery</a>
	</div>
</section>


<div class="home-featured-procedures">
	<?php if(have_rows('featured_procedures')): ?>
		<?php $count = 3 ?>
		<ul>
			<?php while(have_rows('featured_procedures')): the_row(); ?>
				<li style="background-image: url('<?php the_sub_field('image'); ?>');" class="wow fadeIn" data-wow-offset="0" data-wow-delay=".<?echo $count; ?>0s" data-wow-duration="1.5s" >
					<div class="feat-overlay"></div>
					<span>
						<?php the_sub_field('headline'); ?>
					</span>
					<div class="feat-content">
						<?php the_sub_field('content'); ?>
					</div>
					<a href="<?php the_sub_field('link'); ?>" class="button" rel="nofollow">Learn More</a>
				</li>
		<?php $count++; ?>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
</div>


<section class="home-reviews">
	<div class="split-line wow fadeIn" data-wow-offset="0" data-wow-delay=".30s" data-wow-duration="1.5s"></div>
	<?php if(have_rows('home_reviews')): ?>
		<ul class="wow fadeIn" data-wow-offset="0" data-wow-delay=".30s">
			<?php while(have_rows('home_reviews')): the_row(); ?>
				<li>
					<?php the_sub_field('quote'); ?>
					<i class="fab fa-google"></i>
					<span><?php the_sub_field('name'); ?></span>
					<div class="reviews-stars">
						<i class="fas fa-star"></i>	
						<i class="fas fa-star"></i>	
						<i class="fas fa-star"></i>	
						<i class="fas fa-star"></i>	
						<i class="fas fa-star"></i>	
					</div>
				</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	<a href="<?php the_field('reviews_button_link'); ?>" class="button">Reviews</a>
</section>


<section class="home-primary-rhinoplasty">
<!-- <section class="home-primary-rhinoplasty parallax-primary-rhinoplasty will-parallax"> -->
	<div class="wow fadeIn" data-wow-offset="0" data-wow-delay=".30s" data-wow-duration=".5s">
	<h2><?php the_field('primary_rhinoplasty_headline'); ?></h2>
	<?php the_field('primary_rhinoplasty_content'); ?>
	<?php if(have_rows('primary_rhinoplasty_buttons')): ?>
		<ul class="home-buttons-list">
			<?php while(have_rows('primary_rhinoplasty_buttons')): the_row(); ?>
				<li>
					<a href="<?php the_sub_field('link'); ?>" rel="nofollow" class="button"><?php the_sub_field('text'); ?></a>
				</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	</div>
</section>

<?get_footer()?>