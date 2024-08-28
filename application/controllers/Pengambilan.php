<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengambilan extends CI_Controller {

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
		$data = [
			'menu' => 'pengambilan_ucb'
		];
		$this->load->view('template/header',$data);
		$this->load->view('/pengambilan/ucb');
		$this->load->view('template/footer');
	}
}