<?
// Template Name: Frequently Asked Questions
?>

<?php get_header()?>

<section class="interior">
	<?php if(have_posts()) : while (have_posts()) : the_post();?>
		<article class="content" id="skiptomaincontent">
			<?php the_content(); ?>
			
			<?php if(have_rows('frequently_asked_questions')): ?>
				<?php while(have_rows('frequently_asked_questions')): the_row(); ?>
					<div class="faqs-section" id="<?php the_sub_field('anchor_id'); ?>">
						<div class="faq-quest">
							<span>Q.</span>
							<h2>
								<?php the_sub_field('question'); ?>
							</h2>
						</div>
						<div class="faq-answ">
							<span>A.</span>
							<div>
							<?php the_sub_field('answer'); ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php edit_post_link( $link = __('<< EDIT >>'), $before = "<p>", $after ="</p>", $id ); ?>
		</article>
	<?php endwhile; endif;?>

	<?php get_sidebar()?>
</section>

<?php get_footer()?>


