<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_Model extends CI_Model {
    
        function __construct() {
        parent::__construct();
		$this->tablename	= $this->session->userdata('table_id').'tbl_products';
		$this->tablesubcategory = $this->session->userdata('table_id').'tbl_subcategory';
		$this->tablecategory = $this->session->userdata('table_id').'tbl_category';
        }
        public function product_insert($sub_category_id,$relatedproduct){
            
            $this->db->set('product_code', $this->input->post('product_code'));
            $this->db->set('product_name',$this->input->post('product_name'));
            $this->db->set('product_description',$this->input->post('product_description'));  
            $this->db->set('product_price',$this->input->post('rate'));
            $this->db->set('product_type', $this->input->post('product_type'));
            $this->db->set('category_id', $this->input->post('product_category'));
            $this->db->set('sub_category_id', $sub_category_id);
            $this->db->set('related_product', $relatedproduct);
            $this->db->set('quantity', $this->input->post('quantity'));
            $this->db->set('discount', $this->input->post('product_discount'));
            $this->db->set('gross_amount', $this->input->post('gross_amount'));
            $this->db->set('net', $this->input->post('net_amount'));
            $this->db->set('created_date', date("Y-m-d H:i:s"));
            $this->db->set('created_by', $this->session->userid);
            $this->db->set('status', '0');
            $query = $this->db->insert('tbl_products');
            $response=$this->db->insert_id();
            return $response;
        }
        
        public function ProductEdit_Update($insert_id, $mainimagefilename,$sub_category_id,$relatedproduct)
        {
            $this->db->set('product_code', $this->input->post('product_code'));
            $this->db->set('product_name',$this->input->post('product_name'));
            $this->db->set('product_description',$this->input->post('product_description'));  
            $this->db->set('product_price',$this->input->post('rate'));
            $this->db->set('product_type', $this->input->post('product_type'));
            $this->db->set('product_image', $mainimagefilename);
            $this->db->set('category_id', $this->input->post('product_category'));
            $this->db->set('sub_category_id', $sub_category_id);
            $this->db->set('related_product', $relatedproduct);
            $this->db->set('quantity', $this->input->post('quantity'));
            $this->db->set('discount', $this->input->post('product_discount'));
            $this->db->set('gross_amount', $this->input->post('gross_amount'));
            $this->db->set('net', $this->input->post('net_amount'));
            $this->db->set('modified_date', date("Y-m-d H:i:s"));
            $this->db->set('created_by', $this->session->userid);
            $this->db->set('status', '0');
            $this->db->where('id', $insert_id);
            $query = $this->db->update('tbl_products');
        }
        
        function update_image($insert_id, $mainimagefilename) {
            $this->db->set('product_image', $mainimagefilename);
            $this->db->where('id',$insert_id);
            $query = $this->db->update('tbl_products');
        }
        function get_list() {
            $this->db->select(" * ");
            $this->db->from($this->tablename);
            $query = $this->db->get();
            return $query->result();
        }
        
        
        public function getProductList($product_code,$product_description,$category_id) {
            $this->db->select($this->tablename.'.*,'.$this->tablecategory.'.category_name');
            if($product_code)
            {
                $this->db->like('product_code',$product_code);
            }
            if($product_description)
                    $this->db->like('product_description',$product_description);
            if($category_id)
                    $this->db->where('category_id',$category_id);

            $this->db->join($this->tablecategory,$this->tablecategory.'.id='.$this->tablename.'.category_id','left');
            $query = $this->db->get($this->tablename);
            return $query->result();
        }
        function getProductById($id)
	{
            $this->db->select(" * ");
            $this->db->from('tbl_products');
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->row();
        }
        function get_product_edit($product)
	{
            $this->db->select(" * ");
            $this->db->from('tbl_products');
            $this->db->where('id', $product);
            $query = $this->db->get();
            return $query->result();
        }
        function edit_list_submit($data,$product_id)
	{
            $this->db->where('id',$product_id);
            $this->db->update('tbl_products',$data);   
        }
        function getProductedit_value_submit($product_id,$product_value,$type)
	{
            $date = date("Y-m-d H:i:s");
            if($type=='product_name'){
                $query = $this->db->query('UPDATE tbl_products SET product_name = "'.$product_value.'",modified_date = "'.$date.'",modified_by = "'.$this->session->userid.'" WHERE id = "'.$product_id.'" ');
            } 
            else if($type=='product_category')
            {
                $query = $this->db->query('UPDATE tbl_products SET category_id = "'.$product_value.'", modified_date = "'.$date.'",modified_by = "'.$this->session->userid.'" WHERE id = "'.$product_id.'" ');
            }
            else if($type=='product_description')
            {
                
                $query = $this->db->query('UPDATE tbl_products SET product_description = "'.$product_value.'", modified_date = "'.$date.'",modified_by = "'.$this->session->userid.'" WHERE id = "'.$product_id.'" ');
            }
//            else if($type=='product_price')
//            {
//                $query = $this->db->query('UPDATE tbl_products SET product_price = "'.$product_value.'", modified_date = "'.$date.'",modified_by = "'.$this->session->userid.'" WHERE id = "'.$product_id.'" ');
//            }
        }
        
        
    function check_existance($code = null) {
        $this->db->where('product_code', $code);
        $query = $this->db->get('tbl_products');
        $result = $query->result_array();
        if (!empty($result)) {
            $response = true;
        } else {
            $response = false;
        }
        return $response;
    }
    function ProductStatus($id,$status) {
        $this->db->set('status', $status);
        $this->db->where('id',$id);
        $query = $this->db->update('tbl_products');
    }

    function deleteProduct($id) {
         $this->db->where('id',$id);
         $this->db->delete('tbl_products');
     }
    function ProductDetail($product_id) {
        $this->db->select(" * ");
        $this->db->from('tbl_products');
        $this->db->where('id',$product_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    function getproductListCategoryWise($limit, $start, $cat_id,$subcat_id)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_products');
        $query = $this->db->where('tbl_products.category_id',$cat_id);
        $query = $this->db->where('tbl_products.sub_category_id',$subcat_id);
        $query = $this->db->limit($limit, $start);
        $query = $this->db->get();
//        echo $this->db->last_query();
//        die;
        return $query->result();
    }
    function productDetailsignle($product_id) {
        $this->db->select(" * ");
        $this->db->from('tbl_products');
        $this->db->where('tbl_products.id',$product_id);
        $query = $this->db->get();
        return $query->result();
    }
    function relatedProduct($post) {
        $this->db->select(" * ");
        $this->db->from('tbl_products');
        $this->db->where('tbl_products.id',$post);
        $query = $this->db->get();
        return $query->result();
    }
    function SingleProuctDetail($product_id) {
        $this->db->select(" * ");
        $this->db->from('tbl_products');
        $this->db->where('id',$product_id);
        $query = $this->db->get();
        return $query->result();
    }   
    
    function getproductList_count($cat_id,$subcat_id)
    {
        
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_products');
        $query = $this->db->where('tbl_products.category_id',$cat_id);
        $query = $this->db->where('tbl_products.sub_category_id',$subcat_id);
       //$query = $this->db->join('tbl_product_images','tbl_product_images.id=tbl_products.id');
        $query = $this->db->get();
        $count = $query->num_rows();
        
        return $count;
    }
    
    function getUser($term)
    { 
        
//        $query = $this->db->query('select b.name from businessdetails as b where b.name like "'.$term.'%"  UNION select c.name from cities as c where c.name like "'.$term.'%"  UNION select s.title as name from subcategory as s where s.title like "'.$term.'%"   UNION select m.title as name from maincategory as m where m.title like "'.$term.'%" limit 0,10');
        
        $query = $this->db->query('select product_name from tbl_products where product_name like "'.$term.'%" limit 0,10');
        return $query ->result();
    }
    
	function search_for_products($search_term)
	{
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->like('product_code',$search_term);
		$this->db->or_like('product_name',$search_term);
		$this->db->or_like('product_description',$search_term);
		$this->db->or_like('category_id',$search_term);
		$this->db->or_like('sub_category_id',$search_term);
		$query = $this->db->get();
        return $query->result_array();
	}
}