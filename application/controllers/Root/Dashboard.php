<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Opensslencryptdecrypt');
        $this->load->model('Auth_model');

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
        $data['title']          = 'Dashboard';
        $data['users']          = $this->_sessionUsr();
        $data['view_name']      = 'Root/dashboard/index';
        $this->load->view('Root/templates/index', $data);
    }
}