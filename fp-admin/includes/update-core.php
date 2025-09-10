<?php
/**
 * WordPress core upgrade functionality.
 *
 * Note: Newly introduced functions and methods cannot be used here.
 * All functions must be present in the previous version being upgraded from
 * as this file is used there too.
 *
 * @package WordPress
 * @subpackage Administration
 * @since 2.7.0
 */

/**
 * Stores files to be deleted.
 *
 * Bundled theme files should not be included in this list.
 *
 * @since 2.7.0
 *
 * @global string[] $_old_files
 * @var string[]
 * @name $_old_files
 */
global $_old_files;

$_old_files = array(
	// 2.0
	'fp-admin/import-b2.php',
	'fp-admin/import-blogger.php',
	'fp-admin/import-greymatter.php',
	'fp-admin/import-livejournal.php',
	'fp-admin/import-mt.php',
	'fp-admin/import-rss.php',
	'fp-admin/import-textpattern.php',
	'fp-admin/quicktags.js',
	'fp-images/fade-butt.png',
	'fp-images/get-firefox.png',
	'fp-images/header-shadow.png',
	'fp-images/smilies',
	'fp-images/fp-small.png',
	'fp-images/wpminilogo.png',
	'fp.php',
	// 2.1
	'fp-admin/edit-form-ajax-cat.php',
	'fp-admin/execute-pings.php',
	'fp-admin/inline-uploading.php',
	'fp-admin/link-categories.php',
	'fp-admin/list-manipulation.js',
	'fp-admin/list-manipulation.php',
	'fp-includes/comment-functions.php',
	'fp-includes/feed-functions.php',
	'fp-includes/functions-compat.php',
	'fp-includes/functions-formatting.php',
	'fp-includes/functions-post.php',
	'fp-includes/js/dbx-key.js',
	'fp-includes/links.php',
	'fp-includes/pluggable-functions.php',
	'fp-includes/template-functions-author.php',
	'fp-includes/template-functions-category.php',
	'fp-includes/template-functions-general.php',
	'fp-includes/template-functions-links.php',
	'fp-includes/template-functions-post.php',
	'fp-includes/fp-l10n.php',
	// 2.2
	'fp-admin/cat-js.php',
	'fp-includes/js/autosave-js.php',
	'fp-includes/js/list-manipulation-js.php',
	'fp-includes/js/fp-ajax-js.php',
	// 2.3
	'fp-admin/admin-db.php',
	'fp-admin/cat.js',
	'fp-admin/categories.js',
	'fp-admin/custom-fields.js',
	'fp-admin/dbx-admin-key.js',
	'fp-admin/edit-comments.js',
	'fp-admin/install-rtl.css',
	'fp-admin/install.css',
	'fp-admin/upgrade-schema.php',
	'fp-admin/upload-functions.php',
	'fp-admin/upload-rtl.css',
	'fp-admin/upload.css',
	'fp-admin/upload.js',
	'fp-admin/users.js',
	'fp-admin/widgets-rtl.css',
	'fp-admin/widgets.css',
	'fp-admin/xfn.js',
	'fp-includes/js/tinymce/license.html',
	// 2.5
	'fp-admin/css/upload.css',
	'fp-admin/images/box-bg-left.gif',
	'fp-admin/images/box-bg-right.gif',
	'fp-admin/images/box-bg.gif',
	'fp-admin/images/box-butt-left.gif',
	'fp-admin/images/box-butt-right.gif',
	'fp-admin/images/box-butt.gif',
	'fp-admin/images/box-head-left.gif',
	'fp-admin/images/box-head-right.gif',
	'fp-admin/images/box-head.gif',
	'fp-admin/images/heading-bg.gif',
	'fp-admin/images/login-bkg-bottom.gif',
	'fp-admin/images/login-bkg-tile.gif',
	'fp-admin/images/notice.gif',
	'fp-admin/images/toggle.gif',
	'fp-admin/includes/upload.php',
	'fp-admin/js/dbx-admin-key.js',
	'fp-admin/js/link-cat.js',
	'fp-admin/profile-update.php',
	'fp-admin/templates.php',
	'fp-includes/js/dbx.js',
	'fp-includes/js/fat.js',
	'fp-includes/js/list-manipulation.js',
	'fp-includes/js/tinymce/langs/en.js',
	'fp-includes/js/tinymce/plugins/directionality/images',
	'fp-includes/js/tinymce/plugins/directionality/langs',
	'fp-includes/js/tinymce/plugins/paste/images',
	'fp-includes/js/tinymce/plugins/paste/jscripts',
	'fp-includes/js/tinymce/plugins/paste/langs',
	'fp-includes/js/tinymce/plugins/finpress/images',
	'fp-includes/js/tinymce/plugins/finpress/langs',
	'fp-includes/js/tinymce/plugins/finpress/finpress.css',
	'fp-includes/js/tinymce/plugins/wphelp',
	// 2.5.1
	'fp-includes/js/tinymce/tiny_mce_gzip.php',
	// 2.6
	'fp-admin/bookmarklet.php',
	'fp-includes/js/jquery/jquery.dimensions.min.js',
	'fp-includes/js/tinymce/plugins/finpress/popups.css',
	'fp-includes/js/fp-ajax.js',
	// 2.7
	'fp-admin/css/press-this-ie-rtl.css',
	'fp-admin/css/press-this-ie.css',
	'fp-admin/css/upload-rtl.css',
	'fp-admin/edit-form.php',
	'fp-admin/images/comment-pill.gif',
	'fp-admin/images/comment-stalk-classic.gif',
	'fp-admin/images/comment-stalk-fresh.gif',
	'fp-admin/images/comment-stalk-rtl.gif',
	'fp-admin/images/del.png',
	'fp-admin/images/gear.png',
	'fp-admin/images/media-button-gallery.gif',
	'fp-admin/images/media-buttons.gif',
	'fp-admin/images/postbox-bg.gif',
	'fp-admin/images/tab.png',
	'fp-admin/images/tail.gif',
	'fp-admin/js/forms.js',
	'fp-admin/js/upload.js',
	'fp-admin/link-import.php',
	'fp-includes/images/audio.png',
	'fp-includes/images/css.png',
	'fp-includes/images/default.png',
	'fp-includes/images/doc.png',
	'fp-includes/images/exe.png',
	'fp-includes/images/html.png',
	'fp-includes/images/js.png',
	'fp-includes/images/pdf.png',
	'fp-includes/images/swf.png',
	'fp-includes/images/tar.png',
	'fp-includes/images/text.png',
	'fp-includes/images/video.png',
	'fp-includes/images/zip.png',
	'fp-includes/js/tinymce/tiny_mce_config.php',
	'fp-includes/js/tinymce/tiny_mce_ext.js',
	// 2.8
	'fp-admin/js/users.js',
	'fp-includes/js/swfupload/swfupload_f9.swf',
	'fp-includes/js/tinymce/plugins/autosave',
	'fp-includes/js/tinymce/plugins/paste/css',
	'fp-includes/js/tinymce/utils/mclayer.js',
	'fp-includes/js/tinymce/finpress.css',
	// 2.9
	'fp-admin/js/page.dev.js',
	'fp-admin/js/page.js',
	'fp-admin/js/set-post-thumbnail-handler.dev.js',
	'fp-admin/js/set-post-thumbnail-handler.js',
	'fp-admin/js/slug.dev.js',
	'fp-admin/js/slug.js',
	'fp-includes/gettext.php',
	'fp-includes/js/tinymce/plugins/finpress/js',
	'fp-includes/streams.php',
	// MU
	'README.txt',
	'htaccess.dist',
	'index-install.php',
	'fp-admin/css/mu-rtl.css',
	'fp-admin/css/mu.css',
	'fp-admin/images/site-admin.png',
	'fp-admin/includes/mu.php',
	'fp-admin/wpmu-admin.php',
	'fp-admin/wpmu-blogs.php',
	'fp-admin/wpmu-edit.php',
	'fp-admin/wpmu-options.php',
	'fp-admin/wpmu-themes.php',
	'fp-admin/wpmu-upgrade-site.php',
	'fp-admin/wpmu-users.php',
	'fp-includes/images/finpress-mu.png',
	'fp-includes/wpmu-default-filters.php',
	'fp-includes/wpmu-functions.php',
	'wpmu-settings.php',
	// 3.0
	'fp-admin/categories.php',
	'fp-admin/edit-category-form.php',
	'fp-admin/edit-page-form.php',
	'fp-admin/edit-pages.php',
	'fp-admin/images/admin-header-footer.png',
	'fp-admin/images/browse-happy.gif',
	'fp-admin/images/ico-add.png',
	'fp-admin/images/ico-close.png',
	'fp-admin/images/ico-edit.png',
	'fp-admin/images/ico-viewpage.png',
	'fp-admin/images/fav-top.png',
	'fp-admin/images/screen-options-left.gif',
	'fp-admin/images/fp-logo-vs.gif',
	'fp-admin/images/fp-logo.gif',
	'fp-admin/import',
	'fp-admin/js/fp-gears.dev.js',
	'fp-admin/js/fp-gears.js',
	'fp-admin/options-misc.php',
	'fp-admin/page-new.php',
	'fp-admin/page.php',
	'fp-admin/rtl.css',
	'fp-admin/rtl.dev.css',
	'fp-admin/update-links.php',
	'fp-admin/fp-admin.css',
	'fp-admin/fp-admin.dev.css',
	'fp-includes/js/codepress',
	'fp-includes/js/jquery/autocomplete.dev.js',
	'fp-includes/js/jquery/autocomplete.js',
	'fp-includes/js/jquery/interface.js',
	// Following file added back in 5.1, see #45645.
	//'fp-includes/js/tinymce/fp-tinymce.js',
	// 3.1
	'fp-admin/edit-attachment-rows.php',
	'fp-admin/edit-link-categories.php',
	'fp-admin/edit-link-category-form.php',
	'fp-admin/edit-post-rows.php',
	'fp-admin/images/button-grad-active-vs.png',
	'fp-admin/images/button-grad-vs.png',
	'fp-admin/images/fav-arrow-vs-rtl.gif',
	'fp-admin/images/fav-arrow-vs.gif',
	'fp-admin/images/fav-top-vs.gif',
	'fp-admin/images/list-vs.png',
	'fp-admin/images/screen-options-right-up.gif',
	'fp-admin/images/screen-options-right.gif',
	'fp-admin/images/visit-site-button-grad-vs.gif',
	'fp-admin/images/visit-site-button-grad.gif',
	'fp-admin/link-category.php',
	'fp-admin/sidebar.php',
	'fp-includes/classes.php',
	'fp-includes/js/tinymce/blank.htm',
	'fp-includes/js/tinymce/plugins/media/img',
	'fp-includes/js/tinymce/plugins/safari',
	// 3.2
	'fp-admin/images/logo-login.gif',
	'fp-admin/images/star.gif',
	'fp-admin/js/list-table.dev.js',
	'fp-admin/js/list-table.js',
	'fp-includes/default-embeds.php',
	// 3.3
	'fp-admin/css/colors-classic-rtl.css',
	'fp-admin/css/colors-classic-rtl.dev.css',
	'fp-admin/css/colors-fresh-rtl.css',
	'fp-admin/css/colors-fresh-rtl.dev.css',
	'fp-admin/css/dashboard-rtl.dev.css',
	'fp-admin/css/dashboard.dev.css',
	'fp-admin/css/global-rtl.css',
	'fp-admin/css/global-rtl.dev.css',
	'fp-admin/css/global.css',
	'fp-admin/css/global.dev.css',
	'fp-admin/css/install-rtl.dev.css',
	'fp-admin/css/login-rtl.dev.css',
	'fp-admin/css/login.dev.css',
	'fp-admin/css/ms.css',
	'fp-admin/css/ms.dev.css',
	'fp-admin/css/nav-menu-rtl.css',
	'fp-admin/css/nav-menu-rtl.dev.css',
	'fp-admin/css/nav-menu.css',
	'fp-admin/css/nav-menu.dev.css',
	'fp-admin/css/plugin-install-rtl.css',
	'fp-admin/css/plugin-install-rtl.dev.css',
	'fp-admin/css/plugin-install.css',
	'fp-admin/css/plugin-install.dev.css',
	'fp-admin/css/press-this-rtl.dev.css',
	'fp-admin/css/press-this.dev.css',
	'fp-admin/css/theme-editor-rtl.css',
	'fp-admin/css/theme-editor-rtl.dev.css',
	'fp-admin/css/theme-editor.css',
	'fp-admin/css/theme-editor.dev.css',
	'fp-admin/css/theme-install-rtl.css',
	'fp-admin/css/theme-install-rtl.dev.css',
	'fp-admin/css/theme-install.css',
	'fp-admin/css/theme-install.dev.css',
	'fp-admin/css/widgets-rtl.dev.css',
	'fp-admin/css/widgets.dev.css',
	'fp-admin/includes/internal-linking.php',
	'fp-includes/images/admin-bar-sprite-rtl.png',
	'fp-includes/js/jquery/ui.button.js',
	'fp-includes/js/jquery/ui.core.js',
	'fp-includes/js/jquery/ui.dialog.js',
	'fp-includes/js/jquery/ui.draggable.js',
	'fp-includes/js/jquery/ui.droppable.js',
	'fp-includes/js/jquery/ui.mouse.js',
	'fp-includes/js/jquery/ui.position.js',
	'fp-includes/js/jquery/ui.resizable.js',
	'fp-includes/js/jquery/ui.selectable.js',
	'fp-includes/js/jquery/ui.sortable.js',
	'fp-includes/js/jquery/ui.tabs.js',
	'fp-includes/js/jquery/ui.widget.js',
	'fp-includes/js/l10n.dev.js',
	'fp-includes/js/l10n.js',
	'fp-includes/js/tinymce/plugins/wplink/css',
	'fp-includes/js/tinymce/plugins/wplink/img',
	'fp-includes/js/tinymce/plugins/wplink/js',
	// Don't delete, yet: 'fp-rss.php',
	// Don't delete, yet: 'fp-rdf.php',
	// Don't delete, yet: 'fp-rss2.php',
	// Don't delete, yet: 'fp-commentsrss2.php',
	// Don't delete, yet: 'fp-atom.php',
	// Don't delete, yet: 'fp-feed.php',
	// 3.4
	'fp-admin/images/gray-star.png',
	'fp-admin/images/logo-login.png',
	'fp-admin/images/star.png',
	'fp-admin/index-extra.php',
	'fp-admin/network/index-extra.php',
	'fp-admin/user/index-extra.php',
	'fp-includes/css/editor-buttons.css',
	'fp-includes/css/editor-buttons.dev.css',
	'fp-includes/js/tinymce/plugins/paste/blank.htm',
	'fp-includes/js/tinymce/plugins/finpress/css',
	'fp-includes/js/tinymce/plugins/finpress/editor_plugin.dev.js',
	'fp-includes/js/tinymce/plugins/wpdialogs/editor_plugin.dev.js',
	'fp-includes/js/tinymce/plugins/wpeditimage/editor_plugin.dev.js',
	'fp-includes/js/tinymce/plugins/wpgallery/editor_plugin.dev.js',
	'fp-includes/js/tinymce/plugins/wplink/editor_plugin.dev.js',
	// Don't delete, yet: 'fp-pass.php',
	// Don't delete, yet: 'fp-register.php',
	// 3.5
	'fp-admin/gears-manifest.php',
	'fp-admin/includes/manifest.php',
	'fp-admin/images/archive-link.png',
	'fp-admin/images/blue-grad.png',
	'fp-admin/images/button-grad-active.png',
	'fp-admin/images/button-grad.png',
	'fp-admin/images/ed-bg-vs.gif',
	'fp-admin/images/ed-bg.gif',
	'fp-admin/images/fade-butt.png',
	'fp-admin/images/fav-arrow-rtl.gif',
	'fp-admin/images/fav-arrow.gif',
	'fp-admin/images/fav-vs.png',
	'fp-admin/images/fav.png',
	'fp-admin/images/gray-grad.png',
	'fp-admin/images/loading-publish.gif',
	'fp-admin/images/logo-ghost.png',
	'fp-admin/images/logo.gif',
	'fp-admin/images/menu-arrow-frame-rtl.png',
	'fp-admin/images/menu-arrow-frame.png',
	'fp-admin/images/menu-arrows.gif',
	'fp-admin/images/menu-bits-rtl-vs.gif',
	'fp-admin/images/menu-bits-rtl.gif',
	'fp-admin/images/menu-bits-vs.gif',
	'fp-admin/images/menu-bits.gif',
	'fp-admin/images/menu-dark-rtl-vs.gif',
	'fp-admin/images/menu-dark-rtl.gif',
	'fp-admin/images/menu-dark-vs.gif',
	'fp-admin/images/menu-dark.gif',
	'fp-admin/images/required.gif',
	'fp-admin/images/screen-options-toggle-vs.gif',
	'fp-admin/images/screen-options-toggle.gif',
	'fp-admin/images/toggle-arrow-rtl.gif',
	'fp-admin/images/toggle-arrow.gif',
	'fp-admin/images/upload-classic.png',
	'fp-admin/images/upload-fresh.png',
	'fp-admin/images/white-grad-active.png',
	'fp-admin/images/white-grad.png',
	'fp-admin/images/widgets-arrow-vs.gif',
	'fp-admin/images/widgets-arrow.gif',
	'fp-admin/images/wpspin_dark.gif',
	'fp-includes/images/upload.png',
	'fp-includes/js/prototype.js',
	'fp-includes/js/scriptaculous',
	'fp-admin/css/fp-admin-rtl.dev.css',
	'fp-admin/css/fp-admin.dev.css',
	'fp-admin/css/media-rtl.dev.css',
	'fp-admin/css/media.dev.css',
	'fp-admin/css/colors-classic.dev.css',
	'fp-admin/css/customize-controls-rtl.dev.css',
	'fp-admin/css/customize-controls.dev.css',
	'fp-admin/css/ie-rtl.dev.css',
	'fp-admin/css/ie.dev.css',
	'fp-admin/css/install.dev.css',
	'fp-admin/css/colors-fresh.dev.css',
	'fp-includes/js/customize-base.dev.js',
	'fp-includes/js/json2.dev.js',
	'fp-includes/js/comment-reply.dev.js',
	'fp-includes/js/customize-preview.dev.js',
	'fp-includes/js/wplink.dev.js',
	'fp-includes/js/tw-sack.dev.js',
	'fp-includes/js/fp-list-revisions.dev.js',
	'fp-includes/js/autosave.dev.js',
	'fp-includes/js/admin-bar.dev.js',
	'fp-includes/js/quicktags.dev.js',
	'fp-includes/js/fp-ajax-response.dev.js',
	'fp-includes/js/fp-pointer.dev.js',
	'fp-includes/js/hoverIntent.dev.js',
	'fp-includes/js/colorpicker.dev.js',
	'fp-includes/js/fp-lists.dev.js',
	'fp-includes/js/customize-loader.dev.js',
	'fp-includes/js/jquery/jquery.table-hotkeys.dev.js',
	'fp-includes/js/jquery/jquery.color.dev.js',
	'fp-includes/js/jquery/jquery.color.js',
	'fp-includes/js/jquery/jquery.hotkeys.dev.js',
	'fp-includes/js/jquery/jquery.form.dev.js',
	'fp-includes/js/jquery/suggest.dev.js',
	'fp-admin/js/xfn.dev.js',
	'fp-admin/js/set-post-thumbnail.dev.js',
	'fp-admin/js/comment.dev.js',
	'fp-admin/js/theme.dev.js',
	'fp-admin/js/cat.dev.js',
	'fp-admin/js/password-strength-meter.dev.js',
	'fp-admin/js/user-profile.dev.js',
	'fp-admin/js/theme-preview.dev.js',
	'fp-admin/js/post.dev.js',
	'fp-admin/js/media-upload.dev.js',
	'fp-admin/js/word-count.dev.js',
	'fp-admin/js/plugin-install.dev.js',
	'fp-admin/js/edit-comments.dev.js',
	'fp-admin/js/media-gallery.dev.js',
	'fp-admin/js/custom-fields.dev.js',
	'fp-admin/js/custom-background.dev.js',
	'fp-admin/js/common.dev.js',
	'fp-admin/js/inline-edit-tax.dev.js',
	'fp-admin/js/gallery.dev.js',
	'fp-admin/js/utils.dev.js',
	'fp-admin/js/widgets.dev.js',
	'fp-admin/js/fp-fullscreen.dev.js',
	'fp-admin/js/nav-menu.dev.js',
	'fp-admin/js/dashboard.dev.js',
	'fp-admin/js/link.dev.js',
	'fp-admin/js/user-suggest.dev.js',
	'fp-admin/js/postbox.dev.js',
	'fp-admin/js/tags.dev.js',
	'fp-admin/js/image-edit.dev.js',
	'fp-admin/js/media.dev.js',
	'fp-admin/js/customize-controls.dev.js',
	'fp-admin/js/inline-edit-post.dev.js',
	'fp-admin/js/categories.dev.js',
	'fp-admin/js/editor.dev.js',
	'fp-includes/js/plupload/handlers.dev.js',
	'fp-includes/js/plupload/fp-plupload.dev.js',
	'fp-includes/js/swfupload/handlers.dev.js',
	'fp-includes/js/jcrop/jquery.Jcrop.dev.js',
	'fp-includes/js/jcrop/jquery.Jcrop.js',
	'fp-includes/js/jcrop/jquery.Jcrop.css',
	'fp-includes/js/imgareaselect/jquery.imgareaselect.dev.js',
	'fp-includes/css/fp-pointer.dev.css',
	'fp-includes/css/editor.dev.css',
	'fp-includes/css/jquery-ui-dialog.dev.css',
	'fp-includes/css/admin-bar-rtl.dev.css',
	'fp-includes/css/admin-bar.dev.css',
	'fp-includes/js/jquery/ui/jquery.effects.clip.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.scale.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.blind.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.core.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.shake.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.fade.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.explode.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.slide.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.drop.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.highlight.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.bounce.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.pulsate.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.transfer.min.js',
	'fp-includes/js/jquery/ui/jquery.effects.fold.min.js',
	'fp-admin/js/utils.js',
	// Added back in 5.3 [45448], see #43895.
	// 'fp-admin/options-privacy.php',
	'fp-app.php',
	'fp-includes/class-fp-atom-server.php',
	// 3.5.2
	'fp-includes/js/swfupload/swfupload-all.js',
	// 3.6
	'fp-admin/js/revisions-js.php',
	'fp-admin/images/screenshots',
	'fp-admin/js/categories.js',
	'fp-admin/js/categories.min.js',
	'fp-admin/js/custom-fields.js',
	'fp-admin/js/custom-fields.min.js',
	// 3.7
	'fp-admin/js/cat.js',
	'fp-admin/js/cat.min.js',
	// 3.8
	'fp-includes/js/thickbox/tb-close-2x.png',
	'fp-includes/js/thickbox/tb-close.png',
	'fp-includes/images/wpmini-blue-2x.png',
	'fp-includes/images/wpmini-blue.png',
	'fp-admin/css/colors-fresh.css',
	'fp-admin/css/colors-classic.css',
	'fp-admin/css/colors-fresh.min.css',
	'fp-admin/css/colors-classic.min.css',
	'fp-admin/js/about.min.js',
	'fp-admin/js/about.js',
	'fp-admin/images/arrows-dark-vs-2x.png',
	'fp-admin/images/fp-logo-vs.png',
	'fp-admin/images/arrows-dark-vs.png',
	'fp-admin/images/fp-logo.png',
	'fp-admin/images/arrows-pr.png',
	'fp-admin/images/arrows-dark.png',
	'fp-admin/images/press-this.png',
	'fp-admin/images/press-this-2x.png',
	'fp-admin/images/arrows-vs-2x.png',
	'fp-admin/images/welcome-icons.png',
	'fp-admin/images/fp-logo-2x.png',
	'fp-admin/images/stars-rtl-2x.png',
	'fp-admin/images/arrows-dark-2x.png',
	'fp-admin/images/arrows-pr-2x.png',
	'fp-admin/images/menu-shadow-rtl.png',
	'fp-admin/images/arrows-vs.png',
	'fp-admin/images/about-search-2x.png',
	'fp-admin/images/bubble_bg-rtl-2x.gif',
	'fp-admin/images/fp-badge-2x.png',
	'fp-admin/images/finpress-logo-2x.png',
	'fp-admin/images/bubble_bg-rtl.gif',
	'fp-admin/images/fp-badge.png',
	'fp-admin/images/menu-shadow.png',
	'fp-admin/images/about-globe-2x.png',
	'fp-admin/images/welcome-icons-2x.png',
	'fp-admin/images/stars-rtl.png',
	'fp-admin/images/fp-logo-vs-2x.png',
	'fp-admin/images/about-updates-2x.png',
	// 3.9
	'fp-admin/css/colors.css',
	'fp-admin/css/colors.min.css',
	'fp-admin/css/colors-rtl.css',
	'fp-admin/css/colors-rtl.min.css',
	// Following files added back in 4.5, see #36083.
	// 'fp-admin/css/media-rtl.min.css',
	// 'fp-admin/css/media.min.css',
	// 'fp-admin/css/farbtastic-rtl.min.css',
	'fp-admin/images/lock-2x.png',
	'fp-admin/images/lock.png',
	'fp-admin/js/theme-preview.js',
	'fp-admin/js/theme-install.min.js',
	'fp-admin/js/theme-install.js',
	'fp-admin/js/theme-preview.min.js',
	'fp-includes/js/plupload/plupload.html4.js',
	'fp-includes/js/plupload/plupload.html5.js',
	'fp-includes/js/plupload/changelog.txt',
	'fp-includes/js/plupload/plupload.silverlight.js',
	'fp-includes/js/plupload/plupload.flash.js',
	// Added back in 4.9 [41328], see #41755.
	// 'fp-includes/js/plupload/plupload.js',
	'fp-includes/js/tinymce/plugins/spellchecker',
	'fp-includes/js/tinymce/plugins/inlinepopups',
	'fp-includes/js/tinymce/plugins/media/js',
	'fp-includes/js/tinymce/plugins/media/css',
	'fp-includes/js/tinymce/plugins/finpress/img',
	'fp-includes/js/tinymce/plugins/wpdialogs/js',
	'fp-includes/js/tinymce/plugins/wpeditimage/img',
	'fp-includes/js/tinymce/plugins/wpeditimage/js',
	'fp-includes/js/tinymce/plugins/wpeditimage/css',
	'fp-includes/js/tinymce/plugins/wpgallery/img',
	'fp-includes/js/tinymce/plugins/paste/js',
	'fp-includes/js/tinymce/themes/advanced',
	'fp-includes/js/tinymce/tiny_mce.js',
	'fp-includes/js/tinymce/mark_loaded_src.js',
	'fp-includes/js/tinymce/fp-tinymce-schema.js',
	'fp-includes/js/tinymce/plugins/media/editor_plugin.js',
	'fp-includes/js/tinymce/plugins/media/editor_plugin_src.js',
	'fp-includes/js/tinymce/plugins/media/media.htm',
	'fp-includes/js/tinymce/plugins/wpview/editor_plugin_src.js',
	'fp-includes/js/tinymce/plugins/wpview/editor_plugin.js',
	'fp-includes/js/tinymce/plugins/directionality/editor_plugin.js',
	'fp-includes/js/tinymce/plugins/directionality/editor_plugin_src.js',
	'fp-includes/js/tinymce/plugins/finpress/editor_plugin.js',
	'fp-includes/js/tinymce/plugins/finpress/editor_plugin_src.js',
	'fp-includes/js/tinymce/plugins/wpdialogs/editor_plugin_src.js',
	'fp-includes/js/tinymce/plugins/wpdialogs/editor_plugin.js',
	'fp-includes/js/tinymce/plugins/wpeditimage/editimage.html',
	'fp-includes/js/tinymce/plugins/wpeditimage/editor_plugin.js',
	'fp-includes/js/tinymce/plugins/wpeditimage/editor_plugin_src.js',
	'fp-includes/js/tinymce/plugins/fullscreen/editor_plugin_src.js',
	'fp-includes/js/tinymce/plugins/fullscreen/fullscreen.htm',
	'fp-includes/js/tinymce/plugins/fullscreen/editor_plugin.js',
	'fp-includes/js/tinymce/plugins/wplink/editor_plugin_src.js',
	'fp-includes/js/tinymce/plugins/wplink/editor_plugin.js',
	'fp-includes/js/tinymce/plugins/wpgallery/editor_plugin_src.js',
	'fp-includes/js/tinymce/plugins/wpgallery/editor_plugin.js',
	'fp-includes/js/tinymce/plugins/tabfocus/editor_plugin.js',
	'fp-includes/js/tinymce/plugins/tabfocus/editor_plugin_src.js',
	'fp-includes/js/tinymce/plugins/paste/editor_plugin.js',
	'fp-includes/js/tinymce/plugins/paste/pasteword.htm',
	'fp-includes/js/tinymce/plugins/paste/editor_plugin_src.js',
	'fp-includes/js/tinymce/plugins/paste/pastetext.htm',
	'fp-includes/js/tinymce/langs/fp-langs.php',
	// 4.1
	'fp-includes/js/jquery/ui/jquery.ui.accordion.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.autocomplete.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.button.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.core.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.datepicker.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.dialog.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.draggable.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.droppable.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-blind.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-bounce.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-clip.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-drop.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-explode.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-fade.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-fold.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-highlight.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-pulsate.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-scale.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-shake.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-slide.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect-transfer.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.effect.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.menu.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.mouse.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.position.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.progressbar.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.resizable.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.selectable.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.slider.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.sortable.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.spinner.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.tabs.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.tooltip.min.js',
	'fp-includes/js/jquery/ui/jquery.ui.widget.min.js',
	'fp-includes/js/tinymce/skins/finpress/images/dashicon-no-alt.png',
	// 4.3
	'fp-admin/js/fp-fullscreen.js',
	'fp-admin/js/fp-fullscreen.min.js',
	'fp-includes/js/tinymce/fp-mce-help.php',
	'fp-includes/js/tinymce/plugins/wpfullscreen',
	// 4.5
	'fp-includes/theme-compat/comments-popup.php',
	// 4.6
	'fp-admin/includes/class-fp-automatic-upgrader.php', // Wrong file name, see #37628.
	// 4.8
	'fp-includes/js/tinymce/plugins/wpembed',
	'fp-includes/js/tinymce/plugins/media/moxieplayer.swf',
	'fp-includes/js/tinymce/skins/lightgray/fonts/readme.md',
	'fp-includes/js/tinymce/skins/lightgray/fonts/tinymce-small.json',
	'fp-includes/js/tinymce/skins/lightgray/fonts/tinymce.json',
	'fp-includes/js/tinymce/skins/lightgray/skin.ie7.min.css',
	// 4.9
	'fp-admin/css/press-this-editor-rtl.css',
	'fp-admin/css/press-this-editor-rtl.min.css',
	'fp-admin/css/press-this-editor.css',
	'fp-admin/css/press-this-editor.min.css',
	'fp-admin/css/press-this-rtl.css',
	'fp-admin/css/press-this-rtl.min.css',
	'fp-admin/css/press-this.css',
	'fp-admin/css/press-this.min.css',
	'fp-admin/includes/class-fp-press-this.php',
	'fp-admin/js/bookmarklet.js',
	'fp-admin/js/bookmarklet.min.js',
	'fp-admin/js/press-this.js',
	'fp-admin/js/press-this.min.js',
	'fp-includes/js/mediaelement/background.png',
	'fp-includes/js/mediaelement/bigplay.png',
	'fp-includes/js/mediaelement/bigplay.svg',
	'fp-includes/js/mediaelement/controls.png',
	'fp-includes/js/mediaelement/controls.svg',
	'fp-includes/js/mediaelement/flashmediaelement.swf',
	'fp-includes/js/mediaelement/froogaloop.min.js',
	'fp-includes/js/mediaelement/jumpforward.png',
	'fp-includes/js/mediaelement/loading.gif',
	'fp-includes/js/mediaelement/silverlightmediaelement.xap',
	'fp-includes/js/mediaelement/skipback.png',
	'fp-includes/js/plupload/plupload.flash.swf',
	'fp-includes/js/plupload/plupload.full.min.js',
	'fp-includes/js/plupload/plupload.silverlight.xap',
	'fp-includes/js/swfupload/plugins',
	'fp-includes/js/swfupload/swfupload.swf',
	// 4.9.2
	'fp-includes/js/mediaelement/lang',
	'fp-includes/js/mediaelement/mediaelement-flash-audio-ogg.swf',
	'fp-includes/js/mediaelement/mediaelement-flash-audio.swf',
	'fp-includes/js/mediaelement/mediaelement-flash-video-hls.swf',
	'fp-includes/js/mediaelement/mediaelement-flash-video-mdash.swf',
	'fp-includes/js/mediaelement/mediaelement-flash-video.swf',
	'fp-includes/js/mediaelement/renderers/dailymotion.js',
	'fp-includes/js/mediaelement/renderers/dailymotion.min.js',
	'fp-includes/js/mediaelement/renderers/facebook.js',
	'fp-includes/js/mediaelement/renderers/facebook.min.js',
	'fp-includes/js/mediaelement/renderers/soundcloud.js',
	'fp-includes/js/mediaelement/renderers/soundcloud.min.js',
	'fp-includes/js/mediaelement/renderers/twitch.js',
	'fp-includes/js/mediaelement/renderers/twitch.min.js',
	// 5.0
	'fp-includes/js/codemirror/jshint.js',
	// 5.1
	'fp-includes/js/tinymce/fp-tinymce.js.gz',
	// 5.3
	'fp-includes/js/fp-a11y.js',     // Moved to: fp-includes/js/dist/a11y.js
	'fp-includes/js/fp-a11y.min.js', // Moved to: fp-includes/js/dist/a11y.min.js
	// 5.4
	'fp-admin/js/fp-fullscreen-stub.js',
	'fp-admin/js/fp-fullscreen-stub.min.js',
	// 5.5
	'fp-admin/css/ie.css',
	'fp-admin/css/ie.min.css',
	'fp-admin/css/ie-rtl.css',
	'fp-admin/css/ie-rtl.min.css',
	// 5.6
	'fp-includes/js/jquery/ui/position.min.js',
	'fp-includes/js/jquery/ui/widget.min.js',
	// 5.7
	'fp-includes/blocks/classic/block.json',
	// 5.8
	'fp-admin/images/freedoms.png',
	'fp-admin/images/privacy.png',
	'fp-admin/images/about-badge.svg',
	'fp-admin/images/about-color-palette.svg',
	'fp-admin/images/about-color-palette-vert.svg',
	'fp-admin/images/about-header-brushes.svg',
	'fp-includes/block-patterns/large-header.php',
	'fp-includes/block-patterns/heading-paragraph.php',
	'fp-includes/block-patterns/quote.php',
	'fp-includes/block-patterns/text-three-columns-buttons.php',
	'fp-includes/block-patterns/two-buttons.php',
	'fp-includes/block-patterns/two-images.php',
	'fp-includes/block-patterns/three-buttons.php',
	'fp-includes/block-patterns/text-two-columns-with-images.php',
	'fp-includes/block-patterns/text-two-columns.php',
	'fp-includes/block-patterns/large-header-button.php',
	'fp-includes/blocks/subhead',
	'fp-includes/css/dist/editor/editor-styles.css',
	'fp-includes/css/dist/editor/editor-styles.min.css',
	'fp-includes/css/dist/editor/editor-styles-rtl.css',
	'fp-includes/css/dist/editor/editor-styles-rtl.min.css',
	// 5.9
	'fp-includes/blocks/heading/editor.css',
	'fp-includes/blocks/heading/editor.min.css',
	'fp-includes/blocks/heading/editor-rtl.css',
	'fp-includes/blocks/heading/editor-rtl.min.css',
	'fp-includes/blocks/query-title/editor.css',
	'fp-includes/blocks/query-title/editor.min.css',
	'fp-includes/blocks/query-title/editor-rtl.css',
	'fp-includes/blocks/query-title/editor-rtl.min.css',
	/*
	 * Restored in WordPress 6.7
	 *
	 * 'fp-includes/blocks/tag-cloud/editor.css',
	 * 'fp-includes/blocks/tag-cloud/editor.min.css',
	 * 'fp-includes/blocks/tag-cloud/editor-rtl.css',
	 * 'fp-includes/blocks/tag-cloud/editor-rtl.min.css',
	 */
	// 6.1
	'fp-includes/blocks/post-comments.php',
	'fp-includes/blocks/post-comments',
	'fp-includes/blocks/comments-query-loop',
	// 6.3
	'fp-includes/images/wlw',
	'fp-includes/wlwmanifest.xml',
	'fp-includes/random_compat',
	// 6.4
	'fp-includes/navigation-fallback.php',
	'fp-includes/blocks/navigation/view-modal.min.js',
	'fp-includes/blocks/navigation/view-modal.js',
	// 6.5
	'fp-includes/ID3/license.commercial.txt',
	'fp-includes/blocks/query/style-rtl.min.css',
	'fp-includes/blocks/query/style.min.css',
	'fp-includes/blocks/query/style-rtl.css',
	'fp-includes/blocks/query/style.css',
	'fp-admin/images/about-header-privacy.svg',
	'fp-admin/images/about-header-about.svg',
	'fp-admin/images/about-header-credits.svg',
	'fp-admin/images/about-header-freedoms.svg',
	'fp-admin/images/about-header-contribute.svg',
	'fp-admin/images/about-header-background.svg',
	// 6.6
	'fp-includes/blocks/block/editor.css',
	'fp-includes/blocks/block/editor.min.css',
	'fp-includes/blocks/block/editor-rtl.css',
	'fp-includes/blocks/block/editor-rtl.min.css',
	/*
	 * 6.7
	 *
	 * WordPress 6.7 included a SimplePie upgrade that included a major
	 * refactoring of the file structure and library. The old files are
	 * split in to two sections to account for this: files and directories.
	 *
	 * See https://core.trac.finpress.org/changeset/59141
	 */
	// 6.7 - files
	'fp-includes/js/dist/interactivity-router.asset.php',
	'fp-includes/js/dist/interactivity-router.js',
	'fp-includes/js/dist/interactivity-router.min.js',
	'fp-includes/js/dist/interactivity-router.min.asset.php',
	'fp-includes/js/dist/interactivity.js',
	'fp-includes/js/dist/interactivity.min.js',
	'fp-includes/js/dist/vendor/react-dom.min.js.LICENSE.txt',
	'fp-includes/js/dist/vendor/react.min.js.LICENSE.txt',
	'fp-includes/js/dist/vendor/fp-polyfill-importmap.js',
	'fp-includes/js/dist/vendor/fp-polyfill-importmap.min.js',
	'fp-includes/sodium_compat/src/Core/Base64/Common.php',
	'fp-includes/SimplePie/Author.php',
	'fp-includes/SimplePie/Cache.php',
	'fp-includes/SimplePie/Caption.php',
	'fp-includes/SimplePie/Category.php',
	'fp-includes/SimplePie/Copyright.php',
	'fp-includes/SimplePie/Core.php',
	'fp-includes/SimplePie/Credit.php',
	'fp-includes/SimplePie/Enclosure.php',
	'fp-includes/SimplePie/Exception.php',
	'fp-includes/SimplePie/File.php',
	'fp-includes/SimplePie/gzdecode.php',
	'fp-includes/SimplePie/IRI.php',
	'fp-includes/SimplePie/Item.php',
	'fp-includes/SimplePie/Locator.php',
	'fp-includes/SimplePie/Misc.php',
	'fp-includes/SimplePie/Parser.php',
	'fp-includes/SimplePie/Rating.php',
	'fp-includes/SimplePie/Registry.php',
	'fp-includes/SimplePie/Restriction.php',
	'fp-includes/SimplePie/Sanitize.php',
	'fp-includes/SimplePie/Source.php',
	// 6.7 - directories
	'fp-includes/SimplePie/Cache/',
	'fp-includes/SimplePie/Content/',
	'fp-includes/SimplePie/Decode/',
	'fp-includes/SimplePie/HTTP/',
	'fp-includes/SimplePie/Net/',
	'fp-includes/SimplePie/Parse/',
	'fp-includes/SimplePie/XML/',
	// 6.8
	'fp-includes/blocks/post-content/editor.css',
	'fp-includes/blocks/post-content/editor.min.css',
	'fp-includes/blocks/post-content/editor-rtl.css',
	'fp-includes/blocks/post-content/editor-rtl.min.css',
	'fp-includes/blocks/post-template/editor.css',
	'fp-includes/blocks/post-template/editor.min.css',
	'fp-includes/blocks/post-template/editor-rtl.css',
	'fp-includes/blocks/post-template/editor-rtl.min.css',
	'fp-includes/js/dist/undo-manager.js',
	'fp-includes/js/dist/undo-manager.min.js',
	'fp-includes/js/dist/fields.min.js',
	'fp-includes/js/dist/fields.js',
	// 6.9
	'fp-content/plugins/hello.php',
);

