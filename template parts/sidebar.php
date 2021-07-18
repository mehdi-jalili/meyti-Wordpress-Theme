<?php
/**
 * Template part for displaying sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Meyti
 */
?>


<h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                <?php
                        $categories = get_the_category();
                            if ( ! empty( $categories ) ) {
                                echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                            }
                    ?>
                </ul>
              </div><!-- End sidebar categories-->


              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>                
                <?php
                        $post_tags = get_the_tags();
                        if ( ! empty( $post_tags ) ) {

                            foreach( $post_tags as $post_tag ) {
                                echo '<a href="' . get_tag_link( $post_tag ) . '">' . $post_tag->name .' , </a>';
                            }

                        } 
                    ?>
                </ul>
              </div><!-- End sidebar tags-->