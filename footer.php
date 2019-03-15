
<footer>
	<section class="upper-footer">
		<div class="footer-contact-form">
			<span>Contact Us</span>
			<?php if(have_rows('locations', 'option')): ?>
				<?php while(have_rows('locations', 'option')): the_row(); ?>
					<div class="the-loc">
						<div class="loc-phone">
							<strong>P</strong>&nbsp; <a href="<?php the_sub_field('phone_link', 'option'); ?>" class="track-outbound" data-label="Phone - Footer"><?php the_sub_field('phone', 'option'); ?></a><br>  
							<strong>F</strong>&nbsp; <?php the_sub_field('fax', 'option'); ?> 
						</div>
						<div class="loc-addy">
							<a href="<?php the_sub_field('map_link', 'option'); ?>" class="track-outbound" data-label="Address - Footer" target="_blank"  rel="noopener">
								<?php the_sub_field('address', 'option'); ?><br> <?php the_sub_field('city', 'option'); ?>
							</a>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php echo do_shortcode('[seaforms name="quick-contact"]'); ?>
		</div>

		<div class="footer-map-icon" style="background-image: url('<?php bloginfo('template_directory'); ?>/images/icon-map.png');">
			<?php if(have_rows('locations', 'option')): ?>
				<?php while(have_rows('locations', 'option')): the_row(); ?>
					<a href="<?php the_sub_field('map_link', 'option'); ?>" class="track-outbound" data-label="Address - Footer" target="_blank"  rel="noopener">
						<img src="<?php bloginfo('template_directory'); ?>/images/icon-map.png" alt="map icon">
					</a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	
	<div class="lower-footer">
		<span>Blog</span>
		<div class="footer-latest-news">
			<?php if( get_post_type() != 'post'): ?>
				<?php
				$args = array(
					'numberposts' => 3,
					'post_status'=>"publish",
					'post_type'=>"post",
					'orderby'=>"post_date");

				$postslist = get_posts( $args );

				echo '<ul class="latest-posts">';

				foreach ($postslist as $post) :  setup_postdata($post); ?>
					<li>
						<a href="<?the_permalink();?>">
							<img src="<?php bloginfo('template_directory'); ?>/images/icon-file.png" alt="icon">
							<?the_title();?>
						</a>
					</li>
				<?php endforeach; ?>
				<?php wp_reset_query(); ?>
			</ul>
		<?php endif; ?>
	</div>
	<div class="footer-logo">
		<img src="<?php bloginfo('template_directory'); ?>/images/logo-footer.png" alt="logo">
	</div>

	<div class="model-disc">
		<p>Stock model images are used throughout this website and are for illustrative purposes only. All before-and-after photos and patient testimonials on our site are from actual patients, and have been published with permission. Individual results may vary.</p>
	</div>
	<div class="copyright">Copyright &copy; <?=date("Y")?> <?bloginfo('title');?>. All rights reserved | <a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a> | <a href="<?php bloginfo('url'); ?>/sitemap/" title="Sitemap">Sitemap</a> </div>
	<div class="rm-sig"><a href="<?php the_field('rm_footer_link', 'options'); ?>" target="_blank" rel="noopener" title="<?php the_field('rm_footer_text', 'options'); ?>"><?php the_field('rm_footer_text', 'options'); ?></a> by <a href="https://www.rosemontmedia.com/" title="Rosemont Media" target="_blank" rel="noopener"><?php inline_svg('rm-logo'); ?></a></div>
</div>  



</footer>

<?wp_footer();?>

<?php
$bsPort 				= 35730;
$browserSync 			= 'http://rosemontdev.com:'.$bsPort;
$browserSyncHdrs 		= @get_headers($browserSync);
if($browserSyncHdrs):
	?>
	<script async src="http://rosemontdev.com:<?php echo $bsPort?>/browser-sync/browser-sync-client.js?v=2.18.8"></script>
	<?
endif;
?>

</body>
</html>