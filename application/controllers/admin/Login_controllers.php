<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controllers extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            
            $this->load->model('Login_Model','login_model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->database();
            
	}
        
	public function index()
	{
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required');
                
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('admin/login');
                }
                else
                {
                    $this->load->library('session');
                    $email = strtolower($this->input->post('email'));
                    $password = strtolower($this->input->post('password'));
                    $result = $this->login_model->login($email,$password);
                    if($result -> num_rows() > 0)
                    {
                        foreach ($result->result() as $row)
                        {
                            $this->session->userid = $row->id;
                            $this->session->admin = $row->is_Admin;
                            $this->session->email =  $row->email;
                            redirect('account/dashboard');
                        }
                    }
                    else
                    {
                        $this->session->set_flashdata('SUCCESSMSG','Email and Password is wrong, or you may not have administrator access. Sorry.');
                        redirect('account/login');
                    }
                }
       }
     
       public function logout()
       {
            $this->load->helper('url');  
            $this->load->library('session');
            $this->session->sess_destroy();
            redirect('account/login');
       }
      
}
