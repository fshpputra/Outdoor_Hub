<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthUser extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Opensslencryptdecrypt');
        $this->load->model('Auth_model');
    }

    private function _sessionUsr()
    {
        return $this->Auth_model->current_user();
    }

    public function index()
    {
        if ($this->Auth_model->current_user()) {
            redirect('Home');
        }
        $rules = $this->Auth_model->rules();
		$this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $data['title']  = 'login page';
            $data['users']  = $this->_sessionUsr();
            $this->load->view('User/login/login', $data);
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

        $validasi = $this->Auth_model->loginUser($email, $result);
        if ($validasi == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('AuthUser');
        } elseif ($validasi == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Incorect!</div>');
            redirect('AuthUser');
        } elseif ($validasi == 3) {
            redirect('Home');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Something wrong, try again!</div>');
            redirect('AuthUser');
        }
    }

    public function logout()
    {
        $logout = $this->Auth_model->logoutUser();
        if ($logout) {
            redirect('Home');
        } else {
            $this->session->set_flashdata('flash-error', 'try again');
        }
    }
}
?>
