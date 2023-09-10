<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Main_model extends CI_Model 
{
    function getAllPermohonan() {
        $this->db->join('tb_dokumen', 'tb_dokumen.id_dokumenDO = tb_pemohon.dokumen_idPE');
        $this->db->order_by('tb_pemohon.updateDatePE', 'DESC');
        $this->db->where('tb_dokumen.jns_dokDO !=', 'ditolak');
        return $this->db->get('tb_pemohon');
    }        
    
    function getPermohonanById($id) {
        $this->db->join('tb_dokumen', 'tb_dokumen.id_dokumenDO = tb_pemohon.dokumen_idPE');
        $this->db->where('tb_pemohon.dokumen_idPE', $id);
        return $this->db->get('tb_pemohon');   
    }

    function insertPermohonan($data, $id) {
        $this->db->where('dokumen_idPE', $id);
        $set = $this->db->get('tb_pemohon')->row();
        
        $guestLog = array(
            'lvlAccess'             => $this->session->userdata('level'),
            'username'              => $this->session->userdata('mail'),	
            'dateLog'               => date('Y-m-d'), 	
            'keteranganLog'         => 'Dokumen telah ditindak lanjuti dengan nama pekerjaan ' . $set->nama_pkjPE .' dari satuan kerja "'. $set->asal_satkerPE.'".',
        );
        $this->db->insert('tb_log', $guestLog);

        $data['jns_dokDO'] = 'ditindak';
        $this->db->where('id_dokumenDO', $id);
        $this->db->update('tb_dokumen', $data);
        return;
    }

    function approvePermohonan($data, $id) {
        $this->db->join('tb_dokumen', 'tb_dokumen.id_dokumenDO = tb_pemohon.dokumen_idPE');
        $this->db->where('tb_pemohon.dokumen_idPE', $id);
        $set = $this->db->get('tb_pemohon')->row();
        
        $guestLog = array(
            'lvlAccess'             => $this->session->userdata('level'),
            'username'              => $this->session->userdata('mail'),	
            'dateLog'               => date('Y-m-d'), 	
            'keteranganLog'         => 'Dokumen IN.13 dan IN.2 telah dikirimkan untuk persetujuan dengan nama pekerjaan ' . $set->nama_pkjPE .' dari satuan kerja "'. $set->asal_satkerPE.'".',
        );
        $this->db->insert('tb_log', $guestLog);

        $data['jns_dokDO'] = 'diterima';
        $this->db->where('id_dokumenDO', $id);
        $this->db->update('tb_dokumen', $data);
        return;
    }

    function rejectPermohonan($data, $id) {
        $this->db->join('tb_dokumen', 'tb_dokumen.id_dokumenDO = tb_pemohon.dokumen_idPE');
        $this->db->where('tb_pemohon.dokumen_idPE', $id);
        $set = $this->db->get('tb_pemohon')->row();
        
        $guestLog = array(
            'lvlAccess'             => $this->session->userdata('level'),
            'username'              => $this->session->userdata('mail'),	
            'dateLog'               => date('Y-m-d'), 	
            'keteranganLog'         => 'Dokumen IN.14 telah dikirimkan untuk penolakan dengan nama pekerjaan ' . $set->nama_pkjPE .' dari satuan kerja "'. $set->asal_satkerPE.'".',
        );
        $this->db->insert('tb_log', $guestLog);

        $data['jns_dokDO'] = 'ditolak';
        $this->db->where('id_dokumenDO', $id);
        $this->db->update('tb_dokumen', $data);
        return;
    }
    
    function getAllPekerjaan() {
        $this->db->join('tb_pemohon', 'tb_pemohon.id_pemohonPE = tb_progress_pekerjaan.pemohon_idPR');
        $this->db->join('tb_dokumen', 'tb_dokumen.id_dokumenDO = tb_pemohon.dokumen_idPE');
        $this->db->where('tb_dokumen.jns_dokDO', 'diterima');
        $this->db->order_by('tb_progress_pekerjaan.updateDatePR', 'DESC');
        return $this->db->get('tb_progress_pekerjaan');
    }

    function getTrackByIdProgress($idProgress) {
        $this->db->join('tb_progress_pekerjaan', 'tb_progress_pekerjaan.id_progPR = tb_trackprogress.idProgress');
        $this->db->where('tb_trackprogress.idProgress', $idProgress);
        return $this->db->get('tb_trackprogress');
    }

    function saveCompletePekerjaan($data,$id) {
        $generateStatusId = 'STC'.time().date('dmY');
        $this->db->where('dokumen_idPE', $id);
        $set = $this->db->get('tb_pemohon')->row();
        
        $guestLog = array(
            'lvlAccess'             => $this->session->userdata('level'),
            'username'              => $this->session->userdata('mail'),	
            'dateLog'               => date('Y-m-d'), 	
            'keteranganLog'         => 'Pekerjaan ' . $set->nama_pkjPE .' dari satuan kerja "'. $set->asal_satkerPE.'" telah dinyatakan selesai karna telah dituntaskan.',
        );
        $this->db->insert('tb_log', $guestLog);

        $data['id_statusST'] = $generateStatusId;
        $data['outputSts']  = 1;
        $data['updateDateST	'] = date('Y-m-d');
        $this->db->insert('tb_status', $data);
        
        $dataOne = array(
            'status_idPE' => $generateStatusId,
            'updateDatePE' => date('Y-m-d')
        );
        $this->db->where('dokumen_idPE', $id);
        $this->db->update('tb_pemohon', $dataOne);

        $dataTwo = array(
            'jns_dokDO' => 'selesai',
            'ket_dokDO' => 'Proyek telah dinyatakan selesai karena diselesaikan',
            'updateDateDO' => date('Y-m-d')
        );
        $this->db->where('id_dokumenDO', $id);
        $this->db->update('tb_dokumen', $dataTwo);
        return;
    }

    function saveIncompletePekerjaan($data,$id) {
        $generateStatusId = 'STI'.time().date('dmY');
        $this->db->where('dokumen_idPE', $id);
        $set = $this->db->get('tb_pemohon')->row();
        
        $guestLog = array(
            'lvlAccess'             => $this->session->userdata('level'),
            'username'              => $this->session->userdata('mail'),	
            'dateLog'               => date('Y-m-d'), 	
            'keteranganLog'         => 'Pekerjaan ' . $set->nama_pkjPE .' dari satuan kerja "'. $set->asal_satkerPE.'" telah dinyatakan selesai karna telah dihentikan.',
        );
        $this->db->insert('tb_log', $guestLog);

        $data['id_statusST'] = $generateStatusId;
        $data['outputSts']  = 2;
        $data['updateDateST	'] = date('Y-m-d');
        $this->db->insert('tb_status', $data);
        
        $dataOne = array(
            'status_idPE' => $generateStatusId,
            'updateDatePE' => date('Y-m-d')
        );
        $this->db->where('dokumen_idPE', $id);
        $this->db->update('tb_pemohon', $dataOne);

        $dataTwo = array(
            'jns_dokDO' => 'selesai',
            'ket_dokDO' => 'Proyek telah dinyatakan selesai karena dihentikan',
            'updateDateDO' => date('Y-m-d')
        );
        $this->db->where('id_dokumenDO', $id);
        $this->db->update('tb_dokumen', $dataTwo);
        return;
    }

    function getPekerjaanDone() {
        $this->db->join('tb_pemohon', 'tb_pemohon.status_idPE = tb_status.id_statusST');
        $this->db->join('tb_dokumen', 'tb_dokumen.id_dokumenDO = tb_pemohon.dokumen_idPE');
        $this->db->where('tb_dokumen.jns_dokDO', 'selesai');
        
        
        return $this->db->get('tb_status');
    }
}


/* End of file Main_model.php and path \application\models\PPS\Main_model.php */
