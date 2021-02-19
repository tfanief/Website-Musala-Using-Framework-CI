<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('username_admin')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['admin'] = $this->db->get_where('admin', ['username_admin' =>
        $this->session->userdata('username_admin')])->row_array();

        $data['kegiatan'] = $this->Admin_model->getKegiatan();

        $data['totalkeuangan'] = $this->Admin_model->getTotalKeuangan();
        $data['keuanganweek'] = $this->Admin_model->keuangan_week();
        $data['keuanganbulan'] = $this->Admin_model->keuangan_bulan();
        $data['keuangantahun'] = $this->Admin_model->keuangan_tahun();

        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    public function keuangan()
    {

        $data['title'] = 'Keuangan';
        //session
        $data['admin'] = $this->db->get_where('admin', ['username_admin' =>
        $this->session->userdata('username_admin')])->row_array();

        $data['keuangan'] = $this->Admin_model->getKeuangan();
        $data['totalkeuangan'] = $this->Admin_model->getTotalKeuangan();
        $data['keuanganbulan'] = $this->Admin_model->keuangan_bulan();
        $data['keuangantahun'] = $this->Admin_model->keuangan_tahun();

        $this->form_validation->set_rules('tanggal_keuangan', 'Tanggal Pemasukan/Pengeluaran', 'required');
        $this->form_validation->set_rules('pemasukan_keuangan', 'Pemasukan Keuangan', 'required');
        $this->form_validation->set_rules('pengeluaran_keuangan', 'Pengeluaran Keuangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/keuangan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'jenis_keuangan' => $this->input->post('jenis_keuangan'),
                'tanggal_keuangan' => $this->input->post('tanggal_keuangan'),
                'pemasukan_keuangan' => $this->input->post('pemasukan_keuangan'),
                'pengeluaran_keuangan' => $this->input->post('pengeluaran_keuangan'),
                'keterangan' => $this->input->post('keterangan'),
            ];

            $this->db->insert('keuangan', $data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">
                Data keuangan telah berhasil ditambahkan!
                </div>'
            );
            redirect('admin/keuangan');
        }
    }

    public function hapus_keuangan($id_keuangan)
    {

        $this->Admin_model->hapus_keuangan($id_keuangan);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger" role="alert">
            Data keuangan telah berhasil dihapus!
            </div>'
        );
        redirect('admin/keuangan');
    }

    public function edit_keuangan()
    {

        $data['title'] = 'Edit Data Keuangan';
        //session
        $data['admin'] = $this->db->get_where('admin', ['username_admin' =>
        $this->session->userdata('username_admin')])->row_array();

        $data['keuangan'] = $this->Admin_model->getKeuangan();

        $this->form_validation->set_rules('jenis_keuangan', 'Jenis Keuangan', 'required');
        $this->form_validation->set_rules('tanggal_keuangan', 'Tanggal Pemasukan/Pengeluaran', 'required');
        $this->form_validation->set_rules('pemasukan_keuangan', 'Pemasukan', 'required');
        $this->form_validation->set_rules('pengeluaran_keuangan', 'Pengeluaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/donatur', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_keuangan = $this->input->post('id_keuangan');
            $data = [
                'jenis_keuangan' => $this->input->post('jenis_keuangan'),
                'tanggal_keuangan' => $this->input->post('tanggal_keuangan'),
                'pemasukan_keuangan' => $this->input->post('pemasukan_keuangan'),
                'pengeluaran_keuangan' => $this->input->post('pengeluaran_keuangan'),
                'keterangan' => $this->input->post('keterangan'),
            ];
            $this->db->where('id_keuangan', $id_keuangan);
            $this->db->update('keuangan', $data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">
                Data keuangan telah berhasil diperbarui!
                </div>'
            );
            redirect('admin/keuangan');
        }
    }

    public function kegiatan()
    {

        $data['title'] = 'Kegiatan';
        //session
        $data['admin'] = $this->db->get_where('admin', ['username_admin' =>
        $this->session->userdata('username_admin')])->row_array();

        $data['kegiatan'] = $this->Admin_model->getKegiatan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kegiatan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahKegiatan()
    {
        $data['title'] = 'Kegiatan';

        //session
        $data['admin'] = $this->db->get_where('admin', ['username_admin' =>
        $this->session->userdata('username_admin')])->row_array();

        $this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan', 'required');
        $this->form_validation->set_rules('ustadz_kegiatan', 'Ustadz Kegiatan', 'required');
        $this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('tanggal_post', 'Tanggal Post', 'required');
        $this->form_validation->set_rules('judul_kegiatan', 'Judul Kegiatan', 'required');
        $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'required');
        $this->form_validation->set_rules('waktu_kegiatan', 'Waktu Kegiatan', 'required');
        $this->form_validation->set_rules('lokasi_kegiatan', 'Lokasi Kegiatan', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambahKegiatan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $jenis_kegiatan = $this->input->post('jenis_kegiatan');
            $ustadz_kegiatan = $this->input->post('ustadz_kegiatan');
            $tanggal_kegiatan = $this->input->post('tanggal_kegiatan');
            $tanggal_post = $this->input->post('tanggal_post');
            $judul_kegiatan = $this->input->post('judul_kegiatan');
            $deskripsi_kegiatan = $this->input->post('deskripsi_kegiatan');
            $waktu_kegiatan = $this->input->post('waktu_kegiatan');
            $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
            $latitude= $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $data = [
                // 'id_kegiatan' => $this->input->post('id_kegiatan'),
                'jenis_kegiatan' => $jenis_kegiatan,
                'ustadz_kegiatan' => $ustadz_kegiatan,
                'tanggal_kegiatan' => $tanggal_kegiatan,
                'tanggal_post' => $tanggal_post,
                'judul_kegiatan' => $judul_kegiatan,
                'deskripsi_kegiatan' => $deskripsi_kegiatan,
                'waktu_kegiatan' => $waktu_kegiatan,
                'lokasi_kegiatan' => $lokasi_kegiatan,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ];
            //Upload Gambar
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
                $config['max_size'] = '10240';
                $config['upload_path'] = './assets/img/kegiatan/';
                $config['maintain_ratio'] = true;
                $config['quality'] = '60%';
                $config['width'] = 275;
                $config['height'] = 200;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->insert('kegiatan', $data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">
                    Data kegiatan telah berhasil ditambahkan!
                    </div>'
            );
            redirect('admin/kegiatan');
        }
    }

    public function hapus_kegiatan($id_kegiatan)
    {
        $item = $this->db->get_where('kegiatan', ['id_kegiatan' => $id_kegiatan])->row();

        if (is_file("assets/img/kegiatan/" . $item->image)) {
            unlink("assets/img/kegiatan/" . $item->image);
        }

        $this->Admin_model->hapus_kegiatan($id_kegiatan);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger" role="alert">
            Data kegiatan telah berhasil dihapus!
            </div>'
        );
        redirect('admin/kegiatan');
    }

    public function edit_kegiatan($id_kegiatan)
    {

        $data['title'] = 'Edit Data Kegiatan';
        //session
        $data['admin'] = $this->db->get_where('admin', ['username_admin' =>
        $this->session->userdata('username_admin')])->row_array();

        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id_kegiatan' => $id_kegiatan])->result_array();

        $this->form_validation->set_rules('judul_kegiatan', 'Judul Kegiatan', 'required');
        $this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan', 'required');
        $this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('ustadz_kegiatan', 'Ustadz Kegiatan', 'required');
        $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editKegiatan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $judul_kegiatan = $this->input->post('judul_kegiatan');
            $jenis_kegiatan = $this->input->post('jenis_kegiatan');
            $tanggal_kegiatan = $this->input->post('tanggal_kegiatan');
            $tanggal_post = $this->input->post('tanggal_post');
            $ustadz_kegiatan = $this->input->post('ustadz_kegiatan');
            $deskripsi_kegiatan = $this->input->post('deskripsi_kegiatan');

            $this->db->set('judul_kegiatan', $judul_kegiatan);
            $this->db->set('jenis_kegiatan', $jenis_kegiatan);
            $this->db->set('tanggal_kegiatan', $tanggal_kegiatan);
            $this->db->set('tanggal_post', $tanggal_post);
            $this->db->set('ustadz_kegiatan', $ustadz_kegiatan);
            $this->db->set('deskripsi_kegiatan', $deskripsi_kegiatan);

            //Upload Gambar
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
                $config['max_size'] = '10240';
                $config['upload_path'] = './assets/img/kegiatan/';
                // $config['overwrite'] = true;
                $config['maintain_ratio'] = true;
                $config['quality'] = '60%';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $item = $this->db->get_where('kegiatan', ['id_kegiatan' => $id_kegiatan])->row_array();
                    if ($item['image'] != null) {
                        $target_file = './assets/img/kegiatan/' . $item['image'];
                        unlink($target_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id_kegiatan', $id_kegiatan);
            $this->db->update('kegiatan');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">
                Data kegiatan telah berhasil diperbarui!
                </div>'
            );
            redirect('admin/kegiatan');
        }
    }

    public function detail_kegiatan($id_kegiatan)
    {

        $data['title'] = 'Detail Data Kegiatan';
        //session
        $data['admin'] = $this->db->get_where('admin', ['username_admin' =>
        $this->session->userdata('username_admin')])->row_array();

        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id_kegiatan' => $id_kegiatan])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detailKegiatan', $data);
        $this->load->view('templates/footer', $data);
    }
}
