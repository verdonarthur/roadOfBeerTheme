<?php
/**
 * The main template file.
 *
 */

get_header();
?>


<div>
    <main>
        <section id="banner" class="container-fluid">
            <p>Découvrez l'art de</p>
            <h1>La bière</h1>
            <a class="btn-theme" href="<?php echo get_page_uri(42)?>">Devenir membre</a>
        </section>
        <section id="beerOfTheMonth" class="container-fluid">
            <div class="row">
                <div class="offset-md-1 col-md-5 beerDescription">
                    <?php
                    $beer = get_beerofthemonth();
                    ?>

                    <h2>Bière du mois : <?php echo $beer[0] ?></h2>
                    <hr>
                    <dl>
                        <dt>BRASSERIE :</dt>
                        <dd><?php echo $beer[2] ?></dd>
                        <dt>FABRICATION :</dt>
                        <dd><?php echo $beer[3] ?></dd>
                        <dt>LIEU :</dt>
                        <dd><?php echo $beer[4] ?></dd>
                        <dt>TYPE :</dt>
                        <dd><?php echo $beer[5] ?></dd>
                    </dl>
                    <a class="btn-theme" href="<?php echo $beer[8] ?>">En savoir plus</a>
                </div>
                <div class="col-md-6 beerOfTheMonthPicture">
                    <img src="<?php echo $beer[6][0] ?>">
                </div>
            </div>
        </section>
        <section id="lastArticleMain">
            <?php $args = array(
                'orderby' => 'date',
                'order' => 'DESC',
                'showposts' => 3,
            );
            $query = new WP_Query($args);
            ?>

            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="container-fluid">
                        <div class="background"
                             style="background-image: url('<?php echo get_the_post_thumbnail_url();?>') "></div>
                        <div class="text container-fluid">
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo wp_trim_words(get_the_content(),55,'...'); ?></p>
                            <a class="btn-theme" href="<?php echo wp_get_shortlink(); ?> ">En savoir plus</a>
                        </div>

                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
</div>
</section>

</main>

</div>


<?php get_footer(); ?>
