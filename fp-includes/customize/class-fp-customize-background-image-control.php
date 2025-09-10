<?php
/**
 * Customize API: FP_Customize_Background_Image_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize Background Image Control class.
 *
 * @since 3.4.0
 *
 * @see FP_Customize_Image_Control
 */
class FP_Customize_Background_Image_Control extends FP_Customize_Image_Control {

	/**
	 * Customize control type.
	 *
	 * @since 4.1.0
	 * @var string
	 */
	public $type = 'background';

	/**
	 * Constructor.
	 *
	 * @since 3.4.0
	 * @uses FP_Customize_Image_Control::__construct()
	 *
	 * @param FP_Customize_Manager $manager Customizer bootstrap instance.
	 */
	public function __construct( $manager ) {
		parent::__construct(
			$manager,
			'background_image',
			array(
				'label'   => __( 'Background Image' ),
				'section' => 'background_image',
			)
		);
	}

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @since 4.1.0
	 */
	public function enqueue() {
		parent::enqueue();

		$custom_background = get_theme_support( 'custom-background' );
		wp_localize_script(
			'customize-controls',
			'_wpCustomizeBackground',
			array(
				'defaults' => ! empty( $custom_background[0] ) ? $custom_background[0] : array(),
				'nonces'   => array(
					'add' => wp_create_nonce( 'background-add' ),
				),
			)
		);
	}
}
