<?php
/**
 * Used to set up and fix common variables and include
 * the WordPress procedural and class library.
 *
 * Allows for some configuration in fp-config.php (see default-constants.php)
 *
 * @package WordPress
 */

/**
 * Stores the location of the WordPress directory of functions, classes, and core content.
 *
 * @since 1.0.0
 */
define( 'FPINC', 'fp-includes' );

/**
 * Version information for the current WordPress release.
 *
 * These can't be directly globalized in version.php. When updating,
 * include version.php from another installation and don't override
 * these values if already set.
 *
 * @global string   $wp_version              The WordPress version string.
 * @global int      $wp_db_version           WordPress database version.
 * @global string   $tinymce_version         TinyMCE version.
 * @global string   $required_php_version    The minimum required PHP version string.
 * @global string[] $required_php_extensions The names of required PHP extensions.
 * @global string   $required_mysql_version  The minimum required MySQL version string.
 * @global string   $wp_local_package        Locale code of the package.
 */
global $wp_version, $wp_db_version, $tinymce_version, $required_php_version, $required_php_extensions, $required_mysql_version, $wp_local_package;
require ABSPATH . FPINC . '/version.php';
require ABSPATH . FPINC . '/compat.php';
require ABSPATH . FPINC . '/load.php';

// Check the server requirements.
wp_check_php_mysql_versions();

// Include files required for initialization.
require ABSPATH . FPINC . '/class-fp-paused-extensions-storage.php';
require ABSPATH . FPINC . '/class-fp-exception.php';
require ABSPATH . FPINC . '/class-fp-fatal-error-handler.php';
require ABSPATH . FPINC . '/class-fp-recovery-mode-cookie-service.php';
require ABSPATH . FPINC . '/class-fp-recovery-mode-key-service.php';
require ABSPATH . FPINC . '/class-fp-recovery-mode-link-service.php';
require ABSPATH . FPINC . '/class-fp-recovery-mode-email-service.php';
require ABSPATH . FPINC . '/class-fp-recovery-mode.php';
require ABSPATH . FPINC . '/error-protection.php';
require ABSPATH . FPINC . '/default-constants.php';
require_once ABSPATH . FPINC . '/plugin.php';

/**
 * If not already configured, `$blog_id` will default to 1 in a single site
 * configuration. In multisite, it will be overridden by default in ms-settings.php.
 *
 * @since 2.0.0
 *
 * @global int $blog_id
 */
global $blog_id;

// Set initial default constants including FP_MEMORY_LIMIT, FP_MAX_MEMORY_LIMIT, FP_DEBUG, SCRIPT_DEBUG, FP_CONTENT_DIR and FP_CACHE.
wp_initial_constants();

// Register the shutdown handler for fatal errors as soon as possible.
wp_register_fatal_error_handler();

// WordPress calculates offsets from UTC.
// phpcs:ignore WordPress.DateTime.RestrictedFunctions.timezone_change_date_default_timezone_set
date_default_timezone_set( 'UTC' );

// Standardize $_SERVER variables across setups.
wp_fix_server_vars();

// Check if the site is in maintenance mode.
wp_maintenance();

// Start loading timer.
timer_start();

// Check if FP_DEBUG mode is enabled.
wp_debug_mode();

/**
 * Filters whether to enable loading of the advanced-cache.php drop-in.
 *
 * This filter runs before it can be used by plugins. It is designed for non-web
 * run-times. If false is returned, advanced-cache.php will never be loaded.
 *
 * @since 4.6.0
 *
 * @param bool $enable_advanced_cache Whether to enable loading advanced-cache.php (if present).
 *                                    Default true.
 */
