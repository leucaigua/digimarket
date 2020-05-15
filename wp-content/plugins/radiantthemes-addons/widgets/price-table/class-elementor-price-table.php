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
class Radiantthemes_Style_Pricing_Table extends Widget_Base {

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
		return 'radiant-pricing-table';
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
		return esc_html__( 'Pricing Table', 'radiantthemes-addons' );
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
		return 'eicon-price-table';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return [
			'radiantthemes-addons-custom',
		];
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return [
			'radiantthemes-testimonial',
		];
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
		return [ 'radiant-widgets-category' ];
	}

	/**
	 * Get all Testimonial Custom Post Type Categories.
	 *
	 * @return array Testimonial categories.
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
			'general_section',
			[
				'label' => __( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'pricing_table_style_variation',
			[
				'label'   => __( 'Pricing Table Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one'   => __( 'Style One (Classic)', 'radiantthemes-addons' ),
					'two'   => __( 'Style Two (Minimal)', 'radiantthemes-addons' ),
					'three' => __( 'Style Three (Creative With Image)', 'radiantthemes-addons' ),
					'four'  => __( 'Style Four (Flat)', 'radiantthemes-addons' ),
					'five'  => __( 'Style Five ', 'radiantthemes-addons' ),
					'six'  => __( 'Style Six ', 'radiantthemes-addons' ),
					'seven'  => __( 'Style Seven ', 'radiantthemes-addons' ),
					'eight'  => __( 'Style Eight', 'radiantthemes-addons' ),
                                        'nine'  => __( 'Style Nine', 'radiantthemes-addons' ),

				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'info_section',
			[
				'label' => __( 'Info', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'pricing_table_image',
			[
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,

				'condition' => [
					'pricing_table_style_variation' => 'three',
				],
				
			]
		);
		$this->add_control(
			'pricing_table_image_five',
			[
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,

				'condition' =>
				[
					'pricing_table_style_variation' => 'five',
				],
			]
		);
		$this->add_control(
			'pricing_table_image_six',
			[
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,

				'condition' =>
				[
					'pricing_table_style_variation' => 'six',
				],
			]
		);
		$this->add_control(
			'pricing_table_image_seven',
			[
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,

				'condition' =>
				[
					'pricing_table_style_variation' => 'seven',
				],
			]
		);
		$this->add_control(
			'pricing_table_spotlight_text',
			[
				'label'     => __( 'Spotlight Text', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::TEXT,
				'default'     => __( 'Popular Choice', 'radiantthemes-addons' ),

				
			]
		);

		$this->add_control(
			'pricing_table_title',
			[
				'label'       => __( 'Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Basic Pack', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'pricing_table_subtitle',
			[
				'label'       => __( 'Subtitle', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'pricing_table_currency_symbol',
			[
				'label'       => __( 'Currency Symbol', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '$', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'pricing_table_price',
			[
				'label'       => __( 'Price (Without Currency Symbol)', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '199', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'pricing_table_period',
			[
				'label'       => __( 'Period', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Per Month', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'pricing_table_tagline',
			[
				'label'       => __( 'Tagline', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'content',
			[
				'label'      => __( 'Content', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::WYSIWYG,
				'default'    => __( 'Content', 'radiantthemes-addons' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'pricing_table_button',
			[
				'label'       => __( 'Button | Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Sign Up Now!', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'pricing_table_button_link',
			[
				'label'       => __( 'Button | Link', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'input_type'  => 'url',
				'placeholder' => __( 'https://your-link.com', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'pricing_table_highlight',
			[
				'label'        => __( 'Highlight ( If checked, item will be highlight By priority)', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'radiantthemes-addons' ),
				'label_off'    => __( 'Hide', 'radiantthemes-addons' ),
				'return_value' => 'spotlight',
				'default'      => 'spotlight',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' =>
				[
					'pricing_table_style_variation!' => 'eight',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'label'    => __( 'Typography', 'radiantthemes-addons' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' =>
					'{{WRAPPER}} .rt-pricing-table > .holder > .heading .title, {{WRAPPER}} .subtitle  ',

			]
		);
		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-table.element-three > .holder > .heading .title' => 'color: {{VALUE}}',

					'{{WRAPPER}} .subtitle' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .rt-pricing-table.element-nine .rt-pricing-title' => 'color: {{VALUE}}',

					'{{WRAPPER}} .rt-pricing-table.element-one > .holder > .pricing .price,
					{{WRAPPER}} .rt-pricing-table.element-one > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-one > .holder > .pricing .price sup,
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .pricing .price,
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .pricing .price sub,
					{{WRAPPER}} .rt-pricing-table.element-three > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-three > .holder > .pricing .price,
					{{WRAPPER}} .rt-pricing-table.element-three > .holder > .pricing .price sup,
					{{WRAPPER}} .rt-pricing-table.element-three > .holder > .pricing .price sub,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .pricing .price,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .pricing .price sup,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .pricing .price sub,
					{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .started .btn,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .more .btn' => 'color: {{VALUE}}',
					 
					

					'{{WRAPPER}} .rt-pricing-table.element-one.spotlight > .holder > .pricing .pricing-tag,
					{{WRAPPER}} .rt-pricing-table.element-one > .holder > .more .btn:hover,
					{{WRAPPER}} .rt-pricing-table.element-one.spotlight > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-two.spotlight > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .hightlight-tag,
					{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .spotlight-tag > .spotlight-tag-text,
					{{WRAPPER}} .rt-pricing-table.element-four.spotlight > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-seven >.holder .started >  .btn
					{{WRAPPER}} .rt-pricing-table.element-seven.spotlight >.holder .started >  .btn '=> 'background-color: {{VALUE}}',
					

					'{{WRAPPER}} .rt-pricing-table.element-one > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-three > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .more .btn' => 'border-color: {{VALUE}}',

					'{{WRAPPER}} .rt-pricing-table.element-two.spotlight > .holder' => 'border-top-color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-six.spotlight> .holder::before ' => 'background-color: {{VALUE}}',
				],
			]
		);

               $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
			   'label'     => esc_html__( 'Spotlight Typography', 'radiantthemes-addons' ),
				'name'     => 'spotlight_typography',
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-nine.spotlight > .spotlight-tag > .spotlight-tag-text , .rt-pricing-table.element-three.spotlight > .holder > .spotlight-tag > .spotlight-tag-text , .rt-pricing-table.element-seven.spotlight .holder > .spotlight-tag > .spotlight-tag-text',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			]
		);
		$this->add_control(
			'spotlight_back_color',
			[
				'label'     => esc_html__( 'Spotlight Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-table.element-nine.spotlight > .spotlight-tag > .spotlight-tag-text' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-nine.spotlight > .spotlight-tag > .spotlight-tag-text::after' => 'border-color: {{VALUE}} transparent;',
					
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .spotlight-tag > .spotlight-tag-text' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .spotlight-tag > .spotlight-tag-text::after' => 'border-color: {{VALUE}} transparent;',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight .holder > .spotlight-tag > .spotlight-tag-text' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight .holder > .spotlight-tag > .spotlight-tag-text::after' => 'border-color: {{VALUE}} transparent;',
					
					
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);
		$this->add_control(
			'spotlight_text_color',
			[
				'label'     => esc_html__( 'Spotlight Text Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-table.element-nine.spotlight > .spotlight-tag > .spotlight-tag-text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .spotlight-tag > .spotlight-tag-text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight .holder > .spotlight-tag > .spotlight-tag-text' => 'color: {{VALUE}};',
					
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);
		$this->add_control(
			'pricing_color',
			[
				'label'     => esc_html__( 'Pricing Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-table.element-nine .rt-price' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight > .holder > .pricing > .price' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .pricing > .price' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three > .holder > .pricing .price' => 'color: {{VALUE}};',
					
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);
			$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
			   'label'     => esc_html__( 'Pricing Typography', 'radiantthemes-addons' ),
				'name'     => 'pricing_typography',
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-nine .rt-price , .rt-pricing-table.element-three > .holder > .pricing .price ,  .rt-pricing-table.element-seven > .holder > .pricing > .price , .rt-pricing-table.element-seven.spotlight > .holder > .pricing > .price',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
			   'label'     => esc_html__( 'Button Typography', 'radiantthemes-addons' ),
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-nine .rt-table-buy .rt-pricing-action , .rt-pricing-table.element-nine.spotlight .rt-table-buy .rt-pricing-action , .rt-pricing-table.element-three > .holder > .more .btn , .rt-pricing-table.element-seven > .holder > .started .btn',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			]
		);
		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__( 'Button Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-table.element-nine .rt-table-buy .rt-pricing-action' => 'color: {{VALUE}};border: 1px solid {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three > .holder > .more .btn' => 'color: {{VALUE}};border: 1px solid {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .started .btn' => 'color: {{VALUE}};',
					
					
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);
		$this->add_control(
			'button_back_color',
			[
				'label'     => esc_html__( 'Button Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					
					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .started .btn' => 'background: {{VALUE}};',
					
					
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'condition' =>
				[
					'pricing_table_style_variation' => 'seven',
				],
			]
		);
		$this->add_control(
			'button_back_hover_color',
			[
				'label'     => esc_html__( 'Button Background Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					
					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .started .btn:hover' => 'background: {{VALUE}};',
					
					
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'condition' =>
				[
					'pricing_table_style_variation' => 'seven',
				],
			]
		);
			$this->add_control(
			'spotlight_image',
			[
				'label'     => __( 'Spotlight Background Image', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,

				'condition' =>
				[
					'pricing_table_style_variation' => 'seven',
				],
				
			]
		);
		$this->add_control(
			'spotlight_button_color',
			[
				'label'     => esc_html__( 'Spotlight Button Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-table.element-nine.spotlight .rt-table-buy .rt-pricing-action' => 'background: {{VALUE}};border: none ;',
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .more .btn' => 'background: {{VALUE}};border: none ;',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight > .holder > .started .btn' => 'background: {{VALUE}};border: none ;',
					
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'condition' =>
				[
					'pricing_table_highlight' => 'spotlight',
				],
			]
		);
		$this->add_control(
			'spotlight_holder_background_color',
			[
				'label'     => esc_html__( 'Spotlight Holder Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .rt-pricing-table.element-seven.spotlight .holder' => 'background: {{VALUE}};',						
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'condition' =>
				[
					'pricing_table_highlight' => 'spotlight',
				],
			]
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

		$settings         = $this->get_settings_for_display();

		echo '<!-- rt-pricing-table -->';
		echo '<div class="rt-pricing-table element-' . esc_html( $settings['pricing_table_style_variation'] ) . ' ' . $settings['pricing_table_highlight'] . '">';

		require __DIR__ . '/template/template-pricing-item-' . $settings['pricing_table_style_variation'] . '.php';

		echo '</div>' . "\r";
		echo '<!-- rt-pricing-table -->' . "\r";

		// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'css/radiantthemes-addons-custom.css', __FILE__ ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

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
