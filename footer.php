<?php
/**
 * The template for displaying the footer.
 */

$the_theme = wp_get_theme();
?>


<footer class="container-fluid">
  <div class="col-4">
    <?php wp_nav_menu(
      array(
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => '',
        'fallback_cb'     => '',
        'menu_id'         => '',
      )
    ); ?>
  </div>
  <div class="col-4"></div>
  <div class="col-4"></div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>

</html>
