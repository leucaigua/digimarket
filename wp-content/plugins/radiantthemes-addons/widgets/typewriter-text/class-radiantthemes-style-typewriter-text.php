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
class Radiantthemes_Style_Typewriter_Text extends Widget_Base {

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
		return 'radiant-typewriter_text';
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
		return esc_html__( 'Typewriter Text', 'radiantthemes-addons' );
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
		return 'eicon-type-tool';
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
			'radiantthemes-typewriter',
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
			'general_section',
			array(
				'label' => __( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'typewriter_text_style_title',
			array(
				'label'       => __( 'Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( "Write Text (ex. 'I am a dummy text' )", 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'list_typewriter_text_style_title',
			array(
				'label'       => __( 'Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'typewriter_text_style_title' => __( 'Write Text ex. I am a dummy text ', 'radiantthemes-addons' ),

					),
					array(
						'typewriter_text_style_title' => __( 'Write Text ex. I am a dummy text2 ', 'radiantthemes-addons' ),

					),
				),
				'title_field' => '{{{ typewriter_text_style_title }}}',
			)
		);

		$this->add_control(
			'typewriter_text_style_align',
			array(
				'label'       => __( 'Alignment', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'inline' => __( 'Inline', 'radiantthemes-addons' ),
					'left'   => __( 'Left', 'radiantthemes-addons' ),
					'right'  => __( 'Right', 'radiantthemes-addons' ),
					'center' => __( 'Center', 'radiantthemes-addons' ),
				),
				'label_block' => true,
			)
		);
		$this->add_control(
			'typewriter_text_style_tag',
			array(
				'label'       => __( 'Tag', 'radiantthemes-addons' ),
				'description' => esc_html__( 'Select tag for Typewriter Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'h1'  => __( 'h1', 'radiantthemes-addons' ),
					'h2'  => __( 'h2', 'radiantthemes-addons' ),
					'h3'  => __( 'h3', 'radiantthemes-addons' ),
					'h4'  => __( 'h4', 'radiantthemes-addons' ),
					'h5'  => __( 'h5', 'radiantthemes-addons' ),
					'h6'  => __( 'h6', 'radiantthemes-addons' ),
					'p'   => __( 'p', 'radiantthemes-addons' ),
					'div' => __( 'div', 'radiantthemes-addons' ),
				),
				'default'     => 'div',
				'label_block' => true,
			)
		);

		$this->add_control(
			'typewriter_text_style_animation',
			array(
				'label'       => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::ANIMATION,
				'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'typewriter_text_style_extra_class',
			array(
				'label'       => __( 'Extra class name for the container', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'typewriter_text_style_extra_id',
			array(
				'label'       => __( 'Element ID', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to w3c specification)', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'typewriter_text_style_line_typespeed',
			array(
				'label'       => __( 'Type Speed', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter Type Speed (ex. 100)', 'radiantthemes-addons' ),
				'label_block' => true,
				'default'     => '100',
			)
		);
		$this->add_control(
			'typewriter_text_style_line_startdelay',
			array(
				'label'       => __( 'Start Delay', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter Start Delay (ex. 0)', 'radiantthemes-addons' ),
				'label_block' => true,
				'default'     => '0',
			)
		);
		$this->add_control(
			'typewriter_text_style_line_backspeed',
			array(
				'label'       => __( 'Back Speed', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter Back Speed (ex. 100)', 'radiantthemes-addons' ),
				'label_block' => true,
				'default'     => '100',
			)
		);
		$this->add_control(
			'typewriter_text_style_line_backdelay',
			array(
				'label'       => __( 'Back Delay', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter Back Delay (ex. 0)', 'radiantthemes-addons' ),
				'label_block' => true,
				'default'     => '0',
			)
		);
		$this->add_control(
			'typewriter_text_style_line_shuffle',
			array(
				'label'       => __( 'Shuffle', 'radiantthemes-addons' ),
				'description' => esc_html__( 'Select Shuffle', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'true'  => __( 'True', 'radiantthemes-addons' ),
					'false' => __( 'False', 'radiantthemes-addons' ),
				),
				'default'     => 'false',
				'label_block' => true,
			)
		);
		$this->add_control(
			'typewriter_text_style_line_loop',
			array(
				'label'       => __( 'Loop', 'radiantthemes-addons' ),
				'description' => esc_html__( 'Select Loop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'true'  => __( 'True', 'radiantthemes-addons' ),
					'false' => __( 'False', 'radiantthemes-addons' ),
				),
				'default'     => 'true',
				'label_block' => true,
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_typewriter_title',
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
				'selector' => '{{WRAPPER}} .radiantthemes-typewriter-text.element-one > .typed-writer',
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .radiantthemes-typewriter-text.element-one > .typed-writer' => 'color: {{VALUE}}',

				),
			)
		);

		$this->end_controls_section();

	}
	public function radiantthemes_typewriter_text_style_func( $atts, $content = null, $tag ) {
		$settings = settings_atts(
			array(
				'typewriter_text_style_title_group'     => '',
				'typewriter_text_style_align'           => '',
				'typewriter_text_style_tag'             => 'div',
				'typewriter_text_style_animation'       => '',
				'typewriter_text_style_extra_class'     => '',
				'typewriter_text_style_extra_id'        => '',
				'typewriter_text_style_line_typespeed'  => '100',
				'typewriter_text_style_line_startdelay' => '0',
				'typewriter_text_style_line_backspeed'  => '100',
				'typewriter_text_style_line_backdelay'  => '0',
				'typewriter_text_style_line_shuffle'    => 'false',
				'typewriter_text_style_line_loop'       => 'true',
				'typewriter_text_style_css'             => '',
			),
			$atts
		);
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
		// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'css/radiantthemes-addons-custom.css', __FILE__ ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

		// ADD TAG.
			$typewriter_text_tag = $settings['typewriter_text_style_tag'];

			// ADD ANIMATION.
			$animation_classes = $settings['typewriter_text_style_animation'];

			// ADD RANDOM CLASS.
			$typewriter_text_random_class = 'rt' . wp_rand();

			// ADD EXTRA ID.
			$typewriter_text_extra_id = $settings['typewriter_text_style_extra_id'] ? 'id="' . esc_attr( $settings['typewriter_text_style_extra_id'] ) . '"' : '';

			// ADD CUSTOM CSS.
			$typewriter_text_custom_css = ".radiantthemes-typewriter-text.element-one.{$typewriter_text_random_class}{
			    text-align: {$settings['typewriter_text_style_align']} ;
            }";

			wp_add_inline_style( 'radiantthemes-addons-custom', $typewriter_text_custom_css );

			// START OF TYPEWRITE TEXT.
			$output  = "\r" . '<!-- radiantthemes-typewriter-text -->' . "\r";
			$output .= '<div class="radiantthemes-typewriter-text element-one ' . $typewriter_text_random_class . ' ' . $animation_classes . '  ' . esc_attr( $settings['typewriter_text_style_extra_class'] ) . '" ' . $typewriter_text_extra_id . ' data-typewriter-typespeed="' . esc_attr( $settings['typewriter_text_style_line_typespeed'] ) . '" data-typewriter-startdelay="' . esc_attr( $settings['typewriter_text_style_line_startdelay'] ) . '" data-typewriter-backspeed="' . esc_attr( $settings['typewriter_text_style_line_backspeed'] ) . '" data-typewriter-backdelay="' . esc_attr( $settings['typewriter_text_style_line_backdelay'] ) . '" data-typewriter-shuffle="' . esc_attr( $settings['typewriter_text_style_line_shuffle'] ) . '" data-typewriter-loop="' . esc_attr( $settings['typewriter_text_style_line_loop'] ) . '">';
			$output .= '<div class="typed-strings">';

			$titles = $settings['list_typewriter_text_style_title'];
		foreach ( $titles as $title ) {
			$output .= '<p>' . $title['typewriter_text_style_title'] . '</p>';
		}

			$output .= '</div>';
			$output .= '<' . $typewriter_text_tag . ' class="typed-writer"></' . $typewriter_text_tag . '>';
			$output .= '</div>' . "\r";
			$output .= '<!-- radiantthemes-typewriter-text -->' . "\r";
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
