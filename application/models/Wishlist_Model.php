<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Wishlist_Model extends CI_Model {
    
        function __construct() {
        parent::__construct();
		$this->tablename	= $this->session->userdata('table_id').'tbl_wishlist';
        }
        public function InsertWishlist($product_id,$product_price){
            $this->db->set('product_id',$product_id );
            $this->db->set('user_id',$this->session->userdata('userid'));
            $this->db->set('product_price',$product_price);  
            $this->db->set('created_date', date("Y-m-d"));
            $this->db->insert($this->tablename);
        }
        public function get_list(){
            $this->db->select(" * ");
            $this->db->join('tbl_products', 'tbl_products.id = tbl_wishlist.product_id');
            $this->db->from($this->tablename);
            $this->db->where('tbl_wishlist.user_id',$this->session->userdata('userid'));
            $query = $this->db->get();
            return $query->result();
        }
        public function DeleteWishlist($id){
          
            $this->db->where('wish_id',$id);
            $this->db->delete($this->tablename);
        }
       
    
}