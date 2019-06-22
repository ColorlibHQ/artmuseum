<?php 
/**
 * @Packge     : Art Museum Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Instagram object Instance
function artmuseum_instagram_instance() {
    
    $api = Wpzoom_Instagram_Widget_API::getInstance();

    return $api;
}

// Blog Section
function artmuseum_blog_section( $postnumber ) {
    
    ?>
    <div class="row">
        <?php   
        $date_format = get_option( 'date_format' );

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => esc_html( $postnumber ),
        );
        
        $query = new WP_Query( $args );
        
        if( $query->have_posts() ):
        while( $query->have_posts() ):
            $query->the_post();
        ?>
        <div class="col-lg-3 col-md-6 single-blog">
            <?php 
            if( has_post_thumbnail() ):
            ?>
            <div class="thumb">
                <?php 
                the_post_thumbnail( 'artmuseum_blogsect_post_thumb', array( 'class' => 'img-fluid' ) );
                ?>                                                  
            </div>
            <?php 
            endif;
            ?>
            <p class="date"><?php  echo esc_html( get_the_date( esc_html( $date_format ) ) ); ?></p>
            <a href="<?php the_permalink() ?>"><h4><?php the_title(); ?></h4></a>
            <?php the_excerpt(); ?>
            <div class="meta-bottom d-flex justify-content-between">
                <?php
                // Post like
                if( artmuseum_opt('artmuseum-blog-like-toggle') && function_exists('get_simple_likes_button') ) {
                    echo get_simple_likes_button( absint( get_the_ID() ) );
                }
                // Post Comments
                echo artmuseum_posted_comments(); 
                ?>
            </div> 
        </div>
        <?php 
        endwhile;
        wp_reset_postdata();
        endif;
        ?>
    </div>
    <?php
}

// 
function artmuseum_section_heading( $title = '', $subtitle = '' ) {
    if( $title || $subtitle ):
    ?>
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                <?php 
                // Title
                if( $title ){
                    echo artmuseum_heading_tag(
                        array(
                            'tag'    => 'h1',
                            'class'  => 'mb-10',
                            'text'   => esc_html( $title ),
                        )
                    );
                }
                // Sub Title
                if( $subtitle ){
                    echo artmuseum_paragraph_tag(
                        array(
                            'text'  => esc_html( $subtitle ),
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div> 
    <?php
    endif;
}

// Set contact form 7 default form template
function artmuseum_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="form-area " id="myForm">
            <div class="row">   
            <div class="col-lg-6 form-group">
            [text* am-name class:common-input class:mb-20 class:form-control placeholder "Enter your name"][email* am-email class:common-input class:mb-20 class:form-control placeholder "Enter email address"][text* am-subject class:common-input class:mb-20 class:form-control placeholder "Enter your subject"]
            </div>
            <div class="col-lg-6 form-group">
            [textarea* am-message class:common-textarea class:form-control placeholder "Messege"]
            <button type="submit" class="primary-btn mt-20" style="float: right;">Send Message</button>                                  
            </div>
            </div>
            </div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'artmuseum_contact7_form_content', 10, 2 );



