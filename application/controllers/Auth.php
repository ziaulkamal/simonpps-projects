<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
        if (!$this->session->userdata() && $this->session->userdata('level') != 'guest' || $this->session->userdata('level') != 'seksi-pps' && $this->auth->checkUser( $this->session->userdata('mail') != 1)) {
            $this->session->set_flashdata('err', 'User Atau Password Salah');
            redirect('auth','refresh');
            
        }
        
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
        $csrf = $this->input->post('simons');

        $request = $this->auth->login($user,$pass);
        if ($request) {
            switch ($request->level) {
                case 'admin':
                    $user_data = array(
                        'masuk'         => TRUE,
                        'nama_satker'   => $request->nama_satker,
                        'level'         => 'admin',
                        'mail'          => $request->user,
                        'id_level'      => '1',
                        'locale'        => $request->id_pengguna,
                    );
                    break;

                case 'seksi-pps':
                    $user_data = array(
                        'masuk'         => TRUE,
                        'nama_satker'   => $request->nama_satker,
                        'level'         => 'seksi-pps',
                        'mail'          => $request->user,
                        'id_level'      => '2',
                        'locale'        => $request->id_pengguna,
                    );
                    break;

                case 'guest':
                    if ($request->is_activate == 1) {
                        $user_data = array(
                            'masuk'         => TRUE,
                            'nama_satker'   => $request->nama_satker,
                            'level'         => 'guest',
                            'mail'          => $request->user,
                            'id_level'      => '3',
                            'locale'        => $request->id_pengguna,
                        );
                    } else {
                        $this->session->set_flashdata('danger', '<strong>Akun anda belum di aktivasi! </strong> <br /> Hubungi admin agar bisa melakukan login');
                        redirect('auth');
                    }
                    break;

                default:
                    break;
            }

            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('success', 'Sukses login !');
            redirect('/');
        }else{
            $this->session->set_flashdata('error', 'Email atau password salah.');
            redirect('auth');
        } 
    }

    function logout() 
    {
        $this->session->set_flashdata('success', 'Sesi Anda telah berakhir.');
        setcookie('logout_message', "logout", time() + 3600, '/');

        $this->session->sess_destroy();
        redirect('auth');
    }

    function clear_db() {
        $this->auth->clear_db();
        $this->session->set_flashdata('success', 'Database Sudah dibersihkan');
        $directory = './public/lampiran/';

        // Fungsi untuk menghapus file dan folder secara rekursif
        function hapusFileDanFolder($directory) {
            $files = glob($directory . '/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                } elseif (is_dir($file)) {
                    hapusFileDanFolder($file);
                    rmdir($file);
                }
            }
        }

        // Mengecek apakah direktori ada atau tidak
        if (is_dir($directory)) {
            hapusFileDanFolder($directory);

            // Setelah membersihkan direktori, buat file baru
            $myfile = fopen($directory . 'index.php', "w");
            fwrite($myfile, "<?php defined('BASEPATH') OR exit('No direct script access allowed'); \n
// Silence Is Golden");
            fclose($myfile);

            echo "Semua file dan folder telah dihapus dari direktori.";
        } else {
            echo "Direktori tidak ditemukan.";
        }
        
        redirect('/','refresh');
        
    }  

}

/* End of file Auth.php and path \application\controllers\Auth.php */
