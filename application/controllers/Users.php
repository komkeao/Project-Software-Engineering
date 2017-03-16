<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
	public function __construct() {
    parent::__construct();
    $this->load->library('image_lib');
    $this->load->helper(array('captcha'));
  }

	public function index()
	{
		$this->load->view('page_index');
	}
	function register(){
		$this->load->view('page_register');
	}
  function login(){
		$data = array(
      'img_path'	=> './images/captcha/',
      'img_url'	=> base_url().'images/captcha/',
      'img_width'	=> '150',
      'img_height' => '30'
    );
    $captcha = create_captcha($data);
    $this->load->view('page_login',$captcha);
	}
	function forget(){
		$data['qustion_list'] = $this->UserDAO->get_question();
		$this->load->view('page_forget',$data);
	}
	function reset(){
		$data = array(
      'img_path'	=> './images/captcha/',
      'img_url'	=> base_url().'images/captcha/',
      'img_width'	=> '150',
      'img_height' => '30'
    );
    $captcha = create_captcha($data);
    $this->load->view('page_reset',$captcha);
	}
}
