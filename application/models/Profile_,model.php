<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Profile_model extends CI_Model
{

    public function getDefaultValues()
    {
        return [
            'name_image'             => '',
            'path'                   => '',
            'date_created'           => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'id_category',
                'label' => 'Kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'slug',
                'label' => 'Slug',
                'rules' => 'trim|required|callback_unique_slug'
            ],
            [
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'description',
                'label' => 'Deskripsi',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'price',
                'label' => 'Harga',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'is_available',
                'label' => 'Ketersediaan',
                'rules' => 'required'
            ],
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config =  [
            'upload_path'       => './assets/images/product',
            'file_name'         => $fileName,
            'allowed_types'      => 'jpg|gif|png|jpeg|JPG|PNG',
            'max_size'          => 1024,
            /** arti nya 1 MB */
            'max_width'         => 0,
            'max_height'        => 0,
            'overwrite'         => true,
            'file_ext_tolower'  => true,
            'x_axis'            => 100,
            'y_axis'            => 70
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($fieldName)) {
            return $this->upload->data();
        } else {
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }
    /** akhir dari function uploadImage */

    public function deleteImage($fileName)
    {

        if (file_exists("./assets/images/product/$fileName")) {
            unlink("./assets/images/product/$fileName");
        }
    }
}
