<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Auth_model extends CI_Model 
{
    
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
                        
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
