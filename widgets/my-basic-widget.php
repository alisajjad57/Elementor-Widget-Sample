<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * My Basic Elementor Widget.
 */
class My_Elements_Basic_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 */
	public function get_name(): string {
		return 'my_basic_widget';
	}

	/**
	 * Get widget title.
	 */
	public function get_title(): string {
		return esc_html__( 'My Basic Widget', 'my-elements' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon(): string {
		return 'eicon-heading';
	}

	/**
	 * Get widget categories.
	 */
	public function get_categories(): array {
		return [ 'my-elements' ];
	}

	/**
	 * Get widget keywords.
	 */
	public function get_keywords(): array {
		return [
			'my elements',
			'basic',
			'heading',
			'text',
		];
	}

	/**
	 * Register widget controls.
	 */
	protected function register_controls(): void {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'my-elements' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => esc_html__( 'Heading', 'my-elements' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'My Elements', 'my-elements' ),
				'placeholder' => esc_html__( 'Enter your heading', 'my-elements' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'html_tag',
			[
				'label'   => esc_html__( 'HTML Tag', 'my-elements' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output.
	 */
	protected function render(): void {

		$settings = $this->get_settings_for_display();

		$heading  = $settings['heading'];
		$html_tag = $settings['html_tag'];

		printf(
			'<%1$s class="my-elements-heading">%2$s</%1$s>',
			esc_attr( $html_tag ),
			esc_html( $heading )
		);
	}
}