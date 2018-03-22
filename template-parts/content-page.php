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
            			 <?php
            
             if (function_exists('ADDTOANY_SHARE_SAVE_KIT')) {?>
            <li><a href="#"><i class="fa fa-share-alt"></i> 5</a></li>
            <li>
              <ul>
                <li ><?php echo do_shortcode('[addtoany]'); ?></li>
              </ul>
            </li>
            <?php } ?>
            		</ul>
            	</div>
            	<!--/article content--> 
            	
            	
            </article><!-- #post-<?php the_ID(); ?> -->
