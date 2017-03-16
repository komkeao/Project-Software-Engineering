<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donate extends CI_Controller{
  function  __construct() {
		parent::__construct();
	}

  function donor(){
      $data['donate_list'] = $this->UploadDAO->get_donate_list();
      $this->load->view('page_donor',$data);
  }
  function donor_create(){

    //get data from donate page
    $dname = $this->input->post('dname');
    $ddetail = $this->input->post('ddetail');
    $dsize= $this->input->post('dsize');
    $dweight = $this->input->post('dweight');
    $damount = $this->input->post('amount');
    $dtype = $this->input->post('donate_type');
    $usid = '1';
    $ddate = date("Y-m-d H:i:s");

    //insert data from insert page to database
    $data_donate = array(
          'donate_name' => $dname,
          'donate_detail' => $ddetail,
          'donate_date' => $ddate,
          'donate_size' => $dsize,
          'donate_weight' => $dweight,
          'donate_amount' => $damount,
          'type_id' => $dtype,
          'user_id' => $usid
    );
    $insert_donate = $this->UploadDAO->insert_donate($data_donate);


    $config['upload_path'] = 'images/';
    $config['allowed_types'] = 'gif|jpg|png|bmp';

    $this->load->library('upload', $config);
    $upload_error = array();

    for($i=0; $i<count($_FILES['fileUpload']['name']); $i++)
        {
          //get last pic


          $pic_created = date("Y-m-d H:i:s");
          $donate_id = $this->UploadDAO->get_last_donate();
          $pic_name = $usid . "_" . $this->UploadDAO->get_last_pic() . substr($_FILES['fileUpload']['name'][$i],strlen($_FILES['fileUpload']['name'][$i])-4,4);

            $_FILES['userfile']['name']= $_FILES['fileUpload']['name'][$i];
            $_FILES['userfile']['type']= $_FILES['fileUpload']['type'][$i];
            $_FILES['userfile']['tmp_name']= $_FILES['fileUpload']['tmp_name'][$i];
            $_FILES['userfile']['error']= $_FILES['fileUpload']['error'][$i];
            $_FILES['userfile']['size']= $_FILES['fileUpload']['size'][$i];

            if (!$this->upload->do_upload())
            {
                // fail
               // $upload_error = array('error' => $this->upload->display_errors());
                //$this->load->view('page_donor', $upload_error);
              echo $this->upload->display_errors();
                break;
            }


            $data = array(
              'pic_name' => $pic_name,
              'pic_created' => $pic_created,
              'donate_id' => $donate_id
            );
            $insert = $this->UploadDAO->insert_image($data);


        }
        // success
        if ($upload_error == NULL)
        {
            $data['success_msg'] = '<div class="alert alert-success text-center">อัพโหลดเสร็จสมบูรณ์</div>';
            $this->load->view('page_donor', $data);
        }

        //redirect('index.php/donate/donor');
  }
}
?>
