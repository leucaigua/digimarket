<?php
/**
 * Testimonial Style Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Testimonial widget.
 *
 * Elementor widget that displays Testimonials in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Testimonial extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'radiant-testimonial';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Testimonial', 'radiantthemes-addons' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-testimonial';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return array(
			'radiantthemes-addons-custom',
		);
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return array(
			'radiantthemes-testimonial',
		);
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'radiant-widgets-category' );
	}

	/**
	 * Get all Testimonial Custom Post Type Categories.
	 *
	 * @return array Testimonial categories.
	 */
	public function get_testimonial_categories() {
		$testimonial_terms = get_terms(
			array(
				'taxonomy'   => 'testimonial-category',
				'hide_empty' => false,
			)
		);

		$testimonial_category_array = array();
		$testimonial_category_array = array( 'all' => 'Show all categories' );
		if ( ! empty( $testimonial_terms ) ) {
			foreach ( $testimonial_terms as $testimonial_term ) {
				$testimonial_category_array[ $testimonial_term->slug ] = $testimonial_term->name;
			}
		}

		return $testimonial_category_array;
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			array(
				'label' => esc_html__( 'Content', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'testimonial_style',
			array(
				'label'       => esc_html__( 'Testimonial Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'one'   => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'five'  => esc_html__( 'Style Five', 'radiantthemes-addons' ),
					'six'   => esc_html__( 'Style Six', 'radiantthemes-addons' ),
					'seven' => esc_html__( 'Style Seven', 'radiantthemes-addons' ),
					'eight' => esc_html__( 'Style Eight', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);

		$this->add_control(
			'testimonial_category',
			array(
				'label'       => esc_html__( 'Select Testimonial Category', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_testimonial_categories(),
				'default'     => 'all',
			)
		);

		$this->add_control(
			'testimonial_allow_carousel',
			array(
				'label'   => esc_html__( 'Carousel', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				),
				'default' => 'true',
			)
		);

		$this->add_control(
			'allow_nav',
			array(
				'label'     => esc_html__( 'Allow Navigation?', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				),
				'default'   => 'true',
				'condition' => array(
					'testimonial_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'navigation_style',
			array(
				'label'       => esc_html__( 'Navigation Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'one'   => esc_html__( 'Style One (Arrow - Light)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (Circle)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (Arrow - Dark)', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
				'condition'   => array(
					'allow_nav'                   => 'true',
					'testimonial_allow_carousel!' => 'false',
				),
			)
		);

		$this->add_control(
			'allow_dots',
			array(
				'label'       => esc_html__( 'Allow Dots for Navigation?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				),
				'default'     => 'true',
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'navigation_dot_style',
			array(
				'label'       => esc_html__( 'Navigation Dot Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'one' => esc_html__( 'Center Dot (Dark)', 'radiantthemes-addons' ),
					'two' => esc_html__( 'Right Dot (Light)', 'radiantthemes-addons' ),
				),
				'default'     => 'two',
				'condition'   => array(
					'allow_dots'                  => 'true',
					'testimonial_allow_carousel!' => 'false',
				),
			)
		);

		$this->add_control(
			'allow_loop',
			array(
				'label'       => esc_html__( 'Allow Loop?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				),
				'default'     => 'true',
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'allow_autoplay',
			array(
				'label'       => esc_html__( 'Allow Autoplay?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				),
				'default'     => 'true',
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'autoplay_timeout',
			array(
				'label'       => esc_html__( 'Autoplay Timeout (in milliseconds)', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::NUMBER,
				'min'         => 500,
				'default'     => 6000,
				'step'        => 500,
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'order',
			array(
				'label'       => esc_html__( 'Order', 'radiantthemes-addons' ),
				'label_block' => false,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'ASC'  => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC' => esc_html__( 'Descending', 'radiantthemes-addons' ),
				),
				'default'     => 'DESC',
			)
		);

		$this->add_control(
			'order_by',
			array(
				'label'       => esc_html__( 'Order By', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'date'     => esc_html__( 'Date', 'radiantthemes-addons' ),
					'title'    => esc_html__( 'Title', 'radiantthemes-addons' ),
					'ID'       => esc_html__( 'ID', 'radiantthemes-addons' ),
					'rand'     => esc_html__( 'Random', 'radiantthemes-addons' ),
					'modified' => esc_html__( 'Last Modified', 'radiantthemes-addons' ),
				),
				'default'     => 'date',
			)
		);

		$this->add_control(
			'max_posts',
			array(
				'label'       => esc_html__( 'Count', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'min'         => -1,
				'description' => esc_html__( 'Number of posts to show ( -1 for all posts )', 'radiantthemes-addons' ),
				'default'     => 4,
			)
		);

		$this->add_control(
			'posts_in_desktop',
			array(
				'label'       => esc_html__( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Desktop', 'radiantthemes-addons' ),
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
				'default'     => 2,
			)
		);

		$this->add_control(
			'posts_in_tab',
			array(
				'label'       => esc_html__( 'Number of Posts on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Tab', 'radiantthemes-addons' ),
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
				'default'     => 2,
			)
		);

		$this->add_control(
			'posts_in_mobile',
			array(
				'label'       => esc_html__( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Mobile', 'radiantthemes-addons' ),
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
				'default'     => 1,
			)
		);

		$this->add_control(
			'testimonial_no_row_items',
			array(
				'label'       => esc_html__( 'Number of Row Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select number of items you want to see in a row', 'radiantthemes-addons' ),
				'condition'   => array(
					'testimonial_allow_carousel' => 'false',
				),
				'default'     => 2,
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_testimonial_general',
			array(
				'label' => esc_html__( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'testimonial_color',
			array(
				'label'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .testimonial.element-one .testimonial-item > .holder > .testimonial-pic > .testimonial-pic-holder > .testimonial-pic-icon,
					.testimonial[class*="element-"].owl-nav-style-two .owl-nav > .owl-prev,
					.testimonial[class*="element-"].owl-nav-style-two .owl-nav > .owl-next,
					.testimonial[class*="element-"].owl-dot-style-one .owl-dots > .owl-dot.active > span,
					.testimonial[class*="element-"].owl-dot-style-two .owl-dots > .owl-dot > span' => 'background-color: {{VALUE}}',

					'{{WRAPPER}} .testimonial.element-seven .testimonial-item > .holder > .testimonial-main > .testimonial-title .title' => 'color: {{VALUE}}',

					'{{WRAPPER}} .testimonial.element-seven .testimonial-item > .holder:hover' => 'border-top-color: {{VALUE}}',

					'{{WRAPPER}} .testimonial-style6 .author p' => 'color: {{VALUE}}',
				),
				'default'   => '#000000',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_testimonial_content',
			array(
				'label' => esc_html__( 'Content', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Content Typography', 'radiantthemes-addons' ),
				'name'     => 'content_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-data blockquote p, {{WRAPPER}} .testimonial-style6 .description',
			)
		);

		$this->add_control(
			'testimonial_content_color',
			array(
				'label'     => esc_html__( 'Content Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-data blockquote p' => 'color: {{VALUE}}',

					'{{WRAPPER}} .testimonial-style6 .description' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_testimonial_title',
			array(
				'label' => esc_html__( 'Title', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Title Typography', 'radiantthemes-addons' ),
				'name'     => 'title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-title .title, {{WRAPPER}} .testimonial-style6 .author h5',
			)
		);

		$this->add_control(
			'testimonial_title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-title .title' => 'color: {{VALUE}}',

					'{{WRAPPER}} .testimonial-style6 .author h5' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_testimonial_designation',
			array(
				'label' => esc_html__( 'Designation', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Designation Typography', 'radiantthemes-addons' ),
				'name'     => 'designation_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-title .designation, {{WRAPPER}} .testimonial-style6 .author p',
			)
		);

		$this->add_control(
			'testimonial_desig_color',
			array(
				'label'     => esc_html__( 'Designation Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-title .designation' => 'color: {{VALUE}}',

					'{{WRAPPER}} .testimonial-style6 .author p' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$navigation_style = $settings['allow_nav'] ? 'owl-nav-style-' . esc_attr( $settings['navigation_style'] ) : '';
		$dot_style        = $settings['allow_dots'] ? 'owl-dot-style-' . esc_attr( $settings['navigation_dot_style'] ) : '';

		$testimonial_id = ( 'eight' === $settings['testimonial_style'] ) ? ' id="testimonial-slider-eight"' : '';

		if ( 'false' === $settings['testimonial_allow_carousel'] ) {

			$output = '<div class="testimonial element-' . esc_attr( $settings['testimonial_style'] ) . '"  data-row-items="' . esc_attr( $settings['testimonial_no_row_items'] ) . '">';

		} elseif ( 'true' === $settings['testimonial_allow_carousel'] ) {

			$output = '<div class="testimonial owl-carousel element-' . esc_attr( $settings['testimonial_style'] ) . ' ' . $navigation_style . ' ' . $dot_style . '"' . $testimonial_id . ' data-owl-nav="' . esc_attr( $settings['allow_nav'] ) . '" data-owl-dots="' . esc_attr( $settings['allow_dots'] ) . '" data-owl-loop="' . esc_attr( $settings['allow_loop'] ) . '" data-owl-autoplay="' . esc_attr( $settings['allow_autoplay'] ) . '" data-owl-autoplay-timeout="' . esc_attr( $settings['autoplay_timeout'] ) . '" data-owl-mobile-items="' . esc_attr( $settings['posts_in_mobile'] ) . '" data-owl-tab-items="' . esc_attr( $settings['posts_in_tab'] ) . '" data-owl-desktop-items="' . esc_attr( $settings['posts_in_desktop'] ) . '"  data-slider-id="1">';

		} else {
			$output = '';
		}

		if ( 'all' === $settings['testimonial_category'] ) {
			$testimonial_category = '';
		} else {
			$testimonial_category = array(
				array(
					'taxonomy' => 'testimonial-category',
					'field'    => 'slug',
					'terms'    => esc_attr( $settings['testimonial_category'] ),
				),
			);
		}

		if ( empty( $settings['max_posts'] ) ) {
			$settings['max_posts'] = -1;
		}

		$query = new \WP_Query(
			array(
				'post_type'      => 'testimonial',
				'posts_per_page' => $settings['max_posts'],
				'order'          => $settings['order'],
				'orderby'        => $settings['order_by'],
				'tax_query'      => $testimonial_category,
			)
		);

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				if ( 'eight' !== $settings['testimonial_style'] ) {
					if ( ! has_post_thumbnail() ) {
						$output .= '<div data-thumb="<img src=\'' . plugins_url( 'radiantthemes-addons/assets/images/No-Thumbnail.jpg' ) . '\' alt=\'Thumbnail Image\'>" class="testimonial-item no-image">';
					} else {
						$output .= '<div data-thumb="<img src=\'' . esc_attr( get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ) . '\' alt=\'Thumbnail Image\'>" class="testimonial-item">';
					}
				}

				require 'template/template-testimonial-element-' . $settings['testimonial_style'] . '.php';

				if ( 'eight' !== $settings['testimonial_style'] ) {
					$output .= '</div>';
				}
			}
			wp_reset_postdata();
		} else {
			echo '<p>No items found</p>';
		}

		$output .= '</div>';

		echo $output;
		?>
		<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _content_template() {

	}
}
