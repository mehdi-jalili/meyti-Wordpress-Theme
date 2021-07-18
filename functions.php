<?php
/**
 * Meyti functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Meyti
 */

define('meyti_TMP_DIR', get_template_directory_uri());


function meyti_callback() {
    add_theme_support('post-thumbnails');
    add_theme_support('title_tag');
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support('custom-spacing');
    add_theme_support( 'wp-block-styles' );

}

add_action('init', 'meyti_callback');





if ( ! function_exists( 'meyti_register_nav_menu' ) ) {
 
    function meyti_register_nav_menu(){
        register_nav_menus( array(
            'header' => __( 'top nav menu', 'meyti' ),
        ) );
    }
    add_action( 'after_setup_theme', 'meyti_register_nav_menu', 0 );
}

require_once('template parts/wp_bootstrap_navwalker.php');






// Register styles


function meyti_load_assets() {
    wp_enqueue_style('style', meyti_TMP_DIR.'/style.css');

    wp_enqueue_style('bootstrap-min', meyti_TMP_DIR.'/assets/vendor/bootstrap/css/bootstrap.min.css');

    wp_enqueue_style('bootstrap-icons', meyti_TMP_DIR.'/assets/vendor/bootstrap-icons/bootstrap-icons.css');

    wp_enqueue_style('aos-css', meyti_TMP_DIR.'/assets/vendor/aos/aos.css');

    wp_enqueue_style('remixicon', meyti_TMP_DIR.'/assets/vendor/remixicon/remixicon.css');
    
    wp_enqueue_style('swiper-bundle-min', meyti_TMP_DIR.'/assets/vendor/swiper/swiper-bundle.min.css');

    wp_enqueue_style('glightbox-min', meyti_TMP_DIR.'/assets/vendor/glightbox/css/glightbox.min.css');

    wp_enqueue_style('main-style', meyti_TMP_DIR.'/assets/css/style.css');


}

add_action('wp_enqueue_scripts', 'meyti_load_assets');

// Register scripts


function meyti_load_scripts() {

    wp_register_script('bootstrap-bundle', get_template_directory_uri().'/assets/vendor/bootstrap/js/bootstrap.bundle.js' , '', '', true);
    wp_enqueue_script('bootstrap-bundle');

    wp_register_script('aos-js', get_template_directory_uri().'/assets/vendor/aos/aos.js' , '', '', true);
    wp_enqueue_script('aos-js');

    wp_register_script('validate', get_template_directory_uri().'/assets/vendor/php-email-form/validate.js' , '', '', true);
    wp_enqueue_script('validate');

    wp_register_script('swiper-bundle-min', get_template_directory_uri().'/assets/vendor/swiper/swiper-bundle.min.js' , '', '', true);
    wp_enqueue_script('swiper-bundle-min');
    
    wp_register_script('purecounter', get_template_directory_uri().'/assets/vendor/purecounter/purecounter.js' , '', '', true);
    wp_enqueue_script('purecounter');
    
    wp_register_script('isotope-pkgd-min', get_template_directory_uri().'/assets/vendor/isotope-layout/isotope.pkgd.min.js' , '', '', true);
    wp_enqueue_script('isotope-pkgd-min');
    
    wp_register_script('glightbox-min-js', get_template_directory_uri().'/assets/vendor/glightbox/js/glightbox.min.js' , '', '', true);
    wp_enqueue_script('glightbox-min-js');
    
    wp_register_script('main-js', get_template_directory_uri().'/assets/js/main.js' , '', '', true);
    wp_enqueue_script('main-js');
    
}

add_action('wp_enqueue_scripts', 'meyti_load_scripts');


// Register Sidear


function register_sidebar_callback() {
    register_sidebar(
        array(
            'name' => 'main sidebar',
            'description' => 'this is the main siderbar',
            'id' => 'main-sidebar',
            'class' => 'main-sidebar',
            'before_widget' =>'<aside>',
            'before_title' =>'<span class="sidebar-title">',
            'after_title' =>'</span>',
            'after_widget' =>'</aside>'
        )
    );
}

add_action('widgets_init','register_sidebar_callback');




// Customize background


function theme_support_custom_background() {
	

    $bg_defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default',
        'default-size'           => 'cover',
        'default-repeat'         => 'no-repeat',
        'default-attachment'     => 'scroll',
    );
    add_theme_support( 'custom-background', $bg_defaults );

}
add_action( 'custom-background', 'theme_support_custom_background' );





function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 200,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );




function theme_support_custom_header() {
	

    $defaults = array(
        'default-image'          => '',
        'width'                  => 0,
        'height'                 => 0,
        'flex-height'            => false,
        'flex-width'             => false,
        'uploads'                => true,
        'random-default'         => false,
        'header-text'            => true,
        'default-text-color'     => '',
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-header', $defaults );

}
add_action( 'custom-header', 'theme_support_custom_header' );




// Customize features



// register block pattern

function wpdocs_register_my_patterns(){
    register_block_pattern_category(
        'meyti/my-awesome-pattern',
    array(
        'title'       => __( 'Two buttons', 'meyti' ),
        'description' => _x( 'Two horizontal buttons, the left button is filled in, and the right button is outlined.', 'Block pattern description', 'meyti' ),
        'content'     => "<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"backgroundColor\":\"very-dark-gray\",\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background has-very-dark-gray-background-color no-border-radius\">" . esc_html__( 'Button One', 'meyti' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"textColor\":\"very-dark-gray\",\"borderRadius\":0,\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-very-dark-gray-color no-border-radius\">" . esc_html__( 'Button Two', 'meyti' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->")    
    );
}
    
   
  add_action( 'init', 'wpdocs_register_my_patterns' );



// register editor style

  function meyti_block_style() {
    register_block_style(            
        'core/button',            
         array(                
           'name'  => 'arrow-cta',                
           'label' => __( 'Arrow Link', 'meyti' ),            
        )        
      );
    }
  
  add_action( 'enqueue_block_editor_assets', 'meyti_block_style' );




// Registers editor stylesheet
function meyti_add_editor_styles() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
    add_editor_style( $font_url );
}
add_action( 'after_setup_theme', 'meyti_add_editor_styles' );



// Registers editor stylesheet
function meyti_comments_reply() {
    if( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
    }
    }
    add_action( 'comment_form_before', 'meyti_comments_reply' );