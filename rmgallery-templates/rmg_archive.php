<? get_header();?>

<main class="interior">

	<div class="gallery-content">
		<?php  echo rmg_archive_content(); ?>
	</div>
	
	<article class="content">
		
		<?
			$cat_cpt = rmg_helpers::$category_cpt_name;
			
			$parent = new WP_Query(array(
		    
		    'post_type' => $cat_cpt,
		    'post_parent' => 0,
		    'orderby' => 'menu_order',
		    'order' => 'ASC'
		
			));
	
		?>

		<?if ( have_posts() ) : while ( $parent->have_posts() ) : $parent->the_post();?>


		<?php
			if(has_post_thumbnail()):
				$catBg = get_the_post_thumbnail_url( $post->ID);
			endif;

			$postURL = get_permalink($post->ID);

		 ?>

		<div class="cat-container">
			<!-- <a href="<?php echo $postURL; ?>"> -->
				<!-- <div class="gallery-section" style="background-image: url(<?php echo $catBg; ?>)"> -->
				<h2><?php the_title();?></h2>
				<!-- <span>View Gallery</span> -->
				<!-- </div> -->
			<!-- </a> -->

			<ul>
				<?php
					$cats = $rmg_cat::children( $post , array('orderby' => 'menu_order' , 'order' => 'ASC' ));//uses get_children , finds the cases & their images and attaches it to the $post object

					foreach ($cats as $cat => $post) {
						echo '<li>';
							echo '<a href="'.get_permalink($post->ID).'">' . get_the_title( $post->ID ) . '</a>';
						echo '</li>';
					}
				?>
			</ul> 

		</div>
		
		<?endwhile; endif;?>

	</article>

	
</main>

<? get_footer();?>