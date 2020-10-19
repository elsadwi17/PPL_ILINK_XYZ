<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $datat['title'] = 'Profile';
        $this->load->view('template/navbar', $datat);
        $this->load->view('profile', $data);
        $this->load->view('template/footer');
    }

    public function save()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email');
        if ($this->form_validation->run() == false) {
            redirect('profile');
        } else {
            $nama_depan = htmlspecialchars($this->input->post('nama_depan'));
            $nama_belakang = htmlspecialchars($this->input->post('nama_belakang'));
            $email = $this->session->userdata('email');

            $upload_image = $_POST['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                $user = $this->db->get_where('user', ['email' => $email])->row_array();

                if ($this->upload->do_upload('image')) {
                    $old_image = $user['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');;
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Foto tidak dapat di upload</div>');
                }
            }

            $this->db->set('nama_depan', $nama_depan);
            $this->db->set('nama_belakang', $nama_belakang);
            // $this->db->set('email', $email);
            $this->db->where('email', $email);
            $this->db->update('user');

            // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat</div>');
            redirect('profile');
        }
    }

    public function ubahPassword()
    {
        $old = $this->input->post('old');
        $new = $this->input->post('new');
        $password = password_hash($new, PASSWORD_DEFAULT);
        $email = $this->session->userdata('email');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if (password_verify($old, $user['password'])) {
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            echo json_encode('success');
        } else {
            echo json_encode('old');
        }
    }

    public function uploadImage()
    {
        $upload_image = $_POST['image']['name'];
        $email = $this->session->userdata('email');

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/profile';

            $this->load->library('upload', $config);

            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($this->upload->do_upload('image')) {
                $old_image = $user['image'];
                if ($old_image != 'default.png') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                $this->db->where('email', $email);
                $this->db->update('user');

                redirect('profile');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }
}
