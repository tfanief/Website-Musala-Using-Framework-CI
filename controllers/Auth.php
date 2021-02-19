<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    //Method default setiap mengakses controller
    public function __construct()
    {
        //Memanggil Method construct yang ada di CI_Controller
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Admin';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //Validasi Sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //Select * from admin where username_admin = username
        //row_array untuk mendapatkan 1 baris
        $admin = $this->db->get_where('admin', ['username_admin' => $username])->row_array();

        if ($admin) {
            if (password_verify($password, $admin['password_admin'])) {
                $data = [
                    'username_admin' => $admin['username_admin'],
                    'role_id' => $admin['role_id']
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Username atau Password anda salah </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">User tidak terdaftar </div>'
            );
            redirect('auth');
        }
    }

    public function registration()
    {
        //nama_user diambil dari name pada view registration
        $this->form_validation->set_rules('nama_user', 'Nama Admin', 'required|trim');
        $this->form_validation->set_rules('username', 'Username Admin', 'required|trim|is_unique[admin.username_admin]', [
            'is_unique' => 'Username Sudah Ada!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[6]', [
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama_admin' => htmlspecialchars($this->input->post('nama_user', true)),
                'username_admin' => htmlspecialchars($this->input->post('username', true)),
                'password_admin' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' => 1
            ];

            $this->db->insert('admin', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Selamat Anda Berhasil Daftar
            </div>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username_admin');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Anda Berhasil Logout!!
        </div>'
        );
        redirect('auth');
    }
}
