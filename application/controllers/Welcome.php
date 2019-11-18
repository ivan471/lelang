<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct() {
		parent::__construct();

		$this->load->model('model_data');
	}
	public function index()
	{
		$this->load->template('admin/home');
	}
}
