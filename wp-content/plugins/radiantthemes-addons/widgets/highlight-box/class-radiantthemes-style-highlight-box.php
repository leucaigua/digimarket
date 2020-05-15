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
class Radiantthemes_Style_Highlight_Box extends Widget_Base {

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
		return 'radiant-highlight-box';
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
		return __( 'Highlight Box', 'radiantthemes-addons' );
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
		return 'eicon-clone';
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
	public function get_script_depends() {
		return array(
			'radiantthemes-addons-core',
		);
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */



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
				'label' => __( 'Content', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'highlight_box_style',
			array(
				'label'       => esc_html__( 'Highlight Box Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'   => esc_html__( 'Style One ', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two ', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three ', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four ', 'radiantthemes-addons' ),

				),
				'default'     => 'one',
			)
		);
		$this->add_control(
			'highlight_box_image',
			array(
				'label' => esc_html__( 'Image', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::MEDIA,

			)
		);

		$this->add_control(
			'highlight_box_title',
			array(
				'label'       => __( 'Highlight Box Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'I am a Title', 'radiantthemes-addons' ),
				'admin_label' => true,

			)
		);
		$this->add_control(
			'highlight_box_content',
			array(
				'label'       => __( 'Highlight Box Content', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
				'admin_label' => true,

			)
		);
		$this->add_control(
			'highlight_box_button',
			array(
				'label'         => __( 'Highlight Box Link', 'radiantthemes-addons' ),
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
			'animation',
			array(
				'label'       => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::ANIMATION,
				'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
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
				'admin_label' => true,

			)
		);

		$this->add_control(
			'css',
			array(
				'label'    => __( 'CSS', 'radiantthemes-addons' ),
				'type'     => Controls_Manager::CODE,
				'language' => 'css',
				'rows'     => 20,

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

		$animation_classes = $settings['animation'];
		$css_class         = $settings['css'];

		$highlight_box_button = $settings['highlight_box_button'];
		$highlight_box_url    = ( ! empty( $highlight_box_button['url'] ) ) ? $highlight_box_button['url'] : '#';
		$highlight_box_title  = ( ! empty( $highlight_box_button['title'] ) ) ? $highlight_box_button['title'] : '';
		$highlight_box_target = ( ! empty( $highlight_box_button['target'] ) ) ? $highlight_box_button['target'] : '';
		$highlight_box_rel    = ( ! empty( $highlight_box_button['rel'] ) ) ? $highlight_box_button['rel'] : '';

		$highlight_box_id = $settings['extra_id'] ? 'id="' . esc_attr( $settings['extra_id'] ) . '"' : '';
		$output           = '<div class="rt-highlight-box element-' . esc_attr( $settings['highlight_box_style'] );
		$output          .= ' ' . $animation_classes . ' ' . $settings['extra_class'] . ' ' . esc_attr( $css_class ) . '" ' . $highlight_box_id . '>';
		require 'template/template-highlight-box-style-' . esc_attr( $settings['highlight_box_style'] ) . '.php';
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