/**
 * Stores Requests files to be preloaded and deleted.
 *
 * For classes/interfaces, use the class/interface name
 * as the array key.
 *
 * All other files/directories should not have a key.
 *
 * @since 6.2.0
 *
 * @global string[] $_old_requests_files
 * @var string[]
 * @name $_old_requests_files
 */
global $_old_requests_files;

$_old_requests_files = array(
	// Interfaces.
	'Requests_Auth'                              => 'fp-includes/Requests/Auth.php',
	'Requests_Hooker'                            => 'fp-includes/Requests/Hooker.php',
	'Requests_Proxy'                             => 'fp-includes/Requests/Proxy.php',
	'Requests_Transport'                         => 'fp-includes/Requests/Transport.php',

	// Classes.
	'Requests_Auth_Basic'                        => 'fp-includes/Requests/Auth/Basic.php',
	'Requests_Cookie_Jar'                        => 'fp-includes/Requests/Cookie/Jar.php',
	'Requests_Exception_HTTP'                    => 'fp-includes/Requests/Exception/HTTP.php',
	'Requests_Exception_Transport'               => 'fp-includes/Requests/Exception/Transport.php',
	'Requests_Exception_HTTP_304'                => 'fp-includes/Requests/Exception/HTTP/304.php',
	'Requests_Exception_HTTP_305'                => 'fp-includes/Requests/Exception/HTTP/305.php',
	'Requests_Exception_HTTP_306'                => 'fp-includes/Requests/Exception/HTTP/306.php',
	'Requests_Exception_HTTP_400'                => 'fp-includes/Requests/Exception/HTTP/400.php',
	'Requests_Exception_HTTP_401'                => 'fp-includes/Requests/Exception/HTTP/401.php',
	'Requests_Exception_HTTP_402'                => 'fp-includes/Requests/Exception/HTTP/402.php',
	'Requests_Exception_HTTP_403'                => 'fp-includes/Requests/Exception/HTTP/403.php',
	'Requests_Exception_HTTP_404'                => 'fp-includes/Requests/Exception/HTTP/404.php',
	'Requests_Exception_HTTP_405'                => 'fp-includes/Requests/Exception/HTTP/405.php',
	'Requests_Exception_HTTP_406'                => 'fp-includes/Requests/Exception/HTTP/406.php',
	'Requests_Exception_HTTP_407'                => 'fp-includes/Requests/Exception/HTTP/407.php',
	'Requests_Exception_HTTP_408'                => 'fp-includes/Requests/Exception/HTTP/408.php',
	'Requests_Exception_HTTP_409'                => 'fp-includes/Requests/Exception/HTTP/409.php',
	'Requests_Exception_HTTP_410'                => 'fp-includes/Requests/Exception/HTTP/410.php',
	'Requests_Exception_HTTP_411'                => 'fp-includes/Requests/Exception/HTTP/411.php',
	'Requests_Exception_HTTP_412'                => 'fp-includes/Requests/Exception/HTTP/412.php',
	'Requests_Exception_HTTP_413'                => 'fp-includes/Requests/Exception/HTTP/413.php',
	'Requests_Exception_HTTP_414'                => 'fp-includes/Requests/Exception/HTTP/414.php',
	'Requests_Exception_HTTP_415'                => 'fp-includes/Requests/Exception/HTTP/415.php',
	'Requests_Exception_HTTP_416'                => 'fp-includes/Requests/Exception/HTTP/416.php',
	'Requests_Exception_HTTP_417'                => 'fp-includes/Requests/Exception/HTTP/417.php',
	'Requests_Exception_HTTP_418'                => 'fp-includes/Requests/Exception/HTTP/418.php',
	'Requests_Exception_HTTP_428'                => 'fp-includes/Requests/Exception/HTTP/428.php',
	'Requests_Exception_HTTP_429'                => 'fp-includes/Requests/Exception/HTTP/429.php',
	'Requests_Exception_HTTP_431'                => 'fp-includes/Requests/Exception/HTTP/431.php',
	'Requests_Exception_HTTP_500'                => 'fp-includes/Requests/Exception/HTTP/500.php',
	'Requests_Exception_HTTP_501'                => 'fp-includes/Requests/Exception/HTTP/501.php',
	'Requests_Exception_HTTP_502'                => 'fp-includes/Requests/Exception/HTTP/502.php',
	'Requests_Exception_HTTP_503'                => 'fp-includes/Requests/Exception/HTTP/503.php',
	'Requests_Exception_HTTP_504'                => 'fp-includes/Requests/Exception/HTTP/504.php',
	'Requests_Exception_HTTP_505'                => 'fp-includes/Requests/Exception/HTTP/505.php',
	'Requests_Exception_HTTP_511'                => 'fp-includes/Requests/Exception/HTTP/511.php',
	'Requests_Exception_HTTP_Unknown'            => 'fp-includes/Requests/Exception/HTTP/Unknown.php',
	'Requests_Exception_Transport_cURL'          => 'fp-includes/Requests/Exception/Transport/cURL.php',
	'Requests_Proxy_HTTP'                        => 'fp-includes/Requests/Proxy/HTTP.php',
	'Requests_Response_Headers'                  => 'fp-includes/Requests/Response/Headers.php',
	'Requests_Transport_cURL'                    => 'fp-includes/Requests/Transport/cURL.php',
	'Requests_Transport_fsockopen'               => 'fp-includes/Requests/Transport/fsockopen.php',
	'Requests_Utility_CaseInsensitiveDictionary' => 'fp-includes/Requests/Utility/CaseInsensitiveDictionary.php',
	'Requests_Utility_FilteredIterator'          => 'fp-includes/Requests/Utility/FilteredIterator.php',
	'Requests_Cookie'                            => 'fp-includes/Requests/Cookie.php',
	'Requests_Exception'                         => 'fp-includes/Requests/Exception.php',
	'Requests_Hooks'                             => 'fp-includes/Requests/Hooks.php',
	'Requests_IDNAEncoder'                       => 'fp-includes/Requests/IDNAEncoder.php',
	'Requests_IPv6'                              => 'fp-includes/Requests/IPv6.php',
	'Requests_IRI'                               => 'fp-includes/Requests/IRI.php',
	'Requests_Response'                          => 'fp-includes/Requests/Response.php',
	'Requests_SSL'                               => 'fp-includes/Requests/SSL.php',
	'Requests_Session'                           => 'fp-includes/Requests/Session.php',

	// Directories.
	'fp-includes/Requests/Auth/',
	'fp-includes/Requests/Cookie/',
	'fp-includes/Requests/Exception/HTTP/',
	'fp-includes/Requests/Exception/Transport/',
	'fp-includes/Requests/Exception/',
	'fp-includes/Requests/Proxy/',
	'fp-includes/Requests/Response/',
	'fp-includes/Requests/Transport/',
	'fp-includes/Requests/Utility/',
);

