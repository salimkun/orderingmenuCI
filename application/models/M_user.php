<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

    function cek($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('user');
    }


    function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

}