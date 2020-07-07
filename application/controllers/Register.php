<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Register extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('User_Model');
		}
	
		public function index()
		{
			$this->load->view('register');
		}

		public function registration()
		{	
			$data['fname'] = $this->input->post('fname');
			$data['lname'] = $this->input->post('lname');
			$data['email'] = $this->input->post('email');
			$data['id_level'] = 3;
			$data['status'] = 1;
			$data['password'] = hash('sha512', $this->input->post('password') . config_item('encryption_key'));
			
			$cekEmail = $this->db->get_where('user', array('email' => $data['email']));
			if ($cekEmail->num_rows() > 0) {
				$response = array(
					'status' => 'error',
					'message' => 'Email Sudah Terdaftar',
					'redirect' => base_url()
					);
			}else{
				$insert = $this->User_Model->insertUser($data);
				$response = array(
					'status' => 'success',
					'message' => 'Pendaftaran Berhasil Silahkan Lakukan Login',
					'redirect' => base_url('Login')
					);
			}

			echo json_encode($response);
		}

	}
	
	/* End of file Register.php */
	/* Location: ./application/controllers/Register.php */
?>