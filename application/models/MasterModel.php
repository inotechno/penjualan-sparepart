<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterModel extends CI_Model {

	// Kategori Model	
	
		function data_kategori()
		{
			return $this->db->get('kategori')->result();
		}

		function save_kategori($data)
		{
			return $this->db->insert('kategori', $data);
		}

		function update_kategori($data, $id)
		{
			return $this->db->update('kategori', $data, array('id' => $id));
		}
	
	// End Kategori Model	
	// Produk Dijual Model	
		function data_barang_dijual()
		{
			$this->db->select('*');
			$this->db->from('barang');
			$this->db->join('kategori', 'barang.id_kategori = kategori.id', 'left');
			$this->db->where('status', 1);
			return $this->db->get()->result();
		}

		function add_barang($data)
		{
			return $this->db->insert('barang', $data);
		}

		function update_barang($data, $id)
		{
			return $this->db->update('barang', $data, array('id' => $id));
		}
	// End Produk Dijual Model	

	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>