<?php 

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Meyti
 * 
 */

get_header(); ?>

<?php 
if ( has_post_format( 'quote' ) ) {
  echo 'This is a quote.';
}
?>

    <?php
        if ( have_posts() ) {
            // Load posts loop.
            while ( have_posts() ) {
            the_post();
    ?>


    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">

              <div class="image-box-single">
                <div class="img-fluid">
                    <?php
                        $args = array(
                            'title' => get_the_title()
                        );
                        if(has_post_thumbnail()) {
                            the_post_thumbnail('large', $args );
                        }
                    ?>
                </div>
            
                </div>                
              </div>

              <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="<?php the_permalink(); ?>"><time datetime="2020-01-01"><?php echo get_the_date(); ?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <?php the_content(); ?>
              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                    <?php
                        $categories = get_the_category();
                            if ( ! empty( $categories ) ) {
                                echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                            }
                    ?>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">

                    <?php
                        $post_tags = get_the_tags();
                        if ( ! empty( $post_tags ) ) {

                            foreach( $post_tags as $post_tag ) {
                                echo '<a href="' . get_tag_link( $post_tag ) . '">' . $post_tag->name .' , </a>';
                            }

                        } 
                    ?>

                </ul>
              </div>

            </article><!-- End blog entry -->

            <div class="blog-author d-flex align-items-center">
              <div>
                <h4><a href="<?php the_permalink(); ?>">Author : <?php the_author(); ?></a></h4>
                <p><?php the_author_meta('description'); ?></p>
              </div>
            </div><!-- End blog author bio -->

            <div class="blog-comments">
            <?php
              	// If comments are open or there is at least one comment, load up the comment template.
                comments_template(null,true ); ?>





            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->
          <div class="col-lg-4">

            <div class="sidebar">

            <?php   
                  get_template_part('template parts/sidebar');
               
                  function example_widget($content)
                    {
                        if (is_home() && is_active_sidebar('example') && is_main_query()) {
                            dynamic_sidebar('example');
                        }
                        return $content;
}
               
               ?>
    

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->


        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->














    <?php
            
        }
      }
    
    ?>







<?php get_footer(); ?>









