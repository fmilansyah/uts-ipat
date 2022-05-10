<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member');
        if (!$this->session->has_userdata('kd_users')) {
			redirect('login');
		}
    }

    public function index()
    {
        $data['pageTitle'] = 'Daftar Anggota';
        $data['members'] = $this->member->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('members/list', $data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $data['pageTitle'] = 'Tambah Anggota';

        $this->load->view('layouts/header', $data);
        $this->load->view('members/add');
        $this->load->view('layouts/footer');
    }

    public function save()
    {
        $this->member->save();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('members');
    }

    public function edit($code = null)
    {
        if (!isset($code)) redirect('members');

        $data['pageTitle'] = 'Edit Anggota';
        $data['member'] = $this->member->getById($code);
        if (!$data['member']) show_404();

        $this->load->view('layouts/header', $data);
        $this->load->view('members/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update()
    {
        $this->member->update();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('members');
    }

    public function delete($code = null)
    {
        if (!isset($code)) show_404();

        if ($this->member->delete($code)) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('members');
        }
    }
}
