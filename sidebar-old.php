<!-- <aside>
	
	<a href="<?php the_field('virtual_consult_link', 'option'); ?>"  class="virtual-consulation sidebar-button">
		<div>
			<i class="fas fa-user-tie"></i>
			<i class="far fa-comment-alt"></i>
			Virtual Consultation
		</div>
	</a>
	
	<div class="sidebar-schedule sidebar-block-schedule">
		<div class="sb-heading">Schedule a Consultation</div>
		<div class="sb-sushi">
			<div class="sushi-call"><span>Call today</span>
				<?php if(have_rows('locations', 'option')): ?>
					<?php while(have_rows('locations', 'option')): the_row(); ?>
						<a href="<?php the_sub_field('phone_link', 'option'); ?>" class="track-outbound" data-label="Phone - Footer"><?php the_sub_field('phone', 'option'); ?></a> 
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<div class="sushi-or">or</div>
			<div class="sushi-button"><a href="<?php bloginfo('template_directory'); ?>/contact-us/" class="button">Email Us</a></div>
		</div>
	</div>


	<?php if(get_post_type() == 'post'){ ?>
		<!-- Sidebar Blog Pages -->
		<div class="sidebar-block blog-block">
			<div class="sb-inside">
				<div class="sb-heading">Categories</div>
				<ul>
					<?php wp_list_categories( array(
						'title_li' 	=> '',
						'depth'		=> 1,
							// 'exclude'	=> 26
					) ); ?>
				</ul>

			</div>
		</div>
		<div class="sidebar-block blog-block">
			<div class="sb-inside">
				<div class="sb-heading">Archives</div>
				<ul class="list-items">
					<?php  wp_get_archives( array(
						'type'            => 'yearly',
						'limit'           => '',
						'before'          => '',
						'after'           => '',
						'show_post_count' => false,
						'echo'            => 1,
						'order'           => 'DESC'
					)); ?>
				</ul>

			</div>
		</div>
	<?php } ?>


	<!-- Sidebar Related Pages -->

	<?php if(!is_page(array('contact-us'))): ?>
		<?php if(!this_is('gallery-child' || 'gallery') && get_post_type() != 'post' && get_post_type() != 'news-room'):
		global $post;
		$related_id = ( $post->post_parent ) ? $post->post_parent : $post->ID;
		$childPages = wp_list_pages(array(
			'title_li'  	=> '',
			'child_of'  	=> $post->ID,
			'depth'   	=> 1,
			'echo'		=> 0
		));
		$wp__list_pages = wp_list_pages(array(
			'title_li'  	=> '',
			'child_of'  	=> $related_id,
			'exclude'		=> "$post->ID",
			'depth'   	=> 1,
			'echo'		=> 0
		));
		if(!empty($childPages)):
			$wp__list_pages = $childPages;
		endif;
		if( !empty($wp__list_pages) ): ?>

			<div class="sidebar-block blog-block">
				<div class="sb-heading">Related Pages</div>
				<div>
					<ul class="list-unstyled">
						<?php echo $wp__list_pages; ?>
					</ul>
				</div>
			</div>

		<?php endif; ?>
	<?php endif; ?>

	<!-- Related Posts on Pages -->

	<?php
	global $post;
	$custom_fields = get_post_custom($post->ID);
	if(isset($custom_fields['relatedMetaBox'])) {
		$my_custom_field = $custom_fields['relatedMetaBox'];
	}

	if (isset($my_custom_field )):
					    // echo '<section class="related-posts">';
		foreach ( $my_custom_field as $key => $value )
			if (isset($my_custom_field)) {
					      // echo "<div class='hdng'>Related Posts</div>";
			}
			$args = array(
				'post_type' => 'post',
				'category__and' => array( $value ),
				'posts_per_page' => 4
			);
					    // the query
			$the_query = new WP_Query( $args );
			?>


			<?php if ( $the_query->have_posts() ) : ?>
				<div class="sidebar-block blog-block">
					<div class="sb-inside">
						<div class="sb-heading">Related Articles</div>
						<ul class="list-unstyled">
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<li>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
				<?php wp_reset_postdata(); ?>
				<?php else: endif; ?>
			<?php endif; ?>
			<!-- End Related Posts -->

		<?php endif; ?>


		<a href="<?php the_field('out-of-town_patients', 'option'); ?>">
			<div class="sidebar-button">
				<i class="fas fa-plane"></i> Out-of-Town Patients
			</div> 
		</a>
		
		<a href="<?php the_field('educational_videos', 'option'); ?>">
			<div class="sidebar-button">
				<i class="fas fa-play-circle"></i> Educational Videos
			</div> 
		</a>

		<?wp_reset_postdata(); ?>

	</aside> -->