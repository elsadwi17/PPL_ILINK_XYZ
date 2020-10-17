<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Faq';
        $this->load->view('template/navbar', $data);
        $this->load->view('faq');
        $this->load->view('template/footer');
    }
}
