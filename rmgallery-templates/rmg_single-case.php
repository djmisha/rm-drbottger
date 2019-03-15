<? get_header();?>

<section class="gallery-nav">
	<div class="gal-prev-next">
		<?php

	/**
	* accepts an array
	* keys : 'class' , 'title' , 'hash'
	* if 'title' key is not present then default will be
	* - prev : &laquo; Previous
	* - next : Next &raquo;
	*/

	$rmg_case::prev( array(
		'class' => 'button-rmg button-gallery-prev button' ,
		'title'  => ' <i class="fal fa-angle-left" aria-hidden="true"></i> Previous') );

	$rmg_case::next( array(
		'class' => 'button-rmg button-gallery-next button' ,
		'title' => 'Next <i class="fal fa-angle-right" aria-hidden="true"></i>') );
		?>
	</div>
	<div class="single-case-title">
		<?php the_title(); ?>
	</div>
</section>

<main class="interior">
	<div class="single-case-content">
		<div class="case-wrap">
			<?if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<div class="img-wrap">
				<?php foreach ( $post->rmg_case_imgs as $img ): ?>
					<div class="before-img img-frame">
						<img class="first" src="<?php echo $rmg_case::get_image($img['before_image_path']); ?>" alt="" />
						<div class="bna-label">Before</div>
					</div>
					<div class="after-img img-frame">
						<img src="<?php echo $rmg_case::get_image($img['after_image_path']); ?>" alt="" />
						<div class="bna-label">After</div>
					</div>
				<?php endforeach; ?>
			</div>
			<?php if(!empty(get_the_content())): ?>
				<div class="patient-details">
					<span>Patient Details</span>
					<?the_content();?>
				</div>
			<?php endif; ?>
			<?endwhile; endif;?>
		</div>
	</div>

</main>

<? get_footer();?>