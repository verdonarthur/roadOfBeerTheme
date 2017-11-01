<?php

require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');


/**
 * Plugin to add a beer of the month content menu
 */


register_taxonomy('type_of_beer', 'beer', array('hierarchical' => true, 'label' => 'Type de bière', 'query_var' => true, 'rewrite' => true));

add_action('init', 'beer_plugin_setup_post');
add_action('admin_init', 'add_custom_meta_for_beer');
add_action('save_post', 'add_beer_fields', 10, 2);

add_filter('template_include', 'include_beer_template_function', 1);


function beer_plugin_setup_post() {
    $labels = array(
        'name' => 'Beers',
        'singular_name' => 'Beer',
        'menu_name' => 'Beers',
        'all_items' => 'All Beer',
        'view_item' => 'View Beer',
        'add_new_item' => 'Add New Beer',
        'add_new' => 'Add New',
        'edit_item' => 'Edit Beer',
        'update_item' => 'Update Beer',
        'search_items' => 'Search Beer',
        'not_found' => 'Not Found',
        'not_found_in_trash' => 'Not found in Trash',
    );

// Set other options for Custom Post Type

    $args = array(
        'labels' => $labels,
        'description' => __('Beer'),
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'revisions'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('type_of_beer'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );

    register_post_type('beer', $args);

}

function add_custom_meta_for_beer() {
    // adding the custom meta to our beers
    add_meta_box('beer_meta_box',
        'Bière',
        'display_beer_meta_box',
        'beer', 'normal', 'high'
    );
}

function display_beer_meta_box($beer) {
    // to upload a picture see the link here :https://codex.wordpress.org/Javascript_Reference/wp.media

    wp_enqueue_media();


    $isbeerofthemonth = esc_html(get_post_meta($beer->ID, 'isbeerofthemonth', true));
    $beer_brewery = esc_html(get_post_meta($beer->ID, 'beer_brewery', true));
    $beer_fabrication = esc_html(get_post_meta($beer->ID, 'beer_fabrication', true));
    $beer_location = esc_html(get_post_meta($beer->ID, 'beer_location', true));
    $beer_type = esc_html(get_post_meta($beer->ID, 'beer_type', true));

    // Get WordPress' media upload URL
    $upload_link = esc_url(get_upload_iframe_src('image', $beer->ID));

    // See if there's a media id already saved as post meta
    $beer_picture = esc_html(get_post_meta($beer->ID, 'beer_picture', true));

    // Get the image src
    $beer_picture_src = wp_get_attachment_image_src($beer_picture, 'full');

    $beer_description = esc_html(get_post_meta($beer->ID, 'beer_description', true));

    ?>
    <table id="beer_form">
        <tr>
            <td style="width: 100%">Bière du mois</td>
            <td><input type="checkbox" size="80" name="isbeerofthemonth"
                       <?php if ($isbeerofthemonth == true) { ?>checked="checked"<?php } ?>/></td>
        </tr>
        <tr>
            <td style="width: 100%">Brasserie</td>
            <td><input type="text" size="80" name="beer_brewery" value="<?php echo $beer_brewery; ?>"/></td>
        </tr>
        <tr>
            <td style="width: 100%">Fabrication</td>
            <td><input type="text" size="80" name="beer_fabrication" value="<?php echo $beer_fabrication; ?>"/></td>
        </tr>
        <tr>
            <td style="width: 100%">Lieu</td>
            <td><input type="text" size="80" name="beer_location" value="<?php echo $beer_location; ?>"/></td>
        </tr>
        <tr>
            <td style="width: 100%">Type</td>
            <td><input type="text" size="80" name="beer_type" value="<?php echo $beer_type; ?>"/></td>
        </tr>
        <tr>
            <td style="width: 100%">Image</td>
            <td>
                <!-- Your image container, which can be manipulated with js -->
                <div class="custom-img-container">
                    <?php if (is_array($beer_picture_src)) : ?>
                        <img src="<?php echo $beer_picture_src[0] ?>" alt="" style="max-width:100%;"/>
                    <?php endif; ?>
                </div>

                <!-- Your add & remove image links -->
                <p class="hide-if-no-js">
                    <a class="upload-custom-img <?php if (is_array($beer_picture_src)) {
                        echo 'hidden';
                    } ?>"
                       href="<?php echo $upload_link ?>">
                        <?php _e('Set custom image') ?>
                    </a>
                    <a class="delete-custom-img <?php if (!is_array($beer_picture_src)) {
                        echo 'hidden';
                    } ?>"
                       href="#">
                        <?php _e('Remove this image') ?>
                    </a>
                    <!-- A hidden input to set and post the chosen image id -->
                    <input class="custom-img-id" name="beer_picture" type="hidden"
                           value="<?php echo esc_attr($beer_picture); ?>"

            </td>
        </tr>
        <tr>
            <td style="width: 100%">Description</td>
            <td><textarea name="beer_description"><?php echo $beer_description; ?></textarea></td>
        </tr>
    </table>
    <script>
        jQuery(function ($) {

            // Set all variables to be used in scope
            var frame,
                metaBox = $('#beer_form'), // Your meta box id here
                addImgLink = metaBox.find('.upload-custom-img'),
                delImgLink = metaBox.find('.delete-custom-img'),
                imgContainer = metaBox.find('.custom-img-container'),
                imgIdInput = metaBox.find('.custom-img-id');

            // ADD IMAGE LINK
            addImgLink.on('click', function (event) {

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if (frame) {
                    frame.open();
                    return;
                }

                // Create a new media frame
                frame = wp.media({
                    title: 'Select or Upload Media Of Your Chosen Persuasion',
                    button: {
                        text: 'Use this media'
                    },
                    multiple: false  // Set to true to allow multiple files to be selected
                });


                // When an image is selected in the media frame...
                frame.on('select', function () {

                    // Get media attachment details from the frame state
                    var attachment = frame.state().get('selection').first().toJSON();

                    // Send the attachment URL to our custom image input field.
                    imgContainer.append('<img src="' + attachment.url + '" alt="" style="max-width:100%;"/>');

                    // Send the attachment id to our hidden input
                    imgIdInput.val(attachment.id);

                    // Hide the add image link
                    addImgLink.addClass('hidden');

                    // Unhide the remove image link
                    delImgLink.removeClass('hidden');
                });

                // Finally, open the modal on click
                frame.open();
            });


            // DELETE IMAGE LINK
            delImgLink.on('click', function (event) {

                event.preventDefault();

                // Clear out the preview image
                imgContainer.html('');

                // Un-hide the add image link
                addImgLink.removeClass('hidden');

                // Hide the delete image link
                delImgLink.addClass('hidden');

                // Delete the image id from the hidden input
                imgIdInput.val('');

            });

        });
    </script>

    <?php
}

