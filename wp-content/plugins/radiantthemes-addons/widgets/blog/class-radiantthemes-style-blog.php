<?php
/**
 * Blog Style Addon
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
 * Elementor Blog widget.
 *
 * Elementor widget that displays blog posts in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Blog extends Widget_Base {

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
		return 'radiant-blog';
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
		return esc_html__( 'Blog', 'radiantthemes-addons' );
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
		return 'eicon-post-list';
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
			'radiantthemes-blog',
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
	 * Get all Blog Categories.
	 *
	 * @param array $category Categories.
	 *
	 * @return array
	 */
	public function rt_get_categories( $category ) {
		$categories = get_categories(
			array(
				'taxonomy' => $category,
			)
		);

		foreach ( $categories as $cat ) {
			if ( is_object( $cat ) ) {
				$array[ $cat->name ] = $cat->slug;
			}
		}

		return $array;
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
				'label' => esc_html__( 'Blog', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'style_variation',
			array(
				'label'       => esc_html__( 'Blog Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'one'      => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'      => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three'    => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'     => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'five'     => esc_html__( 'Style Five', 'radiantthemes-addons' ),
					'six'      => esc_html__( 'Style Six', 'radiantthemes-addons' ),
					'seven'    => esc_html__( 'Style Seven', 'radiantthemes-addons' ),
					'eight'    => esc_html__( 'Style Eight', 'radiantthemes-addons' ),
					'nine'     => esc_html__( 'Style Nine', 'radiantthemes-addons' ),
					'ten'      => esc_html__( 'Style Ten', 'radiantthemes-addons' ),
					'eleven'   => esc_html__( 'Style Eleven', 'radiantthemes-addons' ),
					'twelve'   => esc_html__( 'Style Twelve', 'radiantthemes-addons' ),
					'thirteen' => esc_html__( 'Style Thirteen', 'radiantthemes-addons' ),
					'fourteen' => esc_html__( 'Style Fourteen', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);

		$this->add_control(
			'select_category',
			array(
				'label'       => esc_html__( 'Category', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array_flip( $this->rt_get_categories( 'category' ) ),
				'multiple'    => true,
				'default'     => '',
			)
		);
		$this->add_control(
			'readmore_text',
			[
				'label'       => esc_html__( 'Read More Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Discover More', 'radiantthemes-addons' ),
				'label_block' => true,
				'condition'    => array(
					'style_variation' => 'fourteen',
				),
			]
		);
		$this->add_control(
			'order',
			array(
				'label'   => esc_html__( 'Order', 'radiantthemes-addons' ),
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
				'label'   => esc_html__( 'Order By', 'radiantthemes-addons' ),
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
				'label'       => esc_html__( 'Count', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Number of posts to show ( -1 for all posts )', 'radiantthemes-addons' ),
				'min'         => -1,
				'default'     => -1,
			)
		);

		$this->add_control(
			'blog_no_row_items',
			array(
				'label'       => esc_html__( 'Number of Row Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select number of items you want to see in a row', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 3,
				'condition'   => array(
					'blog_allow_carousel!' => 'yes',
				),
			)
		);

		$this->add_control(
			'blog_allow_carousel',
			array(
				'label'        => esc_html__( 'Carousel', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'allow_nav',
			array(
				'label'        => esc_html__( 'Allow  Navigation?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array(
					'blog_allow_carousel' => 'yes',
				),
			)
		);

		$this->add_control(
			'navigation_style',
			array(
				'label'       => esc_html__( 'Navigation  Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one' => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two' => esc_html__( 'Style Two', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
				'condition'   => array(
					'blog_allow_carousel' => 'yes',
					'allow_nav'           => 'yes',
				),
			)
		);

		$this->add_control(
			'allow_dots',
			array(
				'label'        => esc_html__( 'Allow Dots for Navigation?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array(
					'blog_allow_carousel' => 'yes',
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
					'blog_allow_carousel' => 'yes',
					'allow_dots'          => 'yes',
				),
			)
		);

		$this->add_control(
			'allow_loop',
			array(
				'label'        => esc_html__( 'Allow Loop', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array(
					'blog_allow_carousel' => 'yes',
				),
			)
		);

		$this->add_control(
			'allow_autoplay',
			array(
				'label'        => esc_html__( 'Allow Autoplay?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array(
					'blog_allow_carousel' => 'yes',
				),
			)
		);

		$this->add_control(
			'autoplay_timeout',
			array(
				'label'     => esc_html__( 'Autoplay Timeout (in millisecond)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 500,
				'step'      => 100,
				'default'   => 1000,
				'condition' => array(
					'blog_allow_carousel' => 'yes',
					'allow_autoplay'      => 'yes',
				),
			)
		);

		$this->add_control(
			'posts_in_desktop',
			array(
				'label'       => esc_html__( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Desktop (in single row)', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 3,
				'condition'   => array(
					'blog_allow_carousel' => 'yes',
				),
			)
		);

		$this->add_control(
			'posts_in_tab',
			array(
				'label'       => esc_html__( 'Number of Posts on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Tab (in single row)', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 2,
				'condition'   => array(
					'blog_allow_carousel' => 'yes',
				),
			)
		);

		$this->add_control(
			'posts_in_mobile',
			array(
				'label'       => esc_html__( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Mobile (in single row)', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 1,
				'condition'   => array(
					'blog_allow_carousel' => 'yes',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_blog_title',
			array(
				'label' => esc_html__( 'Blog', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Title Typography', 'radiantthemes-addons' ),
				'name'     => 'title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog-item > .holder > .data .title, .blog .blog-item > .holder > .title .title a',
			)
		);

		$this->add_control(
			'blog_title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-item > .holder > .data .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-three .blog-item > .holder > .title .title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Date Typography', 'radiantthemes-addons' ),
				'name'     => 'date_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog-item > .holder > .data .date',
			)
		);

		$this->add_control(
			'blog_date_color',
			array(
				'label'     => esc_html__( 'Date Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-item > .holder > .data .date' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog .blog-item > .holder > .meta > ul > li.date' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Category Typography', 'radiantthemes-addons' ),
				'name'     => 'category_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog-item > .holder > .data .category',
			)
		);

		$this->add_control(
			'blog_category_color',
			array(
				'label'     => esc_html__( 'Category Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-item > .holder > .data .category' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Excerpt Typography', 'radiantthemes-addons' ),
				'name'     => 'excerpt_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog-item > .holder > .data .excerpt',
			)
		);

		$this->add_control(
			'blog_excerpt_color',
			array(
				'label'     => esc_html__( 'Excerpt Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-item > .holder > .data .excerpt' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Button Typography', 'radiantthemes-addons' ),
				'name'     => 'button_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog .blog-item > .holder > .data .btn, .blog .blog-item > .holder > .more .btn span',
			)
		);

		$this->add_control(
			'blog_btn_color',
			array(
				'label'     => esc_html__( 'Button Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog .blog-item > .holder > .data .btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog .blog-item > .holder > .more .btn span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog .blog-item > .holder > .data .btn > .btn-arrow' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .blog .blog-item > .holder > .more .btn > .btn-arrow' => 'background-color: {{VALUE}}',
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

		$navigation_style = 'yes' === $settings['allow_nav'] ? 'owl-nav-style-' . esc_attr( $settings['navigation_style'] ) : '';
		$dot_style        = 'yes' === $settings['allow_dots'] ? 'owl-dot-style-' . esc_attr( $settings['navigation_dot_style'] ) : '';

		$output = '';

		if ( 'yes' !== $settings['blog_allow_carousel'] ) {

			if ( 'one' === $settings['style_variation'] ) {
				$output .= '<div class="blog element-' . $settings['style_variation'] . ' isotope"';
				$output .= ' data-row-items="';
				$output .= esc_attr( $settings['blog_no_row_items'] ) . '"';
				$output .= '>';
			} else {
				$output .= '<div class="blog element-' . $settings['style_variation'] . '" ';
				$output .= ' data-row-items="';
				$output .= esc_attr( $settings['blog_no_row_items'] ) . '"';
				$output .= '>';
			}
		} elseif ( 'yes' === $settings['blog_allow_carousel'] ) {

			$output .= '<div class="blog element-' . $settings['style_variation'] . ' owl-carousel ';
			$output .= ' ' . ( 'yes' === $settings['allow_nav'] ) ? "owl-nav-style-{$settings['navigation_style']}" : '';
			$output .= ' ' . ( 'yes' === $settings['allow_dots'] ) ? " owl-dot-style-{$settings['navigation_dot_style']}" : '';

			if ( 'yes' === $settings['allow_nav'] ) {
				$output .= '" data-owl-nav="true"';
			}

			if ( 'yes' === $settings['allow_dots'] ) {
				$output .= ' data-owl-dots="true"';
			}

			if ( 'yes' === $settings['allow_loop'] ) {
				$output .= ' data-owl-loop="true"';
			}

			if ( 'yes' === $settings['allow_autoplay'] ) {
				$output .= ' data-owl-autoplay="true"';
			}

			$output .= ' data-owl-autoplay-timeout="';
			$output .= $settings['autoplay_timeout'];
			$output .= '" data-owl-mobile-items="';
			$output .= $settings['posts_in_mobile'] . '" data-owl-tab-items="';
			$output .= $settings['posts_in_tab'] . '" data-owl-desktop-items="';
			$output .= $settings['posts_in_desktop'] . '">';

		} else {
			$output .= '';
		}

		if ( is_array( $settings['select_category'] ) ) {
			$cat_list = implode( ',', $settings['select_category'] );
		} else {
			$cat_list = '';
		}

		$query = new \WP_Query(
			array(
				'post_type'      => 'post',
				'category_name'  => $cat_list,
				'posts_per_page' => $settings['max_posts'],
				'order'          => $settings['order'],
				'orderby'        => $settings['order_by'],
			)
		);

			$data = 0;
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				require 'template/template-blog-item-' . $settings['style_variation'] . '.php';
			}
			wp_reset_postdata();
		} else {
			$output .= '<p>No items found</p>';
		}

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
