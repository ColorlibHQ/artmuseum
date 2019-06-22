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
class Artmuseum_Recent_Works extends Widget_Base {

	public function get_name() {
		return 'artmuseum-recent-work';
	}

	public function get_title() {
		return __( 'Recent Works', 'artmuseum' );
	}

	public function get_icon() {
		return 'eicon-inner-section';
	}

	public function get_categories() {
		return [ 'artmuseum-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Exibition Section Heading ------------------------------
        $this->start_controls_section(
            'recentwork_heading',
            [
                'label' => __( 'Recent Work Section Heading', 'artmuseum' ),
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
			'recentwork_content',
			[
				'label' => __( 'Gallery', 'artmuseum' ),
			]
		);
        $this->add_control(
            'recentworks', [
                'label' => __( 'Create Work', 'artmuseum' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'artmuseum' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'col',
                        'label' => __( 'Column', 'artmuseum' ),
                        'type'  => Controls_Manager::SELECT,
                        'options'   => [
                            '12' => 'Column 12',
                            '11' => 'Column 11',
                            '10' => 'Column 10',
                            '9'  => 'Column 9',
                            '8'  => 'Column 8',
                            '7'  => 'Column 7',
                            '6'  => 'Column 6',
                            '5'  => 'Column 5',
                            '4'  => 'Column 4',                        
                            '3'  => 'Column 3',                        
                            '2'  => 'Column 2',                        
                            '1'  => 'Column 1',               
                        ]
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Photo', 'artmuseum' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
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

    ?>

    <section class="recent-work-area section-gap">
        <div class="container">
            <?php 
            // Section Heading
            artmuseum_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );

            ?>

            <div class="row">
                <?php 
                if( is_array( $settings['recentworks'] ) && count( $settings['recentworks'] ) > 0  ):
                    foreach( $settings['recentworks'] as $val ):
                        $img = !empty( $val['img']['url'] ) ? $val['img']['url'] : '';

                        $col = '4';
                        
                        if( !empty( $val['col'] ) ){
                            $col = $val['col'];
                        }

                ?>
                <div class="col-lg-<?php echo esc_attr( $col ); ?> single-recent-work">
                    <a class="recent-project" href="<?php echo esc_url( $img ); ?>">
                        <?php 
                            echo artmuseum_img_tag(
                                array(
                                    'url' => esc_url( $img )
                                )
                            );
                        ?>
                    </a>    
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
