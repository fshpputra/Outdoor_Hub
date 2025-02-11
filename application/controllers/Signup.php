<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Opensslencryptdecrypt');
        $this->load->model('M_signup');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email_user]', [
            'is_unique' => 'Email already used!',
            'valid_email' => 'invalid format!'
        ]);
        $this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'No HandPhone', 'trim|required|min_length[9]|max_length[15]', [
            'min_length' => 'Min 9',
            'max_length' => 'Max 15'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[12]|alpha_numeric');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Signup';
            $this->load->view('User/signup/index', $data);
        } else {
            // validasinya success
			$insert = $this->M_signup->register();
			if ($insert) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success created account, please login! </div>');
				redirect('AuthUser');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">There was an error during registration, please try again!</div>');
				redirect('Signup');
			}
        }
    }
}
