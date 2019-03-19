
<footer>
	<div class="footer-cta">
		<span>Schedule Your <br>Confidential Plastic Surgery Consultation</span>
	</div>
	<section class="upper-footer will-parallax parallax-footer">
		<div class="mobile-image">
			<img src="<?php bloginfo('template_directory'); ?>/images/bg-footer.jpg" alt="logo">
		</div>
		<div class="footer-contact-form">
			<?php echo do_shortcode('[seaforms name="contact-us"]'); ?>
		</div>
		<div class="footer-address" style="background-image: url('<?php bloginfo('template_directory'); ?>/images/icon-map.png');">
			<img src="<?php bloginfo('template_directory'); ?>/images/logo-footer.png" alt="logo">
			<?php if(have_rows('locations', 'option')): ?>
				<?php while(have_rows('locations', 'option')): the_row(); ?>
					<div class="the-loc">
						<div class="loc-addy">
							<a href="<?php the_sub_field('map_link', 'option'); ?>" class="track-outbound" data-label="Address - Footer" target="_blank"  rel="noopener">
								<i class="fas fa-map-marker-alt"></i>
								<?php the_sub_field('address', 'option'); ?><br> <?php the_sub_field('city', 'option'); ?>
							</a>
						</div>
						<div class="loc-phone">
							<a href="<?php the_sub_field('phone_link', 'option'); ?>" class="track-outbound" data-label="Phone - Footer">
								<i class="fas fa-mobile-alt"></i>
								<?php the_sub_field('phone', 'option'); ?></a>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="footer-social">
			<a href="<?php the_field('facebook','options'); ?>" target="_blank" rel="noopener" title="facebook"><i class="fab fa-facebook"></i></a>
			<a href="<?php the_field('instagram','options'); ?>" target="_blank" rel="noopener" title="instagram"><i class="fab fa-instagram"></i></a>
			<a href="<?php the_field('twitter','options'); ?>" target="_blank" rel="noopener" title="twitter"><i class="fab fa-twitter"></i></a>
			<a href="<?php the_field('google','options'); ?>" target="_blank" rel="noopener" title="google"><i class="fab fa-google"></i></a>
			<a href="<?php the_field('pinterest','options'); ?>" target="_blank" rel="noopener" title="pinterest"><i class="fab fa-pinterest"></i></a>

		</div>
	</section>

	
	<section class="lower-footer">
		<div class="footer-buttons">
			<a href="<?php the_field('gallery_footer_link', 'option'); ?>">Results Gallery</a>
			<a href="<?php the_field('reviews_footer_link', 'option'); ?>">Patient Reviews</a>
		</div>		
		<div class="model-disc">
			<p>Stock model images are used throughout this website and are for illustrative purposes only. All before-and-after photos and patient testimonials on our site are from actual patients, and have been published with permission. Individual results may vary.</p>
		</div>
		<div class="copyright">Copyright &copy; <?=date("Y")?> <?bloginfo('title');?>. All rights reserved | <a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a> | <a href="<?php bloginfo('url'); ?>/sitemap/" title="Sitemap">Sitemap</a> </div>
		<div class="rm-sig"><a href="<?php the_field('rm_footer_link', 'options'); ?>" target="_blank" rel="noopener" title="<?php the_field('rm_footer_text', 'options'); ?>"><?php the_field('rm_footer_text', 'options'); ?></a> by <a href="https://www.rosemontmedia.com/" title="Rosemont Media" target="_blank" rel="noopener"><?php inline_svg('rm-logo'); ?></a></div>
		<div class="footer-logos">
			<?php if(have_rows('footer_logos', 'option')): ?>
				<ul>
					<?php while(have_rows('footer_logos', 'option')): the_row(); ?>
						<li>
							<img src="<?php the_sub_field('logo'); ?>" alt="top doc logo">
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>  


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