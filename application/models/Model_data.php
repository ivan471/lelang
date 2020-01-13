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
			'nama_barang' => $this->input->post('nama_barang'),
			'harga_awal' => $this->input->post('harga'),
			'lama_lelang' => $tgl,
			'berakhir' => date('Y-m-d', strtotime('+' . $tgl . 'days', strtotime($tgl1))),
			'kelipatan_harga' => $this->input->post('kelipatan'),
			'link_gambar' => $file['file_name'],
			'id_pemilik' => $this->session->uid,
			'deskripsi' => $this->input->post('deskripsi'),
			'status' => '0'
		];
		$this->db->insert('barang', $data);
	}

	public function tampilkan()
	{
		$query = $this->db->query("SELECT * from barang where status ='0' ");
		// $query = $this->db->query("SELECT * from barang");
		return $query->result_array();
	}
	public function inbox($id)
	{
		$query = $this->db->query("SELECT * from barang inner join pemenang using(kode_barang) inner join users using(id_user) where status ='1' and pemenang.id_user ='".$id."' ");
		return $query->result_array();
	}
	public function tampilkan_lelang_user($id)
	{
		$query = $this->db->query("SELECT * from barang  inner join users on barang.id_pemilik = users.id_user where id_pemilik ='".$id."'");
		return $query->result_array();
	}
	public function signin($nama, $pass1)
	{
		$sql = "SELECT * FROM users WHERE username='" . $nama . "' and password='" . $pass1 . "'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function detail($id){
		$sql = "SELECT * FROM barang inner join users on barang.id_pemilik = users.id_user WHERE kode_barang='" . $id . "'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function tampil_edit_brg($id){
		$sql = "SELECT * FROM barang inner join users on barang.id_pemilik = users.id_user WHERE kode_barang='" . $id . "'";
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
	public function edit($id)
	{
		$data = array('nama_barang' => $this->input->post('nama_barang'), 'lama_lelang' => $this->input->post('lama_lelang'),'deskripsi' => $this->input->post('deskripsi'),'kelipatan_harga' => $this->input->post('kelipatan'));
		$this->db->where('kode_barang', $id);
		$this->db->update('barang', $data);
	}
	public function comment($id, $kode)
	{
		$query = $this->db->query("SELECT * FROM komentar where id_user='" . $id . "' and kode_barang='" . $kode . "'");
		$row = $query->row();
		$data1 = $row->id_komentar;
		if (isset($data1)) {
			$data = array('harga_diminta' => $this->input->post('harga'), 'waktu' => date('Y-m-d H:i:s'));
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
	public function cek_lelang(){
		$tgl = date('Y-m-d');
		$this->db->where('berakhir <=', $tgl);
		$this->db->where('status', '0');
		$this->db->from('barang');
		$baris = $this->db->count_all_results(); //total row
		for ($i=0; $i <$baris ; $i++) {
			$query = $this->db->query("SELECT * FROM barang where berakhir >= $tgl and status='0' ORDER BY berakhir asc LIMIT 1");
			$row = $query->row();
			$kode = $row->kode_barang;
			$data = array('status' => '1');
			$this->db->where('kode_barang', $kode);
			$this->db->update('barang', $data);
			$query = $this->db->query("SELECT * FROM komentar where kode_barang ='".$kode."' ORDER BY harga_diminta desc LIMIT 1");
			$row = $query->row();
			$id_user = $row->id_user;
			$harga = $row->harga_diminta;
			$data = [
				'id_user' => $id_user,
				'kode_barang' => $kode,
				'harga' => $harga
			];
			$this->db->insert('pemenang', $data);
		}
	}
	public function lelang_end(){
		$query = $this->db->query("SELECT * from barang inner join pemenang using(kode_barang) inner join users using(id_user) where status ='1'");
		return $query->result_array();
	}
	public function get_pembeli(){
		$query = $this->db->query("SELECT * from pembeli where status ='1'");
		return $query->result_array();
	}


}
