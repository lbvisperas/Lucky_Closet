<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
            $this->cart->product_name_rules = '[:print:]';
        }


        public function index()
        {
         
        }
       
            function add()
            {
                $image =  $this->input->post('image');
                $insert_data = array(
                        'id' => $this->input->post('id'),
                        'name' => $this->input->post('name'),
                        'price' => $this->input->post('price'),
                        'image' => $this->input->post('image'),
                        'qty' => 1
                );		
                $this->cart->insert($insert_data);
                redirect('cart');
            }
            function remove($rowid) {
                   
		if ($rowid==="all"){
                   	$this->cart->destroy();
		}else{
                   	$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
                   	$this->cart->update($data);
		}
            	redirect('cart');
	}
	
        function update_cart(){
            // Recieve post values,calcute them and update
            $cart_info =  $_POST['cart'] ;
            foreach( $cart_info as $id => $cart)
            {	
                $rowid = $cart['rowid'];
                $price = $cart['price'];
                $amount = $price * $cart['qty'];
                $qty = $cart['qty'];

                    $data = array(
                            'rowid'   => $rowid,
                            'price'   => $price,
                            'amount' =>  $amount,
                            'qty'     => $qty
                    );

                    $this->cart->update($data);
            }
            redirect('cart');        
	}
       
	
}
