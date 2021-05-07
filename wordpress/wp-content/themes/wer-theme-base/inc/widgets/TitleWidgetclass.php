<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class TitleWidget extends Widget_Base{

  public function get_name() {
    return 'title-subtitle';
  }

  public function get_title() {
    return 'title & sub-title';
  }

  public function get_icon() {
    return 'eicon-header';
  }

  public function get_categories() {
    return [ 'wer-media' ];
  }

  protected function _register_controls() {
    $this->start_controls_section(
      'content_section',
      [
        'label' => __( 'Content', 'plugin-name' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'content_section2',
      [
        'label' => __( 'Content2', 'plugin-name2' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->end_controls_section();
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    $url = $settings['link']['url'];
    echo  "<a href='$url'><div class='title'>$settings[title]</div> <div class='subtitle'>$settings[subtitle]</div></a>";

  }

  protected function _content_template() {

  }

}