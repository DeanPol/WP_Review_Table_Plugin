<?php
    // Header comment - Used to specify plugin metadata name, author, version, licence, etc.
    // At a minimum, a header comment must contain the plugin name.
    // Only one file in the plugin's folder should have the header comment.
    // If the plugin has multiple PHP files, only one of these should have the header comment.

    /** 
     * Plugin Name: Review Table Plugin
     * Plugin URI: https://github.com/DeanPol?tab=repositories
     * Description: Presents the review data fetched from our JSON response in a tabular fashion.
     * Author: Dean Politis
    */

    /* Actions are the hooks that the WP core launches at specific points
    during execution, or when specific events occur. */

    // First, create a callback function which will run when the action it is hooked to will run.
    // Second, add your callback function to the action (hooking)
    // At a minimum, the add_action() function requires two parameters:
    // 1. the name of the action you're hooking to and
    // 2. the name of your callback function.
    add_action('admin_menu', 'CreatePage'); //When 'admin_menu' is called, run 'createPage'.

    function CreatePage()
    {
        add_menu_page(
            'Review Table', // Text displayed in the title tags of the page.
            'Review Table', // Plugin Title text that appears on the submenu.
            'manage_options', //Capability required for this menu to be displayed to the user.
            'Review_Table', //visible title on URL
            'MyCallbackFunction' //our callback function.
        );
    }

    // Define our callback function.
    // Using this to define which script is called.
    function MyCallbackFunction()
    {
        include_once('page_layout.php');
    }

    // Include our css.
    add_action('admin_enqueue_scripts', 'reg_stylesheets');

    function reg_stylesheets()
    {
        wp_enqueue_style('MyCSS', plugins_url('css/style.css', __FILE__));
    }
?>