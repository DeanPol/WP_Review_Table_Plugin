<?php
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
    */

    // Load Class
    require_once(plugin_dir_path(__FILE__) . 'review_table_class.php');

    // Register Widget
    function register_review_widget()
    {
        register_widget('Review_Widget');
    }

    // Hook in function
    add_action('widgets_init', 'register_review_widget');

    // Include our css.
    function reg_stylesheets()
    {
        wp_enqueue_style('MyUniqueStyleName1', plugins_url('css/style.css', __FILE__), array());
    }

    //add_action('admin_menu', 'createPage'); //When 'admin_menu' is called, run 'createPage'.

    //add_action('admin_enqueue_scripts', 'reg_stylesheets');