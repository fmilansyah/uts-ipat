<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->session->has_userdata('kd_users')) {
			redirect('login');
		}
	}

	public function index()
	{
        $data['pageTitle'] = 'Dashboard';

		$this->load->view('layouts/header', $data);
		$this->load->view('dashboard');
        $this->load->view('layouts/footer');
	}

}
