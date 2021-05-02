<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            //load model
            $this->load->model('Dashboard_Model');
            $this->load->model('Category_Model');
            $this->load->model('Subcategory_Model');
            $this->load->model('Product_Model',"product_model");
			$this->load->model('Login_Model',"login_model");
            $this->load->library('cart');
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->library('encrypt');
             $this->load->library('pagination');
        }


        public function index()
        {
            $data['category_list'] = $this->Category_Model->get_list();
            $data['slider'] = $this->Dashboard_Model->get_slider();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
			$this->load->view('edit_profile', $data);
        }
	
	public function update_profile()
	{
        if(!empty($_POST))
            {
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $this->form_validation->set_rules('firstname', 'FirstName', 'trim|required|alpha');
                $this->form_validation->set_rules('lastname', 'LastName', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
               
                if ($this->form_validation->run() == FALSE)
                {
                    $data['category_list'] = $this->Category_Model->get_list();
                    $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
                    $this->load->view('edit_profile',$data);
                }
                else
                {	
					$id = $this->session->userid;
					$querybuild = array(
                            'email' => $this->input->post('email'),
                            'phone' => $this->input->post('phone'),
                            'first_name' => $this->input->post('firstname'),
                            'last_name' => $this->input->post('lastname'),
							'modified_date' => date("Y-m-d H:i:s")
                    );
                    $isupdate = $this->login_model->update($querybuild, $id);
					if($isupdate > 0){
						$this->session->set_flashdata('error','User updated successfully.');
						$this->session->set_userdata('firstname',$this->input->post('firstname'));
						$this->session->set_userdata('lastname',$this->input->post('lastname'));
						$this->session->set_userdata('email',$this->input->post('email'));
						$this->session->set_userdata('phone',$this->input->post('phone'));
					}else{
						$this->session->set_flashdata('error','User update failed.');
					}
					$data['category_list'] = $this->Category_Model->get_list();
                    $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
					$this->load->view('edit_profile',$data);
                }
            }
            else
            {
                $data['category_list'] = $this->Category_Model->get_list();
                $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
                $this->load->view('edit_profile',$data);
            }

	}
}
