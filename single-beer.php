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
                <div class="col-md-4">
                    <img src="<?php echo $beer_picture_src[0]; ?>" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <p class="post-info">
                        Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
                    </p>
                    <div class="post-content">
                        <p><?php echo $beer_description ?></p>
                        <dl>
                            <dt>BRASSERIE :</dt>
                            <dd><?php echo $beer_brewery ?></dd>
                            <dt>FABRICATION :</dt>
                            <dd><?php echo $beer_fabrication ?></dd>
                            <dt>LIEU :</dt>
                            <dd><?php echo $beer_location ?></dd>
                            <dt>TYPE :</dt>
                            <dd><?php echo $beer_type ?></dd>
                        </dl>
                    </div>
                </div>
            <?php endwhile; // end of the loop. ?>
        </article>
    </main>
</div>

<?php get_footer(); ?>
