<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('bcrypt');
        $this->load->model('User_m');
    }

    public function getisikar()
    {
        $data = $this->User_m->get_cmb_karyawan();
        echo json_encode($data);
    }

    public function index()
    {
        $data = [
            'tittle'          => 'Daftar Karyawan',
            'user'              => $this->User_m->get_user(),
            'usr'              => $this->User_m->getUser()
        ];
        $this->template->load('template', 'v_karyawan', $data);
    }

    public function getisinama()
    {
        $data = $this->User_m->get_cmb_nama();
        echo json_encode($data);
    }

    public function simpan()
    {
        $nama_user = $this->input->post('nama_user');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $level = $this->input->post('level');
        $pass = $this->input->post('pw');
        $hash = $this->bcrypt->hash_password($pass);

        $data = array(
            'id_user' => $nama,
            'user_nama' => $nama_user,
            'username' => $username,
            'user_pass' => $hash,
            'level' =>  $level

        );
        // print_r($data);
        $this->User_m->add_user($data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('User'));
    }

    public function update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');


        $data = array(
            'user_nama' => $nama,
            'username' => $username


        );


        $this->User_m->update_user($id, $data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('User'));
    }
    public function updatePW()
    {
        $id = $this->input->post('id');
        $pw1 = $this->input->post('pw_new');
        $pw2 = $this->input->post('pw_con');
        $hash = $this->bcrypt->hash_password($pw2);
        $data = array(
            'user_pass' => $hash
        );
        if ($pw1 === $pw2) {
            $this->User_m->update_user($id, $data);
            $this->session->set_flashdata("status", "Berhasil");
        } else {
            $this->session->set_flashdata("status2", "Tidak");
        }
        redirect(base_url('User'));
    }

    public function delete($id)
    {
        $data = array('user_id' => $id);
        $this->User_m->delete($data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('User'));
    }
}

/* End of file Controllername.php */