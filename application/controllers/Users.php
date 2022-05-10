<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        if (!$this->session->has_userdata('kd_users')) {
			redirect('login');
		}
    }

    public function index()
    {
        $data['pageTitle'] = 'Daftar Pengguna';
        $data['users'] = $this->user->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('users/list', $data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $data['pageTitle'] = 'Tambah Pengguna';

        $this->load->view('layouts/header', $data);
        $this->load->view('users/add');
        $this->load->view('layouts/footer');
    }

    public function save()
    {
        $this->user->save();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('users');
    }

    public function edit($code = null)
    {
        if (!isset($code)) redirect('users');

        $data['pageTitle'] = 'Edit Pengguna';
        $data['user'] = $this->user->getById($code);
        if (!$data['user']) show_404();

        $this->load->view('layouts/header', $data);
        $this->load->view('users/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update()
    {
        $this->user->update();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('users');
    }

    public function delete($code = null)
    {
        if (!isset($code)) show_404();

        if ($this->user->delete($code)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('users');
        }
    }
}
