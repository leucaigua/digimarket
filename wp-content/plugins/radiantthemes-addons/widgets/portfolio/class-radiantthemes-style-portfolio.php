<?php
/**
 * Portfolio Style Addon
 *
 * @package RadiantThemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.

/**
 * Class definition.
 *
 * @since 1.1.0
 */
class Radiantthemes_Style_Portfolio extends Widget_Base {

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
		return 'radiant-portfolio';
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
		return __( 'Portfolio', 'radiantthemes-addons' );
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
		return 'eicon-folder';
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
			'radiantthemes-portfolio',
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
	 * Get all Portfolio Custom Post Type Categories.
	 *
	 * @return array Portfolio categories.
	 */
	public function get_portfolio_categories() {
		$portfolio_terms = get_terms(
			array(
				'taxonomy'   => 'portfolio-category',
				'hide_empty' => false,
			)
		);

		$portfolio_category_array = array();
		if ( ! empty( $portfolio_terms ) ) {
			foreach ( $portfolio_terms as $portfolio_term ) {
				$portfolio_category_array[ $portfolio_term->slug ] = $portfolio_term->name;
			}
		}

		return $portfolio_category_array;
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
			'radiant_portfolio_style',
			array(
				'label'       => esc_html__( 'Portfolio Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'one'      => esc_html__( 'Style One (Masonry)', 'radiantthemes-addons' ),
					'two'      => esc_html__( 'Style Two (Masonry)', 'radiantthemes-addons' ),
					'three'    => esc_html__( 'Style Three (Box)', 'radiantthemes-addons' ),
					'four'     => esc_html__( 'Style Four (Masonry)', 'radiantthemes-addons' ),
					'five'     => esc_html__( 'Style Five (Masonry)', 'radiantthemes-addons' ),
					'six'      => esc_html__( 'Style Six (Masonry) - 4 Items In a Row', 'radiantthemes-addons' ),
					'seven'    => esc_html__( 'Style Seven (Masonry) - 4 Items In a Row', 'radiantthemes-addons' ),
					'eight'    => esc_html__( 'Style Eight (Box)', 'radiantthemes-addons' ),
					'nine'     => esc_html__( 'Style Nine (Box)', 'radiantthemes-addons' ),
					'ten'      => esc_html__( 'Style Ten (Small Data Box)', 'radiantthemes-addons' ),
					'eleven'   => esc_html__( 'Style Eleven (Classic - On Hover Overlay Data)', 'radiantthemes-addons' ),
					'twelve'   => esc_html__( 'Style Twelve (Masonry)', 'radiantthemes-addons' ),
					'thirteen' => esc_html__( 'Style Thirteen (Masonry)', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);

		$this->add_control(
			'radiant_portfolio_category',
			array(
				'label'       => esc_html__( 'Select Portfolio Category', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_portfolio_categories(),
				'description' => esc_html__( 'Display posts from a specific category. ', 'radiantthemes-addons' ),
				'multiple'    => true,
			)
		);

		$this->add_control(
			'radiant_portfolio_max_posts',
			array(
				'label'       => esc_html__( 'How many items to show?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::NUMBER,
				'min'         => -1,
				'default'     => 7,
				'description' => esc_html__( 'Use -1 to dislay all posts.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_portfolio_row_posts',
			array(
				'label'       => esc_html__( 'How many items in a row?', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Set number of posts to display in a row. ', 'radiantthemes-addons' ),
				'options'     => array(
					'two'   => esc_html__( 'Two', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Three', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Four', 'radiantthemes-addons' ),
				),
				'default'     => 'three',
				'condition'   => array(
					'radiant_portfolio_style' => array(
						'five',
						'eight',
						'nine',
						'twelve',
						'thirteen',
					),
				),
			)
		);

		$this->add_control(
			'radiant_portfolio_add_link',
			array(
				'label'        => esc_html__( 'Enable portfolio link?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'radiant_portfolio_add_zoom',
			array(
				'label'        => esc_html__( 'Enable portfolio zoom?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'radiant_portfolio_looping_order',
			array(
				'label'   => esc_html__( 'Order By', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'date'       => esc_html__( 'Date', 'radiantthemes-addons' ),
					'ID'         => esc_html__( 'ID', 'radiantthemes-addons' ),
					'title'      => esc_html__( 'Title', 'radiantthemes-addons' ),
					'modified'   => esc_html__( 'Modified', 'radiantthemes-addons' ),
					'random'     => esc_html__( 'Random', 'radiantthemes-addons' ),
					'menu_order' => esc_html__( 'Menu order', 'radiantthemes-addons' ),
				),
				'default' => 'ID',
			)
		);

		$this->add_control(
			'radiant_portfolio_looping_sort',
			array(
				'label'   => esc_html__( 'Sort Order', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'ASC'  => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC' => esc_html__( 'Descending', 'radiantthemes-addons' ),
				),
				'default' => 'ASC',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_portofolio_general',
			array(
				'label' => __( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'radiant_portfolio_color',
			array(
				'label'       => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Set your Portfolio Color Scheme. (If not selected, it will take default color)', 'radiantthemes-addons' ),
				'scheme'      => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors'   => array(
					'{{WRAPPER}} .rt-portfolio-box.element-eleven .rt-portfolio-box-item > .holder > .data .btn' =>
					'background-color: {{VALUE}}',
				),
				'default'     => '#000000',
			)
		);

		$this->add_control(
			'radiant_portfolio_extra_class',
			array(
				'label'       => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_portfolio_extra_id',
			array(
				'label'       => esc_html__( 'Element ID', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_portfolio_title',
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
				'selector' => '{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item > .holder > .data .title a',
			)
		);

		$this->add_control(
			'radiant_portfolio_title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item > .holder > .data .title a' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_portfolio_category',
			array(
				'label' => esc_html__( 'Category', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Category Typography', 'radiantthemes-addons' ),
				'name'     => 'portfolio_category_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item > .holder > .data .categories span',
			)
		);

		$this->add_control(
			'radiant_portfolio_category_color',
			array(
				'label'     => esc_html__( 'Category Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item > .holder > .data .categories span' => 'color: {{VALUE}}',
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
		$tem      = 1;

		$portfolio_id = $settings['radiant_portfolio_extra_id'] ? esc_attr( $settings['radiant_portfolio_extra_id'] ) : '';

		require 'template/template-portfolio-element-' . $settings['radiant_portfolio_style'] . '.php';

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
