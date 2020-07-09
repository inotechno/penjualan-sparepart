<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterModel extends CI_Model {
	
		function data_kategori()
		{
			return $this->db->get('kategori')->result();
		}

		function save_kategori($data)
		{
			return $this->db->insert('kategori', $data);
		}
	
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>