<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('list_data');

    }


	public function index()
	{
        if ($this->session->userdata('id')){
            $data['values'] = $this->list_data->list_order_by_flag();
            $data['menus'] = $this->list_data->list_menu_by_flag();
            $data['add'] = 2;
            $this->load->view('admin/header');
            $this->load->view('admin/tables', $data);
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }
    

    function print(){
        if ($this->session->userdata('id')){
            $id = $this->session->userdata('id');
            $data['values'] = $this->list_data->list_order_by_user($id);
            $data['menus'] = $this->list_data->list_menu_by_flag();
            $this->load->view('admin/excel', $data);
        } else {
            redirect('login');
        }
    }


    function update() {
        $this->form_validation->set_rules('name_buyer', 'name_buyer', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
             $this->session->set_flashdata('result_update', '<br>Cek Kembali pengisian data yang akan diubah.');
			 redirect('menu');
        } else {
            $updated_at=date("Y-m-d H:i:s"); 
            $name = $this->input->post('name_buyer');
            $total = $this->input->post('total_price');
            $arr_menu = $this->input->post('arr_menu');
            $no_table = $this->input->post('no_table');
            $owner_by = $this->session->userdata('id');
            $flag = $this->input->post('flag');
            $id = $this->input->post('id');
            $data = array(
                'name' => $name,
                'total' => $total,
                'arr_menu' => $arr_menu,
                'no_table' => $no_table,
                'owner_by' => $owner_by,
                'flag' => $flag,
                'updated_at' => $updated_at
            );
            $update = $this->list_data->update_order($id, $data);
            if ($update) {
                $data = array(
                    'user_id' => $owner_by,
                    'content' => 'melakukan update data pesanan '.$id,
                    'event_date' => $updated_at
                );
                $this->list_data->record_history($data);
                $this->session->set_flashdata('result_update_success', '<br>Data berhasil di update.');
                redirect('order');
            } else {
                $this->session->set_flashdata('result_update', '<br>Gagal update.');
	            redirect('order');
            }
        }
    }


    function delete($id) {
        $deleted = $this->list_data->delete_order($id);
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'content' => 'melakukan delete pesanan dengan no pesanan '.$id,
            'event_date' => date('Y-m-d H:i:s')
        );
        $this->list_data->record_history($data);
        $this->session->set_flashdata('result_update_success', '<br>Berhasil menghapus pesanan.');
        redirect('order');
    }


	public function add_order()
	{
        if ($this->session->userdata('id')){
            $data['menus'] = $this->list_data->list_menu_by_flag();
            $data['add'] = 2;
            $this->load->view('admin/header');
            $this->load->view('admin/forms', $data);
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }


    function insert_order() {
        $this->form_validation->set_rules('name_buyer', 'name_buyer', 'required|trim');
		
        if ($this->form_validation->run() == FALSE) {
             $this->session->set_flashdata('insert_order', '<br>Data ada yang belum diisi.');
			 redirect('order/add_order');
        } else {
            $created_at=date("Y-m-d H:i:s"); 
            $name = $this->input->post('name_buyer');
            $total = $this->input->post('total_price');
            $arr_menu = $this->input->post('arr_menu');
            $no_table = $this->input->post('no_table');
            $owner_by = $this->session->userdata('id');
            $flag = $this->input->post('flag');
            $id = 'ERP'.date('dmY');
            $last_id = $this->list_data->get_max_id($id);
            $last_id= (int)substr($last_id, 12, 3);
            $last_id++;
            $id = $id.'-'.sprintf('%03s', $last_id);
            $data = array(
                'id' => $id,
                'name' => $name,
                'total' => $total,
                'arr_menu' => $arr_menu,
                'no_table' => $no_table,
                'owner_by' => $owner_by,
                'flag' => $flag,
                'created_at' => $created_at
            );
            $insert = $this->list_data->insert_order($data);
            if ($insert){
                $data = array(
                    'user_id' => $this->session->userdata('id'),
                    'content' => 'melakukan penambahan pesanan no pesanan '.$id,
                    'event_date' => date('Y-m-d H:i:s')
                );
                $this->list_data->record_history($data);
                $this->session->set_flashdata('insert_order_success', '<br>Berhasil menambahkan pesanan.');
                redirect('order/add_order');
            } else {
                $this->session->set_flashdata('insert_order', '<br>Gagal menambahkan pesanan.');
                redirect('order/add_order');
            }
        }
    }
}