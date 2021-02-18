<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{
    public function get_user()
    {
        // $db2 = $this->load->database('db2', TRUE);
        $query = "SELECT id_karyawan, k.nama FROM tb_karyawan k ORDER BY k.id_karyawan DESC";
        $user = $this->db->query($query)->result_array();
        return $user;
    }

    public function get_id($id)
    {
        $q = $this->db->query("SELECT * FROM tb_sakit t LEFT JOIN tb_karyawan u ON t.id_karyawan = u.id_karyawan WHERE t.id_monitor = '$id' ");
        $data = $q->result_array();

        return $data;
    }



    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("asia/jakarta");
    }

    public function getDataSakit()
    {

        $query = "SELECT m.id_monitor, m.tanggal, m.id_karyawan, m.jenis_penyakit, m.obat, m.kondisi, m.covid, m.rm_sakit, m.no_kamar, m.alamat, m.jenis_isolasi, u.id_karyawan, u.nama FROM tb_sakit m LEFT JOIN tb_karyawan u ON m.id_karyawan = u.id_karyawan ORDER BY m.id_monitor DESC ";
        $sakit = $this->db->query($query)->result_array();
        return $sakit;
    }

    public function getUser()
    {
        $db2 = $this->load->database('db2', TRUE);
        $query = "SELECT id_user, nama FROM user_ho ORDER BY id_user DESC";
        $user = $db2->query($query)->result_array();
        return $user;
    }

    public function insert($data)
    {
        $this->db->insert('tb_monitoring', $data);
        return TRUE;
    }

    public function getData()
    {
        $this->db->where('id_user', $this->session->userdata['id']);
        $q = $this->db->get('tb_monitoring');
        return $q->result_array();
    }
}

/* End of file Home_m.php */