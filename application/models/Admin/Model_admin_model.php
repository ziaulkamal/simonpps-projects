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

    function result_done() {
        $this->db->join('tb_pemohon', 'tb_pemohon.dokumen_idPE = tb_dokumen.id_dokumenDO');
        $this->db->where('tb_dokumen.jns_dokDO', 'selesai');
        return $this->db->get('tb_dokumen');
    }

    function survey_done() {
        $this->db->select('ratingNum');
        
        return $this->db->get('tb_survey');
        
    }
                        
}


/* End of file Model_admin_model.php and path \application\models\Admin\Model_admin_model.php */
