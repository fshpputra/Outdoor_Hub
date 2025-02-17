<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Opensslencryptdecrypt');
        $this->load->model('Auth_model');
        $this->load->model('M_user');
        $this->load->model('M_root');
    }

    private function _sessionUsr()
    {
        return $this->Auth_model->current_user();
    }

    private function _notLogin(){
        if (!$this->Auth_model->current_user()) {
            redirect('Home');
        }
    }

    public function index()
    {
        $data['title']          = 'Home ';
        $data['users']          = $this->_sessionUsr();
        $data['list']           = $this->M_user->produkLimit_get();
        $data['view_name']      = 'User/index';
        $this->load->view('User/templates/index', $data);
    }

    public function Gear()
    {
        $data['title']          = 'Gear';
        $data['users']          = $this->_sessionUsr();
        $data['list']           = $this->M_user->produk_get();
        $data['view_name']      = 'User/gear';
        $this->load->view('User/templates/index', $data);
    }

    public function About()
    {
        $data['title']          = 'About';
        $data['users']          = $this->_sessionUsr();
        $data['view_name']      = 'User/about';
        $this->load->view('User/templates/index', $data);
    }

    public function Contact()
    {
        $data['title']          = 'Contact';
        $data['users']          = $this->_sessionUsr();
        $data['view_name']      = 'User/kontak';
        $this->load->view('User/templates/index', $data);
    }

    public function Gear_detail($id){
        $this->_notLogin();
        $id = decrypt_url($id);
        $check = $this->M_user->produk_get($id);
        if(!$check){
            redirect('Home');
        }

        $data['title']          = 'Gear Detail';
        $data['users']          = $this->_sessionUsr();
        $data['list']           = $check;
        $data['view_name']      = 'User/detail_gear';
        $this->load->view('User/templates/index', $data);
    }

    public function Keranjang(){
        $this->_notLogin();
        $check = $this->M_user->produk_get();
        $idUser = $this->_sessionUsr();
        $idUser = $idUser->idPelanggan;
        if(!$check){
            redirect('Home');
        }

        $data['title']          = 'Keranjang';
        $data['users']          = $this->_sessionUsr();
        $data['keranjang']      = $this->M_user->getCartItems($idUser);
        $data['list']           = $check;
        $data['view_name']      = 'User/keranjang';
        $this->load->view('User/templates/index', $data);
    }

    public function Keranjang_add($id){
        $this->_notLogin();
        $id = decrypt_url($id);
        $idUser = $this->_sessionUsr();
        $idUser = $idUser->idPelanggan;

        $validasi = $this->M_user->CartItems_post($idUser, $id);
        if($validasi)
        {
            $this->session->set_flashdata('flash-success', 'Saved ');
        }else{
            $this->session->set_flashdata('flash-error', 'Error ');
        }
        redirect('Home/Keranjang');
    }

    public function Keranjang_delete($id) {
        $this->_notLogin();
        $id = decrypt_url($id);
        if ($this->M_user->removeCartItem($id)) {
            redirect('Home/Keranjang');
        } else {
            echo "Gagal menghapus item.";
        }
    }

    public function Proses_Transaksi()
    {
        $this->_notLogin();
        $idUser = $this->_sessionUsr();
        $idUser = $idUser->idPelanggan;
        $keranjang = $this->M_user->getCartItems($idUser);

        if (empty($keranjang)) {
            $this->session->set_flashdata('error', 'Keranjang belanja Anda kosong.');
            redirect('Home/Keranjang');
        }

        $jumlahProduk = $this->input->post('jumlah');

        $idPesanan = $this->M_user->simpanPesanan($idUser, $keranjang , $jumlahProduk);

        $this->session->set_flashdata('flash-success', 'Saved ');
        redirect('Home/Checkout/' . $idPesanan);
    }

    public function Checkout(){
        $this->_notLogin();
        $check = $this->M_user->produk_get();
        if(!$check){
            redirect('Home');
        }

        $data['title']          = 'Checkout';
        $data['users']          = $this->_sessionUsr();
        $data['pesanan']        = $this->M_user->pesanan_get();
        $data['list']           = $check;
        $data['view_name']      = 'User/chekout';
        $this->load->view('User/templates/index', $data);
    }
}
