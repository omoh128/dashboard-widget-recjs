<?php
/**
 * Plugin Name: WordPress Dashboard Widget
 * Description: Data for this chart will be static in the database, using the REST API.
 * Version: 1.0.0
 * Author: Omomoh Agiogu
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class DashboardWidget
{
    /**
     * Plugin constructor.
     */
    public function __construct()
    {
        // Register necessary hooks and actions.
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('wp_ajax_my_plugin_get_data', array($this, 'get_data_callback'));
        add_action('wp_ajax_nopriv_my_plugin_get_data', array($this, 'get_data_callback'));
        add_action('wp_dashboard_setup', array($this, 'add_dashboard_widget'));
    }

    /**
     * Enqueue scripts and styles.
     */
    public function enqueue_scripts()
    { 
        wp_enqueue_script('wp-api');
        wp_enqueue_script('chart-js', 'https://cdn.jsdelivr.net/npm/chart.js', array(), '3.5.1');
        wp_enqueue_style( 'newwidget-style', plugin_dir_url( __FILE__ ) . 'build/index.css' );
        wp_enqueue_script( 'newwidget-script', plugin_dir_url( __FILE__ ) . 'build/index.js', array( 'wp-element' ), '1.0.0', true );
        wp_enqueue_script('dashboard-board', plugin_dir_url(__FILE__) . 'dashboard-widget/dashboard-widget.js', array('wp-api', 'react', 'react-dom'), '1.0.0', true);
        //wp_enqueue_style('your-plugin', plugin_dir_url(__FILE__) . 'your-plugin.css', array(), '1.0.0');
    }

    /**
     * AJAX callback to retrieve data.
     */
    public function get_data_callback()
    {
        // Perform necessary data retrieval logic and return the data as JSON.
        $data = array(/* your data array */);

        wp_send_json($data);
    }

    /**
     * Add dashboard widget.
     */
    public function add_dashboard_widget()
    {
        wp_add_dashboard_widget('dashboard_widget', 'Plugin Dashboard Widget', array($this, 'dashboard_widget'));
    }

    /**
     * Render dashboard widget.
     */
    public function dashboard_widget()
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/app.php';
    }
}

// Instantiate the plugin class.
$dash_widget = new DashboardWidget();
