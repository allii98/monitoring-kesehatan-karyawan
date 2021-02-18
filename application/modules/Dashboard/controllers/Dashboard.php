<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Dashboard_m');
    }

    public function getisinama()
    {
        $data = $this->Dashboard_m->ceksuhu();
        echo json_encode($data);
    }

    function suhu_masuk()
    {
        $data = $this->Dashboard_m->suhu_pagi();
        echo json_encode($data);
    }

    function suhu_pulang()
    {
        $data = $this->Dashboard_m->suhu_pulang();
        echo json_encode($data);
    }


    public function index()
    {
        $data = [
            'tittle'          => 'Monitoring suhu tubuh karyawan',
            'user' => $this->Dashboard_m->getUser(),
            'get' => $this->Dashboard_m->getData(),
        ];
        $this->template->load('template', 'v_beranda', $data);
    }

    public function simpan()
    {
        $tgl = $this->input->post('tanggal');
        $nama = $this->input->post('nama');
        $suhu = $this->input->post('masuk');
        $petugas = $this->input->post('p');

        $data = array(
            'tanggal' => $tgl,
            'id_user' => $nama,
            'masuk' => $suhu,
            'petugas1' => $petugas
        );
        $this->Dashboard_m->insert($data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Dashboard'));
    }

    public function editsuhu($id = null)
    {
        $data = [
            'tittle' => "Data Asset",
            'user' => $this->Dashboard_m->getUser(),
            'suhu' => $this->Dashboard_m->get_id($id),
        ];
        // print_r($data);
        $this->load->view('Dashboard/v_edit', $data);
    }

    public function editpost()
    {
        $id = $this->input->post('id');
        $suhu = $this->input->post('masuk');
        $petugas = $this->input->post('p');

        $data = array(

            'keluar' => $suhu,
            'petugas2' => $petugas
        );
        $this->Dashboard_m->update($id, $data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Dashboard'));
    }
}

/* End of file Dashboaard.php */