if ( FP_CACHE && apply_filters( 'enable_loading_advanced_cache_dropin', true ) && file_exists( FP_CONTENT_DIR . '/advanced-cache.php' ) ) {
	// For an advanced caching plugin to use. Uses a static drop-in because you would only want one.
	include FP_CONTENT_DIR . '/advanced-cache.php';

	// Re-initialize any hooks added manually by advanced-cache.php.
	if ( $wp_filter ) {
		$wp_filter = FP_Hook::build_preinitialized_hooks( $wp_filter );
	}
}

// Define FP_LANG_DIR if not set.
wp_set_lang_dir();

// Load early WordPress files.
require ABSPATH . FPINC . '/class-fp-list-util.php';
require ABSPATH . FPINC . '/class-fp-token-map.php';
require ABSPATH . FPINC . '/formatting.php';
require ABSPATH . FPINC . '/meta.php';
require ABSPATH . FPINC . '/functions.php';
require ABSPATH . FPINC . '/class-fp-meta-query.php';
require ABSPATH . FPINC . '/class-fp-matchesmapregex.php';
require ABSPATH . FPINC . '/class-fp.php';
require ABSPATH . FPINC . '/class-fp-error.php';
require ABSPATH . FPINC . '/pomo/mo.php';
require ABSPATH . FPINC . '/l10n/class-fp-translation-controller.php';
require ABSPATH . FPINC . '/l10n/class-fp-translations.php';
require ABSPATH . FPINC . '/l10n/class-fp-translation-file.php';
require ABSPATH . FPINC . '/l10n/class-fp-translation-file-mo.php';
require ABSPATH . FPINC . '/l10n/class-fp-translation-file-php.php';

/**
 * @since 0.71
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
global $wpdb;
// Include the wpdb class and, if present, a db.php database drop-in.
require_wp_db();

/**
 * @since 3.3.0
 *
 * @global string $table_prefix The database table prefix.
 */
$GLOBALS['table_prefix'] = $table_prefix;

// Set the database table prefix and the format specifiers for database table columns.
wp_set_wpdb_vars();

// Start the WordPress object cache, or an external object cache if the drop-in is present.
wp_start_object_cache();

// Attach the default filters.
require ABSPATH . FPINC . '/default-filters.php';

// Initialize multisite if enabled.
if ( is_multisite() ) {
	require ABSPATH . FPINC . '/class-fp-site-query.php';
	require ABSPATH . FPINC . '/class-fp-network-query.php';
	require ABSPATH . FPINC . '/ms-blogs.php';
	require ABSPATH . FPINC . '/ms-settings.php';
} elseif ( ! defined( 'MULTISITE' ) ) {
	define( 'MULTISITE', false );
}

register_shutdown_function( 'shutdown_action_hook' );

// Stop most of WordPress from being loaded if SHORTINIT is enabled.
if ( SHORTINIT ) {
	return false;
}

// Load the L10n library.
require_once ABSPATH . FPINC . '/l10n.php';
require_once ABSPATH . FPINC . '/class-fp-textdomain-registry.php';
require_once ABSPATH . FPINC . '/class-fp-locale.php';
require_once ABSPATH . FPINC . '/class-fp-locale-switcher.php';

// Run the installer if WordPress is not installed.
wp_not_installed();

