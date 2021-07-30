<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{

    // public $_table = "contact";

    // public $id;
    // public $nama;
    // public $telepon;
    // public $email;
    // public $pesan;

    public function getDefaultValues()
    {
        return [
            'nama'              => '',
            'telepon'           => '',
            'email'             => '',
            'pesan'             => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'telepon',
                'label' => 'Telepon',
                'rules' => 'trim|numeric|required'
            ],

            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ],

            [
                'field' => 'pesan',
                'label' => 'Pesam',
                'rules' => 'required'
            ],
        ];

        return $validationRules;
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->product_id = uniqid();
        $this->nama = $post["nama"];
        $this->telepon = $post["telepon"];
        $this->email = $post["email"];
        $this->pesan = $post["pesan"];
        return $this->db->insert($this->_table, $this);
    }


    public function validate()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters(
            '<small class="form-text text-danger">',
            '</small>'
        );

        $validationRules = $this->getValidationRules();

        $this->form_validation->set_rules($validationRules);

        return $this->form_validation->run();
    }

    public function run($input)
    {

        $data = [
            'nama'        => $input->nama,
            'telepon'     => $input->telepon,
            'email'       => strtolower($input->email),
            'pesan'       => htmlspecialchars($input->pesan),
        ];

        /** create($data) -> diambil dari model create yg sudah dibuat di MY_Model */
        $add = $this->db->insert($data);

        /** variable user ($user) ini hanya menampilkan nilai baliknya saja */

        $sess_data = [
            'id'            => $add,
            'nama'          => $data['nama'],
            'telepon'       => $data['telepon'],
            'email'         => $data['email'],
            'pesan'         => $data['pesan']
        ];


        var_dump($sess_data);
        die;


        $this->session->set_userdata($sess_data);
        return true;
    }
    /** Akhir dari function run($input) */
}

/* End of file ModelName.php */
