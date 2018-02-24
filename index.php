<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloghub
 */

get_header(); ?>

	<section id="home-banner-block">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
       <?php
$page_ids = bloghub_slider_data();
if ( ! empty( $page_ids ) ) 
{
  
    global $post;  
    $firstclass='active'; 
    foreach ($page_ids as $post_id => $settings  ) 
    {
        $post_id = $settings['content_page'];
        $post_id = apply_filters( 'wpml_object_id', $post_id, 'page', true );
        $posts = get_post( $post_id );
        setup_postdata( $posts );
    $featured_img_url = get_the_post_thumbnail_url($post_id,'full');
       
        ?>
      <div class="carousel-item <?php echo esc_html($firstclass); ?>"> <img class="d-block w-100" src="<?php echo esc_url($featured_img_url); ?>" alt="First slide">
        <div class="carousel-caption  d-md-block " data-aos="fade-left">
          <p>Creative Ideas</p>
          <h2><?php echo esc_html( get_the_title($post_id)); ?></h2>
          <a href="<?php echo esc_url (get_permalink($post_id)); ?>"><?php esc_html_e('Learn More','bloghub'); ?></a> </div>
      </div>
      <?php
    $firstclass='';
    }  // end foreach
    wp_reset_postdata();
} ?>
    </div>
    <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> </a> <a class="carousel-control-next  " href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> </a> </div>
</section>

<!-- body section type A
    ==========================================-->
<?php
$blog_layout=get_theme_mod('bloghub_blog_layout','layout-one');
switch ($blog_layout){
  
  case 'layout-one':
   get_template_part( 'template-parts/blog', 'layout-one' );
  break;
  case 'layout-two':
  get_template_part( 'template-parts/blog', 'layout-two' );
  break;
  case 'layout-three':
  get_template_part( 'template-parts/blog', 'layout-three' );
  break;
  case 'layout-four':
  get_template_part( 'template-parts/blog', 'layout-four' );
  break;     
}
?>


<?php

get_footer();
