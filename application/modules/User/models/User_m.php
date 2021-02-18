<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    function get_user()
    {

        $this->db->select('user_id,user_nama,username,level');
        $this->db->from('tbuser');

        $this->db->order_by('user_id', 'DESC');


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function get_cmb_karyawan()
    {
        $query = "SELECT nama FROM absensi_ho_20200910.user_ho WHERE id_user = '" . $this->input->post('id') . "'";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }

    public function get_cmb_nama()
    {
        $query = "SELECT s.id_monitor,s.kode, s.id_user, u.id_user, u.nama FROM tb_sakit s LEFT JOIN absensi_ho_20200910.user_ho u ON s.id_user = u.id_user WHERE s.id_monitor = '" . $this->input->post('id') . "'";
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

    function add_user($data)
    {
        $this->db->insert('tbuser', $data);
        return TRUE;
    }

    function update_user($id, $data)
    {
        $this->db->where('user_id', $id);
        $this->db->update('tbuser', $data);

        return TRUE;
    }

    function delete($data)
    {
        $this->db->where($data);
        $this->db->delete('tbuser');
        return TRUE;
    }
}

/* End of file User_m.php */