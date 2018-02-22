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
          
      if ( have_posts() ) :
      /* Start the Loop */
      while ( have_posts() ) : the_post();   ?>
        <article>
          <header class="entry-header"> <img src="<?php the_post_thumbnail_url(); ?>">
            <div class="home-article-content "> <span class="tag-details"><a href="#">Fashion</a>  </span>
              <h2><a href="#"><?php the_title(); ?></a></h2>
              <?php echo wp_kses_post( wp_trim_words( get_the_content(), 10, '... <a href="'. get_permalink($post->ID) . '">Read More</a>.' ));?>
              <span class="byline"> By <span class="author vcard"><a href="#">Ahmed Bensalah </a> &diams; <span class="date-article">Posted on 04 November 2017</span></span></span> </div>
          </header>
        </article>
        <!--/Article--> 
        <?php endwhile; endif; ?>
       
        
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