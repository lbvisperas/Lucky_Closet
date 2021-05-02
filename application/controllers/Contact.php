<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            //load model
            $this->load->model('Dashboard_Model');
            $this->load->model('Category_Model');
            $this->load->model('Subcategory_Model');
            $this->load->model('Product_Model',"product_model");
            $this->load->model('Wishlist_Model',"Wishlist_Model");
            $this->load->library('cart');
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->library('encrypt');
            
        }


        public function index()
        {
            if(!empty($_POST))
            {
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $message = $this->input->post('message');
                $this->Dashboard_Model->Insert_Contact($name,$email,$message);
                $this->session->set_flashdata('SUCCESSMSG','Your message has been successfully sent.');
                redirect('contact');
            }
            else
            {
                $data['category_list'] = $this->Category_Model->get_list();
                $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
                $this->load->view('contact',$data);
            }
        }
       
       
}
