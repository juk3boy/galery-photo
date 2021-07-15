<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Contact extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Please leave your massage';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('contact/index', $data);
        $this->load->view('layouts/footer');
    }
}
