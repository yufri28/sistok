<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function mahasiswa()
	{
		$data = [
			'menu' => 'pem-mahasiswa'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/pemesanan/mahasiswa');
		$this->load->view('template/footer');
	}
	public function siswa()
	{
		$data = [
			'menu' => 'pem-siswa'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/pemesanan/siswa');
		$this->load->view('template/footer');
	}
}