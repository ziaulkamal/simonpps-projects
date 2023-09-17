<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Model_admin_model','admin');
        
    }

    function view_user() {
        $load = $this->admin->get_all_pengguna()->result();
        $data = array(
            'title'         => 'Data User',
            'pageTitle'     => 'Data Seluruh User',
            'pages'         => 'pages/admin/List_akun',
            'data'          => $load,
            'dataTable'     => TRUE
        );

        $this->load->view('main', $data);   
    }

    function create_user() 
    {
        $data = array(
            'title'         => 'Daftar User',
            'pageTitle'     => 'Daftar User Baru',
            'pages'         => 'pages/admin/Create_akun',
            'action'        => 'buat_user/process'
        );

        $this->load->view('main', $data);    
    }

    function save_user() {

        $this->_rules('create_user');
        
        if ($this->form_validation->run() == FALSE) {
            $this->create_user();
        } else {
            $data = array(
                'nama_satker'       => strtolower($this->input->post('nama_satker', TRUE)),	
                'user'              => strtolower($this->input->post('email',TRUE)),	
                'pass'              => password_hash($this->input->post('pass',TRUE),PASSWORD_DEFAULT),	
                'level'             => $this->input->post('level'),	
                'is_activate'       => 1,	
                'terdaftar'         => date('Y-m-d H:i:s'),	
            );

            $this->admin->insert_user($data);
            $this->session->set_flashdata('success', 'Berhasil menambahkan user !');
            redirect('list_user','refresh');   
        }
    }

    function activated_user($id) {
        $user = $this->admin->get_single_user($id)->row_array();
        $this->admin->activated_user($id);
        $this->session->set_flashdata('success', 'Berhasil melakukan aktivasi user dengan email '. $user['user']. ' !');
        redirect('list_user','refresh');   
    }

    function delete_user($id) {
        $user = $this->admin->get_single_user($id)->row_array();
        $this->admin->remove_user($id);
        $this->session->set_flashdata('success', 'Berhasil menghapus  user dengan email '. $user['user']. ' !');
        redirect('list_user','refresh');  
    }

    function _rules($rules) {
        switch ($rules) {
            case 'create_user':
                $this->form_validation->set_rules('nama_satker', 'Nama Satuan Kerja', 'trim|required|min_length[4]|max_length[30]',array(
                    'required' => '%s harus diisi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_pengguna.user]',array(
                    'required' => '%s harus diisi !',
                    'valid_email' => 'Format %s tidak sesuai !',
                    'is_unique' => '%s sudah ada disistem !',
                ));
                $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]',array(
                    'required' => '%s harus diisi !',
                    'min_length' => '%s minimal 6 karakter !',
                ));
                $this->form_validation->set_rules('level', 'Level Akses', 'trim|required',array(
                    'required' => '%s harus dipilih !',
                ));
                
                break;
            
            default:
                # code...
                break;
        }
    }
}

/* End of file Main_controller.php.php and path \application\controllers\Admin\Main_controller.php.php */
