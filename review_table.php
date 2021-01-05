<?php
    // Header comment - Used to specify plugin metadata name, author, 
    // version, licence, etc.
    // At a minimum, a header comment must contain the plugin name.
    // Only one file in the plugin's folder should have the header comment.
    // If the plugin has multiple PHP files, only one of these should have the 
    // header comment.

    /** 
     * Plugin Name: My Table Display Plugin
     * Description: Project - Display Table.
     * Author: D.Politis
    */
    
    // Exit if accessed directly
    if(!defined('ABSPATH')) {
        exit;
    }

    // Load up our functions
    require_once(plugin_dir_path(__FILE__) . 'review_table_functions.php');