// Load most of WordPress.
require ABSPATH . FPINC . '/class-fp-walker.php';
require ABSPATH . FPINC . '/class-fp-ajax-response.php';
require ABSPATH . FPINC . '/capabilities.php';
require ABSPATH . FPINC . '/class-fp-roles.php';
require ABSPATH . FPINC . '/class-fp-role.php';
require ABSPATH . FPINC . '/class-fp-user.php';
require ABSPATH . FPINC . '/class-fp-query.php';
require ABSPATH . FPINC . '/query.php';
require ABSPATH . FPINC . '/class-fp-date-query.php';
require ABSPATH . FPINC . '/theme.php';
require ABSPATH . FPINC . '/class-fp-theme.php';
require ABSPATH . FPINC . '/class-fp-theme-json-schema.php';
require ABSPATH . FPINC . '/class-fp-theme-json-data.php';
require ABSPATH . FPINC . '/class-fp-theme-json.php';
require ABSPATH . FPINC . '/class-fp-theme-json-resolver.php';
require ABSPATH . FPINC . '/class-fp-duotone.php';
require ABSPATH . FPINC . '/global-styles-and-settings.php';
require ABSPATH . FPINC . '/class-fp-block-template.php';
require ABSPATH . FPINC . '/class-fp-block-templates-registry.php';
require ABSPATH . FPINC . '/block-template-utils.php';
require ABSPATH . FPINC . '/block-template.php';
require ABSPATH . FPINC . '/theme-templates.php';
require ABSPATH . FPINC . '/theme-previews.php';
require ABSPATH . FPINC . '/template.php';
require ABSPATH . FPINC . '/https-detection.php';
require ABSPATH . FPINC . '/https-migration.php';
require ABSPATH . FPINC . '/class-fp-user-request.php';
require ABSPATH . FPINC . '/user.php';
require ABSPATH . FPINC . '/class-fp-user-query.php';
require ABSPATH . FPINC . '/class-fp-session-tokens.php';
require ABSPATH . FPINC . '/class-fp-user-meta-session-tokens.php';
require ABSPATH . FPINC . '/general-template.php';
require ABSPATH . FPINC . '/link-template.php';
require ABSPATH . FPINC . '/author-template.php';
require ABSPATH . FPINC . '/robots-template.php';
require ABSPATH . FPINC . '/post.php';
require ABSPATH . FPINC . '/class-walker-page.php';
require ABSPATH . FPINC . '/class-walker-page-dropdown.php';
require ABSPATH . FPINC . '/class-fp-post-type.php';
require ABSPATH . FPINC . '/class-fp-post.php';
require ABSPATH . FPINC . '/post-template.php';
require ABSPATH . FPINC . '/revision.php';
require ABSPATH . FPINC . '/post-formats.php';
require ABSPATH . FPINC . '/post-thumbnail-template.php';
require ABSPATH . FPINC . '/category.php';
require ABSPATH . FPINC . '/class-walker-category.php';
require ABSPATH . FPINC . '/class-walker-category-dropdown.php';
require ABSPATH . FPINC . '/category-template.php';
require ABSPATH . FPINC . '/comment.php';
require ABSPATH . FPINC . '/class-fp-comment.php';
require ABSPATH . FPINC . '/class-fp-comment-query.php';
require ABSPATH . FPINC . '/class-walker-comment.php';
require ABSPATH . FPINC . '/comment-template.php';
require ABSPATH . FPINC . '/rewrite.php';
require ABSPATH . FPINC . '/class-fp-rewrite.php';
require ABSPATH . FPINC . '/feed.php';
require ABSPATH . FPINC . '/bookmark.php';
require ABSPATH . FPINC . '/bookmark-template.php';
require ABSPATH . FPINC . '/kses.php';
require ABSPATH . FPINC . '/cron.php';
require ABSPATH . FPINC . '/deprecated.php';
require ABSPATH . FPINC . '/script-loader.php';
require ABSPATH . FPINC . '/taxonomy.php';
require ABSPATH . FPINC . '/class-fp-taxonomy.php';
require ABSPATH . FPINC . '/class-fp-term.php';
require ABSPATH . FPINC . '/class-fp-term-query.php';
require ABSPATH . FPINC . '/class-fp-tax-query.php';
require ABSPATH . FPINC . '/update.php';
require ABSPATH . FPINC . '/canonical.php';
require ABSPATH . FPINC . '/shortcodes.php';
require ABSPATH . FPINC . '/embed.php';
require ABSPATH . FPINC . '/class-fp-embed.php';
require ABSPATH . FPINC . '/class-fp-oembed.php';
require ABSPATH . FPINC . '/class-fp-oembed-controller.php';
require ABSPATH . FPINC . '/media.php';
require ABSPATH . FPINC . '/http.php';
require ABSPATH . FPINC . '/html-api/html5-named-character-references.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-attribute-token.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-span.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-doctype-info.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-text-replacement.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-decoder.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-tag-processor.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-unsupported-exception.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-active-formatting-elements.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-open-elements.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-token.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-stack-event.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-processor-state.php';
require ABSPATH . FPINC . '/html-api/class-fp-html-processor.php';
require ABSPATH . FPINC . '/class-fp-http.php';
require ABSPATH . FPINC . '/class-fp-http-streams.php';
require ABSPATH . FPINC . '/class-fp-http-curl.php';
require ABSPATH . FPINC . '/class-fp-http-proxy.php';
require ABSPATH . FPINC . '/class-fp-http-cookie.php';
require ABSPATH . FPINC . '/class-fp-http-encoding.php';
require ABSPATH . FPINC . '/class-fp-http-response.php';
require ABSPATH . FPINC . '/class-fp-http-requests-response.php';
require ABSPATH . FPINC . '/class-fp-http-requests-hooks.php';
require ABSPATH . FPINC . '/widgets.php';
require ABSPATH . FPINC . '/class-fp-widget.php';
require ABSPATH . FPINC . '/class-fp-widget-factory.php';
require ABSPATH . FPINC . '/nav-menu-template.php';
require ABSPATH . FPINC . '/nav-menu.php';
require ABSPATH . FPINC . '/admin-bar.php';
require ABSPATH . FPINC . '/class-fp-application-passwords.php';
require ABSPATH . FPINC . '/rest-api.php';
require ABSPATH . FPINC . '/rest-api/class-fp-rest-server.php';
require ABSPATH . FPINC . '/rest-api/class-fp-rest-response.php';
require ABSPATH . FPINC . '/rest-api/class-fp-rest-request.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-posts-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-attachments-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-global-styles-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-post-types-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-post-statuses-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-revisions-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-global-styles-revisions-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-template-revisions-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-autosaves-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-template-autosaves-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-taxonomies-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-terms-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-menu-items-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-menus-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-menu-locations-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-users-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-comments-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-search-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-blocks-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-block-types-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-block-renderer-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-settings-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-themes-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-plugins-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-block-directory-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-edit-site-export-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-pattern-directory-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-block-patterns-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-block-pattern-categories-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-application-passwords-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-site-health-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-sidebars-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-widget-types-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-widgets-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-templates-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-url-details-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-navigation-fallback-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-font-families-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-font-faces-controller.php';
require ABSPATH . FPINC . '/rest-api/endpoints/class-fp-rest-font-collections-controller.php';
require ABSPATH . FPINC . '/rest-api/fields/class-fp-rest-meta-fields.php';
require ABSPATH . FPINC . '/rest-api/fields/class-fp-rest-comment-meta-fields.php';
require ABSPATH . FPINC . '/rest-api/fields/class-fp-rest-post-meta-fields.php';
require ABSPATH . FPINC . '/rest-api/fields/class-fp-rest-term-meta-fields.php';
require ABSPATH . FPINC . '/rest-api/fields/class-fp-rest-user-meta-fields.php';
require ABSPATH . FPINC . '/rest-api/search/class-fp-rest-search-handler.php';
require ABSPATH . FPINC . '/rest-api/search/class-fp-rest-post-search-handler.php';
require ABSPATH . FPINC . '/rest-api/search/class-fp-rest-term-search-handler.php';
require ABSPATH . FPINC . '/rest-api/search/class-fp-rest-post-format-search-handler.php';
require ABSPATH . FPINC . '/sitemaps.php';
require ABSPATH . FPINC . '/sitemaps/class-fp-sitemaps.php';
require ABSPATH . FPINC . '/sitemaps/class-fp-sitemaps-index.php';
require ABSPATH . FPINC . '/sitemaps/class-fp-sitemaps-provider.php';
require ABSPATH . FPINC . '/sitemaps/class-fp-sitemaps-registry.php';
require ABSPATH . FPINC . '/sitemaps/class-fp-sitemaps-renderer.php';
require ABSPATH . FPINC . '/sitemaps/class-fp-sitemaps-stylesheet.php';
require ABSPATH . FPINC . '/sitemaps/providers/class-fp-sitemaps-posts.php';
require ABSPATH . FPINC . '/sitemaps/providers/class-fp-sitemaps-taxonomies.php';
require ABSPATH . FPINC . '/sitemaps/providers/class-fp-sitemaps-users.php';
require ABSPATH . FPINC . '/class-fp-block-bindings-source.php';
require ABSPATH . FPINC . '/class-fp-block-bindings-registry.php';
require ABSPATH . FPINC . '/class-fp-block-editor-context.php';
require ABSPATH . FPINC . '/class-fp-block-type.php';
require ABSPATH . FPINC . '/class-fp-block-pattern-categories-registry.php';
require ABSPATH . FPINC . '/class-fp-block-patterns-registry.php';
require ABSPATH . FPINC . '/class-fp-block-styles-registry.php';
require ABSPATH . FPINC . '/class-fp-block-type-registry.php';
require ABSPATH . FPINC . '/class-fp-block.php';
require ABSPATH . FPINC . '/class-fp-block-list.php';
require ABSPATH . FPINC . '/class-fp-block-metadata-registry.php';
require ABSPATH . FPINC . '/class-fp-block-parser-block.php';
require ABSPATH . FPINC . '/class-fp-block-parser-frame.php';
require ABSPATH . FPINC . '/class-fp-block-parser.php';
require ABSPATH . FPINC . '/class-fp-classic-to-block-menu-converter.php';
require ABSPATH . FPINC . '/class-fp-navigation-fallback.php';
require ABSPATH . FPINC . '/block-bindings.php';
require ABSPATH . FPINC . '/block-bindings/pattern-overrides.php';
require ABSPATH . FPINC . '/block-bindings/post-data.php';
require ABSPATH . FPINC . '/block-bindings/post-meta.php';
require ABSPATH . FPINC . '/blocks.php';
require ABSPATH . FPINC . '/blocks/index.php';
require ABSPATH . FPINC . '/block-editor.php';
require ABSPATH . FPINC . '/block-patterns.php';
require ABSPATH . FPINC . '/class-fp-block-supports.php';
require ABSPATH . FPINC . '/block-supports/utils.php';
require ABSPATH . FPINC . '/block-supports/align.php';
require ABSPATH . FPINC . '/block-supports/custom-classname.php';
require ABSPATH . FPINC . '/block-supports/generated-classname.php';
require ABSPATH . FPINC . '/block-supports/settings.php';
require ABSPATH . FPINC . '/block-supports/elements.php';
require ABSPATH . FPINC . '/block-supports/colors.php';
require ABSPATH . FPINC . '/block-supports/typography.php';
require ABSPATH . FPINC . '/block-supports/border.php';
require ABSPATH . FPINC . '/block-supports/layout.php';
require ABSPATH . FPINC . '/block-supports/position.php';
require ABSPATH . FPINC . '/block-supports/spacing.php';
require ABSPATH . FPINC . '/block-supports/dimensions.php';
require ABSPATH . FPINC . '/block-supports/duotone.php';
require ABSPATH . FPINC . '/block-supports/shadow.php';
require ABSPATH . FPINC . '/block-supports/background.php';
require ABSPATH . FPINC . '/block-supports/block-style-variations.php';
require ABSPATH . FPINC . '/block-supports/aria-label.php';
require ABSPATH . FPINC . '/style-engine.php';
require ABSPATH . FPINC . '/style-engine/class-fp-style-engine.php';
require ABSPATH . FPINC . '/style-engine/class-fp-style-engine-css-declarations.php';
require ABSPATH . FPINC . '/style-engine/class-fp-style-engine-css-rule.php';
require ABSPATH . FPINC . '/style-engine/class-fp-style-engine-css-rules-store.php';
require ABSPATH . FPINC . '/style-engine/class-fp-style-engine-processor.php';
require ABSPATH . FPINC . '/fonts/class-fp-font-face-resolver.php';
require ABSPATH . FPINC . '/fonts/class-fp-font-collection.php';
require ABSPATH . FPINC . '/fonts/class-fp-font-face.php';
require ABSPATH . FPINC . '/fonts/class-fp-font-library.php';
require ABSPATH . FPINC . '/fonts/class-fp-font-utils.php';
require ABSPATH . FPINC . '/fonts.php';
require ABSPATH . FPINC . '/class-fp-script-modules.php';
require ABSPATH . FPINC . '/script-modules.php';
require ABSPATH . FPINC . '/interactivity-api/class-fp-interactivity-api.php';
require ABSPATH . FPINC . '/interactivity-api/class-fp-interactivity-api-directives-processor.php';
require ABSPATH . FPINC . '/interactivity-api/interactivity-api.php';
require ABSPATH . FPINC . '/class-fp-plugin-dependencies.php';
require ABSPATH . FPINC . '/class-fp-url-pattern-prefixer.php';
require ABSPATH . FPINC . '/class-fp-speculation-rules.php';
require ABSPATH . FPINC . '/speculative-loading.php';

