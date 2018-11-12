<?php 
// Copy right text
$copyText = sprintf( __( 'Copyright &copy; %s  |  All rights reserved', 'art-museum' ), date( 'Y' ) ); 

?>
<div class="footer-bottom d-flex justify-content-between align-items-center">
    <p class="footer-text m-0"><?php echo wp_kses_post( artmuseum_opt( 'artmuseum-copyright-text-settings', esc_html( $copyText ) ) ); ?></p>
</div>