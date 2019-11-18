<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_data');
	}
	public function index()
	{
		$uid = $this->session->uid;
		if (isset($uid)) {
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
		} else {
			redirect('/login');
		}
	}
	public function history()
	{
		$uid = $this->session->uid;
		if (isset($uid)) {
			$data['brg'] = $this->model_data->tampilkan();
			$this->load->template('users/history');
		} else {
			redirect('/login');
		}
	}
	public function lelang_end()
	{
		$uid = $this->session->uid;
		if (isset($uid)) {
			$data['brg'] = $this->model_data->tampilkan();
			$this->load->template('users/lelang_end');
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
	public function register()
	{
		$this->model_data->register();
		redirect('/login');
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
}
