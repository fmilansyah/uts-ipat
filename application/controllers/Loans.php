<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loans extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('loan');
        $this->load->model('member');
        if (!$this->session->has_userdata('kd_users')) {
			redirect('login');
		}
    }

    public function index()
    {
        $data['pageTitle'] = 'Daftar Peminjaman';
        $data['loans'] = $this->loan->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('loans/list', $data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $data['pageTitle'] = 'Tambah Peminjaman';
        $data['members'] = $this->member->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('loans/add', $data);
        $this->load->view('layouts/footer');
    }

    public function save()
    {
        $this->loan->save();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('loans');
    }

    public function edit($code = null)
    {
        if (!isset($code)) redirect('loans');

        $data['pageTitle'] = 'Edit Peminjaman';
        $data['loan'] = $this->loan->getById($code);
        if (!$data['loan']) show_404();

        $data['members'] = $this->member->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('loans/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update()
    {
        $this->loan->update();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('loans');
    }

    public function delete($code = null)
    {
        if (!isset($code)) show_404();

        if ($this->loan->delete($code)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('loans');
        }
    }
}
