<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Model
{
    private $table = 'peminjaman';
    public $primaryKey = 'kd_peminjaman';

    public function getAll()
    {
        $this->db->select('peminjaman.*, anggota.nama as nama_anggota')
         ->from($this->table)
         ->join('anggota', 'anggota.kd_anggota = peminjaman.kd_anggota');
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
            'kd_anggota' => $post['member_code'],
            'kd_buku' => $post['book_code'],
            'jumlah_pinjam' => $post['qty'],
            'tanggal_pinjam' => $post['date'],
        );
        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $post = $this->input->post();

        $data = array(
            'kd_anggota' => $post['member_code'],
            'kd_buku' => $post['book_code'],
            'jumlah_pinjam' => $post['qty'],
            'tanggal_pinjam' => date('Y-m-d', strtotime($post['date'])),
        );
        
        return $this->db->update($this->table, $data, array($this->primaryKey => $post['code']));
    }

    public function delete($code)
    {
        return $this->db->delete($this->table, array($this->primaryKey => $code));
    }
}