<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Controller {

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
		
		if($this->AuthModel->cek_default_admin() == false){
			$this->AuthModel->add_default_admin();
		}
		if(!$this->session->userdata('role')) {
			redirect(base_url('auth'));
		}

	}
	
	public function tahun_ajaran()
	{

		$allTahunAjar = $this->TahunAjarModel->getAll();
		
		$data = [
			'menu' => 'tahun_ajar',
			'allTahunAjar' => $allTahunAjar
		];
		
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/tahun_ajar');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}

	public function add_ta()
	{
		$kode_ta = htmlspecialchars($this->input->post('kode_ta'));
		$nama_ta = htmlspecialchars($this->input->post('nama_ta'));
		$deskripsi = htmlspecialchars($this->input->post('deskripsi'));
		
		$cekTahunAjarByKode = $this->TahunAjarModel->getByKode($kode_ta);

		if($cekTahunAjarByKode)
		{
			$this->session->set_flashdata('error', 'Kode tahun ajar sudah ada.');
			redirect(base_url('masterdata/tahun_ajaran'));
		}

		$data_insert = [
			'kode_ta' => $kode_ta,
			'nama_ta' => $nama_ta,
			'deskripsi' => $deskripsi
		];

		$insert = $this->TahunAjarModel->add($data_insert);

		if($insert){
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal disimpan.');
		}

		redirect(base_url('masterdata/tahun_ajaran'));
	}

	public function update_ta()
	{
		$id_ta = htmlspecialchars($this->input->post('id_ta'));
		$kode_ta = htmlspecialchars($this->input->post('kode_ta'));
		$nama_ta = htmlspecialchars($this->input->post('nama_ta'));
		$deskripsi = htmlspecialchars($this->input->post('deskripsi'));
		
		$cekTahunAjarByIdKode = $this->TahunAjarModel->getByIdKode($id_ta, $kode_ta);

		if($cekTahunAjarByIdKode)
		{
			$this->session->set_flashdata('error', 'Kode tahun ajar sudah ada.');
			redirect(base_url('masterdata/tahun_ajaran'));
		}

		$data_update = [
			'kode_ta' => $kode_ta,
			'nama_ta' => $nama_ta,
			'deskripsi' => $deskripsi
		];

		$updated = $this->TahunAjarModel->update($id_ta, $data_update);

		if($updated){
			$this->session->set_flashdata('success', 'Data berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diupdate.');
		}

		redirect(base_url('masterdata/tahun_ajaran'));
	}
	
	public function delete_ta()
	{
		$id_ta = htmlspecialchars($this->input->post('id_ta'));
		
		$cekTahunAjarById = $this->TahunAjarModel->getById($id_ta);

		if($cekTahunAjarById)
		{
			$deleted = $this->TahunAjarModel->delete($id_ta);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			
			$this->session->set_flashdata('error', 'Data tahun ajar tidak ditemukan.');
		}

		redirect(base_url('masterdata/tahun_ajaran'));
	}
	
	public function unit()
	{
		$allUnit = $this->UnitModel->getAll();
		$data = [
			'menu' => 'unit',
			'all_unit' => $allUnit
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/unit');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}

	public function add_unit()
	{
		$kode_unit = htmlspecialchars($this->input->post('kode_unit'));
		$nama_unit = htmlspecialchars($this->input->post('nama_unit'));
				
		$cekUnitByKode = $this->UnitModel->getByKode($kode_unit);

		if($cekUnitByKode)
		{
			$this->session->set_flashdata('error', 'Kode unit sudah ada.');
			redirect(base_url('masterdata/unit'));
		}

		$data_insert = [
			'kode_unit' => $kode_unit,
			'nama_unit' => $nama_unit
		];

		$insert = $this->UnitModel->add($data_insert);

		if($insert){
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal disimpan.');
		}

		redirect(base_url('masterdata/unit'));
	}

	public function update_unit()
	{
		$id_unit = htmlspecialchars($this->input->post('id_unit'));
		$kode_unit = htmlspecialchars($this->input->post('kode_unit'));
		$nama_unit = htmlspecialchars($this->input->post('nama_unit'));
				
		$cekUnitByIdKode = $this->UnitModel->getByIdKode($id_unit, $kode_unit);

		if($cekUnitByIdKode)
		{
			$this->session->set_flashdata('error', 'Kode unit sudah ada.');
			redirect(base_url('masterdata/unit'));
		}

		$data_update = [
			'kode_unit' => $kode_unit,
			'nama_unit' => $nama_unit
		];

		$updated = $this->UnitModel->update($id_unit, $data_update);

		if($updated){
			$this->session->set_flashdata('success', 'Data berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diupdate.');
		}

		redirect(base_url('masterdata/unit'));
	}
	
	public function delete_unit()
	{
		$id_unit = htmlspecialchars($this->input->post('id_unit'));
		
		$cekUnitById = $this->UnitModel->getById($id_unit);

		if($cekUnitById)
		{
			$deleted = $this->UnitModel->delete($id_unit);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data unit tidak ditemukan.');
		}

		redirect(base_url('masterdata/unit'));
	}
	
	public function prodi()
	{
		$allFakultas = $this->FakultasModel->getAll();
		$allProdi = $this->ProdiModel->getAll();
		$data = [
			'menu' => 'prodi',
			'all_fakultas' => $allFakultas,
			'all_prodi' => $allProdi,
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/prodi');
		$this->load->view('template/footer');
		$this->load->view('template/js_prodi');
	}

	public function add_fakultas()
	{
		$kode_fakultas = htmlspecialchars($this->input->post('kode_fakultas'));
		$nama_fakultas = htmlspecialchars($this->input->post('nama_fakultas'));
				
		$cekFakultasByKode = $this->FakultasModel->getByKode($kode_fakultas);

		if($cekFakultasByKode)
		{
			$this->session->set_flashdata('error', 'Kode fakultas sudah ada.');
			redirect(base_url('masterdata/prodi'));
		}

		$data_insert = [
			'kode_fakultas' => $kode_fakultas,
			'nama_fakultas' => $nama_fakultas
		];

		$insert = $this->FakultasModel->add($data_insert);

		if($insert){
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal disimpan.');
		}

		redirect(base_url('masterdata/prodi'));
	}

	public function update_fakultas()
	{
		$id_fakultas = htmlspecialchars($this->input->post('id_fakultas'));
		$kode_fakultas = htmlspecialchars($this->input->post('kode_fakultas'));
		$nama_fakultas = htmlspecialchars($this->input->post('nama_fakultas'));
				
		$cekFakultasByIdKode = $this->FakultasModel->getByIdKode($id_fakultas, $kode_fakultas);

		if($cekFakultasByIdKode)
		{
			$this->session->set_flashdata('error', 'Kode fakultas sudah ada.');
			redirect(base_url('masterdata/prodi'));
		}

		$data_update = [
			'kode_fakultas' => $kode_fakultas,
			'nama_fakultas' => $nama_fakultas
		];

		$updated = $this->FakultasModel->update($id_fakultas, $data_update);

		if($updated){
			$this->session->set_flashdata('success', 'Data berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diupdate.');
		}

		redirect(base_url('masterdata/prodi'));
	}
	
	public function delete_fakultas()
	{
		$id_fakultas = htmlspecialchars($this->input->post('id_fakultas'));
		
		$cekFakultasById = $this->FakultasModel->getById($id_fakultas);

		if($cekFakultasById)
		{
			$deleted = $this->FakultasModel->delete($id_fakultas);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data fakultas tidak ditemukan.');
		}

		redirect(base_url('masterdata/prodi'));
	}

	public function add_prodi()
	{
		$kode_prodi = htmlspecialchars($this->input->post('kode_prodi'));
		$nama_prodi = htmlspecialchars($this->input->post('nama_prodi'));
		$fk_fakultas = htmlspecialchars($this->input->post('fk_fakultas'));
				
		$cekProdiByKode = $this->ProdiModel->getByKode($kode_prodi);

		if($cekProdiByKode)
		{
			$this->session->set_flashdata('error', 'Kode prodi sudah ada.');
			redirect(base_url('masterdata/prodi'));
		}

		$data_insert = [
			'kode_prodi' => $kode_prodi,
			'nama_prodi' => $nama_prodi,
			'fk_fakultas' => $fk_fakultas
		];

		$insert = $this->ProdiModel->add($data_insert);

		if($insert){
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal disimpan.');
		}

		redirect(base_url('masterdata/prodi'));
	}

	public function update_prodi()
	{
		$id_prodi = htmlspecialchars($this->input->post('id_prodi'));
		$kode_prodi = htmlspecialchars($this->input->post('kode_prodi'));
		$nama_prodi = htmlspecialchars($this->input->post('nama_prodi'));
		$fk_fakultas = htmlspecialchars($this->input->post('fk_fakultas'));
				
		$cekProdiByIdKode = $this->ProdiModel->getByIdKode($id_prodi, $kode_prodi);

		if($cekProdiByIdKode)
		{
			$this->session->set_flashdata('error', 'Kode prodi sudah ada.');
			redirect(base_url('masterdata/prodi'));
		}

		$data_update = [
			'kode_prodi' => $kode_prodi,
			'nama_prodi' => $nama_prodi,
			'fk_fakultas' => $fk_fakultas
		];

		$updated = $this->ProdiModel->update($id_prodi, $data_update);

		if($updated){
			$this->session->set_flashdata('success', 'Data berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diupdate.');
		}

		redirect(base_url('masterdata/prodi'));
	}
	
	public function delete_prodi()
	{
		$id_prodi = htmlspecialchars($this->input->post('id_prodi'));
		
		$cekProdiById = $this->ProdiModel->getById($id_prodi);

		if($cekProdiById)
		{
			$deleted = $this->ProdiModel->delete($id_prodi);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data prodi tidak ditemukan.');
		}

		redirect(base_url('masterdata/prodi'));
	}

	public function mahasiswa()
	{
		$allProdi = $this->ProdiModel->getAll();
		$allMahasiswa = $this->MahasiswaModel->getAll();
		
		$data = [
			'menu' => 'mahasiswa',
			'all_prodi' => $allProdi,
			'all_mahasiswa' => $allMahasiswa
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/mahasiswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}

	public function add_mahasiswa()
	{
		$nim = htmlspecialchars($this->input->post('nim'));
		$nama_mahasiswa = htmlspecialchars($this->input->post('nama_mahasiswa'));
		$jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
		$fk_prodi = htmlspecialchars($this->input->post('fk_prodi'));
				
		$cekMahasiswaByNim = $this->MahasiswaModel->getByNim($nim);

		if($cekMahasiswaByNim)
		{
			$this->session->set_flashdata('error', 'NIM sudah ada.');
			redirect(base_url('masterdata/mahasiswa'));
		}

		$data_insert = [
			'nim' => $nim,
			'nama_mahasiswa' => $nama_mahasiswa,
			'jenis_kelamin' => $jenis_kelamin,
			'fk_prodi' => $fk_prodi
		];

		$insert = $this->MahasiswaModel->add($data_insert);

		if($insert){
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal disimpan.');
		}

		redirect(base_url('masterdata/mahasiswa'));
	}

	public function update_mahasiswa()
	{
		$id_mahasiswa = htmlspecialchars($this->input->post('id_mahasiswa'));
		$nim = htmlspecialchars($this->input->post('nim'));
		$nama_mahasiswa = htmlspecialchars($this->input->post('nama_mahasiswa'));
		$jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
		$fk_prodi = htmlspecialchars($this->input->post('fk_prodi'));
				
		$cekMahasiswaByIdNim = $this->MahasiswaModel->getByIdNim($id_mahasiswa, $nim);

		if($cekMahasiswaByIdNim)
		{
			$this->session->set_flashdata('error', 'NIM sudah ada.');
			redirect(base_url('masterdata/mahasiswa'));
		}

		$data_update = [
			'nim' => $nim,
			'nama_mahasiswa' => $nama_mahasiswa,
			'jenis_kelamin' => $jenis_kelamin,
			'fk_prodi' => $fk_prodi
		];

		$updated = $this->MahasiswaModel->update($id_mahasiswa, $data_update);

		if($updated){
			$this->session->set_flashdata('success', 'Data berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diupdate.');
		}

		redirect(base_url('masterdata/mahasiswa'));
	}
	
	public function delete_mahasiswa()
	{
		$id_mahasiswa = htmlspecialchars($this->input->post('id_mahasiswa'));
		
		$cekMahasiswaByIdNim = $this->MahasiswaModel->getById($id_mahasiswa);

		if($cekMahasiswaByIdNim)
		{
			$deleted = $this->MahasiswaModel->delete($id_mahasiswa);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data mahasiswa tidak ditemukan.');
		}

		redirect(base_url('masterdata/mahasiswa'));
	}

	public function siswa()
	{
		$allUnit = $this->UnitModel->getAll();
		$allSiswa = $this->SiswaModel->getAll();
		$data = [
			'menu' => 'siswa',
			'all_siswa' => $allSiswa,
			'all_unit' => $allUnit
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/siswa');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}

	public function add_siswa()
	{
		$id_siswa = htmlspecialchars($this->input->post('id_siswa'));
		$nis = htmlspecialchars($this->input->post('nis'));
		$nama_siswa = htmlspecialchars($this->input->post('nama_siswa'));
		$jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
		$fk_unit = htmlspecialchars($this->input->post('fk_unit'));
				
		$cekSiswaByNis = $this->SiswaModel->getByNis($nis);

		if($cekSiswaByNis)
		{
			$this->session->set_flashdata('error', 'NIS sudah ada.');
			redirect(base_url('masterdata/siswa'));
		}

		$data_insert = [
			'id_siswa' => $id_siswa,
			'nis' => $nis,
			'nama_siswa' => $nama_siswa,
			'jenis_kelamin' => $jenis_kelamin
		];
		
		$insert = $this->SiswaModel->add($data_insert, 'siswa');

		if($insert){
			$data_map = [
				'fk_siswa' => $id_siswa,
				'fk_unit' => $fk_unit	
			];
	
			$insert_map_unit = $this->SiswaModel->add($data_map, 'map_unit');
	
			if($insert_map_unit){
				$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal disimpan.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data siswa gagal disimpan.');
		}
		
		redirect(base_url('masterdata/siswa'));
	}

	public function update_siswa()
	{
		$id_siswa = htmlspecialchars($this->input->post('id_siswa'));
		$id_map_unit = htmlspecialchars($this->input->post('id_map_unit'));
		$nis = htmlspecialchars($this->input->post('nis'));
		$nama_siswa = htmlspecialchars($this->input->post('nama_siswa'));
		$jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
		$fk_unit = htmlspecialchars($this->input->post('fk_unit'));
				
		$cekSiswaByIdNis = $this->SiswaModel->getByIdNis($id_siswa, $nis);

		if($cekSiswaByIdNis)
		{
			$this->session->set_flashdata('error', 'NIS sudah ada.');
			redirect(base_url('masterdata/siswa'));
		}

		$data_update = [
			'nis' => $nis,
			'nama_siswa' => $nama_siswa,
			'jenis_kelamin' => $jenis_kelamin
		];

		$updated = $this->SiswaModel->update($id_siswa, $data_update);

		if($updated){
			// $this->session->set_flashdata('success', 'Data berhasil diupdate.');
			$data_map = [
				'fk_siswa' => $id_siswa,
				'fk_unit' => $fk_unit	
			];
	
			$insert_map_unit = $this->SiswaModel->update_map_unit($id_map_unit, $data_map);
	
			if($insert_map_unit){
				$this->session->set_flashdata('success', 'Data berhasil diupdate.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diupdate.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data gagal diupdate.');
		}

		redirect(base_url('masterdata/siswa'));
	}
	
	public function delete_siswa()
	{
		$id_siswa = htmlspecialchars($this->input->post('id_siswa'));
		
		$cekSiswaByIdNis = $this->SiswaModel->getById($id_siswa);

		if($cekSiswaByIdNis)
		{
			$deleted = $this->SiswaModel->delete($id_siswa);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data mahasiswa tidak ditemukan.');
		}

		redirect(base_url('masterdata/siswa'));
	}

	public function type_stok()
	{
		$allTypestok = $this->TypestokModel->getAll();
		$data = [
			'menu' => 'type_stok',
			'all_typestok' => $allTypestok,
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/type_stok');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}

	public function add_typestok()
	{
		$nama_typestok = htmlspecialchars($this->input->post('nama_typestok'));	
		$data_insert = [
			'nama_typestok' => $nama_typestok
		];
		$insert = $this->TypestokModel->add($data_insert);

		if($insert){
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal disimpan.');
		}

		redirect(base_url('masterdata/type_stok'));
	}

	public function update_typestok()
	{
		$id_typestok = htmlspecialchars($this->input->post('id_typestok'));	
		$nama_typestok = htmlspecialchars($this->input->post('nama_typestok'));	

		$data_update = [
			'nama_typestok' => $nama_typestok
		];

		$updated = $this->TypestokModel->update($id_typestok, $data_update);

		if($updated){
			$this->session->set_flashdata('success', 'Data berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diupdate.');
		}

		redirect(base_url('masterdata/type_stok'));
	}
	
	public function delete_typestok()
	{
		$id_typestok = htmlspecialchars($this->input->post('id_typestok'));	
		
		$cekTypestokById = $this->TypestokModel->getById($id_typestok);

		if($cekTypestokById)
		{
			$deleted = $this->TypestokModel->delete($id_typestok);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data typestok tidak ditemukan.');
		}

		redirect(base_url('masterdata/type_stok'));
	}

	public function ukuran()
	{
		$allUkuran = $this->UkuranModel->getAll();
		$data = [
			'menu' => 'ukuran',
			'all_ukuran' => $allUkuran,
		];
		$this->load->view('template/header',$data);
		$this->load->view('/master_data/ukuran');
		$this->load->view('template/footer');
		$this->load->view('template/js_global');
	}

	public function add_ukuran()
	{
		$nama_ukuran = htmlspecialchars($this->input->post('nama_ukuran'));	

		$existing_ukuran = $this->UkuranModel->getByName($nama_ukuran);
		if ($existing_ukuran) {
			$this->session->set_flashdata('error', 'Nama ukuran sudah ada. Silakan gunakan nama lain.');
		} else {
			$data_insert = [
				'nama_ukuran' => $nama_ukuran
			];
			$insert = $this->UkuranModel->add($data_insert);

			if ($insert) {
				$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error', 'Data gagal disimpan.');
			}
		}

		redirect(base_url('masterdata/ukuran'));
	}

	public function update_ukuran()
	{
		$id_ukuran = htmlspecialchars($this->input->post('id_ukuran'));	
		$nama_ukuran = htmlspecialchars($this->input->post('nama_ukuran'));	

		$existing_ukuran = $this->UkuranModel->getByName($nama_ukuran);

		if ($existing_ukuran && $existing_ukuran->id_ukuran != $id_ukuran) {
			$this->session->set_flashdata('error', 'Nama ukuran sudah ada. Silakan gunakan nama lain.');
		} else {
			$data_update = [
				'nama_ukuran' => $nama_ukuran
			];

			$updated = $this->UkuranModel->update($id_ukuran, $data_update);

			if ($updated) {
				$this->session->set_flashdata('success', 'Data berhasil diupdate.');
			} else {
				$this->session->set_flashdata('error', 'Data gagal diupdate.');
			}
		}

		redirect(base_url('masterdata/ukuran'));
	}

	public function delete_ukuran()
	{
		$id_ukuran = htmlspecialchars($this->input->post('id_ukuran'));	
		
		$cekUkuranById = $this->UkuranModel->getById($id_ukuran);

		if($cekUkuranById)
		{
			$deleted = $this->UkuranModel->delete($id_ukuran);
	
			if($deleted){
				$this->session->set_flashdata('success', 'Data berhasil dihapus.');
			}else{
				$this->session->set_flashdata('error', 'Data gagal dihapus.');
			}
		}else{
			$this->session->set_flashdata('error', 'Data ukuran tidak ditemukan.');
		}

		redirect(base_url('masterdata/ukuran'));
	}
}