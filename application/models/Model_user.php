<?php
class Model_user extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
	public function register($filektp,$filekk)
	{
		$data = [
			'no_ktp' => $this->input->post('no_ktp'),
			'nama_user' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'kota' => $this->input->post('kota'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'gambar_ktp' => $filektp['file_name'],
			'gambar_kk' => $filekk['file_name']
		];
		$this->db->insert('users', $data);
	}
	public function detail_user($id){
		$query = $this->db->query("SELECT * from users where id_user ='".$id."'");
		return $query->row_array();
	}
	public function reset(){
		$data = array('password' => md5($this->input->post('password')));
		$this->db->where('email', $this->input->post('email'));
		$this->db->update('users', $data);
	}
}