add_action( 'after_setup_theme', array( wp_script_modules(), 'add_hooks' ) );
add_action( 'after_setup_theme', array( wp_interactivity(), 'add_hooks' ) );

/**
 * @since 3.3.0
 *
 * @global FP_Embed $wp_embed WordPress Embed object.
 */
$GLOBALS['wp_embed'] = new FP_Embed();

/**
 * WordPress Textdomain Registry object.
 *
 * Used to support just-in-time translations for manually loaded text domains.
 *
 * @since 6.1.0
 *
 * @global FP_Textdomain_Registry $wp_textdomain_registry WordPress Textdomain Registry.
 */
$GLOBALS['wp_textdomain_registry'] = new FP_Textdomain_Registry();
$GLOBALS['wp_textdomain_registry']->init();

// Load multisite-specific files.
if ( is_multisite() ) {
	require ABSPATH . FPINC . '/ms-functions.php';
	require ABSPATH . FPINC . '/ms-default-filters.php';
	require ABSPATH . FPINC . '/ms-deprecated.php';
}

// Define constants that rely on the API to obtain the default value.
// Define must-use plugin directory constants, which may be overridden in the sunrise.php drop-in.
wp_plugin_directory_constants();

/**
 * @since 3.9.0
 *
 * @global array $wp_plugin_paths
 */
