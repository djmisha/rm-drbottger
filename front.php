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
		<img src="<?php bloginfo('template_directory'); ?>/images/img-doctor.jpg" alt="doctor">
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