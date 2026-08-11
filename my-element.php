<?php
/**
 * Plugin Name: My Elements
 * Description: A custom Elementor widget plugin.
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: my-elements
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the "My Elements" Elementor category.
 *
 * @param \Elementor\Elements_Manager $elements_manager
 */
function my_elements_register_category( $elements_manager ) {

	$elements_manager->add_category(
		'my-elements',
		[
			'title' => esc_html__( 'My Elements', 'my-elements' ),
			'icon'  => 'eicon-code',
		]
	);
}

add_action(
	'elementor/elements/categories_registered',
	'my_elements_register_category'
);

/**
 * Initialize the plugin.
 */
function my_elements_init() {

	// Make sure Elementor is active.
	if ( ! did_action( 'elementor/loaded' ) ) {
		return;
	}

	/**
	 * Register custom Elementor widgets.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager
	 */
	function my_elements_register_widgets( $widgets_manager ) {

		// Load the widget class.
		require_once __DIR__ . '/widgets/my-basic-widget.php';

		// Register the widget.
        // \Elementor\Plugin::instance()->widgets_manager->register
		$widgets_manager->register(
			new \My_Elements_Basic_Widget()
		);
	}

	add_action(
		'elementor/widgets/register',
		'my_elements_register_widgets'
	);
}

add_action( 'plugins_loaded', 'my_elements_init' );