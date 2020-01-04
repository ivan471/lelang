<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_data');
		$this->load->model('model_user');
	}
	public function index()
	{
		$this->model_data->cek_lelang();
		//$uid = $this->session->uid;
		// if (isset($uid)) {
			//Pagination
			$this->load->library('pagination');
			$config['base_url'] = 'http://localhost/lelang/';
			//$this->db->like('status', '1');
			$this->db->from('barang');
			$config['total_rows'] = $this->db->count_all_results();
			$config['per_page'] = 10;
			$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
			$config['full_tag_close'] = '</ul></nav>';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = 'Prev';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['attributes'] = array('class' => 'page-link');
			$data['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['brg'] = $this->model_data->tampilkan($config['per_page'], $data['start']);
			$this->pagination->initialize($config);
			//$data['brg'] = $this->model_data->tampilkan();
			$this->load->template('users/home', $data);
		// } else {
		// 	redirect('/login');
		// }
	}
	public function history($id)
	{
		$uid = $this->session->uid;
		if (isset($uid)) {
			$data['brg'] = $this->model_data->tampilkan_lelang_user($id);
			$this->load->template('users/history',$data);
		} else {
			redirect('/login');
		}
	}
	public function lelang_end()
	{
		$uid = $this->session->uid;
		if (isset($uid)) {
			$data['end'] = $this->model_data->lelang_end();
			//	$data['user'] = $this->model_data->get_pembeli();
			$this->load->template('users/lelang_end',$data);
		} else {
			redirect('/login');
		}
	}
	public function inbox($id)
	{
		$uid = $this->session->uid;
		if (isset($uid)) {
			$data['end'] = $this->model_data->inbox($id);
			//	$data['user'] = $this->model_data->get_pembeli();
			$this->load->template('users/inbox',$data);
		} else {
			redirect('/login');
		}
	}
	public function login()
	{
		$data['failed'] = "0";
		$this->load->template('login', $data);
	}
	public function detail($id)
	{
		$data['detail'] = $this->model_data->detail($id);
		$data['komentar'] = $this->model_data->komentar($id);
		$ds = $this->model_data->lastkomentar($id);
		$data['cekharga'] = $ds;
		if (isset($ds)) {
			$data['ds'] = '1';
		}
		$this->load->template('users/comment', $data);
	}
	public function comment($id, $kode)
	{
		$data['detail'] = $this->model_data->comment($id, $kode);
		redirect('/');
	}
	public function signout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
	public function reg()
	{
		$this->load->template('users/register');
	}
	public function reset()
	{
		$this->load->template('users/resetpassword');
	}
	public function rest()
	{
		$this->model_user->reset();
		redirect('/');
	}
	public function input(){
		if (isset($this->session->uid)) {
			$this->load->template('input');
		}
	}
	public function profil($id){
		if (isset($this->session->uid)) {
			$data['profil']= $this->model_user->detail_user($id);
			$this->load->template('users/profil',$data);
		}
	}
	public function lelang()
	{
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size']  = '0';
		$config['remove_space'] = TRUE;
		$this->upload->initialize($config);
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$file=$this->upload->data();
			$this->model_data->simpan($file);
			redirect('/');
			// echo "Berhasil";
		}else{
			// Jika gagal :
			echo "Gagal";
		}
	}
	public function signin()
	{
		$nama = $this->input->post('username');
		$pass = $this->input->post('password');
		$pass1 = md5($pass);
		$user = $this->model_data->signin($nama, $pass1);
		if (isset($user)) {
			// password cocok, login berhasil
			// simpan data session untuk mengenali user di setiap halaman
			$this->session->uid = $user['id_user'];
			$this->session->nama = $user['nama_user'];
			// $data['foto']= $user['foto'];
			// kembali ke halaman depan
			redirect('/');
		} else {
			$data['failed'] = "1";
			$this->load->template('login', $data);
		}
	}
	public function register(){
		$config['upload_path'] = 'uploads/ktp/';
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size']  = '0';
		$config['remove_space'] = TRUE;
		$this->upload->initialize($config);
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('gambar_ktp')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$file=$this->upload->data();
			$filektp =$file;
			$config['upload_path'] = 'uploads/kk/';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['max_size']  = '0';
			$config['remove_space'] = TRUE;
			$this->upload->initialize($config);
			$this->load->library('upload', $config); // Load konfigurasi uploadnya
			if($this->upload->do_upload('gambar_kk')){ // Lakukan upload dan Cek jika proses upload berhasil
				// Jika berhasil :
				$file=$this->upload->data();
				$filekk =$file;
				$this->model_user->register($filektp,$filekk);
				redirect('/');
				// echo "Berhasil";
			}else{
				// Jika gagal :
				echo "Gagal Upload Kk";
			}
		}else{
			// Jika gagal :
			echo "Gagal Upload Ktp";
		}
	}
}
