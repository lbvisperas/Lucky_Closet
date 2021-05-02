<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            
            $this->load->model('Login_Model','login_model');
            $this->load->model('Category_Model','category_model');
            $this->load->model('Subcategory_Model','Subcategory_Model');
            $this->load->model('Customer_Model','Customer_Model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->database();
            $this->load->model('Product_Model');
            $this->load->model('Common_Modal');
            if($this->session->email == "")
            {
                redirect('account/login');
            }
	}
        
        public function index()
        {
            $data['slider_list'] = $this->Customer_Model->get_list();
            $this->load->view('admin/customer/list',$data);
        }   
        public function DeleteCustomer($id)
        {
            $this->Customer_Model->DeleteCustomer($id);
            $this->session->set_flashdata('SUCCESSMSG','Customer has been deleted successfully.');
            redirect('account/customer-list');
        }   
}
