<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Dashboard_Model extends CI_Model {
    
        public function todaysale()
        {
            $date = date("Y-m-d");
            $this->db->select(" * ");
            $this->db->from('tbl_sales');
            $this->db->where('issue_date', $date);
            $query = $this->db->get();
            $responce = $query->num_rows();
            return $responce;
        }
        public function totalsum()
        {
            $this->db->select_sum('grand_amount','sum');
            $query = $this->db->get('tbl_sales');
            return $query->result();
        }
        public function counttotalsum()
        {
            $this->db->select(" * ");
            $this->db->from('tbl_sales');
            $query = $this->db->get();
            $responce = $query->num_rows();
            return $responce;
        }
        public function todaysalelist()
        {
            $date = date("Y-m-d");
            $this->db->select(" * ");
            $this->db->from('tbl_sales');
            $this->db->where('issue_date', $date);
            $query = $this->db->get();
            return $query->result();
        }
        public function customer_list()
        {
            
            
            $date = date("Y-m-d");
           $query = $this->db->query("SELECT * FROM tbl_customers WHERE DATE_FORMAT(created_date,'%Y-%m-%d') = '$date' ");
//          echo $this->db->last_query(); die;
//            $this->db->select(" * ");
//            $this->db->from('tbl_customers');
//            $this->db->where('created_date', $date);
//            $query = $this->db->get();
            return $query->result();
        }
      
       
}