<?php
class Subcategory_Model extends CI_Model
{
	 function __construct() {
        // Call the Model constructor
        parent::__construct();

		$this->table_id = $this->session->userdata('table_id');
		$this->tablename = $this->session->userdata('table_id').'tbl_subcategory';
    }

    function add($id) {     
            $this->db->set('subcategory_name', $this->input->post('sub_category_name'));
            $this->db->set('parent_category_id',$id);
            $this->db->set('status','0');  
            $this->db->set('created_by', $this->session->userid);
            $this->db->set('created_date', date("Y-m-d H:i:s"));
            $query = $this->db->insert('tbl_subcategory');
            $response=$this->db->insert_id();
            return $response;
    }
	
    function update_image($id, $subfilename) {
        $this->db->set('image', $subfilename);
        $this->db->where('subcat_id',$id);
        $query = $this->db->update('tbl_subcategory');
    }
    function viewSubCategory($id) {
        $this->db->where('parent_category_id',$id);
        $this->db->where('status','0');
        $query = $this->db->get('tbl_subcategory');
        return $query->result();
    }
    function editSubCategory($id) {
        $this->db->where('status','0');
        $this->db->where('subcat_id',$id);
        $query = $this->db->get('tbl_subcategory');
        return $query->result();
    }
    function editSubCategorySubmit($insert_id, $subfilename,$subcategory_name) {
        $this->db->set('subcategory_name', $subcategory_name);
        $this->db->set('image', $subfilename);
        $this->db->set('modified_by', $this->session->userid);
        $this->db->set('modified_date', date("Y-m-d H:i:s"));
        $this->db->where('subcat_id',$insert_id);
        $query = $this->db->update('tbl_subcategory');
    }
    function SubCategoryDelete($id) {
       $this->db->set('status', '1');
       $this->db->where('subcat_id',$id);
       $query = $this->db->update('tbl_subcategory');
    }
    function viewSubCategoryList() {
        $this->db->where('status','0');
        $query = $this->db->get('tbl_subcategory');
        return $query->result();
    }
}