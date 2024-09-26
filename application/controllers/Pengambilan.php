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
	
	public function siswa()
	{
		$getAllSiswa = $this->PengambilanModel->getAllSiswa();
		$allTahunAjar = $this->TahunAjarModel->getAll();
		$allSiswa = $this->SiswaModel->getAll();
		$getAllStokSiswa = $this->StokModel->getAllSiswa();
		$data = [
			'menu' => 'pengambilan_siswa',
			'all_pengambilan' => $getAllSiswa,
			'allTahunAjar' => $allTahunAjar,
			'all_siswa' => $allSiswa,
			'getAllStokSiswa' => $getAllStokSiswa,
		];
		$this->load->view('template/header',$data);
		$this->load->view('/pengambilan/siswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_pengambilan');
	}

	public function add_pengambilan_siswa()
	{
		$fk_ta = htmlspecialchars($this->input->post('fk_ta'));	
		$semester = htmlspecialchars($this->input->post('semester'));	
		$fk_siswa = htmlspecialchars($this->input->post('fk_siswa'));	
		$kelas = htmlspecialchars($this->input->post('kelas'));	
		$fk_stok = htmlspecialchars($this->input->post('fk_stok'));	

		$data = [
			'fk_siswa' => $fk_siswa,
			'kelas' => $kelas,
			'semester' => $semester,
			'fk_stok' => $fk_stok,
			'fk_ta' => $fk_ta
		];
		
		$insert = $this->PengambilanModel->add_siswa($data);

		if($insert){
			$this->session->set_flashdata('success', 'Data pengambilan berhasil disimpan.');
		}else{
			$this->session->set_flashdata('error', 'Data pengambilan gagal disimpan.');
		}
		redirect('pengambilan/siswa');
	}

	public function update_pengambilan_siswa()
	{
		$id_pengambilan = htmlspecialchars($this->input->post('id_pengambilan'));	
		$kelas = htmlspecialchars($this->input->post('kelas'));	
		// $fk_ta = htmlspecialchars($this->input->post('fk_ta'));	
		// $semester = htmlspecialchars($this->input->post('semester'));	
		// $fk_siswa = htmlspecialchars($this->input->post('fk_siswa'));	
		// $fk_stok = htmlspecialchars($this->input->post('fk_stok'));	

		$data = [
			// 'fk_siswa' => $fk_siswa,
			'kelas' => $kelas,
			// 'semester' => $semester,
			// 'fk_stok' => $fk_stok,
			// 'fk_ta' => $fk_ta
		];
		
		$update = $this->PengambilanModel->update_siswa($id_pengambilan, $data);

		if($update){
			$this->session->set_flashdata('success', 'Data pengambilan berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error', 'Data pengambilan gagal diupdate.');
		}
		redirect('pengambilan/siswa');
	}

	public function delete_pengambilan_siswa()
	{
		$id_pengambilan = htmlspecialchars($this->input->post('id_pengambilan'));	
		$kembalikan_stok = htmlspecialchars($this->input->post('kembalikan_stok'));	
		$fk_stok = htmlspecialchars($this->input->post('fk_stok'));	
		
		$cekPengambilanSiswaById = $this->PengambilanModel->getByIdSiswa($id_pengambilan);

		if($cekPengambilanSiswaById)
		{
			$data = [
				'kembalikan_stok' => $kembalikan_stok,
				'fk_stok' => $fk_stok
			];
			
			$deleted = $this->PengambilanModel->delete_siswa($id_pengambilan, $data);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data pengambilan tidak ditemukan.');
		}

		redirect(base_url('pengambilan/siswa'));
	}

	public function mahasiswa()
	{
		$getPengambilanMahasiswa = $this->PengambilanModel->getPengambilanMahasiswa();
		$allTahunAjar = $this->TahunAjarModel->getAll();
		$allMahasiswa = $this->MahasiswaModel->getAll();
		$getAllStokMahasiswa = $this->StokModel->getAllMahasiswa();
		$data = [
			'menu' => 'pengambilan_mahasiswa',
			'all_pengambilan' => $getPengambilanMahasiswa,
			'allTahunAjar' => $allTahunAjar,
			'all_mahasiswa' => $allMahasiswa,
			'getAllStokMahasiswa' => $getAllStokMahasiswa,
		];
		$this->load->view('template/header',$data);
		$this->load->view('/pengambilan/mahasiswa');
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
		redirect('pengambilan/mahasiswa');
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
		redirect('pengambilan/mahasiswa');
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

		redirect(base_url('pengambilan/mahasiswa'));
	}
}