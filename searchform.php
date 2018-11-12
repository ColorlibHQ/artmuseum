<?php 
/**
 * @Packge     : Art Museum
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
?>

<div class="search-widget">
    <form class="example" action="<?php echo esc_url( site_url( '/' ) ); ?>" style="margin:auto;max-width:301px">
      <input type="text" placeholder="<?php esc_html_e( 'Search Posts', 'art-museum' ); ?>" name="s">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>                             
</div>