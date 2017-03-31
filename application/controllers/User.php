<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	function index(){
		if(isset($_SESSION['donationtype'])){
			if($_SESSION['donationtype']=='donor'){
				$data['title'] = 'WeShare4U - บริจาค';
				$data['head'] = 'บริจาค';
				$data['donate_type'] = $this->DonationDAO->get_donate_type();
				$this->load->view('page_header',$data);
				$this->load->view('page_donor',$data);
				$this->load->view('page_footer',$data);
			}else if($_SESSION['donationtype']=='recipient'){
				$data['title'] = 'WeShare4U - รับบริจาค';
				$data['head'] = 'รับบริจาค';
				$this->load->view('page_header',$data);
				$this->load->view('page_recipient',$data);
				$this->load->view('page_footer',$data);
			}
		}else{
			$data['title'] = 'WeShare4U';
			$this->load->view('page_header',$data);
			$this->load->view('page_select_donation');
			$this->load->view('page_footer',$data);
		}
	}

	function update_password(){ //function ที่ใช้รีเซตรหัสผ่านเมื่ผู้ใช้ login เข้ามาแล้ว
			$password =  $this->input->post('password');
			$hash_password = hash("sha256",$password);
  		$email =  $this->input->post('email');
  		$this->UserDAO->update_password($hash_password,$email);
  		redirect(base_url().'index.php/home');
	}
	function profile(){ //เมื่อผู้ใช้ login สำเร็จและกดที่ชื่อตัวเองมุมขวาบน จะมายังหน้านี้
		$data['title'] = 'WeShare4U - Profile';
    $data['head'] = 'ข้อมูลส่วนตัว';
		$this->load->view('page_header',$data);
		$this->load->view('page_profile',$data);
		$this->load->view('page_footer');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'index.php/home');
	}
}
