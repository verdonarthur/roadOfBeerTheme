<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

?>

<div>
    <main class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content(); // displays whatever you wrote in the wordpress editor
        endwhile; endif; //ends the loop
        ?>
    </main>
</div>

<?php get_footer(); ?>
