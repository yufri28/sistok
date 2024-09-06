<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengambilan extends CI_Controller {

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
        $this->load->model('StokModel');
        $this->load->model('PermintaanModel');
        $this->load->model('PemesananModel');
        $this->load->model('PengambilanModel');
		
		if($this->AuthModel->cek_default_admin() == false){
			$this->AuthModel->add_default_admin();
		}
		if(!$this->session->userdata('role')) {
			redirect(base_url('auth'));
		}

	}
	
	public function sd()
	{
		$data = [
			'menu' => 'pengambilan_sd'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/pengambilan/sd');
		$this->load->view('template/footer');
	}
	public function smp()
	{
		$data = [
			'menu' => 'pengambilan_smp'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/pengambilan/smp');
		$this->load->view('template/footer');
	}
	public function sma()
	{
		$data = [
			'menu' => 'pengambilan_sma'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/pengambilan/sma');
		$this->load->view('template/footer');
	}

	public function ucb()
	{
		$getPengambilanMahasiswa = $this->PengambilanModel->getPengambilanMahasiswa();
		$allTahunAjar = $this->TahunAjarModel->getAll();
		$allMahasiswa = $this->MahasiswaModel->getAll();
		$getAllStokMahasiswa = $this->StokModel->getAllMahasiswa();
		$data = [
			'menu' => 'pengambilan_ucb',
			'all_pengambilan' => $getPengambilanMahasiswa,
			'allTahunAjar' => $allTahunAjar,
			'all_mahasiswa' => $allMahasiswa,
			'getAllStokMahasiswa' => $getAllStokMahasiswa,
		];
		$this->load->view('template/header',$data);
		$this->load->view('/pengambilan/ucb');
		$this->load->view('template/footer');
		$this->load->view('template/js_pengambilan');
	}

	public function add_pengambilan_mahasiswa()
	{
		$fk_ta = htmlspecialchars($this->input->post('fk_ta'));	
		$semester = htmlspecialchars($this->input->post('semester'));	
		$fk_mahasiswa = htmlspecialchars($this->input->post('fk_mahasiswa'));	
		$kelas = htmlspecialchars($this->input->post('kelas'));	
		$fk_stok = htmlspecialchars($this->input->post('fk_stok'));	

		$data = [
			'fk_mahasiswa' => $fk_mahasiswa,
			'kelas' => $kelas,
			'semester' => $semester,
			'fk_stok' => $fk_stok,
			'fk_ta' => $fk_ta
		];
		
		$insert = $this->PengambilanModel->add_mahasiswa($data);

		if($insert){
			$this->session->set_flashdata('success', 'Data pengambilan berhasil disimpan.');
		}else{
			$this->session->set_flashdata('error', 'Data pengambilan gagal disimpan.');
		}
		redirect('pengambilan/ucb');
	}

	public function update_pengambilan_mahasiswa()
	{
		$id_pengambilan = htmlspecialchars($this->input->post('id_pengambilan'));	
		$kelas = htmlspecialchars($this->input->post('kelas'));	
		// $fk_ta = htmlspecialchars($this->input->post('fk_ta'));	
		// $semester = htmlspecialchars($this->input->post('semester'));	
		// $fk_mahasiswa = htmlspecialchars($this->input->post('fk_mahasiswa'));	
		// $fk_stok = htmlspecialchars($this->input->post('fk_stok'));	

		$data = [
			// 'fk_mahasiswa' => $fk_mahasiswa,
			'kelas' => $kelas,
			// 'semester' => $semester,
			// 'fk_stok' => $fk_stok,
			// 'fk_ta' => $fk_ta
		];
		
		$update = $this->PengambilanModel->update_mahasiswa($id_pengambilan, $data);

		if($update){
			$this->session->set_flashdata('success', 'Data pengambilan berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error', 'Data pengambilan gagal diupdate.');
		}
		redirect('pengambilan/ucb');
	}

	public function delete_pengambilan_mahasiswa()
	{
		$id_pengambilan = htmlspecialchars($this->input->post('id_pengambilan'));	
		$kembalikan_stok = htmlspecialchars($this->input->post('kembalikan_stok'));	
		$fk_stok = htmlspecialchars($this->input->post('fk_stok'));	
		
		$cekPengambilanMahasiswaById = $this->PengambilanModel->getByIdMahasiswa($id_pengambilan);

		if($cekPengambilanMahasiswaById)
		{
			$data = [
				'kembalikan_stok' => $kembalikan_stok,
				'fk_stok' => $fk_stok
			];
			
			$deleted = $this->PengambilanModel->delete_mahasiswa($id_pengambilan, $data);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data pengambilan tidak ditemukan.');
		}

		redirect(base_url('pengambilan/ucb'));
	}
}