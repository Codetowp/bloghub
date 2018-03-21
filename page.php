<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloghub
 */

get_header(); ?>

<section id="article-Block">
	<div class="container">
		<div class="row"> 
			
			<!--Article body-->
			<div class="col-md-9 pr-md-5"> 

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					

			// If comments are open or we have at least one comment, load up the comment template.
					

		endwhile; // End of the loop.
		?>

		
			<!--/category tags-->
			
			
			
			
			
			<div class="clearfix"></div>
			
			<!--posts navigation-->
			
			<!--/comment--> 
			
			<!--/Article-->
			<?php if ( get_edit_post_link() ) : ?>
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'bloghub' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			<?php endif; ?>
			<hr>
		</div>
		<!--/Article body--> 
		
		<!--aside-->
		<aside class="col-md-3 order-md-1"> 
			<?php get_sidebar(); ?>
			
		</aside>
		<!--/aside--> 
		
	</div>
</div>
</section>

<?php

get_footer();
