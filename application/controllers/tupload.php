<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class tupload extends CI_Controller
{
    function __construct() {
        parent::__construct();
    }
    public function index(){
      $this->load->view('tupload');
    }

    public function tupload(){
        if($this->input->post('submit')){
            //Upload to the local server
            $config['upload_path'] = 'images/';
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);

            if($this->upload->do_upload('file'))
            {
                //Get uploaded file information
                $upload_data = $this->upload->data();
                $fileName = $upload_data['file_name'];

                //File path at local server
                $source = 'images/'.$fileName;

                //Load codeigniter FTP class
                $this->load->library('ftp');

                //FTP configuration
                $ftp_config['hostname'] = 'ftp://10.199.66.227/';
                $ftp_config['username'] = 'group11';
                $ftp_config['password'] = 'qEdr8t';
                $ftp_config['debug']    = TRUE;

                //Connect to the remote server
                $this->ftp->connect($ftp_config);

                //File upload path of remote server
                $destination = '/assets/'.$fileName;

                //Upload file to the remote server
                $this->ftp->upload($source, ".".$destination);

                //Close FTP connection
                $this->ftp->close();

                //Delete file from local server
                @unlink($source);
            }
        }
        $this->load->view('page_index');
    }
}
