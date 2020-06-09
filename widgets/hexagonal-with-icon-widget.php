<?php

class Hexagonal_With_Icon_Widget extends \Elementor\Widget_Base {

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
        return 'hexagonal_with_icon_widget';
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
        return __( 'Hexagonal With Icon', 'bew' );
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
        return 'fa fa-ils';
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
        $this->register_style_controls();

    }

    /**
     * Register Blank widget content ontrols.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    function register_content_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'bew' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'hexa_icon_title',
            [
                'label'       => __( 'Title', 'bew' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Vegan', 'bew' ),
                'default'     => __( 'Vegan', 'bew' ),
            ]
        );
        $repeater->add_control(
            'hexa_icon_img',
            [
                'label'   => __( 'Image', 'bew' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'hexa_icon_bg',
            [
                'label'   => __( 'Backgrond Image', 'bew' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hexa_icon_list',
            [
                'label'       => __( 'Hexagonal Boxes', 'bew' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'list_title' => __( 'Vegan', 'bew' ),
                    ],
                ],
                'title_field' => '{{{ hexa_icon_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Register Blank widget style ontrols.
     *
     * Adds different input fields in the style tab to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_style_controls() {

        $this->start_controls_section(
            'title_top_style',
            [
                'label' => __( 'Hexagonal Box', 'bew' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'hexa_icon_width',
            [
                'label'      => __( 'Width', 'bew' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 150,
                        'max'  => 500,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 250,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .bacx-hexagonal-single-shape' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'hexa_icon_height',
            [
                'label'      => __( 'Height', 'bew' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 150,
                        'max'  => 500,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 250,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .bacx-hexagonal-single-shape' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hexa_icon_title_color',
            [
                'label'     => __( 'Title Color', 'plugin-domain' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bacx-hexagonal-single-title h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hexa_icon_margin_right',
            [
                'label'      => __( 'Margin Right', 'bew' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .bacx-hexagonal-single-shape' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
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
        $hexa_icon_lists = $this->get_settings( 'hexa_icon_list' );

        // print_r( $hexa_icon_list );

        echo '<div class="bacx-hexagonal-shape">';
        foreach ( $hexa_icon_lists as $h_list ) {
            echo '<div class="bacx-hexagonal-single-shape" style="background-image:url(' . esc_url( $h_list['hexa_icon_bg']['url'] ) . ')">
                <div class="bacx-hexagonal-single-image">
                    <img src="' . esc_url( $h_list['hexa_icon_img']['url'] ) . '" alt="' . $h_list['hexa_icon_title'] . '">
                </div>
                <div class="bacx-hexagonal-single-title">
                    <h4>' . $h_list['hexa_icon_title'] . '</h4>
                </div>
            </div>';
        }
        echo '</div>';
    }

}