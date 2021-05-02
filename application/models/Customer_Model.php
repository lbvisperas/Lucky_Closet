<?php
class Customer_Model extends CI_Model
{
        function __construct() {
       // Call the Model constructor
        parent::__construct();

    }

     function get_list() {
            $this->db->select(" * ");
            $this->db->from('tbl_customers');
            $query = $this->db->get();
            return $query->result();
        }
      
    function DeleteCustomer($id) {
            $this->db->where('customer_id',$id);
            $this->db->delete('tbl_customers');
    }
}