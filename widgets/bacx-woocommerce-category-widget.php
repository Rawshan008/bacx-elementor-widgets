<?php

    class Bacx_Woocommerce_Category_Widget extends \Elementor\Widget_Base {

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
            return 'bacx_woocommerce_category_widget';
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
            return __( 'Bacx Woocommerce Category', 'bew' );
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
            return 'fa fa-shopping-basket';
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

            $categories = get_terms( 'product_cat' );

            $options = [];
            foreach ( $categories as $category ) {
                $options[$category->term_id] = $category->name;
            }

            $this->add_control(
                'categories',
                [
                    'label'       => __( 'Categories', 'elementor-pro' ),
                    'type'        => \Elementor\Controls_Manager::SELECT2,
                    'options'     => $options,
                    'default'     => [],
                    'label_block' => true,
                    'multiple'    => true,
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
            $categories = $settings['categories'];

        ?><div class="bacx-woocommerce-categories"><?php
    foreach ( $categories as $catTerm ):
                $term = get_term_by( 'id', $catTerm, 'product_cat', 'ARRAY_A' );
                $thumbnail_id = get_woocommerce_term_meta( $catTerm, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
            ?>
    <a href="<?php echo get_category_link( $catTerm ); ?>" class="bacx-wo-single-category">
        <div class="bacx-wo-single-image">
            <img src="<?php echo $image; ?>" />
        </div>
        <h3 class="bacx-wo-single-title"><span>For</span> <?php echo $term['name']; ?></h3>
    </a>
    <?php
        endforeach;
                ?></div><?php
}
}