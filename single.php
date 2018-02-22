<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		<?php
		$id = get_the_ID();

		$categories = get_the_category($id);
		if( $categories !='' ){
			?>    
			<footer class="entry-footer entry-category-bar">
				<div class="entry-meta"> <?php esc_html_e('Category','bloghub'); ?>:<?php
				foreach ( $categories as $category ) {
					echo '<a rel="tag" href="' . esc_html( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a> ';
				}
				?> </div>
			</footer>
			<?php } ?>
			<!--/category tags-->
			
			<div class="clearfix"></div>
			
			<!--author box-->
			<div class="author-box"> <img alt="" src="img/team/03.jpg"  class="avatar " height="100" width="100">
				<div class="author-box-title"> Authored By <a href="#" rel="author">Author </a> </div>
				<div class="author-description"> Foysal loves to dig into WordPress, explore what’s possible and share his knowledge with readers. He also has deep interest in anything related to increasing productivity, writing better and being happy! </div>
				<div class="author_social">
					<ul class="article-share">
						<li ><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
						<li ><a href="#" title="twitter"><i class="fa  fa-twitter"></i></a></li>
						<li ><a href="#" title="google-plus"><i class="fa  fa-google-plus"></i></a> </li>
						<li><a href="#" title="Rss Feed"><i class="fa  fa-rss"></i></a></li>
					</ul>
				</div>
			</div>
			<!--/author box-->
			
			<div class="clearfix"></div>
			
			<!--posts navigation-->
			<nav class="navigation posts-navigation"  role="navigation">
				<ul>
					<li class="pull-left">
						<div class="nav-previous">
							<?php $prev_post = get_adjacent_post(false, '', true);
							$prev = get_permalink(get_adjacent_post(false,'',true));
							if(!empty($prev_post)) { ?>
							
							<a href=" <?php echo esc_url($prev); ?>"><i class="fa fa-chevron-left"></i><?php esc_html_e('Previous post','bloghub'); ?> <span><?php echo esc_html($prev_post->post_title) ; ?></span> </a> <?php } ?></div>
						</li>
						<li class="pull-right">
							<div class="nav-next">
								<?php 
								$next_post = get_adjacent_post(false, '', false);
								$next = get_permalink(get_adjacent_post(false,'',false));
								if(!empty($next_post)) { ?>

								<a href="<?php echo esc_url($next);  ?>"><?php esc_html_e('Next post','bloghub'); ?> <i class="fa fa-chevron-right"></i> <span><?php echo esc_html($next_post->post_title); ?></span> </a> <?php } ?>
							</div>
						</li>
					</ul>
				</nav>
				<!--/posts navigation-->
				
				<div class="clearfix"></div>
				
				<!--Also like-->
				<div class="realated-posts-block">
					<h4 class="text-center"><?php esc_html_e('Realated Posts','bloghub'); ?></h4>
					<hr>
					<div class="clearfix"></div>
					<div id="realated-posts-" class="owl-carousel owl-theme"> 
						
						<?php bloghub_related_post(); ?>
						
					</div>
				</div>
				<!--/Also like-->
				
				<div class="clearfix"></div>
				
				<!--comment-->
				<?php  if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
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
