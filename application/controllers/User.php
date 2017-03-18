<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	public function __construct() {
    parent::__construct();
    $this->load->library('image_lib');
    $this->load->helper(array('captcha'));
		$this->load->library('form_validation');
  }

	public function index()
	{
		$this->load->view('page_index');
		$this->load->view('page_login');
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
	function profile(){
		$this->load->view('page_profile');
	}
	function update_password(){
		$this->form_validation->set_rules('password', 'Password', 'required');
  	$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]|min_length[8]|max_length[16]');
  	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == FALSE){
			$captcha = $this->create_captcha();
			$this->load->view('page_reset');
			$this->load->view('page_login',$captcha);
	  }else{
			$password =  $this->input->post('password');
  		$email =  $this->input->post('email');
  		$data['msgerror'] = 'รีเซตรหัสผ่านใหม่เสร็จเรียบร้อยแล้ว';
			$captcha = $this->create_captcha();
  		$this->UserDAO->update_password($password,$email);
  		$this->load->view('page_reset',$data);
			$this->load->view('page_login',$captcha);
	  }
	}

	function create_captcha(){
		$capt = array(
      'img_path'	=> './images/captcha/',
      'img_url'	=> base_url().'images/captcha/',
      'img_width'	=> '150',
      'img_height' => '30'
    );
    $captcha = create_captcha($capt);
		return $captcha;
	}

}
