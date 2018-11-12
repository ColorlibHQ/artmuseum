<?php 
/**
 * @Packge 	   : Art Museum
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 *
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'artmuseum_preloader', 'artmuseum_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'artmuseum_header', 'artmuseum_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'artmuseum_footer', 'artmuseum_footer_area', 10 );
add_action( 'artmuseum_footer', 'artmuseum_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'artmuseum_wrp_start', 'artmuseum_wrp_start_cb', 10 );
add_action( 'artmuseum_wrp_end', 'artmuseum_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'artmuseum_blog_col_start', 'artmuseum_blog_col_start_cb', 10 );
add_action( 'artmuseum_blog_col_end', 'artmuseum_blog_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'artmuseum_blog_posts_thumb', 'artmuseum_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'artmuseum_blog_posts_title', 'artmuseum_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'artmuseum_blog_posts_meta', 'artmuseum_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'artmuseum_blog_posts_bottom_meta', 'artmuseum_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'artmuseum_blog_posts_excerpt', 'artmuseum_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'artmuseum_blog_posts_content', 'artmuseum_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'artmuseum_blog_sidebar', 'artmuseum_blog_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'artmuseum_blog_posts_share', 'artmuseum_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'artmuseum_blog_single_meta', 'artmuseum_blog_single_meta_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'artmuseum_page_content', 'artmuseum_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'artmuseum_fof', 'artmuseum_fof_cb', 10 );
