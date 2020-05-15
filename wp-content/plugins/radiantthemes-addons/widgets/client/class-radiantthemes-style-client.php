<?php
namespace RadiantthemesAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * @since 1.1.0
 */
class Radiantthemes_Style_Client extends Widget_Base {

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
		return 'radiant-client';
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
		return __( 'Client', 'radiantthemes-addons' );
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
		return 'eicon-flow';
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
			'radiantthemes-client',
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
	public function get_clients_categories() {
		$client_terms = get_terms(
			array(
				'taxonomy'   => 'client-category',
				'hide_empty' => false,
			)
		);

		$client_category_array = array();
		$client_category_array = array( 'all' => 'Show all clients' );
		if ( ! empty( $client_terms ) ) {
			foreach ( $client_terms as $client_term ) {
				$client_category_array[ $client_term->slug ] = $client_term->name;
			}
		}

		return $client_category_array;
	}
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'clients_style',
			array(
				'label'       => esc_html__( 'Clients Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'   => esc_html__( 'Style One (Simple)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (Boxed Colored)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (Boxed Alternative Colored)', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four (Boxed Bordered)', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);

		$this->add_control(
			'client_category',
			array(
				'label'       => esc_html__( 'Select Clients Categories', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_clients_categories(),
				'default'     => 'all',
			)
		);

		$this->add_control(
			'clients_allow_carousel',
			array(
				'label'       => esc_html__( 'Carousel', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),

				),
				'default'     => 'false',
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
					'clients_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'navigation_style',
			array(
				'label'       => esc_html__( 'Navigation Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one' => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two' => esc_html__( 'Style Two', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
				'condition'   => array(
					'allow_nav' => 'true',
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
					'clients_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'navigation_dot_style',
			array(
				'label'       => esc_html__( 'Navigation Dot Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one' => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two' => esc_html__( 'Style Two', 'radiantthemes-addons' ),
				),
				'default'     => 'two',
				'condition'   => array(
					'allow_dots' => 'true',
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
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
				),
				'default'     => 'two',
				'condition'   => array(
					'clients_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'allow_autoplay',
			array(
				'label'     => __( 'Allow Autoplay?', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
				),
				'default'   => 'true',
				'condition' => array(
					'clients_allow_carousel' => 'true',
				),
			)
		);
		$this->add_control(
			'autoplay_timeout',
			array(
				'label'     => __( 'Autoplay Timeout (in millisecond)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::TEXT,

				'default'   => '6000',
				'condition' => array(
					'allow_autoplay' => 'true',
				),
			)
		);
		$this->add_control(
			'order',
			array(
				'label'   => __( 'Order', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'ASC'  => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC' => esc_html__( 'Descending', 'radiantthemes-addons' ),
				),
				'default' => 'DESC',

			)
		);
		$this->add_control(
			'order_by',
			array(
				'label'   => __( 'Order By', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'date'     => esc_html__( 'Date', 'radiantthemes-addons' ),
					'title'    => esc_html__( 'Title', 'radiantthemes-addons' ),
					'id'       => esc_html__( 'ID', 'radiantthemes-addons' ),
					'rand'     => esc_html__( 'Random', 'radiantthemes-addons' ),
					'modified' => esc_html__( 'Last Modified', 'radiantthemes-addons' ),

				),
				'default' => 'date',

			)
		);
		$this->add_control(
			'max_posts',
			array(
				'label'       => __( 'Count', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of posts to show ( -1 for all posts )', 'radiantthemes-addons' ),
				'default'     => '-1',
				'condition'   => array(
					'allow_autoplay' => 'true',
				),
			)
		);
		$this->add_control(
			'posts_in_desktop',
			array(
				'label'       => __( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Posts on Desktop (in single row)', 'radiantthemes-addons' ),
				'default'     => '5',
				'condition'   => array(
					'clients_allow_carousel' => 'true',
				),
			)
		);
		$this->add_control(
			'posts_in_tab',
			array(
				'label'       => __( 'Number of Posts on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Posts on Tab (in single row)', 'radiantthemes-addons' ),
				'default'     => '5',
				'condition'   => array(
					'clients_allow_carousel' => 'true',
				),
			)
		);
		$this->add_control(
			'posts_in_mobile',
			array(
				'label'       => __( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Posts on Mobile (in single row)', 'radiantthemes-addons' ),
				'default'     => '1',
				'condition'   => array(
					'clients_allow_carousel' => 'true',
				),
			)
		);
		$this->add_control(
			'clients_no_row_items',
			array(
				'label'       => __( 'Number of Row Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Select number of items you want to see in a row', 'radiantthemes-addons' ),
				'default'     => '2',
				'condition'   => array(
					'clients_allow_carousel' => 'false',
				),
			)
		);

		$this->add_control(
			'clients_allow_keep_link',
			array(
				'label'   => __( 'Keep Link', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),

				),
				'default' => 'true',

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
				'description' => esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ),

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

		$this->add_inline_editing_attributes( 'title', 'none' );

		$custom_css = '';

			$navigation_style = $settings['allow_nav'] ? 'owl-nav-style-' . esc_attr( $settings['navigation_style'] ) : '';
			$dot_style        = $settings['allow_dots'] ? 'owl-dot-style-' . esc_attr( $settings['navigation_dot_style'] ) : '';

			$clients_id = $settings['extra_id'] ? 'id="' . esc_attr( $settings['extra_id'] ) . '"' : '';

		if ( 'false' === $settings['clients_allow_carousel'] ) {

			$output = '<div class="clients element-' . esc_attr( $settings['clients_style'] ) . ' ' . esc_attr( $settings['extra_class'] ) . '" ' . $clients_id . ' data-row-items="' . esc_attr( $settings['clients_no_row_items'] ) . '">';

		} elseif ( 'true' === $settings['clients_allow_carousel'] ) {

			$output = '<div class="clients owl-carousel element-' . esc_attr( $settings['clients_style'] ) . ' ' . $navigation_style . ' ' . $dot_style . ' ' . esc_attr( $settings['extra_class'] ) . '" ' . $clients_id . ' data-owl-nav="' . esc_attr( $settings['allow_nav'] ) . '" data-owl-dots="' . esc_attr( $settings['allow_dots'] ) . '" data-owl-loop="' . esc_attr( $settings['allow_loop'] ) . '" data-owl-autoplay="' . esc_attr( $settings['allow_autoplay'] ) . '" data-owl-autoplay-timeout="' . esc_attr( $settings['autoplay_timeout'] ) . '" data-owl-mobile-items="' . esc_attr( $settings['posts_in_mobile'] ) . '" data-owl-tab-items="' . esc_attr( $settings['posts_in_tab'] ) . '" data-owl-desktop-items="' . esc_attr( $settings['posts_in_desktop'] ) . '">';
		} else {
			$output = '';
		}

		if ( empty( $settings['max_posts'] ) ) {
			$settings['max_posts'] = -1;
		}

		if ( 'all' == $settings['client_category'] || '' == $settings['client_category'] ) {
				$client_category = '';
		} else {
			$client_category = array(
				array(
					'taxonomy' => 'client-category',
					'field'    => 'slug',
					'terms'    => esc_attr( $settings['client_category'] ),
				),
			);
			$hidden_filter   = 'hidden';
		}

		$query = new \WP_Query(
			array(
				'post_type'      => 'client',
				'posts_per_page' => $settings['max_posts'],
				'order'          => $settings['order'],
				'orderby'        => $settings['order_by'],
				'tax_query'      => $client_category,
			)
		);

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				if ( ! has_post_thumbnail() ) {
					$output .= '<div class="clients-item no-image">';
				} else {
					$output .= '<div class="clients-item">';
				}

					// START OF LAYOUT ONE.
					$output             .= '<div class="holder matchHeight">';
						$output         .= '<div class="table">';
							$output     .= '<div class="table-cell">';
								$output .= '<div class="pic radiantthemes-retina">';
				if ( 'true' === $settings['clients_allow_keep_link'] && get_post_meta( get_the_ID(), 'clientlink', true ) ) {
					$output .= '<a href="' . get_post_meta( get_the_ID(), 'clientlink', true ) . '">';
				}
								$output .= get_the_post_thumbnail( get_the_ID() );
				if ( 'true' === $settings['clients_allow_keep_link'] && get_post_meta( get_the_ID(), 'clientlink', true ) ) {
					$output .= '</a>';
				}
							$output .= '</div>';
						$output     .= '</div>';
						$output     .= '</div>';
					$output         .= '</div>';
					$output         .= '</div>';
			}
			wp_reset_postdata();
		} else {
			echo '<p>No items found</p>';
		}
		if ( 'false' == $settings['clients_allow_carousel'] ) {
				$output .= '</div>';
		} elseif ( 'true' == $settings['clients_allow_carousel'] ) {
			$output .= '</div>';
		}

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
