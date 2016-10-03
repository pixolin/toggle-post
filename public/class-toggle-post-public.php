<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://pixolin.de
 * @since      1.0.0
 *
 * @package    Toggle_Post
 * @subpackage Toggle_Post/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Toggle_Post
 * @subpackage Toggle_Post/public
 * @author     Bego Mario Garde <pixolin@pixolin.de>
 */
class Toggle_Post_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Toggle_Post_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Toggle_Post_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/toggle-post-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Toggle_Post_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Toggle_Post_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/toggle-post-public.js', array( 'jquery' ), $this->version, false );

	}

	public function register_shortcodes() {
		function toggle_shortcode_setup( $atts ) {
			$a = shortcode_atts( array(
				'id' => '42',
				'bar' => 'something else',
			), $atts );

			$id = $a['id'];
			$tp_post = get_post( $id );

			// Output
			$out  = '<article id="post-' . $id . '" class="togglepost">'
				. '<a href="' . get_permalink( $id ) . '">'
					. get_the_post_thumbnail( $id, 'large' )
				. '</a>'
				. '<div class="tpexpand">'
					. '<h2 class="tpheadline"><a href="' . get_permalink( $id ) . '">'
						. $tp_post->post_title
					. '</a></h2>'
					. $tp_post->post_content
				. '</div><!-- .tpexpand -->'
				. '</article>';
			return $out;
			//var_dump($tp_post, true);
		}
		add_shortcode( 'toggle-post', 'toggle_shortcode_setup' );

	}

}