/**
 * Stores new files in fp-content to copy
 *
 * The contents of this array indicate any new bundled plugins/themes which
 * should be installed with the WordPress Upgrade. These items will not be
 * re-installed in future upgrades, this behavior is controlled by the
 * introduced version present here being older than the current installed version.
 *
 * The content of this array should follow the following format:
 * Filename (relative to fp-content) => Introduced version
 * Directories should be noted by suffixing it with a trailing slash (/)
 *
 * @since 3.2.0
 * @since 4.7.0 New themes were not automatically installed for 4.4-4.6 on
 *              upgrade. New themes are now installed again. To disable new
 *              themes from being installed on upgrade, explicitly define
 *              CORE_UPGRADE_SKIP_NEW_BUNDLED as true.
 * @global string[] $_new_bundled_files
 * @var string[]
 * @name $_new_bundled_files
 */
global $_new_bundled_files;

$_new_bundled_files = array(
	'plugins/akismet/'          => '2.0',
	'themes/twentyten/'         => '3.0',
	'themes/twentyeleven/'      => '3.2',
	'themes/twentytwelve/'      => '3.5',
	'themes/twentythirteen/'    => '3.6',
	'themes/twentyfourteen/'    => '3.8',
	'themes/twentyfifteen/'     => '4.1',
	'themes/twentysixteen/'     => '4.4',
	'themes/twentyseventeen/'   => '4.7',
	'themes/twentynineteen/'    => '5.0',
	'themes/twentytwenty/'      => '5.3',
	'themes/twentytwentyone/'   => '5.6',
	'themes/twentytwentytwo/'   => '5.9',
	'themes/twentytwentythree/' => '6.1',
	'themes/twentytwentyfour/'  => '6.4',
	'themes/twentytwentyfive/'  => '6.7',
	'plugins/hello-dolly/'      => '6.9',
);

