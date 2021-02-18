<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_m extends CI_Model
{

    public function getData()
    {
        $tgl = date('Y-m-d');
        $query = "SELECT * FROM tb_monitoring WHERE tanggal = '$tgl'";
        $sakit = $this->db->query($query)->result_array();
        return $sakit;
    }

    public function getDataSuhu()
    {
        $tgl = date('Y-m-d');
        $query = "SELECT s.id_suhu, s.tanggal, s.id_user, s.masuk, s.petugas1,s.keluar,s.petugas2, u.id_user, u.nama FROM tb_suhu s LEFT JOIN absensi_ho_20200910.user_ho u ON s.id_user = u.id_user  WHERE s.tanggal = '$tgl'";
        $sakit = $this->db->query($query)->result_array();
        return $sakit;
    }
}

/* End of file Admin.php */