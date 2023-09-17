<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Export_pdf extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load TCPDF library
        $this->load->library('tcpdf');
        $this->load->model('PPS/Main_model','pps');
    }

    public function exportData() {
        // Load data from your model
        $data = $this->pps->getPekerjaanDone();

        // Create a new PDF document
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Data Export');
        $pdf->AddPage();

        // Customize PDF content
         // Define your HTML content
    $html = '<table>';
    $html .= '<tr><th>Asal Satker</th><th>Nama Pekerjaan</th><th>Status</th><th>Action</th></tr>';

    foreach ($data as $res) {
            $html .= '<tr>';
            $html .= '<td>' . ucwords($res->asal_satkerPE) . '</td>';
            $html .= '<td>' . ucwords($res->nama_pkjPE) . '</td>';
            $html .= '<td>';
            if ($res->outputSts == 2) {
                $html .= "Pekerjaan Diberhentikan";
            } elseif ($res->outputSts == 1) {
                $html .= "Pekerjaan Selesai Tuntas";
            }
            $html .= '</td>';
            $html .= '<td>';
            if ($res->outputSts == 2) {
                $html .= '<a href="' . base_url('pps/pekerjaan/diselesaikan/' . $res->IN16ST) . '" class="btn btn-outline-info btn-air-info btn-xs">IN.16</a>';
            } elseif ($res->outputSts == 1) {
                $html .= '<a href="' . base_url('public/lampiran/' . $res->IN17ST) . '" target="_blank" class="btn btn-outline-info btn-air-info btn-xs">IN.17</a>';
                $html .= '<a href="' . base_url('public/lampiran/' . $res->IN2ST) . '" target="_blank" class="btn btn btn-outline-danger btn-air-danger btn-xs">IN.2</a>';
            }
            $html .= '</td>';
            $html .= '</tr>';
        }

            $html .= '</table>';

            // Write HTML content to PDF
            $pdf->writeHTML($html, true, false, true, false, '');

            // Output the PDF as a file or inline
            $pdf->Output('data_export.pdf', 'I');
    }

}

