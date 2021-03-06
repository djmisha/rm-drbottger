<?php
add_shortcode('testimonial' , 'testimonial');
function testimonial( $atts , $content = null ){
	extract( shortcode_atts( array(
		'name'	=> '',

	), $atts , 'testimonial' ) );
		ob_start();

?>

<section class="home-reviews">
	<div class="the-review">
		<h2><?php the_field('testimonial_headline'); ?></h2>
		<div class="the-stars">
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
		</div>
		<?php the_field('testimonial_content'); ?>
		<span class="button"><i class="fas fa-user-alt"></i> <?php the_field('testimonial_name'); ?> </span>
	</div>
</section>
		
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
