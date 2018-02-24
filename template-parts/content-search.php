<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloghub
 */

?>

	<div class="col-md-3">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <header class="entry-header" >
            <div class="hover-bg">
              <div class="hover-text"> <span class="tag-details"><a href="#">#Themes</a> <a href="#">#Fashion</a> </span>
                <h4><a href="#"><?php the_title(); ?></a></h4>
                <div class="clearfix"></div>
                <a href="<?php the_permalink(); ?>" class="article-readmore"><?php esc_html_e('Read More','bloghub'); ?></a> </div>
             <?php if ( has_post_thumbnail() ) {?>


						<img src="<?php the_post_thumbnail_url(); ?>"> <?php } ?> </div>
          </header>
          <!--share-visit-->
          <ul class="share-visit-article">
            <li><span class="byline"> <span class="date-article"> 04 aug 2017</span></span></li>
            <li><a href="#"><i class="fa fa-share-alt"></i> 5</a></li>
            <li>
              <ul>
                <li ><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                <li ><a href="#" title="twitter"><i class="fa  fa-twitter"></i></a></li>
                <li ><a href="#" title="google-plus"><i class="fa  fa-google-plus"></i></a> </li>
                <li><a href="#" title="Rss Feed"><i class="fa  fa-rss"></i></a></li>
              </ul>
            </li>
          </ul>
          <!--/share-visit--> 
        </article>
      </div>
<!-- #post-<?php the_ID(); ?> -->
