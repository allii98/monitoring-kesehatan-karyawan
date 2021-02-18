<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report_m extends CI_Model
{
    public function getUserCovid()
    {
        $query = "SELECT id_monitor, kode FROM tb_sakit WHERE covid = 1 ";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }
    public function getUser()
    {
        $query = "SELECT id_monitor, kode FROM tb_sakit  WHERE covid = 2 ";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }

    public function get_user()
    {
        $db2 = $this->load->database('db2', TRUE);
        $query = "SELECT id_user, nama FROM user_ho ORDER BY id_user DESC";
        $user = $db2->query($query)->result_array();
        return $user;
    }

    // mengambil semua report data bedasarkan date range
    public function process_all_employee($starDate, $endDate)
    {
        $query = "SELECT m.tanggal, m.id_user, m.jenis_penyakit, m.obat, m.kondisi, m.covid, u.id_user, u.nama FROM tb_monitoring m LEFT JOIN absensi_ho_20200910.user_ho u ON m.id_user = u.id_user WHERE m.tanggal >= '$starDate' AND m.tanggal <= '$endDate'  ORDER BY m.id_monitor DESC";
        $sakit = $this->db->query($query)->result_array();
        return $sakit;
    }

    public function process_suhu_employee($starDate, $endDate, $employeeId)
    {
        $query = "SELECT * FROM tb_suhu m LEFT JOIN absensi_ho_20200910.user_ho u ON m.id_user = u.id_user WHERE m.tanggal >= '$starDate' AND m.tanggal <= '$endDate' AND m.id_user = '$employeeId' ORDER BY m.id_suhu DESC";
        $suhu = $this->db->query($query)->result_array();
        return $suhu;
    }



    public function process_per_employee($employeeId)
    {
        $query = "SELECT s.id_monitor, s.kode, s.covid, s.jenis_isolasi, s.rm_sakit, s.no_kamar, s.id_karyawan, k.id_karyawan, k.id_user, m.id_user, m.tanggal, m.nama, m.suhu, m.oksigen, m.bab, m.batuk, m.sesak FROM tb_sakit s LEFT JOIN tb_karyawan k ON s.id_karyawan = k.id_karyawan LEFT JOIN tb_monitoring m ON k.id_user = m.id_user WHERE s.kode = '$employeeId'";
        $sakit = $this->db->query($query)->result_array();
        return $sakit;
    }
}

/* End of file Report_m.php */