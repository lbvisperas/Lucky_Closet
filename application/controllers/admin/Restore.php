<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restore extends CI_Controller {

	        public function __construct()
	{
            parent::__construct();
            
            $this->load->helper('url');
            $this->load->helper('file');
        	$this->load->helper('download');
        	$this->load->library('zip');
        	$this->load->dbutil();
    }

    		public function index()
    		{
    			$this->load->view('admin/db_restore');
    		}

            public function db_restore()
            {
                if(!empty($_POST))
                {
                    $path = $_FILES["sqlpath"]["tmp_name"];
                    include('./include/db_backup_library.php');
                    $dbbackup = new db_backup;
                    $dbbackup->connect("localhost","root","password","lucky-closet-boutique");
                    $dbbackup->backup();
                    if($dbbackup->db_import("$path"))
                    {
                        echo "Database Successfully Imported";
                        $success = 1;
                        {header("location:http://localhost/project/index.php/mycontroller/C_restore/$success");}
                    }

                }
            }
}