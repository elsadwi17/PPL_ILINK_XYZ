<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('home');
        }
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email');
        $this->form_validation->set_rules('password', 'password', 'trim|callback_login_check');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->login();
        }
    }

    public function login_check()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($email == '' || $password == '') {
            $this->form_validation->set_message('login_check', 'Form Kosong');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'username' => $user['username']
                ];
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah</div>');
                $this->load->view('auth/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">email tidak terdaftar</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('home');
        }

        $this->form_validation->set_rules('username', 'username', 'trim');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email');
        $this->form_validation->set_rules('repeat-password', 'repeat-password', 'trim');
        $this->form_validation->set_rules('password', 'password', 'trim|min_length[8]|callback_registration_check');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registration');
        } else {
            $email = $this->input->post('email');
            $data = [
                'username' => htmlspecialchars($this->input->post('username')),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];

            $token = base64_encode(random_bytes(64));
            $token_daftar = [
                'email' => $email,
                'token' => $token
            ];

            $this->db->insert('user', $data);
            // $this->db->insert('pendaftaran', $token_daftar);

            $this->_sendEmail($token);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat</div>');
            redirect('auth');
        }
    }

    public function registration_check()
    {
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $repeat_password = $this->input->post('repeat-password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $usernamedb = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($email == '' || $password == '' || $username == '' || $repeat_password == '') {
            $this->form_validation->set_message('registration_check', 'Form Kosong');
            return FALSE;
        } elseif ($password != $repeat_password) {
            $this->form_validation->set_message('registration_check', 'Password tidak sama');
            return FALSE;
        } elseif ($user) {
            $this->form_validation->set_message('registration_check', 'Email Sudah Pernah Terdaftar');
            return FALSE;
        } elseif ($usernamedb) {
            $this->form_validation->set_message('registration_check', 'Username Sudah Pernah Terdaftar');
            return FALSE;
        }
    }

    private function _sendEmail($token)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'xyz.ilink@gmail.com',
            'smtp_pass' => 'xyzsemangat',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('xyz.ilink@gmail.com', 'ILINK');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Account Verification');
        $this->email->message('Hello sayang, nanti malem jadi kan? kalo jadi hubungin aku disini : <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . $token . '">MUAHH</a>');

        if ($this->email->send()) {
            return true;
        } else { }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
