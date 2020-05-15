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
class Radiantthemes_Style_Alert extends Widget_Base {

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
		return 'radiant-alert';
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
		return __( 'Alert Box', 'radiantthemes-addons' );
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
		return 'eicon-alert';
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
	 * Get all team Custom Post Type Categories.
	 *
	 * @return array team categories.
	 */


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
			'alert_box_style',
			array(
				'label'       => esc_html__( 'Select Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'one' => esc_html__( 'Style One(Default Style)', 'radiantthemes-addons' ),

				),
				'default'     => 'one',
			)
		);

		$this->add_control(
			'alert_box_type',
			array(
				'label'       => esc_html__( 'Select Type', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'info'    => esc_html__( 'Info', 'radiantthemes-addons' ),
					'success' => esc_html__( 'Success', 'radiantthemes-addons' ),
					'warning' => esc_html__( 'Warning', 'radiantthemes-addons' ),
					'danger'  => esc_html__( 'Danger', 'radiantthemes-addons' ),

				),
				'default'     => 'info',
			)
		);
		$this->add_control(
			'alert_box_dismissible',
			array(
				'label'       => esc_html__( 'Is Dismissible?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'yes' => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'no'  => esc_html__( 'No', 'radiantthemes-addons' ),

				),
				'default'     => 'Yes',
			)
		);
		$this->add_control(
			'alert_box_title',
			array(
				'label'       => __( 'Type Alert Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			)
		);
		$this->add_control(
			'alert_box_text',
			array(
				'label'       => esc_html__( 'Type Alert Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Hola, I am an alert box.', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'alert_box_extra_id',
			array(
				'label'       => __( 'Element ID', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'alert_box_extra_class',
			array(
				'label'       => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
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
					'{{WRAPPER}} .radiantthemes-alert-box.element-one.alert, {{WRAPPER}} ',

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
					'{{WRAPPER}} .radiantthemes-alert-box.element-one.alert ' => 'color: {{VALUE}}',
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
	public function radiantthemes_alert_style_func( $atts, $content = null, $tag ) {
		$settings = settings_atts(
			array(
				'alert_box_style'       => 'one',
				'alert_box_type'        => 'info',
				'alert_box_dismissible' => 'yes',
				'alert_box_title'       => '',
				'alert_box_text'        => 'Hola, I am an alert box.',
				'alert_box_animation'   => '',
				'alert_box_extra_class' => '',
				'alert_box_extra_id'    => '',
			),
			$atts
		);
	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '<div class="radiantthemes-alert-box element-' . $settings['alert_box_style'] . '  ' . esc_attr( $settings['alert_box_extra_class'] ) . ' alert alert-' . $settings['alert_box_type'] . ' fade in"' . $settings['alert_box_extra_id'] . '>';
		if ( 'yes' === $settings['alert_box_dismissible'] ) {
			$output .= '<a href="#" class="close" data-dismiss="alert"><i class="fa fa-times"></i></a>';
		}
			$output .= '<div class="icon">';
		if ( 'info' === $settings['alert_box_type'] ) {
			$output .= '<i class="fa fa-info"></i>';
		} elseif ( 'success' === $settings['alert_box_type'] ) {
			$output .= '<i class="fa fa-check-circle-o"></i>';
		} elseif ( 'warning' === $settings['alert_box_type'] ) {
			$output .= '<i class="fa fa-bell-o"></i>';
		} elseif ( 'danger' === $settings['alert_box_type'] ) {
			$output .= '<i class="fa fa-exclamation-triangle"></i>';
		}
			$output .= '</div>';
			$output .= '<strong>' . esc_attr( $settings['alert_box_title'] ) . '</strong>';
			$output .= esc_attr( $settings['alert_box_text'] );
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
