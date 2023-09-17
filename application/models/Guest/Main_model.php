<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('email'); // Memuat helper email
    }

    function getMessage() {
        $this->db->join('tb_dokumen', 'tb_dokumen.id_dokumenDO = tb_pemohon.dokumen_idPE');
        $this->db->order_by('tb_pemohon.updateDatePE', 'DESC');
        $this->db->where('asal_satkerPE', $this->session->userdata('nama_satker') );
        
        return $this->db->get('tb_pemohon'); 
    }

    function getAllPermohonan() {
        $this->db->join('tb_dokumen', 'tb_dokumen.id_dokumenDO = tb_pemohon.dokumen_idPE');
        $this->db->order_by('tb_pemohon.updateDatePE', 'DESC');
        $this->db->where('tb_dokumen.jns_dokDO !=', 'ditolak');
        $this->db->where('asal_satkerPE', $this->session->userdata('nama_satker') );
        
        return $this->db->get('tb_pemohon');
    }

    function getPermohonanById($id) {
        $this->db->join('tb_dokumen', 'tb_dokumen.id_dokumenDO = tb_pemohon.dokumen_idPE');
        $this->db->where('tb_pemohon.id_pemohonPE', $id);
        return $this->db->get('tb_pemohon');   
    }
    
    function insertPermohonan($dataOne,$dataTwo) {
        $guestLog = array(
            'lvlAccess'             => $this->session->userdata('level'),
            'username'                 => $this->session->userdata('mail'),	
            'dateLog'               => date('Y-m-d'), 	
            'keteranganLog'         => 'Berhasil mengirimkan permohonan. Kode Transaksi : '. $dataOne['id_pemohonPE'],
        );

        $this->db->insert('tb_pemohon', $dataOne);
        $this->db->insert('tb_dokumen', $dataTwo);
        $this->db->insert('tb_log', $guestLog);
    }

    function removePermohonan($id) {

        $path = './public/lampiran/';

        $this->db->where('id_pemohonPE', $id);
        $response = $this->db->get('tb_pemohon')->row();

        $guestLog = array(
            'lvlAccess'             => $this->session->userdata('level'),
            'username'              => $this->session->userdata('mail'),	
            'dateLog'               => date('Y-m-d'), 	
            'keteranganLog'         => 'Data dengan berkas nama pekerjaan '.ucwords($response->nama_pkjPE).' dengan serial id ('.$response->id_pemohonPE.') yang diajukan pada tanggal '.$response->updateDatePE.' telah dihapus.',
        );

        $this->db->insert('tb_log', $guestLog);

        unlink($path.$response->timtah_pelakPE);
        unlink($path.$response->skp_straPE);
        unlink($path.$response->s_permohonanPE);
        sleep(1);
        $this->db->where('id_pemohonPE', $id);
        return $this->db->delete('tb_pemohon');
        $this->db->where('id_dokumenDO', $response->dokumen_idPE);
        return $this->db->delete('tb_dokumen');
        
    }

    function getAllPekerjaan() {
        $this->db->order_by('updateDatePR', 'DESC');
        return $this->db->get('tb_progress_pekerjaan');
    }

    function insertProgress($dataOne){
        $this->db->where('pemohon_idPR	', $dataOne['pemohon_idPR']);
        $dataSet    = $this->db->get('tb_progress_pekerjaan');
        $result     = $dataSet->row();

        if ($result == NULL) {
             $this->db->insert('tb_progress_pekerjaan', $dataOne);  
        }else {
             $setDatas = array(
                'rcn_progPR'        => $dataOne['rcn_progPR'],	
                'rl_progPR'         => $dataOne['rl_progPR'],	
                'deviasiPR'         => $dataOne['deviasiPR'],	
                'rl_keuanPR'        => $dataOne['rl_keuanPR'],	
                'lp_bulanPR'        => $dataOne['lp_bulanPR'],		
                'waktuPR'           => $dataOne['waktuPR'],
                'it_pkjPR'          => $dataOne['it_pkjPR'],	
                'updateDatePR'      => $dataOne['updateDatePR'],	
            );
            
            $this->db->where('pemohon_idPR	', $dataOne['pemohon_idPR']);	
            $this->db->update('tb_progress_pekerjaan', $setDatas);
        }
        $guestLog = array(
            'lvlAccess'             => $this->session->userdata('level'),
            'username'              => $this->session->userdata('mail'),	
            'dateLog'               => date('Y-m-d'), 	
            'keteranganLog'         => 'Berhasil melakukan update progress pekerjaan. Kode Transaksi : '. $dataOne['pemohon_idPR'],
        );
        $this->db->insert('tb_log', $guestLog);
        sleep(1);
        $this->db->where('pemohon_idPR	', $dataOne['pemohon_idPR']);
        $getData = $this->db->get('tb_progress_pekerjaan')->row();
        $dataTwo = array(
            'idProgress'            => $getData->id_progPR,
            'rcnProgress'           => $dataOne['rcn_progPR'],
            'rlProgress'            => $dataOne['rl_progPR'],
            'deviasiProgress'       => $dataOne['deviasiPR'],
            'rlKeuangan'            => $dataOne['rl_keuanPR'],
            'lpBulanan'             => $dataOne['lp_bulanPR'],
            'fotoPekerjaan'         => $dataOne['it_pkjPR'],
            'timeDateTrack'         => $dataOne['waktuPR'],
            'updateDateTrack'       => date('Y-m-d')
        );

        
        // echo "<pre>";
        // var_dump($dataTwo);
        // echo "</pre>";
        // die();
        $this->db->insert('tb_trackprogress', $dataTwo);



    }

    function getTrackByIdProgress($idProgress) {
        $this->db->join('tb_progress_pekerjaan', 'tb_progress_pekerjaan.id_progPR = tb_trackprogress.idProgress');
        $this->db->where('tb_trackprogress.idProgress', $idProgress);
        return $this->db->get('tb_trackprogress');
    }

    
    function getPekerjaanDone() {
        $this->db->join('tb_pemohon', 'tb_pemohon.status_idPE = tb_status.id_statusST');
        $this->db->join('tb_dokumen', 'tb_dokumen.id_dokumenDO = tb_pemohon.dokumen_idPE');
        $this->db->where('tb_dokumen.jns_dokDO', 'selesai');
        $this->db->where('tb_pemohon.asal_satkerPE', $this->session->userdata('nama_satker') );
        
        return $this->db->get('tb_status');
    }

    function saveSurvey($data,$id) {
        $idSurvey = 'IDS-'.time();
        $data['idSurvey'] = $idSurvey;
        $this->db->insert('tb_survey', $data);
        $this->db->where('id_statusST', $id);
        $update['surveyIdST'] = $idSurvey;
        $this->db->update('tb_status', $update);
        
        
        
    }

    function checkSurvey($id) {
        $this->db->where('statusIdS', $id);
        return $this->db->get('tb_survey')->num_rows();
        
        
    }
    
}



