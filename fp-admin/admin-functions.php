<?php
/**
 * Administration Functions
 *
 * This file is deprecated, use 'fp-admin/includes/admin.php' instead.
 *
 * @deprecated 2.5.0
 * @package WordPress
 * @subpackage Administration
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

_deprecated_file( basename( __FILE__ ), '2.5.0', 'fp-admin/includes/admin.php' );

/** WordPress Administration API: Includes all Administration functions. */
require_once ABSPATH . 'fp-admin/includes/admin.php';
