<?get_header()?>

<section class="interior">
	<article class="content">
		<?if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<article class="post-snippet">
				<div class="excerpt">
					<h2 class="blog-title"><a href="<?the_permalink();?>"><?the_title();?></a></h2>
					<div class="meta-data">Posted on <?the_time('M');?> <?the_time('j');?>, <? the_time('Y'); ?> in <?php the_category(', '); ?></div>
					<?php if(!empty(get_the_post_thumbnail())): ?>
						<div class="thumb">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('thumbnail'); ?>
							</a>
						</div>
					<?php endif; ?>
					<div class="para">
						<a href="<?php the_permalink(); ?>">
							<?php my_excerpt(65); ?>
						</a>
					</div>
				</div>
			</article>
			<?endwhile; endif;?>
			<div class="next-prev">
				<?php posts_nav_link( ' ', 'Previous Page', 'Next Page' ); ?>
			</div>
		</article>
		<?php get_sidebar()?>
	</section>
	<?wp_reset_postdata(); ?>
<?get_footer()?>