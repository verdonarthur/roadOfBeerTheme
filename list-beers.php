<?php
/**
 * Template Name: list-of-beers
 * The template for displaying the list of beers
 *
 */

get_header();

?>
    <div class="container">
        <main class="row">
            <?php
            $mypost = array('post_type' => 'beer',);
            $loop = new WP_Query($mypost);
            ?>
            <?php while ($loop->have_posts()) : $loop->the_post();

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

                ?>
                <article class="col-md-6 container-fluid">
                    <div class="row">
                        <div class="col-3">
                            <?php if (is_array($beer_picture_src)) : ?>
                                <img class="img-fluid" src="<?php echo $beer_picture_src[0] ?>"/>
                            <?php endif; ?>
                        </div>
                        <div class="col-9">
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo $beer_description ?></p>
                        </div>
                    </div>
                </article>

            <?php endwhile; ?>
        </main>
    </div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>