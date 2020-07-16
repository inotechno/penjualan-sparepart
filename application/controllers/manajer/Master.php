<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Master extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
		}
	// Kategori
		public function get_produk_by_kategori()
		{
			$id = $this->input->post('id');
			$data = $this->MasterModel->get_produk_by_kategori($id);
			echo json_encode($data);
		}

		public function Kategori_Barang()
		{
			$this->load->view('_partials/_head');
			$this->load->view('_partials/_header');
			$this->load->view('_partials/_sidebar');
			$this->load->view('manajer/kategori_barang');
			$this->load->view('_partials/_footer');
			$this->load->view('_partials/_plugin');
			$this->load->view('services/kategori_barang');
		}

	// End Kategori
	// Barang Dijual
		public function barang_dijual()
		{
			$this->load->view('_partials/_head');
			$this->load->view('_partials/_header');
			$this->load->view('_partials/_sidebar');
			$this->load->view('manajer/barang_dijual');
			$this->load->view('_partials/_footer');
			$this->load->view('_partials/_plugin');
			$this->load->view('services/barang_dijual');
		}

		public function data_barang_dijual()
		{
			$html = '';
			$data = $this->MasterModel->data_barang_dijual();
			$no = 1;
			foreach ($data as $dp) {
				if ($dp->foto == '') {
					$foto = base_url('assets/assets/img/produk/produk-default.png');
				}else{
					$foto = base_url('assets/assets/img/produk/'.$dp->foto);
				}
				$html .= '<tr>

							<td class="align-middle"><img width="80" height="80" src="'.$foto.'"></td>
							<td class="align-middle">'.$dp->kode_barang.'</td>
							<td class="align-middle">'.$dp->nama_barang.'</td>
							<td class="align-middle">'.$dp->nama_kategori.'</td>
							<td class="align-middle">'.$dp->stok.'</td>
							<td class="align-middle">'.$dp->harga.'</td>
						</tr>';
			}
			echo $html;
		}
	// End Barang Dijual
	}
	
	/* End of file Master.php */
	/* Location: ./application/controllers/manajer/Master.php */

?>