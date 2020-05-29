<?php

class Bacx_Product_Tabs_Widget extends \Elementor\Widget_Base {

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
        return 'bacx_product_tabs_widget';
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
        return __( 'Bacx Product Tabs', 'bew' );
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
        return 'fa fa-list';
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
        $bacx_tabs = carbon_get_the_post_meta( 'bacx_product_tabs' );

        $tab_id = 0;
        $tab_content_id = 0;
        if ( !empty( $bacx_tabs ) ) {
            echo '<div class="bacx-product-custom-tabs">
        <ul class="nav" role="tablist">';

            foreach ( $bacx_tabs as $bacx_tab ):
                $tab_id++;
                if ( $tab_id == 1 ) {
                    $tab_active_calss = 'active';
                } else {
                    $tab_active_calss = '';
                }
                echo '<li class="nav-item"><a class="nav-link ' . $tab_active_calss . '" href="#tab-' . $tab_id . '" role="tab" data-toggle="tab">' . $bacx_tab['product_tab_title'] . '</a></li>';

            endforeach;

            echo '</ul>
        <div class="tab-content">';

            foreach ( $bacx_tabs as $bacx_tab ):
                $tab_content_id++;
                if ( $tab_content_id == 1 ) {
                    $tab_content_active_call = 'in active show';
                } else {
                    $tab_content_active_call = '';
                }
                echo '<div role="tabpanel" class="tab-pane fade ' . $tab_content_active_call . '" id="tab-' . $tab_content_id . '"><p>' . $bacx_tab['product_tab_details'] . '</p></div>';
            endforeach;
            echo '</div></div>';
        }

    }

}