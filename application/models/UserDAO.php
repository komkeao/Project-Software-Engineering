<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
  class UserDAO extends CI_Model {

    public function __construct() {
      parent::__construct();
    }
    function get_question(){
      $query = $this->db->query('SELECT * FROM question');
      return $query->result();
    }
}
?>
