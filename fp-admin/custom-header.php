<?php
/**
 * Custom header image script.
 *
 * This file is deprecated, use 'fp-admin/includes/class-custom-image-header.php' instead.
 *
 * @deprecated 5.3.0
 * @package WordPress
 * @subpackage Administration
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

_deprecated_file( basename( __FILE__ ), '5.3.0', 'fp-admin/includes/class-custom-image-header.php' );

/** Custom_Image_Header class */
require_once ABSPATH . 'fp-admin/includes/class-custom-image-header.php';
