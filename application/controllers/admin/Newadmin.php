<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newadmin extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            
            $this->load->model('Login_Model','login_model');
            $this->load->model('Category_Model','category_model');
            $this->load->model('Newadmin_Model','Newadmin_Model');
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
            $output['admin_list'] = $this->Newadmin_Model->get_list();
            $this->load->view('admin/newadmin/list',$output);
        }   

       public function admin_add()
       {
         
           if(!empty($_POST))
           {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user_detail.email]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
             
            if ($this->form_validation->run() == FALSE)
            {
                 $this->load->view('admin/newadmin/add');
            }
            else
            {
                $this->Newadmin_Model->Insert_Admin();
                $this->session->set_flashdata('SUCCESSMSG','New admin has been registered successfully.');
                redirect('account/admin-list');
            }
           }
           else
           {
                $this->load->view('admin/newadmin/add');
           }
       }
       public function DeleteAdmin($id)
       {
            $this->Newadmin_Model->DeleteAdmin($id);
            $this->session->set_flashdata('SUCCESSMSG','Admin has been deleted successfully.');
            redirect('account/admin-list');
       }
}