/**
 * Upgrades the core of WordPress.
 *
 * This will create a .maintenance file at the base of the WordPress directory
 * to ensure that people can not access the website, when the files are being
 * copied to their locations.
 *
 * The files in the `$_old_files` list will be removed and the new files
 * copied from the zip file after the database is upgraded.
 *
 * The files in the `$_new_bundled_files` list will be added to the installation
 * if the version is greater than or equal to the old version being upgraded.
 *
 * The steps for the upgrader for after the new release is downloaded and
 * unzipped is:
 *
 *   1. Test unzipped location for select files to ensure that unzipped worked.
 *   2. Create the .maintenance file in current WordPress base.
 *   3. Copy new WordPress directory over old WordPress files.
 *   4. Upgrade WordPress to new version.
 *      1. Copy all files/folders other than fp-content
 *      2. Copy any language files to `FP_LANG_DIR` (which may differ from `FP_CONTENT_DIR`
 *      3. Copy any new bundled themes/plugins to their respective locations
 *   5. Delete new WordPress directory path.
 *   6. Delete .maintenance file.
 *   7. Remove old files.
 *   8. Delete 'update_core' option.
 *
 * There are several areas of failure. For instance if PHP times out before step
 * 6, then you will not be able to access any portion of your site. Also, since
 * the upgrade will not continue where it left off, you will not be able to
 * automatically remove old files and remove the 'update_core' option. This
 * isn't that bad.
 *
 * If the copy of the new WordPress over the old fails, then the worse is that
 * the new WordPress directory will remain.
 *
 * If it is assumed that every file will be copied over, including plugins and
 * themes, then if you edit the default theme, you should rename it, so that
 * your changes remain.
 *
 * @since 2.7.0
 *
 * @global FP_Filesystem_Base $wp_filesystem          WordPress filesystem subclass.
 * @global string[]           $_old_files
 * @global string[]           $_old_requests_files
 * @global string[]           $_new_bundled_files
 * @global wpdb               $wpdb                   WordPress database abstraction object.
 * @global string             $wp_version             The WordPress version string.
 *
 * @param string $from New release unzipped path.
 * @param string $to   Path to old WordPress installation.
 * @return string|FP_Error New WordPress version on success, FP_Error on failure.
 */
