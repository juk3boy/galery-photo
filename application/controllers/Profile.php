<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Profile extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Profile';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('layouts/footer');
    }

    public function edit()
    {

        $data['title'] = 'Edit Profile';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('profile/form', $data);
        $this->load->view('layouts/footer');
    }
}
