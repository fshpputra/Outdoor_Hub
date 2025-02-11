<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_signup extends CI_Model
{
    public function register()
    {
        $username       = $this->input->post('nama', true);
        $email          = $this->input->post('email', true);
        $ttl            = $this->input->post('ttl', true);
        $telepon_user   = $this->input->post('no_hp', true);
        $password       = $this->input->post('password', true);
        $encrptopenssl =  new Opensslencryptdecrypt();
        $result  = $encrptopenssl->encrypt($password);
        $token = base64_encode(random_bytes(32));
        $data = [
            'nama_user' => $username ,
            'email_user' => $email,
            'ttl_user' => $ttl ,
            'telepon_user' => $telepon_user,
            'password' => $result,
            'token' => $token,
            'time' => time(),
        ];

		if ($this->db->insert('user', $data)) {
			return true;
		} else {
			log_message('error', 'Registration failed: ' . $this->db->error()['message']);
			return false;
		}

    }
}
