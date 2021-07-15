<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Home extends CI_Controller
{

    public function index()
    {

        $data['title'] = 'My Galery Photo';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('layouts/footer');
    }
}
