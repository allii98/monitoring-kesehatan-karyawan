<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Monitor extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('Monitor_m');
    }

    public function getisinama()
    {
        $data = $this->Monitor_m->get_cmb_nama();
        echo json_encode($data);
    }


    public function index()
    {

        $this->sakit();
    }

    public function tambah()
    {
        $data = [
            'tittle'          => 'Tambah Data Karyawan Sakit',
            // 'sakit' => $this->Monitor_m->getData(),
            'user' => $this->Monitor_m->getUser(),
        ];
        $this->template->load('template', 'v_tambahsakit', $data);
    }

    public function tambahPost()
    {
        $tanggal = $this->input->post('tanggal');
        $nama = $this->input->post('nama');
        $kode = $this->input->post('nama_user');
        $jn = "";
        if (count($array = $this->input->post('jenis_penyakit', TRUE))) {
            $jn = implode(",", $array);
        }
        $lain = $this->input->post('lain');
        $obat = $this->input->post('obat');
        $vitamin = $this->input->post('vitamin');
        $kondisi = $this->input->post('kondisi');
        $covid = $this->input->post('covid');
        $jenis_isolasi = "";
        if (count($array = $this->input->post('jenis_isolasi', TRUE))) {
            $jenis_isolasi = implode(",", $array);
        }
        $jenis_rawat = $this->input->post('jenis_rawat');
        $rm = $this->input->post('rm');
        $nok = $this->input->post('nok');
        $alamat = $this->input->post('alamat');


        $data = array(
            'kode' => $kode,
            'id_karyawan' => $nama,
            'tanggal' => $tanggal,
            'jenis_penyakit' => $jn,
            'isi_lainnya' => $lain,
            'obat' => $obat,
            'vitamin' => $vitamin,
            'kondisi' => $kondisi,
            'covid' => $covid,
            'jenis_isolasi' => $jenis_isolasi,
            'isi_isolasi_m' => $jenis_rawat,
            'rm_sakit' => $rm,
            'no_kamar' => $nok,
            'alamat' => $alamat
        );

        $this->Monitor_m->insert($data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Monitor/sakit'));
    }

    public function updatePost()
    {
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $nama = $this->input->post('nama');
        $jn = "";
        if (count($array = $this->input->post('jenis_penyakit', TRUE))) {
            $jn = implode(",", $array);
        }
        $lain = $this->input->post('lain');
        $obat = $this->input->post('obat');
        $vitamin = $this->input->post('vitamin');
        $kondisi = $this->input->post('kondisi');
        $covid = $this->input->post('covid');
        $jenis_isolasi = "";
        if (count($array = $this->input->post('jenis_isolasi', TRUE))) {
            $jenis_isolasi = implode(",", $array);
        }
        $jenis_rawat = $this->input->post('jenis_rawat');
        $rm = $this->input->post('rm');
        $nok = $this->input->post('nok');
        $alamat = $this->input->post('alamat');


        $data = array(
            'id_karyawan' => $nama,
            'tanggal' => $tanggal,
            'jenis_penyakit' => $jn,
            'isi_lainnya' => $lain,
            'obat' => $obat,
            'vitamin' => $vitamin,
            'kondisi' => $kondisi,
            'covid' => $covid,
            'jenis_isolasi' => $jenis_isolasi,
            'isi_isolasi_m' => $jenis_rawat,
            'rm_sakit' => $rm,
            'no_kamar' => $nok,
            'alamat' => $alamat
        );
        $this->Monitor_m->update($id, $data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Monitor/sakit'));
    }

    public function deleteSakit($id)
    {
        $data = array('id_monitor' => $id);
        $this->Monitor_m->delete($data);
        $this->session->set_flashdata("pesan", "Berhasil Hapus");
        redirect(base_url('Monitor/sakit'));
    }

    function sakit()
    {
        $data = [
            'tittle'          => 'Data Karyawan Sakit',
            'sakit' => $this->Monitor_m->getDataSakit()
        ];
        $this->template->load('template', 'v_sakit', $data);
        // print_r($data);
    }

    public function all()
    {
        $data = [
            'tittle'          => 'Daftar Semua Karyawan Sakit',
            'sakit' => $this->Monitor_m->getDataSakit()
        ];
        $this->template->load('template', 'v_data', $data);
    }


    public function updateKaryawanSakit($id = null)
    {
        $data = [
            'tittle'          => 'Update Karyawan Sakit',
            'user' => $this->Monitor_m->getUser(),
            'sakit' => $this->Monitor_m->get_id($id)
        ];
        $this->template->load('template', 'v_editSakit', $data);
    }


    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;

        return $config;
    }

    public function detail($id = null)
    {
        $data = [
            'tittle'          => 'Detail Karyawan Sakit',
            'user' => $this->Monitor_m->getUser(),
            'sakit' => $this->Monitor_m->get_id($id)
        ];
        $this->template->load('template', 'v_detail', $data);
    }


    public function updatePostCovid()
    {
        $id = $this->input->post('id');
        $jn = "";
        if (count($array = $this->input->post('jenis_isolasi', TRUE))) {
            $jn = implode(",", $array);
        }
        $covid = $this->input->post('covid');
        $rm = $this->input->post('rm');
        $nok = $this->input->post('nok');
        $alamat = $this->input->post('alamat');



        // echo '<pre>';
        // print_r($foto);
        $data = array(
            'jenis_isolasi' => $jn,
            'isi_isolasi_m' => $covid,
            'rm_sakit' => $rm,
            'no_kamar' => $nok,
            'alamat' => $alamat
        );
        $this->Monitor_m->update($id, $data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Monitor/covid'));
    }
}

/* End of file Controllername.php */