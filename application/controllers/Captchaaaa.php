<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Captchaaaa extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->library('image_lib');
    $this->load->helper(array('captcha'));
  }
  public function index(){
    $this->load_captcha();
  }
  function load_captcha(){
    $data = array(
      'img_path'	=> './images/captcha/',
      'img_url'	=> 'http://localhost/SoftEn/images/captcha/',
      'img_width'	=> '150',
      'img_height' => '30'
    );

    $captcha = create_captcha($data);
    $this->load->view('captcha',$captcha);
}
}
