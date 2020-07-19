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

		function get_produk_by_kategori($id)
		{
			$this->db->select('id, nama_barang, kode_barang, stok, harga, foto');
			$this->db->select('CASE 
				WHEN status = 1 THEN "Dijual" 
				WHEN status = 0 THEN "Tidak Dijual"
				END as status_barang', false);
			$this->db->from('barang');
			$this->db->where('id_kategori', $id);
			return $this->db->get()->result();
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

	// Produk Konsumen
		function daftar_produk($search)
		{
			$this->db->select('*');
			$this->db->from('barang');
			$this->db->join('kategori', 'barang.id_kategori = kategori.id', 'left');
			$this->db->where('status', 1);
			if ($search != '') {
				$this->db->group_start();
					$this->db->or_like('nama_barang', $search);
				$this->db->group_end();
			}
			return $this->db->get();
		}
	// End Produk Konsumen

	// Dashboard
		function count_kategori()
		{
			$this->db->select('COUNT(kategori.id) as kategori');
			return $this->db->get('kategori')->row();
		}

		function count_barang()
		{
			$this->db->select('COUNT(barang.id) as barang');
			return $this->db->get('barang')->row();
		}

		function count_trx()
		{
			$this->db->select('COUNT(
									IF(status_transaksi = 1, 1,NULL)
								) as transaksi_sukses,
								COUNT(
									IF(status_transaksi = 0, 1,NULL)
								) as transaksi_pending,');
			return $this->db->get('transaksi')->row();
		}

	// END Dashboard
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>