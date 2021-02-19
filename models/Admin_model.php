<?php

class Admin_model extends CI_Model
{
    public function getKegiatan()
    {
        return $this->db->get('kegiatan')->result_array();
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

    public function hapus_keuangan($id_keuangan)
    {
        $this->db->where('id_keuangan', $id_keuangan);
        $this->db->delete('keuangan');
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
