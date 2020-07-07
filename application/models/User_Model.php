<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User_Model extends CI_Model {
	
		function insertUser($data)
		{
			$this->db->insert('user', $data);
		}

		function login($email, $password)
		{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('user_group', 'user_group.level = user.id_level', 'left');
			$this->db->where('user.email', $email);
			$this->db->where('user.password', $password);
			$this->db->where('user.status', '1');
			$this->db->limit(1);
			return $this->db->get();
		}

	}
	
	/* End of file User_Model.php */
	/* Location: ./application/models/User_Model.php */
?>