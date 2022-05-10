<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('book');
        $this->load->model('author');
        $this->load->model('publisher');
        $this->load->model('bookType');
        $this->load->model('loan');
        if (!$this->session->has_userdata('kd_users')) {
			redirect('login');
		}
    }

    public function index()
    {
        $data['pageTitle'] = 'Daftar Buku';
        $data['books'] = $this->book->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('books/list', $data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $data['pageTitle'] = 'Tambah Buku';
        $data['authors'] = $this->author->getAll();
        $data['publishers'] = $this->publisher->getAll();
        $data['bookTypes'] = $this->bookType->getAll();
        $data['loans'] = $this->loan->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('books/add', $data);
        $this->load->view('layouts/footer');
    }

    public function save()
    {
        $this->book->save();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('books');
    }

    public function edit($code = null)
    {
        if (!isset($code)) redirect('books');

        $data['pageTitle'] = 'Edit Anggota';
        $data['book'] = $this->book->getById($code);
        if (!$data['book']) show_404();

        $data['authors'] = $this->author->getAll();
        $data['publishers'] = $this->publisher->getAll();
        $data['bookTypes'] = $this->bookType->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('books/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update()
    {
        $this->book->update();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('books');
    }

    public function delete($code = null)
    {
        if (!isset($code)) show_404();

        if ($this->book->delete($code)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('books');
        }
    }
}
