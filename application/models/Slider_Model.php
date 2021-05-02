<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Slider_Model extends CI_Model {
    
        function __construct() {
        parent::__construct();
		$this->tablename	= $this->session->userdata('table_id').'tbl_products';
		$this->tablesubcategory = $this->session->userdata('table_id').'tbl_subcategory';
		$this->tablecategory = $this->session->userdata('table_id').'tbl_category';
        }
        public function slider_insert(){
            $this->db->set('created_date', date("Y-m-d H:i:s"));
            $this->db->set('created_by', $this->session->userid);
            $this->db->set('status', 'active');
            $this->db->set('views', '0');
            $query = $this->db->insert('tbl_slider_images');
            $response=$this->db->insert_id();
            return $response;
        }
        function update_image($insert_id, $mainimagefilename) {
            $this->db->set('name', $mainimagefilename);
            $this->db->where('id',$insert_id);
            $query = $this->db->update('tbl_slider_images');
        }
        function get_list() {
            $this->db->select(" * ");
            $this->db->from('tbl_slider_images');
            $query = $this->db->get();
            return $query->result();
        }
      
        function DeleteSlider($id) {
            $this->db->where('id',$id);
            $this->db->delete('tbl_slider_images');
        }
      
}