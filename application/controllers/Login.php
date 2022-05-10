<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('user');
		if ($this->session->has_userdata('kd_users')) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->user->auth($username, $password)){
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal');
			redirect('login');
		}
	}

}
