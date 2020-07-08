<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
	
		public function index()
		{
			$this->load->view('_partials/_head');
			$this->load->view('_partials/_sidebar');
			$this->load->view('_partials/_header');
			$this->load->view('_partials/_main');
			$this->load->view('_partials/_footer');
			$this->load->view('_partials/_plugin');
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/admin/Dashboard.php */
?>