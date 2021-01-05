<?php

    // This class is used to register our plugin as a widget, allowing us to have more freedom when 
    // it comes to placing it on a page. For this current project, it is simply going to be in the Footer
    // area of the active defaul theme.

    class ReviewTable_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'review_table_widget',
            'description' => 'The plugin which displays the table of reviews.',
        );
        parent::__construct( 'review_table_widget', 'ReviewTable_Widget', $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        require_once(plugin_dir_path(__FILE__) . 'review_table_layout.php'); // main function of our widget class - display other php file!
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}