<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    var $table = 'link';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model', 'dashboard');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('template/navbar', $data);
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }

    public function ajax_edit($id)
    {
        $data = $this->dashboard->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_tambah()
    {
        $this->_validate();
        $data = array(
            'title' => $this->input->post('title'),
            'link' => $this->input->post('link'),
            'username' => $this->session->userdata('username'),
        );
       $this->dashboard->tambah($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'title' => $this->input->post('title'),
            'link' => $this->input->post('link'),
        );
        $this->dashboard->update(array('id_link'=> $this->input->post('id_link')),$data);
        echo json_encode(array("status"=>TRUE));
    }

    public function ajax_delete($id)
    {
        $this->dashboard->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('title') == '') {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'Title is Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('link') == '') {
            $data['inputerror'][] = 'link';
            $data['error_string'][] = 'URL is Required';
            $data['status'] = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit(23);
        }
    }
}
