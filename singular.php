<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Meyti
 */


get_header(); ?>
  <div class="site-content">
    <?php
    while ( have_posts() ) :

    the_post();
    ?>

    <article <?php post_class(); ?>>

	  <?php the_post_thumbnail( 'my-custom-image-size' ); ?>

      <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      </header><!-- .entry-header -->

      <div class="entry-content">
        <?php the_content(); ?>
      </div><!-- .entry-content -->

    </article><!-- #post-## -->

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;

  endwhile;
	?>
	</div><!-- .site-content -->
<?php get_footer();?>