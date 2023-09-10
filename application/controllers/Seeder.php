<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeder extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

public function index($jumlah)
    {
        $uniqueDok = 'DOK-'.time();
        $uniquePe =  'PEM-'.time();
        $date = date('Y-m-d');

        for ($i=0; $i < $jumlah ; $i++) { 
            $dataDokumen = array(
                'id_dokumenDO' => $uniqueDok.$i,
                'updateDateDO' => $date 
            );
            $this->db->insert('tb_dokumen', $dataDokumen);
            // sleep(1);

            $dataPemohon = array(
                'id_pemohonPE'  => $uniquePe.$i,
                'status_idPE'   => '',
                'dokumen_idPE'  => $uniqueDok.$i,
                'asal_satkerPE' => 'guest',
                'nama_pkjPE'    => 'Data ' . $i,
                'sumber_pbyPE'  => 'APBN',
                'pagu_aggPE'    => '279729347923874',
                'nil_kontrakPE' => '1000000000000',
                'jw_StartpelaksanaanPE' => $date ,
                'jw_EndpelaksanaanPE' => $date ,
                'lokasi_pkjPE'  => 'banda aceh',
                'timtah_pelakPE' => 'TIMELINE_TAHAPAN_PELAKSANAAN_38965873086.pdf',
                't_berjalanPE'  => 'Gag tau',
                'skp_straPE'     => 'SURAT_KEPUTUSAN_PROYEK_38965873086.pdf',
                'pp_keberPE'    => 'Jekwkejwkjekwje',
                's_permohonanPE' => 'SURAT_PERMOHONAN_38965873086.pdf',
                'updateDatePE'  => $date 
            );
            $this->db->insert('tb_pemohon', $dataPemohon);
            // sleep(1);
        }

        $this->session->set_flashdata('success', 'Sudah Import Sebanyak '.$jumlah.' Data');
        redirect('/','refresh');
    }
}

/* End of file Seeder.php and path \application\controllers\Seeder.php */
