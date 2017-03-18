<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct() {
    parent::__construct();
    $this->load->library('image_lib');
    $this->load->helper(array('captcha'));
  }

	public function index()
	{
    $data['title'] = 'WeShare4U';
    $data['home'] = 'Home';
		$captcha = $this->create_captcha();
		$this->load->view('page_index',$data);
		$this->load->view('page_login',$captcha);
	}

	function register(){
		$this->load->view('page_register');
	}


	function forget_password(){
		$data['qustion_list'] = $this->UserDAO->get_question();
		$data['msgerror'] = '';
		$captcha = $this->create_captcha();
		$this->load->view('page_forget',$data);
		$this->load->view('page_login',$captcha);
	}

	function check_login(){
		$email =  $this->input->post('email');
    $password =  $this->input->post('password');

    if($this->UserDAO->login($email, $password)){
			redirect('home/donation');
    }
    else{
			echo "error";
    }
		//redirect('index.php/users/loginSeccess');
	}
  function donation(){
    $this->load->view('page_login_success');
  }
	function logout(){
		$this->session->sess_destroy();
		redirect('home');
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

	function reset_password(){

		if(isset($_SESSION['email'])){
				$data['msgerror'] = '';
				$this->load->view('page_reset',$data);
			}else{
				$email =  $this->input->post('email');
		    $question =  $this->input->post('question');
				$answer = $this->input->post('answer');
				if($this->UserDAO->search_answer($email, $question,$answer)){
					$data['msgerror'] = '';
					$captcha = $this->create_captcha();
					$this->load->view('page_reset',$data);
					$this->load->view('page_login',$captcha);
		    }
		    else{
					$captcha = $this->create_captcha();
					$data['qustion_list'] = $this->UserDAO->get_question();
					$data['msgerror'] = 'อีเมล์หรือคำตอบไม่ถูกต้อง';
					$this->load->view('page_forget',$data);
					$this->load->view('page_login',$captcha);
		    }
			}
	}
}
