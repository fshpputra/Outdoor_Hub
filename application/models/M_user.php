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
        if($id != NULL){
            $this->db->where('idPesanan', $id);
        }
        if($array != NULL){
            return $this->db->get()->row();
        }else{
            return $this->db->get()->result();
        }
    }

}
