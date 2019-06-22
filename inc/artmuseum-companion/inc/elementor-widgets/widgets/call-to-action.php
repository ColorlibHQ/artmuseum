<?php
namespace Artmuseumelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Artmuseum elementor call to action section widget.
 *
 * @since 1.0
 */
class Artmuseum_Cta extends Widget_Base {

	public function get_name() {
		return 'artmuseum-cta';
	}

	public function get_title() {
		return __( 'Call To Action', 'artmuseum' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'artmuseum-elements' ];
	}

	protected function _register_controls() {


        // ----------------------------------------  Call to action content ------------------------------
        $this->start_controls_section(
            'cta_content',
            [
                'label' => __( 'Call To Action Content', 'artmuseum' ),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'artmuseum' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Everything You can imagine is right here', 'artmuseum' )
            ]
        );
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Contact', 'artmuseum' ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => esc_html__( 'inappropriate behaviour is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace. That’s why it’s crucial that, as women.', 'artmuseum' )
            ]
        );
        $this->add_control(
            'featured_img',
            [
                'label'         => esc_html__( 'Featured Image', 'artmuseum' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true
            ]
        );

        $this->end_controls_section(); // End content

        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Color', 'artmuseum' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .cat-top-area h1'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_titlebold', [
                'label'     => __( 'Bold Title Color', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .cat-top-area p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="cat-top-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 cat-top-left">
                <?php 
                // Title
                if( !empty( $settings['title'] ) ){
                    echo artmuseum_heading_tag(
                        array(
                            'tag' => 'h1',
                            'text' => esc_html( $settings['title'] ),
                        )
                    );
                }
                // Content
                if( !empty( $settings['content'] ) ){
                    echo artmuseum_get_textareahtml_output( $settings['content'] );
                }
                ?>
                </div>
                <div class="col-lg-6 cat-top-right">
                    <?php 
                    if( !empty( $settings['featured_img']['url'] ) ){
                        echo artmuseum_img_tag(
                            array(
                                'url'   =>  esc_url( $settings['featured_img']['url'] ),
                                'class' => 'img-fluid'
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>  
    </section>
    <?php

        }
	
}
