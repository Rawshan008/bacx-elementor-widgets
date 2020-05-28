<?php

    class Hero_Slider_Widget extends \Elementor\Widget_Base {

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
            return 'hero_slider_widget';
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
            return __( 'Hero Slider', 'bew' );
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
            return 'fa fa-sliders';
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
                'hero_slider_title',
                [
                    'label'       => __( 'Slider Title', 'bew' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'placeholder' => __( 'Ditch the artificial and achieve your goals.', 'bew' ),
                ]
            );

            $repeater->add_control(
                'hero_slider_title_top',
                [
                    'label'       => __( 'Slider Title Top', 'bew' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'placeholder' => __( 'Ditch the artificial and achieve your goals.', 'bew' ),
                ]
            );

            $repeater->add_control(
                'hero_slider_content',
                [
                    'label'       => __( 'Slider Content', 'bew' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'placeholder' => __( 'lorem ipsome', 'bew' ),
                ]
            );

            $repeater->add_control(
                'hero_slider_btn_text',
                [
                    'label'       => __( 'Button Text', 'bew' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => __( 'About Us', 'bew' ),
                ]
            );

            $repeater->add_control(
                'hero_slider_btn_link',
                [
                    'label'       => __( 'Button Text', 'bew' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'bew' ),
                    'default'     => [
                        'url'         => '',
                        'is_external' => true,
                        'nofollow'    => true,
                    ],
                ]
            );

            $repeater->add_control(
                'hero_slider_bg_image',
                [
                    'label'   => __( 'Button BG Image', 'bew' ),
                    'type'    => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'hero_sliders',
                [
                    'label'       => __( 'Sliders', 'bew' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'default'     => [
                        [
                            'hero_slider_title' => __( 'Title #1', 'bew' ),
                        ],
                    ],
                    'title_field' => '{{{ hero_slider_title }}}',
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
                'hero_slider_style',
                [
                    'label' => __( 'Options', 'bew' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'show_next_previous',
                [
                    'label'        => __( 'Show Next Previous Button', 'bew' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'bew' ),
                    'label_off'    => __( 'Hide', 'bew' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

            $this->add_control(
                'show_dots',
                [
                    'label'        => __( 'Show Dots', 'bew' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'bew' ),
                    'label_off'    => __( 'Hide', 'bew' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

            $this->add_control(
                'autoplay',
                [
                    'label'        => __( 'Autoplay?', 'bew' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => __( 'True', 'bew' ),
                    'label_off'    => __( 'False', 'bew' ),
                    'return_value' => 'ture',
                    'default'      => 'true',
                ]
            );

            $this->add_control(
                'slider_height',
                [
                    'label'      => __( 'Slider Height', 'plugin-domain' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 1000,
                            'step' => 5,
                        ],
                    ],
                    'default'    => [
                        'unit' => 'px',
                        'size' => 700,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .bacx-hero-single-slider' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'slider_padding',
                [
                    'label'      => __( 'Padding in px', 'bew' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px'],
                    'selectors'  => [
                        '{{WRAPPER}} .bacx-hero-single-slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            $rand = rand( 899808, 3797089 );
            $sliders = $settings['hero_sliders'];

            if ( 'true' == $settings['autoplay'] ) {
                $autoplay = 'true';
            } else {
                $autoplay = 'false';
            }

            if ( 'yes' == $settings['show_dots'] ) {
                $show_dots = 'true';
            } else {
                $show_dots = 'false';
            }

            if ( 'yes' == $settings['show_next_previous'] ) {
                $show_next_previous = 'true';
            } else {
                $show_next_previous = 'false';
            }

        ?>
<?php if ( count( $sliders ) > 1 ): ?>
<script>
jQuery(document).ready(function() {
    jQuery("#bacx-hero-sliders-<?php echo $rand; ?>").slick({
        infinite: true,
        dot: false,
        autoplay: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: jQuery('.next-prev-btn .prev'),
        nextArrow: jQuery('.next-prev-btn .next')
    });
});
</script>
<?php endif;?>
<?php if ( $sliders ): ?>
<div class="bacx-hero-slider">
    <div id="bacx-hero-sliders-<?php echo $rand; ?>">
        <?php
            foreach ( $sliders as $slide ):

                ?>
        <div class="bacx-hero-single-slider"
            style="background-image: url(<?php echo $slide['hero_slider_bg_image']['url']; ?>)">
            <div class="bacx-slider-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <h4>
                            <?php echo $slide['hero_slider_title_top']; ?>
                        </h4>
                        <h2><?php echo $slide['hero_slider_title']; ?></h2>

                        <?php if ( !empty( $slide['hero_slider_content'] ) ): ?>
                        <p><?php echo $slide['hero_slider_content']; ?></p>
                        <?php endif;?>

                        <?php if ( !empty( $slide['hero_slider_btn_text'] ) ): ?>
                        <a href="<?php echo $slide['hero_slider_btn_link']['url']; ?>"
                            class="bacx-boxed-btn"><?php echo $slide['hero_slider_btn_text']; ?></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>

    </div>
    <?php if ( count( $sliders ) > 1 ): ?>
    <?php if ( 'yes' == $settings['show_next_previous'] ): ?>
    <div class="bacx-hero-slider-next-prev-btn">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="next-prev-btn">
                        <button class="prev">prev</button>
                        <button class="next">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php endif;?>
</div>
<?php endif;?>

<?php
    }

}