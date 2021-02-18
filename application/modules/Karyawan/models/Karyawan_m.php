<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_m extends CI_Model
{

    function fetch_single_details($id_karyawan)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        $data = $this->db->get('tb_karyawan');
        $output = '<table width="100%" >';
        foreach ($data->result() as $row) {
            $output .= '
			<tr>
				
                <p><img src="/var/www/html/monkes/assets/uploads/' . $row->ktp . '" alt="Trulli" width="500" height="333"/></p>
                <p><img src="/var/www/html/monkes/assets/uploads/' . $row->kk . '" alt="Trulli" width="500" height="333"/></p>
                <p><img src="/var/www/html/monkes/assets/uploads/' . $row->bpjs . '" alt="Trulli" width="500" height="333"/></p>
               
			</tr>

			';
        }

        $output .= '</table>';
        return $output;
    }

    public function get_cmb_karyawan()
    {
        $query = "SELECT nama FROM absensi_ho_20200910.user_ho WHERE id_user = '" . $this->input->post('id') . "'";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }

    public function get_id($id)
    {
        $this->db->where('id_karyawan', $id);
        $q = $this->db->get('tb_karyawan');
        $data = $q->result();

        return $data;
    }

    public function getUser()
    {
        $db2 = $this->load->database('db2', TRUE);
        $query = "SELECT id_user, nama FROM user_ho ORDER BY id_user DESC";
        $user = $db2->query($query)->result_array();
        return $user;
    }

    function update($id, $data)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->update('tb_karyawan', $data);

        return TRUE;
    }

    public function getKaryawan()
    {
        $query = "SELECT * FROM tb_karyawan k ORDER BY k.id_karyawan DESC ";
        $data = $this->db->query($query)->result();
        return $data;
    }

    public function insert($data)
    {
        $this->db->insert('tb_karyawan', $data);
        return TRUE;
    }

    function delete($data)
    {
        $this->db->where($data);
        $this->db->delete('tb_karyawan');
        return TRUE;
    }
}

/* End of file Karyawan_m.php */