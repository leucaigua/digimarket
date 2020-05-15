<?php
/**
 * Include files for Elementor widgets
 *
 * @package RadiantThemes
 */

namespace RadiantthemesAddons;

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Function widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		// ADD RADIANTTHEMES CORE JS.
		wp_register_script(
			'radiantthemes-addons-core',
			plugins_url( '/assets/js/radiantthemes-addons-core.js', __FILE__ ),
			[ 'jquery' ],
			time(),
			true
		);
		// ADD RADIANTTHEMES CUSTOM JS.
		wp_register_script(
			'radiantthemes-addons-custom',
			plugins_url( '/assets/js/radiantthemes-addons-custom.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'radiant-accordion',
			plugins_url( '/assets/js/accordion.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'baguetteBox.min',
			plugins_url( '/assets/js/baguetteBox.min.js', __FILE__ ),
			[ 'jquery' ],
			time(),
			true
		);
		wp_register_script(
			'radiant-image-gallery',
			plugins_url( '/assets/js/image-gallery.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core', 'baguetteBox.min' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-testimonial',
			plugins_url( '/assets/js/testimonial.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-portfolio',
			plugins_url( '/assets/js/portfolio.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-client',
			plugins_url( '/assets/js/client.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-blog',
			plugins_url( '/assets/js/blog.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-team',
			plugins_url( '/assets/js/team.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-popup-video',
			plugins_url( '/assets/js/popup-video.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-flip-box',
			plugins_url( '/assets/js/flip-box.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-timeline',
			plugins_url( '/assets/js/timeline.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-progressbar',
			plugins_url( '/assets/js/progressbar.js', __FILE__ ),
			[ 'jquery', 'bootstrap', 'radiantthemes-addons-core', 'radiantthemes-addons-custom' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-case-studies-slider',
			plugins_url( '/assets/js/case-studies-slider.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-typewriter',
			plugins_url( '/assets/js/typewriter.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-countdown',
			plugins_url( '/assets/js/countdown.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);

	}

	/**
	 * Function widget_styles
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_styles() {
		// ADD ICOFONT CSS.
		// ADD RADIANTTHEMES CORE CSS.
		wp_register_style(
			'radiantthemes-addons-core',
			plugins_url( '/assets/css/radiantthemes-addons-core.css', __FILE__ ),
			[],
			time()
		);
		wp_enqueue_style( 'radiantthemes-addons-core' );

		// ADD RADIANTTHEMES CORE CSS.
		wp_register_style(
			'radiantthemes-custom-fonts',
			plugins_url( '/assets/css/radiantthemes-custom-fonts.css', __FILE__ ),
			[],
			time()
		);
		wp_enqueue_style( 'radiantthemes-custom-fonts' );

		wp_register_style(
			'radiantthemes-addons-custom',
			plugins_url( '/assets/css/radiantthemes-addons-custom.css', __FILE__ ),
			[],
			time(),
			'all'
		);

		wp_register_style(
			'baguetteBox.min',
			plugins_url( '/assets/css/baguetteBox.min.css', __FILE__ ),
			[],
			time(),
			'all'
		);

		wp_register_style(
			'image-gallery-style',
			plugins_url( '/assets/css/image-gallery-style.css', __FILE__ ),
			[],
			time(),
			'all'
		);
		wp_register_style(
			'radiantthemes-datetimepicker',
			plugins_url( '/admin/css/bootstrap-datetimepicker-admin.css', __FILE__ ),
			[],
			time(),
			'all'
		);
		
		wp_register_script(
			'radiantthemes-tabs',
			plugins_url( '/assets/js/tab.js', __FILE__ ),
			[ 'jquery', 'radiantthemes-addons-core' ],
			time(),
			true
		);
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once __DIR__ . '/widgets/accordion/class-radiantthemes-style-accordion.php';
		require_once __DIR__ . '/widgets/blog/class-radiantthemes-style-blog.php';
		require_once __DIR__ . '/widgets/calltoaction/class-radiantthemes-style-calltoaction.php';
		require_once __DIR__ . '/widgets/client/class-radiantthemes-style-client.php';

		// require_once __DIR__ . '/widgets/cf7/class-radiantthemes-style-cf7.php';

		require_once __DIR__ . '/widgets/contact-box/class-radiantthemes-style-contact-box.php';
		require_once __DIR__ . '/widgets/course/class-radiantthemes-style-course.php';
		require_once __DIR__ . '/widgets/custom-button/class-radiantthemes-style-custom-button.php';
		// require_once __DIR__ . '/widgets/event/class-radiantthemes-style-event.php';
		require_once __DIR__ . '/widgets/fancy-text-box/class-radiantthemes-style-fancy-text-box.php';
		require_once __DIR__ . '/widgets/flip-box/class-radiantthemes-style-flip-box.php';
		require_once __DIR__ . '/widgets/highlight-box/class-radiantthemes-style-highlight-box.php';
		require_once __DIR__ . '/widgets/image-gallery/class-radiantthemes-style-image-gallery.php';
		require_once __DIR__ . '/widgets/popup-video/class-radiantthemes-style-popup-video.php';
		require_once __DIR__ . '/widgets/portfolio/class-radiantthemes-style-portfolio.php';
		require_once __DIR__ . '/widgets/progressbar/class-radiantthemes-style-progressbar.php';
		require_once __DIR__ . '/widgets/price-table/class-elementor-price-table.php';
		require_once __DIR__ . '/widgets/separator/class-radiantthemes-style-separator.php';
		require_once __DIR__ . '/widgets/team/class-radiantthemes-style-team.php';
		require_once __DIR__ . '/widgets/testimonial/class-radiantthemes-style-testimonial.php';
		require_once __DIR__ . '/widgets/timeline/class-radiantthemes-style-timeline.php';
		require_once __DIR__ . '/widgets/case-studies-slider/class-radiantthemes-case-studies-slider.php';
		require_once __DIR__ . '/widgets/case-studies/class-radiantthemes-case-studies.php';
		require_once __DIR__ . '/widgets/alert-box/class-radiantthemes-style-alert.php';
		require_once __DIR__ . '/widgets/beforeafter/class-radiantthemes-style-beforeafter.php';
		require_once __DIR__ . '/widgets/typewriter-text/class-radiantthemes-style-typewriter-text.php';
		require_once __DIR__ . '/widgets/countdown/class-radiantthemes-style-countdown.php';
		require_once __DIR__ . '/widgets/tabs/class-radiantthemes-style-tabs.php';
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files.
		$this->include_widgets_files();

		// Register Widgets.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Accordion() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Blog() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Calltoaction() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Client() );

		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Cf7() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Contact_Box() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Course() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Custom_Button() );

		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Event() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Fancy_Text_Box() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Flip_Box() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Highlight_Box() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\RadiantThemes_Style_Image_Gallery() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Popup_Video() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Portfolio() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Progressbar() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Pricing_Table() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Separator() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Team() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Testimonial() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\RadiantThemes_Style_Timeline() );
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_style_Case_Studies_Slider() );
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_style_Case_Studies() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Alert() );
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Beforeafter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Typewriter_Text() );
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Countdown() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Tabs() );

	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		/**
		 * Add Font Group
		 */
		add_filter(
			'elementor/fonts/groups',
			function( $font_groups ) {
				$font_groups['custom_fonts'] = esc_html__( 'Custom Fonts' );
				return $font_groups;
			}
		);

		/**
		 * Add Group Fonts
		 */
		add_filter(
			'elementor/fonts/additional_fonts',
			function( $additional_fonts ) {
				$theme_options = get_option( 'trix_theme_option' );
				for ( $i = 1; $i <= 50; $i++ ) {
					if ( ! empty( $theme_options[ 'webfontName' . $i ] ) ) {
						$additional_fonts[] = $theme_options[ 'webfontName' . $i ];
					}
				}

				foreach ( $additional_fonts as $value ) {
					$additional_fonts[ $value ] = 'custom_fonts';
				}

				return $additional_fonts;
			}
		);

		// Register widget scripts.
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widget styles.
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );

		// Register widgets.
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

		// Enqueue styles and scripts in Elementor Editor.
		add_action(
			'elementor/preview/enqueue_styles',
			function() {
				
				// ADD RADIANTTHEMES CORE CSS.
				wp_enqueue_style(
					'radiantthemes-addons-core',
					plugins_url( '/assets/css/radiantthemes-addons-core.css', __FILE__ ),
					[],
					time()
				);

				// ADD RADIANTTHEMES CORE CSS.
				wp_enqueue_style(
					'radiantthemes-custom-fonts',
					plugins_url( '/assets/css/radiantthemes-custom-fonts.css', __FILE__ ),
					[],
					time()
				);

				wp_enqueue_style(
					'elementor-preview-style',
					plugins_url( '/assets/css/radiantthemes-addons-custom.css', __FILE__ ),
					[],
					time(),
					'all'
				);

				wp_enqueue_style(
					'baguetteBox.min',
					plugins_url( '/assets/css/baguetteBox.min.css', __FILE__ ),
					[],
					time(),
					'all'
				);

				wp_enqueue_style(
					'image-gallery-style',
					plugins_url( '/assets/css/image-gallery-style.css', __FILE__ ),
					[],
					time(),
					'all'
				);
				
				wp_enqueue_style(
			    'radiantthemes-datetimepicker',
			    plugins_url( '/admin/css/bootstrap-datetimepicker-admin.css', __FILE__ ),
			    [],
			    time(),
			    'all'
		        );
			}
		);
	}
}

// Instantiate Plugin Class.
Plugin::instance();
/**
 * Load scripts for frontend
 *
 * @return void
 */


