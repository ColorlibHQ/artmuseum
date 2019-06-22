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
 * Artmuseum elementor few words section widget.
 *
 * @since 1.0
 */
class Artmuseum_sh extends Widget_Base {

	public function get_name() {
		return 'artmuseum-sh';
	}

	public function get_title() {
		return __( 'Section Heading', 'artmuseum' );
	}

	public function get_icon() {
		return 'eicon-archive-title';
	}

	public function get_categories() {
		return [ 'artmuseum-elements' ];
	}

	protected function _register_controls() {


        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'sh_content',
            [
                'label' => __( 'Section Heading', 'artmuseum' ),
            ]
        );
        $this->add_control(
            'sh_sectiontitle',
            [
                'label'       => esc_html__( 'Title', 'artmuseum' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'sh_sectionsubtitle',
            [
                'label'       => esc_html__( 'Sub Title', 'artmuseum' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
            ]
        );


        $this->end_controls_section(); // End few words content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section', 'artmuseum' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .product-area-title .h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_secttitle',
                'selector'  => '{{WRAPPER}} .product-area-title .h1',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name'     => 'text_shadow_secttitle',
                'selector' => '{{WRAPPER}} .product-area-title .h1',
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'artmuseum' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .product-area-title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sectsubtitle',
                'selector'  => '{{WRAPPER}} .product-area-title p',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name'     => 'text_shadow_sectsubtitle',
                'selector' => '{{WRAPPER}} .product-area-title p',
            ]
        );
        $this->end_controls_section();




	}

	protected function render() {

        $settings = $this->get_settings();

        if( !empty( $settings['sh_sectiontitle'] ) || !empty( $settings['sh_sectionsubtitle'] ) ):
        ?>
        <div class="justify-content-center">
            <div class="product-area-title text-center">
                <?php 
                // Sub Title
                if( !empty( $settings['sh_sectionsubtitle'] ) ){
                    echo artmuseum_paragraph_tag(
                        array(
                            'class'       => 'text-uppercase',
                            'text'        => esc_html( $settings['sh_sectionsubtitle'] ),
                        )
                    );
                }
                // Title
                if( !empty( $settings['sh_sectiontitle'] ) ){
                    echo artmuseum_heading_tag(
                        array(
                            'tag'         => 'h2',
                            'class'       => 'h1',
                            'text'        => esc_html( $settings['sh_sectiontitle'] ),
                        )
                    );
                }
                ?>
            </div>
        </div>
        <?php
        endif;

    }
	
}
