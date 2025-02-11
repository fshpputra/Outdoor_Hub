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
}



