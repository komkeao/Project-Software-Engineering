<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
  class UploadDAO extends CI_Model {

    public function __construct() {
      parent::__construct();
    }
    function insert_donate($data){
      $this->db->insert('donate', $data);
    }

    function insert_image($data){
      $this->db->insert('picture', $data);
    }
    function get_donate_list(){
        $query = $this->db->query('SELECT * FROM donatetype');
        return $query->result();
    }
    function get_last_donate(){
      $query = $this->db->query('SELECT donate_id FROM donate ORDER BY donate_id DESC LIMIT 1');
      $row = $query->row();
      return $row->donate_id;
    }
    function get_last_pic(){
      $query = $this->db->query('SELECT pic_id FROM picture ORDER BY pic_id DESC LIMIT 1');
      $row = $query->row();
      return $row->pic_id;
    }
}
?>
