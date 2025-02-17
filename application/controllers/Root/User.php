<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Opensslencryptdecrypt');
        $this->load->model('Auth_model');
        $this->load->model('M_root');

        if (!$this->Auth_model->current_root()) {
            redirect('AuthRoot');
        }
    }

    private function _sessionUsr()
    {
        return $this->Auth_model->current_root();
    }

    private function _access($arr)
    {
        $access = $this->_sessionUsr();
        if (in_array($access->role, $arr)) {
            return true;
        } else {
            $this->_redirect(null, $this->$uri_Dashboard);
        }

    }

    public function index()
    {
        $user = $this->_sessionUsr();
        if ($this->_access([1])) {
            $data['title']          = 'User';
            $data['users']          = $user;
            $data['list']           = $this->M_root->user_get();
            $data['view_name']      = 'Root/user/index';
            $this->load->view('Root/templates/index', $data);
        }
    }
}
