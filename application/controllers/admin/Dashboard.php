<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            
            $this->load->model('Admin_Dashboard_Model','Admin_Dashboard_Model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->database();
            if($this->session->email == "")
            {
                redirect('account/login');
            }
    	}
        
	public function index()
	{
            
            $data['todaysale'] = $this->Admin_Dashboard_Model->todaysale();
            $data['totalsum'] = $this->Admin_Dashboard_Model->totalsum();
            $data['todaysalelist'] = $this->Admin_Dashboard_Model->todaysalelist();
            $data['counttotalsum'] = $this->Admin_Dashboard_Model->counttotalsum();
            $data['customer_list'] = $this->Admin_Dashboard_Model->customer_list();
            $this->load->view('admin/dashboard',$data);
        }
}
