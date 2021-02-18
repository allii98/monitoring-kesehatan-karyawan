<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('userlogin')) {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pesan', $pemberitahuan);
            redirect('Login');
        }
        $this->load->model('Home_m');
    }


    public function index()
    {

        $data = [
            'tittle'          => 'User Sakit',
            'user' => $this->Home_m->getUser(),
            'sakit' => $this->Home_m->getData()
        ];
        $this->template->load('template', 'v_suhu', $data);
    }

    public function suhu()
    {
        $data = [
            'tittle'          => 'Dashboard',
            'user' => $this->Home_m->getUser(),
            'sakit' => $this->Home_m->getData()
        ];
        $this->template->load('template', 'v_suhu', $data);
    }

    public function all()
    {
        $data = [
            'tittle'          => 'Daftar Semua Karyawan Sakit',
            'sakit' => $this->Home_m->getDataSakit()
        ];
        $this->template->load('template', 'v_data', $data);
    }

    public function detail($id = null)
    {
        $data = [
            'tittle'          => 'Detail Karyawan Sakit',
            'user' => $this->Home_m->get_user(),
            'sakit' => $this->Home_m->get_id($id)
        ];
        $this->template->load('template', 'v_detail', $data);
    }


    public function simpan()
    {
        // $tgl = $this->input->post('tanggal');
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $suhu = $this->input->post('suhu');
        $oksigen = $this->input->post('oksigen');
        $bab = $this->input->post('bab');
        $batuk = $this->input->post('batuk');
        $sesak = $this->input->post('sesak');



        $data = array(
            'id_user' => $id,
            'tanggal' => date('Ymd'),
            'nama' => $nama,
            'suhu' => $suhu,
            'oksigen' => $oksigen,
            'bab' => $bab,
            'batuk' => $batuk,
            'sesak' => $sesak
        );

        echo "<pre>";
        print_r($data);

        $this->Home_m->insert($data);
        $this->session->set_flashdata("status", "Semoga");
        redirect(base_url('Home'));
    }
}

/* End of file Controllername.php */