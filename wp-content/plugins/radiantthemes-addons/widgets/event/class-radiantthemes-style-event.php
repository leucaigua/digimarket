<?php
/**
 * Event Addon
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
 * Elementor Event widget.
 *
 * Elementor widget that displays Event posts.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Event extends Widget_Base {

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
		return 'radiant-event';
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
		return __( 'Event', 'radiantthemes-addons' );
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
		return 'fa fa-address-book';
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
			'radiantthemes-event',
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
	 * Get all event Custom Post Type Categories.
	 *
	 * @return array event categories.
	 */
	public function get_event_categories() {
		$event_terms = get_terms(
			array(
				'taxonomy'   => 'event-category',
				'hide_empty' => false,
			)
		);

		$event_category_array = array();
		$event_category_array = array( 'all' => 'Show all event' );
		if ( ! empty( $event_terms ) ) {
			foreach ( $event_terms as $event_term ) {
				$event_category_array[ $event_term->slug ] = $event_term->name;
			}
		}

		return $event_category_array;
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
				'label'       => esc_html__( 'Event Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'one' => esc_html__( 'Style One', 'radiantthemes-addons' ),

				),
				'default'     => 'one',
			)
		);

		$this->add_control(
			'event_category',
			array(
				'label'       => esc_html__( 'Select Event Category', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_event_categories(),
				'default'     => 'all',
			)
		);

		$this->add_control(
			'total_items_row',
			array(
				'label'       => esc_html__( 'Items in a Row', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::NUMBER,
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'default'     => 2,
			)
		);

		$this->add_control(
			'total_items',
			array(
				'label'       => esc_html__( 'Number of Items', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::NUMBER,
				'default'     => 6,
				'step'        => 1,

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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_event_general',
			array(
				'label' => __( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'event_color',
			array(
				'label'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .event.element-one .event-item > .holder > .data .designation,
					.event.element-one .event-four > .holder > .data .designation' => 'color: {{VALUE}}',

					'{{WRAPPER}} .event.element-three .event-item > .holder > .overlay' => 'background-color: {{VALUE}}',

				),
				'default'   => '#000000',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_event_content',
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
				'selector' => '{{WRAPPER}} .event .event-item > .holder > .event-data blockquote p',
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

		if ( 1 === $settings['total_items_row'] ) {
			$custom_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
		} elseif ( 2 === $settings['total_items_row'] ) {
			$custom_class = 'col-lg-6 col-md-6 col-sm-12 col-xs-12';
		} elseif ( 3 === $settings['total_items_row'] ) {
			$custom_class = 'col-lg-4 col-md-4 col-sm-12 col-xs-12';
		} elseif ( 4 === $settings['total_items_row'] ) {
			$custom_class = 'col-lg-3 col-md-3 col-sm-12 col-xs-12';
		} else {
			$custom_class = '';
		}

		echo '<!-- rt-event -->';
		if ( 'all' == $settings['event_category'] || '' == $settings['event_category'] ) {
				$event_category = '';
		} else {
			$event_category = array(
				array(
					'taxonomy' => 'event-category',
					'field'    => 'slug',
					'terms'    => esc_attr( $settings['event_category'] ),
				),
			);
			$hidden_filter  = 'hidden';
		}
		if ( empty( $settings['total_items'] ) ) {
			$settings['total_items'] = -1;
		}
			$query = new \WP_Query(
				array(
					'post_type'      => 'event',
					'posts_per_page' => $settings['total_items'],
					'order'          => $settings['order'],
					'tax_query'      => $event_category,
				)
			);

		$data = 0;
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				require __DIR__ . '/template/template-event-item-' . $settings['style_variation'] . '.php';
			}
			wp_reset_postdata();
		} else {
			$output .= wp_kses_post( '<p>No items found</p>', 'radiantthemes-addons' );
		}

		echo '<!-- rt-event-table -->' . "\r";

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
