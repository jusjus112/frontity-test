<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class PostCarousel extends Widget_Base{

  public function get_name(){
    return 'wer-post-carousel';
  }

  public function get_title(){
    return 'Post Carousel';
  }

  public function get_icon(){
    return 'far fa-file';
  }

  public function get_categories(){
    return ['wer-media'];
  }

  protected function _register_controls(){
    $this->start_controls_section(
      'content_section',
      [
        'label' => __( 'Settings', 'plugin-name' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_responsive_control(
      'columns',
      [
        'label' => __( 'Columns', 'elementor-pro' ),
        'type' => Controls_Manager::SELECT,
        'default' => '1',
        'tablet_default' => '1',
        'mobile_default' => '1',
        'options' => [
          '1' => '1',
          '2' => '2',
          '3' => '3',
          '4' => '4',
          '5' => '5',
          '6' => '6',
        ],
        'frontend_available' => true,
      ]
    );

    $this->add_control(
      'posttype',
      [
        'label' => 'Posttype',
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => $this->getPostTypes(),
        'default' => array_key_first($this->getPostTypes())
      ]
    );

    $this->add_control(
      'thumbnail',
      [
        'label' => __( 'Thumbnail' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __('Yes'),
        'label_off' => __('No'),
        'default' => 'yes',
      ]
    );

    $this->add_control(
      'excerpt',
      [
        'label' => __( 'Excerpt' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __('Yes'),
        'label_off' => __('No'),
        'default' => 'yes',
      ]
    );

    $this->add_control(
      'title',
      [
        'label' => __( 'Title' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __('Yes'),
        'label_off' => __('No'),
        'default' => 'yes',
      ]
    );

    $this->add_control(
      'subtitle',
      [
        'label' => __( 'SubTitle' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __('Yes'),
        'label_off' => __('No'),
        'default' => 'yes',
      ]
    );

    $this->add_control(
      'button',
      [
        'label' => __( 'Button' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __('Yes'),
        'label_off' => __('No'),
        'default' => 'yes',
      ]
    );

    $this->end_controls_section();

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

  private function getPostTypes(){
    $post_types = get_post_types( array( 'public' => true, '_builtin' => true ), 'names', 'and' );
    unset( $post_types['attachment'] );

    return $post_types;
  }

  protected function render(){
    $this->slider();
  }

  protected function _content_template(){ ?>
  <?php }

  public function item($id = 1){ ?>
    <slider-item>
      <p class="slider-content">Integer interdum mollis ligula, ut molestie mauris bibendum quis. Curabitur semper libero id diam congue euismod.</p>
      <h3 class="slider-title">John doe <?= $id ?></h3>
      <h4 class="slider-sub-title">Ondertitel</h4>
      <div class="slider-buttons">
        <slider-button id="previous"><i class="bi bi-arrow-left-short"></i></slider-button>
        <slider-button id="next"><i class="bi bi-arrow-right-short"></i></slider-button>
      </div>
    </slider-item>
  <?php }

  public function slider(){
    $columns = $this->get_settings( 'columns' );
    ?>
    <slider>
      <?php $this->item(); ?>
      <?php $this->item(2); ?>
      <?php $this->item(3); ?>
    </slider>

    <script type="text/javascript">
      jQuery(document).ready(function( $ ) {
        $('slider').slick({
          slidesToShow: <?= $columns ?>,
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear',
          prevArrow: $('slider-button#previous'),
          nextArrow: $('slider-button#next')
        })
      });
    </script>
  <?php }
}
