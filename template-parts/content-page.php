<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloghub
 */

?>

<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloghub
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header"><?php if ( has_post_thumbnail() ) {?>
            <img src="<?php the_post_thumbnail_url(''); ?>"> <?php } else {?><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/default.jpg' ); ?>"><?php } ?>
		<div class="home-article-content "> <span class="tag-details"><?php
		$id = get_the_ID();

		$tags = get_the_tags($id);
		$count=1;
		if( $tags !='' ){
			foreach ( $tags as $tag ) { $count++;
				
				echo '<a href="' .esc_url( get_tag_link($tag->term_id)).'">' . esc_html( $tag->name ) . '</a> ';
				if( $count > 1 ) break;
			} } ?>
		</span>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<span class="byline"> <?php esc_html_e('By', 'bloghub'); ?><?php the_author_posts_link(); ?> &diams;<?php bloghub_posted_on(); ?></span> </div>
	</header>
	
	<!--article content-->
	<div class="post-content-block"> 
		
            <!-- Headings Tags
            	================================================== -->
            	
            	<?php the_content(); ?>
            	
            	<?php
            	$id = get_the_ID();

            	$tags = get_the_tags($id);
            	if( $tags !='' ){
            		?>    
            		<footer class="entry-footer entry-meta-bar">
            			<div class="entry-meta"> <?php esc_html_e('Tags','bloghub'); ?>:<?php
            			foreach ( $tags as $tag ) {
            				echo '<a rel="tag" href="' .esc_url( get_tag_link($tag->term_id)).'">' . esc_html( $tag->name ) . '</a> ';
            			}
            			?> </div>
            		</footer>
            		<?php } ?>
            		<!--/meta tags-->
            		
            		<h4 class="text-center">Share</h4>
            		<hr>
            		<ul class="article-share">
            			<li ><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
            			<li ><a href="#" title="twitter"><i class="fa  fa-twitter"></i></a></li>
            			<li ><a href="#" title="google-plus"><i class="fa  fa-google-plus"></i></a> </li>
            			<li><a href="#" title="Rss Feed"><i class="fa  fa-rss"></i></a></li>
            		</ul>
            	</div>
            	<!--/article content--> 
            	
            	
            </article><!-- #post-<?php the_ID(); ?> -->
