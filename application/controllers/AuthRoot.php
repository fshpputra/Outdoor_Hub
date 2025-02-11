<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthRoot extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Opensslencryptdecrypt');
        $this->load->model('Auth_model');
    }
    
	public function index()
    {
        $rules = $this->Auth_model->rules();
		$this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'login page';
            $this->load->view('Root/login/index', $data);
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $encrptopenssl =  new Opensslencryptdecrypt();
        $result  = $encrptopenssl->encrypt($password);

        $validasi = $this->Auth_model->loginRoot($email, $result);
		if ($validasi == 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('AuthRoot');
		} elseif ($validasi == 1) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Incorect!</div>');
			redirect('AuthRoot');
		} elseif ($validasi == 3) {
			redirect('Root/Dashboard');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Something wrong, try again!</div>');
			redirect('AuthRoot');
		}
    }

    public function logout()
	{
		$logout = $this->Auth_model->logoutRoot();
		if ($logout) {
			redirect('AuthRoot');
		} else {
			$this->session->set_flashdata('flash-error', 'try again');
		}
	}

    public function fiqritest()
	{
		$password = "123456";
		$encryptor = new Opensslencryptdecrypt();
		$encrypted_password = $encryptor->encrypt($password);
		echo "Password yang dienkripsi: " . $encrypted_password;
	}
}