<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Admin/Model_admin_model', 'main');
        
    
    }
    
    function index()
    {    
        if ( $this->session->userdata('masuk') != TRUE ) {
            // $this->session->set_flashdata('err', 'User Atau Password Salah');
            redirect('auth','refresh');
            
        }   
        $count = $this->main->result_done()->result();
$countSurvey = $this->main->survey_done()->result();

$survey_count = array();
foreach ($countSurvey as $items) {
    $ratingNum = $items->ratingNum;
    if (isset($survey_count[$ratingNum])) {
        $survey_count[$ratingNum]++;
    } else {
        $survey_count[$ratingNum] = 1;
    }
}

$categories_s = array_keys($survey_count);
$data_values_s = array_values($survey_count);

// Menambahkan awalan pada setiap elemen di $categories_s
$categories_s = array_map(function($category) {
    return "Rating Nilai $category";
}, $categories_s);



        $asal_satkerPE_counts = array();
        foreach ($count as $item) {
            $asal_satker = $item->asal_satkerPE;
            if (isset($asal_satkerPE_counts[$asal_satker])) {
                $asal_satkerPE_counts[$asal_satker]++;
            } else {
                $asal_satkerPE_counts[$asal_satker] = 1;
            }
        }
        $categories = array_keys($asal_satkerPE_counts);
        $data_values = array_values($asal_satkerPE_counts);


        $data = array(
            'title' => 'Home',
            'pages' => 'pages/dashboard',
            'dashboard' => TRUE,
            'label_satker' => $categories,
            'nilai_satker' => $data_values,
            'label_survey' => $categories_s,
            'nilai_survey' => $data_values_s
        );
        $this->load->view('main', $data);   
    }

    function error()
    {
        $data = array(
            'title' => '404 not found',
            'pages' => 'pages/404'
        );
        $this->load->view('pages/404', $data);
    }

    function landingPage()
    {
        
        $count = $this->main->result_done()->result();
$countSurvey = $this->main->survey_done()->result();

$survey_count = array();
foreach ($countSurvey as $items) {
    $ratingNum = $items->ratingNum;
    if (isset($survey_count[$ratingNum])) {
        $survey_count[$ratingNum]++;
    } else {
        $survey_count[$ratingNum] = 1;
    }
}

$categories_s = array_keys($survey_count);
$data_values_s = array_values($survey_count);

// Menambahkan awalan pada setiap elemen di $categories_s
$categories_s = array_map(function($category) {
    return "Rating Nilai $category";
}, $categories_s);



        $asal_satkerPE_counts = array();
        foreach ($count as $item) {
            $asal_satker = $item->asal_satkerPE;
            if (isset($asal_satkerPE_counts[$asal_satker])) {
                $asal_satkerPE_counts[$asal_satker]++;
            } else {
                $asal_satkerPE_counts[$asal_satker] = 1;
            }
        }
        $categories = array_keys($asal_satkerPE_counts);
        $data_values = array_values($asal_satkerPE_counts);


        $data = array(
            'title' => 'SIMON - PPS',
            'landingPage' => TRUE,
            'label_satker' => $categories,
            'nilai_satker' => $data_values,
            'label_survey' => $categories_s,
            'nilai_survey' => $data_values_s
        );

        $this->load->view('pages/landing-page', $data);
        
    }

}


?>