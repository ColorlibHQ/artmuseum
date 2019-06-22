<?php
namespace Artmuseumelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Artmuseum elementor Team Member section widget.
 *
 * @since 1.0
 */
class Artmuseum_Exhibitions_Ticket extends Widget_Base {

	public function get_name() {
		return 'artmuseum-exhibitions-ticket';
	}

	public function get_title() {
		return __( 'Exhibitions Ticket', 'artmuseum' );
	}

	public function get_icon() {
		return 'eicon-price-list';
	}

	public function get_categories() {
		return [ 'artmuseum-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Exibition Section Heading ------------------------------
        $this->start_controls_section(
            'exhitic_heading',
            [
                'label' => __( 'Exhibitions Ticket Section Heading', 'artmuseum' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'artmuseum' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'artmuseum' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End section top content
		// ----------------------------------------  Exhibitions ticket ------------------------------
		$this->start_controls_section(
			'exhitic_contents',
			[
				'label' => __( 'Exhibitions Ticket', 'artmuseum' ),
			]
		);
		$this->add_control(
            'ticket_content', [
                'label' => __( 'Create Ticket', 'artmuseum' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'artmuseum' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Blind Artist Draws Colorful Paintings'
                    ],
                    [
                        'name'  => 'url',
                        'label' => __( 'Title Url', 'artmuseum' ),
                        'type'  => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name'  => 'date',
                        'label' => __( 'Date', 'artmuseum' ),
                        'type'  => Controls_Manager::DATE_TIME
                    ],
                    [
                        'name'  => 'price',
                        'label' => __( 'Price', 'artmuseum' ),
                        'type'  => Controls_Manager::TEXT
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'artmuseum' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default' => 'Lorem ipsum dolor sit amet, consec teturadip isicing elit, sed do eiusmod tempor.'
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Photo', 'artmuseum' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exhibitions ticket content

    /**
     * Style Tab
     * ------------------------------ Style Section ------------------------------
     *
     */

    $this->start_controls_section(
        'style_section', [
            'label' => __( 'Style Section Heading', 'artmuseum' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'color_secttitle', [
            'label'     => __( 'Section Title Color', 'artmuseum' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#333333',
            'selectors' => [
                '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'color_sectsubtitle', [
            'label'     => __( 'Section Sub Title Color', 'artmuseum' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#777',
            'selectors' => [
                '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section class="upcoming-exibition-area section-gap">
        <div class="container">
            <?php 
            // Section Heading
            artmuseum_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );

            ?>
            <div class="row">
                <?php 
                if( is_array( $settings['ticket_content'] ) && count( $settings['ticket_content'] ) > 0 ):
                    foreach( $settings['ticket_content'] as $val ):

                ?>
                <div class="col-lg-4 col-md-6 single-exhibition">
                    <?php 
                    //
                    if( !empty( $val['img']['url'] ) ){
                        echo '<div class="thumb">';
                            echo artmuseum_img_tag(
                                array(
                                    'url'   => esc_url( $val['img']['url'] ),
                                    'class' => 'img-fluid',
                                )
                            );
                        echo '</div>';
                    }
                    //
                    if( !empty( $val['date'] ) ){
                        echo artmuseum_paragraph_tag(
                            array(
                                'text'  => esc_html( $val['date'] ),
                                'class' => 'date'
                            )
                        );
                    }
                    //

                    if( !empty( $val['label'] ) ){

                        $atagstart  = '';
                        $atagend    = '';

                        if( !empty( $val['url']['url'] ) ){
                            $atagstart  = '<a href="'.esc_url( $val['url']['url'] ).'">';
                            $atagend    = '</a>';

                        }
                        echo wp_kses_post( $atagstart );
                            echo artmuseum_heading_tag(
                                array(
                                    'tag'  => 'h4',
                                    'text' => esc_html( $val['label'] )
                                )
                            );
                        echo wp_kses_post( $atagend );
                    }

                    // 
                    if( !empty(  $val['desc'] ) ){
                        echo artmuseum_paragraph_tag(
                            array(
                                'text'  => esc_html( $val['desc'] ),
                            )
                        );
                    } 
                    //
                    if( !empty( $val['price'] ) ){
                        echo artmuseum_paragraph_tag(
                            array(
                                'text'          => esc_html( $val['price'] ),
                                'class'         => 'price',
                                'wrap_before'   => '<div class="meta-bottom d-flex justify-content-start">',
                                'wrap_after'    => '</div>'
                            )
                        );
                    }
                    ?>                              
                </div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>

        </div>  
    </section>
    <!-- End upcoming-exibition Area -->

    <?php

    }
	
}
