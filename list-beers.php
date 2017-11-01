<?php
/**
 * Template Name: list-of-beers
 * The template for displaying the list of beers
 *
 */

get_header();

?>
    <main class="container-fluid">
        <div class="card-columns">
            <?php
            $mypost = array('post_type' => 'beer',);
            $loop = new WP_Query($mypost);
            ?>
            <?php while ($loop->have_posts()) :
                $loop->the_post();

                $isbeerofthemonth = esc_html(get_post_meta(get_the_ID(), 'isbeerofthemonth', true));
                $beer_brewery = esc_html(get_post_meta(get_the_ID(), 'beer_brewery', true));
                $beer_fabrication = esc_html(get_post_meta(get_the_ID(), 'beer_fabrication', true));
                $beer_location = esc_html(get_post_meta(get_the_ID(), 'beer_location', true));
                $beer_type = esc_html(get_post_meta(get_the_ID(), 'beer_type', true));

                // Get WordPress' media upload URL
                $upload_link = esc_url(get_upload_iframe_src('image', get_the_ID()));

                // See if there's a media id already saved as post meta
                $beer_picture = esc_html(get_post_meta(get_the_ID(), 'beer_picture', true));

                // Get the image src
                $beer_picture_src = wp_get_attachment_image_src($beer_picture, 'full');

                $beer_description = esc_html(get_post_meta(get_the_ID(), 'beer_description', true));

                $image_alt = get_post_meta( $beer_picture, '_wp_attachment_image_alt', true);

                if ( empty( $image_alt )) {
                    $image_alt = get_the_title();;
                }

                ?>
                <article class="card text-black" style="color:black;border:none;">
                    <?php if (is_array($beer_picture_src)) : ?>
                        <img class="card-img-top" src="<?php echo $beer_picture_src[0] ?> " alt="<?php echo $image_alt; ?>"/>
                    <?php endif; ?>
                    <div class="card-body">
                        <h2 class="card-title"><?php the_title(); ?></h2>

                        <p class="card-text"><?php echo wp_trim_words($beer_description, 30, '...'); ?></p>
                        <a class="btn-theme" href="<?php echo wp_get_shortlink(); ?> ">En savoir plus</a>
                    </div>
                </article>

            <?php endwhile; ?>

        </div>
    </main>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>