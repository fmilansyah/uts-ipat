<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('author');
        if (!$this->session->has_userdata('kd_users')) {
			redirect('login');
		}
    }

    public function index()
    {
        $data['pageTitle'] = 'Daftar Pengarang';
        $data['authors'] = $this->author->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('authors/list', $data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $data['pageTitle'] = 'Tambah Pengarang';

        $this->load->view('layouts/header', $data);
        $this->load->view('authors/add');
        $this->load->view('layouts/footer');
    }

    public function save()
    {
        $this->author->save();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('authors');
    }

    public function edit($code = null)
    {
        if (!isset($code)) redirect('authors');

        $data['pageTitle'] = 'Edit Pengarang';
        $data['author'] = $this->author->getById($code);
        if (!$data['author']) show_404();

        $this->load->view('layouts/header', $data);
        $this->load->view('authors/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update()
    {
        $this->author->update();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('authors');
    }

    public function delete($code = null)
    {
        if (!isset($code)) show_404();

        if ($this->author->delete($code)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('authors');
        }
    }
}
