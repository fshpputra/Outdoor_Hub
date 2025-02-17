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
            $data['title']          = 'Kategori Produk';
            $data['users']          = $user;
            $data['category']       = $this->M_root->kategori_get();
            $data['view_name']      = 'Root/produk/kategori/index';
            $this->load->view('Root/templates/index', $data);
        }
    }

    public function kategori_add()
    {
        if ($this->_access([1])) {
            $this->form_validation->set_rules('nama', 'Nama Kategori', 'trim|required|max_length[50]|is_unique[kategori.nama_kategori]');

            $validateImage  = true;
            if(!empty($this->input->post('image',true))){
                $imageValids   = max_file_size();
                $imageValids2   = onlyImage();
                if($imageValids == false or $imageValids2 == false){
                    $validateImage = false;
                }
            }

            if($this->form_validation->run() == false or $validateImage == false){
                $data['title']          = 'Kategori Add';
                $data['users']          = $this->_sessionUsr();
                $data['view_name']      = 'root/produk/kategori/add';

                $this->load->view('root/templates/index', $data);
            }else{
                $save = $this->M_root->kategori_post();
                if($save)
                {
                    $this->session->set_flashdata('flash-success', 'Saved ');
                }else{
                    $this->session->set_flashdata('flash-error', 'Error ');
                }
                redirect('Root/Produk/kategori');
            }
        }
    }

    public function kategori_edit($id)
    {
        if ($this->_access([1])) {
            $id = decrypt_url($id);
            $check = $this->M_root->kategori_get($id, true);
            if($check)
            {
                $nama = $this->input->post('nama', true);
                if($nama != $check->nama_kategori){
                    $this->form_validation->set_rules('nama', 'Nama Kategori', 'trim|required|max_length[50]|is_unique[kategori.nama_kategori]');
                }else{
                    $this->form_validation->set_rules('nama', 'Nama Kategori', 'trim|required|max_length[50]');
                }

                $validateImage  = true;
                if(!empty($this->input->post('image',true))){
                    $imageValids   = max_file_size();
                    $imageValids2   = onlyImage();
                    if($imageValids == false or $imageValids2 == false){
                        $validateImage = false;
                    }
                }

                if($this->form_validation->run() == false or $validateImage == false){
                    $data['title']          = 'Kategori Edit';
                    $data['users']          = $this->_sessionUsr();
                    $data['kategori']       = $check;
                    $data['view_name']      = 'root/produk/kategori/edit';

                    $this->load->view('root/templates/index', $data);
                }else{
                    $update = $this->M_root->kategori_put($check->idKategori);
                    if($update)
                    {
                        $this->session->set_flashdata('flash-success', 'Updated ');
                    }else{
                        $this->session->set_flashdata('flash-error', 'Error ');
                    }
                    redirect('Root/Produk/kategori');
                }
            }else{
                redirect('Root/Dashboard');
            }
        }
    }

    public function kategori_delete($id)
    {
        if ($this->_access([1])) {
            $id = decrypt_url($id);
            $check = $this->M_root->kategori_get($id);
            if($check)
            {
                $delete = $this->M_root->kategori_delete($id);
                if($delete)
                {
                    $this->session->set_flashdata('flash-success', 'Delete');
                }else{
                    $this->session->set_flashdata('flash-error', 'Error, already linked to product');
                }
                redirect('Root/Produk/kategori');
            }else{
                redirect('Root/Dashboard');
            }
        }
    }

    public function list()
    {
        $user = $this->_sessionUsr();
        if ($this->_access([1])) {
            $data['title']          = 'List Produk';
            $data['users']          = $user;
            $data['list']           = $this->M_root->produk_get();
            $data['view_name']      = 'Root/produk/list/index';
            $this->load->view('Root/templates/index', $data);
        }
    }

    public function list_add()
    {
        if ($this->_access([1])) {
            $this->form_validation->set_rules('nama', 'Nama Produk', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('code', 'Code Produk', 'trim|required|max_length[20]');
            $this->form_validation->set_rules('brand', 'Brand', 'trim|required|max_length[30]');
            $this->form_validation->set_rules('grade', 'Kondisi', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('stok', 'Stok', 'trim|required|max_length[50]|integer');
            $this->form_validation->set_rules('harga', 'Harga Sewa', 'trim|required|max_length[20]');
            $this->form_validation->set_rules('warna', 'Warna', 'trim|required|max_length[20]');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|max_length[30]');
            $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Kategori', 'trim|required');

            $validateImage  = true;
            if(!empty($this->input->post('image',true))){
                $imageValids   = max_file_size();
                $imageValids2   = onlyImage();
                if($imageValids == false or $imageValids2 == false){
                    $validateImage = false;
                }
            }

            if($this->form_validation->run() == false or $validateImage == false){
                $data['title']          = 'List Add';
                $data['users']          = $this->_sessionUsr();
                $data['category']       = $this->M_root->kategori_get();
                $data['view_name']      = 'root/produk/list/add';

                $this->load->view('root/templates/index', $data);
            }else{
                $save = $this->M_root->list_post();
                if($save)
                {
                    $this->session->set_flashdata('flash-success', 'Saved ');
                }else{
                    $this->session->set_flashdata('flash-error', 'Error ');
                }
                redirect('Root/Produk/list');
            }
        }
    }

    public function list_edit($id)
    {
        if ($this->_access([1])) {
            $id = decrypt_url($id);
            $check = $this->M_root->produk_get($id);
            if($check)
            {
                $this->form_validation->set_rules('nama', 'Nama Produk', 'trim|required|max_length[50]');
                $this->form_validation->set_rules('code', 'Code Produk', 'trim|required|max_length[20]');
                $this->form_validation->set_rules('brand', 'Brand', 'trim|required|max_length[30]');
                $this->form_validation->set_rules('grade', 'Kondisi', 'trim|required|max_length[50]');
                $this->form_validation->set_rules('stok', 'Stok', 'trim|required|max_length[50]|integer');
                $this->form_validation->set_rules('harga', 'Harga Sewa', 'trim|required|max_length[20]');
                $this->form_validation->set_rules('warna', 'Warna', 'trim|required|max_length[20]');
                $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|max_length[30]');
                $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
                $this->form_validation->set_rules('deskripsi', 'Kategori', 'trim|required');

                $validateImage  = true;
                if(!empty($this->input->post('image',true))){
                    $imagePrimary   = validationImageMulty('image');
                    if($imagePrimary == false){
                        $validateImage = false;
                    }
                }

                if($this->form_validation->run() == false or $validateImage == false){
                    $data['title']          = 'Produk Edit';
                    $data['users']          = $this->_sessionUsr();
                    $data['list']           = $check;
                    $data['category']       = $this->M_root->kategori_get();
                    $data['view_name']      = 'root/produk/list/edit';

                    $this->load->view('root/templates/index', $data);
                }else{
                    $update = $this->M_root->list_put($check->idProduk);
                    if($update)
                    {
                        $this->session->set_flashdata('flash-success', 'Updated ');
                    }else{
                        $this->session->set_flashdata('flash-error', 'Error ');
                    }
                    redirect('Root/Produk/list');
                }
            }else{
                redirect('Root/Dashboard');
            }
        }
    }

    public function produk_delete($id)
    {
        if ($this->_access([1])) {
            $id = decrypt_url($id);
            $check = $this->M_root->produk_get($id);
            if($check)
            {
                $delete = $this->M_root->kategori_delete($id);
                if($delete)
                {
                    $this->session->set_flashdata('flash-success', 'Delete');
                }else{
                    $this->session->set_flashdata('flash-error', 'Error, already linked to product');
                }
                redirect('Root/Produk/kategori');
            }else{
                redirect('Root/Dashboard');
            }
        }
    }
}

