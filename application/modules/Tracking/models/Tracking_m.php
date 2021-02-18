<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Tracking_m extends CI_Model
{

    public function getKode()
    {
        $query = "SELECT id_monitor, kode FROM tb_sakit ORDER BY id_monitor DESC ";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }

    public function getFilter($kode)
    {
        # code...
        $query = "SELECT m.id_tracking, m.tanggal, m.id_karyawan, m.jam, m.nama_tracking, m.lokasi, m.savety, m.jarak, m.kondisi, m.suhu, m.oksigen, u.id_karyawan, u.kode, p.id_karyawan, p.nama FROM tb_traking m LEFT JOIN tb_sakit u ON m.id_karyawan = u.id_karyawan LEFT JOIN tb_karyawan p ON m.id_karyawan = p.id_karyawan WHERE u.kode = '$kode'";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }

    public function getUser()
    {
        $db2 = $this->load->database('db2', TRUE);
        $query = "SELECT id_user, nama FROM user_ho ORDER BY id_user DESC";
        $user = $db2->query($query)->result_array();
        return $user;
    }
    public function getPasien()
    {
        $query = "SELECT s.id_karyawan, u.id_karyawan, u.nama FROM tb_sakit s LEFT JOIN tb_karyawan u ON s.id_karyawan = u.id_karyawan ORDER BY s.id_karyawan DESC ";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }
    public function getTracking()
    {
        $query = "SELECT m.id_tracking, m.tanggal, m.id_karyawan, m.jam, m.nama_tracking, m.lokasi, m.savety, m.jarak, m.kondisi, m.suhu, m.oksigen, u.id_karyawan, u.nama FROM tb_traking m LEFT JOIN tb_karyawan u ON m.id_karyawan = u.id_karyawan  ORDER BY m.id_tracking DESC";
        $sakit = $this->db->query($query)->result_array();
        return $sakit;
    }

    public function insert($data)
    {
        $this->db->insert('tb_traking', $data);
        return TRUE;
    }

    public function get_id($id)
    {
        $q = $this->db->query("SELECT * FROM tb_traking t LEFT JOIN tb_karyawan u ON t.id_karyawan = u.id_karyawan WHERE t.id_tracking = '$id' ");
        $data = $q->result_array();

        return $data;
    }

    function update($id, $data)
    {
        $this->db->where('id_tracking', $id);
        $this->db->update('tb_traking', $data);

        return TRUE;
    }
    function delete($data)
    {
        $this->db->where($data);
        $this->db->delete('tb_traking');
        return TRUE;
    }
}

/* End of file Tracking_m.php */