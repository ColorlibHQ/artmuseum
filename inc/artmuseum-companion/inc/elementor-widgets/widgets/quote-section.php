<?php
namespace Artmuseumelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Artmuseum elementor quote section widget.
 *
 * @since 1.0
 */
class Artmuseum_Quote_Section extends Widget_Base {

	public function get_name() {
		return 'artmuseum-quote-section';
	}

	public function get_title() {
		return __( 'Quote Section', 'artmuseum' );
	}

	public function get_icon() {
		return 'eicon-editor-quote';
	}

	public function get_categories() {
		return [ 'artmuseum-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Quote section content ------------------------------
        $this->start_controls_section(
            'quote_section_content',
            [
                'label' => __( 'Quote Section', 'artmuseum' ),
            ]
        );
        $this->add_control(
            'quotesect_contleft',
            [
                'label' => esc_html__( 'Content Left', 'artmuseum' ),
                'type'  => Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'quotesect_contright',
            [
                'label' => esc_html__( 'Content Right', 'artmuseum' ),
                'type'  => Controls_Manager::WYSIWYG,
            ]
        );
        $this->end_controls_section(); // End quote section content


        //------------------------------ Style Content  ------------------------------
        $this->start_controls_section(
            'style_desc', [
                'label' => __( 'Style Description', 'artmuseum' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_leftcontent', [
                'label'     => __( 'Content Left', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .quote-left' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .quote-left h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_rightcontent', [
                'label'     => __( 'Content Right', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .quote-right' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();


    ?>
    <section class="quote-area section-gap">
        <div class="container">             
            <div class="row">
                <div class="col-lg-6 quote-left">
                    <?php
                    if( !empty( $settings['quotesect_contleft'] ) ){
                        echo artmuseum_get_textareahtml_output( $settings['quotesect_contleft'] );
                    }
                    ?>
                </div>
                <div class="col-lg-6 quote-right">
                    <?php
                    if( !empty( $settings['quotesect_contright'] ) ){
                        echo artmuseum_get_textareahtml_output( $settings['quotesect_contright'] );
                    }
                    ?>
                </div>
            </div>
        </div>  
    </section>
    <?php

        }
	
}
