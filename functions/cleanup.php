<?php

// Fire all our initial functions at the start
add_action('after_setup_theme','jbst4_start', 16);

function jbst4_start() {

    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'jbst4_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
    add_action('wp_head', 'jbst4_remove_recent_comments_style', 1);
    // clean up gallery output in wp
    add_filter('gallery_style', 'jbst4_gallery_style');

    // launching this stuff after theme setup
    jbst4_theme_support();

    // adding sidebars to Wordpress
    add_action( 'widgets_init', 'jbst4_register_sidebars' );
    // cleaning up excerpt
    add_filter('excerpt_more', 'jbst4_excerpt_more');

} /* end joints start */

// Remove injected CSS for recent comments widget
function jbst4_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// Remove injected CSS from recent comments widget
function jbst4_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// Remove injected CSS from gallery
function jbst4_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

// This removes the annoying […] to a Read More link
function jbst4_excerpt_more($more) {
	global $post;
	// edit here if you like
return '...  <a class="excerpt-read-more" href="'. esc_url( get_permalink($post->ID) ). '" title="'. __('Read', 'jbst-4') . get_the_title($post->ID).'">'. __('Read more &raquo;', 'jbst-4') .'</a>';
}

//This is a modified the_author_posts_link() which just returns the link. This is necessary to allow usage of the usual l10n process with printf()
function jbst4_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s', 'jbst-4' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}
