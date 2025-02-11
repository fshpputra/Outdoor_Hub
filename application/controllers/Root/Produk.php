<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {


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

    public function kategori()
    {
        $user = $this->_sessionUsr();
        if ($this->_access([1])) {
            $data['title']          = 'Dashboard';
            $data['users']          = $user;
            $data['category']       = $this->M_root->kategori_get();
            $data['view_name']      = 'Root/produk/kategori/index';
            $this->load->view('Root/templates/index', $data);
        }
    }

    public function kategori_add()
    {
        if ($this->_access([1])) {
            $this->form_validation->set_rules('name', 'name', 'trim|required|max_length[50]|is_unique[kategori.nama_kategori]');

            $validateImage  = true;
            if(!empty($this->input->post('image',true))){
                $imageValids   = max_file_size();
                $imageValids2   = onlyImage();
                if($imageValids == false or $imageValids2 == false){
                    $validateImage = false;
                }
            }

            if($this->form_validation->run() == false or $validateImage == false){
                $data['title']          = 'Kategori';
                $data['users']          = $this->_sessionUsr();
                $data['view_name']      = 'root/produk/kategori/add';

                $this->load->view('root/templates/index', $data);
            }else{
                $save = $this->M_root->kategori_post();
                if($save)
                {
                    $this->session->set_flashdata('flash-success', 'Saved ');
                }else{
                    $this->session->set_flashdata('flash-error', 'Saved ');
                }
                redirect('Root/Produk/kategori');
            }
        }
    }
}