$GLOBALS['wp_plugin_paths'] = array();

// Load must-use plugins.
foreach ( wp_get_mu_plugins() as $mu_plugin ) {
	$_wp_plugin_file = $mu_plugin;
	include_once $mu_plugin;
	$mu_plugin = $_wp_plugin_file; // Avoid stomping of the $mu_plugin variable in a plugin.

	/**
	 * Fires once a single must-use plugin has loaded.
	 *
	 * @since 5.1.0
	 *
	 * @param string $mu_plugin Full path to the plugin's main file.
	 */
	do_action( 'mu_plugin_loaded', $mu_plugin );
}
unset( $mu_plugin, $_wp_plugin_file );

// Load network activated plugins.
if ( is_multisite() ) {
	foreach ( wp_get_active_network_plugins() as $network_plugin ) {
		wp_register_plugin_realpath( $network_plugin );

		$_wp_plugin_file = $network_plugin;
		include_once $network_plugin;
		$network_plugin = $_wp_plugin_file; // Avoid stomping of the $network_plugin variable in a plugin.

		/**
		 * Fires once a single network-activated plugin has loaded.
		 *
		 * @since 5.1.0
		 *
		 * @param string $network_plugin Full path to the plugin's main file.
		 */
		do_action( 'network_plugin_loaded', $network_plugin );
	}
	unset( $network_plugin, $_wp_plugin_file );
}

