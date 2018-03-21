<?php
/**
 * Template part for displaying blog layout
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloghub
 */

?>
<section id="body-grid-type">
  <div class="container">
    <div class="row"> 
      <!--Card block-->
      <div class="card-columns"> 
        
        <!--Card-->
        <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $blog_count= get_theme_mod('bloghub_blog_list_count',6);
      $args = array('posts_per_page' => $blog_count, 'paged' => $paged ,'post__not_in' => get_option( 'sticky_posts' ));
      query_posts($args);
      if ( have_posts() ) :
        /* Start the Loop */

        while ( have_posts() ) : the_post();    get_template_part( 'template-parts/content', get_post_format() );

      endwhile;

      else :

      get_template_part( 'template-parts/content', 'none' );

      endif; ?>
        
   
          
        <!--Card--> 
        
     
        <!--Card--> 
        
        <!--Card (Embed Videos)-->
       <div class="clearfix"></div>

        <!--/Article full--> 
        
        <!--Card--> 
        
      </div>
      <!--/Card block--> 
      
    </div>
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
