<?php
/**
 * Separator Style Addon
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
 * Elementor Progressbar widget.
 *
 * Elementor widget that displays a Progressbar.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Progressbar extends Widget_Base {

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
		return 'radiant-progressbar';
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
		return esc_html__( 'Progress Bar', 'radiantthemes-addons' );
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
		return 'eicon-skill-bar';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return array(
			'radiantthemes-all',
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
			'radiantthemes-progressbar',
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
			'section_progressbar',
			array(
				'label' => esc_html__( 'Progress Bar', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_progressbar_title',
			array(
				'label'       => esc_html__( 'Progressbar Title', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => 'This is progress bar element',
			)
		);

		$this->add_control(
			'radiant_progressbar_striped',
			array(
				'label'        => esc_html__( 'Progressbar Striped', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'True', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'False', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'radiant_progressbar_animated',
			array(
				'label'        => esc_html__( 'Progressbar Animation', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'True', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'False', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_progressbar',
			array(
				'label' => esc_html__( 'Progress Bar', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'radiant_progressbar_background_color',
			array(
				'label'       => esc_html__( 'Background Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-progress-bar > .progress' => 'background-color: {{VALUE}}',
				),
				'default'     => '#000000',
				'description' => esc_html__( 'Set your Progressbar Background Color.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_progressbar_color',
			array(
				'label'       => esc_html__( 'Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-progress-bar .progress > .progress-bar' => 'background-color: {{VALUE}}',
				),
				'description' => esc_html__( 'Set your Progressbar Color.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_progressbar_font_color',
			array(
				'label'       => esc_html__( 'Font Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-progress-bar > .title' => 'color: {{VALUE}}',
				),
				'description' => esc_html__( 'Set your Progressbar Font Color.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_progressbar_height',
			array(
				'label'       => esc_html__( 'Progressbar Height', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => array( 'px' ),
				'range'       => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					),
				),
				'default'     => array(
					'unit' => 'px',
					'size' => 15,
				),
				'description' => esc_html__( 'Enter measurement units.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_progress_width',
			array(
				'label'       => esc_html__( 'Progress Percentage', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => array( '%' ),
				'range'       => array(
					'%' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'     => array(
					'unit' => '%',
					'size' => 80,
				),
				'description' => esc_html__( 'Enter measurement units.', 'radiantthemes-addons' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'radiant_title_typography',
				'selector' => '{{WRAPPER}} .rt-progress-bar > .title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
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

		if ( $settings['radiant_progressbar_striped'] ) {
			$striped = 'progress-bar-striped';
		} else {
			$striped = '';
		}

		if ( $settings['radiant_progressbar_animated'] ) {
			$animated = 'active';
		} else {
			$animated = '';
		}

		$output = '';

		$output .= '<div class="rt-progress-bar element-one" data-progress-bar-width="' . esc_attr( $settings['radiant_progress_width']['size'] ) . esc_attr( $settings['radiant_progress_width']['unit'] ) . '" data-progress-bar-height="' . esc_attr( $settings['radiant_progressbar_height']['size'] ) . esc_attr( $settings['radiant_progressbar_height']['unit'] ) . '">';
		$output .= '<div class="title">' . esc_attr( $settings['radiant_progressbar_title'] );
		$output .= '<span class="progress-width"></span>';
		$output .= '</div>';
		$output .= '<div class="progress">';
		$output .= '<div class="progress-bar ' . esc_attr( $striped ) . ' ' . esc_attr( $animated ) . ' " ></div>';
		$output .= '</div>';
		$output .= '</div>';

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
