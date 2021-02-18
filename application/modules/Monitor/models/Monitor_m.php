<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Monitor_m extends CI_Model
{

    public function insert($data)
    {
        $this->db->insert('tb_sakit', $data);
        return TRUE;
    }

    public function getUser()
    {
        // $db2 = $this->load->database('db2', TRUE);
        $query = "SELECT id_karyawan, k.nama FROM tb_karyawan k ORDER BY k.id_karyawan DESC";
        $user = $this->db->query($query)->result_array();
        return $user;
    }

    public function getData()
    {

        $query = "SELECT m.id_monitor, m.tanggal, m.id_user, m.jenis_penyakit, m.obat, m.kondisi, m.covid, u.id_user, u.nama FROM tb_monitoring m LEFT JOIN absensi_ho_20200910.user_ho u ON m.id_user = u.id_user  ORDER BY m.id_monitor DESC";
        $sakit = $this->db->query($query)->result_array();
        return $sakit;
    }
    public function getDataSakit()
    {

        $query = "SELECT m.id_monitor, m.tanggal, m.id_karyawan, m.jenis_penyakit, m.obat, m.kondisi, m.covid, m.rm_sakit, m.no_kamar, m.alamat, m.jenis_isolasi, u.id_karyawan, u.nama FROM tb_sakit m LEFT JOIN tb_karyawan u ON m.id_karyawan = u.id_karyawan ORDER BY m.id_monitor DESC ";
        $sakit = $this->db->query($query)->result_array();
        return $sakit;
    }

    public function getCovid()
    {

        $query = "SELECT m.id_monitor, m.tanggal, m.id_user, m.suhu, m.oksigen, m.bab, m.batuk, m.sesak,m.covid, u.id_user, u.nama FROM tb_monitoring m LEFT JOIN absensi_ho_20200910.user_ho u ON m.id_user = u.id_user  WHERE m.covid = 1";
        $sakit = $this->db->query($query)->result_array();
        return $sakit;
    }

    public function get_id($id)
    {
        $q = $this->db->query("SELECT * FROM tb_sakit t LEFT JOIN tb_karyawan u ON t.id_karyawan = u.id_karyawan WHERE t.id_monitor = '$id' ");
        $data = $q->result_array();

        return $data;
    }

    function update($id, $data)
    {
        $this->db->where('id_monitor', $id);
        $this->db->update('tb_sakit', $data);

        return TRUE;
    }

    function delete($data)
    {
        $this->db->where($data);
        $this->db->delete('tb_sakit');
        return TRUE;
    }

    public function get_cmb_nama()
    {
        $query = "SELECT nama FROM tb_karyawan WHERE id_karyawan = '" . $this->input->post('id') . "'";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }

    //Method yang digunakan untuk membuat kode user secara otomatis
    public function getkodeuser()
    {
        //Query untuk mengembalikan value terbesar yang ada di kolom id_user
        $query = $this->db->query("SELECT max(id_user) AS max_code FROM absensi_ho_20200910.user_ho");

        //Menampung fungsi yang akan mengembalikan hasil 1 baris dari query ke dalam variabel $row
        $row = $query->row_array();

        //Menampung hasil kode user terbesar dari query
        $max_id = $row['max_code'];

        //Membuat format kode user dengan dengan memulai kode dari posisi 1 dan panjang kode 4
        $max_fix = (int) substr($max_id, 1, 4);

        //Hasil dari kode terbesar yang sudah didapatkan ditambah dengan 1, hasil dari penjumlahan ini akan digunakan sebagai kode user terbaru
        $max_id_user = $max_fix + 1;

        //Membuat id_user dengan format U + kode user terbaru
        $id_user = "U" . sprintf("%04s", $max_id_user);
        return $id_user;
    }
}

/* End of file Monitor_m.php */