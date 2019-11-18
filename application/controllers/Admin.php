<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('model_data');
	}
	public function index()
	{
		$data['brg'] = $this->model_data->tampilkan();
		$this->load->template('admin/home', $data);
	}
	public function input()
	{
		$this->load->template('input');
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
	}
