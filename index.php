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
      <div class="carousel-item active"> <img class="d-block w-100" src="<?php echo get_template_directory_uri() . '/assets/img/1.jpg'; ?>" alt="First slide">
        <div class="carousel-caption  d-md-block " data-aos="fade-left">
          <p>Creative Ideas</p>
          <h2>How to Learn UX Design</h2>
          <a href="#">Learn More</a> </div>
      </div>
      <div class="carousel-item"> <img class="d-block w-100" src="<?php echo get_template_directory_uri() . '/assets/img/2.jpg';?>" alt="Second slide">
        <div class="carousel-caption e d-md-block" data-aos="fade-left">
          <p>Creative Ideas</p>
          <h2>How to Learn UX Design</h2>
          <a href="#">Learn More</a> </div>
      </div>
      <div class="carousel-item"> <img class="d-block w-100" src="<?php echo get_template_directory_uri() . '/assets/img/3.jpg'?>" alt="Third slide">
        <div class="carousel-caption  d-md-block aos-animate fade" data-aos="fade-left">
          <p>Creative Ideas</p>
          <h2>How to Learn UX Design</h2>
          <a href="#">Learn More</a> </div>
      </div>
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