function add_beer_fields($beer_id, $beer) {
    // Check post type for movie reviews
    if ($beer->post_type == 'beer') {
        // Store data in post meta table if present in post data

        // Required field names
        $required = array('beer_brewery', 'beer_fabrication', 'beer_location', 'beer_type', 'beer_description');

        // Loop over field names, make sure each one exists and is not empty
        foreach ($required as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($beer_id, $field, $_POST[$field]);
            }
        }

        //checkbox
        update_post_meta($beer_id, 'isbeerofthemonth', $_POST['isbeerofthemonth']);

        // storing the picture
        if (isset($_POST['beer_picture'])) {
            update_post_meta($beer_id, 'beer_picture', $_POST['beer_picture']);
        }
    }
}

function include_beer_template_function($template_path) {
    if (get_post_type() == 'beer') {
        if (is_single()) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ($theme_file = locate_template(array('single-beer.php'))) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path(__FILE__) . '/single-beer.php';
            }
        }
    }
    return $template_path;
}

function get_beerofthemonth() {
    $beerofthemonth = array();

    $args = array(
        'post_type' => 'beer',
        'meta_query' => array(
            array(
                'key' => 'isbeerofthemonth',
                'value' => 'on',
                'compare' => '=',
            )
        )
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $isbeerofthemonth = esc_html(get_post_meta(get_the_ID(), 'isbeerofthemonth', true));
            $beer_brewery = esc_html(get_post_meta(get_the_ID(), 'beer_brewery', true));
            $beer_fabrication = esc_html(get_post_meta(get_the_ID(), 'beer_fabrication', true));
            $beer_location = esc_html(get_post_meta(get_the_ID(), 'beer_location', true));
            $beer_type = esc_html(get_post_meta(get_the_ID(), 'beer_type', true));

            // Get WordPress' media upload URL
            $upload_link = esc_url(get_upload_iframe_src('image', get_the_ID()));

            // See if there's a media id already saved as post meta
            $beer_picture = esc_html(get_post_meta(get_the_ID(), 'beer_picture', true));

            $beer_description = esc_html(get_post_meta(get_the_ID(), 'beer_description', true));

            $beerofthemonth = array(get_the_title(), $isbeerofthemonth, $beer_brewery, $beer_fabrication,
                $beer_location, $beer_type, $beer_picture, $beer_description,get_permalink(get_the_ID()));
        }

        wp_reset_postdata();
    } else {
    }

    return $beerofthemonth;
}