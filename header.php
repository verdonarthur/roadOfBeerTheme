<?php
/**
 * The header for our theme.
 *
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>

<body>
<header>
    <!-- Your site title as branding in the menu -->
    <?php if (!has_custom_logo()) { ?>
    <div class="brand-logo d-flex justify-content-center">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img
                    src="<?php print get_template_directory_uri() . "/img/RouteBieresLogo.png" ?>" alt="brand logo"></a>
    </div>
    <?php } else {
        the_custom_logo();
    } ?><!-- end custom logo -->
</header>

<!-- ******************* The Navbar Area ******************* -->
<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">
    <nav class="navbar navbar-expand-md">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- The WordPress Menu goes here -->
        <?php wp_nav_menu(
            array(
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'navbarNavDropdown',
                'menu_class' => 'navbar-nav',
                'fallback_cb' => '',
                'menu_id' => 'main-menu',
                'walker' => new WP_Bootstrap_Navwalker(),
            )
        ); ?>

    </nav><!-- .site-navigation -->

</div><!-- .wrapper-navbar end -->
