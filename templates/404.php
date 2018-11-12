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
?>

<div id="f0f" class="pd--100-0">
	<div class="container">
		<div class="row">
			<div class="f0f--content text-center col-md-12">
				<div class="inner-fof">
					<div class="inner-child-fof">
						<?php 
						$errorText = esc_html__( 'Ooops 404 Error !', 'art-museum' );
						// Error text
						echo '<h1 class="h1 m-b-30">'.esc_html( artmuseum_opt( 'artmuseum_fof_text_one', $errorText ) ).'</h1>';

						// Wrong text block
						$wrongText = esc_html__( 'Either something went wrong or the page dosen\'t exist anymore.', 'art-museum'  );

						$wrongText = artmuseum_opt( 'artmuseum_fof_text_two', $wrongText );
					
						$anchor = artmuseum_anchor_tag(
							array(
								'url' 	 => esc_url( site_url( '/' ) ),
								'text' 	 => esc_html__( 'Back To Home page', 'art-museum' ),
							)
						);

						echo artmuseum_paragraph_tag(
							array(
								'text' 	 => sprintf( '%s %s', esc_html( $wrongText ), wp_kses_post( $anchor )  ),
							)
						);

						// Search Form
						get_search_form();
						?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>