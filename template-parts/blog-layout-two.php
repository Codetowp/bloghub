<?php
/**
 * Template part for displaying blog layout
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloghub
 */

?>
<section id="body-one-two-type">
  <div class="container">
    <div class="row"> 
      
      <!--Article body-->
      <div class="col-md-9 pr-md-5">
        <div class="row"> 
          <!--Article full-->
          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('posts_per_page' => 3, 'paged' => $paged );
query_posts($args);
      if ( have_posts() ) :
      /* Start the Loop */
      $count=2;
      while ( have_posts() ) : the_post();  $count++; ?>
          <article class="<?php if ($count %3 == 0 ) {?>col-md-12 <?php }else{ ?>col-md-6<?php } ?>">
            <header class="entry-header"> <img src="<?php the_post_thumbnail_url(); ?>" alt="" >
              <div class="home-article-content "> <span class="tag-details"><a href="#">Fashion</a>  </span>
                <h2><a href="#"><?php the_title(); ?></a></h2>
                <?php bloghub_posted_by(); ?> &diams; <span class="date-article"><?php bloghub_posted_on(); ?></span></span></span>
                <p><?php echo wp_kses_post( wp_trim_words( get_the_content(), 10,'..' )); ?><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read more','bloghub'); ?></a></p>
                
                <!--share-visit-->
                <hr>
                <ul class="share-visit-article">
                  <li><a href="#"><i class="fa fa-heart-o"></i> 120</a></li>
                  <li><a href="#"><i class="fa fa-eye"></i> 12</a></li>
                  <li><a href="#"><i class="fa fa-share-alt"></i> 5</a></li>
                  <li><a href="#"><i class="fa fa-comment-o"></i> 51 Comments</a></li>
                </ul>
                <!--share-visit--> 
                
              </div>
            </header>
          </article>

        <?php  endwhile;endif; ?>
          <!--/Article full--> 
          <?php next_posts_link(); ?>
          <?php previous_posts_link(); ?>
         
          
          <!--Ad Img--> 
         
          <!--/Ad Img--> 
          
          <!--Article full-->
         
          <!--/Article full--> 
          
        </div>
      </div>
    </div>
  </div>
</section>
