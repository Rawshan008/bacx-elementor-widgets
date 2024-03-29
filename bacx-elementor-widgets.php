<?php
/*
Plugin Name: Bacx Elementor Widgets
Plugin URI:#
Description: Boilerplate for creating Elementor Extensions
Version: 1.0
Author: LemonHive
Author URI: https://www.lemonhive.com/
License: GPLv2 or later
Text Domain: bew
Domain Path: /languages/
 */

final class Bacx_Elementor_Widgets {

    /**
     * Plugin Version
     *
     * @since 1.0.0
     *
     * @var string The plugin version.
     */
    const VERSION = '1.0.0';

    /**
     * Minimum Elementor Version
     *
     * @since 1.0.0
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.0.0
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Instance
     *
     * @since 1.0.0
     *
     * @access private
     * @static
     *
     * @var Elementor_Test_Extension The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     *
     * @access public
     * @static
     *
     * @return Elementor_Test_Extension An instance of the class.
     */
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    /**
     * Constructor
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function __construct() {

        add_action( 'init', [$this, 'i18n'] );
        add_action( 'plugins_loaded', [$this, 'init'] );

    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     *
     * Fired by `init` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function i18n() {

        load_plugin_textdomain( 'bew' );

    }

    /**
     * Initialize the plugin
     *
     * Load the plugin only after Elementor (and other plugins) are loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed load the files required to run the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init() {

        // Check if Elementor installed and activated
        if ( !did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [$this, 'admin_notice_missing_main_plugin'] );
            return;
        }

        // Check for required Elementor version
        if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [$this, 'admin_notice_minimum_elementor_version'] );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [$this, 'admin_notice_minimum_php_version'] );
            return;
        }

        // Add Plugin actions
        add_action( 'elementor/widgets/widgets_registered', [$this, 'init_widgets'] );
        add_action( 'elementor/frontend/after_enqueue_styles', [$this, 'widget_styles'] );
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'bew' ),
            '<strong>' . esc_html__( 'Elementor Blank Extension', 'bew' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'bew' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bew' ),
            '<strong>' . esc_html__( 'Elementor Blank Extension', 'bew' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'bew' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bew' ),
            '<strong>' . esc_html__( 'Elementor Blank Extension', 'bew' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'bew' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init_widgets() {

        // Include Widget files
        require_once __DIR__ . '/widgets/section-title-widget.php';
        require_once __DIR__ . '/widgets/hero-slider-widget.php';
        require_once __DIR__ . '/widgets/video-section-widget.php';
        require_once __DIR__ . '/widgets/bacx-product-tabs-widget.php';
        require_once __DIR__ . '/widgets/bacx-product-performance-optimize.php';
        require_once __DIR__ . '/widgets/bacx-woocommerce-category-widget.php';
        require_once __DIR__ . '/widgets/hexagonal-with-icon-widget.php';
        require_once __DIR__ . '/widgets/bacx-image-text-widget.php';

        // Register widget
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Section_Title_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Hero_Slider_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Video_Section_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Bacx_Product_Tabs_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Bacx_Product_Performance_optimize_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Bacx_Woocommerce_Category_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Hexagonal_With_Icon_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Bacx_Image_Text_Widget() );

    }

    public function widget_styles() {
        wp_enqueue_style( 'section_title_widget', plugins_url( 'assets/css/section-title-widget.css', __FILE__ ) );
        wp_enqueue_style( 'hero_slider_widget', plugins_url( 'assets/css/hero-slider-widget.css', __FILE__ ) );
        wp_enqueue_style( 'video_section_widget', plugins_url( 'assets/css/video-section-widget.css', __FILE__ ) );
        wp_enqueue_style( 'bacx_product_tabs_widget', plugins_url( 'assets/css/bacx_product_tabs_widget.css', __FILE__ ) );
        wp_enqueue_style( 'bacx_product_performance_optimize_widget', plugins_url( 'assets/css/bacx_product_performance_optimize_widget.css', __FILE__ ) );
        wp_enqueue_style( 'bacx_woocommerce_category_widget', plugins_url( 'assets/css/bacx-woocommerce-category-widget.css', __FILE__ ) );
        wp_enqueue_style( 'hexagonal_with_icon_widget', plugins_url( 'assets/css/hexagonal-with-icon-widget.css', __FILE__ ) );
        wp_enqueue_style( 'bacx_image_text_widget', plugins_url( 'assets/css/bacx-image-text-widget.css', __FILE__ ) );
    }

}

Bacx_Elementor_Widgets::instance();