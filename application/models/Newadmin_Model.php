<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Newadmin_Model extends CI_Model {
    
        function __construct() {
        parent::__construct();
		
        }
        public function Insert_Admin(){
           
            $this->db->set('firstname', $this->input->post('first_name'));
            $this->db->set('lastname',$this->input->post('last_name'));
            $this->db->set('email',$this->input->post('email'));  
            $this->db->set('password',$this->input->post('password'));
            $this->db->set('mobile', $this->input->post('mobile'));
            $this->db->set('created_date', date("Y-m-d H:i:s"));
            $this->db->set('created_by', $this->session->userid);
            $this->db->set('status', '0');
            $this->db->insert('user_detail');
        }
        
      
        function get_list() {
            $this->db->select(" * ");
            $this->db->from('user_detail');
            $query = $this->db->get();
            return $query->result();
        }
        function DeleteAdmin($id) {
            $this->db->where('id',$id);
            $this->db->delete('user_detail');
        }
}