<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'WeShare4U - Index';
		$data['head'] = 'News';
		$this->load->view('page_header',$data);
		$this->load->view('page_index',$data);
		$this->load->view('page_footer',$data);
	}

	function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$hash_password = hash('sha256',$password);
		if($this->UserDAO->login($email, $hash_password)){
			redirect(base_url().'index.php/user/index');
		}else{
			echo "failed";
		}
	}

	function check_login(){ //ตรวจการเข้าสู่ระบบ โดยรับค่า email psssword
		$email =  $this->input->post('email');
    $password =  $this->input->post('password');
		$hash_password = hash("sha256",$password);
		$captcha = trim($this->input->post('captcha'));

		if($email==""){
				echo "emailnull";
		}
		if($password==""){
			echo "passnull";
		}
		if($captcha==""){
			echo "captnull";
		}
		if($this->UserDAO->login($email, $hash_password)){
				echo "true";

		}
		if($this->UserDAO->email_isnt_exist($email)){
				echo "emailinv";

		}

	}

	function check_regex(){ // function ตรวจสอบ regex
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$arr_password = str_split($password);
		$count_upper = false;
		$count_lower = false;
		$count_number = false;
		$count_char = false;
		$output_1 = "";
		$output_2 = "";
		$output_3 = "";
		foreach ($arr_password as $arr) {
	    if (ctype_upper($arr)){
				$count_upper = true;
	    }
			if(ctype_lower($arr)){
				$count_lower = true;
	    }
			if(ctype_digit($arr)){
				$count_number = true;
	    }
			if(ctype_punct($arr)){
				$count_char = true;
	    }
		}
		$output_1 = $output_1 . "<ul>";
		if(strlen($password)>=8 && strlen($password)<=16){
			$output_1 = $output_1 . "<li><font color='green' size='3px'>&#9745; รหัสผ่านมีความยาวระหว่าง 8 ถึง 16 ตัวอักษร</font></li>";
			$output_2 = $output_2 . "T";
		}else{
			$output_1 = $output_1 . "<li><font color='red' size='3px'>&#9746; รหัสผ่านต้องมีความยาวระหว่าง 8 ถึง 16 ตัวอักษร</font></li>";
			$output_2 = $output_2 . "F";
		}
		if($count_upper>0){
			$output_1 = $output_1 . "<li><font color='green' size='3px'>&#9745; รหัสผ่านมีตัวอักษรพิมพ์ใหญ่อย่างน้อย 1 ตัว</font></li>";
			$output_2 = $output_2 . "T";
		}else{
			$output_1 = $output_1 . "<li><font color='red' size='3px'>&#9746; รหัสผ่านต้องมีตัวอักษรพิมพ์ใหญ่อย่างน้อย 1 ตัว</font></li>";
			$output_2 = $output_2 . "F";
		}
		if($count_lower>0){
			$output_1 = $output_1 . "<li><font color='green' size='3px'>&#9745; รหัสผ่านมีตัวอักษรพิมพ์เล็กอย่างน้อย 1 ตัว</font></li>";
			$output_2 = $output_2 . "T";
		}else{
			$output_1 = $output_1 . "<li><font color='red' size='3px'>&#9746; รหัสผ่านต้องมีตัวอักษรพิมพ์เล็กอย่างน้อย 1 ตัว</font></li>";
			$output_2 = $output_2 . "F";
		}
		if($count_number>0){
			$output_1 = $output_1 . "<li><font color='green' size='3px'>&#9745; รหัสผ่านมีตัวเลขอย่างน้อย 1 ตัว</font></li>";
			$output_2 = $output_2 . "T";
		}else{
			$output_1 = $output_1 . "<li><font color='red' size='3px'>&#9746; รหัสผ่านต้องมีตัวเลขอย่างน้อย 1 ตัว</font></li>";
			$output_2 = $output_2 . "F";
		}
		if($count_char>0){
			$output_1 = $output_1 . "<li><font color='green' size='3px'>&#9745; รหัสผ่านมีอักขระพิเศษอย่างน้อย 1 ตัว</font></li>";
			$output_2 = $output_2 . "T";
		}else{
			$output_1 = $output_1 . "<li><font color='red' size='3px'>&#9746; รหัสผ่านต้องมีอักขระพิเศษอย่างน้อย 1 ตัว</font></li>";
			$output_2 = $output_2 . "F";
		}
		$output_1 = $output_1 . "</ul>";

		if(strlen($password)==0 || strlen($confirm_password)==0){
			$output_3 = $output_3 . "<font color='red' size='3px'>&#9746; รหัสผ่านห้ามว่าง</font>";
			$output_2 = $output_2 . "F";
		}else{
			if($password == $confirm_password){
				$output_3 = $output_3 . "<font color='green' size='3px'>&#9745; รหัสผ่านตรงกัน</font>";
				$output_2 = $output_2 . "T";
			}else{
				$output_3 = $output_3 . "<font color='red' size='3px'>&#9746; รหัสผ่านไม่ตรงกัน</font>";
				$output_2 = $output_2 . "F";
			}
		}

		echo json_encode(array("msg1"=>$output_1,"msg2"=>$output_2,"msg3"=>$output_3));
	}

	function reset_password(){ //เข้าสู่หน้ารีเซ็ตรหัสผ่าน ปล.ถ้าเข้าลิงค์เข้ามาหน้านี้ตรง ๆ จะรีไดเร็คไปหน้าลืมรหัสผ่าน
		$data['title'] = 'WeShare4U - Reset Password';
		$data['head'] = 'รีเซ็ตรหัสผ่าน';
		$this->load->view('page_header',$data);
		$this->load->view('page_reset',$data);
		$this->load->view('page_footer');
	}

	function do_forget(){ //ajax ตรวจว่าอีเมล์ คำถาม คำตอบถูกต้องหรือไม่
		if($this->UserDAO->search_answer($this->input->post('email'), $this->input->post('question'),$this->input->post('answer'))){
			echo "Yes";
		}
		else{
			echo "No";
		}
	}

	function forget_password(){ //หน้าลืมรหัสผ่าน ดึงคำถามจาก Database
		$data['qustion_list'] = $this->UserDAO->get_question();
		$data['msgerror'] = '';
		$data['title'] = 'WeShare4U - Forget Password';
		$data['head'] = 'ลืมรหัสผ่าน';
		$this->load->view('page_header',$data);
		$this->load->view('page_forget',$data);
		$this->load->view('page_footer');
	}

}
