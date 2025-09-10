<?php
/**
 * Widget API: Default core widgets
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 2.8.0
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/** FP_Widget_Pages class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-pages.php';

/** FP_Widget_Links class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-links.php';

/** FP_Widget_Search class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-search.php';

/** FP_Widget_Archives class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-archives.php';

/** FP_Widget_Media class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-media.php';

/** FP_Widget_Media_Audio class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-media-audio.php';

/** FP_Widget_Media_Image class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-media-image.php';

/** FP_Widget_Media_Video class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-media-video.php';

/** FP_Widget_Media_Gallery class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-media-gallery.php';

/** FP_Widget_Meta class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-meta.php';

/** FP_Widget_Calendar class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-calendar.php';

/** FP_Widget_Text class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-text.php';

/** FP_Widget_Categories class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-categories.php';

/** FP_Widget_Recent_Posts class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-recent-posts.php';

/** FP_Widget_Recent_Comments class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-recent-comments.php';

/** FP_Widget_RSS class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-rss.php';

/** FP_Widget_Tag_Cloud class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-tag-cloud.php';

/** FP_Nav_Menu_Widget class */
require_once ABSPATH . FPINC . '/widgets/class-wp-nav-menu-widget.php';

/** FP_Widget_Custom_HTML class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-custom-html.php';

/** FP_Widget_Block class */
require_once ABSPATH . FPINC . '/widgets/class-wp-widget-block.php';
