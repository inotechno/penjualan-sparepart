<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class TransaksiModel extends CI_Model {
	
		function get_no_trx()
		{
			$q = $this->db->query("SELECT MAX(RIGHT(kode_transaksi,3)) AS kd_max FROM transaksi WHERE DATE(date)=CURDATE()");
	        $kd = "";
	        if($q->num_rows()>0){
	            foreach($q->result() as $k){
	                $tmp = ((int)$k->kd_max)+1;
	                $kd = sprintf("%04s", $tmp);
	            }
	        }else{
	            $kd = "0001";
	        }
	        date_default_timezone_set('Asia/Jakarta');
	        return date('dmy').$kd;
		}

		function proses_transaksi($data)
		{
			return $this->db->insert('transaksi', $data);
		}

		function transaksi_pending()
		{
			$this->db->select('transaksi.*, barang.nama_barang');
			$this->db->from('transaksi');
			$this->db->join('barang', 'barang.id = transaksi.id_barang', 'left');
			$this->db->where('status_transaksi', 0);
			$this->db->where('id_konsumen', $this->session->userdata('id'));
			return $this->db->get()->result();
		}

		function get_transaksi($kode_transaksi)
		{
			$this->db->select('transaksi.*, barang.*');
			$this->db->from('transaksi');
			$this->db->join('barang', 'barang.id = transaksi.id_barang', 'left');
			$this->db->where('transaksi.kode_transaksi', $kode_transaksi);
			return $this->db->get()->row();
		}
	
	}
	
	/* End of file TransaksiModel.php */
	/* Location: ./application/models/TransaksiModel.php */
?>