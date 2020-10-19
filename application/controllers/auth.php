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
            $data['title'] = 'Login';
            $this->load->view('template/navbar', $data);;
            $this->load->view('auth/login');
            $this->load->view('template/footer');
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
                if ($user['aktiv'] == 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun belum diaktifkan</div>');
                    redirect('auth');
                } else {
                    $data = [
                        'email' => $user['email'],
                        'username' => $user['username']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect('auth');
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
            $data['title'] = 'Registrasi';
            $this->load->view('template/navbar', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/footer');
        } else {
            $email = $this->input->post('email');

            $token = bin2hex(random_bytes(64));

            $data = [
                'username' => htmlspecialchars($this->input->post('username')),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'token' => $token
            ];

            $this->db->insert('user', $data);
            // $this->db->insert('pendaftaran', $token_daftar);

            $this->_sendEmail($token);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akun berhasil dibuat, silahkan aktivasi akun melalui email</div>');
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
        $date = time();
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.flockmail.com',
            'smtp_user' => 'xyz@ilinkxyz.com',
            'smtp_pass' => 'xyzsemangat',
            'smtp_crypto' => 'starttls',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('xyz@ilinkxyz.com', 'ILINK');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Account Verification');
        $this->email->message('Klik link disamping untuk mengaktifkan akun : <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . $token . '&date=' . $date . '">Aktivasi Akun</a>');

        if ($this->email->send()) {
            return true;
        } else {
            
        }
    }

    public function verifikasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $date = $this->input->get('date');
        $date_now = time();

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $user_token = $user['token'];
        if ($user) {
            if (strcmp($user_token, $token) == 0) {
                if (($date_now - $date) < (24 * 60 * 60)) {
                    $this->db->set('aktiv', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    // $this->db->delete('pendaftaran', ['email' => $email]);

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akun berhasil diaktifkan, Silahkan login</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Aktivasi terlalu lama, silahkan register ulang</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun gagal diaktifkan, Token salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun gagal diaktifkan, Email tidak terdaftar</div>');
            redirect('auth');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
