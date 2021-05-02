<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            
            $this->load->model('Login_Model','login_model');
            $this->load->model('Category_Model','category_model');
            $this->load->model('Subcategory_Model','Subcategory_Model');
            $this->load->model('Sale_Model','Sale_Model');
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
           if(!empty($_POST))
		{
			$buyer_name = $this->input->post('buyer_name');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$created_name = $this->input->post('created_name');
                        $allRecord = $this->Sale_Model->getAllHistoryRecord($buyer_name,$start_date,$end_date,$created_name);
			$output['sale_list'] = $allRecord;
			$output['start_date'] = $start_date;
			$output['end_date'] = $end_date;
                        $output['Buyer_Name'] = $this->Sale_Model->Buyer_Name();
			$output['created_names'] = $created_name;
			$output['buyername'] = $buyer_name;
                        $this->load->view('admin/sale/list',$output);
		}
                else
                {
                    $output['Buyer_Name'] = $this->Sale_Model->Buyer_Name();
                    $output['sale_list'] = $this->Sale_Model->get_list();
                    $this->load->view('admin/sale/list',$output);
                }
            
            
            
        }   
        
        
        
        public function shipped()
        {
            if(!empty($_POST))
		{
			$buyer_name = $this->input->post('buyer_name');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$created_name = $this->input->post('created_name');
                      
			$allRecord = $this->Sale_Model->getAllHistoryRecordStatus($buyer_name,$start_date,$end_date,$created_name);
			$output['sale_list'] = $allRecord;
			$output['start_date'] = $start_date;
			$output['end_date'] = $end_date;
                        $output['Buyer_Name'] = $this->Sale_Model->Buyer_Name_Status();
			$output['created_names'] = $created_name;
			$output['buyername'] = $buyer_name;
                        $this->load->view('admin/sale/list',$output);
		}
                else
                {
                    $output['Buyer_Name'] = $this->Sale_Model->Buyer_Name_Status();
                    $output['sale_list'] = $this->Sale_Model->shipped();
                    $this->load->view('admin/sale/shipped',$output);
                }
            
        }   
        
        public function SaleDetail($id)
        {
            $output['sale_detail'] = $this->Sale_Model->SaleDetail($id);
            $output['sale_address_detail'] = $this->Sale_Model->Address_Detail($id);
            $output['deliver_sale'] = $this->Sale_Model->Deliver_Sale($id);
            $this->load->view('admin/sale/detail',$output);
        }   
        public function SaleStatus($id)
        {
            $output['deliver_sale'] = $this->Sale_Model->SaleStatus($id);
            $this->session->set_flashdata('SUCCESSMSG','Order was successfully made.');
            redirect('account/sale-detail/'.$id);
        }   
        
     
        
}
