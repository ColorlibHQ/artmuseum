<header id="header">
    <?php
    $headerBtnT     = artmuseum_opt( 'artmuseum_headtop_btn1_text' );
    $headerBtnUrl   = artmuseum_opt( 'artmuseum_headtop_btn1_url' );
    $headerBtnT2    = artmuseum_opt( 'artmuseum_headtop_btn2_text' );
    $headerBtnUrl2  = artmuseum_opt( 'artmuseum_headtop_btn2_url' );
    $hSocialMenu    = artmuseum_opt( 'artmuseum-headersocial-toggle-settings' );


    if( !empty( $headerBtnT ) || !empty( $headerBtnT2 ) || !empty( $headerBtnT2 ) || $hSocialMenu == 1 ){
        ?>
        <div class="container header-top">
            <div class="row">
                <div class="col-6 top-head-left">
                    <ul>
                        <?php
                        // Button #1
                        if( $headerBtnT ) {
                            echo '<li><a href="'.esc_url( $headerBtnUrl ).'">'.esc_html( $headerBtnT ).'</a></li>';
                        }
                        // Button #2
                        if( $headerBtnT2 ) {
                            echo '<li><a href="'.esc_url( $headerBtnUrl2 ).'">'.esc_html( $headerBtnT2 ).'</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <?php
                // Social Media
                if( $hSocialMenu ) {
                    echo '<div class="col-6 top-head-right">';
                        if( has_nav_menu('social-menu') ) {
                            $args = array(
                                'theme_location' => 'social-menu',
                                'container'      => '',
                                'menu_class'     => '',
                                'depth'          => 1,
                                'fallback_cb'    => 'artmuseum_social_navwalker::fallback',
                                'walker'         => new artmuseum_social_navwalker(),
                            );
                            wp_nav_menu( $args );
                        }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <hr>
        <?php
    } ?>

<div class="container">
    <div class="row align-items-center justify-content-between d-flex">
        <?php 
        // Header Logo
        echo artmuseum_theme_logo();
        ?>
        <nav id="nav-menu-container">
        <?php 
        //
        if( has_nav_menu( 'primary-menu' ) ) {
            $args = array(
                'theme_location' => 'primary-menu',
                'container'      => '',
                'depth'          => 3,
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => 'artmuseum_bootstrap_navwalker::fallback',
                'walker'         => new artmuseum_bootstrap_navwalker(),
            );  
            wp_nav_menu( $args );
        }
        ?>
        </nav><!-- #nav-menu-container -->                    
    </div>
</div>

</header><!-- #header -->