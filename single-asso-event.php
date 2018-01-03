<?php
/**
 * The template for displaying all single posts.
 */

get_header();
?>

<div>
    <main class="container">
        <article class="row">
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $asso_event_date_begin = esc_html(get_post_meta(get_the_ID(), 'asso_event_date_begin', true));
                $asso_event_date_end = esc_html(get_post_meta(get_the_ID(), 'asso_event_date_end', true));

                ?>
                <div class="col-md-4">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid"
                         alt="<?php echo get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true); ?>">
                </div>
                <div class="col-md-8">
                    <h1 class="post-title"><?php echo 'Le ' . date("d/m/Y à H:i", strtotime($asso_event_date_begin)) . '<br>';
                        the_title(); ?></h1>
                    <p class="post-info">
                        Posté le <?php the_date(); ?>
                    </p>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; // end of the loop. ?>
        </article>
    </main>
</div>

<?php get_footer(); ?>
