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

		public function Data_Kategori()
		{
			$html = '';
			$data = $this->MasterModel->data_kategori();
			$no = 1;
			foreach ($data as $dp) {
				
				$html .= '<tr>
							<td class="align-middle text-center">'.$no++.'</td>
							<td class="align-middle">'.$dp->nama_kategori.'</td>
							
							<td class="align-middle">
								<button class="btn btn-sm btn-success text-center update-kategori" data-id="'.$dp->id.'">Update</button>
							</td>
						</tr>';
			}
			echo $html;
		}
	
	}
	
	/* End of file Master.php */
	/* Location: ./application/controllers/admin/Master.php */

?>