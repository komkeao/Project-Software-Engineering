<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DonationDAO extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  function get_donate_type(){
    $query = $this->db->query('SELECT * FROM donatetype');
    return $query->result();
  }

  function do_donor($data){
    $this->db->insert('donate', $data);
  }

  function editdo_donor($data,$did){
    $this->db->where('donate_id', $did);
    $this->db->update('donate', $data); 
  }

  function get_last_id_donation(){
    $query = $this->db->query('SELECT donate_id FROM donate WHERE user_id = '.$_SESSION['uid'].' ORDER BY donate_id DESC LIMIT 1');
    $row = $query->row();
    return $row->donate_id;
  }

  function edit_donor($last_id_donation){
    $query = $this->db->query('SELECT * FROM donate WHERE donate_id = '.$last_id_donation.' ORDER BY donate_id DESC LIMIT 1');
    return $query->result();
  }

}
