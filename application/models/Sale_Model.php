<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sale_Model extends CI_Model {
    
        function __construct() {
        parent::__construct();
		$this->tablename	= $this->session->userdata('table_id').'tbl_sales';
		$this->tablesubcategory = $this->session->userdata('table_id').'tbl_subcategory';
		$this->tablecategory = $this->session->userdata('table_id').'tbl_category';
        }
        
        
        function get_list() {
            $this->db->select(" *, ");
            $this->db->from($this->tablename);
            $this->db->where('shipped_status','0');
            $query = $this->db->get();
            return $query->result();
        }
        function Buyer_Name() {
            $this->db->select(" *, ");
            $this->db->from($this->tablename);
            $this->db->where('shipped_status','0');
            $query = $this->db->get();
            return $query->result();
        }
        function getAllHistoryRecord($buyer_name,$start_date,$end_date,$create) {
                $this->db->select($this->tablename.'.buyer_name,grand_amount,id,issue_date,due_date,cash_discount,total_quantity,shipped_status,created_by');
	        if($buyer_name)
                $this->db->where($this->tablename.'.buyer_name =',$buyer_name);
		if($start_date)
		$this->db->where($this->tablename.'.issue_date >=',$start_date);
		if($end_date)
		$this->db->where($this->tablename.'.issue_date <=',$end_date);
		if(isset($create))
        	$this->db->where($this->tablename.'.created_by =',$create);
        	$this->db->where($this->tablename.'.shipped_status','0');
                $query = $this->db->get($this->tablename);
                        //echo $this->db->last_query(); die;
                $result = $query->result();
                return $result;
         }
        
        function getAllHistoryRecordStatus($buyer_name,$start_date,$end_date,$create) {
                $this->db->select($this->tablename.'.buyer_name,grand_amount,id,issue_date,due_date,cash_discount,total_quantity,shipped_status,created_by');
	        if($buyer_name)
                $this->db->where($this->tablename.'.buyer_name =',$buyer_name);
		if($start_date)
		$this->db->where($this->tablename.'.issue_date >=',$start_date);
		if($end_date)
		$this->db->where($this->tablename.'.issue_date <=',$end_date);
		if(isset($create))
        	$this->db->where($this->tablename.'.created_by =',$create);
        	$this->db->where($this->tablename.'.shipped_status','1');
                $query = $this->db->get($this->tablename);
                        //echo $this->db->last_query(); die;
                $result = $query->result();
                return $result;
         }
        
          function Buyer_Name_Status() {
            $this->db->select(" *, ");
            $this->db->from($this->tablename);
            $this->db->where('shipped_status','1');
            $query = $this->db->get();
            return $query->result();
        }
        
        function shipped() {
            $this->db->select(" *, ");
            $this->db->from($this->tablename);
            $this->db->where('shipped_status','1');
            $query = $this->db->get();
            return $query->result();
        }
        function SaleDetail($id) {
            $this->db->select(" *,tbl_sales_detail.quantity");
            $this->db->from('tbl_sales_detail');
            $this->db->join('tbl_products', 'tbl_products.product_code = tbl_sales_detail.product_code');
            $this->db->join('tbl_checkout', 'tbl_checkout.sale_id = tbl_sales_detail.sale_id');
            $this->db->where('tbl_sales_detail.sale_id',$id);
            $query = $this->db->get();
//           print_r($this->db->last_query()); 
//           die;
            return $query->result();
        }
        function Address_Detail($id) {
            $this->db->select(" * ");
            $this->db->from('tbl_checkout');
            $this->db->where('sale_id',$id);
            $query = $this->db->get();
//           print_r($this->db->last_query()); 
//           die;
            return $query->result();
        }
        function Deliver_Sale($id) {
            $this->db->select(" * ");
            $this->db->from('tbl_sales');
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $query->result();
        }
        function SaleStatus($id) {
            $this->db->set('shipped_status','1');
            $this->db->where('id',$id);
            $this->db->update('tbl_sales');
           
        }
}