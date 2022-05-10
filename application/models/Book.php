<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Model
{
    private $table = 'buku';
    public $primaryKey = 'kd_buku';

    public function getAll()
    {
        $this->db->select('buku.judul, jenis_buku.nama as nama_jenis_buku, penerbit.nama as nama_penerbit, pengarang.nama as nama_pengarang, buku.stok')
         ->from($this->table)
         ->join('jenis_buku', 'jenis_buku.kd_jenis_buku = buku.kd_jenis_buku')
         ->join('penerbit', 'penerbit.kd_penerbit = buku.kd_penerbit')
         ->join('pengarang', 'pengarang.kd_pengarang = buku.kd_pengarang');
        $data = $this->db->get();
        return $data->result();
    }
    
    public function getById($code)
    {
        return $this->db->get_where($this->table, [$this->primaryKey => $code])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'kd_buku' => $post['code'],
            'judul' => $post['title'],
            'kd_jenis_buku' => $post['kd_jenis_buku'],
            'kd_penerbit' => $post['kd_penerbit'],
            'kd_pengarang' => $post['kd_pengarang'],
            'stok' => $post['stok'],
        );
        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $post = $this->input->post();

        $data = array(
            'judul' => $post['title'],
            'kd_jenis_buku' => $post['kd_jenis_buku'],
            'kd_penerbit' => $post['kd_penerbit'],
            'kd_pengarang' => $post['kd_pengarang'],
            'stok' => $post['stok'],
        );
        
        return $this->db->update($this->table, $data, array($this->primaryKey => $post['code']));
    }

    public function delete($code)
    {
        return $this->db->delete($this->table, array($this->primaryKey => $code));
    }
}