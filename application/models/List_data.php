<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class List_data extends CI_Model {

    function list_menu() {
        return $this->db->get('menu');
    }


    function list_menu_by_flag(){
        $this->db->where('flag', 1);
        return $this->db->get('menu');
    }

    
    function list_menu_by_id($id){
        $this->db->where_in('id', $id);
        return $this->db->get('menu');
    }


    function list_order() {
        return $this->db->get('order');
    }


    function list_order_by_flag(){
        $this->db->where('flag', 1);
        return $this->db->get('order');
    }


    function list_order_by_user($id){
        $this->db->where('id', $id);
        $this->db->where('flag', 0);
        return $this->db->get('menu');
    }


    function list_history() {
        $id = $this->session->userdata('id');
        $this->db->where('user_id', $id);
        $this->db->order_by('id', 'desc');
        return $this->db->get('history');
    }


    function update_menu($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('menu', $data);
    }


    function update_order($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('order', $data);
    }


    function delete_menu($id) {
        $this->db->where('id', $id);
        return $this->db->delete('menu');
    }


    function delete_order($id) {
        $this->db->where('id', $id);
        return $this->db->delete('order');
    }


    function insert_menu($data) {
        return $this->db->insert('menu', $data);
    }


    function insert_order($data) {
        return $this->db->insert('order', $data);
    }

    
    function record_history($data){
        return $this->db->insert('history', $data);
    }


    function get_max_id($compare){
        $this->db->like('id', $compare);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        return $this->db->get('order')->row('id');
    }
}