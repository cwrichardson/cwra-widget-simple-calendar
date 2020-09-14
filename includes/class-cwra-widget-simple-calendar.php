<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used
 * across both the public-facing side of the site and the admin area.
 *
 * @link       https://www.cwrichardson.com/open-source/
 * @since      0.99.1
 *
 * @package    CWRA_Widget_Simple_Calendar
 * @subpackage CWRA_Widget_Simple_Calendar/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.99.1
 * @package    CWRA_Widget_Simple_Calendar
 * @subpackage CWRA_Widget_Simple_Calendar/includes
 * @author     Chris Richardson <cwr@cwrichardson.com>
 */
class CWRA_Widget_Simple_Calendar {

	/**
	 * The loader that's responsible for maintaining and
	 * registering all hooks that power the plugin.
	 *
	 * @since    0.99.1
	 * @access   protected
	 * @var      CWRA_Widget_Simple_Calendar_Loader    $loader    Maintains
	 *     and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    0.99.1
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely
	 *     identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.99.1
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be
	 * used throughout the plugin.  Load the dependencies, define
	 * the locale, and set the hooks for the admin area and the
	 * public-facing side of the site.
	 *
	 * @since    0.99.1
	 */
	public function __construct() {
		if ( defined( 'CWRA_WIDGET_SIMPLE_CALENDAR_VERSION' ) ) {
			$this->version = CWRA_WIDGET_SIMPLE_CALENDAR_VERSION;
		} else {
			$this->version = '0.99.1';
		}
		$this->plugin_name = 'cwra-widget-simple-calendar';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - CWRA_Widget_Simple_Calendar_Loader. Orchestrates the
	 *   hooks of the plugin.
	 * - CWRA_Widget_Simple_Calendar_i18n. Defines internationalization
	 *   functionality.
	 * - CWRA_Widget_Simple_Calendar_Admin. Defines all hooks
	 *   for the admin area.
	 * - CWRA_Widget_Simple_Calendar_Public. Defines all hooks
	 *   for the public side of the site.
	 * - CWRA_Widget_Simple_Calendar_Widget. Defines all hooks for
	 *   the widget.
	 *
	 * Create an instance of the loader which will be used to
	 * register the hooks with WordPress.
	 *
	 * @since    0.99.1
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the
		 * actions and filters of the core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) )
		    . 'includes/class-cwra-widget-simple-calendar-loader.php';

		/**
		 * The class responsible for defining internationalization
		 * functionality of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) )
		    . 'includes/class-cwra-widget-simple-calendar-i18n.php';

		/**
		 * The class responsible for defining all actions
		 * that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) )
		    . 'admin/class-cwra-widget-simple-calendar-admin.php';

		/**
		 * The class responsible for defining all actions
		 * that occur in the public-facing side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) )
		    . 'public/class-cwra-widget-simple-calendar-public.php';

		/**
		 * The class responsible for the widget.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) )
		    . 'widgets/cwra-widget-simple-calendar.php';

		$this->loader = new CWRA_Widget_Simple_Calendar_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the CWRA_Widget_Simple_Calendar_i18n class in order
	 * to set the domain and to register the hook with WordPress.
	 *
	 * @since    0.99.1
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new CWRA_Widget_Simple_Calendar_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n,
		    'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    0.99.1
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new CWRA_Widget_Simple_Calendar_Admin(
		    $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts',
		    $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts',
		    $plugin_admin, 'enqueue_scripts' );

		$this->loader->add_action( 'widgets_init', $plugin_admin,
		    'register_widgets' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    0.99.1
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new CWRA_Widget_Simple_Calendar_Public(
		    $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts',
		    $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts',
		    $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    0.99.1
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it
	 * within the context of WordPress and to define internationalization
	 * functionality.
	 *
	 * @since     0.99.1
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks
	 * with the plugin.
	 *
	 * @since     0.99.1
	 * @return    CWRA_Widget_Simple_Calendar_Loader    Orchestrates the
	 *     hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     0.99.1
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
