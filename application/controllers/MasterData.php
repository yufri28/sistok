<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Controller {

	public function tahunAjaran()
	{
		$data = [
			'menu' => 'tahun_ajar'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/tahun_ajar');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}
	
	public function unit()
	{
		$data = [
			'menu' => 'unit'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/unit');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}
	
	public function prodi()
	{
		$data = [
			'menu' => 'prodi'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/prodi');
		$this->load->view('template/footer');
		$this->load->view('template/js_prodi');
	}

	public function mahasiswa()
	{
		$data = [
			'menu' => 'mahasiswa'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/mahasiswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}

	public function siswa()
	{
		$data = [
			'menu' => 'siswa'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/siswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}

	public function typeStok()
	{
		$data = [
			'menu' => 'type_stok'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/type_stok');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}

	public function ukuran()
	{
		$data = [
			'menu' => 'ukuran'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/ukuran');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}
}