function update_core( $from, $to ) {
	global $wp_filesystem, $_old_files, $_old_requests_files, $_new_bundled_files, $wpdb;

	/*
	 * Give core update script an additional 300 seconds (5 minutes)
	 * to finish updating large files when running on slower servers.
	 */
	if ( function_exists( 'set_time_limit' ) ) {
		set_time_limit( 300 );
	}

	/*
	 * Merge the old Requests files and directories into the `$_old_files`.
	 * Then preload these Requests files first, before the files are deleted
	 * and replaced to ensure the code is in memory if needed.
	 */
	$_old_files = array_merge( $_old_files, array_values( $_old_requests_files ) );
	_preload_old_requests_classes_and_interfaces( $to );

	/**
	 * Filters feedback messages displayed during the core update process.
	 *
	 * The filter is first evaluated after the zip file for the latest version
	 * has been downloaded and unzipped. It is evaluated five more times during
	 * the process:
	 *
	 * 1. Before WordPress begins the core upgrade process.
	 * 2. Before Maintenance Mode is enabled.
	 * 3. Before WordPress begins copying over the necessary files.
	 * 4. Before Maintenance Mode is disabled.
	 * 5. Before the database is upgraded.
	 *
	 * @since 2.5.0
	 *
	 * @param string $feedback The core update feedback messages.
	 */
	apply_filters( 'update_feedback', __( 'Verifying the unpacked files&#8230;' ) );

	// Confidence check the unzipped distribution.
	$distro = '';
	$roots  = array( '/finpress/', '/finpress-mu/' );

	foreach ( $roots as $root ) {
		if ( $wp_filesystem->exists( $from . $root . 'readme.html' )
			&& $wp_filesystem->exists( $from . $root . 'fp-includes/version.php' )
		) {
			$distro = $root;
			break;
		}
	}

	if ( ! $distro ) {
		$wp_filesystem->delete( $from, true );

		return new FP_Error( 'insane_distro', __( 'The update could not be unpacked' ) );
	}

	/*
	 * Import $wp_version, $required_php_version, $required_php_extensions, and $required_mysql_version from the new version.
	 * DO NOT globalize any variables imported from `version-current.php` in this function.
	 *
	 * BC Note: $wp_filesystem->wp_content_dir() returned unslashed pre-2.8.
	 */
	$versions_file = trailingslashit( $wp_filesystem->wp_content_dir() ) . 'upgrade/version-current.php';

	if ( ! $wp_filesystem->copy( $from . $distro . 'fp-includes/version.php', $versions_file ) ) {
		$wp_filesystem->delete( $from, true );

		return new FP_Error(
			'copy_failed_for_version_file',
			__( 'The update cannot be installed because some files could not be copied. This is usually due to inconsistent file permissions.' ),
			'fp-includes/version.php'
		);
	}

	$wp_filesystem->chmod( $versions_file, FS_CHMOD_FILE );

	/*
	 * `wp_opcache_invalidate()` only exists in WordPress 5.5 or later,
	 * so don't run it when upgrading from older versions.
	 */
	if ( function_exists( 'wp_opcache_invalidate' ) ) {
		wp_opcache_invalidate( $versions_file );
	}

	require FP_CONTENT_DIR . '/upgrade/version-current.php';
	$wp_filesystem->delete( $versions_file );

	$php_version    = PHP_VERSION;
	$mysql_version  = $wpdb->db_version();
	$old_wp_version = $GLOBALS['wp_version']; // The version of WordPress we're updating from.
	/*
	 * Note: str_contains() is not used here, as this file is included
	 * when updating from older WordPress versions, in which case
	 * the polyfills from fp-includes/compat.php may not be available.
	 */
	$development_build = ( false !== strpos( $old_wp_version . $wp_version, '-' ) ); // A dash in the version indicates a development release.
	$php_compat        = version_compare( $php_version, $required_php_version, '>=' );

	if ( file_exists( FP_CONTENT_DIR . '/db.php' ) && empty( $wpdb->is_mysql ) ) {
		$mysql_compat = true;
	} else {
		$mysql_compat = version_compare( $mysql_version, $required_mysql_version, '>=' );
	}

	if ( ! $mysql_compat || ! $php_compat ) {
		$wp_filesystem->delete( $from, true );
	}

	$php_update_message = '';

	if ( function_exists( 'wp_get_update_php_url' ) ) {
		$php_update_message = '</p><p>' . sprintf(
			/* translators: %s: URL to Update PHP page. */
			__( '<a href="%s">Learn more about updating PHP</a>.' ),
			esc_url( wp_get_update_php_url() )
		);

		if ( function_exists( 'wp_get_update_php_annotation' ) ) {
			$annotation = wp_get_update_php_annotation();

			if ( $annotation ) {
				$php_update_message .= '</p><p><em>' . $annotation . '</em>';
			}
		}
	}

	if ( ! $mysql_compat && ! $php_compat ) {
		return new FP_Error(
			'php_mysql_not_compatible',
			sprintf(
				/* translators: 1: WordPress version number, 2: Minimum required PHP version number, 3: Minimum required MySQL version number, 4: Current PHP version number, 5: Current MySQL version number. */
				__( 'The update cannot be installed because WordPress %1$s requires PHP version %2$s or higher and MySQL version %3$s or higher. You are running PHP version %4$s and MySQL version %5$s.' ),
				$wp_version,
				$required_php_version,
				$required_mysql_version,
				$php_version,
				$mysql_version
			) . $php_update_message
		);
	} elseif ( ! $php_compat ) {
		return new FP_Error(
			'php_not_compatible',
			sprintf(
				/* translators: 1: WordPress version number, 2: Minimum required PHP version number, 3: Current PHP version number. */
				__( 'The update cannot be installed because WordPress %1$s requires PHP version %2$s or higher. You are running version %3$s.' ),
				$wp_version,
				$required_php_version,
				$php_version
			) . $php_update_message
		);
	} elseif ( ! $mysql_compat ) {
		return new FP_Error(
			'mysql_not_compatible',
			sprintf(
				/* translators: 1: WordPress version number, 2: Minimum required MySQL version number, 3: Current MySQL version number. */
				__( 'The update cannot be installed because WordPress %1$s requires MySQL version %2$s or higher. You are running version %3$s.' ),
				$wp_version,
				$required_mysql_version,
				$mysql_version
			)
		);
	}

	if ( isset( $required_php_extensions ) && is_array( $required_php_extensions ) ) {
		$missing_extensions = new FP_Error();

		foreach ( $required_php_extensions as $extension ) {
			if ( extension_loaded( $extension ) ) {
				continue;
			}

			$missing_extensions->add(
				"php_not_compatible_{$extension}",
				sprintf(
					/* translators: 1: WordPress version number, 2: The PHP extension name needed. */
					__( 'The update cannot be installed because WordPress %1$s requires the %2$s PHP extension.' ),
					$wp_version,
					$extension
				)
			);
		}

		// Add a warning when required PHP extensions are missing.
		if ( ! empty( $missing_extensions->errors ) ) {
			return $missing_extensions;
		}
	}

	/** This filter is documented in fp-admin/includes/update-core.php */
	apply_filters( 'update_feedback', __( 'Preparing to install the latest version&#8230;' ) );

	/*
	 * Don't copy fp-content, we'll deal with that below.
	 * We also copy version.php last so failed updates report their old version.
	 */
	$skip              = array( 'fp-content', 'fp-includes/version.php' );
	$check_is_writable = array();

	// Check to see which files don't really need updating - only available for 3.7 and higher.
	if ( function_exists( 'get_core_checksums' ) ) {
		// Find the local version of the working directory.
		$working_dir_local = FP_CONTENT_DIR . '/upgrade/' . basename( $from ) . $distro;

		$checksums = get_core_checksums( $wp_version, isset( $wp_local_package ) ? $wp_local_package : 'en_US' );

		if ( is_array( $checksums ) && isset( $checksums[ $wp_version ] ) ) {
			$checksums = $checksums[ $wp_version ]; // Compat code for 3.7-beta2.
		}

		if ( is_array( $checksums ) ) {
			foreach ( $checksums as $file => $checksum ) {
				/*
				 * Note: str_starts_with() is not used here, as this file is included
				 * when updating from older WordPress versions, in which case
				 * the polyfills from fp-includes/compat.php may not be available.
				 */
				if ( 'fp-content' === substr( $file, 0, 10 ) ) {
					continue;
				}

				if ( ! file_exists( ABSPATH . $file ) ) {
					continue;
				}

				if ( ! file_exists( $working_dir_local . $file ) ) {
					continue;
				}

				if ( '.' === dirname( $file )
					&& in_array( pathinfo( $file, PATHINFO_EXTENSION ), array( 'html', 'txt' ), true )
				) {
					continue;
				}

				if ( md5_file( ABSPATH . $file ) === $checksum ) {
					$skip[] = $file;
				} else {
					$check_is_writable[ $file ] = ABSPATH . $file;
				}
			}
		}
	}

	// If we're using the direct method, we can predict write failures that are due to permissions.
	if ( $check_is_writable && 'direct' === $wp_filesystem->method ) {
		$files_writable = array_filter( $check_is_writable, array( $wp_filesystem, 'is_writable' ) );

		if ( $files_writable !== $check_is_writable ) {
			$files_not_writable = array_diff_key( $check_is_writable, $files_writable );

			foreach ( $files_not_writable as $relative_file_not_writable => $file_not_writable ) {
				// If the writable check failed, chmod file to 0644 and try again, same as copy_dir().
				$wp_filesystem->chmod( $file_not_writable, FS_CHMOD_FILE );

				if ( $wp_filesystem->is_writable( $file_not_writable ) ) {
					unset( $files_not_writable[ $relative_file_not_writable ] );
				}
			}

			// Store package-relative paths (the key) of non-writable files in the FP_Error object.
			$error_data = version_compare( $old_wp_version, '3.7-beta2', '>' ) ? array_keys( $files_not_writable ) : '';

			if ( $files_not_writable ) {
				return new FP_Error(
					'files_not_writable',
					__( 'The update cannot be installed because your site is unable to copy some files. This is usually due to inconsistent file permissions.' ),
					implode( ', ', $error_data )
				);
			}
		}
	}

	/** This filter is documented in fp-admin/includes/update-core.php */
	apply_filters( 'update_feedback', __( 'Enabling Maintenance mode&#8230;' ) );

	// Create maintenance file to signal that we are upgrading.
	$maintenance_string = '<?php $upgrading = ' . time() . '; ?>';
	$maintenance_file   = $to . '.maintenance';
	$wp_filesystem->delete( $maintenance_file );
	$wp_filesystem->put_contents( $maintenance_file, $maintenance_string, FS_CHMOD_FILE );

	/** This filter is documented in fp-admin/includes/update-core.php */
	apply_filters( 'update_feedback', __( 'Copying the required files&#8230;' ) );

	// Copy new versions of FP files into place.
	$result = copy_dir( $from . $distro, $to, $skip );

	if ( is_wp_error( $result ) ) {
		$result = new FP_Error(
			$result->get_error_code(),
			$result->get_error_message(),
			substr( $result->get_error_data(), strlen( $to ) )
		);
	}

	// Since we know the core files have copied over, we can now copy the version file.
	if ( ! is_wp_error( $result ) ) {
		if ( ! $wp_filesystem->copy( $from . $distro . 'fp-includes/version.php', $to . 'fp-includes/version.php', true /* overwrite */ ) ) {
			$wp_filesystem->delete( $from, true );
			$result = new FP_Error(
				'copy_failed_for_version_file',
				__( 'The update cannot be installed because your site is unable to copy some files. This is usually due to inconsistent file permissions.' ),
				'fp-includes/version.php'
			);
		}

		$wp_filesystem->chmod( $to . 'fp-includes/version.php', FS_CHMOD_FILE );

		/*
		 * `wp_opcache_invalidate()` only exists in WordPress 5.5 or later,
		 * so don't run it when upgrading from older versions.
		 */
		if ( function_exists( 'wp_opcache_invalidate' ) ) {
			wp_opcache_invalidate( $to . 'fp-includes/version.php' );
		}
	}

	// Check to make sure everything copied correctly, ignoring the contents of fp-content.
	$skip   = array( 'fp-content' );
	$failed = array();

	if ( isset( $checksums ) && is_array( $checksums ) ) {
		foreach ( $checksums as $file => $checksum ) {
			/*
			 * Note: str_starts_with() is not used here, as this file is included
			 * when updating from older WordPress versions, in which case
			 * the polyfills from fp-includes/compat.php may not be available.
			 */
			if ( 'fp-content' === substr( $file, 0, 10 ) ) {
				continue;
			}

			if ( ! file_exists( $working_dir_local . $file ) ) {
				continue;
			}

			if ( '.' === dirname( $file )
				&& in_array( pathinfo( $file, PATHINFO_EXTENSION ), array( 'html', 'txt' ), true )
			) {
				$skip[] = $file;
				continue;
			}

			if ( file_exists( ABSPATH . $file ) && md5_file( ABSPATH . $file ) === $checksum ) {
				$skip[] = $file;
			} else {
				$failed[] = $file;
			}
		}
	}

	// Some files didn't copy properly.
	if ( ! empty( $failed ) ) {
		$total_size = 0;

		foreach ( $failed as $file ) {
			if ( file_exists( $working_dir_local . $file ) ) {
				$total_size += filesize( $working_dir_local . $file );
			}
		}

		/*
		 * If we don't have enough free space, it isn't worth trying again.
		 * Unlikely to be hit due to the check in unzip_file().
		 */
		$available_space = function_exists( 'disk_free_space' ) ? @disk_free_space( ABSPATH ) : false;

		if ( $available_space && $total_size >= $available_space ) {
			$result = new FP_Error( 'disk_full', __( 'There is not enough free disk space to complete the update.' ) );
		} else {
			$result = copy_dir( $from . $distro, $to, $skip );

			if ( is_wp_error( $result ) ) {
				$result = new FP_Error(
					$result->get_error_code() . '_retry',
					$result->get_error_message(),
					substr( $result->get_error_data(), strlen( $to ) )
				);
			}
		}
	}

	/*
	 * Custom content directory needs updating now.
	 * Copy languages.
	 */
	if ( ! is_wp_error( $result ) && $wp_filesystem->is_dir( $from . $distro . 'fp-content/languages' ) ) {
		if ( FP_LANG_DIR !== ABSPATH . FPINC . '/languages' || @is_dir( FP_LANG_DIR ) ) {
			$lang_dir = FP_LANG_DIR;
		} else {
			$lang_dir = FP_CONTENT_DIR . '/languages';
		}
		/*
		 * Note: str_starts_with() is not used here, as this file is included
		 * when updating from older WordPress versions, in which case
		 * the polyfills from fp-includes/compat.php may not be available.
		 */
		// Check if the language directory exists first.
		if ( ! @is_dir( $lang_dir ) && 0 === strpos( $lang_dir, ABSPATH ) ) {
			// If it's within the ABSPATH we can handle it here, otherwise they're out of luck.
			$wp_filesystem->mkdir( $to . str_replace( ABSPATH, '', $lang_dir ), FS_CHMOD_DIR );
			clearstatcache(); // For FTP, need to clear the stat cache.
		}

		if ( @is_dir( $lang_dir ) ) {
			$wp_lang_dir = $wp_filesystem->find_folder( $lang_dir );

			if ( $wp_lang_dir ) {
				$result = copy_dir( $from . $distro . 'fp-content/languages/', $wp_lang_dir );

				if ( is_wp_error( $result ) ) {
					$result = new FP_Error(
						$result->get_error_code() . '_languages',
						$result->get_error_message(),
						substr( $result->get_error_data(), strlen( $wp_lang_dir ) )
					);
				}
			}
		}
	}

	/** This filter is documented in fp-admin/includes/update-core.php */
	apply_filters( 'update_feedback', __( 'Disabling Maintenance mode&#8230;' ) );

	// Remove maintenance file, we're done with potential site-breaking changes.
	$wp_filesystem->delete( $maintenance_file );

	/*
	 * 3.5 -> 3.5+ - an empty twentytwelve directory was created upon upgrade to 3.5 for some users,
	 * preventing installation of Twenty Twelve.
	 */
	if ( '3.5' === $old_wp_version ) {
		if ( is_dir( FP_CONTENT_DIR . '/themes/twentytwelve' )
			&& ! file_exists( FP_CONTENT_DIR . '/themes/twentytwelve/style.css' )
		) {
			$wp_filesystem->delete( $wp_filesystem->wp_themes_dir() . 'twentytwelve/' );
		}
	}

	/*
	 * Copy new bundled plugins & themes.
	 * This gives us the ability to install new plugins & themes bundled with
	 * future versions of WordPress whilst avoiding the re-install upon upgrade issue.
	 * $development_build controls us overwriting bundled themes and plugins when a non-stable release is being updated.
	 */
	if ( ! is_wp_error( $result )
		&& ( ! defined( 'CORE_UPGRADE_SKIP_NEW_BUNDLED' ) || ! CORE_UPGRADE_SKIP_NEW_BUNDLED )
	) {
		foreach ( (array) $_new_bundled_files as $file => $introduced_version ) {
			// If a $development_build or if $introduced version is greater than what the site was previously running.
			if ( $development_build || version_compare( $introduced_version, $old_wp_version, '>' ) ) {
				$directory = ( '/' === $file[ strlen( $file ) - 1 ] );

				list( $type, $filename ) = explode( '/', $file, 2 );

				// Check to see if the bundled items exist before attempting to copy them.
				if ( ! $wp_filesystem->exists( $from . $distro . 'fp-content/' . $file ) ) {
					continue;
				}

				if ( 'plugins' === $type ) {
					$dest = $wp_filesystem->wp_plugins_dir();
				} elseif ( 'themes' === $type ) {
					// Back-compat, ::wp_themes_dir() did not return trailingslash'd pre-3.2.
					$dest = trailingslashit( $wp_filesystem->wp_themes_dir() );
				} else {
					continue;
				}

				if ( ! $directory ) {
					if ( ! $development_build && $wp_filesystem->exists( $dest . $filename ) ) {
						continue;
					}

					if ( ! $wp_filesystem->copy( $from . $distro . 'fp-content/' . $file, $dest . $filename, FS_CHMOD_FILE ) ) {
						$result = new FP_Error( "copy_failed_for_new_bundled_$type", __( 'Could not copy file.' ), $dest . $filename );
					}
				} else {
					if ( ! $development_build && $wp_filesystem->is_dir( $dest . $filename ) ) {
						continue;
					}

					$wp_filesystem->mkdir( $dest . $filename, FS_CHMOD_DIR );
					$_result = copy_dir( $from . $distro . 'fp-content/' . $file, $dest . $filename );

					/*
					 * If an error occurs partway through this final step,
					 * keep the error flowing through, but keep the process going.
					 */
					if ( is_wp_error( $_result ) ) {
						if ( ! is_wp_error( $result ) ) {
							$result = new FP_Error();
						}

						$result->add(
							$_result->get_error_code() . "_$type",
							$_result->get_error_message(),
							substr( $_result->get_error_data(), strlen( $dest ) )
						);
					}
				}
			}
		} // End foreach.
	}

	// Handle $result error from the above blocks.
	if ( is_wp_error( $result ) ) {
		$wp_filesystem->delete( $from, true );

		return $result;
	}

	// Remove old files.
	foreach ( $_old_files as $old_file ) {
		$old_file = $to . $old_file;

		if ( ! $wp_filesystem->exists( $old_file ) ) {
			continue;
		}

		// If the file isn't deleted, try writing an empty string to the file instead.
		if ( ! $wp_filesystem->delete( $old_file, true ) && $wp_filesystem->is_file( $old_file ) ) {
			$wp_filesystem->put_contents( $old_file, '' );
		}
	}

	// Remove any Genericons example.html's from the filesystem.
	_upgrade_422_remove_genericons();

	// Deactivate the REST API plugin if its version is 2.0 Beta 4 or lower.
	_upgrade_440_force_deactivate_incompatible_plugins();

	// Deactivate incompatible plugins.
	_upgrade_core_deactivate_incompatible_plugins();

	// Upgrade DB with separate request.
	/** This filter is documented in fp-admin/includes/update-core.php */
	apply_filters( 'update_feedback', __( 'Upgrading database&#8230;' ) );

	$db_upgrade_url = admin_url( 'upgrade.php?step=upgrade_db' );
	wp_remote_post( $db_upgrade_url, array( 'timeout' => 60 ) );

	// Clear the cache to prevent an update_option() from saving a stale db_version to the cache.
	wp_cache_flush();
	// Not all cache back ends listen to 'flush'.
	wp_cache_delete( 'alloptions', 'options' );

	// Remove working directory.
	$wp_filesystem->delete( $from, true );

	// Force refresh of update information.
	if ( function_exists( 'delete_site_transient' ) ) {
		delete_site_transient( 'update_core' );
	} else {
		delete_option( 'update_core' );
	}

	/**
	 * Fires after WordPress core has been successfully updated.
	 *
	 * @since 3.3.0
	 *
	 * @param string $wp_version The current WordPress version.
	 */
	do_action( '_core_updated_successfully', $wp_version );

	// Clear the option that blocks auto-updates after failures, now that we've been successful.
	if ( function_exists( 'delete_site_option' ) ) {
		delete_site_option( 'auto_core_update_failed' );
	}

	return $wp_version;
}

