<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    private $_table_ROOT   = "root";
    private $_table_USER  = "pelanggan";

    const SESSION_KEYROOT  	= 'idRoot';
    const SESSION_KEYUSER 	= 'idPelanggan';



    public function rules()
    {
        return [
            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|max_length[50]|valid_email'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|max_length[50]'
            ]
        ];
    }

	//===============================USERS===============================

    public function loginUser($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->_table_USER);
        $user = $query->row();


        // cek apakah user sudah terdaftar?
        if (!$user) {
            return 0;
        }

        // cek apakah passwordnya benar?
        if ($password != $user->password) {
            return 1;
        }

        // bikin session
        $this->session->set_userdata([self::SESSION_KEYUSER => $user->idPelanggan]);
        $this->session->has_userdata(self::SESSION_KEYUSER);

        return 3;
    }

    public function current_user()
    {
        if (!$this->session->has_userdata(self::SESSION_KEYUSER)) {
            return null;
        }

        $user_id = $this->session->userdata(self::SESSION_KEYUSER);
        $query = $this->db->get_where($this->_table_USER, ['idPelanggan' => $user_id]);
        return $query->row();
    }


    public function logoutUser()
    {
        $this->session->unset_userdata([self::SESSION_KEYUSER]);
        return !$this->session->has_userdata([self::SESSION_KEYUSER]);
    }



	//===============================ROOT===============================
    public function loginRoot($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->_table_ROOT);
        $user = $query->row();


        // cek apakah user sudah terdaftar?
        if (!$user) {
            return 0;
        }

        // cek apakah passwordnya benar?
        if ($password != $user->password) {
            return 1;
        }

        // bikin session
        $this->session->set_userdata([self::SESSION_KEYROOT => $user->id_root]);
        $this->session->has_userdata(self::SESSION_KEYROOT);

        return 3;
    }

    public function current_root()
    {
        if (!$this->session->has_userdata(self::SESSION_KEYROOT)) {
            return null;
        }

        $user_id = $this->session->userdata(self::SESSION_KEYROOT);
        $query = $this->db->get_where($this->_table_ROOT, ['id_root' => $user_id]);
        return $query->row();
    }

    public function logoutRoot()
    {
        $this->session->unset_userdata(self::SESSION_KEYROOT);
        return !$this->session->has_userdata(self::SESSION_KEYROOT);
    }

}
