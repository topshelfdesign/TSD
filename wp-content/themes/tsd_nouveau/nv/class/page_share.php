<?php
class page_share{
  public $html;
  public $post_id;

  public function __construct($post_id){
    
    $this->post_id = $post_id;

    $this->build_facebook();
    $this->build_twitter();
  }

  public function build_facebook(){
    $this->html .= "[fb] ";
  }

  public function build_twitter(){
    $this->html .= "[tw]";
  }

  public function print_html(){
    print $this->html;
  }

  public function get_html(){
    return $this->html();
  }
}