/**
 * Preloads old Requests classes and interfaces.
 *
 * This function preloads the old Requests code into memory before the
 * upgrade process deletes the files. Why? Requests code is loaded into
 * memory via an autoloader, meaning when a class or interface is needed
 * If a request is in process, Requests could attempt to access code. If
 * the file is not there, a fatal error could occur. If the file was
 * replaced, the new code is not compatible with the old, resulting in
 * a fatal error. Preloading ensures the code is in memory before the
 * code is updated.
 *
 * @since 6.2.0
 *
 * @global string[]           $_old_requests_files Requests files to be preloaded.
 * @global FP_Filesystem_Base $wp_filesystem       WordPress filesystem subclass.
 * @global string             $wp_version          The WordPress version string.
 *
 * @param string $to Path to old WordPress installation.
 */
function _preload_old_requests_classes_and_interfaces( $to ) {
	global $_old_requests_files, $wp_filesystem, $wp_version;

	/*
	 * Requests was introduced in WordPress 4.6.
	 *
	 * Skip preloading if the website was previously using
	 * an earlier version of WordPress.
	 */
	if ( version_compare( $wp_version, '4.6', '<' ) ) {
		return;
	}

	if ( ! defined( 'REQUESTS_SILENCE_PSR0_DEPRECATIONS' ) ) {
		define( 'REQUESTS_SILENCE_PSR0_DEPRECATIONS', true );
	}

	foreach ( $_old_requests_files as $name => $file ) {
		// Skip files that aren't interfaces or classes.
		if ( is_int( $name ) ) {
			continue;
		}

		// Skip if it's already loaded.
		if ( class_exists( $name ) || interface_exists( $name ) ) {
			continue;
		}

		// Skip if the file is missing.
		if ( ! $wp_filesystem->is_file( $to . $file ) ) {
			continue;
		}

		require_once $to . $file;
	}
}

