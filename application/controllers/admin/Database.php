<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {

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
    			$this->load->view('account/dashboard');
    		}

    		public function backup($fileName='lucky_closet_boutique.zip')
    		{
		    					// Backup Settings
				$prefs = array(
		        'format'        => 'zip',                       // gzip, zip, txt
		        'filename'      => 'lucky_closet_boutique.sql',              // File name - NEEDED ONLY WITH ZIP FILES
		        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
		        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
		        'newline'       => "\n"                         // Newline character used in backup file
				);

				// Backup your entire database and assign it to a variable
				$backup =& $this->dbutil->backup($prefs);

				// Load the file helper and write the file to your server
				$this->load->helper('file');
				write_file(FCPATH.'/downloads/'.$fileName, $backup);

				// Load the download helper and send the file to your desktop
				$this->load->helper('download');
				force_download($fileName, $backup);

    		}
}