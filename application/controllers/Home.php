<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }


    public function index()
    {

        $data['title'] = 'My Galery Photo';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('layouts/footer');
    }

    public function editHome()
    {

        if (!$_POST) {
            $input = (object) $this->product->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName = url_title($input->title, '-', true) . '-' . date('YmdHis');
            $upload = $this->product->uploadImage('image', $imageName);

            if ($upload) {
                $input->image = $upload['file_name'];
            } else {
                redirect(base_url('product/create'));
            }
        }
    }
}
