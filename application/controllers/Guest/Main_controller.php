<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guest/Main_model','guest');
        $this->load->model('Auth_model','auth');
        
        // Periksa csrf, jika terjadi error, arahkan ke halaman beranda
        if (($this->session->userdata('id_level') !=3) || $this->session->userdata('masuk') != TRUE ) {
            if ($this->auth->checkUser($this->session->userdata('mail')) != 1) {
                $this->session->set_flashdata('err', 'Anda tidak dibenarkan akses fitur ini !');
                redirect('auth/logout','refresh');
            }
            
            redirect('auth/logout','refresh');
            
        }
    }

    /**
     * Method list_permohonan
     * Menampilkan semua list permohonan
     * @return void
     */
    function list_permohonan() {
        $load = $this->guest->getAllPermohonan()->result();
        
        $data = array(
            'title'     => 'Daftar Permohonan',
            'pageTitle' => 'Daftar Permohonan',
            'pages'     => 'pages/guest/daftar_permohonan',
            'dataTable' => TRUE,
            'data'      => $load
        );
        $this->load->view('main', $data);
    }
    
    /**
     * Method create_permohonan
     * form pengajuan permohonan
     * @return void
     */
    function create_permohonan() {
        $data = array(
            'title'     => 'Daftar Permohonan',
            'pageTitle' => 'Daftar Permohonan',
            'pages'     => 'pages/guest/create_permohonan',
            'action'    => 'guest/permohonan/process'
        );
        $this->load->view('main', $data);
    }
    
    /**
     * Method process_permohonan
     * Proses Penyimpanan Permohonan
     * @return void
     */
    function process_permohonan() {
         $data = $this->input->post();
        
        $this->_rules('create_permohonan');
        $uniqueId = time().date('Y');
        $uniqueFile = (date('s')*time())-date('Y');

        $file_1 = $_FILES['timtah_pelakPE']['name'];
        $file_2 = $_FILES['skp_straPE']['name'];
        $file_3 = $_FILES['s_permohonanPE']['name'];
        $nilaiPagu      = str_replace('.','',$this->input->post('pagu_anggaran'));
        $nilaiKontrak   = str_replace('.','',$this->input->post('nilai_kontrak'));
            
        if ($this->form_validation->run() == FALSE) {
            $this->create_permohonan();
        } elseif (empty($file_1) || empty($file_2) || empty($file_3)) {
            $this->session->set_flashdata('err', 'Pastikan ke 3 File pendukung telah di upload dengan benar');
            $this->create_permohonan();
        }else {
            
            $config = array(
                'allowed_types' => 'pdf|docx|doc|odt',
                'max_size'      => 10000,
                'overwrite'     => TRUE,
                'upload_path'   => './public/lampiran/',
                'encrypt_name'  => FALSE,
            );

            // $this->load->library('upload');
            $this->upload->initialize($config);

            $dataOne = array(
                'id_pemohonPE'          => 'PEM-'.$uniqueId,
                'dokumen_idPE'          => 'DOK-'.$uniqueId,
                'asal_satkerPE'         => strtolower($this->session->userdata('nama_satker')),
                'nama_pkjPE'            => ucwords($this->input->post('nama_pekerjaan')),
                'sumber_pbyPE'          => $this->input->post('sumber_pembiayaan'),
                'pagu_aggPE'            => $nilaiPagu,
                'nil_kontrakPE'         => $nilaiKontrak,
                'jw_StartpelaksanaanPE' => $this->input->post('jangka_waktu_start'),
                'jw_EndpelaksanaanPE'   => $this->input->post('jangka_waktu_end'),
                'lokasi_pkjPE'          => $this->input->post('lokasi_pekerjaan'),
                't_berjalanPE'          => ucfirst($this->input->post('tahapan_berjalan')),
                'pp_keberPE'            => ucfirst($this->input->post('potensi_pengaruh_keberhasilan')),
                'updateDatePE'          => date('Y-m-d')
            );

            $dataTwo = array(
                'id_dokumenDO'          => 'DOK-'.$uniqueId,
                'updateDateDO'          => date('Y-m-d')
            );


            // Process uploads for each file
            if (!empty($file_1)) {
                if ($this->upload->do_upload('timtah_pelakPE')) {
                    $data_file = $this->upload->data();
                    $getFileOne = pathinfo($data_file['file_name']);
                    $dataOne['timtah_pelakPE'] = 'TIMELINE_TAHAPAN_PELAKSANAAN_'.$uniqueFile.'.'.$getFileOne['extension'];
                    rename($data_file['full_path'], './public/lampiran/'.$dataOne['timtah_pelakPE']);
                }
            }

            if (!empty($file_2)) {
                if ($this->upload->do_upload('skp_straPE')) {
                    $data_file = $this->upload->data();
                    $getFileTwo = pathinfo($data_file['file_name']);
                    $dataOne['skp_straPE'] = 'SURAT_KEPUTUSAN_PROYEK_'.$uniqueFile.'.'.$getFileTwo['extension'];
                    rename($data_file['full_path'], './public/lampiran/'.$dataOne['skp_straPE']);
                }
            }

            if (!empty($file_3)) {
                if ($this->upload->do_upload('s_permohonanPE')) {
                    $data_file = $this->upload->data();
                    $getFileThree = pathinfo($data_file['file_name']);
                    $dataOne['s_permohonanPE'] = 'SURAT_PERMOHONAN_'.$uniqueFile.'.'.$getFileThree['extension'];
                    rename($data_file['full_path'], './public/lampiran/'.$dataOne['s_permohonanPE']);
                }
            }
                
                
            $save = $this->guest->insertPermohonan($dataOne,$dataTwo);
            $this->session->set_flashdata('success', 'Berhasil mengajukan permohonan dengan serial id ('.$dataOne['id_pemohonPE'].')');
            redirect('guest/permohonan');                
        }       
    }
    
    /**
     * Method delete_permohonan
     *
     * @param $id $id [explicite description]
     * Proses Hapus Permohonan
     * @return void
     */
    function delete_permohonan($id) {
        $this->guest->removePermohonan($id);
        $this->session->set_flashdata('success', 'Berhasil menghapus data !');
        redirect('guest/permohonan'); 
    }
    
    /**
     * Method list_pekerjaan
     * List Progress Pekerjaan
     * @return void
     */
    function list_pekerjaan() {
        $load =  $this->guest->getAllPekerjaan()->result();
        // $load_progress = $this->guest->getTrackByIdProgress();
        $data = array(
            'title'         => 'Daftar Progress Bulanan',
            'pageTitle'     => 'Daftar Progress Pekerjaan Bulanan',
            'pages'         => 'pages/guest/daf_progress',
            'dataTable'     => TRUE,
            'data'          => $load,
            // 'dataTrack'     => $load_progress
        );    

        $this->load->view('main', $data);
    }
    
    /**
     * Method create_progress
     *
     * @param $id $id [explicite description]
     * buat progress dan tambah progress
     * @return void
     */
    function create_progress($id) {
        $load = $this->guest->getPermohonanById($id)->row_array();
        if ($load['jns_dokDO'] == 'diterima') {
             $data = array(
                'title'         => 'Kirim Progress Bulanan',
                'pageTitle'     => 'Kirim Progress Pekerjaan Bulanan Untuk Data :<b>['.$load['id_pemohonPE'].']</b>',
                'pages'         => 'pages/guest/progress_pekerjaan',
                'data'          => $load,
            );    

            $this->load->view('main', $data);
        }else {
            $this->session->set_flashdata('err', 'Dokumen ini tidak dapat diproses karena status nya "'.ucwords($load['jns_dokDO']).'" !'); redirect('guest/permohonan'); 
        }
       
    }
    
    /**
     * Method progress_process
     *
     * @param $id $id [explicite description]
     *  Progress di update
     * @return void
     */
    function progress_process($id) {
        $this->_rules('create_progress');
        $sessions = $this->session->userdata('locale');
        $gambar = $_FILES['it_pkjPR']['name'];
        if ($this->form_validation->run() == FALSE) {
            $this->create_progress($id);
        } elseif(empty($gambar)) {
            $this->session->set_flashdata('err', 'Pastikan foto telah di upload dengan benar');
            $this->create_progress($id);
        }else {
            $path = './public/lampiran/'.$sessions.'/';
            if (!is_dir($path)) {
                // Jika folder belum ada, maka buat folder baru
                mkdir($path, 0777, true);
                $file_path = $path . 'index.php'; // Sesuaikan dengan nama file dan ekstensi yang Anda inginkan

                // Contoh membuat file teks
                $myfile = fopen($file_path, "w");
                fwrite($myfile, "<?php defined('BASEPATH') OR exit('No direct script access allowed'); \n // Silence Is Golden");
                fclose($myfile);
            }
            
            $config = array(
                'allowed_types' => 'jpeg|jpg|png',
                'max_size'      => 10000,
                'overwrite'     => TRUE,
                'upload_path'   => $path,
                'encrypt_name'  => FALSE,
            );

            // $this->load->library('upload');
            $this->upload->initialize($config);
            $dataOne = array(
                'pemohon_idPR'      => $id,	
                'pkj_namaPR'        => $this->input->post('nama_pekerjaan'),	
                'rcn_progPR'        => $this->input->post('rencana_progress'),	
                'rl_progPR'         => $this->input->post('realisasi_progress'),	
                'deviasiPR'         => $this->input->post('deviasi'),	
                'rl_keuanPR'        => str_replace('.','',$this->input->post('realisasi_keuangan')),	
                'lp_bulanPR'        => $this->input->post('laporan_bulanan'),		
                'waktuPR'           => $this->input->post('waktu'),	
                'updateDatePR'      => date('Y-m-d'),	
            );

            if (!empty($gambar)) {
                if ($this->upload->do_upload('it_pkjPR')) {
                    $data_file = $this->upload->data();
                    $getFileThree = pathinfo($data_file['file_name']);
                    $lokasiFile = 'FILE-'.time().'.'.$getFileThree['extension'];
                    $dataOne['it_pkjPR'] = $sessions.'/'.$lokasiFile;
                    rename($data_file['full_path'], $path.$lokasiFile);
                }
            }

            $this->guest->insertProgress($dataOne);
            $this->session->set_flashdata('success', 'Berhasil mengupdate progress pekerjaan untuk : '. ucwords($dataOne['pkj_namaPR']));
            redirect('guest/permohonan');    

        }
        
        
        
    }
    
    function list_message() {
        $load = $this->guest->getMessage()->result();
        
        $data = array(
            'title'     => 'Daftar Berkas',
            'pageTitle' => 'Manajemen Berkas',
            'pages'     => 'pages/guest/message',
            'dataTable' => TRUE,
            'data'      => $load
        );
        $this->load->view('main', $data);
    }
    
    function pekerjaan_done() {
        $load = $this->guest->getPekerjaanDone()->result();

        $data = array(
            'title'         => 'Daftar Pekerjaan Selesai',
            'pageTitle'     => 'Daftar Pekerjaan Selesai',
            'pages'         => 'pages/guest/pekerjaan_selesai',
            'dataTable'     => TRUE,
            'data'          => $load,
            // 'dataTrack'     => $load_progress
        );    

        $this->load->view('main', $data);
    }

    function sendSurvey($id) {
        // var_dump($this->input->post());
        // die();
        if ($this->guest->checkSurvey($id) < 1) {
            $msg = $this->input->post('masukan');
            $rating = $this->input->post('rating');
            
            if (!empty($msg)) {
                $data = array(
                    'statusIdS'     => $id,
                    'pesanMasukan'  => strtolower($msg),
                    'ratingNum'     => $rating,
                    'statusSurvey'  => 1,
                    'updateDaate'   => date('Y-m-d')
                );

                $this->guest->saveSurvey($data,$id);
                $this->session->set_flashdata('success', 'Terima kasih atas respon nya, Sekarang anda bisa mendownload file akhir ! ');
                redirect('guest/pekerjaan/selesai');  
            }else {
                $this->session->set_flashdata('err', 'Untuk membuka link download, anda harus mengisi survey dengan selesai ! ');
                redirect('guest/pekerjaan/selesai');  
            }
        }else {
           $this->session->set_flashdata('err', 'anda telah memberikan survey untuk pekerjaan ini ! ');
            redirect('guest/pekerjaan/selesai');  
        }
    }
    /**
     * Method _rules
     *
     * @param $rules $rules [explicite description]
     * Semua rules aturan form input
     * @return void
     */
    function _rules($rules) {
        switch ($rules) {
            case 'create_permohonan':
                $this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'trim|required|min_length[5]|max_length[50]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('sumber_pembiayaan', 'Sumber Pembiayaan', 'trim|required|min_length[4]|max_length[100]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('pagu_anggaran', 'Pagu Anggaran', 'trim|required|min_length[5]|max_length[50]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'trim|required|min_length[5]|max_length[50]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('jangka_waktu_start', 'Jangka Waktu Mulai', 'trim|required', array(
                    'required' => '%s wajib di isi !'
                ));
                $this->form_validation->set_rules('jangka_waktu_end', 'Jangka Waktu Berakhir', 'trim|required', array(
                    'required' => '%s wajib di isi !'));
                $this->form_validation->set_rules('lokasi_pekerjaan', 'Lokasi Pekerjaan', 'trim|required|min_length[5]|max_length[50]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('tahapan_berjalan', 'Tahapan Berjalan', 'trim|required|min_length[5]|max_length[50]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('potensi_pengaruh_keberhasilan', 'Potensi Pengaruh Keberhasilan', 'trim|required|min_length[5]|max_length[50]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));        
                break;

            case 'create_progress':
                $this->form_validation->set_rules('rencana_progress', 'Rencana Progress', 'trim|required|min_length[2]|max_length[4]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('realisasi_progress', 'Realisasi Progress', 'trim|required|min_length[2]|max_length[4]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('deviasi', 'Deviasi', 'trim|required|min_length[1]|max_length[4]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('realisasi_keuangan', 'Realisasi Keuangan', 'trim|required|min_length[5]|max_length[50]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('laporan_bulanan', 'Laporan Bulanan', 'trim|required|min_length[5]|max_length[50]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('waktu', 'Tanggal', 'trim|required',array(
                    'required' => '%s wajib di isi !',

                ));
                break;
                default:
                # code...
                break;
        }
        
    }
}

/* End of file Main_controller.php and path \application\controllers\Guest\Main_controller.php */
