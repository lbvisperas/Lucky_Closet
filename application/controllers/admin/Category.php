<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            
            $this->load->model('Category_Model');
            $this->load->model('Common_Modal');
            $this->load->model('Subcategory_Model');
            if($this->session->email == "")
            {
                redirect('account/login');
            }
	}
        
        public function index()
        {
            
            $data['category_list'] = $this->Category_Model->get_list();
            $this->load->view('admin/category/list',$data);
        }   

       public function category_add()
       {
            $this->form_validation->set_rules('category_name', 'Category Name', 'required|is_unique[tbl_category.category_name]');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('admin/category/add');
            }
            else
            {
                $category_name = strtolower($this->input->post('category_name'));
                $user_id = $this->session->userid;
                $data = array(
                        'category_name' => $category_name,
                        'created_by' => $user_id,
                        'created_date' => date("Y-m-d H:i:s"),
                        'status' => '0'
                );
                $insert = $this->Category_Model->CategoryAdd($data);
                $this->session->set_flashdata('SUCCESSMSG','Category Created Successfully');
                redirect('account/category-add');
                
            }
            
       }
        public function addSubCategory($id) {
            if(!empty($_POST))
            {		
                $this->form_validation->set_rules('sub_category_name', 'Sub Category Name', 'trim|required');
                if($_FILES['subimage']['name']=='')
                       $this->form_validation->set_rules('subimage','Image','required');

                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('admin/subcategory/add');
                }
                else
                {
                    $insert_id = $this->Subcategory_Model->add($id);
//                    @mkdir('./upload/subcategory/'.$insert_id.'/',0777,true);
                    @mkdir('./upload/subcategory/'.$insert_id);
//                    @chmod('./upload/subcategory/'.$insert_id.'/',0777);
                    $config['upload_path'] = './upload/subcategory/'.$insert_id.'/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $this->load->library('upload', $config);
                    $config['file_name'] = strtolower($_FILES['subimage']['name']);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('subimage');
                    $upload_data	= $this->upload->data();
                    $subfilename	= $upload_data['file_name'];
                    $this->Common_Modal->compress_image('./upload/subcategory/'.$insert_id.'/'.$subfilename, './upload/subcategory/'.$insert_id.'/'.$subfilename, 50);
//                    $this->compress_image('./upload/subcategory/'.$insert_id.'/'.$subfilename, './upload/subcategory/'.$insert_id.'/'.$subfilename, 50); 
                    $this->Subcategory_Model->update_image($insert_id, $subfilename);
                    $this->session->set_flashdata('SUCCESSMSG','Subcategory Added Successfully');
                    redirect('account/category');
                }
            }
            else
            {
                $this->load->view('admin/subcategory/add');
            }

        }
        
        public function viewSubCategory($id) {
               $data['subCategoryList'] = $this->Subcategory_Model->viewSubCategory($id);
               $this->load->view('admin/subcategory/list',$data);
        }
 
        public function editSubCategory($id) {
            if(!empty($_POST))
            {
                
                $this->form_validation->set_rules('sub_category_name', 'Sub Category Name', 'trim|required');
                if ($this->form_validation->run() == FALSE)
                {
                    $data['editSubCategory'] = $this->Subcategory_Model->editSubCategory($id);
                    $this->load->view('admin/subcategory/edit',$data);
                }
                else
                {
                    $insert_id = $this->input->post('insertid');   
                    $subcategory_name = $this->input->post('sub_category_name');   
                    if($_FILES['subimage']['name']=='')
                    {
                        $subfilename = $this->input->post('sub_category_image');   
                    }
                    else
                    {
                        $config['upload_path'] = './upload/subcategory/'.$insert_id.'/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $this->load->library('upload', $config);
                        $config['file_name'] = strtolower($_FILES['subimage']['name']);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('subimage');
                        $upload_data	= $this->upload->data();
                        $subfilename	= $upload_data['file_name'];
                        $this->Common_Modal->compress_image('./upload/subcategory/'.$insert_id.'/'.$subfilename, './upload/subcategory/'.$insert_id.'/'.$subfilename, 50);
                    }
                  
                    $this->Subcategory_Model->editSubCategorySubmit($insert_id, $subfilename,$subcategory_name);
                    $this->session->set_flashdata('SUCCESSMSG','Subcategory successfully updated.');
                    redirect('account/category');
                    
                }
            } 
            else 
            {
                $data['editSubCategory'] = $this->Subcategory_Model->editSubCategory($id);
                $this->load->view('admin/subcategory/edit',$data);
            }
        }
        public function editCategory($id) {
            if(!empty($_POST))
            {
                $this->form_validation->set_rules('category_name', 'Category Name', 'required|is_unique[tbl_category.category_name]');
                if ($this->form_validation->run() == FALSE)
                {
                    $data['editCategory'] = $this->Category_Model->editCategory($id);
                    $this->load->view('admin/category/edit',$data);
                }
                else
                {
                    $category_name = strtolower($this->input->post('category_name'));
                    $user_id = $this->session->userid;
                    $category_id = $this->input->post('category_id');
                    $data = array(
                            'category_name' => $category_name,
                            'modified_by' => $user_id,
                            'modified_date' => date("Y-m-d H:i:s"),
                            'status' => '0'
                    );
                    $this->Category_Model->editCategorySubmit($data,$category_id);
                    $this->session->set_flashdata('SUCCESSMSG','Category has been updated succesfully.');
                    redirect('account/category');
                }
               
            } 
            else 
            {
                $data['editCategory'] = $this->Category_Model->editCategory($id);
                $this->load->view('admin/category/edit',$data);
            }
        }
 
        public function SubCategoryDelete($id) 
        {
            $this->Subcategory_Model->SubCategoryDelete($id);
            $this->session->set_flashdata('SUCCESSMSG','Subcategory has been deleted successfully.');
            redirect('account/category');
        }
        public function deleteCategory($id) 
        {
            $this->Category_Model->deleteCategory($id);
            $this->session->set_flashdata('SUCCESSMSG','Category has been deleted successfully.');
            redirect('account/category');
        }
        public function CategoryStatus($id,$status) 
        {
            $this->Category_Model->CategoryStatus($id,$status);
            $this->session->set_flashdata('SUCCESSMSG','Category has been updated successfully.');
            redirect('account/category');
        }
 
        
}
