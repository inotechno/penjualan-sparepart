<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Produk extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
		}
	
		public function index()
		{
			$this->load->view('_partials/_head');
			$this->load->view('_partials/_header');
			$this->load->view('_partials/_sidebar');
			$this->load->view('konsumen/produk');
			$this->load->view('_partials/_footer');
			$this->load->view('_partials/_plugin');
			$this->load->view('services/produk');
		}

		public function daftar_produk()
		{
			$html = '';
			$search = '';
			if($this->input->post('search'))
		  	{
		   		$search = $this->input->post('search');
		  	}
			$data = $this->MasterModel->daftar_produk($search);
			$no = 1;
			if ($data->num_rows() > 0) {
				foreach ($data->result() as $dp) {
					if ($dp->foto == '') {
						$foto = base_url('assets/assets/img/produk/produk-default.png');
					}else{
						$foto = base_url('assets/assets/img/produk/'.$dp->foto);
					}
					$html .= '<div class="col-md-12">
								<div class="card" style="width: 15rem;">
					  				<img class="card-img-top" src="'.$foto.'" alt="Card image cap">
					 				<div class="card-body">
								    <h6 class="card-title">'.$dp->nama_barang.'</h6>
								    <div class="card-text row">
								    	<p class="text-warning float-left col-sm">120 Terjual</p>
								    	<p class="text-info float-right col-sm text-right">'.$dp->nama_kategori.'</p>
								    </div>
								    <a href="javascript:;" class="btn btn-primary">Beli</a>
								  </div>
								</div>
							</div>';
				}
			}else{
				$html .= '<div class="col-md-12 text-center">Tidak Ada Data</div>';
			}

			echo $html;
		}
	
	}
	
	/* End of file Produk.php */
	/* Location: ./application/controllers/konsumen/Produk.php */
?>