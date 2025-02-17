<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_root extends CI_Model
{
    public function user_get($idcustomer=NULL, $array=NULL)
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

    public function kategori_get($id=NULL, $array=NULL)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        if($id != NULL){
            $this->db->where('idKategori', $id);
        }
        if($array != NULL){
            return $this->db->get()->row();
        }else{
            return $this->db->get()->result();
        }
    }

    private function _insertImageKategori($data)
    {
        $config['upload_path']          = FCPATH.'/upload/kategori/';
        $config['allowed_types']        = 'jpg|jpeg|png|webp';
        $config['encrypt_name']         =  true;
        $config['max_size']             = 1000; // 1MB

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!empty($_FILES[$data]['name'])) {
            if ($this->upload->do_upload($data)) {
                $gbr = $this->upload->data();

                // Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = FCPATH . '/upload/kategori/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 400;
                $config['height'] = 400;
                $config['new_image'] = FCPATH . '/upload/kategori/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->image_lib->crop();
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                } else {
                    return $this->upload->data("file_name");
                }
            }
        } else {
            return "image.png";
        }
    }

    private function _updateImageKategori($data)
    {
        $this->load->library('upload');
        $config['upload_path']          = FCPATH . '/upload/kategori/';
        $config['allowed_types']        = 'jpg|jpeg|png|webp';
        $config['encrypt_name']         =  true;
        $config['max_size']             = 1000; // 1MB
        $gambar_lama                    = $this->input->post('oldimg', true);


        if ($data == 'image') {
            if ($gambar_lama != "image.png") {
                unlink("upload/kategori/$gambar_lama");
            }
        }
        $this->upload->initialize($config);
        if (!empty($_FILES['image']['name'])) {
            if ($this->upload->do_upload($data)) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = FCPATH . '/upload/kategori/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 400;
                $config['height'] = 400;
                $config['new_image'] = FCPATH . '/upload/kategori/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->image_lib->crop();
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                } else {
                    return $this->upload->data("file_name");
                }
            }
        } else {
            return "image.png";
        }
    }

    public function kategori_post()
    {
        $nama = $this->input->post('nama', true);
        $image1 = 'image.png';
        if (!empty($_FILES["image"]["name"]) or $_FILES["image"]["name"] != NULL) {
            $image1   = $this->_insertImageKategori('image');
        }
        $data = array(
            'nama_kategori' => $nama,
            'image'         => $image1
        );
        return $this->db->insert('kategori',$data);
    }

    public function kategori_put($id)
    {
        $nama = $this->input->post('nama', true);
        $image1 = 'image.png';
        if (!empty($_FILES["image"]["name"]) or $_FILES["image"]["name"] != NULL) {
            $image1   = $this->_updateImageKategori('image');
            $data = array(
                'nama_kategori' => $nama,
                'image'         => $image1
            );
        }
        $this->db->where('idKategori',$id);
        return $this->db->update('kategori',$data);
    }

    private function _deleteImageKategori($imageName)
    {
        if ($imageName && $imageName != "image.png") {
            $filePath = FCPATH . "/upload/kategori/" . $imageName;

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }

    public function kategori_delete($id)
    {
        $check = $this->db->get_where('produk', ['idKategori' => $id])->row();
        if ($check) {
            return false;
        } else {
            $kategori = $this->db->get_where('kategori', ['idKategori' => $id])->row();

            if ($kategori) {
                $this->_deleteImageKategori($kategori->image);

                $this->db->where('idKategori', $id);
                return $this->db->delete('kategori');
            }
        }
    }


    private function _insertImageProduk($data)
    {
        $config['upload_path']          = FCPATH.'/upload/produk/';
        $config['allowed_types']        = 'jpg|jpeg|png|webp';
        $config['encrypt_name']         =  true;
        $config['max_size']             = 1000; // 1MB

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!empty($_FILES[$data]['name'])) {
            if ($this->upload->do_upload($data)) {
                $gbr = $this->upload->data();

                // Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = FCPATH . '/upload/produk/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 400;
                $config['height'] = 400;
                $config['new_image'] = FCPATH . '/upload/produk/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->image_lib->crop();
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                } else {
                    return $this->upload->data("file_name");
                }
            }
        } else {
            return "image.png";
        }
    }

    private function _updateImageProduk($data)
    {
        $this->load->library('upload');
        $config['upload_path']          = FCPATH . '/upload/produk/';
        $config['allowed_types']        = 'jpg|jpeg|png|webp';
        $config['encrypt_name']         =  true;
        $config['max_size']             = 1000; // 1MB
        $gambar_lama                    = $this->input->post('oldimg', true);


        if ($data == 'image') {
            if ($gambar_lama != "image.png") {
                unlink("upload/produk/$gambar_lama");
            }
        }
        $this->upload->initialize($config);
        if (!empty($_FILES['image']['name'])) {
            if ($this->upload->do_upload($data)) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = FCPATH . '/upload/produk/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 400;
                $config['height'] = 400;
                $config['new_image'] = FCPATH . '/upload/produk/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->image_lib->crop();
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                } else {
                    return $this->upload->data("file_name");
                }
            }
        } else {
            return "image.png";
        }
    }

    public function produk_get($id=NULL)
    {
        $this->db->select('*');
        $this->db->from('produk p');
        $this->db->join('kategori k', 'k.idKategori = p.idKategori');
        if($id != NULL){
            $this->db->where('p.idProduk', $id);
            return $this->db->get()->row();
        }else{
            return $this->db->get()->result();
        }
    }

    public function list_post(){
        $nama    = $this->input->post('nama', true);
        $code    = $this->input->post('code', true);
        $brand    = $this->input->post('brand', true);
        $grade    = $this->input->post('grade', true);
        $stok = $this->input->post('stok', true);
        $harga = $this->input->post('harga', true);
        $warna = $this->input->post('warna', true);
        $kapasitas = $this->input->post('kapasitas', true);
        $kategori = $this->input->post('kategori', true);
        $deskripsi = $this->input->post('deskripsi', true);

        $harga = str_replace(',','',$harga);

        $image1   = "img_produk.png";
        if (!empty($_FILES["image"]["name"]) or $_FILES["image"]["name"] != NULL) {
            $image1   = $this->_insertImageProduk('image');
        }

        $data= array(
            'namaProduk'    => $nama,
            'kodeProduk'    => $code,
            'merk'          => $brand,
            'kondisi'       => $grade,
            'stok'          => $stok,
            'hargaSewa'     => $harga,
            'warna'         => $warna,
            'kapasitas'     => $kapasitas,
            'idKategori'      => $kategori,
            'deskripsi'     => $deskripsi,
            'imageProduk'   => $image1
        );

        return $this->db->insert('produk', $data);
    }

    public function list_put($idProd){
        $nama    = $this->input->post('nama', true);
        $code    = $this->input->post('code', true);
        $brand    = $this->input->post('brand', true);
        $grade    = $this->input->post('grade', true);
        $stok    = $this->input->post('stok', true);
        $harga   = $this->input->post('harga', true);
        $warna   = $this->input->post('warna', true);
        $kapasitas = $this->input->post('kapasitas', true);
        $kategori = $this->input->post('kategori', true);
        $deskripsi = $this->input->post('deskripsi', true);

        $harga = str_replace(',','',$harga);

        $image1   = $this->input->post('oldimg', true);
        if (!empty($_FILES["image"]["name"]) or $_FILES["image"]["name"] != NULL) {
            $old = $this->input->post('oldimg', true);
            $image1   = $this->_updateImageProduk('image', $old);
        }

        $data= array(
            'namaProduk'    => $nama,
            'kodeProduk'    => $code,
            'merk'          => $brand,
            'kondisi'       => $grade,
            'stok'          => $stok,
            'hargaSewa'     => $harga,
            'warna'         => $warna,
            'kapasitas'     => $kapasitas,
            'idKategori'      => $kategori,
            'deskripsi'     => $deskripsi,
            'imageProduk'   => $image1,
            'updateAt'      => date('Y-m-d H:i:s')
        );

        $this->db->where('idProduk', $idProd);
        return $this->db->update('produk', $data);
    }

    private function _deleteImageProduk($imageName)
    {
        if ($imageName && $imageName != "image.png") {
            $filePath = FCPATH . "/upload/produk/" . $imageName;

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }

    public function produk_delete($id)
    {
        $check = $this->db->get_where('produk', ['idProduk' => $id])->row();
        if ($check) {
            $this->_deleteImageProduk($check->imageProduk);

            $this->db->where('idProduk', $id);
            return $this->db->delete('produk');
        }
    }
}



