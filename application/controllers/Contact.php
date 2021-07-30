<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        // $data = $this->contact_model->getAll();



        if (!$_POST) {

            $input = (object) $this->Contact_model->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->Contact_model->validate()) {
            $data['title'] = "Pleas Leave Your Contact";
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('contact/index', $data);
            $this->load->view('layouts/footer');

            return;
        }

        if ($this->Contact_model->run($input)) {

            $this->session->set_flashdata('success', 'Berhasil melakukan registrasi!');
            redirect(base_url());
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan!');
            redirect(base_url('contact/index'));
        }
    }
}
