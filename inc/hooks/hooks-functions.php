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


// Header menu hook function
if( ! function_exists( 'artmuseum_header_cb' ) ) {
	function artmuseum_header_cb() {
		if( ! is_404() ) {
			$header = get_post_meta( absint( get_the_ID() ) ,'_artmuseum_builderpage_header_show', true );									
			get_template_part( 'templates/header', 'nav' );

			if( ! is_page_template( 'template-builder.php' ) || $header == 'show'  ) {
				get_template_part( 'templates/header', 'bottom' );
			}
			
		}
		
	}
}

// Footer area hook function
if( ! function_exists( 'artmuseum_footer_area' ) ) {
	function artmuseum_footer_area() {

		$footerWidget = artmuseum_opt( 'artmuseum-widget-toggle-settings' );

		$noWidgets = ! empty( $footerWidget ) ? '' : ' no-widgets';

		if( ! is_404() ) {
			echo '<footer class="footer-area'.esc_attr( $noWidgets ).' section-gap"><div class="container">';

			// Footer widget

			if( $footerWidget ) {
				get_template_part( 'templates/footer', 'widgets' );
			}
			
			// Footer bottom
			get_template_part( 'templates/footer', 'bottom' );	

			echo '</div></footer>';
			
		}
	}
}

// Footer back to top hook function
if( ! function_exists( 'artmuseum_back_to_top' ) ) {
	function artmuseum_back_to_top() {
		$opt = get_theme_mod( 'artmuseum-gototop-toggle-settings' );
					
		if( $opt ):
			?>
			<div class="btn-back-to-top bg0-hov" id="myBtn">
				<span class="symbol-btn-back-to-top">
					<i class="fa fa-angle-double-up" aria-hidden="true"></i>
				</span>
			</div>
			<?php
		endif;
	}
}

// Blog, single, page, search, archive pages wrapper start hook function.
if( ! function_exists( 'artmuseum_wrp_start_cb' ) ) {
	function artmuseum_wrp_start_cb() {
		echo '<section class="blog-posts-area section-gap"><div class="container"><div class="row">';
	}
}
// Blog, single, page, search, archive pages wrapper end hook function.
if( ! function_exists( 'artmuseum_wrp_end_cb' ) ) {
	function artmuseum_wrp_end_cb() {
		echo '</div></div></section>';
	}
}
// Blog, single, search, archive pages column start hook function.
if( ! function_exists( 'artmuseum_blog_col_start_cb' ) ) {
	function artmuseum_blog_col_start_cb() {
		
		$sidebarOpt = artmuseum_sidebar_opt();

		//
		if( ! is_page() ) {

			$pullRight  = artmuseum_pull_right( $sidebarOpt , '3' );

			if( $sidebarOpt != '1' ) {
				$col = '8'.$pullRight;
			} else {
				$col = '10 offset-lg-1';
			}

		} else {
			$col = '8';
		}
		
		echo '<div class="col-lg-'.esc_attr( $col ).' post-list blog-post-list">';
	}
}
// Blog, single, search, archive pages column end hook function.
if( ! function_exists( 'artmuseum_blog_col_end_cb' ) ) {
	function artmuseum_blog_col_end_cb() {
		echo '</div>';
	}
}

// Blog post thumbnail hook function.
if( ! function_exists( 'artmuseum_blog_posts_thumb_cb' ) ) {
	function artmuseum_blog_posts_thumb_cb() {

		// Thumbnail Show
		if( has_post_thumbnail() ) {
					
			if( !is_single() ) {
			
				$html = '';
				$html .= artmuseum_img_tag(
					array(
						'url' => esc_url( get_the_post_thumbnail_url() )
					)
				);
			
			} else {
				
				$html = '';
				$html .= artmuseum_img_tag(
					array(
						'url' => esc_url( get_the_post_thumbnail_url() )
					)
				);

			}

			echo wp_kses_post( $html );
			
		}
		// Thumbnail check and video and audio thumb show
		if( ! is_single() && ! has_post_thumbnail() ) {
			$html = '';
			if( has_post_format( array( 'video' ) ) ) {
				
				$html .= '<div class="post--img blog-post-video">';
				$html .= artmuseum_embedded_media( array( 'video', 'iframe' ) );
				$html .= '</div>';

			} else {

				if( has_post_format( array( 'audio' ) ) ) {
					
					$html .= '<div class="post--img blog-post-audio">';
					$html .= artmuseum_embedded_media( array( 'audio', 'iframe' ) );
					$html .= '</div>';
				}
			}
			
			echo apply_filters( 'artmuseum_audio_embedded_media', $html );

		}
	}
}

