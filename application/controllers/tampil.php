<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tampil extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Link';
        $this->load->view('template/navbar', $data);
        $this->load->view('tampil');
        $this->load->view('template/footer');
    }
}
