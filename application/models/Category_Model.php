<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends CI_Model {
    
        public function get_list()
        {
                $this->db->select(" * ");
                $this->db->from('tbl_category');
//                $this->db->where('status','0');
                $query = $this->db->get();
                return $query->result();
        }
        public function editCategory($id)
        {
                $this->db->select(" * ");
                $this->db->from('tbl_category');
                $this->db->where('id',$id);
                $query = $this->db->get();
                return $query->result();
        }
        public function CategoryAdd($data)
        {
             $this->db->insert('tbl_category', $data); 
             return TRUE;
        }
        
        public function editCategorySubmit($data,$category_id)
        {
           $this->db->where('id',$category_id);
           $query = $this->db->update('tbl_category',$data);
        }
        function deleteCategory($id) {
            $this->db->where('id',$id);
            $this->db->delete('tbl_category');
            $this->db->where('parent_category_id',$id);
            $this->db->delete('tbl_subcategory');
        }
        
        function CategoryStatus($id,$status) {
            $this->db->set('status', $status);
            $this->db->where('id',$id);
            $query = $this->db->update('tbl_category');
        }
        
}