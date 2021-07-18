<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Meyti
 */
?>

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">



        <div class="row">

        <?php
                $args = array (
                    'before'            => '<div class="page-links-XXX"><span class="page-link-text">' . __( 'More pages: ', 'meyti' ) . '</span>',
                    'after'             => '</div>',
                    'link_before'       => '<span class="page-link">',
                    'link_after'        => '</span>',
                    'next_or_number'    => 'next',
                    'separator'         => ' | ',
                    'nextpagelink'      => __( 'Next &raquo', 'meyti' ),
                    'previouspagelink'  => __( '&laquo Previous', 'meyti' ),
                );
 
                wp_link_pages( $args );
                ?>

                    <?php
                    if ( have_posts() ) {
                        // Load posts loop.
                        while ( have_posts() ) { ?>

                    <?php
                        the_post();
                    ?>


                    <div class="col-lg-4">
                                <div class="post-box">
                                <div class="post-img"><?php
                        $args = array(
                        'title' => get_the_title()
                         );
                        if(has_post_thumbnail()) { ?>
                            <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', $args ); ?></a>
              
                    <?php
                    }
                    ?></div>
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                <h3 class="post-title"><div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                                <p class="post-title"><?php the_excerpt();?></p>
                                <a href="<?php the_permalink(); ?>" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>

  
<?php
    }

?>
       

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->


<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <span class="page-item page-link">
      <?php get_template_part('template parts/pagination')?>
    </span>
  </ul>
</nav>

    <?php
    } else get_template_part('template parts/error post');
    ?>

    </div>


