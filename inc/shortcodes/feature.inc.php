<?php
add_shortcode('feature' , 'sc__feature');
function sc__feature( $atts , $content = null ){
	extract( shortcode_atts( array(
		'name'	=> '',

	), $atts , 'feature' ) );
		ob_start();

?>
		<div class="page-feature full-width">
			<div class="feature-content">
				<div class="feature-border">
					
				<?php the_field('callout_section_content'); ?>
				</div>
			</div>
			<div class="feature-image" style="background: url(<?php the_field('callout_section_image'); ?>);" >
				
			</div>
		</div>

<?php
		$output = ob_get_contents();
		ob_end_clean();
	return $output;
}
