<?php
/**
* Template part for displaying blog layout
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Bloghub
*/

?>
<section id="body-default-type">
<div class="container">
	<div class="row"> 

		<!--Article body-->
		<div class="col-md-9 pr-md-5"> 

			<!--Article-->
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$blog_count= get_theme_mod('bloghub_blog_list_count',6);
			$args = array('posts_per_page' => $blog_count, 'paged' => $paged ,'post__not_in' => get_option( 'sticky_posts' ));
			query_posts($args);
			if ( have_posts() ) :
				/* Start the Loop */

				while ( have_posts() ) : the_post();   ?>
				<article>
					<header class="entry-header"><?php if ( has_post_thumbnail() ) {?>
						<img src="<?php the_post_thumbnail_url('bloghub-layout-blog'); ?>"> <?php } else {?><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/default.jpg' ); ?>"><?php } ?>
						<div class="home-article-content "> <span class="tag-details"><?php
		$id = get_the_ID();

		 $categories = get_the_category($id );
		
				foreach ($categories as $category ) {
				
				echo '<a href="' .esc_url( get_tag_link($category->term_id)).'">' . esc_html( $category->name ) . '</a> '; }?>  </span>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php echo wp_kses_post( wp_trim_words( get_the_content(), 10, '...')); ?></p> <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','bloghub'); ?></a>
							<?php bloghub_posted_by(); ?> &diams; <span class="date-article"><?php bloghub_posted_on(); ?></span></span></span>  </div>
						</header>
					</article>
					<!--/Article--> 
				<?php  endwhile;endif; ?>
				<div class="clearfix"></div>

				<!--/Article full--> 
				<nav class="navigation posts-navigation"  role="navigation">
					<ul>
						<li>
							<?php
							the_posts_pagination(
								array(
									'prev_text' => '<i class="fa fa-chevron-left"></i>' ,
									'next_text' =>  '<i class="fa fa-chevron-right"></i>',
								)
							);
							?>
							<?php wp_reset_postdata(); ?>
						</li>
					</ul>
				</nav>


				<hr>
			</div>
			<!--/Article body--> 

			<!--aside-->
			<aside class="col-md-3 order-md-1"> 
				<!--Search-->
				<?php get_sidebar(); ?>

			</aside>
			<!--/aside--> 

		</div>
	</div>
</section>