<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('User_Model');
		}
	
		public function index()
		{
			$this->load->view('login');
		}

		public function proses_login()
		{
			$email 		= $this->input->post('email');
			$password 	= hash('sha512', $this->input->post('password').config_item('encryption_key'));

			$result = $this->User_Model->login($email, $password);
			if ($result->num_rows() > 0) {
				foreach ($result->result() as $rs) {
					$data_session = array(
						'fname' 		=> $rs->fname,
						'lname' 		=> $rs->lname,
						'id'			=> $rs->id,
						'level'			=> $rs->id_level,
						'foto'			=> $rs->foto,
						'email'			=> $rs->email,
						'nama_akses'	=> $rs->nama_akses,
						'link'			=> $rs->link,
						'status' 		=> "login"
					);

					$this->session->set_userdata($data_session);
				};
				$response = array(
					'status' => 'success',
					'message' => 'Anda Berhasil Login',
					'redirect' => base_url($this->session->userdata('link').'/Dashboard'),
					);
			}else{
				$response = array(
					'status' => 'warning',
					'message' => 'Username Atau Password yang anda masukan salah!',
					'redirect' => base_url('login')
					);
			};

			echo json_encode($response);
		}
	
	}
	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
?>