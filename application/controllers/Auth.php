<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct()
	{
        parent::__construct();
        $this->load->model('AuthModel');
		
		if($this->AuthModel->cek_default_admin() == false){
			$this->AuthModel->add_default_admin();
		}
		if($this->session->userdata('role')) {
			redirect(base_url('home'));
		}

	}
    
	public function index()
	{
		$this->load->view('auth/login');
	}

	public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<h5 class="text-danger">Login gagal!</h5>');
            redirect(base_url('auth'));
        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $password = htmlspecialchars($this->input->post('password'));

            $user = $this->AuthModel->get_user_by_username($username);

            if (!empty($user) && password_verify($password, $user['password'])) {
                $this->set_user_session($user);
                redirect(base_url('home'));
            } else {
                $this->session->set_flashdata('message', '<h5 class="text-danger">Login gagal!</h5>');
                redirect(base_url('auth'));
            }
        }
    }

    private function set_user_session($user) {
        $data_session = array(
            'id_auth' => $user['id_user'],
            'name' => $user['name'],
            'username' => $user['username'],
            'role' => $user['role']
        );
        $this->session->set_userdata($data_session);
    }
	
}