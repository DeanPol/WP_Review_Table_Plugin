<?php

    // Load Class
    require_once(plugin_dir_path(__FILE__) . 'review_table_class.php');

    // Register Widget
    function register_table_widget()
    {
        register_widget('ReviewTable_Widget');
    }

    // Hook in function
    add_action('widgets_init', 'register_table_widget');

    // Include our css.
    function reg_stylesheets()
    {
        wp_enqueue_style('review_table_CSS', plugins_url('css/style.css', __FILE__), array());
    }

    // The below functions were used to simply display the contents of our plugin quickly from the wp-admin menu,
    // and quickly became redundant after registering the plugin as a widget with better functionality

    /*
    function createPage()
    {
        add_menu_page(
            'MyTitle', // Text displayed in the title tags of the page.
            'My Custom Page', // Plugin Title text that appears on the submenu.
            'manage_options', //Capability required for this menu to be displayed to the user.
            'custom_plugin', //visible title on URL
            'myCallbackFunction' //our callback function.
        );
    }

    // Define our callback function.
    // Using this to define which script is called.
    function myCallbackFunction()
    {
        include_once('page_layout.php');
    }

    // Actions are the hooks that the WP core launches at specific points
    // during execution, or when specific events occur.

    // First, create a callback function which will run when the action it is hooked to will run.
    // Second, add your callback function to the action (hooking)
    // At a minimum, the add_action() function requires two parameters:
    // 1. the name of the action you're hooking to and
    // 2. the name of your callback function.

    add_action('admin_menu', 'createPage'); //When 'admin_menu' is called, run 'createPage'.
    add_action('admin_enqueue_scripts', 'reg_stylesheets');
    */