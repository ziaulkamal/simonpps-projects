<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Main';

// admin user 
$route['list_user']                                 =  'Admin/Main_controller/view_user';
$route['buat_user']                                 =  'Admin/Main_controller/create_user';
$route['buat_user/process']                         =  'Admin/Main_controller/save_user';
$route['user/aktivasi/(:any)']                      = 'Admin/Main_controller/activated_user/$1';
$route['user/hapus/(:any)']                         = 'Admin/Main_controller/delete_user/$1';

// auth
$route['auth']                                      = 'Auth/login';
$route['auth/login']                                = 'Auth/login_process';
$route['auth/logout']                               = 'Auth/logout';
$route['clear_db']                                  = 'Auth/clear_db';


// guest user 
$route['guest/permohonan']                          = 'Guest/Main_controller/list_permohonan';
$route['guest/permohonan/create']                   = 'Guest/Main_controller/create_permohonan';
$route['guest/permohonan/process']                  = 'Guest/Main_controller/process_permohonan';
$route['guest/permohonan/delete/(:any)']            = 'Guest/Main_controller/delete_permohonan/$1';

$route['guest/pekerjaan']                           = 'Guest/Main_controller/list_pekerjaan';
$route['guest/pekerjaan/create/(:any)']             = 'Guest/Main_controller/create_progress/$1';
$route['guest/pekerjaan/process/(:any)']            = 'Guest/Main_controller/progress_process/$1';


$route['guest/arsip_berkas']                        = 'Guest/Main_controller/list_message/';
$route['guest/pekerjaan/selesai']                   = 'Guest/Main_controller/pekerjaan_done/';
$route['guest/pekerjaan/sendSurvey/(:any)']         = 'Guest/Main_controller/sendSurvey/$1';



//pps User

$route['pps/permohonan']                            = 'PPS/Main_controller/list_permohonan';
$route['pps/permohonan/create/(:any)']              = 'PPS/Main_controller/create_permohonan/$1';
$route['pps/permohonan/process/(:any)']             = 'PPS/Main_controller/process_permohonan/$1';
$route['pps/permohonan/setuju/(:any)']              = 'PPS/Main_controller/approve_permohonan/$1';
$route['pps/permohonan/setuju/process/(:any)']      = 'PPS/Main_controller/process_approve/$1';
$route['pps/permohonan/tolak/(:any)']               = 'PPS/Main_controller/reject_permohonan/$1';
$route['pps/permohonan/tolak/process/(:any)']       = 'PPS/Main_controller/process_reject/$1';
$route['pps/pekerjaan']                             = 'PPS/Main_controller/list_progress';
$route['pps/pekerjaan/diselesaikan/(:any)']         = 'PPS/Main_controller/complete_pekerjaan/$1';
$route['pps/pekerjaan/diberhentikan/(:any)']        = 'PPS/Main_controller/incomplete_pekerjaan/$1';
$route['pps/pekerjaan/diselesaikan/process/(:any)'] = 'PPS/Main_controller/process_complete/$1';
$route['pps/pekerjaan/diberhentikan/process/(:any)']= 'PPS/Main_controller/process_incomplete/$1';

$route['pps/pekerjaan/selesai']                     = 'PPS/Main_controller/pekerjaan_done/';


$route['dummy/(:any)']                              = 'Seeder/index/$1';

// // satker or guest
// $route['daftar_permohonan'] = 'View_controller/guest_view';
// $route['daftar_progress'] = 'View_controller/daftarProgress_view';
// $route['permohonan/kirim_progress/(:any)'] = 'Update_controller/sendProgress/$1';
// $route['pesan/pesan_masuk'] = 'View_controller/guestPesan_view';
// $route['progress/send_progress/(:any)'] = 'Update_controller/update_process_progress/$1';
// $route['permohonan/add_document'] = 'Insert_controller/create_permohonan';
// $route['permohonan/pro/save_doc'] = 'Insert_controller/prosessPermohonan';

// // seksi-pps
// $route['seksi-pps/daftar_permohonan'] = 'View_controller/seksiPps_view';
// $route['seksi-pps/daftar_progress'] = 'View_controller/daftarProgress_Pps';
// $route['progress/kirim_pemberitahuan'] = 'Insert_controller/approveProg';
// $route['permohonan/tindak_lanjuti/(:any)'] = 'Update_controller/tindakPermohonan/$1';
// $route['permohonan/terima/(:any)'] = 'Update_controller/approvePermohonan/$1';
// $route['permohonan/tolak/(:any)'] = 'Update_controller/cancelPermohonan/$1';
// $route['permohonan/pro/tindak_lanjuti/(:any)'] = 'Update_controller/processTindak/$1';
// $route['permohonan/pro/approve/(:any)'] = 'Update_controller/processApprove/$1';
// $route['permohonan/pro/cancel/(:any)'] = 'Update_controller/processCancel/$1';



// $route['download/(:any)'] = 'Update_controller/download_berkas/$1';


// // admin
// $route['daftar_user'] = 'Insert_controller/create_user';
// $route['list_user'] = 'View_controller/list_user';
// $route['admin/go/process'] = 'Insert_controller/process_create_user';
// $route['process_register'] = 'Insert_controller/process_register';
// $route['aktivasi/(:any)'] = 'Insert_controller/aktivasi_akun/$1';
// $route['delete/(:any)'] = 'Update_controller/delete/$1';

// // 404
// $route['404'] = 'Main/error';


// //Zia Routes
// $route['guest/form_permohonan'] = 'Guest/Insert_controller/form_permohonan';
// $route['guest/form_permohonan/send'] = 'Guest/Insert_controller/permohonan_process';


$route['404_override'] = '/';
$route['translate_uri_dashes'] = FALSE;
