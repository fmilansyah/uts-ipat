<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    private $table = 'users';
	public $primaryKey = 'kd_users';

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    const LEVEL_ADMIN = 1;
    const LEVEL_MEMBER = 2;

    function auth($username, $password)
	{
		$this->db->where('username', $username);
		$query = $this->db->get($this->table);
		$user = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$user) {
			return FALSE;
		}

		// cek apakah akunnya valid?
		if ($user->password != $password || $user->status == self::STATUS_INACTIVE || $user->level != self::LEVEL_ADMIN) {
			return FALSE;
		}

		// bikin session
		$this->session->set_userdata([$this->primaryKey => $user->kd_users]);

		return $this->session->has_userdata($this->primaryKey);
	}

	public function logout()
	{
		$this->session->unset_userdata($this->primaryKey);
		return !$this->session->has_userdata($this->primaryKey);
	}

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
            'username' => $post['username'],
            'password' => $post['password'],
            'status' => $post['status'],
            'level' => $post['level'],
        );
        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $post = $this->input->post();

        $data = array(
            'nama' => $post['name'],
            'username' => $post['username'],
            'status' => $post['status'],
            'level' => $post['level'],
        );

		if (isset($post['password'])) {
			$data['password'] = $post['password'];
		}
        
        return $this->db->update($this->table, $data, array($this->primaryKey => $post['code']));
    }

    public function delete($code)
    {
        return $this->db->delete($this->table, array($this->primaryKey => $code));
    }
}
