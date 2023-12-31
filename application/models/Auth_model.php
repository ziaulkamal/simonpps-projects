<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Auth_model extends CI_Model 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('email');
        
    }
    
    public function get_client_ip() {

		$url = 'https://myipv4.p1.opendns.com/get_my_ip';
		$response = file_get_contents($url);
		$data = json_decode($response, true);

        return $data['ip'];
    }
    
    function login($user,$pass) {
            // Mencari pengguna berdasarkan nama pengguna
        $query = $this->db->where('user', $user)->get('tb_pengguna');

        // Jika pengguna ditemukan
        if ($query->num_rows() == 1) {
            $user_row = $query->row();

            // Memeriksa kata sandi dengan password_verify
            if (password_verify($pass, $user_row->pass)) {
                return $user_row; // Mengembalikan objek pengguna jika kata sandi cocok
            }
        }

        return false; 
    }

    function findUser($email) {
        $this->db->where('user', $email);
        return $this->db->get('tb_pengguna');   
    }

    function setLostPass($email) {
        $data = array(
            'mailRec' => $email,
            'token' => md5($email.date('Y-m-d H:i:s')),
            'timeStamp' => date('Y-m-d H:i:s'),
            'ip_addr' => $this->get_client_ip(),
            'status' => 1,
            'dateRequest' => date('Y-m-d')
        );

        // $sendMail = array(
        //     'to' => $email,
        //     'body' => '<a href="'.base_url('rekPassword/'.$data['token']).'" >Klik link berikut untuk merubah passwod</a>',
        //     'subject' => 'recover passwod'
        // );

        $to = $email;
        $body = 'Anda melakukan permintaan perubahan password pada tanggal '.date('d-m-Y');
        $body .= '<br />Klik <a href="'.base_url('action/reset/'.$data['token']).'" target="blank_" rel="norefferer" >Tautan Ini</a> Untuk Konfirmasi Perubahan Password';
        $subject = '[Notice !] Perubahan Password Untuk Aplikasi Simons';

        $cek = sendMail($to, $body, $subject);
        $this->db->insert('tb_recover', $data);
        
    }

    function validasiRecover($email) {
        $this->db->where('mailRec', $email);
        $this->db->where('status', 1);
        return $this->db->get('tb_recover')->num_rows();
        
    }

    function clear_db() {
        $this->db->empty_table('tb_dokumen');
        $this->db->empty_table('tb_log');
        $this->db->empty_table('tb_pemohon');
        $this->db->empty_table('tb_progress_pekerjaan');
        $this->db->empty_table('tb_status');
        $this->db->empty_table('tb_trackprogress');
        $this->db->empty_table('tb_survey');
    }
             
    function checkUser($user) {
        $this->db->where('user', $user);
        return $this->db->get('tb_pengguna')->num_rows();
    }

    function insert_pengguna($data)
    {
        $this->db->insert('tb_pengguna', $data);
    }
    
    function checkToken($token){
        $this->db->where('token', $token);
        $this->db->where('status', 1);
        
        return $this->db->get('tb_recover');
        
    }
    
    function newPassword($setMail, $data, $time){
        $this->db->where('user', $setMail);
        $this->db->update('tb_pengguna', $data);
        $token = md5($setMail.$time);
        $this->db->where('token', $token);
        $status['status'] = 0;
        $this->db->update('tb_recover', $status);
    }
    
    function checkUserByEmail($email){
        $this->db->where('user', $email);
        return $this->db->get('tb_pengguna');
    }
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
