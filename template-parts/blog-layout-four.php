<?php
/**
 * Template part for displaying blog layout
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloghub
 */

?><!-- body section type D (Without Sidebar)
    ==========================================-->

<section id="body-column-type">
  <div class="container">
    <div class="row"> 
      
      <!--Article-->
      <?php
     
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array('posts_per_page' => 8, 'paged' => $paged,'post__not_in' => get_option( 'sticky_posts' ) );
      query_posts($args);
      if ( have_posts() ) :
        /* Start the Loop */

        while ( have_posts() ) : the_post();   ?>
      <div class="col-md-3">
        <article>
          <header class="entry-header" >
            <div class="hover-bg">
              <div class="hover-text"> <span class="tag-details"><?php
    $id = get_the_ID();

    $tags = get_the_tags($id);
    if( $tags !='' ){
      foreach ( $tags as $tag ) { 
        
        echo '<a href="' .esc_url( get_tag_link($tag->term_id)).'">' . esc_html( $tag->name ) . '</a> ';
       
      } } ?></span>
                <h4><a href="#"><?php the_title(); ?></a></h4>
                <div class="clearfix"></div>
                <a href="<?php the_permalink(); ?>" class="article-readmore"><?php esc_html_e('Read More','bloghub'); ?></a> </div>
             <?php if ( has_post_thumbnail() ) {?> <img src="<?php the_post_thumbnail_url(); ?>"  alt="..."><?php } ?> </div>
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
      <!--/Article--> 
      <?php  endwhile;endif; ?>
     
    </div>
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
  </div>
</section>