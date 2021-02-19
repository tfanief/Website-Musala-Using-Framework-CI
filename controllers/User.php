<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }


    public function keuangan()
    {

        $data['title'] = 'Keuangan';
    
        $data['keuangan'] = $this->User_model->getKeuangan();
        $data['totalkeuangan'] = $this->User_model->getTotalKeuangan();
        $data['keuanganbulan'] = $this->User_model->keuangan_bulan();
        $data['keuangantahun'] = $this->User_model->keuangan_tahun();

        $this->load->view('templates/user_header',$data);
        $this->load->view('user/about', $data);
        $this->load->view('templates/user_footer',$data); 
    }

    public function beranda()
    {
                $data['kegiatan_terbaru'] = $this->User_model->getKegiatanTerbaru();
        $data['kegiatan_terbaru2'] = $this->User_model->getKegiatanTerbaru2();
        
        // var_dump($data['kegiatan']);

        $this->load->view('templates/user_header',$data);
        $this->load->view('user/index2',$data);
        $this->load->view('templates/user_footer',$data);
    }
    public function kontak()
    {

        $this->load->view('templates/user_header');
        $this->load->view('user/contact');
        $this->load->view('templates/user_footer');
    }
    public function kegiatan()
    {
        $data['kegiatan'] = $this->User_model->getKegiatan();
        $data['kegiatan_palingBaru'] = $this->User_model->getKegiatanPalingBaru();
        $data['jumlah_data'] = $this->User_model->getJumlahKegiatan();
        

        //var_dump($data['kegiatan_palingBaru']);

        $this->load->view('templates/user_header',$data);
        $this->load->view('user/cycv2',$data);
        $this->load->view('templates/user_footer',$data); 
    }

    public function detail_kegiatan($id_kegiatan) {

        $data['title'] = 'Detail Data Kegiatan';

        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id_kegiatan' => $id_kegiatan])->result_array();
        
        $this->load->view('user/cycv', $data);
    }

    
   
}
