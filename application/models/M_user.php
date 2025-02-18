<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function produkLimit_get($id = NULL, $idKategori = NULL, $array = NULL, $limit = 5)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.idKategori = produk.idKategori');

        if ($id != NULL) {
            $this->db->where('produk.idProduk', $id);
        }

        if ($idKategori != NULL) {
            $this->db->where('produk.idKategori', $idKategori);
        }

        $this->db->limit($limit);

        if ($array != NULL) {
            return $this->db->get()->row();
        } else {
            return $this->db->get()->result();
        }
    }

    public function produk_get($id=NULL, $array=NULL)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.idKategori = produk.idKategori');
        if($id != NULL){
            $this->db->where('idProduk', $id);
        }
        if($array != NULL){
            return $this->db->get()->row();
        }else{
            return $this->db->get()->result();
        }
    }

    public function getCartItems($idPelanggan) {
        $this->db->select('keranjang.*, produk.*');
        $this->db->from('keranjang');
        $this->db->join('produk', 'keranjang.idProduk = produk.idProduk');
        $this->db->where('keranjang.idPelanggan', $idPelanggan);
        return $this->db->get()->result();
    }

    public function CartItems_post($id=NULL, $idProduk=NULL) {
        $data = [
            'idPelanggan' => $id,
            'idProduk' => $idProduk,
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->insert('keranjang', $data);
    }

    public function removeCartItem($id) {
        $this->db->where('idKeranjang', $id);
        return $this->db->delete('keranjang');
    }

    public function simpanPesanan($idPelanggan, $keranjang, $jumlahProduk)
    {
        $total_harga = 0;
        foreach ($keranjang as $item) {
            $jumlah = $jumlahProduk[$item->idProduk] ?? 1;
            $total_harga += $item->hargaSewa * $jumlah;
        }

        $data_pesanan = [
            'idPelanggan' => $idPelanggan,
            'invoice' => "INV-" . time(),
            'total_harga' => $total_harga,
            'tanggal' => date('Y-m-d'),
            'status' => 'Pending'
        ];

        $this->db->insert('pesanan', $data_pesanan);
        $idPesanan = $this->db->insert_id();

        foreach ($keranjang as $item) {
            $jumlah = $jumlahProduk[$item->idProduk] ?? 1;
            $data_orderitem = [
                'idPesanan' => $idPesanan,
                'idProduk' => $item->idProduk,
                'jumlah' => $jumlah,
                'harga' => $item->hargaSewa
            ];
            $this->db->insert('orderitem', $data_orderitem);
        }

        $this->db->where('idPelanggan', $idPelanggan);
        $this->db->delete('keranjang');

        return $idPesanan;
    }

    public function pesanan_get($id=NULL, $array=NULL){
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = pesanan.idPelanggan');
        if($id != NULL){
            $this->db->where('idPesanan', $id);
        }
        $this->db->order_by('idPesanan', 'DESC');
        $this->db->limit(1);
        if($array != NULL){
            return $this->db->get()->row();
        }else{
            return $this->db->get()->result();
        }
    }

    public function insertPengiriman($data)
    {
        $this->db->insert('pengiriman', $data);
        return $this->db->insert_id();
    }

    public function insertPembayaran($data)
    {
        $this->db->insert('pembayaran', $data);
        return $this->db->insert_id();
    }

    public function pelanggan_get($idcustomer=NULL, $array=NULL)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        if($idcustomer != NULL){
            $this->db->where('idPelanggan', $idcustomer);
        }
        if($array != NULL){
            return $this->db->get()->row();
        }else{
            return $this->db->get()->result();
        }
    }

    public function pesananDetail_get($id,$invoice=NULL, $array=NULL, $produk=NULL){
        $this->db->select('g.namaProduk, s.jumlah, b.total_harga, b.tanggal, b.status, b.invoice');
        $this->db->from('orderitem s');
        $this->db->join('produk g', 's.idProduk=g.idProduk');
        $this->db->join('pesanan b', 's.idPesanan= b.idPesanan');
        $this->db->join('pelanggan c', 'b.idPelanggan= c.idPelanggan');
        $this->db->where('b.idPelanggan', $id);

        if($invoice != NULL){
            $this->db->where('s.idPesanan', $invoice);
        }
        if($produk != NULL){
            $this->db->where('s.idProduk', $produk);
        }
        if($array != NULL){
            return $this->db->get()->row();
        }else{
            return $this->db->get()->result();
        }

    }

    public function get_dashboard_counts() {
        $query = $this->db->query("
            SELECT 
                (SELECT COUNT(*) FROM kategori) AS total_category,
                (SELECT COUNT(*) FROM produk) AS total_produk,
                (SELECT COUNT(*) FROM ulasan) AS total_review,
                (SELECT COUNT(*) FROM pesanan) AS total_pesanan
        ");
        return $query->row();
    }

}
