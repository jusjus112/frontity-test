<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Portfolio extends Widget_Base {

  public function get_name(){
    return 'wer-portfolio';
  }

  public function get_title(){
    return 'Portfolio Items';
  }

  public function get_icon(){
    return 'fas fa-table';
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

  public function item(){ ?>
    <project class="col-lg-4">
      <div class="project-header">
        <img src="https://img.freepik.com/free-photo/lumberjack-forest_1303-9035.jpg?size=626&ext=jpg" alt="Alt Text">
      </div>
      <div class="project-body">
        <h2 class="project-title">Hier een titel</h2>
        <h3 class="project-sub-title">Sub Title</h3>
      </div>
    </project>
  <?php }

  public function slider(){ ?>
    <section id="projects">
      <div class="row">
        <?php $this->item(); ?>
        <?php $this->item(); ?>
        <?php $this->item(); ?>
        <?php $this->item(); ?>
        <?php $this->item(); ?>
        <?php $this->item(); ?>
        <?php $this->item(); ?>
      </div>
    </section>
  <?php }

}
