<?php
/**
 * The header for meyti theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Meyti
 */
?>



<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php is_rtl(); ?>">
<head>


<meta charset="<?php echo bloginfo('charser');?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

<style type="text/css" id="custom-background-css">
body.custom-background { background-color: #bdd96e; }
</style>


<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />

</head>
<?php wp_body_open(); ?>
<body <?php body_class(); ?>>



   
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <?php
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
          echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="">';
        ?>
      </a>



      <nav id="navbar" class="navbar">
        
        <ul>
            <?php
            wp_nav_menu( array(
            'menu' => 'top nav menu',
            'theme_location' => 'header',
            'depth' => 3,
            'container' => 'nav',
            'container_class' => 'navbar',
            'menu_class' => 'nav navbar',
            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
            'walker' => new wp_bootstrap_navwalker())
            );
            ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
    <?php if ( ! isset( $content_width ) ) $content_width = 900; ?>
  </header><!-- End Header -->

    