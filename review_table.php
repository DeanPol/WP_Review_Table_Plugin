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
    

        // Exit if accessed directly
        if(!defined('ABSPATH')) {
            exit;
        }
    
        // Load up our functions
        require_once(plugin_dir_path(__FILE__) . 'review_table_functions.php');