<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Main';

$route['beranda'] = 'Main/landingPage';

// admin user 
$route['list_user']                                 =  'Admin/Main_controller/view_user';
$route['buat_user']                                 =  'Admin/Main_controller/create_user';
$route['buat_user/process']                         =  'Admin/Main_controller/save_user';
$route['user/aktivasi/(:any)']                      = 'Admin/Main_controller/activated_user/$1';
$route['user/hapus/(:any)']                         = 'Admin/Main_controller/delete_user/$1';

// auth
$route['auth']                                      = 'Auth/login';
$route['auth/login']                                = 'Auth/login_process';

$route['forget_password']                           = 'Auth/forgetPass';
$route['forget_password/process']                   = 'Auth/forget_pass_process';
$route['register']                                  = 'Auth/register';
$route['auth/register']                             = 'Auth/proses_register';

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


$route['guest/daftar_pesan']                        = 'Guest/Main_controller/list_message';
$route['guest/pekerjaan/selesai']                   = 'Guest/Main_controller/pekerjaan_done';
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
$route['pps/daftar_pesan']                          = 'PPS/Main_controller/list_message';
$route['dummy/(:any)']                              = 'Seeder/index/$1';


//  other
// $route['export_data']                                 = 'Export_pdf/exportData';
$route['export']                                   = 'PPS/Cetak/index';

$route['action/reset/(:any)']                      = 'Auth/action_reset/$1';
$route['success_reset']                            = 'Auth/updateRessPass';




$route['404_override'] = '/';
$route['translate_uri_dashes'] = FALSE;
