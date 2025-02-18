<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Opensslencryptdecrypt');
        $this->load->config('midtrans');
        $this->load->model('Auth_model');
        $this->load->model('M_user');
        $this->load->model('M_root');
        \Midtrans\Config::$serverKey = $this->config->item('midtrans')['server_key'];
        \Midtrans\Config::$isProduction = $this->config->item('midtrans')['is_production'];
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    private function _sessionUsr()
    {
        return $this->Auth_model->current_user();
    }

    private function _notLogin(){
        if (!$this->Auth_model->current_user()) {
            $this->session->set_flashdata('flash-error', 'Silahkan login terlebih dahulu');
            redirect('Home');
        }
    }

    public function index()
    {
        $data['title']          = 'Home ';
        $data['users']          = $this->_sessionUsr();
        $data['list']           = $this->M_user->produkLimit_get();
        $data['counts']           = $this->M_user->get_dashboard_counts();
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
            $this->session->set_flashdata('flash-error', 'Keranjang belanja Anda kosong.');
            redirect('Home/Keranjang');
        }

        $jumlahProduk = $this->input->post('jumlah');

        $idPesanan = $this->M_user->simpanPesanan($idUser, $keranjang , $jumlahProduk);
        $id = decrypt_url($idPesanan);
        $this->session->set_flashdata('flash-success', 'Saved ');
        redirect('Home/Checkout/' . encrypt_url($id));
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
        $data['view_name']      = 'User/chekout';
        $this->load->view('User/templates/index', $data);
    }

    public function Process_payment()
    {
        $this->_notLogin();
        $id = $this->input->post('id');
        $idPesanan = $this->input->post('order_id');
        $metodePengiriman = $this->input->post('delivery_method');
        $alamatPengiriman = $this->input->post('address') ?? null;
        $totalHarga = $this->input->post('total_price');
        $tanggalMulai = $this->input->post('tanggal_mulai'); // Ambil tanggal mulai dari form input

        if ($metodePengiriman === 'delivery') {
            $dataPengiriman = [
                'idPesanan' => $id,
                'alamatPengiriman' => $alamatPengiriman,
                'status' => 'pending',
                'tanggal' => date('Y-m-d'),
                'tanggal_mulai' => $tanggalMulai, // Simpan tanggal mulai pengiriman
            ];
            $this->M_user->insertPengiriman($dataPengiriman);
        }

        // Simpan data pembayaran
        $dataPembayaran = [
            'idPesanan' => $id,
            'metodePembayaran' => 'BCA',
            'jumlah' => $totalHarga,
            'status' => 'pending',
            'tanggal' => date('Y-m-d'),
        ];
        $this->M_user->insertPembayaran($dataPembayaran);

        $idUser = $this->_sessionUsr();

        $transaction_details = [
            'order_id' => $idPesanan,
            'gross_amount' => $totalHarga
        ];

        $customer_details = [
            'first_name' => $idUser->nama,
            'email' => $idUser->email,
            'phone' => $idUser->no_hp
        ];

        $transaction = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details

        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($transaction);
            echo json_encode(['snapToken' => $snapToken]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Gagal mendapatkan token pembayaran: ' . $e->getMessage()]);
        }
    }

    public function notification()
    {
        $json_result = file_get_contents("php://input");
        $result = json_decode($json_result, true);

        if ($result) {
            $order_id = $result['order_id'];
            $transaction_status = $result['transaction_status'];

            if ($transaction_status == "settlement") {
                // Update status pembayaran menjadi "Paid"
                $this->db->where('id_pembayaran', $order_id);
                $this->db->update('pembayaran', ['status' => 'Paid']);
                $this->session->set_flashdata('flash-success', 'Saved ');
                redirect('Home/Account');
            } elseif ($transaction_status == "pending") {
                // Update status menjadi "Pending"
                $this->db->where('id_pembayaran', $order_id);
                $this->db->update('pembayaran', ['status' => 'Pending']);
                $this->session->set_flashdata('flash-error', 'Payment Pending ');
                redirect('Home/Account');
            } elseif ($transaction_status == "cancel" || $transaction_status == "deny" || $transaction_status == "expire") {
                // Update status menjadi "Failed"
                $this->db->where('id_pembayaran', $order_id);
                $this->db->update('pembayaran', ['status' => 'Failed']);
                $this->session->set_flashdata('flash-error', 'Error ');
                redirect('Home/Account');
            }
        }
    }

    public function Account(){
        $this->_notLogin();
        $check = $this->M_user->produk_get();
        $user = $this->_sessionUsr();
        $user = $user->idPelanggan;
        if(!$check){
            redirect('Home');
        }
        $pesananData = $this->M_user->pesananDetail_get($user);
        $groupedPesanan = [];

        foreach ($pesananData as $p) {
            $invoice = $p->invoice;

            // Jika invoice belum ada di array, tambahkan
            if (!isset($groupedPesanan[$invoice])) {
                $groupedPesanan[$invoice] = [
                    'invoice' => $p->invoice,
                    'tanggal' => $p->tanggal,
                    'status' => $p->status,
                    'total_harga' => 0, // Akan dijumlahkan
                    'items' => []
                ];
            }

            // Tambahkan produk ke dalam invoice yang sesuai
            $groupedPesanan[$invoice]['items'][] = [
                'namaProduk' => $p->namaProduk,
                'jumlah' => $p->jumlah
            ];

            // Total harga per invoice
            $groupedPesanan[$invoice]['total_harga'] = $p->total_harga;
        }

        $data['title']          = 'Account';
        $data['users']          = $this->_sessionUsr();
        $data['akun']           = $this->M_user->pelanggan_get($user,true);
        $data['detail']           = $groupedPesanan;
        $data['view_name']      = 'User/account';
        $this->load->view('User/templates/index', $data);
    }

}
