
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
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
}

/* End of file ModelName.php */