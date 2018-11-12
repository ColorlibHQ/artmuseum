<header id="header" id="home">
<div class="container header-top">
    <div class="row">
        <div class="col-6 top-head-left">
            <ul>
                <?php 
                // Button #1
                if( artmuseum_opt( 'artmuseum_headtop_btn1_text' ) && artmuseum_opt( 'artmuseum_headtop_btn1_url' ) ) {
                    echo '<li><a href="'.esc_url( artmuseum_opt('artmuseum_headtop_btn1_url') ).'">'.esc_html( artmuseum_opt('artmuseum_headtop_btn1_text') ).'</a></li>';
                }
                // Button #2
                if( artmuseum_opt( 'artmuseum_headtop_btn2_text' ) && artmuseum_opt( 'artmuseum_headtop_btn2_url' ) ) {
                    echo '<li><a href="'.esc_url( artmuseum_opt( 'artmuseum_headtop_btn2_url' ) ).'">'.esc_html( artmuseum_opt( 'artmuseum_headtop_btn2_text' ) ).'</a></li>';
                }
                ?>
            </ul>
        </div>
        <?php 
        // Social Media
        if( artmuseum_opt( 'artmuseum-headersocial-toggle-settings' ) ) {
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
                'depth'          => 2,
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