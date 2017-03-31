<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['uid'])){
			redirect(base_url().'index.php/home');
		}
	}

	function select_donation(){
		if(!isset($_SESSION['donationtype'])){
			$data = array(
							'donationtype'=> $this->input->post('donation')
						);
			$this->session->set_userdata($data);
			redirect(base_url().'index.php/user/index');
		}else{
			redirect(base_url().'index.php/user/index');
		}
	}
	//first donate
	function do_donor(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
		$this->load->helper('form');

		$time = time();
		$image = 'WS'.$_SESSION['uid'].$time.substr($_FILES['dfile']['name'],strlen($_FILES['dfile']['name'])-4,4);

		$config['file_name'] = $image;
		$config['upload_path'] = 'assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->upload->set_allowed_types('*');
		$data['upload_data'] = '';

		$data = array(
			 'donate_name' => $this->input->post('dname') ,
			 'donate_description' => $this->input->post('ddescription') ,
			 'donate_detail' => $this->input->post('ddetail') ,
			 'donate_date' => date("Y-m-d H:i:s") ,
			 'donate_length' => $this->input->post('dlength') ,
			 'donate_width' => $this->input->post('dwidth') ,
			 'donate_height' => $this->input->post('dheight') ,
			 'donate_weight' => $this->input->post('dweight') ,
			 'donate_amount' => $this->input->post('damount') ,
			 'donate_image' => $image ,
			 'donatetype_id' => $this->input->post('dtype') ,
			 'user_id' => $_SESSION['uid']
		);

		if(!$this->DonationDAO->do_donor($data)){
			$this->upload->do_upload('dfile');
			//get last id of donation
			$last_id_donation = $this->DonationDAO->get_last_id_donation();
			redirect(base_url().'index.php/donation/complete_donate/'.$last_id_donation);
		}else{
			redirect(base_url().'index.php/user/index');
		}
	}

	//edit donate
	function editdo_donor(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
		$this->load->helper('form');

		$did = $this->input->post('did');
		$time = time();
		$image = 'WS'.$_SESSION['uid'].$time.substr($_FILES['dfile']['name'],strlen($_FILES['dfile']['name'])-4,4);

		$config['file_name'] = $image;
		$config['upload_path'] = 'assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$data['upload_data'] = '';
		if($_FILES['dfile']['name']==null){
			$data = array(
				 'donate_name' => $this->input->post('dname') ,
				 'donate_description' => $this->input->post('ddescription') ,
				 'donate_detail' => $this->input->post('ddetail') ,
				 'donate_date' => date("Y-m-d H:i:s") ,
				 'donate_length' => $this->input->post('dlength') ,
				 'donate_width' => $this->input->post('dwidth') ,
				 'donate_height' => $this->input->post('dheight') ,
				 'donate_weight' => $this->input->post('dweight') ,
				 'donate_amount' => $this->input->post('damount') ,
				 'donatetype_id' => $this->input->post('dtype') ,
				 'user_id' => $_SESSION['uid']
			);

			if(!$this->DonationDAO->editdo_donor($data,$did)){
				//get last id of donation
				$last_id_donation = $this->DonationDAO->get_last_id_donation();
				redirect(base_url().'index.php/donation/complete_donate/'.$last_id_donation);
			}else{
				redirect(base_url().'index.php/user/index');
			}
		}else{
			$data = array(
				 'donate_name' => $this->input->post('dname') ,
				 'donate_description' => $this->input->post('ddescription') ,
				 'donate_detail' => $this->input->post('ddetail') ,
				 'donate_date' => date("Y-m-d H:i:s") ,
				 'donate_length' => $this->input->post('dlength') ,
				 'donate_width' => $this->input->post('dwidth') ,
				 'donate_height' => $this->input->post('dheight') ,
				 'donate_weight' => $this->input->post('dweight') ,
				 'donate_amount' => $this->input->post('damount') ,
				 'donate_image' => $image ,
				 'donatetype_id' => $this->input->post('dtype') ,
				 'user_id' => $_SESSION['uid']
			);

			if(!$this->DonationDAO->editdo_donor($data,$did)){
				$this->upload->do_upload('dfile');
				//get last id of donation
				$last_id_donation = $this->DonationDAO->get_last_id_donation();
				redirect(base_url().'index.php/donation/complete_donate/'.$last_id_donation);
			}else{
				redirect(base_url().'index.php/user/index');
			}
		}
	}

	function complete_donate($last_id_donation){
		$data['title'] = 'WeShare4U - รายละเอียดการบริจาค';
		$data['head'] = 'รายละเอียดการบริจาค';
		$data['donate_type'] = $this->DonationDAO->get_donate_type();
		$data['edit'] = $this->DonationDAO->edit_donor($last_id_donation);
		$this->load->view('page_header',$data);
		$this->load->view('page_donorsuccess',$data);
		$this->load->view('page_footer',$data);
	}
	function edit_donor($last_id_donation){
		$data['title'] = 'WeShare4U - แก้ไขการบริจาค';
		$data['head'] = 'แก้ไขการบริจาค';
		$data['donate_type'] = $this->DonationDAO->get_donate_type();
		$data['edit'] = $this->DonationDAO->edit_donor($last_id_donation);
		$this->load->view('page_header',$data);
		$this->load->view('page_editdonor',$data);
		$this->load->view('page_footer',$data);
	}

}
