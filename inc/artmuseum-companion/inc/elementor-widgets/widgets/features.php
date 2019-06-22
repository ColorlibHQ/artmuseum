<?php
namespace Artmuseumelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Artmuseum elementor about us section widget.
 *
 * @since 1.0
 */
class Artmuseum_Features extends Widget_Base {

	public function get_name() {
		return 'artmuseum-features';
	}

	public function get_title() {
		return __( 'Features', 'artmuseum' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}

	public function get_categories() {
		return [ 'artmuseum-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Features content ------------------------------
        $this->start_controls_section(
            'features_content',
            [
                'label' => __( 'Features', 'artmuseum' ),
            ]
        );
        $this->add_control(
            'features', [
                'label' => __( 'Create Features', 'artmuseum' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Title', 'artmuseum' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => '01.'
                    ],
                    [
                        'name' => 'fonticon',
                        'label' => __( 'Font Icon', 'artmuseum' ),
                        'type' => Controls_Manager::ICON,
                    ],
                    [
                        'name' => 'desc',
                        'label' => __( 'Descriptions', 'artmuseum' ),
                        'type' => Controls_Manager::WYSIWYG,
                    ],
                    [
                        'name' => 'hovdesc',
                        'label' => __( 'Hover Descriptions', 'artmuseum' ),
                        'type' => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'btntitle',
                        'label' => __( 'Button Label', 'artmuseum' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'url',
                        'label' => __( 'Button Url', 'artmuseum' ),
                        'type' => Controls_Manager::TEXT,
                    ]
                ],
            ]
        );

        $this->end_controls_section(); // End content


        //------------------------------ Style Services ------------------------------
        $this->start_controls_section(
            'style_features', [
                'label' => __( 'Style Features', 'artmuseum' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'features_title_heading',
            [
                'label'     => __( 'Style Features Title ', 'artmuseum' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label' => __( 'Title Color', 'artmuseum' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        //
        $this->add_control(
            'features_fonticon_heading',
            [
                'label'     => __( 'Style Font Icon', 'artmuseum' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_fonticon', [
                'label'     => __( 'Font Icon Color', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service .fa' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'fontsize',
            [
                'label' => __( 'Icon Font Size', 'artmuseum' ),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'  => [
                    'unit' => 'px',
                    'size' => 48,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-service .fa' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name'      => 'text_shadow_fonticon',
                'selector'  => '{{WRAPPER}} .single-service .fa',
            ]
        );

        //
        $this->add_control(
            'features_desc_heading',
            [
                'label'     => __( 'Style Descriptions', 'artmuseum' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Descriptions Color', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //------------------------------ Style Hover Services ------------------------------
        $this->start_controls_section(
            'style_hovservices', [
                'label' => __( 'Style Hover Services', 'artmuseum' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_hovservicesdesc', [
                'label'     => __( 'Descriptions Color', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service .overlay .text p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_btntextcolor', [
                'label'     => __( 'Button Text Color', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service .overlay .text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btntexthovercolor', [
                'label'     => __( 'Button Text Hover Color', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service .overlay .text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbgcolor', [
                'label'     => __( 'Button Background Color', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service .overlay .text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbgcolor', [
                'label'     => __( 'Button Hover Background Color', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service .overlay .text p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

		//------------------------------ Style Services Box ------------------------------
		$this->start_controls_section(
			'style_servicesbox', [
				'label' => __( 'Style Features Box', 'artmuseum' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'servicesbox_bgcolor',
            [
                'label'     => __( 'Style Features Box Background Color', 'artmuseum' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'servicesboxbgclor',
                'label' => __( 'Background', 'artmuseum' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .single-product',
            ]
        );
        $this->add_control(
            'servicesbox_bghovercolor',
            [
                'label'     => __( 'Style Hover Service Box Background Color ', 'artmuseum' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'servicesboxhovbgclor',
                'label' => __( 'Background', 'artmuseum' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .single-product:hover',
            ]
        );

        $this->add_control(
            'servicesbox_bordercolor',
            [
                'label'     => __( 'Style Service Box Border Color ', 'artmuseum' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'servicesboxborder',
                'label' => __( 'Border', 'artmuseum' ),
                'selector' => '{{WRAPPER}} .single-product',
            ]
        );
		$this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();


    ?>
    <section class="service-area pt-100" id="about">
        <div class="container">
            <div class="row">
                <?php 
                if( is_array( $settings['features'] ) && count( $settings['features'] ) > 0 ):
                    foreach( $settings['features'] as $val ):
                ?>
                <div class="col-lg-4">
                    <div class="single-service">
                        <?php 
                        //
                        if( !empty( $val['fonticon'] ) ){
                            echo '<span class="'.esc_attr( $val['fonticon'] ).'"></span>';
                        }
                    // 
                      if( !empty( $val['label'] ) ){
                        echo artmuseum_heading_tag(
                            array(
                                'tag' => 'h4',
                                'text' => esc_html( $val['label'] )
                            )
                        );
                      }
                      //
                      if( !empty( $val['desc'] ) ){
                        echo artmuseum_get_textareahtml_output( $val['desc'] );
                      }
                      ?>                         
                      <div class="overlay">
                        <div class="text">
                            <?php 
                            if( !empty( $val['hovdesc'] ) ){
                                echo '<p>'.esc_html( $val['hovdesc'] ).'</p>';
                            }
                            //
                            if( !empty( $val['btntitle'] ) && !empty( $val['url'] ) ){
                                echo '<a href="'.esc_url( $val['url'] ).'" class="text-uppercase primary-btn">'.esc_html( $val['btntitle'] ).'</a>';
                            }
                            ?>
                        </div>
                      </div>
                    </div>                          
                </div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
        </div>  
    </section>
    <?php

        }
	
}
