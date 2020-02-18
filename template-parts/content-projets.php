<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package devlab
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-meta">
            <?php
            devlab_posted_on();
            devlab_posted_by();
            ?>
        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->

    <?php devlab_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content();
        ?>

        <?php
        //var_dump(get_fields());
        $fields = get_fields();
        if(!empty($fields['equipe'])) {
            echo $fields['equipe'];
        }

        ?>

    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