/**
 * Fires once all must-use and network-activated plugins have loaded.
 *
 * @since 2.8.0
 */
do_action( 'muplugins_loaded' );

if ( is_multisite() ) {
	ms_cookie_constants();
}

// Define constants after multisite is loaded.
wp_cookie_constants();

// Define and enforce our SSL constants.
wp_ssl_constants();

// Create common globals.
require ABSPATH . FPINC . '/vars.php';

// Make taxonomies and posts available to plugins and themes.
// @plugin authors: warning: these get registered again on the init hook.
create_initial_taxonomies();
create_initial_post_types();

wp_start_scraping_edited_file_errors();

// Register the default theme directory root.
register_theme_directory( get_theme_root() );

if ( ! is_multisite() && wp_is_fatal_error_handler_enabled() ) {
	// Handle users requesting a recovery mode link and initiating recovery mode.
	wp_recovery_mode()->initialize();
}

// To make get_plugin_data() available in a way that's compatible with plugins also loading this file, see #62244.
require_once ABSPATH . 'fp-admin/includes/plugin.php';

// Load active plugins.
foreach ( wp_get_active_and_valid_plugins() as $plugin ) {
	wp_register_plugin_realpath( $plugin );

	$plugin_data = get_plugin_data( $plugin, false, false );

	$textdomain = $plugin_data['TextDomain'];
	if ( $textdomain ) {
		if ( $plugin_data['DomainPath'] ) {
			$GLOBALS['wp_textdomain_registry']->set_custom_path( $textdomain, dirname( $plugin ) . $plugin_data['DomainPath'] );
		} else {
			$GLOBALS['wp_textdomain_registry']->set_custom_path( $textdomain, dirname( $plugin ) );
		}
	}

	$_wp_plugin_file = $plugin;
	include_once $plugin;
	$plugin = $_wp_plugin_file; // Avoid stomping of the $plugin variable in a plugin.

	/**
	 * Fires once a single activated plugin has loaded.
	 *
	 * @since 5.1.0
	 *
	 * @param string $plugin Full path to the plugin's main file.
	 */
	do_action( 'plugin_loaded', $plugin );
}
unset( $plugin, $_wp_plugin_file, $plugin_data, $textdomain );

