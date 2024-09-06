<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('TahunAjarModel');
        $this->load->model('UnitModel');
        $this->load->model('FakultasModel');
        $this->load->model('ProdiModel');
        $this->load->model('MahasiswaModel');
        $this->load->model('SiswaModel');
        $this->load->model('TypestokModel');
        $this->load->model('UkuranModel');
        $this->load->model('PermintaanModel');
        $this->load->model('PemesananModel');
        $this->load->model('StokModel');
		
		if($this->AuthModel->cek_default_admin() == false){
			$this->AuthModel->add_default_admin();
		}
		if(!$this->session->userdata('role')) {
			redirect(base_url('auth'));
		}

	}

	public function mahasiswa()
	{

		$getAllMahasiswa = $this->StokModel->getAllMahasiswa();
		$allProdi = $this->ProdiModel->getAll();
		$data = [
			'menu' => 'stok-mahasiswa',
			'all_mahasiswa' => $getAllMahasiswa,
			'all_prodi' => $allProdi,
		];
		
		$this->load->view('template/header',$data);
		$this->load->view('/stok/mahasiswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_stok');
	}

	public function delete_stok_mahasiswa()
	{
		$id_stok_mhs = htmlspecialchars($this->input->post('id_stok'));	
		
		$cekRestokById = $this->StokModel->getByIdMahasiswa($id_stok_mhs);

		if($cekRestokById)
		{
			$deleted = $this->StokModel->delete_mahasiswa($id_stok_mhs);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data ukuran tidak ditemukan.');
		}

		redirect(base_url('stok/mahasiswa'));
	}

	public function siswa()
	{
		$allUnit = $this->UnitModel->getAll();
		$getAllSiswa = $this->StokModel->getAllSiswa();
		$data = [
			'menu' => 'stok-siswa',
			'all_unit' => $allUnit,
			'all_siswa' => $getAllSiswa,
		];
		$this->load->view('template/header',$data);
		$this->load->view('/stok/siswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_stok');
	}

	public function delete_stok_siswa()
	{
		$id_stok_siswa = htmlspecialchars($this->input->post('id_stok'));	
		
		$cekRestokById = $this->StokModel->getByIdSiswa($id_stok_siswa);

		if($cekRestokById)
		{
			$deleted = $this->StokModel->delete_siswa($id_stok_siswa);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data ukuran tidak ditemukan.');
		}

		redirect(base_url('stok/siswa'));
	}
}