<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserDAO extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }
  function login($email,$password){ //ฟังก์ชันเข้าสู่ระบบ โดยรับค่ามาจาก view
      $query = $this->db->query("SELECT * FROM user WHERE user_email = '".$email."' AND user_password = '".$password."'");
      foreach ($query->result_array() as $row){
        if($query->num_rows() == 1){
          $data = array(
                    'uid'=> $row['user_id'],
                    'email'=> $row['user_email'],
                    'fname'=> $row['user_fname'],
                    'lname'=> $row['user_lname'],
                    'utype'=> $row['user_type'],
                    'logged_in'=>TRUE
                  );
          $this->session->set_userdata($data);
          return true;
        }else{
           return false;
        }
      }
    }

    function email_isnt_exist($email){
      $query = $this->db->query("SELECT user_email FROM user WHERE user_email = '".$email."'");
      $row = $query->row();
      if (!isset($row))
        {
          return true;
        }
    }

    function get_question(){ //query คำถามจาก database
      $query = $this->db->query('SELECT * FROM question');
      return $query->result();
    }

    function search_answer($email,$question,$answer){ //ค้นหาคำตอบคำถามและอีเมล์ที่รับมากจาก user ว่าถูกต้องหรือไม่
      $query = $this->db->query("select user_fname FROM user WHERE user_email = '".$email."' AND question_id = '".$question."' AND user_answer = '".$answer."'");
      foreach ($query->result_array() as $row){
        if($query->num_rows() == 1){
          return true;
        }else{
           return false;
        }
      }
    }

    function update_password($password,$email){ //ฟังก์ชันรีเซตรหัสผ่าน โดยรหัสผ่านที่รับมาจะถูก hash มาแล้ว
      $email_ = trim($email);
      $query = $this->db->query("UPDATE user SET user_password = '".$password."' WHERE user_email = '".$email_."'");
    }
}
