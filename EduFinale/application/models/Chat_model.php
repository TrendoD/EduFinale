<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model {
    
    public function get_messages($sender_id, $receiver_id) {
        $this->db->where('(sender_id = "' . $sender_id . '" AND receiver_id = "' . $receiver_id . '") OR 
                          (sender_id = "' . $receiver_id . '" AND receiver_id = "' . $sender_id . '")');
        $this->db->order_by('timestamp', 'ASC');
        return $this->db->get('messages')->result();
    }
    
    public function send_message($sender_id, $receiver_id, $message) {
        $data = array(
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'message' => $message
        );
        return $this->db->insert('messages', $data);
    }
    
    public function mark_as_read($sender_id, $receiver_id) {
        $this->db->where('sender_id', $sender_id);
        $this->db->where('receiver_id', $receiver_id);
        $this->db->where('is_read', 0);
        return $this->db->update('messages', array('is_read' => 1));
    }
    
    public function get_unread_count($user_id) {
        $this->db->where('receiver_id', $user_id);
        $this->db->where('is_read', 0);
        return $this->db->count_all_results('messages');
    }
}