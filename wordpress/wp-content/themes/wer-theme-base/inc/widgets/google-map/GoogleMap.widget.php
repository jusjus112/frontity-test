<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class GoogleMap extends Widget_Base{

  public function get_name(){
    return 'wer-google-map';
  }

  public function get_title(){
    return 'Google Maps';
  }

  public function get_icon(){
    return 'fas fa-map-marked-alt';
  }

  public function get_categories(){
    return ['wer-media'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
      'section_divider',
      [
        'label' => __( 'Text Style', 'elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'texprimary_color',
      [
        'label' => __('Primary Color', 'elementor'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .socialicons p' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'typography',
        'global' => [
          'default' => Global_Typography::TYPOGRAPHY_ACCENT,
        ],
        'selector' => '{{WRAPPER}} .socialicons p',
      ]
    );
    $this->end_controls_section();
  }

  protected function render(){
    $this->slider();
  }

  protected function _content_template(){
    $this->slider();
  }

  public function slider(){ ?>
    <slider>
      <?= "Test" ?>
    </slider>
  <?php }
}