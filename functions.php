<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 */
if ( ! isset( $content_width ) ) {
        $content_width = 660;
}

/**
 * JBST 4 only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
        require get_template_directory() . '/parts/back-compat.php';
}

// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// Add and apply the wp_render_title_tag_filter filter
require_once(get_template_directory().'/functions/page-title.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 
require_once(get_template_directory().'/functions/menu-walkers.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php');

// Adds Schema.org
require_once(get_template_directory().'/functions/scheme.php'); 

// Customize the WordPress login menu
require_once(get_template_directory().'/functions/login.php');