// Blog post title hook function.
if( ! function_exists( 'artmuseum_blog_posts_title_cb' ) ) {
	function artmuseum_blog_posts_title_cb() {
		if( get_the_title() ) {
			
			if( ! is_single() ) {
				echo '<a href="'.esc_url( get_the_permalink() ).'"><h1>'.esc_html( get_the_title() ).'</h1></a>';
			} else {
				echo '<h1>'.esc_html( get_the_title() ).'</h1>';
			}

		}
	}
}

// Blog posts meta hook function.
if( ! function_exists( 'artmuseum_blog_posts_meta_cb' ) ) {
	function artmuseum_blog_posts_meta_cb() {
		$tags = artmuseum_post_tags();
		if( $tags ):
		?>
		<ul class="tags">
			<?php 
			echo wp_kses_post( $tags );
			?>
		</ul>
		<?php
		endif;
	}
}

// Blog posts meta hook function.
if( ! function_exists( 'artmuseum_blog_posts_bottom_meta_cb' ) ) {
	function artmuseum_blog_posts_bottom_meta_cb() {
		?>
		<div class="bottom-meta">
			<div class="user-details row align-items-center">
				<div class="comment-wrap col-lg-6">
					<ul>
						<?php 
						if( artmuseum_opt('artmuseum-blog-like-toggle') && function_exists('get_simple_likes_button') ) {

							echo '<li>'.get_simple_likes_button( absint( get_the_ID() ) ).'</li>';
						}
						?>
						<li><?php echo artmuseum_posted_comments(); ?></li>
					</ul>
				</div>
				<?php 
				if( artmuseum_opt( 'artmuseum-blog-social-share-toggle' ) && function_exists( 'artmuseum_social_sharing_buttons' ) ) {
					echo '<div class="social-wrap col-lg-6">'.artmuseum_social_sharing_buttons().'</div>';
				}
				?>					
			</div>
			<?php 
			$cats = artmuseum_post_cats();
			if( $cats ) {
				echo '<div class="category">' . $cats . '</div>';
			}
			?>
		</div>
		<?php
	}
}

// Blog posts excerpt hook function.
if( ! function_exists( 'artmuseum_blog_posts_excerpt_cb' ) ) {
	function artmuseum_blog_posts_excerpt_cb() {
		?>
		<div class="p-b-12">
			<?php 
			// Post excerpt
			echo artmuseum_excerpt_length( esc_html( artmuseum_opt('artmuseum_post_excerpt') ) );

			// Link Pages
			artmuseum_link_pages();
			?>
		</div>	
		<a href="<?php the_permalink(); ?>" class="continue-read-btn s-text20">
			<?php esc_html_e( 'Continue Reading', 'art-museum' ); ?>
			<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
		</a>			
		<?php

	}
}

// Blog posts content hook function.
if( ! function_exists( 'artmuseum_blog_posts_content_cb' ) ) {
	function artmuseum_blog_posts_content_cb() {
		the_content();
		// Link Pages
		artmuseum_link_pages();
	}
}

