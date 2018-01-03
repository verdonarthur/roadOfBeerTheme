<?php

/**
 * Plugin to add a beer of the month content menu
 */

add_action('init', 'asso_event_plugin_setup_post');
add_action('admin_init', 'add_custom_meta_for_asso_event');
add_action('save_post', 'add_asso_event_fields', 10, 2);

add_filter('template_include', 'include_asso_event_template_function', 1);


function asso_event_plugin_setup_post()
{
    $labels = array(
        'name' => 'Asso. events',
        'singular_name' => 'Asso. event',
        'menu_name' => 'Events',
        'all_items' => 'All event',
        'view_item' => 'View event',
        'add_new_item' => 'Add New event',
        'add_new' => 'Add New',
        'edit_item' => 'Edit event',
        'update_item' => 'Update event',
        'search_items' => 'Search event',
        'not_found' => 'Not Found',
        'not_found_in_trash' => 'Not found in Trash',
    );

// Set other options for Custom Post Type

    $args = array(
        'labels' => $labels,
        'description' => __('Event in the asso.'),
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'revisions', 'thumbnail', 'editor'),
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

    register_post_type('asso_event', $args);

}

function add_custom_meta_for_asso_event()
{
    // adding the custom meta to our beers
    add_meta_box('asso_event_meta_box',
        'Asso. event',
        'display_asso_event_meta_box',
        'asso_event', 'normal', 'high'
    );
}

function display_asso_event_meta_box($asso_event)
{
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/jquery-ui-timepicker-addon.css');
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_script('jquery-ui-datetimepicker', get_template_directory_uri() . '/js/jquery-ui-timepicker-addon.js', array(), '1.0.0', true);

    // You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
    wp_register_style('jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css');
    wp_enqueue_style('jquery-ui');

    $asso_event_date_begin = esc_html(get_post_meta($asso_event->ID, 'asso_event_date_begin', true));
    $asso_event_date_end = esc_html(get_post_meta($asso_event->ID, 'asso_event_date_end', true));
    ?>
    <table id="asso_event_form">
        <tr>
            <td style="width: 100%">Date de début</td>
            <td><input id="from" type="text" size="80" name="asso_event_date_begin"
                       value="<?php echo $asso_event_date_begin; ?>"/></td>
        </tr>
        <tr>
            <td style="width: 100%">Date de fin</td>
            <td><input id="to" type="text" size="80" name="asso_event_date_end"
                       value="<?php echo $asso_event_date_end; ?>"/>
            </td>
        </tr>

    </table>
    <script>
        jQuery(document).ready(function(){
            jQuery('#from,#to').datetimepicker({
                timeFormat: "HH:mm",
                controlType: 'select',
                oneLine: true,
                useCurrent: false
            });
            jQuery("#from").on("dp.change", function (e) {
                jQuery('#to').data("DateTimePicker").minDate(e.date);
            });
            jQuery("#to").on("dp.change", function (e) {
                jQuery('#from').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>
    <?php
}

function add_asso_event_fields($asso_event_id, $asso_event)
{
    // Check post type for movie reviews
    if ($asso_event->post_type == 'asso_event') {
        // Store data in post meta table if present in post data

        // Required field names
        $required = array('asso_event_date_begin', 'asso_event_date_end', 'beer_location', 'beer_type', 'beer_description');

        // Loop over field names, make sure each one exists and is not empty
        foreach ($required as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($asso_event_id, $field, $_POST[$field]);
            }
        }
    }
}

function include_asso_event_template_function($template_path)
{
    if (get_post_type() == 'asso_event') {
        if (is_single()) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ($theme_file = locate_template(array('single-asso-event.php'))) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path(__FILE__) . '/single-asso-event.php';
            }
        }
    }
    return $template_path;
}