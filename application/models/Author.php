<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Model
{
    private $table = 'pengarang';
    public $primaryKey = 'kd_pengarang';

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    
    public function getById($code)
    {
        return $this->db->get_where($this->table, [$this->primaryKey => $code])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['name'],
        );
        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $post = $this->input->post();

        $data = array(
            'nama' => $post['name'],
        );
        
        return $this->db->update($this->table, $data, array($this->primaryKey => $post['code']));
    }

    public function delete($code)
    {
        return $this->db->delete($this->table, array($this->primaryKey => $code));
    }
}