<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
			$this->load->model('TransaksiModel');
		}
	
		public function index()
		{
			$this->load->view('_partials/_head');
			$this->load->view('_partials/_header');
			$this->load->view('_partials/_sidebar');
			$this->load->view('_partials/_main');
			$this->load->view('_partials/_footer');
			$this->load->view('_partials/_plugin');	
			$this->load->view('services/dashboard');
		}

		public function count()
		{
			$data['kategori'] = $this->MasterModel->count_kategori()->kategori;
			$data['barang'] = $this->MasterModel->count_barang()->barang;
			$data['trx_sukses'] = $this->MasterModel->count_trx()->transaksi_sukses;
			$data['trx_pending'] = $this->MasterModel->count_trx()->transaksi_pending;

			echo json_encode($data);
		}

		public function chartPenjualan()
		{
			$kategori = '';
			if ($this->input->post('kategori')) {
				$kategori = $this->input->post('kategori');
			}
			$data = $this->TransaksiModel->chartPenjualanKategori($kategori);
			echo json_encode($data);
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/admin/Dashboard.php */
?>