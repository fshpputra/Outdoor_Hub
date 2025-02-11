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

    public function index()
    {
        $rules = $this->Auth_model->rules();
		$this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'login page';
            $this->load->view('User/login/login', $data);
        } else {
            // validasinya success
            $this->_login();
        }
    }
}
?>
