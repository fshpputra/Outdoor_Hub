<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_signup extends CI_Model
{
    public function register()
    {
        $username       = $this->input->post('nama', true);
        $email          = $this->input->post('email', true);
        $telepon_user   = $this->input->post('no_hp', true);
        $password       = $this->input->post('password', true);
        $encrptopenssl =  new Opensslencryptdecrypt();
        $result  = $encrptopenssl->encrypt($password);
        $data = [
            'nama' => $username ,
            'email' => $email,
            'no_hp' => $telepon_user,
            'password' => $result,
        ];

		if ($this->db->insert('pelanggan', $data)) {
			return true;
		} else {
			return false;
		}

    }
}
