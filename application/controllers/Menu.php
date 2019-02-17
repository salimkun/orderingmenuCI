<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('list_data');

    }


	public function index()
	{
        if ($this->session->userdata('id')){
            $data['values'] = $this->list_data->list_menu();
            $data['add'] = 1;
            $this->load->view('admin/header');
            $this->load->view('admin/tables', $data);
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }
    

    function update() {
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('price', 'price', 'required|numeric|trim');
        
        if ($this->form_validation->run() == FALSE) {
             $this->session->set_flashdata('result_update', '<br>Cek Kembali pengisian data yang akan diubah.');
			 redirect('menu');
        } else {
            $updated_at=date('Y-m-d H:i:s'); 
            $name = $this->input->post('name');
            $price = $this->input->post('price');
            $flag = $this->input->post('flag');
            $change_by = $this->session->userdata('id');
            $id = $this->input->post('id');
            $data = array(
                'name' => $name,
                'price' => $price,
                'flag' => $flag,
                'change_by' => $change_by,
                'updated_at' => $updated_at
            );
            $update = $this->list_data->update_menu($id, $data);
            if ($update) {
                $data = array(
                    'user_id' => $change_by,
                    'content' => 'melakukan update data menu '.$name,
                    'event_date' => $updated_at
                );
                $this->list_data->record_history($data);
                $this->session->set_flashdata('result_update_success', '<br>Data berhasil di update.');
                redirect('menu');
            } else {
                $this->session->set_flashdata('result_update', '<br>Gagal update.');
	            redirect('menu');
            }
        }
    }


    function delete($id, $name) {
        $deleted = $this->list_data->delete_menu($id);
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'content' => 'melakukan delete data menu '.str_replace('%20',' ',$name),
            'event_date' => date('Y-m-d H:i:s')
        );
        $this->list_data->record_history($data);
        $this->session->set_flashdata('result_update_success', '<br>Berhasil menghapus menu.');
        redirect('menu');
    }


	public function add_menu()
	{
        if ($this->session->userdata('id')) {
            $data['add'] = 1;
            $this->load->view('admin/header');
            $this->load->view('admin/forms', $data);
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }


    function insert_menu() {
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('price', 'price', 'required|numeric|trim');
		
        if ($this->form_validation->run() == FALSE) {
             $this->session->set_flashdata('insert_menu', '<br>Data ada yang belum diisi.');
			 redirect('menu/add_menu');
        } else {
            $created_at=date("Y-m-d H:i:s"); 
            $name = $this->input->post('name');
            $price = $this->input->post('price');
            $change_by = $this->session->userdata('id');
            $status = $this->input->post('status');
            $data = array(
                "name" => $name,
                "price" => $price,
                "flag" => $status,
                "change_by" => $change_by,
                "created_at" => $created_at
            );
            $insert = $this->list_data->insert_menu($data);
            if ($insert){
                $data = array(
                    'user_id' => $this->session->userdata('id'),
                    'content' => 'melakukan penambahan menu '.$name,
                    'event_date' => date('Y-m-d H:i:s')
                );
                $this->list_data->record_history($data);
                $this->session->set_flashdata('insert_menu_success', '<br>Berhasil menambahkan menu.');
                redirect('menu/add_menu');
            } else {
                $this->session->set_flashdata('insert_menu', '<br>Gagal menambahkan menu.');
                redirect('menu/add_menu');
            }
        }
    }
}