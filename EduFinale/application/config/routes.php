<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Chat routes
$route['chat'] = 'chat/index';
$route['chat/get_messages'] = 'chat/get_messages';
$route['chat/send_message'] = 'chat/send_message';
$route['chat/mark_as_read'] = 'chat/mark_as_read';

// Riwayat bimbingan routes
$route['aksi/tambah_riwayat'] = 'aksi/tambah_riwayat';
$route['aksi/edit_riwayat'] = 'aksi/edit_riwayat';
$route['aksi/hapus_riwayat/(:num)'] = 'aksi/hapus_riwayat/$1';