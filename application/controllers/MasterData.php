<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('TahunAjarModel');
		
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
			'deskripsi' => $deskripsi ??'-'
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
			'deskripsi' => $deskripsi??'-'
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