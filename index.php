<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * fp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'FP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/fp-blog-header.php';
