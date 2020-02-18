<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package devlab
 */

get_header();
?>
    <section class="article-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="row justify-content-center">
                        <div class="col-11 col-md-9">
                            <?php
                            while ( have_posts() ) :
                                the_post();

                                get_template_part( 'template-parts/content', get_post_type() );


                                the_post_navigation();

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>
                        </div>
                        <div class="col-11 col-md-3">
                            <?php get_template_part('template-parts/content', 'sidebar'); ?>
                        </div>
                    </div>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </section>

<?php
//get_sidebar();
get_footer();
