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
	
	<header class="entry-header"> <img src="img/2.jpg" alt="" >
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
		<span class="byline"> By <span class="author vcard"><a href="#">Ahmed Bensalah </a> &diams; <span class="date-article">Posted on 04 November 2017</span></span></span> </div>
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
