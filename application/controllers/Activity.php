<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('list_data');

    }


	public function index()
	{
        if ($this->session->userdata('id')){
            $data['values'] = $this->list_data->list_history();
            $this->load->view('admin/header');
            $this->load->view('admin/activity', $data);
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }
}