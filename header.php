<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bloghub
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="top-header" >
  <div class="container-fluid " > 
    
    <!--Top social-nav-->
    <div class="top-social-nav-block">
      <div class="row ">
        <div class="col-md-6 logo-tagline"> <?php
			
			
       $custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
if ( has_custom_logo() ) :
?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($image[0]); ?>"> <?php bloginfo( 'name' ); ?></a>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;
			?> </div>
        <div class="col-md-6 social-search">
          <form id="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get"> 
            <div class="input-group">
             <input type="text" placeholder="<?php echo esc_attr_x( 'Search...&hellip;', 'placeholder', 'bloghub' ); ?>"  value="<?php echo get_search_query(); ?>" name="s" size="40"/></div>
          </form>
          <ul class="top-social">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    
    <!--/Top social-nav-->
    <div class="row"> 
      <!--Site title-->
      <div class="site-title-block text-center"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand "><?php bloginfo( 'name' ); ?></a> </div>
      <!--/Site title--> 
    </div>
    
    <!-- Navigation
    ==========================================-->
    <nav id="top-menu" class="navbar navbar-default navbar-expand-lg">
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topmenu-bar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="fa fa-bars"></span>  Menu </button>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse " id="topmenu-bar">
         
           <?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'     =>'nav navbar-nav'
				) );
			?>
          
        </div>
        <!-- /.navbar-collapse --> 
      </div>
      <!-- /.container-fluid --> 
      
    </nav>
  </div>
</header>