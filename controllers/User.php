<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	public function __construct() {
    parent::__construct();
		$this->load->library('form_validation');
  }

	public function index()  //เมื่อ login สำเร็จจะมายังหน้านี้
	{
		$data['title'] = 'WeShare4U - Index';
    $data['head'] = 'News';
		$this->load->view('page_header',$data);
		$this->load->view('page_index',$data);
		$this->load->view('page_footer');
	}

	function profile(){ //เมื่อผู้ใช้ login สำเร็จและกดที่ชื่อตัวเองมุมขวาบน จะมายังหน้านี้
		$data['title'] = 'WeShare4U - Profile';
    $data['head'] = 'ข้อมูลส่วนตัว';
		$this->load->view('page_header',$data);
		$this->load->view('page_profile',$data);
		$this->load->view('page_footer');
	}
	function update_password(){ //function ที่ใช้รีเซตรหัสผ่านเมื่ผู้ใช้ login เข้ามาแล้ว
			$password =  $this->input->post('password');
			$hash_password = hash("sha256",$password);
  		$email =  $this->input->post('email');
  		$this->UserDAO->update_password($hash_password,$email);
  		redirect(base_url().'index.php/home');
	}


}
