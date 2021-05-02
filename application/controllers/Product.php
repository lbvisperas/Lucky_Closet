<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
             $this->load->library('pagination');
        }


        public function index()
        {
            $data['category_list'] = $this->Category_Model->get_list();
            $data['slider'] = $this->Dashboard_Model->get_slider();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
        }
	
        public function allProductList($cat_id,$subcat_id)
        {
            
            $config = array();
            $config["base_url"] = base_url() . "ProductList/$cat_id/$subcat_id";  
            $total_row   = $this->product_model->getproductList_count($cat_id,$subcat_id);
            $config["total_rows"] = $total_row;
            $config["per_page"] = 16;
            $config["uri_segment"]  = 4;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = round($choice);
            $config['cur_tag_open'] = '&nbsp;<li class="active"><a >';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '&nbsp;';
            $config['num_tag_close'] = '&nbsp;';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';
            $this->pagination->initialize($config);

            if($this->uri->segment(4)){
                $page = ($this->uri->segment(4)) ;
            }
            else{
                   $page = 0;
            } 
  
            $data["productlist"] = $this->product_model->getproductListCategoryWise($config["per_page"], $page,$cat_id,$subcat_id);
            $str_links = $this->pagination->create_links();
            $data["linked"] = explode('&nbsp;',$str_links );
          
            
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $data['subcat_id'] = $subcat_id;
            $data['cat_id'] = $cat_id;
            
            
            $this->load->view('product',$data);
        }
        
        public function oneProductdetail()
        {
            $final_data = '';
            $product_id = $this->uri->segment('2');
            $data['product_detail'] = $this->product_model->productDetailsignle($product_id);
            foreach($data['product_detail'] as $post)
            {
                $related_product = $post->related_product; 
                $related_id = explode(",", $related_product);
                foreach ($related_id as $post)
                {
                    $related_product_detail = $this->product_model->relatedProduct($post);
                    $pro['detail']  = $related_product_detail;
                    $final_data[]   = $pro;
                }
                $data['related_product_detail'] = $final_data;
            }
          
            
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $this->load->view('productDetails',$data);
        }
        public function SingleProuctDetail()
        {
            $base  = base_url();
            $product_id = $this->input->post('product_id');
            $output['SingleProuctDetail'] = $this->product_model->SingleProuctDetail($product_id);
            foreach ($output['SingleProuctDetail'] as $post)
            {
                $data['name'] = $post->product_name;
                $data['product_description'] = $post->product_description;
                $data['product_price'] = $post->product_price;
                $data['product_image'] = "<img height=350px  width=100%  src='".$base."upload/product/".$post->id."/".$post->product_image."'>";
                $data['view_detail'] = "<a href='".$base."ProductDetail/".$post->id."' class='btn btn-warning'>View Detail</a>";
            }
             echo json_encode($data);
        }
        
    public function getUserEmail()
    {
		if (!isset($_GET['term']))
		exit;

		$term = $_REQUEST['term'];
		$data = array();
		$rows = $this->product_model->getUser($term);
		foreach( $rows as $row )
		{
			$data[] = array(
				'label' => $row->product_name,
				'value' => $row->product_name);  
		}
		echo json_encode($data);
		flush();
	}
	
	public function search_products()
	{
		$search_term = $this->input->post('input');
		$data['results'] = $this->product_model->search_for_products($search_term);
		$data['category_list'] = $this->Category_Model->get_list();
        $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
		$data['search_term'] = $search_term;
		$this->load->view('search_results',$data);
	}
}
