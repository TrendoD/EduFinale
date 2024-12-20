<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        // Test database connection
        if ($this->db->simple_query('SELECT 1 FROM user LIMIT 1')) {
            echo "Database connection successful!\n";
            
            // Get table structure
            $fields = $this->db->list_fields('user');
            echo "User table fields:\n";
            print_r($fields);
            
            // Get one user record
            $user = $this->db->limit(1)->get('user')->row_array();
            echo "\nSample user record (without password):\n";
            if ($user) {
                unset($user['password']); // Don't display password
                print_r($user);
            } else {
                echo "No users found in database.";
            }
        } else {
            echo "Database connection failed!";
            echo "\nError: " . $this->db->error()['message'];
        }
    }
}
