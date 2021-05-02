<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            
            $this->load->model('Login_Model','login_model');
            $this->load->model('Category_Model','category_model');
            $this->load->model('Subcategory_Model','Subcategory_Model');
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
            $product_code            = trim($this->input->get('product_code'));
            $product_description    = trim($this->input->get('product_description'));
            $category_id            = trim($this->input->get('product_category'));
            $output['product_list'] = $this->Product_Model->getProductList($product_code,$product_description,$category_id);
            $output['category_list'] = $this->category_model->get_list();
            $this->load->view('admin/product/list',$output);
        }   

       public function product_add()
       {
         
           if(!empty($_POST))
           {
            $this->form_validation->set_rules('product_code', 'Product Code', 'required');
            $this->form_validation->set_rules('product_name', 'Product Name', 'required');
            $this->form_validation->set_rules('product_description', 'Product Description', 'required');
            $this->form_validation->set_rules('product_category', 'Product Category', 'required');
            $this->form_validation->set_rules('product_type', 'Product Type', 'required');
            $this->form_validation->set_rules('rate', 'Product Price', 'required');
            if($_FILES['product_image']['name']=='')
                       $this->form_validation->set_rules('product_image','Image','required');
             
            if ($this->form_validation->run() == FALSE)
            {
                $data['product_list'] = $this->Product_Model->get_list();
                $data['category_list'] = $this->category_model->get_list();
                $this->load->view('admin/product/product_add',$data);
            }
            else
            {
                
                if(!empty($this->input->post('sub_category_id')))
                {
                    $sub_category_id = implode(",", $this->input->post('sub_category_id'));
                }
                else
                {
                    $sub_category_id= '';
                }
                if(!empty($this->input->post('relatedproduct')))
                {
                    $relatedproduct = implode(",", $this->input->post('relatedproduct'));
                }
                else
                {
                    $relatedproduct = '';
                }    
                $insert_id = $this->Product_Model->product_insert($sub_category_id,$relatedproduct);
//                @mkdir('./upload/product/'.$insert_id.'/',0777,true);
//                @chmod('./upload/product/'.$insert_id.'/',0777);
                @mkdir('./upload/product/'.$insert_id);
                $config['upload_path'] = './upload/product/'.$insert_id.'/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
                $config['file_name'] = strtolower($_FILES['product_image']['name']);
                $this->upload->initialize($config);
                $this->upload->do_upload('product_image');
                $upload_data	= $this->upload->data();
                $mainimagefilename	= $upload_data['file_name'];
                
                $this->Common_Modal->compress_image('./upload/product/'.$insert_id.'/'.$mainimagefilename, './upload/product/'.$insert_id.'/'.$mainimagefilename, 50);
                $this->Product_Model->update_image($insert_id, $mainimagefilename);
                $this->session->set_flashdata('SUCCESSMSG','Product Added Successfully');
                redirect('account/produc-list');
            }
           }
           else
           {
                $data['product_list'] = $this->Product_Model->get_list();
                $data['category_list'] = $this->category_model->get_list();
                $this->load->view('admin/product/product_add',$data);
           }
       }
        public function product_edit()
        {
              if(!empty($_POST)){	
                  
		$output['product_id'] = $product_id =  $this->input->post('product_id');
		$output['type'] = $type =  $this->input->post('type');
		$productData = $this->Product_Model->getProductById($product_id);
		
		if($type=='product_name'){
			$output = $productData->product_name;
                        $data['name'] = 'Name';
                        $data['html'] = '<input class="form-control product_value" type="text" id='.$productData->id.' data-type="product_name" value="'.$output.'">';
		} 
                else if($type=='product_category')
                {
                    $category_value = '';
                    $output = $productData->category_id;
                    $category_list = $this->category_model->get_list();
                    foreach($category_list as $value)
                    {
                        $selected = '';
                        if($value->id == $output)
                            $selected = 'selected';
                        $category_value.=  '<option value='.$value->id.' '.$selected.'>'.$value->category_name.'</option>';
                    }
                    $data['name'] = 'Product Ccategory';
                    
                    $data['html'] = '<select class="form-control product_value" required id='.$productData->id.' data-type="product_category">
                                        <option value="">Select category</option>
                                       '.$category_value.'
                                    </select>';
                }
                else if($type=='product_description')
                {
                    $output = $productData->product_description;
                    $data['name'] = 'Product Description';
                    $data['html'] = '<textarea class="form-control product_value" id='.$productData->id.' data-type="product_description" name="val-suggestions" rows="10" placeholder="Share your ideas with us..">"'.$output.'"</textarea>';
                }
//                else if($type=='product_price')
//                {
//                    $output = $productData->product_price;
//                    $data['name'] = 'Product Price';
//                    $data['html'] = '<input class="form-control product_value" type="text" id='.$productData->id.' data-type="product_price" value="'.$output.'">';
//                }
                echo json_encode($data);
	  }
        }
        
        public function product_edit_submit()
        {
            if(!empty($_POST)){	
                $product_id =  $this->input->post('product_id');
		$product_value =  $this->input->post('product_value');
		$type =  $this->input->post('type');
		$productData['value'] = $this->Product_Model->getProductedit_value_submit($product_id,$product_value,$type);
                $data['success'] = $productData;
                $this->session->set_flashdata('SUCCESSMSG','Product Updated Successfully');
                echo json_encode($data);
            }
        }
        public function get_product_edit($product)
        {
            if(!empty($_POST))
            {
                $this->form_validation->set_rules('product_code', 'Product Code', 'required');
                $this->form_validation->set_rules('product_name', 'Product Name', 'required');
                $this->form_validation->set_rules('product_description', 'Product Description', 'required');
                $this->form_validation->set_rules('product_category', 'Product Category', 'required');
                $this->form_validation->set_rules('product_type', 'Product Type', 'required');
                $this->form_validation->set_rules('rate', 'Product Price', 'required');
               
                
                if ($this->form_validation->run() == FALSE)
                {
                    $data['product_list'] = $this->Product_Model->get_list();
                    $data['category_list'] = $this->category_model->get_list();
                    $this->load->view('admin/product/product_add',$data);
                }
                else
                {

                    if(!empty($this->input->post('sub_category_id')))
                    {
                        $sub_category_id = implode(",", $this->input->post('sub_category_id'));
                    }
                    else
                    {
                        $sub_category_id= '';
                    }
                    if(!empty($this->input->post('relatedproduct')))
                    {
                        $relatedproduct = implode(",", $this->input->post('relatedproduct'));
                    }
                    else
                    {
                        $relatedproduct = '';
                    }    
                    $insert_id = $this->input->post('product_id');
                    if($_FILES['product_image']['name']=='')
                    {
                        $mainimagefilename = $this->input->post('ProductImageValue');
                    }
                    else
                    {
                        $config['upload_path'] = './upload/product/'.$insert_id.'/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $this->load->library('upload', $config);
                        $config['file_name'] = strtolower($_FILES['product_image']['name']);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('product_image');
                        $upload_data	= $this->upload->data();
                        $mainimagefilename	= $upload_data['file_name'];
                        $this->Common_Modal->compress_image('./upload/product/'.$insert_id.'/'.$mainimagefilename, './upload/product/'.$insert_id.'/'.$mainimagefilename, 50);
                    }
                    
                    $this->Product_Model->ProductEdit_Update($insert_id, $mainimagefilename,$sub_category_id,$relatedproduct);
                    $this->session->set_flashdata('SUCCESSMSG','Product updated Successfully');
                    redirect('account/produc-list');
                }
            }
            else
            {
                $data['product_list'] = $this->Product_Model->get_list();
                $data['products_edit'] = $this->Product_Model->get_product_edit($product);
                $data['category_list'] = $this->category_model->get_list();
                $this->load->view('admin/product/edit',$data);  
            }
        }
        
        function genret_code() {
            $pass = "";
            $chars = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");

            for ($i = 0; $i < 15; $i++) {
                $pass .= $chars[mt_rand(0, count($chars) - 1)];
            }
            return $pass;
        }
    
        public function product_code()
        {
            $code = $this->genret_code();
            $response = $this->Product_Model->check_existance($code);
            if ($response) {
                    $this->productCode();
               } else {
                   echo $code;
                   exit;
               }
               exit;
        }
        
        public function get_product_edit_submit()
        {
            
            $product_id = $this->input->post('product_id');
            $product_name = strtolower($this->input->post('product_name'));
            $product_price = strtolower($this->input->post('product_price'));
            $product_discount = strtolower($this->input->post('product_discount'));
            $product_description = strtolower($this->input->post('product_description'));
            $product_link = strtolower($this->input->post('product_link'));
            $product_category = strtolower($this->input->post('product_category'));
            if($_FILES['product_image']['name']!= "")
            {
                $images = time().$_FILES["product_image"]["name"];
                move_uploaded_file($_FILES["product_image"]["tmp_name"], 'upload/'.$images);
            }
            else
            {
                $images = $this->input->post('product_image_data');
            }
            
            $data=array('product_name'=>$product_name,
                'product_image'=>$images,
                'product_price'=>$product_price,
                'product_discount'=>$product_discount,
                'product_category'=>$product_category,
                'product_detail_link'=>$product_link,
                'product_description'=>$product_description,
                'update_date'=>date('Y-m-d H:i:s'),
                );
            $datavalue = $this->Product_Model->edit_list_submit($data,$product_id);
            $this->session->set_flashdata('SUCCESSMSG','Product Updated Successfully');
            redirect('account/produc-list');
        }
        public function subcategory_view()
        {
            $id = $this->input->post('category_id');
            $response = $this->Subcategory_Model->viewSubCategory($id);
            $htmlvalue='';
             if(!empty($response))
             {
                     foreach($response as $valCat) { 
                        $htmlvalue.='<option style="text-transform: capitalize;" value="'.$valCat->subcat_id.'">'.$valCat->subcategory_name.'</option>'; 
                     }
                     $html = '<label class="col-md-2 control-label">Sub Category<span class="text-danger">*</span></label></div><div class="col-md-7"><select name="sub_category_id[]" class="form-control" multiple><option value="">Select Sub Category</option>'.$htmlvalue.'</select> ';  
             }
             else 
             {
                 $html = '<label class="col-md-2 control-label">Sub Category<span class="text-danger">*</span></label></div><div class="col-md-7"><select name="sub_category_id[]" class="form-control" multiple></select> ';  
             }
             $data['html'] = $html;
             echo json_encode($data);
        }
        
        public function deleteProduct($id) 
        {
            $this->Product_Model->deleteProduct($id);
            $this->session->set_flashdata('SUCCESSMSG','Product has been deleted successfully.');
            redirect('account/produc-list');
        }
        
        public function ProductStatus($id,$status) 
        {
            $this->Product_Model->ProductStatus($id,$status);
            $this->session->set_flashdata('SUCCESSMSG','Product status has been updated successfully.');
            redirect('account/produc-list');
        }
        public function ProductDetail() 
        {
            $product_id = $this->input->post('product_id');
            $response = $this->Product_Model->ProductDetail($product_id);
            $sub_cate='';
            foreach($response as $val) { 
                $data['product_code'] = $val->product_code;    
                $data['product_name'] = $val->product_name;    
                $data['product_description'] = $val->product_description;    
                $id = $val->category_id;    
                $category_responce = $this->category_model->editCategory($id);
                foreach ($category_responce as $cat)
                {
                    $data['category_list'] = $cat->category_name;    
                    $ub_cate = $cat->id;
                    $ub_cate_response = $this->Subcategory_Model->viewSubCategory($ub_cate);
                    foreach ($ub_cate_response as $subcate)
                    {
                       $sub_cate.=  $subcate->subcategory_name.',';
                    }
                }
            }
            $value=trim($sub_cate,",");
            $data['sub_cate'] = $value;
            echo json_encode($data);
        }
}
