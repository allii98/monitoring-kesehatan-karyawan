<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("asia/jakarta");
    }

    function suhu_pagi()
    {
        $id_user = $this->input->post('id_user');
        $suhu = $this->input->post('masuk');
        $petugas1 = $this->input->post('petugas1');
        // var_dump($ip);
        $data = [

            'tanggal' => date('Y-m-d'),
            'id_user' => $id_user,
            'masuk' => $suhu,
            'petugas1' => $petugas1

        ];
        return $this->db->insert('tb_suhu', $data);
    }

    function suhu_pulang()
    {
        $id_user = $this->input->post('id_user');
        $suhu = $this->input->post('keluar');
        $petugas2 = $this->input->post('petugas2');
        // var_dump($ip);
        $data = [
            'keluar' => $suhu,
            'petugas2' => $petugas2

        ];
        $this->db->where('id_user', $id_user);
        $this->db->where('tanggal', date('Y-m-d'));
        return $this->db->update('tb_suhu', $data);
    }

    public function ceksuhu()
    {
        $id = $this->input->post('id');
        $data_suhu = date('Y-m-d');
        $query = "SELECT * FROM tb_suhu WHERE id_user = '" . $id . "' AND tanggal = '" . $data_suhu . "'";
        $suhu = $this->db->query($query)->num_rows();
        $suhu1 = $this->db->query($query)->row();
        if ($suhu == 0) {
            $data = [
                'status' => false,
                'msg' => ''
            ];
            return $data;
        } else {
            $data = [
                'status' => true,
                'msg' => '',
                'pulang' => $suhu1->keluar
            ];
            return $data;
        }
    }

    public function getData()
    {
        $tgl = date('Y-m-d');
        $query = "SELECT s.id_suhu, s.tanggal, s.id_user, s.masuk, s.petugas1,s.keluar,s.petugas2, u.id_user, u.nama FROM tb_suhu s LEFT JOIN absensi_ho_20200910.user_ho u ON s.id_user = u.id_user  WHERE s.tanggal = '$tgl'";
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
        $this->db->insert('tb_suhu', $data);
        return TRUE;
    }

    public function get_id($id)
    {
        $this->db->where('id_suhu', $id);
        $q = $this->db->get('tb_suhu');
        $data = $q->result_array();

        return $data;
    }

    function update($id, $data)
    {
        $this->db->where('id_suhu', $id);
        $this->db->update('tb_suhu', $data);

        return TRUE;
    }
}

/* End of file Dashboard_m.php */