// Load pluggable functions.
require ABSPATH . FPINC . '/pluggable.php';
require ABSPATH . FPINC . '/pluggable-deprecated.php';

// Set internal encoding.
wp_set_internal_encoding();

// Run wp_cache_postload() if object cache is enabled and the function exists.
if ( FP_CACHE && function_exists( 'wp_cache_postload' ) ) {
	wp_cache_postload();
}

/**
 * Fires once activated plugins have loaded.
 *
 * Pluggable functions are also available at this point in the loading order.
 *
 * @since 1.5.0
 */
do_action( 'plugins_loaded' );

// Define constants which affect functionality if not already defined.
wp_functionality_constants();

// Add magic quotes and set up $_REQUEST ( $_GET + $_POST ).
wp_magic_quotes();

/**
 * Fires when comment cookies are sanitized.
 *
 * @since 2.0.11
 */
do_action( 'sanitize_comment_cookies' );

/**
 * WordPress Query object
 *
 * @since 2.0.0
 *
 * @global FP_Query $wp_the_query WordPress Query object.
 */
$GLOBALS['wp_the_query'] = new FP_Query();

/**
 * Holds the reference to {@see $wp_the_query}.
 * Use this global for WordPress queries
 *
 * @since 1.5.0
 *
 * @global FP_Query $wp_query WordPress Query object.
 */
$GLOBALS['wp_query'] = $GLOBALS['wp_the_query'];

