<?php
/**
 * Includes Radiant Theme Addons elements like Blog,Team and Testimonials.
 *
 * @package RadiantThemes
 *
 * Plugin Name: Radiantthemes Addons
 * Description: Addon elements for Elementor Page Builder.
 * Plugin URI:  https://radiantthemes.com/
 * Version:     2.1.2
 * Author:      RadiantThemes
 * Author URI:  https://elementor.com/
 * Text Domain: radiantthemes-addons
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Radiantthemes Addons Class
 *
 * The init class that runs the Hello World plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * You should only modify the constants to match your plugin's needs.
 *
 * Any custom code should go inside Plugin Class in the plugin.php file.
 *
 * @since 1.0.0
 */
final class Radiantthemes_Addons {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.6';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Radiantthemes_Addons The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Radiantthemes_Addons An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Load translation.
		add_action( 'init', array( $this, 'i18n' ) );

		// Init Plugin.
		add_action( 'plugins_loaded', array( $this, 'init' ) );

		add_action( 'elementor/elements/categories_registered', array( $this, 'add_elementor_widget_categories' ) );
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'radiantthemes-addons', false, basename( dirname( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated.
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version.
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version.
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin.
		require_once 'class-plugin.php';
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'radiantthemes-addons' ),
			'<strong>' . esc_html__( 'Radiantthemes Addons', 'radiantthemes-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'radiantthemes-addons' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'radiantthemes-addons' ),
			'<strong>' . esc_html__( 'Radiantthemes Addons', 'radiantthemes-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'radiantthemes-addons' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'radiantthemes-addons' ),
			'<strong>' . esc_html__( 'Radiantthemes Addons', 'radiantthemes-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'radiantthemes-addons' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Add Custom Elementor Categories
	 *
	 * @param [type] $elements_manager Category Names Array.
	 * @since 1.0.0
	 * @access public
	 */
	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'radiant-widgets-category',
			array(
				'title' => esc_html__( 'Radiant Addons', 'radiantthemes-addons' ),
				'icon'  => 'fa fa-plug',
			)
		);

	}
}

// Instantiate Radiantthemes_Addons.
Radiantthemes_Addons::instance();


function radiantthemes_load_frontend_scripts() {

	// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

	// ADD RADIANTTHEMES CORE CSS.
	wp_register_style(
		'radiantthemes-addons-core',
		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-core.css' ),
		array(),
		time()
	);
	wp_enqueue_style( 'radiantthemes-addons-core' );

	// ADD RADIANTTHEMES CORE CSS.
	wp_register_style(
		'radiantthemes-custom-fonts',
		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-custom-fonts.css' ),
		array(),
		time()
	);
	wp_enqueue_style( 'radiantthemes-custom-fonts' );

	// ADD baguetteBox.min CSS.
	wp_register_style(
		'baguetteBox.min',
		plugins_url( 'radiantthemes-addons/assets/css/baguetteBox.min.css' ),
		array(),
		time()
	);
	wp_enqueue_style( 'baguetteBox.min' );

	// ADD image-gallery-style CSS.
	wp_register_style(
		'image-gallery-style',
		plugins_url( 'radiantthemes-addons/assets/css/image-gallery-style.css' ),
		array(),
		time()
	);
	wp_enqueue_style( 'image-gallery-style' );

	// ADD RADIANTTHEMES CORE JS.
	wp_register_script(
		'radiantthemes-addons-core',
		plugins_url( 'radiantthemes-addons/assets/js/radiantthemes-addons-core.js' ),
		array( 'jquery' ),
		time(),
		true
	);
	wp_enqueue_script( 'radiantthemes-addons-core' );

	// ADD RADIANTTHEMES CUSTOM JS.
	wp_register_script(
		'radiantthemes-addons-custom',
		plugins_url( 'radiantthemes-addons/assets/js/radiantthemes-addons-custom.js' ),
		array( 'jquery', 'radiantthemes-addons-core' ),
		time(),
		true
	);
	wp_enqueue_script( 'radiantthemes-addons-custom' );
}
add_action( 'wp_enqueue_scripts', 'radiantthemes_load_frontend_scripts' );

if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
	/**
	 * Add button radiaus custom css to wp_head().
	 */
	function button_radius_head_styles() {
		$buttonradius  = '';
		$buttonradius  = esc_html( ryse_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( ryse_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( ryse_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( ryse_global_var( 'border-radius', 'margin-top', true ) );

		$buttonborderradius = '.comments-area .comment-form > p button[type="submit"],.gdpr-notice .btn, .team.element-six .team-item > .holder .data .btn, .radiantthemes-button > .radiantthemes-button-main, .rt-fancy-text-box > .holder > .more .btn, .rt-call-to-action-wraper .rt-call-to-action-item .btn:hover, .radiant-contact-form .form-row input[type=submit], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn {  border-radius:' . $buttonradius . ' ; }';

		echo '<style  type="text/css">' . $buttonborderradius . '</style>';
	}
	add_action( 'wp_head', 'button_radius_head_styles' );
}





/**
 * GET AUTHOR ROLE.
 *
 * @return array
 */
function radiantthemes_get_author_role() {
	global $authordata;
	$author_roles = $authordata->roles;
	$author_role  = array_shift( $author_roles );
	return $author_role;
}
