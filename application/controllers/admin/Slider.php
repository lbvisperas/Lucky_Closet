<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            
            $this->load->model('Login_Model','login_model');
            $this->load->model('Category_Model','category_model');
            $this->load->model('Subcategory_Model','Subcategory_Model');
            $this->load->model('Slider_Model','Slider_Model');
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
            $data['slider_list'] = $this->Slider_Model->get_list();
            $this->load->view('admin/slider/list',$data);
        }   
        public function DeleteSlider($id)
        {
            $this->Slider_Model->DeleteSlider($id);
            $this->session->set_flashdata('SUCCESSMSG','Slider deleted successfully.');
            redirect('account/list-slider');
        }   

       public function addSlider()
       {
           if(!empty($_POST))
           {
                $insert_id = $this->Slider_Model->slider_insert();
                @mkdir('./upload/slider/'.$insert_id);
                $config['upload_path'] = './upload/slider/'.$insert_id.'/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
                $config['file_name'] = strtolower($_FILES['slider_image']['name']);
                $this->upload->initialize($config);
                $this->upload->do_upload('slider_image');
                $upload_data	= $this->upload->data();
                $mainimagefilename	= $upload_data['file_name'];
                $this->Common_Modal->compress_image('./upload/slider/'.$insert_id.'/'.$mainimagefilename, './upload/slider/'.$insert_id.'/'.$mainimagefilename, 50);
                $this->Slider_Model->update_image($insert_id, $mainimagefilename);
                $this->session->set_flashdata('SUCCESSMSG','Slider Image Added Successfully');
                redirect('account/list-slider');
           }
           else
           {
                $this->load->view('admin/slider/add');
           }
       }
}
