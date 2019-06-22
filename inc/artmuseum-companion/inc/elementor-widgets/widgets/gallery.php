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
 * Artmuseum elementor Gallery.
 *
 * @since 1.0
 */
class Artmuseum_Gallery extends Widget_Base {

	public function get_name() {
		return 'artmuseum-gallery';
	}

	public function get_title() {
		return __( 'Gallery', 'artmuseum' );
	}

	public function get_icon() {
		return 'eicon-gallery-justified';
	}

	public function get_categories() {
		return [ 'artmuseum-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Exibition Section Heading ------------------------------
        $this->start_controls_section(
            'gallery_heading',
            [
                'label' => __( 'Gallery Section Heading', 'artmuseum' ),
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
		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'gallery_content',
			[
				'label' => __( 'Gallery', 'artmuseum' ),
			]
		);
        $this->add_control(
            'gallery', [
                'label' => __( 'Create gallery', 'artmuseum' ),
                'type'  => Controls_Manager::GALLERY
            ]
        );

		$this->end_controls_section(); // End Team Member content



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
    // Load widget script
    $this->load_widget_script();
    ?>
    <section class="gallery-area" id="gallery">
        <div class="container">
            <?php 
            // Section Heading
            artmuseum_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );

            ?>
            <div id="grid-container" class="row">
                <?php 
                if( is_array( $settings['gallery'] ) && count( $settings['gallery'] ) > 0 ) {
                    foreach( $settings['gallery'] as $val ){

                        $url = $val['url'];

                        echo '<a class="single-gallery" href="'.esc_url( $url ).'">';
                            echo artmuseum_img_tag(
                                array(
                                    'url'   =>  esc_url( $url ),
                                    'class' => 'grid-item'
                                )
                            );
                        echo '</a>';
                    }
                }
                ?>                  
            </div>  
        </div>  
    </section>

    <?php

    }

    public function load_widget_script() {
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
            ?>
            <script>
            ( function( $ ) {
                "use strict";
                //  Gallery
                $("#grid-container").justifiedGallery({
                    rowHeight : 200,
                    captions : false,
                    margins : 30
                });

            })(jQuery);
            </script>
            <?php
        }
    }
	
}
