<?php

class User_model extends CI_Model
{
    public function getKegiatan()
    {
         $sql = 'SELECT * FROM kegiatan where tanggal_kegiatan >= NOW() ORDER BY tanggal_kegiatan ASC';
        return $this->db->query($sql)->result_array();
    }

    public function getJumlahKegiatan()
    {
        return $this->db->get('kegiatan')->num_rows();
    }

    public function getKegiatanTerbaru()
    {
        $sql = 'SELECT * FROM kegiatan where tanggal_kegiatan >= NOW() ORDER BY tanggal_kegiatan ASC  LIMIT 4';
        return $this->db->query($sql)->result_array();
    }
    public function getKegiatanTerbaru2()
    {
    
        $sql = 'SELECT * FROM kegiatan where tanggal_kegiatan >= NOW()  ORDER BY tanggal_kegiatan ASC LIMIT 5,8';
        return $this->db->query($sql)->result_array();
    }
     public function getKegiatanPalingBaru()
    {
        
        $sql = 'SELECT * FROM kegiatan where tanggal_kegiatan > NOW() ORDER BY tanggal_kegiatan ASC LIMIT 1';
        return $this->db->query($sql)->row_array();
    }

    public function hapus_kegiatan($id_kegiatan)
    {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->delete('kegiatan');
    }

    public function getKeuangan()
    {
        return $this->db->get('keuangan')->result_array();
    }

    public function getTotalKeuangan()
    {
        $this->db->select_sum('pemasukan_keuangan');
        $this->db->select_sum('pengeluaran_keuangan');
        $this->db->from('keuangan');
        return $this->db->get()->row_array();
    }


    public function keuangan_week()
    {
        $kamisLalu = date('Y-m-d', strtotime('last thursday'));
        $kamisDepan = date('Y-m-d', strtotime('next thursday'));

        $this->db->select_sum('pemasukan_keuangan');
        $this->db->select_sum('pengeluaran_keuangan');
        $this->db->where("tanggal_keuangan BETWEEN '$kamisLalu'  AND '$kamisDepan'");
        $this->db->from('keuangan');
        return $this->db->get()->row_array();
    }

    public function keuangan_bulan()
    {
        $date = date('Y-m');
        $this->db->select_sum('pemasukan_keuangan');
        $this->db->select_sum('pengeluaran_keuangan');
        $this->db->from('keuangan');
        $this->db->like('tanggal_keuangan', '' . $date);
        return $this->db->get()->row_array();
    }

    public function keuangan_tahun()
    {
        $date = date('Y');
        $this->db->select_sum('pemasukan_keuangan');
        $this->db->select_sum('pengeluaran_keuangan');
        $this->db->from('keuangan');
        $this->db->like('tanggal_keuangan', '' . $date);
        return $this->db->get()->row_array();
    }
   
}
