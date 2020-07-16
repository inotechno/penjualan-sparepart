<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Transaksi extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('TransaksiModel');
		}
	
		public function transaksi_pending()
		{
			$this->load->view('_partials/_head');
			$this->load->view('_partials/_header');
			$this->load->view('_partials/_sidebar');
			$this->load->view('konsumen/transaksi_pending');
			$this->load->view('_partials/_footer');
			$this->load->view('_partials/_plugin');
			$this->load->view('services/transaksi');
		}

		public function view_trx_pending()
		{
			$html = '';
			$data = $this->TransaksiModel->transaksi_pending_admin();

			$no = 1;
			foreach ($data as $dp) {
				
				$html .= '<tr>
							<td class="align-middle text-center">'.$no++.'</td>
							<td class="align-middle">'.$dp->kode_transaksi.'</td>
							<td class="align-middle">'.$dp->nama_barang.'</td>
							<td class="align-middle">'.$dp->jumlah.'</td>
							<td class="align-middle">Rp. '.number_format($dp->harga).'</td>
							<td class="align-middle">Rp. '.number_format($dp->harga*$dp->jumlah).'</td>
							<td class="align-middle">'.date('d-m-Y', strtotime($dp->date)).'</td>
							
							<td class="align-middle">
								<button class="btn btn-sm btn-success text-center mr-1 ml-lg-1 mb-1 validasi_pembayaran" data-id="'.$dp->id.'" data-idbarang="'.$dp->id_barang.'" data-jumlah="'.$dp->jumlah.'" data-stok="'.$dp->stok.'" data-kode="'.$dp->kode_transaksi.'">Validasi Pembayaran</button>
							</td>
						</tr>';
			}
			echo $html;
		}

		public function transaksi_detail()
		{
			$kode_transaksi = $this->uri->segment(4);
			$get = $this->TransaksiModel->get_transaksi($kode_transaksi);
			$data['kode_transaksi'] = $get->kode_transaksi;
			$data['nama_barang'] = $get->nama_barang;
			$data['deskripsi'] = $get->deskripsi;
			$data['foto'] = $get->foto;
			$data['harga'] = number_format($get->harga);
			$data['jumlah'] = $get->jumlah;

			if ($get->status_transaksi == 0) {
				$data['status_transaksi'] = '<span class="badge badge-warning">Belum Lunas</span>';
			}if ($get->status_transaksi == 1) {
				$data['status_transaksi'] = '<span class="badge badge-success">Sudah Lunas</span>';
			}

			$data['harga_beli'] = number_format($get->jumlah*$get->harga);
			$data['tanggal_order'] = date('d-m-Y', strtotime($get->date));

			$this->load->view('_partials/_head');
			$this->load->view('_partials/_header');
			$this->load->view('_partials/_sidebar');
			$this->load->view('konsumen/transaksi_detail', $data);
			$this->load->view('_partials/_footer');
			$this->load->view('_partials/_plugin');
			$this->load->view('services/transaksi');
		}

		public function transaksi_sukses()
		{
			$this->load->view('_partials/_head');
			$this->load->view('_partials/_header');
			$this->load->view('_partials/_sidebar');
			$this->load->view('konsumen/transaksi_sukses');
			$this->load->view('_partials/_footer');
			$this->load->view('_partials/_plugin');
			$this->load->view('services/transaksi');
		}

		public function view_trx_sukses()
		{
			$html = '';
			$data = $this->TransaksiModel->transaksi_sukses_admin();

			$no = 1;
			foreach ($data as $dp) {
				
				$html .= '<tr>
							<td class="align-middle text-center">'.$no++.'</td>
							<td class="align-middle">'.$dp->kode_transaksi.'</td>
							<td class="align-middle">'.$dp->nama_barang.'</td>
							<td class="align-middle">'.$dp->jumlah.'</td>
							<td class="align-middle">Rp. '.number_format($dp->harga).'</td>
							<td class="align-middle">Rp. '.number_format($dp->harga*$dp->jumlah).'</td>
							<td class="align-middle">'.date('d-m-Y', strtotime($dp->date)).'</td>
							
							<td class="align-middle">
								<a href="'.base_url('konsumen/Transaksi/transaksi_detail/'.$dp->kode_transaksi).'" class="btn btn-sm btn-success text-center mr-1 ml-lg-1 mb-1" data-id="'.$dp->id.'" data-kode="'.$dp->kode_transaksi.'">Lihat Transaksi</a>
							</td>
						</tr>';
			}
			echo $html;
		}

		public function validasi_pembayaran()
		{
			$id = $this->input->post('id');
			$stok = $this->input->post('stok');
			$jumlah = $this->input->post('jumlah');
			$id_barang = $this->input->post('id_barang');

			$barang['stok'] = $stok-$jumlah;
			$data['status_transaksi'] = 1;
			$data['date'] = date('Y-m-d H:i:s');
			$proses = $this->TransaksiModel->validasi($id, $data, $id_barang, $barang);
		}
	
	}
	
	/* End of file Transaksi.php */
	/* Location: ./application/controllers/admin/Transaksi.php */
?>