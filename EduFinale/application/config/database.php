<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'	=> '',
    'hostname' => 'localhost',
    'username' => 'root',  // Change this if you use a different username
    'password' => '',      // Set your database password if you have one
    'database' => 'edufinale',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8mb4',  // Updated to utf8mb4 for better Unicode support
    'dbcollat' => 'utf8mb4_unicode_ci',  // Updated collation
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => TRUE,  // Enabled strict mode for better error checking
    'failover' => array(),
    'save_queries' => TRUE,
    'options' => array(
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
    )
);
