<?php
/**
 * The template for displaying the footer.
 */

$the_theme = wp_get_theme();
?>


<footer class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <h2>menu</h2>
            <?php wp_nav_menu(
                array(
                    'menu_id' => 'footer-menu',
                )
            ); ?>
        </div>
        <div class="col-md-4">
            <h2>Contact</h2>
            <p>La Route des Bières SA<br>
                Avenue des Sports 20<br>
                1400 Yverdon-les-bains<br>
                info@routedesbieres.ch
            </p>
        </div>
        <div class="col-md-4">
            <h2>Social</h2>
            <div class="social-share">
                <a href="https://www.instagram.com/redgull.ch/?hl=fr" class="instagram-share"><i
                            class="fa fa-instagram"></i></a> <a href="https://www.facebook.com/RedGull.ch/"
                                                                class="facebook-share"><i
                            class="fa fa-facebook"></i></a>
            </div>
        </div>
    </div>
    <!--<div class="row"><p>webmasters: Arthur Verdon, Audrey Hugenin et Juan Morenop</p></div>-->
</footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>

</html>
