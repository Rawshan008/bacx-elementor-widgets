<?php

    class Video_Section_Widget extends \Elementor\Widget_Base {

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
            return 'video_section_widget';
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
            return __( 'Video Section', 'bew' );
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
            return 'fa fa-play';
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
                'left_text',
                [
                    'label'       => __( 'Left Text', 'bew' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'placeholder' => __( 'unique solution for your business', 'bew' ),
                ]
            );

            $this->add_control(
                'right_text',
                [
                    'label'       => __( 'Left Text', 'bew' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'placeholder' => __( 'unique solution for your business', 'bew' ),
                ]
            );

            $this->add_control(
                'video_icon',
                [
                    'label'   => __( 'Icon', 'bew' ),
                    'type'    => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'fas fa-play',
                        'library' => 'solid',
                    ],
                ]
            );

            $this->add_control(
                'bg_image',
                [
                    'label'   => __( 'Background Image', 'bew' ),
                    'type'    => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $this->add_control(
                'video_link',
                [
                    'label'         => __( 'Video Link', 'bew' ),
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
                'video_section_style',
                [
                    'label' => __( 'Title Top Style', 'bew' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'video_text_typography',
                    'label'    => __( 'Typography', 'bew' ),
                    'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .bacx-video-section .video-text p',
                ]
            );

            $this->add_control(
                'video_height',
                [
                    'label'      => __( 'Height', 'bew' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 100,
                            'max'  => 500,
                            'step' => 5,
                        ],
                    ],
                    'default'    => [
                        'unit' => 'px',
                        'size' => 230,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .bacx-video-section' => 'height: {{SIZE}}{{UNIT}};',
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
            $v_rand = rand( 989879, 979966 );
        ?>
<?php if ( !empty( $settings['video_link']['url'] ) ): ?>
<script>
jQuery(document).ready(function() {
    jQuery(".video-popup-<?php echo $v_rand; ?>").fancybox({
        toolbar: false,
        smallBtn: true,
        iframe: {
            preload: false
        }
    })
});
</script>
<?php endif;?>

<div class="bacx-video-section" style="background-image: url(<?php echo $settings['bg_image']['url']; ?>);">
    <div class="video-text video-text-1">
        <p><?php echo $settings['left_text']; ?></p>
    </div>
    <div class="video-icon">
        <a href="<?php echo $settings['video_link']['url']; ?>" class="video-popup video-popup-<?php echo $v_rand; ?>">
            <i class="<?php echo $settings['video_icon']['value']; ?>"></i>
        </a>
    </div>
    <div class="video-text video-text-2">
        <p><?php echo $settings['right_text']; ?></p>
    </div>
</div>

<?php
    }

}