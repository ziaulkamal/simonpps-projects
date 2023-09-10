<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PPS/Main_model','pps');
        
    }

    public function index()
    {

    }

    /**
     * Method list_permohonan
     * Menampilkan semua list permohonan
     * @return void
     */
    function list_permohonan() {
        $load = $this->pps->getAllPermohonan()->result();
        
        $data = array(
            'title'     => 'Daftar Permohonan',
            'pageTitle' => 'Daftar Permohonan',
            'pages'     => 'pages/pps/daftar_permohonan',
            'dataTable' => TRUE,
            'data'      => $load
        );
        $this->load->view('main', $data);
    }

    function create_permohonan($id) {
        $load = $this->pps->getPermohonanById($id)->row();
        $data = array(
            'title'     => 'Tindak Lanjuti Permohonan',
            'pageTitle' => 'Tindak Lanjuti Permohonan',
            'pages'     => 'pages/pps/tindak_permohonan',
            'action'    => 'pps/permohonan/process/'.$id,
            'data'      => $load
        );
        $this->load->view('main', $data);
    }

    function process_permohonan($id) {
        $undangan = $_FILES['ud_pprDO']['name'];
        $uniqueFile = (date('s')*time())-date('Y');

        if (empty($undangan)) {
            $this->session->set_flashdata('err', 'Pastikan file undangan telah di upload dengan benar !');
            $this->create_permohonan($id);
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

            $data = array(
                'pkj_namaDO' => $this->input->post('nama_pekerjaan'),
                'updateDateDO' => date('Y-m-d')  
            );

            // Process uploads for each file
            if (!empty($undangan)) {
                if ($this->upload->do_upload('ud_pprDO')) {
                    $data_file = $this->upload->data();
                    $getFileOne = pathinfo($data_file['file_name']);
                    $data['ud_pprDO'] = 'UNDANGAN_PEMAPARAN_'.$uniqueFile.'.'.$getFileOne['extension'];
                    rename($data_file['full_path'], './public/lampiran/'.$data['ud_pprDO']);
                }
            }

            $this->pps->insertPermohonan($data, $id);
            $this->session->set_flashdata('success', 'Dokumen dengan nama pekerjaan '. $data['pkj_namaDO'].' sudah ditindak lanjuti !');
            redirect('pps/permohonan');
        }

    }

    function approve_permohonan($id) {
        $load = $this->pps->getPermohonanById($id)->row();   
        $data = array(
            'title' => 'Kirim Dokumen [Persetujuan]',
            'pageTitle' => 'Kirim Dokumen Untuk Persetujuan',
            'pages' => 'pages/pps/approve_permohonan',
            'action' => 'pps/permohonan/setuju/process/'.$id,
            'data'      => $load
        );

        $this->load->view('main', $data);
    }

    function process_approve($id) {
        $IN13DO = $_FILES['IN13DO']['name'];
        $IN2DO = $_FILES['IN2DO']['name'];
        $uniqueFile = (date('s')*time())-date('Y');

        if (empty($IN13DO) || empty($IN2DO)) {
            $this->session->set_flashdata('err', 'Pastikan file IN.3 dan IN.2 telah di upload dengan benar !');
            $this->approve_permohonan($id);
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
            $nm_pekerjaan = $this->input->post('nama_pekerjaan');
            
            $data['updateDateDO'] = date('Y-m-d');

            // Process uploads for each file
            if (!empty($IN13DO)) {
                if ($this->upload->do_upload('IN13DO')) {
                    $data_file = $this->upload->data();
                    $getFileOne = pathinfo($data_file['file_name']);
                    $data['IN13DO'] = 'IN13DO_FILE_'.$uniqueFile.'.'.$getFileOne['extension'];
                    rename($data_file['full_path'], './public/lampiran/'.$data['IN13DO']);
                }
            }
            // Process uploads for each file
            if (!empty($IN2DO)) {
                if ($this->upload->do_upload('IN2DO')) {
                    $data_file = $this->upload->data();
                    $getFileOne = pathinfo($data_file['file_name']);
                    $data['IN2DO'] = 'IN2DO_FILE_'.$uniqueFile.'.'.$getFileOne['extension'];
                    rename($data_file['full_path'], './public/lampiran/'.$data['IN2DO']);
                }
            }

            $this->pps->approvePermohonan($data, $id);
            $this->session->set_flashdata('success', 'Dokumen dengan nama pekerjaan '. $nm_pekerjaan.' sudah disetujui !');
            redirect('pps/permohonan');
        }

    }

    function reject_permohonan($id) {
        $load = $this->pps->getPermohonanById($id)->row();
        $data = array(
            'title' => 'Kirim Dokumen [Penolakan]',
            'pageTitle' => 'Kirim Dokumen Untuk Penolakan',
            'pages' => 'pages/pps/cancel_permohonan',
            'action' => 'pps/permohonan/tolak/process/'.$id,
            'data'      => $load
        );

        $this->load->view('main', $data);
    }

    function process_reject($id) {
        $IN14DO = $_FILES['IN14DO']['name'];
        $uniqueFile = (date('s')*time())-date('Y');
        if (empty($IN14DO)) {
            $this->session->set_flashdata('err', 'Pastikan file IN.14 telah di upload dengan benar !');
            $this->reject_permohonan($id);
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

            $data['updateDateDO'] = date('Y-m-d');
            $nm_pekerjaan = $this->input->post('nama_pekerjaan');

            // Process uploads for each file
            if (!empty($IN14DO)) {
                if ($this->upload->do_upload('IN14DO')) {
                    $data_file = $this->upload->data();
                    $getFileOne = pathinfo($data_file['file_name']);
                    $data['IN14DO'] = 'IN14DO_FILE_'.$uniqueFile.'.'.$getFileOne['extension'];
                    rename($data_file['full_path'], './public/lampiran/'.$data['IN14DO']);
                }
            }


            $this->pps->rejectPermohonan($data, $id);
            $this->session->set_flashdata('success', 'Dokumen dengan nama pekerjaan '. $nm_pekerjaan.' sudah ditolak !');
            redirect('pps/permohonan');
        }

    }

    function list_progress() {
        $load =  $this->pps->getAllPekerjaan()->result();
        // $load_progress = $this->guest->getTrackByIdProgress();
        $data = array(
            'title'         => 'Daftar Progress Bulanan',
            'pageTitle'     => 'Daftar Progress Pekerjaan Bulanan',
            'pages'         => 'pages/pps/daf_progress',
            'dataTable'     => TRUE,
            'data'          => $load,
            // 'dataTrack'     => $load_progress
        );    

        $this->load->view('main', $data);
    }

    function complete_pekerjaan($id) {
        $load = $this->pps->getPermohonanById($id)->row();   
        $data = array(
            'title'         => 'Nyatakan Selesai',
            'pageTitle'     => 'Nyatakan Pekerjaan Ini Selesai ['.$load->nama_pkjPE.']',
            'pages'         => 'pages/pps/complete_pekerjaan',
            'action'        => 'pps/pekerjaan/diselesaikan/process/'.$id,
            'data'          => $load
        );

        $this->load->view('main', $data);  
    }

    function process_complete($id) {
        $IN17ST = $_FILES['IN17ST']['name'];
        $IN2ST = $_FILES['IN2ST']['name'];
        $uniqueFile = (date('s')*time())-date('Y');
        $this->form_validation->set_rules('pes_pebST', 'Pesan', 'trim|required',array( 'required' => '%s harus di isi !' ));
        
        
        if (empty($IN17ST) || empty($IN2ST)) {
            $this->session->set_flashdata('err', 'Pastikan file IN.17 dan IN.2 telah di upload dengan benar !');
            $this->complete_pekerjaan($id);
        }elseif ($this->form_validation->run() == FALSE) {
            $this->complete_pekerjaan($id);
        } else{
            $config = array(
                'allowed_types' => 'pdf|docx|doc|odt',
                'max_size'      => 10000,
                'overwrite'     => TRUE,
                'upload_path'   => './public/lampiran/',
                'encrypt_name'  => FALSE,
            );

            // $this->load->library('upload');
            $this->upload->initialize($config);
            // Process uploads for each file
            if (!empty($IN17ST)) {
                if ($this->upload->do_upload('IN17ST')) {
                    $data_file = $this->upload->data();
                    $getFileOne = pathinfo($data_file['file_name']);
                    $data['IN17ST'] = 'IN17ST_FILE_'.$uniqueFile.'.'.$getFileOne['extension'];
                    rename($data_file['full_path'], './public/lampiran/'.$data['IN17ST']);
                }
            }
            // Process uploads for each file
            if (!empty($IN2ST)) {
                if ($this->upload->do_upload('IN2ST')) {
                    $data_file = $this->upload->data();
                    $getFileOne = pathinfo($data_file['file_name']);
                    $data['IN2ST'] = 'IN2ST_FILE_'.$uniqueFile.'.'.$getFileOne['extension'];
                    rename($data_file['full_path'], './public/lampiran/'.$data['IN2ST']);
                }
            }
            $data['pes_pebST'] = $this->input->post('pes_pebST');
            $nm_pekerjaan = $this->input->post('nama_pekerjaan');
            
            $this->pps->saveCompletePekerjaan($data, $id);
            $this->session->set_flashdata('success', 'Dokumen dengan nama pekerjaan '. $nm_pekerjaan.' sudah dinyatakan selesai karena diselesaikan !');
            redirect('pps/pekerjaan');
        }

    }

    function incomplete_pekerjaan($id) {
        $load = $this->pps->getPermohonanById($id)->row();   
        $data = array(
            'title'         => 'Nyatakan Pekerjaan Dihentikan',
            'pageTitle'     => 'Nyatakan Pekerjaan Ini Dihentikan ['.$load->nama_pkjPE.']',
            'pages'         => 'pages/pps/incomplete_pekerjaan',
            'action'        => 'pps/pekerjaan/diberhentikan/process/'.$id,
            'data'          => $load
        );

        $this->load->view('main', $data);  
    }

    function process_incomplete($id) {
        $IN16ST = $_FILES['IN16ST']['name'];
        $uniqueFile = (date('s')*time())-date('Y');
        $this->form_validation->set_rules('pes_pebST', 'Pesan', 'trim|required',array( 'required' => '%s harus di isi !' ));

        if (empty($IN16ST)) {
            $this->session->set_flashdata('err', 'Pastikan file IN.16 telah di upload dengan benar !');
            $this->incomplete_pekerjaan($id);
        }elseif ($this->form_validation->run() == FALSE) {
           $this->incomplete_pekerjaan($id);
        }
        else {
            $config = array(
                'allowed_types' => 'pdf|docx|doc|odt',
                'max_size'      => 10000,
                'overwrite'     => TRUE,
                'upload_path'   => './public/lampiran/',
                'encrypt_name'  => FALSE,
            );

            // $this->load->library('upload');
            $this->upload->initialize($config);

            // Process uploads for each file
            if (!empty($IN16ST)) {
                if ($this->upload->do_upload('IN16ST')) {
                    $data_file = $this->upload->data();
                    $getFileOne = pathinfo($data_file['file_name']);
                    $data['IN16ST'] = 'IN16ST_FILE_'.$uniqueFile.'.'.$getFileOne['extension'];
                    rename($data_file['full_path'], './public/lampiran/'.$data['IN16ST']);
                }
            }
            // Process uploads for each file
            $data['pes_pebST'] = $this->input->post('pes_pebST');
            $nm_pekerjaan = $this->input->post('nama_pekerjaan');

            $this->pps->saveIncompletePekerjaan($data, $id);
            $this->session->set_flashdata('success', 'Dokumen dengan nama pekerjaan '. $nm_pekerjaan.' sudah dinyatakan selesai karena dihentikan !');
            redirect('pps/pekerjaan');
        }

    }


    function pekerjaan_done() {
        $load = $this->pps->getPekerjaanDone()->result();

        $data = array(
            'title'         => 'Daftar Pekerjaan Selesai',
            'pageTitle'     => 'Daftar Pekerjaan Selesai',
            'pages'         => 'pages/pps/pekerjaan_selesai',
            'dataTable'     => TRUE,
            'data'          => $load,
            // 'dataTrack'     => $load_progress
        );    

        $this->load->view('main', $data);
    }

    function _rules($rules) {
        switch ($rules) {
            case 'create_permohonan':
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }

}

/* End of file Main_controller.php and path \application\controllers\PPS\Main_controller.php */
