<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	function __construct()
	{
	    parent::__construct();
            $this->load->library('session');
            $this->load->model('Dashboard_Model');
            $this->load->model('Category_Model');
            $this->load->model('Subcategory_Model');
            $this->load->library('cart');
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->library('encrypt');
            $this->load->model('Checkout_Model');
            if ($this->session->userdata('userid')== "")
            {
                redirect('login');
            }
        }
        public function index()
	{
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $this->load->view('checkout',$data);
            $this->step_1();
        }
   
       public function step_1()
        {
			if($this->input->post('cdetail'))
			{
                                    if(!empty($_POST))
                                    {
                                        $uid=$this->session->userdata('userid');
                                        
                                        $country = $this->input->post('country');
                                        $city = $this->input->post('city');
                                        $province = $this->input->post('province');
                			$postcode = $this->input->post('postcode');
                                        $add1 = $this->input->post('add1');
                			$add2 = $this->input->post('add2');
                                        $fname = $this->input->post('fname');
                			$lname= $this->input->post('lname');
                                        $phone = $this->input->post('phone');
                			$email = $this->input->post('email');
							
							 
							 
                    		$insert_id = $this->Checkout_Model->addcheckout($country,$city,$province,$postcode,$add1,$add2,$fname,$lname,$phone,$email,$uid);
							$in=$this->db->insert_id();
							$checkout_id=$this->session->userdata('checkout_id');
							$this->session->set_userdata('checkout_id',$in);
								redirect('checkout/step_3');
							
							
					}
			}
                    
	}
	public function step_2()
        {
            $category =  $this->subcategory_model->getCategoryList();
            foreach($category as $cat)
            {
                $cat_list['cat'] = $cat->category_name;
                $cat_list['cat_id'] = $cat->id;
                $subcategory = $this->subcategory_model->getSubCategoryList($cat->id);

                $cat_list['sub'] = $subcategory;
                $result[] = $cat_list;
            }
            $data['result'] = $result;
            $footer['footer'] = $this->page_model->getPagedata();
            $this->load->view($this->config->item('fronttemplate').'/front_header',$data);
            $this->load->view($this->config->item('fronttemplate').'/step-2');
            $this->load->view($this->config->item('fronttemplate').'/front_footer',$footer);
			 

             //redirect('front/checkout/step_3');       
	}
        
	public function step_3()
        {
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $this->load->view('step_3',$data);
            if($this->input->post('paymentdetail'))
            {
                      if(!empty($_POST))
                      {
                                    $uid=$this->session->userdata('userid');

                                    $payment = $this->input->post('payment');
                                    $checkout_id=$this->session->userdata('checkout_id');
                                    $this->Checkout_Model->addpayment($payment,$checkout_id,$uid);
                                    redirect('checkout/step_4');
                    }
            }
			     
	}
	public function step_4()
        {
                                if($this->input->post('confirm'))
                                {
                                        $uid=$this->session->userdata('userid');
                                        $total=0;
                                        $qu=0;
                                        //add to cart in database
                                        if(!empty($this->cart->contents()))
                                        {
                                                    $total = 0;
                                                    $total_cart=$this->cart->total_items();
                                                    $this->Checkout_Model->insertcart($total_cart);
                                                    $insert_id=$this->db->insert_id();
                                                    $checkout_id=$this->session->userdata('checkout_id');
                                                    $this->Checkout_Model->addcheckoutcart($insert_id,$checkout_id,$uid);
                                                    foreach ($this->cart->contents() as $items):
                                                             $ip = $_SERVER['REMOTE_ADDR'];
                                                            $total = $total + (($items['qty']) * ($items['price']));
                                                            $qu = $qu + $items['qty'];
                                                            $this->Checkout_Model->insertcartproductdetail($insert_id,$items['id'],$items['price'],$items['qty'],$ip);
                                                    endforeach;
                                        }
                                        //add sales detail to database
                                        $byname=$this->session->userdata('firstname');
        //				$createby=$this->session->userdata('mem_id');
                                        if(empty($byname)){
                                            redirect('dashboard');
                                        }
                                        $createby= '0';
                                        $this->Checkout_Model->addsale($byname,$total,$createby,$qu);
                                        $insert=$this->db->insert_id();
                                        $this->Checkout_Model->addcheckoutcart($insert,$checkout_id,$uid);
                                        $output['cartdetail'] = $this->Checkout_Model->getcartdata($uid);
                                        foreach ($output['cartdetail'] as $select4):

                                                        $this->Checkout_Model->addsaledetail($insert,$select4);
                                        endforeach;		
                                        $this->cart->destroy();
                                        $this->db->set('is_shipped',1);
                                        $this->db->where('userid',$uid);
                                        $this->db->update('tbl_cart');
                                        $this->session->set_flashdata('SUCCESSMSG','Your order is successfully placed.');
                                        redirect('cart');
				}
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $this->load->view('step_4',$data);		
       }
	
	
}
