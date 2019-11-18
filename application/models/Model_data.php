<?php
class Model_data extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
	public function simpan($file)
	{
		$tgl = $this->input->post('lama_lelang');
		$tgl1 = date("Y/m/d");
		$data = [
			'nama' => $this->input->post('nama_barang'),
			'harga_awal' => $this->input->post('harga'),
			'lama_lelang' => $tgl,
			'berakhir' => date('Y-m-d', strtotime('+' . $tgl . 'days', strtotime($tgl1))),
			'kelipatan_harga' => $this->input->post('kelipatan'),
			'link_gambar' => $file['file_name'],
			'pemilik' => $this->session->nama,
			'status' => '0'
		];
		$this->db->insert('barang', $data);
	}
	public function register()
	{
		$data = [
			'nama_user' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'email' => $this->input->post('email'),
			'level' => '0'
		];
		$this->db->insert('users', $data);
	}
	public function tampilkan($limit, $start)
	{
		$query = $this->db->query("SELECT * from barang order by status desc limit $start, $limit");
		// $query = $this->db->query("SELECT * from barang");
		return $query->result_array();
	}
	public function signin($nama, $pass1)
	{
		$sql = "SELECT * FROM users WHERE username='" . $nama . "' and password='" . $pass1 . "'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function detail($id)
	{
		$sql = "SELECT * FROM barang WHERE kodebarang='" . $id . "'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function komentar($id)
	{
		$sql = "SELECT * FROM komentar inner join users using (id_user) WHERE kode_barang='" . $id . "' ORDER BY waktu DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function lastkomentar($id)
	{
		$query = $this->db->query("SELECT * FROM komentar WHERE kode_barang='" . $id . "'ORDER BY harga_diminta desc limit 1");
		return $query->row_array();
	}
	public function comment($id, $kode)
	{
		$query = $this->db->query("SELECT * FROM komentar where id_user='" . $id . "' and kode_barang=" . $kode . "");
		$row = $query->row();
		$data1 = $row->id_komentar;
		if (isset($data1)) {
			$data = array('harga' => $this->input->post('harga'), 'waktu' => date('Y-m-d H:i:s'));
			$this->db->where('id_komentar', $data1);
			$this->db->update('komentar', $data);
		} else {
			$data = [
				'id_user' => $id,
				'kode_barang' => $this->input->post('kode_barang'),
				'harga_diminta' => $this->input->post('harga')
			];
			$this->db->insert('komentar', $data);
		}
	}
	public function cek_lelang()
	{ }
}
