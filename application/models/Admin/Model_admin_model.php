<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Model_admin_model extends CI_Model 
{
    public function select()
    {

    }    
    
    function insert_user($data) {
        $this->db->insert('tb_pengguna', $data);
        return;
    }

    function get_single_user($id) {
        $this->db->where('id_pengguna', $id);
        return $this->db->get('tb_pengguna');
    }

    function activated_user($id) {
        $data['is_activate'] = 1;
        $this->db->where('id_pengguna', $id);
        $this->db->update('tb_pengguna', $data);
        return;
    }

    function remove_user($id) {
        $this->db->where('id_pengguna', $id);
        $this->db->delete('tb_pengguna');
        return;
    }
                        
}


/* End of file Model_admin_model.php and path \application\models\Admin\Model_admin_model.php */
