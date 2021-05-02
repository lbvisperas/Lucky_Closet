<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {
    
        public function login($email,$password)
	{
            $this -> db -> select(' * ');
            $this -> db -> from('user_detail');
            $this -> db -> where('email', $email);
            $this -> db -> where('password', $password);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
            return $query;
	}
      
        function verify($email, $password) 
        {
            $query=$this->db->query("SELECT * FROM tbl_customers WHERE email = '$email' AND password = '$password' limit 1 ");
            $result = $query->row_array();
            if ($query->num_rows() > 0)
            {
                return($result);
            }
            else 
            {
                return false;
            }
        }
        
        function add() 
        {
            $this->db->set('created_date',date('Y-m-d H:i:s'));
            
            $this->db->set('email', $this->input->post('email'));

            $this->db->set('first_name', $this->input->post('firstname'));

            $this->db->set('last_name', $this->input->post('lastname'));

            $this->db->set('phone', $this->input->post('phone'));

            $this->db->set('password', $this->input->post('password'));

            if($this->db->insert('tbl_customers'))
            $response=$this->db->insert_id();
        }
		
		function update($data, $userid){
			$this->db->where('customer_id', $userid);
            $this->db->update('tbl_customers', $data);
			return $this->db->affected_rows();
		}
        

		
  
       
}