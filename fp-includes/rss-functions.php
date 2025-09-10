<?php
/**
 * Deprecated. Use rss.php instead.
 *
 * @package WordPress
 * @deprecated 2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

_deprecated_file( basename( __FILE__ ), '2.1.0', FPINC . '/rss.php' );
require_once ABSPATH . FPINC . '/rss.php';
