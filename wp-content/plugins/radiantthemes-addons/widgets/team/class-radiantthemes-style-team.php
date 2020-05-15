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
class Radiantthemes_Style_Team extends Widget_Base {

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
		return 'radiant-team';
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
		return __( 'Team', 'radiantthemes-addons' );
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
		return 'eicon-person';
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
			'radiantthemes-team',
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
	 * Get all team Custom Post Type Categories.
	 *
	 * @return array team categories.
	 */
	public function get_team_categories() {
		$team_terms = get_terms(
			array(
				'taxonomy'   => 'profession',
				'hide_empty' => false,
			)
		);

		$team_category_array = array();
		$team_category_array = array( 'all' => 'Show all Professions' );
		if ( ! empty( $team_terms ) ) {
			foreach ( $team_terms as $team_term ) {
				$team_category_array[ $team_term->slug ] = $team_term->name;
			}
		}

		return $team_category_array;
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
			'style_variation',
			array(
				'label'       => esc_html__( 'Team Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'one'   => esc_html__( 'Style One (Box Shadow On Hover)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (On Hover Display) - Light', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (On Hover Full Overlay)', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four (Classic Circle) - Light', 'radiantthemes-addons' ),
					'five'  => esc_html__( 'Style Five', 'radiantthemes-addons' ),
					'six'   => esc_html__( 'Style Six', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);

		$this->add_control(
			'team_category',
			array(
				'label'       => esc_html__( 'Select Professions', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_team_categories(),
				'default'     => 'all',
			)
		);

		$this->add_control(
			'team_allow_carousel',
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
					'team_allow_carousel' => 'true',
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
					'allow_nav'            => 'true',
					'team_allow_carousel!' => 'false',
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
					'team_allow_carousel' => 'true',
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
					'allow_dots'           => 'true',
					'team_allow_carousel!' => 'false',
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
					'team_allow_carousel' => 'true',
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
					'team_allow_carousel' => 'true',
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
					'team_allow_carousel' => 'true',
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
					'team_allow_carousel' => 'true',
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
					'team_allow_carousel' => 'true',
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
					'team_allow_carousel' => 'true',
				),
				'default'     => 1,
			)
		);

		$this->add_control(
			'team_no_row_items',
			array(
				'label'       => esc_html__( 'Number of Row Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select number of items you want to see in a row', 'radiantthemes-addons' ),
				'condition'   => array(
					'team_allow_carousel' => 'false',
				),
				'default'     => 2,
			)
		);

		$this->add_control(
			'team_enable_link',
			array(
				'label'   => __( 'Enable Link?', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),

				),
				'default' => 'true',

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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_general',
			array(
				'label' => __( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'team_color',
			array(
				'label'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .team.element-one .team-item > .holder > .data .designation,
					.team.element-one .team-four > .holder > .data .designation' => 'color: {{VALUE}}',

					'{{WRAPPER}} .team.element-three .team-item > .holder > .overlay' => 'background-color: {{VALUE}}',

				),
				'default'   => '#000000',
			)
		);

		$this->add_control(
			'extra_class',
			array(
				'label'       => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'extra_id',
			array(
				'label'       => esc_html__( 'Element ID', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_content',
			array(
				'label' => __( 'Content', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Content Typography', 'radiantthemes-addons' ),
				'name'     => 'content_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .team .team-item > .holder > .team-data blockquote p',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_title',
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
				'selector' =>
				'{{WRAPPER}} .team .team-item > .holder > .team-title .title, {{WRAPPER}} .team .team-item-five > .rt_team_detail_bx  h3 ,
				{{WRAPPER}} .team.element-one .team-item > .holder > .data .title',
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'       => esc_html__( ' Title Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .team.element-one .team-item > .holder > .data .title' => 'color: {{VALUE}}',
				),
				'description' => esc_html__( 'Select Title Text color.', 'radiantthemes-addons' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_designation',
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
				'selector' => '{{WRAPPER}} .team .team-item > .holder > .team-title .designation , {{WRAPPER}} .team.element-one .team-item > .holder > .data .designation',
			)
		);
		$this->add_control(
			'designation_color',
			array(
				'label'       => esc_html__( ' Designation Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .team.element-one .team-item > .holder > .data .designation' => 'color: {{VALUE}}',
				),
				'description' => esc_html__( 'Select Title Text color.', 'radiantthemes-addons' ),
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
	public function radiantthemes_team_style_func( $atts, $content = null, $tag ) {
		$settings = settings_atts(
			array(
				'style_variation'      => 'one',
				'team_category'        => 'all',
				'team_allow_carousel'  => 'true',
				'select_category'      => '',
				'allow_nav'            => 'true',
				'navigation_style'     => 'one',
				'allow_loop'           => 'true',
				'allow_autoplay'       => 'true',
				'allow_dots'           => 'true',
				'navigation_dot_style' => 'two',
				'autoplay_timeout'     => '',
				'order'                => 'DESC',
				'order_by'             => 'date',
				'max_posts'            => -1,
				'posts_in_desktop'     => '3',
				'posts_in_tab'         => '2',
				'posts_in_mobile'      => '1',
				'team_no_row_items'    => '2',
				'team_enable_link'     => 'no',
				'add_animation'        => '',
				'rt_animation'         => 'attention_seekers',
				'attention_seekers'    => 'bounce',
				'bouncing_entrances'   => 'bounceIn',
				'bouncing_exits'       => 'bounceOut',
				'fading_entrances'     => 'fadeIn',
				'fading_exits'         => 'fadeOut',
				'flippers'             => 'flip',
				'lightspeed'           => 'lightSpeedIn',
				'rotating_entrances'   => 'rotateIn',
				'rotating_exits'       => 'rotateOut',
				'sliding_entrances'    => 'slideInUp',
				'sliding_exits'        => 'slideOutUp',
				'zoom_entrances'       => 'zoomIn',
				'zoom_exits'           => 'zoomOut',
				'specials'             => 'hinge',
				'duration'             => '2s',
				'delay'                => '0s',
				'extra_class'          => '',
				'extra_id'             => '',
			),
			$atts
		);
	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$navigation_style = $settings['allow_nav'] ? 'owl-nav-style-' . esc_attr( $settings['navigation_style'] ) : '';
		$dot_style        = $settings['allow_dots'] ? 'owl-dot-style-' . esc_attr( $settings['navigation_dot_style'] ) : '';

		$team_id = $settings['extra_id'] ? 'id="' . esc_attr( $settings['extra_id'] ) . '"' : '';
		$output  = "\r" . '<!-- team -->' . "\r";

						$time             = '';
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

		if ( 'false' == $settings['team_allow_carousel'] ) {
				$output .= '<div class="team element-' . $settings['style_variation'] . ' ';
				$output .= ' ' . $settings['extra_class'] . '"  ' . $team_id;
				$output .= ' data-row-items="';
				$output .= esc_attr( $settings['team_no_row_items'] ) . '"';
				$output .= '>';
		} elseif ( 'true' == $settings['team_allow_carousel'] ) {
			$output .= '<div class="team element-' . $settings['style_variation'] . ' owl-carousel ';
			$output .= ' ' . ( $settings['allow_nav'] ) ? "owl-nav-style-{$settings['navigation_style']}" : '';
			$output .= ' ' . ( $settings['allow_dots'] ) ? " owl-dot-style-{$settings['navigation_dot_style']}" : '';
			$output .= ' ' . $settings['extra_class'] . '"  ' . $team_id;
			$output .= ' data-owl-nav="';
			$output .= $settings['allow_nav'] . '" data-owl-dots="';
			$output .= $settings['allow_dots'] . '" data-owl-loop="';
			$output .= $settings['allow_loop'] . '" data-owl-autoplay="';
			$output .= $settings['allow_autoplay'] . '" data-owl-autoplay-timeout="';
			$output .= $settings['autoplay_timeout'];
			$output .= '" data-owl-mobile-items="';
			$output .= $settings['posts_in_mobile'] . '" data-owl-tab-items="';
			$output .= $settings['posts_in_tab'] . '" data-owl-desktop-items="';
			$output .= $settings['posts_in_desktop'] . '">';
		} else {
			$output .= '';
		}
		if ( 'all' == $settings['team_category'] || '' == $settings['team_category'] ) {
			$team_category = '';
		} else {
			$team_category = array(
				array(
					'taxonomy' => 'profession',
					'field'    => 'slug',
					'terms'    => esc_attr( $settings['team_category'] ),
				),
			);
			$hidden_filter = 'hidden';
		}
			$query = new \WP_Query(
				array(
					'post_type'      => 'team',
					'posts_per_page' => $settings['max_posts'],
					'order'          => $settings['order'],
					'orderby'        => $settings['order_by'],
					'tax_query'      => $team_category,
				)
			);

		if ( empty( $settings['max_posts'] ) ) {
			$settings['max_posts'] = -1;
		}

		$data = 0;
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				require 'template/template-team-item-' . $settings['style_variation'] . '.php';
			}
			wp_reset_postdata();
		} else {
			$output .= wp_kses_post( '<p>No items found</p>', 'radiantthemes-addons' );
		}

			$output .= '</div>' . "\r";
			$output .= '<!-- team -->' . "\r";
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
