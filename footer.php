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
            <p>La Route des Bières<br>
                Avenue des Sports 20<br>
                1400 Yverdon-les-bains<br>
                <a href="mailto:info@routedesbieres.ch">info@routedesbieres.ch</a>
            </p>
        </div>
        <div class="col-md-4">
            <h2>Social</h2>
            <div class="social-share">
                <a href="https://www.instagram.com/routedesbieresch" class="instagram-share"><i
                            class="fa fa-instagram"></i></a>
                <a href="https://www.facebook.com/routedesbieres.ch/" class="facebook-share"><i
                            class="fa fa-facebook"></i></a>
            </div>
        </div>
    </div>
    <div class="row" style="height:50px">
        <div class="col-md-12"><p>L'abus d'alcool est dangereux pour la santé, à
                consommer avec modération</p></div>
    </div>
    <div class="row" style="height:50px">
        <div class="col-md-12"><p>Attention : Ce projet a été développé dans le cadre d’un cours de marketing digital de
                la <a
                        href="http://www.comem.ch">HEIG-VD</a> et est
                purement fictif</p></div>
    </div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>

</html>
