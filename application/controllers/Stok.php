<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

	public function mahasiswa()
	{
		$data = [
			'menu' => 'stok-mahasiswa'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/stok/mahasiswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_stok');
	}
	public function siswa()
	{
		$data = [
			'menu' => 'stok-siswa'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/stok/siswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_stok');
	}
}