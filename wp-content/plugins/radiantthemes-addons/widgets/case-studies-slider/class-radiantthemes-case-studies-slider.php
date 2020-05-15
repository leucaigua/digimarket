<?php
/**
 * Case Studies Slider Addon
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
 * Elementor Blog widget.
 *
 * Elementor widget that displays posts in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_style_Case_Studies_Slider extends Widget_Base {

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
		return 'radiant-case_studies_slider';
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
		return esc_html__( 'Case Studies Slider', 'radiantthemes-addons' );
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
		return 'eicon-post-list';
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
			'radiantthemes-case-studies-slider',
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
			'style_variation',
			array(
				'label'       => esc_html__( 'Case Studies Slider Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one' => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two' => esc_html__( 'Style Two', 'radiantthemes-addons' ),

				),
				'default'     => 'one',
			)
		);
		$this->add_control(
			'case_studies_slider_color',
			array(
				'label'       => esc_html__( 'Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Set your Case Studies Slider Color Scheme. If not selected, it will take theme default color.' ),
			)
		);
		$this->add_control(
			'case_studies_category',
			array(
				'label'       => __( 'Case Studies Category', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Display posts from a specific category (enter case studies category slug name). Use "all" to dislay all posts. ', 'radiantthemes-addons' ),
				'default'     => 'all',

			)
		);

		$this->add_control(
			'case_studies_slider_allow_loop',
			array(
				'label'       => esc_html__( 'Allow Loop', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),

				),
				'default'     => 'true',
			)
		);
		$this->add_control(
			'case_studies_slider_allow_autoplay',
			array(
				'label'       => esc_html__( 'Allow Autoplay?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),

				),
				'default'     => 'true',
			)
		);
		$this->add_control(
			'case_studies_slider_autoplay_timeout',
			array(
				'label'     => __( 'Autoplay Timeout (in millisecond)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '6000',
				'condition' => array(
					'case_studies_slider_allow_autoplay' => 'true',
				),

			)
		);
		$this->add_control(
			'case_studies_slider_items_in_desktop',
			array(
				'label'       => __( 'Number of Items on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Items on Desktop (in single row)', 'radiantthemes-addons' ),
				'default'     => '5',
			)
		);
		$this->add_control(
			'case_studies_slider_items_in_tab',
			array(
				'label'       => __( 'Number of Items on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Items on Tab (in single row)', 'radiantthemes-addons' ),
				'default'     => '3',
			)
		);
		$this->add_control(
			'case_studies_slider_items_in_mobile',
			array(
				'label'       => __( 'Number of Items on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Items on Mobile (in single row)', 'radiantthemes-addons' ),
				'default'     => '1',
			)
		);
		$this->add_control(
			'case_studies_slider_enable_zoom',
			array(
				'label'       => esc_html__( 'Enable Zoom?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'yes' => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'no'  => esc_html__( 'No', 'radiantthemes-addons' ),

				),
				'default'     => 'no',
			)
		);
		$this->add_control(
			'extra_class',
			array(
				'label'       => __( 'Extra class name for the container', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),

			)
		);
		$this->add_control(
			'extra_id',
			array(
				'label'       => __( 'Element ID', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),

			)
		);
		$this->add_control(
			'case_studies_slider_looping_order',
			array(
				'label'       => esc_html__( 'Order By', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'date'       => esc_html__( 'Date', 'radiantthemes-addons' ),
					'ID'         => esc_html__( 'ID', 'radiantthemes-addons' ),
					'title'      => esc_html__( 'Title', 'radiantthemes-addons' ),
					'modified'   => esc_html__( 'Modified', 'radiantthemes-addons' ),
					'random'     => esc_html__( 'Random', 'radiantthemes-addons' ),
					'menu_order' => esc_html__( 'Menu order', 'radiantthemes-addons' ),

				),
				'default'     => 'ID',
			)
		);
		$this->add_control(
			'case_studies_slider_looping_sort',
			array(
				'label'       => esc_html__( 'Sort Order', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'ASC'  => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC' => esc_html__( 'Descending', 'radiantthemes-addons' ),

				),
				'default'     => 'DESC',
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'style_section',
			array(
				'label' => __( 'Style', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Typography', 'radiantthemes-addons' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' =>
					'{{WRAPPER}} .rt-pricing-table > .holder > .heading .title, {{WRAPPER}} .subtitle',

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

		$random_class   = 'rt' . rand();
			$custom_css = '';

			$custom_css .= $settings['case_studies_slider_color'] ? '.radiantthemes-case-studies-slider.element-' . $settings['style_variation'] . '.' . $random_class . ' .radiantthemes-case-studies-slider-item > .holder > .action-button > .btn{
                background-color: ' . $settings['case_studies_slider_color'] . ';
            }' : '';
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

			$enable_zoom = ( 'yes' === $settings['case_studies_slider_enable_zoom'] ) ? ' has-fancybox' : '';
		if ( 'all' == $settings['case_studies_category'] || '' == $settings['case_studies_category'] ) {
			$case_studies_category = '';
		} else {
			$case_studies_category = array(
				array(
					'taxonomy' => 'case-study-category',
					'field'    => 'slug',
					'terms'    => esc_attr( $settings['case_studies_category'] ),
				),
			);
		}
		$output = '<div class="radiantthemes-case-studies-slider element-' . $settings['style_variation'] . ' owl-carousel ' . esc_attr( $random_class ) . esc_attr( $enable_zoom ) . '" data-case-studies-loop="' . esc_attr( $settings['case_studies_slider_allow_loop'] ) . '" data-case-studies-autoplay="' . esc_attr( $settings['case_studies_slider_allow_autoplay'] ) . '" data-case-studies-autoplaytimeout="' . esc_attr( $settings['case_studies_slider_autoplay_timeout'] ) . '" data-case-studies-desktopitem="' . esc_attr( $settings['case_studies_slider_items_in_desktop'] ) . '" data-case-studies-tabitem="' . esc_attr( $settings['case_studies_slider_items_in_tab'] ) . '" data-case-studies-mobileitem="' . esc_attr( $settings['case_studies_slider_items_in_mobile'] ) . '">';

		$args  = array(
			'post_type'      => 'case-studies',
			'posts_per_page' => -1,
			'orderby'        => esc_attr( $settings['case_studies_slider_looping_order'] ),
			'order'          => esc_attr( $settings['case_studies_slider_looping_sort'] ),
			'tax_query'      => $case_studies_category,
		);
		$query = null;
		$query = new \WP_Query( $args );

			$data = 0;
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				require 'template/template-case-studies-slider-style-' . $settings['style_variation'] . '.php';
			}
			wp_reset_postdata();
		} else {
			$output .= '<p>No items found</p>';
		}

			$output .= '</div>' . "\r";

			echo $output;
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
