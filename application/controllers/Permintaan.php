<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {

	public $role;

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
		
		if($this->AuthModel->cek_default_admin() == false){
			$this->AuthModel->add_default_admin();
		}
		if(!$this->session->userdata('role')) {
			redirect(base_url('auth'));
		}

		$this->role = $this->session->userdata('role');

	}

	public function mahasiswa()
	{
		$getAllMahasiswa = $this->PermintaanModel->getAllMahasiswa($this->role);
		$allTypestok = $this->TypestokModel->getAll();
		$allProdi = $this->ProdiModel->getAll();
		$allUkuran = $this->UkuranModel->getAll();
		
		$data = [
			'menu' => 'per-mahasiswa',
			'all_mahasiswa' => $getAllMahasiswa,
			'all_typestok' => $allTypestok,
			'all_prodi' => $allProdi,
			'all_ukuran' => $allUkuran
		];
		
		$this->load->view('template/header',$data);
		$this->load->view('/permintaan/mahasiswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_restok');
	}

	public function add_restok_mahasiswa()
	{
		$fk_typestok = htmlspecialchars($this->input->post('fk_typestok'));	
		$fk_prodi = htmlspecialchars($this->input->post('fk_prodi'));	
		$fk_ukuran = htmlspecialchars($this->input->post('fk_ukuran'));	
		$jumlah_stok = htmlspecialchars($this->input->post('jumlah_stok'));	
		$timestamp = date("Y-m-d H:i:s");

		$existing_restok = $this->PermintaanModel->cekRestok($fk_typestok, $fk_prodi, $fk_ukuran);

		if ($existing_restok) {
			$msg = "Permintaan " . $existing_restok->nama_typestok . " dengan ukuran " . $existing_restok->nama_ukuran . " untuk prodi " . $existing_restok->nama_prodi . " sudah ada " . ($existing_restok->status == 'PER0' ? 'namun belum diajukan!' : 'dan sementara diajukan!');
			$this->session->set_flashdata('error', $msg);
		} else {
			$data_insert = [
				'tanggal' => $timestamp,
				'status' => 'PER0',
				'fk_typestok' => $fk_typestok,
				'fk_prodi' => $fk_prodi,
				'fk_ukuran' => $fk_ukuran,
				'jumlah_stok' => $jumlah_stok
			];

			$insert = $this->PermintaanModel->add_mahasiswa($data_insert);

			if ($insert) {
				$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error', 'Data gagal disimpan.');
			}
		}
	
		redirect(base_url('permintaan/mahasiswa'));
	}

	public function update_restok_mahasiswa()
	{
		$id_restok = htmlspecialchars($this->input->post('id_restok'));	
		$jumlah_stok = $this->input->post('jumlah_stok');

		if($jumlah_stok != null || $jumlah_stok != ''){
			$data_update = [
				'jumlah_stok' => $jumlah_stok
			];
		}elseif($jumlah_stok == null || $jumlah_stok == ''){
			$data_update = [
				'status' => 'PEM0'
			];
		}
		
		$updated = $this->PermintaanModel->update_mahasiswa($id_restok, $data_update);

		if ($updated) {
			$this->session->set_flashdata('success', 'Data berhasil diupdate.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal diupdate.');
		}

		redirect(base_url('permintaan/mahasiswa'));
	}

	public function update_statusrestok_mahasiswa() {
		$restokIds = $this->input->post('id_restok');
		$status = $this->input->post('status');
		
		if (empty($restokIds)) {
			echo json_encode(['status' => 'error', 'message' => 'Tidak ada permintaan yang dipilih!']);
			return;
		}
	
		$errors = []; // To collect errors for each transaction
	
		foreach ($restokIds as $restokId) {
			$getRestok = $this->PermintaanModel->getByIdMahasiswa($restokId);
			
			if (!$getRestok) {
				$errors[] = "Tidak ada permintaan yang cocok dengan ID yang anda kirim!";
				continue; // Skip to the next transaction
			}

			$data_update = [
				'status' => $status
			];
	
			$updateRestok = $this->PermintaanModel->update_mahasiswa($restokId, $data_update);
			if (!$updateRestok) {
				$errors[] = "Pengajuan gagal!";
				continue; // Skip to the next transaction
			}
		}
	
		if (empty($errors)) {
			echo json_encode(['status' => 'success', 'message' => 'Pengajuan berhasil!']);
		} else {
			echo json_encode(['status' => 'error', 'message' => implode(', ', $errors)]);
		}
		redirect('permintaan/mahasiswa');
	}

	public function delete_restok_mahasiswa()
	{
		$id_restok = htmlspecialchars($this->input->post('id_restok'));	
		
		$cekRestokById = $this->PermintaanModel->getByIdMahasiswa($id_restok);

		if($cekRestokById)
		{
			$deleted = $this->PermintaanModel->delete_mahasiswa($id_restok);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data ukuran tidak ditemukan.');
		}

		redirect(base_url('permintaan/mahasiswa'));
	}
	
	public function siswa()
	{
		$getAllSiswa = $this->PermintaanModel->getAllSiswa($this->role);
		$allTypestok = $this->TypestokModel->getAll();
		$allUnit = $this->UnitModel->getAll();
		$allUkuran = $this->UkuranModel->getAll();
		
		$data = [
			'menu' => 'per-siswa',
			'all_siswa' => $getAllSiswa,
			'all_typestok' => $allTypestok,
			'all_unit' => $allUnit,
			'all_ukuran' => $allUkuran
		];
		$this->load->view('template/header',$data);
		$this->load->view('/permintaan/siswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_restok');
	}

	public function add_restok_siswa()
	{
		$fk_typestok = htmlspecialchars($this->input->post('fk_typestok'));	
		$fk_unit = htmlspecialchars($this->input->post('fk_unit'));	
		$fk_ukuran = htmlspecialchars($this->input->post('fk_ukuran'));	
		$jumlah_stok = htmlspecialchars($this->input->post('jumlah_stok'));	
		$timestamp = date("Y-m-d H:i:s");

		$existing_restok = $this->PermintaanModel->cekRestokSiswa($fk_typestok, $fk_unit, $fk_ukuran);

		if ($existing_restok) {
			$msg = "Permintaan " . $existing_restok->nama_typestok . " dengan ukuran " . $existing_restok->nama_ukuran . " untuk prodi " . $existing_restok->nama_prodi . " sudah ada " . ($existing_restok->status == 'PER0' ? 'namun belum diajukan!' : 'dan sementara diajukan!');
			$this->session->set_flashdata('error', $msg);
		} else {
			$data_insert = [
				'tanggal' => $timestamp,
				'status' => 'PER0',
				'fk_typestok' => $fk_typestok,
				'fk_unit' => $fk_unit,
				'fk_ukuran' => $fk_ukuran,
				'jumlah_stok' => $jumlah_stok
			];

			$insert = $this->PermintaanModel->add_siswa($data_insert);

			if ($insert) {
				$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error', 'Data gagal disimpan.');
			}
		}
	
		redirect(base_url('permintaan/siswa'));
	}

	public function update_restok_siswa()
	{
		$id_restok = htmlspecialchars($this->input->post('id_restok'));	
		$jumlah_stok = $this->input->post('jumlah_stok');

		if($jumlah_stok != null || $jumlah_stok != ''){
			$data_update = [
				'jumlah_stok' => $jumlah_stok
			];
		}elseif($jumlah_stok == null || $jumlah_stok == ''){
			$data_update = [
				'status' => 'PEM0'
			];
		}
		
		$updated = $this->PermintaanModel->update_siswa($id_restok, $data_update);

		if ($updated) {
			$this->session->set_flashdata('success', 'Data berhasil diupdate.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal diupdate.');
		}

		redirect(base_url('permintaan/siswa'));
	}

	public function update_statusrestok_siswa() {
		$restokIds = $this->input->post('id_restok');
		$status = $this->input->post('status');
		
		if (empty($restokIds)) {
			echo json_encode(['status' => 'error', 'message' => 'Tidak ada permintaan yang dipilih!']);
			return;
		}
	
		$errors = []; // To collect errors for each transaction
	
		foreach ($restokIds as $restokId) {
			$getRestok = $this->PermintaanModel->getByIdSiswa($restokId);
			
			if (!$getRestok) {
				$errors[] = "Tidak ada permintaan yang cocok dengan ID yang anda kirim!";
				continue; // Skip to the next transaction
			}

			$data_update = [
				'status' => $status
			];
	
			$updateRestok = $this->PermintaanModel->update_siswa($restokId, $data_update);
			if (!$updateRestok) {
				$errors[] = "Pengajuan gagal!";
				continue; // Skip to the next transaction
			}
		}
	
		if (empty($errors)) {
			echo json_encode(['status' => 'success', 'message' => 'Pengajuan berhasil!']);
		} else {
			echo json_encode(['status' => 'error', 'message' => implode(', ', $errors)]);
		}
		redirect('permintaan/siswa');
	}

	public function delete_restok_siswa()
	{
		$id_restok = htmlspecialchars($this->input->post('id_restok'));	
		
		$cekRestokById = $this->PermintaanModel->getByIdSiswa($id_restok);

		if($cekRestokById)
		{
			$deleted = $this->PermintaanModel->delete_siswa($id_restok);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data ukuran tidak ditemukan.');
		}

		redirect(base_url('permintaan/siswa'));
	}
}