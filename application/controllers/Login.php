<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $this->load->model('m_user');
        $this->load->model('list_data');

    }

	function index()
	{
		$this->load->view('admin/login');
	}

  	function proses() {
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
		
        if ($this->form_validation->run() == FALSE) {
             $this->session->set_flashdata('result_login', '<br>Nama atau Password belum diisi.');
			 redirect();
        } else {
            $last_login=date('Y-m-d H:i:s'); 
            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $p = md5($psw);
            $cek = $this->m_user->cek($usr, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['id'] = $qad->id;
                    $sess_data['username'] = $qad->username;
					$sess_data['password'] = $qad->password;
                    $sess_data['last_login'] = $last_login;
                    $this->session->set_userdata($sess_data);
                    $this->session->set_userdata('logged_in', true);
                    $data = array(
                        'last_login' => $last_login
                    );
                    $this->m_user->update($qad->id, $data);
                }
                $user_id = $this->session->userdata('id');
                $content = 'melakukan login';
                $data = array(
                    'user_id' => $user_id,
                    'content' => $content,
                    'event_date' => $last_login
                );
                $this->list_data->record_history($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
	            redirect();
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}