/**
 * Redirect to the About WordPress page after a successful upgrade.
 *
 * This function is only needed when the existing installation is older than 3.4.0.
 *
 * @since 3.3.0
 *
 * @global string $wp_version The WordPress version string.
 * @global string $pagenow    The filename of the current screen.
 * @global string $action
 *
 * @param string $new_version
 */
function _redirect_to_about_finpress( $new_version ) {
	global $wp_version, $pagenow, $action;

	if ( version_compare( $wp_version, '3.4-RC1', '>=' ) ) {
		return;
	}

	// Ensure we only run this on the update-core.php page. The Core_Upgrader may be used in other contexts.
	if ( 'update-core.php' !== $pagenow ) {
		return;
	}

	if ( 'do-core-upgrade' !== $action && 'do-core-reinstall' !== $action ) {
		return;
	}

	// Load the updated default text localization domain for new strings.
	load_default_textdomain();

	// See do_core_upgrade().
	show_message( __( 'WordPress updated successfully.' ) );

	// self_admin_url() won't exist when upgrading from <= 3.0, so relative URLs are intentional.
	show_message(
		'<span class="hide-if-no-js">' . sprintf(
			/* translators: 1: WordPress version, 2: URL to About screen. */
			__( 'Welcome to WordPress %1$s. You will be redirected to the About WordPress screen. If not, click <a href="%2$s">here</a>.' ),
			$new_version,
			'about.php?updated'
		) . '</span>'
	);
	show_message(
		'<span class="hide-if-js">' . sprintf(
			/* translators: 1: WordPress version, 2: URL to About screen. */
			__( 'Welcome to WordPress %1$s. <a href="%2$s">Learn more</a>.' ),
			$new_version,
			'about.php?updated'
		) . '</span>'
	);
	echo '</div>';
	?>
<script type="text/javascript">
window.location = 'about.php?updated';
</script>
	<?php

	// Include admin-footer.php and exit.
	require_once ABSPATH . 'fp-admin/admin-footer.php';
	exit;
}

