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
class Radiantthemes_Style_Calltoaction extends Widget_Base {

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
		return 'radiant-calltoaction';
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
		return __( 'Call to Action', 'radiantthemes-addons' );
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
		return 'eicon-call-to-action';
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
			'radiantthemes-calltoaction',
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
				'label' => __( 'Content', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'calltoaction_style',
			array(
				'label'       => esc_html__( 'Call To Action Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'   => esc_html__( 'Style One ', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two ', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three ', 'radiantthemes-addons' ),

				),
				'default'     => 'one',
			)
		);
		$this->add_control(
			'calltoaction_background_color',
			array(
				'label'     => esc_html__( 'Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
				'default'   => '#0d2a5c',
			)
		);
		$this->add_control(
			'calltoaction_overlay_color',
			array(
				'label'     => esc_html__( 'Overlay Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
				'default'   => '#e37b24',
			)
		);
		$this->add_control(
			'calltoaction_title',
			array(
				'label'       => __( 'Call To Action Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'We are available 24x7 for you', 'radiantthemes-addons' ),

			)
		);

		$this->add_control(
			'calltoaction_title_align',
			array(
				'label'       => esc_html__( 'Title Align', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'left'   => esc_html__( 'Left', 'radiantthemes-addons' ),
					'center' => esc_html__( 'Center', 'radiantthemes-addons' ),
					'right'  => esc_html__( 'Right', 'radiantthemes-addons' ),

				),
				'default'     => 'left',
			)
		);
		$this->add_control(
			'calltoaction_content',
			array(
				'label' => __( 'Call To Action Content', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::TEXTAREA,

			)
		);
		$this->add_control(
			'calltoaction_subtitle',
			array(
				'label'   => __( 'Call To Action Subtitle', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => wp_kses_post( 'Call Us Now <strong>1800-816-0000</strong>' ),

			)
		);

		$this->add_control(
			'calltoaction_subtitle_align',
			array(
				'label'   => esc_html__( 'Subtitle Align', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'left'   => esc_html__( 'Left', 'radiantthemes-addons' ),
					'center' => esc_html__( 'Center', 'radiantthemes-addons' ),
					'right'  => esc_html__( 'Right', 'radiantthemes-addons' ),
				),
				'default' => 'center',

			)
		);
		$this->add_control(
			'calltoaction_button_link',
			array(
				'label'         => __( 'Button Link', 'radiantthemes-addons' ),
				'type'          => Controls_Manager::URL,
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),
				'placeholder'   => __( 'Button Link', 'radiantthemes-addons' ),

			)
		);
			$this->add_control(
				'add_animation',
				array(
					'label'        => __( 'Add Animation?', 'radiantthemes-addons' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => __( 'yes', 'radiantthemes-addons' ),
					'label_off'    => __( 'no', 'radiantthemes-addons' ),
					'return_value' => 'yes',
					'default'      => 'yes',
				)
			);

		$this->add_control(
			'rt_animation',
			array(
				'label'            => __( 'Animation Name', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => sprintf( wp_kses_post( 'Choose your animation name. Powered By:  <a href="%s" target="_blank">Animate css</a>).', 'radiantthemes-addons' ), 'https://daneden.github.io/animate.css' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'attention_seekers'  => esc_html__( 'Attention Seekers', 'radiantthemes-addons' ),
					'bouncing_entrances' => esc_html__( 'Bouncing Entrances', 'radiantthemes-addons' ),
					'bouncing_exits'     => esc_html__( 'Bouncing Exits', 'radiantthemes-addons' ),
					'fading_entrances'   => esc_html__( 'Fading Entrances', 'radiantthemes-addons' ),
					'fading_exits'       => esc_html__( 'Fading Exits', 'radiantthemes-addons' ),
					'flippers'           => esc_html__( 'Flippers', 'radiantthemes-addons' ),
					'lightspeed'         => esc_html__( 'Lightspeed', 'radiantthemes-addons' ),
					'rotating_entrances' => esc_html__( 'Rotating Entrances', 'radiantthemes-addons' ),
					'rotating_exits'     => esc_html__( 'Rotating Exits', 'radiantthemes-addons' ),
					'sliding_entrances'  => esc_html__( 'Sliding Entrances', 'radiantthemes-addons' ),
					'sliding_exits'      => esc_html__( 'Sliding Exits', 'radiantthemes-addons' ),
					'zoom_entrances'     => esc_html__( 'Zoom Entrances', 'radiantthemes-addons' ),
					'zoom_exits'         => esc_html__( 'Zoom Exits', 'radiantthemes-addons' ),
					'specials'           => esc_html__( 'Specials', 'radiantthemes-addons' ),

				),
				'default'          => 'attention_seekers',
				'condition'        => array(
					'add_animation' => 'yes',
				),

			)
		);
		$this->add_control(
			'attention_seekers',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'bounce'     => esc_html__( 'Bounce', 'radiantthemes-addons' ),
					'flash'      => esc_html__( 'Flash', 'radiantthemes-addons' ),
					'pulse'      => esc_html__( 'Pulse', 'radiantthemes-addons' ),
					'rubberBand' => esc_html__( 'rubberBand', 'radiantthemes-addons' ),
					'shake'      => esc_html__( 'shake', 'radiantthemes-addons' ),
					'swing'      => esc_html__( 'swing', 'radiantthemes-addons' ),
					'tada'       => esc_html__( 'tada', 'radiantthemes-addons' ),
					'wobble'     => esc_html__( 'wobble', 'radiantthemes-addons' ),
					'jello'      => esc_html__( 'jello', 'radiantthemes-addons' ),

				),
				'default'          => 'bounce',
				'condition'        => array(
					'rt_animation' => 'attention_seekers',
				),

			)
		);
		$this->add_control(
			'bouncing_entrances',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'bounceIn'      => esc_html__( 'BounceIn', 'radiantthemes-addons' ),
					'bounceInDown'  => esc_html__( 'BounceInDown', 'radiantthemes-addons' ),
					'bounceInLeft'  => esc_html__( 'BounceInLeft', 'radiantthemes-addons' ),
					'bounceInRight' => esc_html__( 'BounceInRight', 'radiantthemes-addons' ),
					'bounceInUp'    => esc_html__( 'BounceInUp', 'radiantthemes-addons' ),

				),
				'default'          => 'bounceIn',
				'condition'        => array(
					'rt_animation' => 'bouncing_entrances',
				),

			)
		);
		$this->add_control(
			'bouncing_exits',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'bounceOut'      => esc_html__( 'bounceOut', 'radiantthemes-addons' ),
					'bounceOutDown'  => esc_html__( 'bounceOutDown', 'radiantthemes-addons' ),
					'bounceOutLeft'  => esc_html__( 'bounceOutLeft', 'radiantthemes-addons' ),
					'bounceOutRight' => esc_html__( 'bounceOutRight', 'radiantthemes-addons' ),
					'bounceOutUp'    => esc_html__( 'bounceOutUp', 'radiantthemes-addons' ),

				),
				'default'          => 'bounceOut',
				'condition'        => array(
					'rt_animation' => 'bouncing_exits',
				),

			)
		);
		$this->add_control(
			'fading_entrances',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'fadeIn'         => esc_html__( 'fadeIn', 'radiantthemes-addons' ),
					'fadeInDown'     => esc_html__( 'fadeInDown', 'radiantthemes-addons' ),
					'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'radiantthemes-addons' ),
					'fadeInLeft'     => esc_html__( 'fadeInLeft', 'radiantthemes-addons' ),
					'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'radiantthemes-addons' ),
					'fadeInRight'    => esc_html__( 'fadeInRight', 'radiantthemes-addons' ),
					'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'radiantthemes-addons' ),

				),
				'default'          => 'bounceOut',
				'condition'        => array(
					'rt_animation' => 'bouncing_exits',
				),

			)
		);
		$this->add_control(
			'fading_exits',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'fadeOut'         => esc_html__( 'fadeOut', 'radiantthemes-addons' ),
					'fadeOutDown'     => esc_html__( 'fadeOutDown', 'radiantthemes-addons' ),
					'fadeOutDownBig'  => esc_html__( 'fadeOutDownBig', 'radiantthemes-addons' ),
					'fadeOutLeft'     => esc_html__( 'fadeOutLeft', 'radiantthemes-addons' ),
					'fadeOutLeftBig'  => esc_html__( 'fadeOutLeftBig', 'radiantthemes-addons' ),
					'fadeOutRight'    => esc_html__( 'fadeOutRight', 'radiantthemes-addons' ),
					'fadeOutRightBig' => esc_html__( 'fadeOutRightBig', 'radiantthemes-addons' ),
					'fadeOutUp'       => esc_html__( 'fadeOutUp', 'radiantthemes-addons' ),
					'fadeOutUpBig'    => esc_html__( 'fadeOutUpBig', 'radiantthemes-addons' ),

				),
				'default'          => 'fadeOut',
				'condition'        => array(
					'rt_animation' => 'fading_exits',
				),

			)
		);
		$this->add_control(
			'flippers',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'flip'     => esc_html__( 'flip', 'radiantthemes-addons' ),
					'flipInX'  => esc_html__( 'flipInX', 'radiantthemes-addons' ),
					'flipInY'  => esc_html__( 'flipInY', 'radiantthemes-addons' ),
					'flipOutX' => esc_html__( 'flipOutX', 'radiantthemes-addons' ),
					'flipOutY' => esc_html__( 'flipOutY', 'radiantthemes-addons' ),

				),
				'default'          => 'flip',
				'condition'        => array(
					'rt_animation' => 'flippers',
				),

			)
		);
		$this->add_control(
			'lightspeed',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'lightSpeedIn'  => esc_html__( 'lightSpeedIn', 'radiantthemes-addons' ),
					'lightSpeedOut' => esc_html__( 'lightSpeedOut', 'radiantthemes-addons' ),

				),
				'default'          => 'lightSpeedIn',
				'condition'        => array(
					'rt_animation' => 'lightspeed',
				),

			)
		);
		$this->add_control(
			'rotating_entrances',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'rotateIn'          => esc_html__( 'rotateIn', 'radiantthemes-addons' ),
					'rotateInDownLeft'  => esc_html__( 'rotateInDownLeft', 'radiantthemes-addons' ),
					'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'radiantthemes-addons' ),
					'rotateInUpLeft'    => esc_html__( 'rotateInUpLeft', 'radiantthemes-addons' ),
					'rotateInUpRight'   => esc_html__( 'rotateInUpRight', 'radiantthemes-addons' ),

				),
				'default'          => 'rotateIn',
				'condition'        => array(
					'rt_animation' => 'rotating_entrances',
				),

			)
		);
		$this->add_control(
			'rotating_exits',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'rotateOut'          => esc_html__( 'rotateOut', 'radiantthemes-addons' ),
					'rotateOutDownLeft'  => esc_html__( 'rotateOutDownLeft', 'radiantthemes-addons' ),
					'rotateOutDownRight' => esc_html__( 'rotateOutDownRight', 'radiantthemes-addons' ),
					'rotateOutUpLeft'    => esc_html__( 'rotateOutUpLeft', 'radiantthemes-addons' ),
					'rotateOutUpRight'   => esc_html__( 'rotateOutUpRight', 'radiantthemes-addons' ),

				),
				'default'          => 'rotateIn',
				'condition'        => array(
					'rt_animation' => 'rotating_exits',
				),

			)
		);

		$this->add_control(
			'sliding_entrances',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'slideInUp'    => esc_html__( 'slideInUp', 'radiantthemes-addons' ),
					'slideInDown'  => esc_html__( 'slideInDown', 'radiantthemes-addons' ),
					'slideInLeft'  => esc_html__( 'slideInLeft', 'radiantthemes-addons' ),
					'slideInRight' => esc_html__( 'slideInRight', 'radiantthemes-addons' ),

				),
				'default'          => 'slideInUp',
				'condition'        => array(
					'rt_animation' => 'sliding_entrances',
				),

			)
		);

		$this->add_control(
			'sliding_exits',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'slideOutUp'    => esc_html__( 'slideOutUp', 'radiantthemes-addons' ),
					'slideOutDown'  => esc_html__( 'slideOutDown', 'radiantthemes-addons' ),
					'slideOutLeft'  => esc_html__( 'slideOutLeft', 'radiantthemes-addons' ),
					'slideOutRight' => esc_html__( 'slideOutRight', 'radiantthemes-addons' ),

				),
				'default'          => 'slideOutUp',
				'condition'        => array(
					'rt_animation' => 'sliding_exits',
				),

			)
		);
		$this->add_control(
			'zoom_entrances',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'zoomIn'      => esc_html__( 'zoomIn', 'radiantthemes-addons' ),
					'zoomInDown'  => esc_html__( 'zoomInDown', 'radiantthemes-addons' ),
					'zoomInLeft'  => esc_html__( 'zoomInLeft', 'radiantthemes-addons' ),
					'zoomInRight' => esc_html__( 'zoomInRight', 'radiantthemes-addons' ),
					'zoomInUp'    => esc_html__( 'zoomInUp', 'radiantthemes-addons' ),

				),
				'default'          => 'zoomIn',
				'condition'        => array(
					'rt_animation' => 'zoom_entrances',
				),

			)
		);
		$this->add_control(
			'zoom_exits',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'zoomOut'      => esc_html__( 'zoomOut', 'radiantthemes-addons' ),
					'zoomOutDown'  => esc_html__( 'zoomOutDown', 'radiantthemes-addons' ),
					'zoomOutLeft'  => esc_html__( 'zoomOutLeft', 'radiantthemes-addons' ),
					'zoomOutRight' => esc_html__( 'zoomOutRight', 'radiantthemes-addons' ),
					'zoomOutUp'    => esc_html__( 'zoomOutUp', 'radiantthemes-addons' ),

				),
				'default'          => 'zoomOut',
				'condition'        => array(
					'rt_animation' => 'zoom_exits',
				),

			)
		);
		$this->add_control(
			'specials',
			array(
				'label'            => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'          => array(
					'hinge'        => esc_html__( 'hinge', 'radiantthemes-addons' ),
					'jackInTheBox' => esc_html__( 'jackInTheBox', 'radiantthemes-addons' ),
					'rollIn'       => esc_html__( 'rollIn', 'radiantthemes-addons' ),
					'rollOut'      => esc_html__( 'rollOut', 'radiantthemes-addons' ),

				),
				'default'          => 'zoomOut',
				'condition'        => array(
					'rt_animation' => 'specials',
				),

			)
		);

		$this->add_control(
			'duration',
			array(
				'label'            => __( 'Animation Duration', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::TEXT,
				'description'      => esc_html__( 'Put time is seconds. Eg. 2s', 'radiantthemes-addons' ),
				'default'          => '2s',
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'condition'        => array(
					'add_animation' => 'true',
				),
			)
		);
		$this->add_control(
			'delay',
			array(
				'label'            => __( 'Animation Delay', 'radiantthemes-addons' ),
				'type'             => Controls_Manager::TEXT,
				'description'      => esc_html__( 'Put time is seconds. Eg. 0s', 'radiantthemes-addons' ),
				'default'          => '0s',
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'condition'        => array(
					'add_animation' => 'true',
				),
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
				'label'       => __( 'Extra class name for the container', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),

			)
		);
		$this->add_control(
			'calltoaction_title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
				'default'   => '#ffffff',
			)
		);
		$this->add_control(
			'calltoaction_title_font_size',
			array(
				'label'   => __( 'Title Font Size (in px)', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '32',

			)
		);
		$this->add_control(
			'calltoaction_title_line_height',
			array(
				'label'   => __( 'Title Line Height (in px)', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '40',

			)
		);
		$this->add_control(
			'calltoaction_content_color',
			array(
				'label'     => esc_html__( 'Content Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
				'default'   => '#ffffff',
			)
		);
		$this->add_control(
			'calltoaction_content_font_size',
			array(
				'label'   => __( 'Content Font Size (in px)', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '32',

			)
		);
		$this->add_control(
			'calltoaction_content_line_height',
			array(
				'label'   => __( 'Content Line Height (in px)', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '40',

			)
		);
		$this->add_control(
			'calltoaction_subtitle_color',
			array(
				'label'     => esc_html__( 'Subtitle Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
				'default'   => '#ffffff',
			)
		);
		$this->add_control(
			'calltoaction_subtitle_font_size',
			array(
				'label'   => __( 'Subtitle Font Size (in px)', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '22',

			)
		);
		$this->add_control(
			'calltoaction_subtitle_line_height',
			array(
				'label'   => __( 'Subtitle Line Height (in px)', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '32',

			)
		);
		$this->add_control(
			'calltoaction_button_title_color',
			array(
				'label'     => esc_html__( 'Button Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
				'default'   => '#ffffff',
			)
		);
		$this->add_control(
			'calltoaction_button_title_hover_color',
			array(
				'label'     => esc_html__( 'Button Title Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),

			)
		);
		$this->add_control(
			'calltoaction_button_background_hover_color',
			array(
				'label'     => esc_html__( 'Button Background Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
				'default'   => '#ffffff',
			)
		);
		$this->add_control(
			'calltoaction_button_font_size',
			array(
				'label'   => __( 'Button Font Size (in px)', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '13',

			)
		);
		$this->add_control(
			'calltoaction_button_font_weight',
			array(
				'label'   => __( 'Button Font Weight', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '500',

			)
		);
		$this->add_control(
			'call_to_action_button_design',
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

		$cta_button_link = $settings['calltoaction_button_link'];

		$title_style = ' style="color:' . esc_attr( $settings['calltoaction_title_color'] ) . '; font-size:' . esc_attr( $settings['calltoaction_title_font_size'] ) . 'px; line-height:' . esc_attr( $settings['calltoaction_title_line_height'] ) . 'px;"';

		$content_style = ' style="color:' . esc_attr( $settings['calltoaction_content_color'] ) . '; font-size:' . esc_attr( $settings['calltoaction_content_font_size'] ) . 'px; line-height:' . esc_attr( $settings['calltoaction_content_line_height'] ) . 'px;"';

		$subtitle_style = ' style="color:' . esc_attr( $settings['calltoaction_subtitle_color'] ) . '; font-size:' . esc_attr( $settings['calltoaction_subtitle_font_size'] ) . 'px; line-height:' . esc_attr( $settings['calltoaction_subtitle_line_height'] ) . 'px;"';

		$button_title_color            = $settings['calltoaction_button_title_color'];
		$button_font_size              = $settings['calltoaction_button_font_size'] . 'px';
		$button_font_weight            = $settings['calltoaction_button_font_weight'];
		$button_title_hover_color      = $settings['calltoaction_button_title_hover_color'];
		$button_background_hover_color = $settings['calltoaction_button_background_hover_color'];

		$custom_css = ".rt-call-to-action-wraper.element-{$settings['calltoaction_style']} .rt-call-to-action-item .btn{ color: {$button_title_color}; font-size: {$button_font_size }; font-weight: {$button_font_weight}; }";
		wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

		$custom_css_hover = ".rt-call-to-action-wraper.element-{$settings['calltoaction_style']} .rt-call-to-action-item .btn:hover{ background-color: {$button_background_hover_color} !important; color: {$button_title_hover_color}; }";
		wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css_hover );

		$cta_id = $settings['extra_id'] ? 'id="' . esc_attr( $settings['extra_id'] ) . '"' : '';
		// Build the animation classes.
		$time         = '';
		$rt_animation = '';
		if ( $settings['add_animation'] ) {
			$time  = 'data-wow-duration="' . $settings['duration'] . '"';
			$time .= ' data-wow-delay="' . $settings['delay'] . '"';

			if ( 'attention_seekers' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['attention_seekers'] ) ? esc_attr( $settings['attention_seekers'] ) : 'bounce';

			} elseif ( 'bouncing_entrances' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['bouncing_entrances'] ) ? esc_attr( $settings['bouncing_entrances'] ) : 'bounceIn';

			} elseif ( 'bouncing_exits' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['bouncing_exits'] ) ? esc_attr( $settings['bouncing_exits'] ) : 'bounceOut';

			} elseif ( 'fading_entrances' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['fading_entrances'] ) ? esc_attr( $settings['fading_entrances'] ) : 'fadeIn';

			} elseif ( 'fading_exits' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['fading_exits'] ) ? esc_attr( $settings['fading_exits'] ) : 'fadeOut';

			} elseif ( 'flippers' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['flippers'] ) ? esc_attr( $settings['flippers'] ) : 'flip';

			} elseif ( 'lightspeed' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['lightspeed'] ) ? esc_attr( $settings['lightspeed'] ) : 'lightSpeedIn';

			} elseif ( 'rotating_entrances' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['rotating_entrances'] ) ? esc_attr( $settings['rotating_entrances'] ) : 'rotateIn';

			} elseif ( 'rotating_exits' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['rotating_exits'] ) ? esc_attr( $settings['rotating_exits'] ) : 'rotateOut';

			} elseif ( 'sliding_entrances' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['sliding_entrances'] ) ? esc_attr( $settings['sliding_entrances'] ) : 'slideInUp';

			} elseif ( 'sliding_exits' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['sliding_exits'] ) ? esc_attr( $settings['sliding_exits'] ) : 'slideOutUp';

			} elseif ( 'zoom_entrances' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['zoom_entrances'] ) ? esc_attr( $settings['zoom_entrances'] ) : 'zoomIn';

			} elseif ( 'zoom_exits' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['zoom_exits'] ) ? esc_attr( $settings['zoom_exits'] ) : 'zoomOut';

			} elseif ( 'specials' === $settings['rt_animation'] ) {
				$rt_animation = isset( $settings['specials'] ) ? esc_attr( $settings['specials'] ) : 'hinge';

			}
			$rt_animation = 'wow ' . $rt_animation;
		}

		require 'template/template-call-to-action-style-' . esc_attr( $settings['calltoaction_style'] ) . '.php';

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
