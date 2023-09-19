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

    /**
     * register
     * halaman register
     * @return void
     */
    function register() 
    {
        $data = array(
            'title' => 'Registrasi',
            'action' => 'auth/register'
        );

        $this->load->view('pages/auth/register', $data);
        
    }
    
    /**
     * proses_register
     * fungsi proses register
     * @return void
     */
    public function proses_register()
    {
        $this->rules();
        
        if ($this->form_validation->run() == TRUE) {
        
            $data = array(
                'nama_satker'        => strtolower($this->input->post('nama_satker', TRUE)),
                'user'               => strtolower($this->input->post('email', TRUE)),
                'pass'               => password_hash($this->input->post('pass',TRUE),PASSWORD_DEFAULT), 
                'is_activate'        => 0,
                'level'              => 'guest',
                'terdaftar'          => date('Y-m-d H:i:s'),
            );

            $this->auth->insert_pengguna($data);
            $this->session->set_flashdata('success', '<strong>Akun berhasil dibuat! </strong> Hubungi admin untuk mengaktivasi akun');
            redirect('auth');
            
        } else {
            redirect('register');
        }
        
    }

    public function forgetPass()
    {
        $data = array(
            'title' => 'Forget Password',
            'action'   => 'forget_password/process'
        );

        $this->load->view('pages/auth/forget-pass', $data);
    }

    function forget_pass_process() {
        $email = $this->input->post('email');
        $findUser = $this->auth->findUser($email);
        $validasi = $this->auth->validasiRecover($email);
        
        if ($findUser->num_rows() == 1) {

            if ($validasi == 0) {
                $this->auth->setLostPass($email);
                $this->session->set_flashdata('success', '<strong>Cek Email! </strong> Permintaan reset password sudah dikirimkan');
                redirect('auth');
                // echo "Permintaan Berhasil!";

            } else {
                $this->session->set_flashdata('err', '<strong>Gagal! </strong> Anda sudah melakukan permintaan, Cek Email!<br />Jika anda ingin melakukan pengajuan kembali harap tunggu 30 menit kedepan untuk pengajuan ulang!');
                redirect('auth');
            }

        } else {
                $this->session->set_flashdata('err', '<strong>Gagal! </strong> Email ini tidak ditemukan');
                redirect('auth');
        }

        
    }
    
    function action_reset($token) {
        error_reporting(0);
        $getData = $this->auth->checkToken($token);
        $mail = $getData->row()->mailRec;
        $request = $this->auth->checkUserByEmail($mail)->row();

        $check          = $getData->num_rows();
        $client_ip      = $_SERVER['HTTP_X_FORWARDED_FOR'];
        if($client_ip == $getData->row()->ip_addr){
                    
            if($check == 1){
                
                $data = array(
                    'title'     => 'Set Password Baru',
                    'action'    => 'success_reset',
                    'data'      => $getData->row(),
                );
    
                $this->load->view('pages/auth/form_reset', $data);
            }else {
                 $this->session->set_flashdata('err', '<strong>Gagal! </strong> Tautan sudah kadaluarsa');
                redirect('auth');
            }
        }else{
                $this->session->set_flashdata('err', '<strong>Gagal! </strong> Tautan tidak Valid');
                redirect('auth');
        }
    }


    function updateRessPass(){
        error_reporting(0);
        $time       = $this->input->post('time');
        $setMail    = $this->input->post('user');
        $token      = md5($setMail.$time);
        $getData    = $this->auth->checkToken($token)->row();   
        if($getData != NULL || $getData->token == $token){
                $data['pass'] = password_hash($this->input->post('pass',TRUE),PASSWORD_DEFAULT);
                $this->auth->newPassword($setMail, $data, $time);
                $this->session->set_flashdata('success', '<strong>Berhasil! </strong> Password berhasil dirubah !');
                redirect('auth');
            }else{
                $this->session->set_flashdata('err', '<strong>Gagal! </strong> Tautan tidak Valid');
                redirect('auth');
            }  
    }
    
    

    

    function rules()
    {
        $this->form_validation->set_rules('nama_satker', 'Nama satuan kerja', 'trim|required|min_length[5]|max_length[50]',array('required' => '%s wajib di isi !','min_length' => '%s terlalu pendek !','max_length' => '%s terlalu panjang !',));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[30]',array('required' => '%s wajib di isi !','min_length' => '%s terlalu pendek !','max_length' => '%s terlalu panjang !',));
        $this->form_validation->set_rules('pass', 'Pass', 'trim|required|min_length[5]|max_length[12]',array('required' => '%s wajib di isi !','min_length' => '%s terlalu pendek !','max_length' => '%s terlalu panjang !',));

    }

}

/* End of file Auth.php and path \application\controllers\Auth.php */
