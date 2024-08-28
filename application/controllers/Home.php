<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('id_auth')) {
			redirect(base_url('auth'));
		}
	}
	
	public function index()
	{
		$data = [
			"menu" => "home"
		];
		$this->load->view('template/header',$data);
		$this->load->view('dashboard');
		$this->load->view('template/footer');
	}
}