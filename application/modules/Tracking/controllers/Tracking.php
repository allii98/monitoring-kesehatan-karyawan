<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('Tracking_m');
    }


    public function index()
    {
        $data = [
            'tittle'          => 'Data Tracking Karyawan',
            'tracking' => $this->Tracking_m->getTracking(),
            'kode' => $this->Tracking_m->getKode()
        ];
        // print_r($data);
        $this->template->load('template', 'v_tracking', $data);
    }

    public function filter()
    {
        $data['tittle']  = 'Data Tracking Karyawan';
        $data['kode']  = $this->Tracking_m->getKode();

        $kode = $this->input->get("kode");
        $data['tracking']  = $this->Tracking_m->getFilter($kode);
        // print_r($data);
        $this->template->load('template', 'v_tracking', $data);
    }

    public function tambah()
    {
        $data = [
            'tittle'          => 'Tamnbah data',
            'pasien' => $this->Tracking_m->getPasien()
            // 'covid' => $this->Monitor_m->getCovid(),
        ];
        // print_r($data);
        $this->template->load('template', 'v_tambah', $data);
    }

    public function simpan()
    {
        $namaPasien = $this->input->post('namaPasien');
        $tgl = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $nama = $this->input->post('nama');
        $lok = $this->input->post('lok');
        $savety = $this->input->post('savety');
        $jarak = $this->input->post('jarak');
        $kondisi = $this->input->post('kondisi');
        $suhu = $this->input->post('suhu');
        $oksigen = $this->input->post('oksigen');

        $data = array(
            'tanggal' => $tgl,
            'id_karyawan' => $namaPasien,
            'jam' => $jam,
            'nama_tracking' => $nama,
            'lokasi' => $lok,
            'savety' => $savety,
            'jarak' => $jarak,
            'kondisi' => $kondisi,
            'suhu' => $suhu,
            'oksigen' => $oksigen
        );
        $this->Tracking_m->insert($data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Tracking'));
    }

    public function update($id = null)
    {
        $data = [
            'tittle'          => 'Update Tracking',
            'pasien' => $this->Tracking_m->getPasien(),
            'track' => $this->Tracking_m->get_id($id)
        ];
        $this->template->load('template', 'v_edit', $data);
    }

    public function updatePost()
    {
        $id = $this->input->post('id');
        $namaPasien = $this->input->post('namaPasien');
        $tgl = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $nama = $this->input->post('nama');
        $lok = $this->input->post('lok');
        $savety = $this->input->post('savety');
        $jarak = $this->input->post('jarak');
        $kondisi = $this->input->post('kondisi');
        $suhu = $this->input->post('suhu');
        $oksigen = $this->input->post('oksigen');

        $data = array(
            'tanggal' => $tgl,
            'id_karyawan' => $namaPasien,
            'jam' => $jam,
            'nama_tracking' => $nama,
            'lokasi' => $lok,
            'savety' => $savety,
            'jarak' => $jarak,
            'kondisi' => $kondisi,
            'suhu' => $suhu,
            'oksigen' => $oksigen
        );
        $this->Tracking_m->update($id, $data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Tracking'));
    }

    public function delete($id)
    {
        $data = array('id_tracking' => $id);
        $this->Tracking_m->delete($data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Tracking'));
    }
}

/* End of file Tracking.php */