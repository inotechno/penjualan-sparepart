<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Master extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
		}
	
		public function Kategori_Barang()
		{
			$this->load->view('_partials/_head');
			$this->load->view('_partials/_sidebar');
			$this->load->view('_partials/_header');
			$this->load->view('admin/kategori_barang');
			$this->load->view('_partials/_footer');
			$this->load->view('_partials/_plugin');
			$this->load->view('services/kategori_barang');
		}

		public function data_kategori()
		{
			$html = '';
			$data = $this->MasterModel->data_kategori();
			$no = 1;
			foreach ($data as $dp) {
				
				$html .= '<tr>
							<td class="align-middle text-center">'.$no++.'</td>
							<td class="align-middle">'.$dp->nama_kategori.'</td>
							
							<td class="align-middle">
								<button class="btn btn-sm btn-success text-center update-kategori mr-1 ml-lg-1 mb-1" data-id="'.$dp->id.'" data-nama="'.$dp->nama_kategori.'">Update</button>
								<button class="btn btn-sm btn-info text-center lihat-barang ml-lg-1 mb-1" data-id="'.$dp->id.'" data-nama="'.$dp->nama_kategori.'">Lihat Barang</button>
							</td>
						</tr>';
			}
			echo $html;
		}

		public function add_kategori()
		{
			$data['nama_kategori'] = $this->input->post('nama_kategori');
			$proses = $this->MasterModel->save_kategori($data);
			if ($proses) {
				$response = array(
					'status' => 'success',
					'message' => 'Data Berhasil Disimpan',
				);
			}else{
				$response = array(
					'status' => 'error',
					'message' => 'Data Gagal Disimpan',
				);
			}

			echo json_encode($response);
		}
	
	}
	
	/* End of file Master.php */
	/* Location: ./application/controllers/admin/Master.php */

?>