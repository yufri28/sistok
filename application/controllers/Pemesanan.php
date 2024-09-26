<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

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
		
		if($this->AuthModel->cek_default_admin() == false){
			$this->AuthModel->add_default_admin();
		}
		if(!$this->session->userdata('role')) {
			redirect(base_url('auth'));
		}

	}

	public function mahasiswa()
	{
		$getAllMahasiswa = $this->PemesananModel->getAllMahasiswa();
		
		$data = [
			'menu' => 'pem-mahasiswa',
			'all_mahasiswa' => $getAllMahasiswa,
		];
		$this->load->view('template/header',$data);
		$this->load->view('/pemesanan/mahasiswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_pemesanan');
	}

	// public function masuk_gudang_mahasiswa() {
	// 	$restokIds = $this->input->post('id_restok');
	// 	$status = $this->input->post('status');
		
	// 	if (empty($restokIds)) {
	// 		echo json_encode(['status' => 'error', 'message' => 'Tidak ada permintaan yang dipilih!']);
	// 		return;
	// 	}
	
	// 	$errors = []; // To collect errors for each transaction
	
	// 	foreach ($restokIds as $restokId) {
	// 		$getRestok = $this->PemesananModel->getByIdMahasiswa($restokId);
			
	// 		if (!$getRestok) {
	// 			$errors[] = "Tidak ada barang yang cocok dengan ID yang anda kirim!";
	// 			continue; // Skip to the next transaction
	// 		}

	// 		$data_update = [
	// 			'status' => $status
	// 		];

	// 		// cek data pada tabel stok, apakah sudah ada sebelumnya atau belum.
	// 		// Jika belum maka insert. Namun jika sudah ada maka update stoknya

	// 		$cek_fk = $this->PemesananModel->cekByFk($getRestok['fk_typestok'], $getRestok['fk_prodi'], $getRestok['fk_ukuran']);

	// 		if(!$cek_fk){
	// 			$data_insert_stok = [
	// 				'fk_typestok' => $getRestok['fk_typestok'],
	// 				'fk_prodi' => $getRestok['fk_prodi'],
	// 				'fk_ukuran' => $getRestok['fk_ukuran'], 
	// 				'jumlah_stok' => $getRestok['jumlah_stok'] 
	// 			];
	// 			$this->PemesananModel->add_mahasiswa($data_insert_stok);
	// 		}else{
	// 			$data_update_stok = [
	// 				'fk_typestok' => $getRestok['fk_typestok'],
	// 				'fk_prodi' => $getRestok['fk_prodi'],
	// 				'fk_ukuran' => $getRestok['fk_ukuran'], 
	// 				'jumlah_stok' => $getRestok['jumlah_stok'] 
	// 			];

	// 			$this->PemesananModel->update_mahasiswa($getRestok['id_stok_mhs'],$data_update_stok);
	// 		}
	
	// 		$updateRestok = $this->PermintaanModel->update_mahasiswa($restokId, $data_update);
	// 		if (!$updateRestok) {
	// 			$errors[] = "Gagal memasukan barang ke gudang!";
	// 			continue; // Skip to the next transaction
	// 		}
	// 	}
	
	// 	if (empty($errors)) {
	// 		echo json_encode(['status' => 'success', 'message' => 'Berhasil memasukan barang ke gudang!']);
	// 	} else {
	// 		echo json_encode(['status' => 'error', 'message' => implode(', ', $errors)]);
	// 	}
	// 	redirect('pemesanan/mahasiswa');
	// }

	public function masuk_gudang_mahasiswa() {
		$restokIds = $this->input->post('id_restok');
		$status = $this->input->post('status');
	
		// Cek apakah ada ID restok yang dikirim
		if (empty($restokIds)) {
			echo json_encode(['status' => 'error', 'message' => 'Tidak ada permintaan yang dipilih!']);
			return;
		}
	
		$errors = []; // Mengumpulkan pesan error jika ada
	
		// Memulai transaksi untuk memastikan semua operasi berjalan baik
		$this->db->trans_start();
	
		foreach ($restokIds as $restokId) {
			// Ambil data restok berdasarkan ID
			$getRestok = $this->PemesananModel->getByIdMahasiswa($restokId);
	
			if (!$getRestok) {
				$errors[] = "Tidak ada barang yang cocok dengan ID: $restokId";
				continue; // Lanjutkan ke transaksi berikutnya
			}
	
			// Siapkan data untuk update status restok
			$data_update = [
				'status' => $status
			];
	
			// Cek apakah stok dengan kombinasi fk_typestok, fk_prodi, fk_ukuran sudah ada
			$cek_fk = $this->PemesananModel->cekByFk($getRestok['fk_typestok'], $getRestok['fk_prodi'], $getRestok['fk_ukuran']);
	
			if (!$cek_fk) {
				// Jika tidak ada, insert stok baru
				$data_insert_stok = [
					'fk_typestok' => $getRestok['fk_typestok'],
					'fk_prodi' => $getRestok['fk_prodi'],
					'fk_ukuran' => $getRestok['fk_ukuran'],
					'jumlah_stok' => $getRestok['jumlah_stok']
				];
				$insertResult = $this->PemesananModel->add_mahasiswa($data_insert_stok);
				if (!$insertResult) {
					$errors[] = "Gagal menambah stok untuk ID: $restokId";
					continue; // Lanjutkan ke transaksi berikutnya
				}
			} else {
				// Jika sudah ada, update stok yang ada dengan menambahkan jumlah_stok
				$data_update_stok = [
					'jumlah_stok' => $getRestok['jumlah_stok'] // Ini akan di-handle oleh fungsi update di model
				];
				$updateResult = $this->PemesananModel->update_mahasiswa($cek_fk['id_stok_mhs'], $data_update_stok);
				if (!$updateResult) {
					$errors[] = "Gagal mengupdate stok untuk ID: $restokId";
					continue; // Lanjutkan ke transaksi berikutnya
				}
			}
	
			// Update status permintaan
			$updateRestok = $this->PermintaanModel->update_mahasiswa($restokId, $data_update);
			if (!$updateRestok) {
				$errors[] = "Gagal mengupdate status untuk ID: $restokId";
				continue; // Lanjutkan ke transaksi berikutnya
			}
		}
	
		// Selesaikan transaksi
		$this->db->trans_complete();
	
		// Cek apakah transaksi berhasil
		if ($this->db->trans_status() === FALSE || !empty($errors)) {
			// Jika ada error atau transaksi gagal
			echo json_encode(['status' => 'error', 'message' => 'Beberapa transaksi gagal: ' . implode(', ', $errors)]);
		} else {
			// Jika semua sukses
			echo json_encode(['status' => 'success', 'message' => 'Berhasil memasukan barang ke gudang!']);
		}
	
		// Redirect ke halaman sebelumnya atau sesuai kebutuhan
		redirect('pemesanan/mahasiswa');
	}
	

	public function siswa()
	{
		$getAllSiswa = $this->PemesananModel->getAllSiswa();
		$data = [
			'menu' => 'pem-siswa',
			'all_siswa' => $getAllSiswa,
		];
		$this->load->view('template/header',$data);
		$this->load->view('/pemesanan/siswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_pemesanan');
	}

	public function masuk_gudang_siswa() {
		$restokIds = $this->input->post('id_restok');
		$status = $this->input->post('status');
	
		// Cek apakah ada ID restok yang dikirim
		if (empty($restokIds)) {
			echo json_encode(['status' => 'error', 'message' => 'Tidak ada permintaan yang dipilih!']);
			return;
		}
	
		$errors = []; // Mengumpulkan pesan error jika ada
	
		// Memulai transaksi untuk memastikan semua operasi berjalan baik
		$this->db->trans_start();
	
		foreach ($restokIds as $restokId) {
			// Ambil data restok berdasarkan ID
			$getRestok = $this->PemesananModel->getByIdSiswa($restokId);
	
			if (!$getRestok) {
				$errors[] = "Tidak ada barang yang cocok dengan ID: $restokId";
				continue; // Lanjutkan ke transaksi berikutnya
			}
	
			// Siapkan data untuk update status restok
			$data_update = [
				'status' => $status
			];
	
			// Cek apakah stok dengan kombinasi fk_typestok, fk_unit, fk_ukuran sudah ada
			$cek_fk = $this->PemesananModel->cekByFkSiswa($getRestok['fk_typestok'], $getRestok['fk_unit'], $getRestok['fk_ukuran']);
	
			if (!$cek_fk) {
				// Jika tidak ada, insert stok baru
				$data_insert_stok = [
					'fk_typestok' => $getRestok['fk_typestok'],
					'fk_unit' => $getRestok['fk_unit'],
					'fk_ukuran' => $getRestok['fk_ukuran'],
					'jumlah_stok' => $getRestok['jumlah_stok']
				];
				$insertResult = $this->PemesananModel->add_siswa($data_insert_stok);
				if (!$insertResult) {
					$errors[] = "Gagal menambah stok untuk ID: $restokId";
					continue; // Lanjutkan ke transaksi berikutnya
				}
			} else {
				// Jika sudah ada, update stok yang ada dengan menambahkan jumlah_stok
				$data_update_stok = [
					'jumlah_stok' => $getRestok['jumlah_stok'] // Ini akan di-handle oleh fungsi update di model
				];
				$updateResult = $this->PemesananModel->update_siswa($cek_fk['id_stok_siswa'], $data_update_stok);
				if (!$updateResult) {
					$errors[] = "Gagal mengupdate stok untuk ID: $restokId";
					continue; // Lanjutkan ke transaksi berikutnya
				}
			}
	
			// Update status permintaan
			$updateRestok = $this->PermintaanModel->update_siswa($restokId, $data_update);
			if (!$updateRestok) {
				$errors[] = "Gagal mengupdate status untuk ID: $restokId";
				continue; // Lanjutkan ke transaksi berikutnya
			}
		}
	
		// Selesaikan transaksi
		$this->db->trans_complete();
	
		// Cek apakah transaksi berhasil
		if ($this->db->trans_status() === FALSE || !empty($errors)) {
			// Jika ada error atau transaksi gagal
			echo json_encode(['status' => 'error', 'message' => 'Beberapa transaksi gagal: ' . implode(', ', $errors)]);
		} else {
			// Jika semua sukses
			echo json_encode(['status' => 'success', 'message' => 'Berhasil memasukan barang ke gudang!']);
		}
	
		// Redirect ke halaman sebelumnya atau sesuai kebutuhan
		redirect('pemesanan/siswa');
	}
}