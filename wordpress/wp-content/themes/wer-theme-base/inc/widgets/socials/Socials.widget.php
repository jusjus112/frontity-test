<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Socials extends Widget_Base{

  public function get_name(){
    return 'wer-socials';
  }

  public function get_title(){
    return 'Social Media Buttons';
  }

  public function get_icon(){
    return 'fas fa-share-alt';
  }

  public function get_categories(){
    return ['wer-media'];
  }

  protected function _register_controls(){

  }

  function smknoppen() {
    return '<span>Test</span>';
  }

  protected function render(){ ?>
    <div class="widget vds-sm-widget">
      <div class="socialicons">
        <?= $this->smknoppen(); ?>
      </div>
    </div>
    <?php
  }

  protected function _content_template(){
    ?>
    <div class="widget vds-sm-widget">
      <div class="socialicons">
        <?= $this->smknoppen(); ?>
      </div>
    </div>
  <?php
  }
}
