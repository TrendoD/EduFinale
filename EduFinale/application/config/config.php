<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] = 'http://localhost/EduFinale';
$config['index_page'] = '';

// Session Configuration
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = sys_get_temp_dir();
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

// Error Logging Configuration
$config['log_threshold'] = 1;
$config['log_path'] = APPPATH . 'logs/';
$config['log_file_extension'] = 'log';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';

// Class Extension Configuration
$config['subclass_prefix'] = 'MY_';

// URL and Character Set Configuration
$config['uri_protocol'] = 'REQUEST_URI';
$config['url_suffix'] = '';
$config['language'] = 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

// Controller and Function Configuration
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';

// Security Configuration
$config['allow_get_array'] = TRUE;
$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = FALSE;

// CSRF Protection Configuration
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

// Output and Time Configuration
$config['compress_output'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;

// Cookie Configuration
$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;

// Proxy Configuration
$config['proxy_ips'] = '';