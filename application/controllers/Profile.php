<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('layouts/footer');
    }

    /** Ini untuk search */
    // public function reset()
    // {
    //     $this->session->unset_userdata('keyword');
    //     redirect(base_url('product'));
    // }

    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->profile_model->getDefaultValues();
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

        if (!$this->profile_model->validate()) {
            $data['title'] = 'Tambah Produk';
            $data['input'] = $input;
            $data['form_action'] = base_url("/product/create");
            $data['page'] = 'pages/product/form';

            $this->load->view($data);
            return;
        }

        if ($this->profile_model->create($input)) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
        } else {
            $this->session->set_flashdata('error', 'Oops!!!  Terjadi suatu kesalahan ...');
        }

        redirect(base_url('product'));
    }
    /** Akhir dari function create() */

    /** MENU EDIT */

    public function edit($id)
    {
        $data['content'] = $this->profile_model->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf, Data tidak ditemukan !!!');
            redirect(base_url('product'));
        }

        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        /** Ini untuk pengecekan image apakah sudah ada atau belum */
        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName = url_title($data['input']->title, '-', true) . '-' . date('YmdHis');
            $upload = $this->profile_model->uploadImage('image', $imageName);

            if ($upload) {

                if ($data['content']->image !== '') {
                    $this->profile_model->deleteImage($data['content']->image);
                }
                $data['input']->image = $upload['file_name'];
            } else {
                redirect(base_url("profile/edit/$id"));
            }
        }

        if (!$this->profile_model->validate()) {
            $data['title'] = 'Ubah Profile';
            $data['form_action'] = base_url("/product/edit/$id");
            $data['page'] = 'pages/profile/form';

            $this->load->view($data);
            return;
        }
        /** Informasi validasi berhasil / tidaknya */
        if ($this->product->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
        } else {
            $this->session->set_flashdata('error', 'Oops!!!  Terjadi suatu kesalahan ...');
        }

        redirect(base_url('product'));
    }

    /** AKHIR MENU EDIT */

    /** MENU DELETE */

    public function delete($id)
    {

        //dibawah ini agar proses delete tidak dilakukan melalui link brower dsb
        if (!$_POST) {
            redirect(base_url('profile'));
        }

        /** dibawah ini berfungsi untuk mengecek apakah product yang akan didelete ada didatabase */
        $product = $this->profile_model->where('id', $id)->first();

        if (!$product) {
            $this->session->set_flashdata('warning', 'Maaf, Data tidak ditemukan !!!');
            redirect(base_url('profile'));
        }

        if ($this->profile_model->where('id', $id)->delete()) {
            /** ini akan menghapus gambar */
            $this->profile_model->deleteImage($product->image);
            $this->session->set_flashdata('success', 'Data sudah berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Oops !!! Terjadi suatu kesalahan !!!');
        }

        redirect(base_url('profile'));
    }

    /** AKHIR MENU DELETE */
}
