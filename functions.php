<?php

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/css/theme.min.css');

wp_enqueue_script( 'jquery-prod',get_stylesheet_directory_uri() . '/js/jquery.min.js', array(), '1.0.0', true);
wp_enqueue_script( 'popper',get_stylesheet_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true);
wp_enqueue_script( 'bootstrap',get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true);
