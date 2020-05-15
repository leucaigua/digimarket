<?php
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
 * @since 1.1.0
 */
class Radiantthemes_Style_Flip_Box extends Widget_Base {

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
		return 'radiant-flip-box';
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
		return __( 'Flip-box', 'radiantthemes-addons' );
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
		return 'eicon-flip-box';
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
			'radiantthemes-flip-box',
		);
	}

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
				'label' => __( 'Content', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'flip_box_style',
			array(
				'label'       => esc_html__( 'Flip Box Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one' => esc_html__( 'Style One (Icon Top Right)', 'radiantthemes-addons' ),

				),
				'default'     => 'one',
			)
		);

		$this->add_control(
			'flip_box_axis',
			array(
				'label'       => esc_html__( 'Flip Box Axis', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'true'  => esc_html__( 'Vertical (Y)', 'radiantthemes-addons' ),
					'false' => esc_html__( 'Horizontal (X)', 'radiantthemes-addons' ),

				),
				'default'     => 'true',
			)
		);

		$this->add_control(
			'animation',
			array(
				'label'       => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::ANIMATION,
				'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'flip_box_first_card_image',
			array(
				'label' => __( 'Image', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::MEDIA,

			)
		);

		$this->add_control(
			'flip_box_first_card_title',
			array(
				'label'   => esc_html__( 'Title', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'First Card Title', 'radiantthemes-addons' ),

			)
		);

		$this->add_control(
			'flip_box_first_card_content',
			array(
				'label'   => esc_html__( 'Content', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.',

			)
		);

		$this->add_control(
			'flip_box_first_card_css',
			array(
				'label'    => __( 'Customizer', 'radiantthemes-addons' ),
				'type'     => Controls_Manager::CODE,
				'language' => 'css',
				'rows'     => 10,

			)
		);

		$this->add_control(
			'flip_box_second_card_title',
			array(
				'label'   => esc_html__( 'Title', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Second Card Title', 'radiantthemes-addons' ),

			)
		);

		$this->add_control(
			'flip_box_second_card_content',
			array(
				'label'   => __( 'Content', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.',

			)
		);

		$this->add_control(
			'flip_box_second_card_button',
			array(
				'label'         => __( 'Button', 'radiantthemes-addons' ),
				'type'          => Controls_Manager::URL,
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),

			)
		);

		$this->add_control(
			'flip_box_second_card_css',
			array(
				'label'    => __( 'Customizer', 'radiantthemes-addons' ),
				'type'     => Controls_Manager::CODE,
				'language' => 'css',
				'rows'     => 10,

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

		$animation_classes              = $settings['animation'];
		$flip_box_first_card_css_class  = $settings['flip_box_first_card_css'];
		$flip_box_second_card_css_class = $settings['flip_box_second_card_css'];

		$flip_box_second_card_button        = $settings['flip_box_second_card_button'];
		$flip_box_second_card_button_url    = ( ! empty( $flip_box_second_card_button['url'] ) ) ? $flip_box_second_card_button['url'] : '#';
		$flip_box_second_card_button_title  = ( ! empty( $flip_box_second_card_button['title'] ) ) ? $flip_box_second_card_button['title'] : '';
		$flip_box_second_card_button_target = ( ! empty( $flip_box_second_card_button['target'] ) ) ? $flip_box_second_card_button['target'] : '1';
		$flip_box_second_card_button_rel    = ( ! empty( $flip_box_second_card_button['rel'] ) ) ? $flip_box_second_card_button['rel'] : '';

		$output  = '<div class="rt-flip-box element-' . esc_attr( $settings['flip_box_style'] );
		$output .= ' ' . $animation_classes . '" data-flip-box-x="' . $settings['flip_box_axis'] . '">';

		require 'template/template-flip-box-style-' . esc_attr( $settings['flip_box_style'] ) . '.php';
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
