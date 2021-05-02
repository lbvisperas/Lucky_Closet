<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_Model extends CI_Model {
	
		public function search($data){
			$this->db->select(" * ");
			$this->db->from('tbl_products');
			$this->db->where('product_code', $data);
			$this->db->or_like('product_name',	$data);	
			$this->db->or_like('product_description',	$data);	
			$this->db->or_like('product_price',	$data);	
			$this->db->or_like('product_image',	$data);	
			$this->db->or_like('product_code',	$data);	
			$query = $this->db->get();
            return $query->result();
		}
    
        public function latest_product()
        {
            $this->db->select(" * ");
            $this->db->from('tbl_products');
            $this->db->where('product_type', '1');
            $this->db->limit('4');
            $query = $this->db->get();
            return $query->result();
        }
        public function popular_product()
        {
            $this->db->select(" * ");
            $this->db->from('tbl_products');
            $this->db->where('product_type', '2');
            $this->db->limit('4');
            $query = $this->db->get();
            return $query->result();
        }
        public function feature_product()
        {
            $this->db->select(" * ");
            $this->db->from('tbl_products');
            $this->db->where('product_type', '3');
            $this->db->limit('4');
            $query = $this->db->get();
            return $query->result();
        }
        public function get_slider()
        {
            $this->db->select(" * ");
            $this->db->from('tbl_slider_images');
            $this->db->order_by('rand()');
            $this->db->limit('3');
            $query = $this->db->get();
            return $query->result();
        }
        
        public function detail_view_product($id){
        $this -> db -> select(' * ');
        $this -> db -> from('tbl_products');
        $this->db->where('id', $id);
        $query = $this -> db -> get();
        return $query->result();
        }
  
        public function products_detail($product){
        $this -> db -> select(' * ');
        $this -> db -> from('tbl_products');
        $this->db->where('id', $product);
        $query = $this -> db -> get();
        return $query->result();
        }
        public function Insert_Contact($name,$email,$message){
            $this->db->set('name', $name);
            $this->db->set('email',$email);
            $this->db->set('message',$message);  
            $this->db->set('date',date("Y-m-d H:i:s"));
            $this->db->insert('tbl_contact');
        }
  
}