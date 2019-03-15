<?get_header()?>

<section class="interior">
	<?if ( have_posts() ) : while ( have_posts() ) : the_post();?>
		<article class="content">
			<h1><?php the_title(); ?></h1>
			<div class="meta-data">Posted on <?the_time('M');?> <?the_time('j');?>, <? the_time('Y'); ?> <?php the_category(', '); ?></div>
			<?the_content();?>
			<?php edit_post_link( $link = __('<< EDIT >>'), $before = "<p>", $after ="</p>", $id ); ?>
			<div class="next-prev">
				<?php
				prevnext__modify( get_previous_post_link('%link', 'Previous Post') ,
					$attributes = array(
						'class' => 'button prev-blog-button',
					));
					?>
					<?php
					prevnext__modify( get_next_post_link('%link', 'Next Post') ,
						$attributes = array(
							'class' => 'button alignright next-blog-button',
						));
					?>
			</div>
		</article>
		<?endwhile; endif;?>
		<?php get_sidebar()?>
	</section>
<?get_footer()?>