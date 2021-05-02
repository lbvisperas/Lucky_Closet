<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

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
            
            if ($this->session->userdata('userid')== "")
            {
                redirect('login');
            }
        }


        public function index()
        {
             if(!empty($_POST))
             {
                $product_id = $this->input->post('product_id');
                $product_price = $this->input->post('product_price');
                $allRecord = $this->Wishlist_Model->InsertWishlist($product_id,$product_price);
                $data['category_list'] = $this->Category_Model->get_list();
                $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
                $data['wishlist_list'] = $this->Wishlist_Model->get_list();
                $this->load->view('wishlist',$data);
             }
             else
             {
                $data['category_list'] = $this->Category_Model->get_list();
                $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
                $data['wishlist_list'] = $this->Wishlist_Model->get_list();
                $this->load->view('wishlist',$data);
             }
        }
        public function DeleteWishlist($id)
        {
            $this->Wishlist_Model->DeleteWishlist($id);
            redirect('wishlist');
        }
       
}
