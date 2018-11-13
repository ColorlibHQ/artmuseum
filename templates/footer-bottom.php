<?php 
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s. Copyright &copy; %s  |  All rights reserved', 'art-museum' ), '<a href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

?>
<div class="footer-bottom d-flex justify-content-between align-items-center">
    <p class="footer-text m-0"><?php echo wp_kses_post( artmuseum_opt( 'artmuseum-copyright-text-settings',  $copyText ) ); ?></p>
</div>