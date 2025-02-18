<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {


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
            $data['title']          = 'Pesanan';
            $data['users']          = $user;
            $data['pesanan']        = $this->M_root->pesanan_get();
            $data['view_name']      = 'Root/pesanan/index';
            $this->load->view('Root/templates/index', $data);
        }
    }

    public function detail_pesanan()
    {
        $user = $this->_sessionUsr();
        if ($this->_access([1])) {
            $data['title']          = 'Detail Pesanan';
            $data['users']          = $user;
            $data['pesanan']        = $this->M_root->pesananDetail_get();
            $data['view_name']      = 'Root/pesanan/detail';
            $this->load->view('Root/templates/index', $data);
        }
    }



}

