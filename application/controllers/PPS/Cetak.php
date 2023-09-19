<?php 

require_once FCPATH . 'vendor/autoload.php';

class Cetak extends CI_Controller {

    public function index()
    {

        $this->load->model('PPS/Main_model','pps');

        $data['data'] = $this->pps->getPekerjaanDone()->result();
        // Load MPDF
        $mpdf = new \Mpdf\Mpdf();

          // Membuat konten PDF
          $html = '<!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Document</title>
          </head>
          <body>
          <table border="1" cellpadding="10" cellspacing="0">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Satuan Kerja</th>
                  <th>Nama Pekerjaan</th>
                  <th>Status</th>
                  <th>Tanggal</th>
              </tr>
          </thead>
          <tbody>';
  
          $no = 1;
          foreach ($data['data'] as $res) {
              $html .= '<tr>
                  <td>' . $no++ . '</td>
                  <td>' . ucwords($res->asal_satkerPE) . '</td>
                  <td>' . ucwords($res->nama_pkjPE) . '</td>
                  <td>';
              if ($res->outputSts == 2) {
                  $html .= "Pekerjaan Diberhentikan";
              } elseif ($res->outputSts == 1) {
                  $html .= "Pekerjaan Selesai Tuntas";
              }
              $html .= '</td>
                  <td>' . $res->updateDateST . '</td>
              </tr>';
          }
  
          $html .= '</tbody>
          </table>
          </body>
          </html>';
 


        // Tulis konten HTML ke PDF
        $mpdf->WriteHTML($html);
        // Output PDF ke browser atau simpan ke file
        $mpdf->Output('hello_world.pdf', 'I'); // 'I' untuk menampilkan PDF di browser
    }

}


?>