<?php

    class Section_Title_Widget extends \Elementor\Widget_Base {

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
            return 'section_title_widget';
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
            return __( 'Section Title', 'bew' );
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
            return 'fa fa-heading';
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
                'section_title_top',
                [
                    'label'       => __( 'Top Title', 'bew' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'placeholder' => __( 'our professional', 'bew' ),
                    'default'     => __( 'Section Title Top', 'bew' ),
                ]
            );
            $this->add_control(
                'section_title',
                [
                    'label'       => __( 'Title', 'bew' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'placeholder' => __( 'meet the leadership team', 'bew' ),
                    'default'     => __( 'Section Title', 'bew' ),
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
                    'label' => __( 'Title Top Style', 'bew' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'title_top_color',
                [
                    'label'     => __( 'Color', 'bew' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default'   => '#111319',
                    'selectors' => [
                        '{{WRAPPER}} .bacx-section-title h4.section-title-top' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_top_typography',
                    'label'    => __( 'Typography', 'bew' ),
                    'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .bacx-section-title  h4.section-title-top',
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'title_bottom_style',
                [
                    'label' => __( 'Title Style', 'bew' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Color', 'bew' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default'   => '#111319',
                    'selectors' => [
                        '{{WRAPPER}} .bacx-section-title h2.section-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_content',
                    'label'    => __( 'Typography', 'bew' ),
                    'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .bacx-section-title h2.section-title',
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'title_bar_style',
                [
                    'label' => __( 'Title Bar', 'bew' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'title_bar_width',
                [
                    'label'      => __( 'Width', 'bew' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 20,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'default'    => [
                        'unit' => 'px',
                        'size' => 70,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} h4.section-title-top span' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'title_bar_height',
                [
                    'label'      => __( 'Height', 'bew' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 1,
                            'max'  => 10,
                            'step' => 1,
                        ],
                    ],
                    'default'    => [
                        'unit' => 'px',
                        'size' => 1,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} h4.section-title-top span' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'title_bar_color',
                [
                    'label'     => __( 'Title Bar Color', 'bew' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'scheme'    => [
                        'type'  => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'default'   => '#111319',
                    'selectors' => [
                        '{{WRAPPER}} h4.section-title-top span' => 'background: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'title_bar_margin_top',
                [
                    'label'      => __( 'Margin Top', 'bew' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 10,
                            'step' => 1,
                        ],
                    ],
                    'default'    => [
                        'unit' => 'px',
                        'size' => 1,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} h4.section-title-top span' => 'margin-top: {{SIZE}}{{UNIT}};',
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
            $title_top = $this->get_settings( 'section_title_top' );
            $title = $this->get_settings( 'section_title' );
        ?>

<div class="bacx-section-title">
    <h4 class="section-title-top"><span class="title-bar"></span><?php echo esc_html( $title_top ); ?></h4>
    <h2 class="section-title"><?php echo $title; ?></h2>
</div>

<?php
            }

        }