// Page content hook function.
if( ! function_exists( 'artmuseum_page_content_cb' ) ) {
	function artmuseum_page_content_cb() {
		?>
		<div class="page--content">
			<?php 
			the_content();

			// Link Pages
			artmuseum_link_pages();
			?>

		</div>
		<?php
		// comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
}

// Blog page sidebar hook function.
if( ! function_exists( 'artmuseum_blog_sidebar_cb' ) ) {
	function artmuseum_blog_sidebar_cb() {
		
		$sidebarOpt = artmuseum_sidebar_opt();
		
		if( $sidebarOpt != '1'  || is_page()  ) {
			get_sidebar();
		}
	
			
	}
}


// Blog single post  social share hook function.
if( ! function_exists( 'artmuseum_blog_posts_share_cb' ) ) {
	function artmuseum_blog_posts_share_cb() {
					
		if( function_exists( 'artmuseum_social_sharing_buttons' ) ) {
			artmuseum_social_sharing_buttons();
		}			
	}
}

/**
 * Blog single post meta category, tag, next-previous link, comments form and biography hook function.
 */
if( ! function_exists('artmuseum_blog_single_meta_cb') ) {
	function artmuseum_blog_single_meta_cb() {
					
		?>
		<div class="bottom-meta">
			<div class="user-details row align-items-center">
				<div class="comment-wrap col-lg-6 col-sm-6">
					<ul>
						<?php
						if( artmuseum_opt( 'artmuseum-blog-like-toggle' ) && function_exists( 'get_simple_likes_button' ) ) {

							echo '<li>'.get_simple_likes_button( absint( get_the_ID() ) ).'</li>';
						}
						?>
						<li><?php echo artmuseum_posted_comments(); ?> </li>
					</ul>
				</div>
				<?php 
				if( artmuseum_opt( 'artmuseum-blog-social-share-toggle' ) && function_exists( 'artmuseum_social_sharing_buttons' ) ) {
					echo '<div class="social-wrap col-lg-6">'.artmuseum_social_sharing_buttons().'</div>';
				}
				?>
			</div>
			<?php 
			$cats = artmuseum_post_cats();
			if( $cats ) {
				echo '<div class="category">' . $cats . '</div>';
			}
			?>
		</div>

        <?php 
        // Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
        ?>
        <section class="nav-area pt-50 pb-100">
            <div class="container">
                <div class="row justify-content-between">
                	<?php 
                	$offset = ' offset-sm-6';
                	if( get_next_post_link() ):
                		$offset = '';
                		$nextPost = get_next_post();
                	?>
                    <div class="col-sm-6 nav-left justify-content-start d-flex">
                        <div class="thumb">
                        	<?php
                        	$url = get_the_post_thumbnail_url( absint( $nextPost->ID ), 'artmuseum-np-thumb' );
                        	echo artmuseum_img_tag(
                        		array(
                        			'url'	=> esc_url( $url ),
                        		)
                        	);
                        	?>
                        </div>
                        <div class="post-details">
                            <p><?php esc_html_e( 'Next Post', 'art-museum' ); ?></p>
                            <h4 class="text-uppercase"><?php echo get_next_post_link( '%link', '%title', false ); ?></h4>
                        </div>
                    </div>
					<?php 
					endif;
					//
                	if( get_previous_post_link() ):
                		$prevPost = get_previous_post();
					?>

                    <div class="col-sm-6<?php echo esc_attr( $offset ); ?> nav-right justify-content-end d-flex">
                        <div class="post-details">
                            <p><?php esc_html_e( 'Prev Post', 'art-museum' ); ?></p>
                            <h4 class="text-uppercase"><?php echo get_previous_post_link( '%link', '%title','', false ); ?></h4>
                        </div>             
                        <div class="thumb">
                        	<?php 
                        	$url = get_the_post_thumbnail_url( absint( $prevPost->ID ), 'artmuseum-np-thumb' );
                        	echo artmuseum_img_tag(
                        		array(
                        			'url' 	 => esc_url( $url ),
                        		)
                        	);
                        	?>
                        </div>                         
                    </div>
					<?php 
					endif;
					?>
                </div>
            </div>    
        </section>
		<?php
		endif;

		// Author biography
		if( '' !== get_the_author_meta( 'description' ) ) {
			get_template_part( 'templates/biography' );
		}

	}
}

// Blog 404 page hook function.
if( ! function_exists( 'artmuseum_fof_cb' ) ) {
	function artmuseum_fof_cb() {
		get_template_part( 'templates/404' );			
	}
}

