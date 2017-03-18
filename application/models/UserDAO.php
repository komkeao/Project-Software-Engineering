<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
  class UserDAO extends CI_Model {

    public function __construct() {
      parent::__construct();
    }
    function get_question(){
      $query = $this->db->query('SELECT * FROM question');
      return $query->result();
    }

    function login($email,$password){
      $query = $this->db->query("SELECT user_id,user_fname,user_lname, user_email FROM user WHERE user_email = '".$email."' AND user_password = '".$password."'");
      foreach ($query->result_array() as $row)
      {
        if($query->num_rows() == 1)
        {
          $data = array(
                    'uid'=> $row['user_id'],
                    'email'=> $row['user_email'],
                    'fname'=> $row['user_fname'],
                    'lname'=> $row['user_lname'],
                    'logged_in'=>TRUE
                  );
          $this->session->set_userdata($data);
          return true;
        }
        else
        {
           return false;
        }
      }
    }
    function search_answer($email,$question,$answer){
      $query = $this->db->query("select user_fname FROM user WHERE user_email = '".$email."' AND question_id = '".$question."' AND user_answer = '".$answer."'");
      foreach ($query->result_array() as $row)
      {
        if($query->num_rows() == 1)
        {
          return true;
        }
        else
        {
           return false;
        }
      }
    }

    function update_password($password,$email){
      $data = array(
        'user_password' => $password
      );
      $this->db->where('user_email', $email);
      $this->db->update('user', $data);
    }
}
?>
