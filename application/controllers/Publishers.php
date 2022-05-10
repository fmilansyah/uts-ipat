<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publishers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('publisher');
        if (!$this->session->has_userdata('kd_users')) {
			redirect('login');
		}
    }

    public function index()
    {
        $data['pageTitle'] = 'Daftar Penerbit';
        $data['publishers'] = $this->publisher->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('publishers/list', $data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $data['pageTitle'] = 'Tambah Penerbit';

        $this->load->view('layouts/header', $data);
        $this->load->view('publishers/add');
        $this->load->view('layouts/footer');
    }

    public function save()
    {
        $this->publisher->save();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('publishers');
    }

    public function edit($code = null)
    {
        if (!isset($code)) redirect('publishers');

        $data['pageTitle'] = 'Edit Penerbit';
        $data['publisher'] = $this->publisher->getById($code);
        if (!$data['publisher']) show_404();

        $this->load->view('layouts/header', $data);
        $this->load->view('publishers/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update()
    {
        $this->publisher->update();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('publishers');
    }

    public function delete($code = null)
    {
        if (!isset($code)) show_404();

        if ($this->publisher->delete($code)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('publishers');
        }
    }
}
