<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Home page';
        $this->load->view('Landing/index', $data);
    }
}
?>


