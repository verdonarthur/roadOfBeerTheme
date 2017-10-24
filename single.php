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
                <?php ?>
            <div class="col-md-4" >
                <img src="<?php echo get_the_post_thumbnail_url();?>" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h1 class="post-title"><?php the_title(); ?></h1>
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
