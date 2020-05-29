<?php

class Bacx_Product_Performance_optimize_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Blank widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name() {
        return 'bacx_product_performance_optimize_widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Blank widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title() {
        return __( 'Bacx Product Optimze Performance', 'bew' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Blank widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return 'fa fa-product-hunt';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Blank widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories() {
        return ['general'];
    }

    /**
     * Register Blank widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {

        $this->register_content_controls();
        // $this->register_style_controls();

    }

    function register_content_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'No Need Anything', 'bew' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render Blank widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings_for_display();
        $product_optimize_title = carbon_get_the_post_meta( 'product_optimize_performance' );
        $product_optimize_lists = carbon_get_the_post_meta( 'product_optimize_performance_list' );
        echo '<div class="product-performance-list">';
        if ( !empty( $product_optimize_title ) ) {
            echo '<h3>' . $product_optimize_title . '</h3>';
        }

        if ( !empty( $product_optimize_lists ) ) {
            $product_optimize_lists = explode( "|", $product_optimize_lists );
            echo '<ul>';
            $pol_length = count( $product_optimize_lists );
            for ( $i = 0; $i < $pol_length; $i++ ) {
                echo '<li> <i class="fas fa-check"></i> ' . $product_optimize_lists[$i] . '</li>';
            }
            echo '</ul>';
        }

        echo '</div>';
    }

}