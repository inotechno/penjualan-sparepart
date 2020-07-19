<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {

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
			$this->load->view('konsumen/dashboard');
			$this->load->view('_partials/_footer');
			$this->load->view('_partials/_plugin');
			$this->load->view('services/dashboard_konsumen');
		}

		public function produk_terlaris()
		{
			$html = '';
			$data = $this->MasterModel->produk_terlaris();
			$no = 1;
			foreach ($data as $dp) {
				if ($dp->foto == '') {
					$foto = base_url('assets/assets/img/produk/produk-default.png');
				}else{
					$foto = base_url('assets/assets/img/produk/'.$dp->foto);
				}
				$html .= '<div class="col-md">
							<div class="card" style="width: 15rem;">
				  				<img class="card-img-top" src="'.$foto.'" alt="Card image cap">
				 				<div class="card-body">
							    <h6 class="card-title">'.$dp->nama_barang.'</h6>
							    <span class="badge badge-success">'.$dp->terjual.' Terjual</span>
							  </div>
							</div>
						</div>';
			}

			echo $html;
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/admin/Dashboard.php */
?>