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
								<button class="btn btn-sm btn-info text-center lihat-produk-kategori ml-lg-1 mb-1" data-id="'.$dp->id.'" data-nama="'.$dp->nama_kategori.'">Lihat Barang</button>
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

		public function edit_kategori()
		{
			$id = $this->input->post('id');
			$data['nama_kategori'] = $this->input->post('nama_kategori');

			$proses = $this->MasterModel->update_kategori($data, $id);
			if ($proses) {
				$response = array(
					'status' => 'success',
					'message' => 'Data Berhasil Diubah',
				);
			}else{
				$response = array(
					'status' => 'error',
					'message' => 'Data Gagal Diubah',
				);
			}

			echo json_encode($response);
		}
	// End Kategori
	// Barang Dijual
		public function barang_dijual()
		{
			$this->load->view('_partials/_head');
			$this->load->view('_partials/_header');
			$this->load->view('_partials/_sidebar');
			$this->load->view('admin/barang_dijual');
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
							
							<td class="align-middle">
								<button class="btn btn-sm btn-success text-center update-produk mr-1 ml-lg-1 mb-1" 
									data-id="'.$dp->id.'" 
									data-nama="'.$dp->nama_barang.'" 
									data-kode="'.$dp->kode_barang.'" 
									data-kategori="'.$dp->id_kategori.'" 
									data-stok="'.$dp->stok.'" 
									data-harga="'.$dp->harga.'" 
									data-foto="'.$dp->foto.'"
									data-foto-preview="'.$foto.'">Update</button>
								<button class="btn btn-sm btn-info text-center lihat-barang ml-lg-1 mb-1" data-id="'.$dp->id.'" data-nama="'.$dp->nama_barang.'">Lihat Barang</button>
							</td>
						</tr>';
			}
			echo $html;
		}

		public function add_barang()
		{
			$config['upload_path'] = './assets/assets/img/produk/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('kode_barang');
	        $this->load->library('upload', $config);

	        if($this->upload->do_upload("foto")){
				$foto = $this->upload->file_name;
			} else {
				$foto = '';
			}

			$data = array(
	 			'kode_barang' 		=> $this->input->post('kode_barang'),
	 			'nama_barang' 		=> $this->input->post('nama_barang'),
	 			'id_kategori' 		=> $this->input->post('kategori'),
	 			'harga' 			=> $this->input->post('harga'),
	 			'stok' 				=> $this->input->post('stok'),
	 			
	 			'status' 				=> 1,
	 			'create_at' 			=> date('Y-m-d H:i:s'),
	 			'create_by' 			=> $this->session->userdata('id'),
	 			'foto' 					=> $foto
			);

			$proses = $this->MasterModel->add_barang($data);
			if ($proses) {
				$response = array(
					'status' => 'success',
					'message' => 'Upload Produk Berhasil',
				);
			}else{
				$response = array(
					'status' => 'error',
					'message' => 'Upload Produk Gagal',
				);
			}
		
			echo json_encode($response);
		}

		public function edit_barang()
		{
			$id = $this->input->post('id');
			$config['upload_path'] = './assets/assets/img/produk/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('kode_barang');
	        $this->load->library('upload', $config);

	         if($this->upload->do_upload("foto")){
				$foto = $this->upload->file_name;
				@unlink("./assets/assets/img/produk/".$this->input->post('foto_lama'));
			} else {
				$foto = $this->input->post('foto_lama');
			} 
			
			$data = array(
	 			'kode_barang' 		=> $this->input->post('kode_barang'),
	 			'nama_barang' 		=> $this->input->post('nama_barang'),
	 			'id_kategori' 		=> $this->input->post('kategori'),
	 			'harga' 			=> $this->input->post('harga'),
	 			'stok' 				=> $this->input->post('stok'),
	 			
	 			'status' 				=> 1,
	 			'create_at' 			=> date('Y-m-d H:i:s'),
	 			'create_by' 			=> $this->session->userdata('id'),
	 			'foto' 					=> $foto
			);

			$proses = $this->MasterModel->update_barang($data, $id);
			if ($proses) {
				$response = array(
					'status' => 'success',
					'message' => 'Update Produk Berhasil',
				);
			}else{
				$response = array(
					'status' => 'error',
					'message' => 'Update Produk Gagal',
				);
			}
		
			echo json_encode($response);
		}
	// End Barang Dijual
	}
	
	/* End of file Master.php */
	/* Location: ./application/controllers/admin/Master.php */

?>