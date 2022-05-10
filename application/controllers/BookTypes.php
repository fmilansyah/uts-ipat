<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookTypes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bookType');
        if (!$this->session->has_userdata('kd_users')) {
			redirect('login');
		}
    }

    public function index()
    {
        $data['pageTitle'] = 'Daftar Jenis Buku';
        $data['bookTypes'] = $this->bookType->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('bookTypes/list', $data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $data['pageTitle'] = 'Tambah Jenis Buku';

        $this->load->view('layouts/header', $data);
        $this->load->view('bookTypes/add');
        $this->load->view('layouts/footer');
    }

    public function save()
    {
        $this->bookType->save();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('bookTypes');
    }

    public function edit($code = null)
    {
        if (!isset($code)) redirect('bookTypes');

        $data['pageTitle'] = 'Edit Jenis Buku';
        $data['bookType'] = $this->bookType->getById($code);
        if (!$data['bookType']) show_404();

        $this->load->view('layouts/header', $data);
        $this->load->view('bookTypes/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update()
    {
        $this->bookType->update();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('bookTypes');
    }

    public function delete($code = null)
    {
        if (!isset($code)) show_404();

        if ($this->bookType->delete($code)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('bookTypes');
        }
    }
}
