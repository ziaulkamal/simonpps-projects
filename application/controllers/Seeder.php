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

    $namaDinas = ['dinas pertanian', 'dinas perikanan', 'dinas penerbangan', 'dinas komunikasi', 'dinas pajak', 'dinas PU'];
    $lokasiPkj = ['Banda Aceh', 'Aceh Besar', 'Sabang', 'Sigli', 'Bireun', 'Lhokseumawe', 'Tapak Tuan'];

    for ($i=0; $i < $jumlah ; $i++) { 
        $dataDokumen = array(
            'id_dokumenDO' => $uniqueDok.$i,
            'updateDateDO' => $date 
        );
        $this->db->insert('tb_dokumen', $dataDokumen);
        // sleep(1);

        // Mendapatkan asal satker dan lokasi secara acak
        $randomDinasIndex = array_rand($namaDinas);
        $asalSatker = $namaDinas[$randomDinasIndex];

        $randomLokasiIndex = array_rand($lokasiPkj);
        $lokasiPkjPE = $lokasiPkj[$randomLokasiIndex];

        // Generate nilai acak antara 100 juta dan 1 miliar
        $pagu_aggPE = mt_rand(100000000, 1000000000);
        $nil_kontrakPE = mt_rand(100000000, 1000000000);

        // Membuat nama_pkjPE dengan format yang diinginkan
        $nama_pkjPE = 'Proyek Berkas'. $asalSatker .'untuk pembangunan di'.$lokasiPkjPE;

        $dataPemohon = array(
            'id_pemohonPE'      => $uniquePe.$i,
            'status_idPE'       => '',
            'dokumen_idPE'      => $uniqueDok.$i,
            'asal_satkerPE'     => $asalSatker,
            'nama_pkjPE'        => $nama_pkjPE,
            'sumber_pbyPE'      => 'APBN',
            'pagu_aggPE'        => $pagu_aggPE, // Menggunakan nilai acak untuk pagu_aggPE
            'nil_kontrakPE'     => $nil_kontrakPE, // Menggunakan nilai acak untuk nil_kontrakPE
            'jw_StartpelaksanaanPE' => $date ,
            'jw_EndpelaksanaanPE' => $date ,
            'lokasi_pkjPE'      => $lokasiPkjPE,
            'timtah_pelakPE'    => 'SAMPLE__1.pdf',
            't_berjalanPE'      => 'Persiapan Berkas',
            'skp_straPE'        => 'SAMPLE__2.pdf',
            'pp_keberPE'        => 'Example',
            's_permohonanPE'    => 'SAMPLE__3.pdf',
            'updateDatePE'      => $date 
        );
        $this->db->insert('tb_pemohon', $dataPemohon);
        // sleep(1);
    }

    $this->session->set_flashdata('success', 'Sudah Import Sebanyak '.$jumlah.' Data');
    redirect('/','refresh');
}

}

/* End of file Seeder.php and path \application\controllers\Seeder.php */
