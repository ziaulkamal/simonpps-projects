<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
        
    }

    public function index()
    {

    }

    function login() 
    {  
        $data = array(
            'title' => 'Login',
            'action' => 'auth/login'
        );

        $this->load->view('pages/auth/login', $data);
        
    }


    function login_process() 
    {
        $user = strtolower($this->input->post('user', TRUE));
        $pass = $this->input->post('pass', TRUE);

        $request = $this->auth->login($user,$pass);

        if ($request) {
            $this->session->set_flashdata('success', 'Sukses login !');
            redirect('/');
        }else{
            $this->session->set_flashdata('error', 'Email atau password salah.');
            redirect('auth');
        } 
    }

    function logout() 
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}

/* End of file Auth.php and path \application\controllers\Auth.php */
