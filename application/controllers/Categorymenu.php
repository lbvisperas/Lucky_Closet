<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorymenu extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            //load model
            $this->load->model('Dashboard_Model');
            $this->load->model('Category_Model');
            $this->load->model('Subcategory_Model');
            $this->load->model('Product_Model',"product_model");
            $this->load->library('cart');
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->library('encrypt');
        }


        public function index($id)
        {
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $data['subcategory_list'] = $this->Subcategory_Model->viewSubCategory($id);
            $data['category_id'] = $id;
            
            foreach ($data['category_list'] as $cat)
            {
                if($cat->id == $id)
                {
                    $data['category_title'] = $cat->category_name;
                }
            }
    
            $this->load->view('categorymenu',$data);
        }
	
}
