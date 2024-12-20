<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Default Routes
$route['default_controller'] = 'masuk';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Authentication Routes
$route['masuk'] = 'masuk/index';
$route['masuk/process'] = 'masuk/process';
$route['masuk/logout'] = 'masuk/logout';
$route['logout'] = 'masuk/logout';

// Admin Routes
$route['admin'] = 'admin/index';
$route['admin/index'] = 'admin/index';
$route['admin/users'] = 'admin/users';
$route['admin/add_user'] = 'admin/add_user';
$route['admin/edit_user'] = 'admin/edit_user';
$route['admin/delete_user/(:num)'] = 'admin/delete_user/$1';
$route['admin/profile'] = 'admin/profile';
$route['admin/update_profile'] = 'admin/update_profile';

// Home Routes
$route['home'] = 'home/index';
$route['home/index'] = 'home/index';
$route['home/profil'] = 'home/profil';
$route['home/profil/(:any)'] = 'home/profil/$1';

// Pengajuan Routes
$route['pengajuan/judul'] = 'pengajuan/judul';
$route['pengajuan/sidang'] = 'pengajuan/sidang';
$route['pengajuan/dosen'] = 'pengajuan/dosen';
$route['pengajuan/rmk'] = 'pengajuan/rmk';
$route['pengajuan/kaprodi'] = 'pengajuan/kaprodi';

// Sidang Routes
$route['sidang/daftar'] = 'sidang/daftar';