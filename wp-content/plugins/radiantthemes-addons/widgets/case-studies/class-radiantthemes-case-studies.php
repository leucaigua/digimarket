<?php
/**
 * Case Studies  Addon
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
class Radiantthemes_style_Case_Studies extends Widget_Base {

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
		return 'radiant-case_studies';
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
		return esc_html__( 'Case Studies', 'radiantthemes-addons' );
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
			'case_study_style_variation',
			array(
				'label'       => esc_html__( 'Case Study Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'   => esc_html__( 'Style One (ZoomIn On Hover)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (Overlay SlideUp On Hover)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (ZoomIn - Button TranslateY On Hover)', 'radiantthemes-addons' ),

				),
				'default'     => 'one',
			)
		);
		$this->add_control(
			'case_study_display_filter',
			array(
				'label'       => esc_html__( 'Case Study Display Filter', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'yes' => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'no'  => esc_html__( 'No', 'radiantthemes-addons' ),

				),
				'default'     => 'yes',
			)
		);
		$this->add_control(
			'case_study_filter_style',
			array(
				'label'       => esc_html__( 'Case Study Filter Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'   => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'five'  => esc_html__( 'Style Five', 'radiantthemes-addons' ),
					'six'   => esc_html__( 'Style Six', 'radiantthemes-addons' ),

				),
				'default'     => 'one',
				'condition'   => array(
					'case_study_display_filter' => 'yes',
				),
			)
		);
		$this->add_control(
			'case_study_filter_alignment',
			array(
				'label'       => esc_html__( 'Case Study Filter Align', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'left'   => esc_html__( 'Left', 'radiantthemes-addons' ),
					'right'  => esc_html__( 'Right', 'radiantthemes-addons' ),
					'center' => esc_html__( 'Center', 'radiantthemes-addons' ),

				),
				'default'     => 'center',
				'condition'   => array(
					'case_study_display_filter' => 'yes',
				),
			)
		);

		$this->add_control(
			'no_of_case_studies',
			array(
				'label'       => __( 'Number of Case Studies', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter number of Case Studies to display. Leave blank to show all posts.', 'radiantthemes-addons' ),
				'condition'   => array(
					'case_study_display_filter' => 'no',
				),

			)
		);
		$this->add_control(
			'case_study_box_alignment',
			array(
				'label'       => esc_html__( 'Case Study Box Align', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'left'   => esc_html__( 'Left', 'radiantthemes-addons' ),
					'right'  => esc_html__( 'Right', 'radiantthemes-addons' ),
					'center' => esc_html__( 'Center', 'radiantthemes-addons' ),

				),
				'default'     => 'center',
			)
		);
		$this->add_control(
			'case_study_box_number',
			array(
				'label'       => esc_html__( 'Case Study Box Number', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'3' => esc_html__( '3', 'radiantthemes-addons' ),
					'4' => esc_html__( '4', 'radiantthemes-addons' ),

				),
				'default'     => '3',
			)
		);
		$this->add_control(
			'case_study_enable_zoom',
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
			'case_study_enable_title',
			array(
				'label'       => esc_html__( 'Case Study Enable Title?', 'radiantthemes-addons' ),
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
			'case_study_enable_excerpt',
			array(
				'label'       => esc_html__( 'Case Study Enable excerpt?', 'radiantthemes-addons' ),
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
			'pricing_table_highlight',
			array(
				'label'        => __( 'Enable Link Button?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'radiantthemes-addons' ),
				'label_off'    => __( 'Hide', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'description'  => esc_html__( 'Button style can be controled from Theme Option > Button.', 'radiantthemes-addons' ),
				'condition'    => array(
					'case_study_enable_zoom' => 'no',
				),
			)
		);
		$this->add_control(
			'case_study_link_button_text',
			array(
				'label'       => __( 'Link Button Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter text for link button. E.g. Details', 'radiantthemes-addons' ),
				'condition'   => array(
					'case_study_enable_link_button' => 'true',
				),
				'default'     => 'Details',

			)
		);
		$this->add_control(
			'case_study_spacing',
			array(
				'label'       => __( 'Spacing between Case Study Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter only the spacing value without unit. E.g. 30', 'radiantthemes-addons' ),
				'default'     => '0',

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
			'case_study_looping_order',
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
			'case_study_looping_sort',
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
					'{{WRAPPER}} .rt-case-study-box-item > .holder > .data > .title > a',

			)
		);
		$this->add_control(
			'case_stydy_button_color',
			array(
				'label'     => esc_html__( 'Button Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-case-study-box.element-two>.rt-case-study-box-item>.holder>.post-btn>.post-button>.ti-angle-right' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-case-study-box.element-two > .rt-case-study-box-item > .holder > .post-btn > .post-button:hover' => 'background-color: {{VALUE}}',
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

		$hidden_filter = ( 'no' === $settings['case_study_display_filter'] ) ? 'hidden' : '';

			$enable_zoom = ( 'yes' === $settings['case_study_enable_zoom'] ) ? 'has-fancybox' : '';

			$spacing_value = ( $settings['case_study_spacing'] / 2 );

		if ( '3' == $settings['case_study_box_number'] ) {
			$case_study_item_class = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
		} elseif ( '4' == $settings['case_study_box_number'] ) {
			$case_study_item_class = 'col-lg-3 col-md-3 col-sm-4 col-xs-12';
		} else {
			$case_study_item_class = '';
		}

			require 'template/template-case-study-style-' . esc_attr( $settings['case_study_style_variation'] ) . '.php';

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