/**
 * Holds the WordPress Rewrite object for creating pretty URLs
 *
 * @since 1.5.0
 *
 * @global FP_Rewrite $wp_rewrite WordPress rewrite component.
 */
$GLOBALS['wp_rewrite'] = new FP_Rewrite();

/**
 * WordPress Object
 *
 * @since 2.0.0
 *
 * @global FP $fp Current WordPress environment instance.
 */
$GLOBALS['fp'] = new FP();

/**
 * WordPress Widget Factory Object
 *
 * @since 2.8.0
 *
 * @global FP_Widget_Factory $wp_widget_factory
 */
$GLOBALS['wp_widget_factory'] = new FP_Widget_Factory();

/**
 * WordPress User Roles
 *
 * @since 2.0.0
 *
 * @global FP_Roles $wp_roles WordPress role management object.
 */
$GLOBALS['wp_roles'] = new FP_Roles();

/**
 * Fires before the theme is loaded.
 *
 * @since 2.6.0
 */
do_action( 'setup_theme' );

// Define the template related constants and globals.
wp_templating_constants();
wp_set_template_globals();

// Load the default text localization domain.
load_default_textdomain();

$locale      = get_locale();
$locale_file = FP_LANG_DIR . "/$locale.php";
if ( ( 0 === validate_file( $locale ) ) && is_readable( $locale_file ) ) {
	require $locale_file;
}
unset( $locale_file );

/**
 * WordPress Locale object for loading locale domain date and various strings.
 *
 * @since 2.1.0
 *
 * @global FP_Locale $wp_locale WordPress date and time locale object.
 */
$GLOBALS['wp_locale'] = new FP_Locale();

/**
 * WordPress Locale Switcher object for switching locales.
 *
 * @since 4.7.0
 *
 * @global FP_Locale_Switcher $wp_locale_switcher WordPress locale switcher object.
 */
$GLOBALS['wp_locale_switcher'] = new FP_Locale_Switcher();
$GLOBALS['wp_locale_switcher']->init();

// Load the functions for the active theme, for both parent and child theme if applicable.
foreach ( wp_get_active_and_valid_themes() as $theme ) {
	$wp_theme = wp_get_theme( basename( $theme ) );

	$wp_theme->load_textdomain();

	if ( file_exists( $theme . '/functions.php' ) ) {
		include $theme . '/functions.php';
	}
}
unset( $theme, $wp_theme );

/**
 * Fires after the theme is loaded.
 *
 * @since 3.0.0
 */
do_action( 'after_setup_theme' );

// Create an instance of FP_Site_Health so that Cron events may fire.
if ( ! class_exists( 'FP_Site_Health' ) ) {
	require_once ABSPATH . 'fp-admin/includes/class-fp-site-health.php';
}
FP_Site_Health::get_instance();

// Set up current user.
$GLOBALS['fp']->init();

/**
 * Fires after WordPress has finished loading but before any headers are sent.
 *
 * Most of FP is loaded at this stage, and the user is authenticated. FP continues
 * to load on the {@see 'init'} hook that follows (e.g. widgets), and many plugins instantiate
 * themselves on it for all sorts of reasons (e.g. they need a user, a taxonomy, etc.).
 *
 * If you wish to plug an action once FP is loaded, use the {@see 'wp_loaded'} hook below.
 *
 * @since 1.5.0
 */
do_action( 'init' );

// Check site status.
if ( is_multisite() ) {
	$file = ms_site_check();
	if ( true !== $file ) {
		require $file;
		die();
	}
	unset( $file );
}

/**
 * This hook is fired once FP, all plugins, and the theme are fully loaded and instantiated.
 *
 * Ajax requests should use fp-admin/admin-ajax.php. admin-ajax.php can handle requests for
 * users not logged in.
 *
 * @link https://developer.finpress.org/plugins/javascript/ajax
 *
 * @since 3.0.0
 */
do_action( 'wp_loaded' );