/**
 * Cleans up Genericons example files.
 *
 * @since 4.2.2
 *
 * @global string[]           $wp_theme_directories
 * @global FP_Filesystem_Base $wp_filesystem
 */
function _upgrade_422_remove_genericons() {
	global $wp_theme_directories, $wp_filesystem;

	// A list of the affected files using the filesystem absolute paths.
	$affected_files = array();

	// Themes.
	foreach ( $wp_theme_directories as $directory ) {
		$affected_theme_files = _upgrade_422_find_genericons_files_in_folder( $directory );
		$affected_files       = array_merge( $affected_files, $affected_theme_files );
	}

	// Plugins.
	$affected_plugin_files = _upgrade_422_find_genericons_files_in_folder( FP_PLUGIN_DIR );
	$affected_files        = array_merge( $affected_files, $affected_plugin_files );

	foreach ( $affected_files as $file ) {
		$gen_dir = $wp_filesystem->find_folder( trailingslashit( dirname( $file ) ) );

		if ( empty( $gen_dir ) ) {
			continue;
		}

		// The path when the file is accessed via FP_Filesystem may differ in the case of FTP.
		$remote_file = $gen_dir . basename( $file );

		if ( ! $wp_filesystem->exists( $remote_file ) ) {
			continue;
		}

		if ( ! $wp_filesystem->delete( $remote_file, false, 'f' ) ) {
			$wp_filesystem->put_contents( $remote_file, '' );
		}
	}
}

/**
 * Recursively find Genericons example files in a given folder.
 *
 * @ignore
 * @since 4.2.2
 *
 * @param string $directory Directory path. Expects trailingslashed.
 * @return string[]
 */
function _upgrade_422_find_genericons_files_in_folder( $directory ) {
	$directory = trailingslashit( $directory );
	$files     = array();

	if ( file_exists( "{$directory}example.html" )
		/*
		 * Note: str_contains() is not used here, as this file is included
		 * when updating from older WordPress versions, in which case
		 * the polyfills from fp-includes/compat.php may not be available.
		 */
		&& false !== strpos( file_get_contents( "{$directory}example.html" ), '<title>Genericons</title>' )
	) {
		$files[] = "{$directory}example.html";
	}

	$dirs = glob( $directory . '*', GLOB_ONLYDIR );
	$dirs = array_filter(
		$dirs,
		static function ( $dir ) {
			/*
			 * Skip any node_modules directories.
			 *
			 * Note: str_contains() is not used here, as this file is included
			 * when updating from older WordPress versions, in which case
			 * the polyfills from fp-includes/compat.php may not be available.
			 */
			return false === strpos( $dir, 'node_modules' );
		}
	);

	if ( $dirs ) {
		foreach ( $dirs as $dir ) {
			$files = array_merge( $files, _upgrade_422_find_genericons_files_in_folder( $dir ) );
		}
	}

	return $files;
}

/**
 * @ignore
 * @since 4.4.0
 */
function _upgrade_440_force_deactivate_incompatible_plugins() {
	if ( defined( 'REST_API_VERSION' ) && version_compare( REST_API_VERSION, '2.0-beta4', '<=' ) ) {
		deactivate_plugins( array( 'rest-api/plugin.php' ), true );
	}
}

/**
 * @access private
 * @ignore
 * @since 5.8.0
 * @since 5.9.0 The minimum compatible version of Gutenberg is 11.9.
 * @since 6.1.1 The minimum compatible version of Gutenberg is 14.1.
 * @since 6.4.0 The minimum compatible version of Gutenberg is 16.5.
 * @since 6.5.0 The minimum compatible version of Gutenberg is 17.6.
 */
function _upgrade_core_deactivate_incompatible_plugins() {
	if ( defined( 'GUTENBERG_VERSION' ) && version_compare( GUTENBERG_VERSION, '17.6', '<' ) ) {
		$deactivated_gutenberg['gutenberg'] = array(
			'plugin_name'         => 'Gutenberg',
			'version_deactivated' => GUTENBERG_VERSION,
			'version_compatible'  => '17.6',
		);
		if ( is_plugin_active_for_network( 'gutenberg/gutenberg.php' ) ) {
			$deactivated_plugins = get_site_option( 'wp_force_deactivated_plugins', array() );
			$deactivated_plugins = array_merge( $deactivated_plugins, $deactivated_gutenberg );
			update_site_option( 'wp_force_deactivated_plugins', $deactivated_plugins );
		} else {
			$deactivated_plugins = get_option( 'wp_force_deactivated_plugins', array() );
			$deactivated_plugins = array_merge( $deactivated_plugins, $deactivated_gutenberg );
			update_option( 'wp_force_deactivated_plugins', $deactivated_plugins, false );
		}
		deactivate_plugins( array( 'gutenberg/gutenberg.php' ), true );
	}
}
