<?php
/**
 * Template Name: list-of-events
 * The template for displaying the list of beers
 *
 */

get_header();

?>
    <main class="container-fluid">
        <div class="card-columns">
            <?php
            $mypost = array('post_type' => 'asso_event',
                'orderby' => 'date',
                'order' => 'DESC',);
            $loop = new WP_Query($mypost);
            ?>
            <?php while ($loop->have_posts()) :
                $loop->the_post();

                $asso_event_date_begin = esc_html(get_post_meta(get_the_ID(), 'asso_event_date_begin', true));
                $asso_event_date_end = esc_html(get_post_meta(get_the_ID(), 'asso_event_date_end', true));


                ?>
                <article class="card text-black" style="color:black;border:none;">
                    <?php if (!empty(get_the_post_thumbnail_url())) : ?>
                        <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                    <?php endif; ?>
                    <div class="card-body">
                        <h2 class="card-title"><?php the_title(); ?></h2>
                        <h4 class="card-subtitle mb-2 text-muted"><?php echo 'Le ' . date("d/m/y à H:m", strtotime($asso_event_date_begin)); ?></h4>
                        <p class="card-text"><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                        <a class="btn-theme" href="<?php echo wp_get_shortlink(); ?> ">En savoir plus</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">dernière modification le : <?php the_modified_date() ?></small>
                    </div>
                </article>

            <?php endwhile; ?>

        </div>
    </main>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>