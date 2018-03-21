<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloghub
 */

?>

<div class="card">
          <article>
            <header class="entry-header"> <?php if ( has_post_thumbnail() ) {?>
           <a href="<?php the_permalink(); ?>"> <img src="<?php the_post_thumbnail_url('bloghub-layout-blog'); ?>"> <?php } else {?><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/default.jpg' ); ?>"></a><?php } ?>
              <div class="home-article-content ">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo wp_kses_post( wp_trim_words( get_the_content(), 10, '...')); ?> </p>
                <!--share-visit-->
                <ul class="share-visit-article">
                  <li><span class="byline"> <span class="date-article"><?php bloghub_blog_date(); ?></span></span></li>
                  <li><a href="#"><i class="fa fa-share-alt"></i> 5</a></li>
                </ul>
                <!--/share-visit--> 
                
              </div>
            </header>
          </article>
               </div>
