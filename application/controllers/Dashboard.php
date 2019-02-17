<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
        if ($this->session->userdata('id')){
            $this->load->view('admin/header');
            $this->load->view('admin/dashboard');
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
	}
}