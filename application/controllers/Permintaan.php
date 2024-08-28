<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {

	public function mahasiswa()
	{
		$data = [
			'menu' => 'per-mahasiswa'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/permintaan/mahasiswa');
		$this->load->view('template/footer');
	}
	public function siswa()
	{
		$data = [
			'menu' => 'per-siswa'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/permintaan/siswa');
		$this->load->view('template/footer');
	}
}