<?php

class Bacx_Image_Text_Widget extends \Elementor\Widget_Base {

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
        return 'bacx_image_text_widget';
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
        return __( 'Bacx Image Text', 'bew' );
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
        return 'fa fa-file-image-o';
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

        $this->add_control(
            'it_title_top',
            [
                'label'       => __( 'Top Title', 'bew' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Nutrient rich whole-plant foods', 'bew' ),
                'default'     => __( 'Nutrient rich whole-plant foods', 'bew' ),
            ]
        );
        $this->add_control(
            'it_title',
            [
                'label'       => __( 'Title', 'bew' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Sustainably Sourced Ingredients', 'bew' ),
                'default'     => __( 'Sustainably Sourced Ingredients', 'bew' ),
            ]
        );
        $this->add_control(
            'it_content',
            [
                'label'       => __( 'Content', 'bew' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'all the nutrient power of Coconut', 'bew' ),
                'default'     => __( 'all the nutrient power of Coconut', 'bew' ),
            ]
        );
        $this->add_control(
            'it_image',
            [
                'label'   => __( 'Image', 'bew' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'it_button_text',
            [
                'label'       => __( 'Button Text', 'bew' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Ingredients', 'bew' ),
                'default'     => __( 'Ingredients', 'bew' ),
            ]
        );
        $this->add_control(
            'it_button_link',
            [
                'label'         => __( 'Link', 'bew' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'bew' ),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
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
                'label' => __( 'Style', 'bew' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'show_left_image',
            [
                'label'        => __( 'Show Left Image', 'bew' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Left', 'bew' ),
                'label_off'    => __( 'Right', 'bew' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'title_top_color',
            [
                'label'     => __( 'Title Top Color', 'bew' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#F29200',
                'selectors' => [
                    '{{WRAPPER}} .bacx-image-text h3'      => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bacx-image-text h3 span' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'bew' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .bacx-image-text h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label'     => __( 'Content Color', 'bew' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .bacx-image-text p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label'     => __( 'Button Color', 'bew' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .bacx-image-text-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label'     => __( 'Button Hover Color', 'bew' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .bacx-image-text-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label'     => __( 'Button Backgrund Color', 'bew' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .bacx-image-text-btn' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_hover_color',
            [
                'label'     => __( 'Backgrund Hover Color', 'bew' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .bacx-image-text-btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_border_color',
            [
                'label'     => __( 'Button Border Color', 'bew' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .bacx-image-text-btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_border_hover_color',
            [
                'label'     => __( 'Border Hover Color', 'bew' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .bacx-image-text-btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'image_width',
            [
                'label'      => __( 'Image Width', 'bew' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range'      => [
                    'px' => [
                        'min'  => 20,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => '%',
                    'size' => 30,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .bacx-image-text-bg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_text_padding',
            [
                'label'      => __( 'Padding', 'bew' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .bacx-image-text-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $it_title_top = $this->get_settings( 'it_title_top' );
        $it_title = $this->get_settings( 'it_title' );
        $it_content = $this->get_settings( 'it_content' );
        $it_image = $this->get_settings( 'it_image' );
        $it_button_text = $this->get_settings( 'it_button_text' );
        $it_button_link = $this->get_settings( 'it_button_link' );
        $show_left_image = $this->get_settings( 'show_left_image' );

        if ( 'yes' === $show_left_image ) {
            echo '<div class="bacx-image-text-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-7">
                            <div class="bacx-image-text">
                                <h3>
                                    <span></span>
                                    ' . $it_title_top . '
                                </h3>
                                <h2>' . $it_title . '</h2>
                                <p>' . $it_content . '</p>
                                <a href="' . $it_button_link['url'] . '" class="bacx-image-text-btn">' . $it_button_text . '</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bacx-image-text-bg" style="background-image: url(' . $it_image['url'] . ');"></div>
            </div>';
        } else {
            echo '<div class="bacx-image-text-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="bacx-image-text">
                                <h3>
                                    <span></span>
                                    ' . $it_title_top . '
                                </h3>
                                <h2>' . $it_title . '</h2>
                                <p>' . $it_content . '</p>
                                <a href="' . $it_button_link['url'] . '" class="bacx-image-text-btn">' . $it_button_text . '</a>
                            </div>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                </div>
                <div class="bacx-image-text-bg show-right" style="background-image: url(' . $it_image['url'] . ');"></div>
            </div>';
        }
    }

}