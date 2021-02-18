<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("asia/jakarta");
        $this->load->model('Karyawan_m');
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

    public function getisikar()
    {
        $data = $this->Karyawan_m->get_cmb_karyawan();
        echo json_encode($data);
    }



    public function index()
    {
        $data = [
            'tittle'          => 'Data Karyawan',
            'user' => $this->Karyawan_m->getUser(),
            'karyawan' => $this->Karyawan_m->getKaryawan()
        ];
        $this->template->load('template', 'v_karyawan', $data);
    }

    public function simpan()
    {
        $nama_user = $this->input->post('nama_user');
        $nama = $this->input->post('nama');
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload();
            $dataInfo[] = $this->upload->data();
        }
        $data = array(
            'id_user' => $nama,
            'nama' => $nama_user,
            'tanggal' => date('Y-m-d H:i:s'),
            'ktp' => $dataInfo[0]['file_name'],
            'kk' => $dataInfo[1]['file_name'],
            'bpjs' => $dataInfo[2]['file_name']
        );
        $this->Karyawan_m->insert($data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Karyawan'));
    }

    public function edit($id = null)
    {
        $data = [
            'tittle' => "Edit Karayawan",
            'karyawan' => $this->Karyawan_m->get_id($id),
            'user' => $this->Karyawan_m->getUser(),
        ];
        // print_r($data);
        $this->load->view('Karyawan/v_edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $nama_user = $this->input->post('nama_user');
        $nama = $this->input->post('nama');
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload();
            $dataInfo[] = $this->upload->data();
        }
        $a = $dataInfo[0]['file_name'];
        $ktp = "";
        if ($a == "") {
            $ktp = $this->input->post('ktp');
        } else if ($a != "") {
            $ktp = $dataInfo[0]['file_name'];
        }

        $b = $dataInfo[1]['file_name'];
        $kk = "";
        if ($b == "") {
            $kk = $this->input->post('kk');
        } else if ($b != "") {
            $kk = $dataInfo[1]['file_name'];
        }

        $c = $dataInfo[2]['file_name'];
        $bpjs = "";
        if ($c == "") {
            $bpjs = $this->input->post('bpjs');
        } else if ($c != "") {
            $bpjs = $dataInfo[2]['file_name'];
        }

        $data = array(
            'id_user' => $nama,
            'nama' => $nama_user,
            'tanggal' => date('Y-m-d H:i:s'),
            'ktp' => $ktp,
            'kk' => $kk,
            'bpjs' => $bpjs
        );
        $this->Karyawan_m->update($id, $data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Karyawan'));
    }

    public function cetak($id = null)
    {
        $data['karyawan'] = $this->Karyawan_m->get_id($id);

        $this->load->library('Mypdf');
        $this->mypdf->generate('print', $data);
        // $this->load->view('print', $data);
    }

    public function delete($id)
    {
        $data = array('id_karyawan' => $id);
        $this->Karyawan_m->delete($data);
        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Karyawan'));
    }

    public function pdfdetails($id_karyawan = null)
    {

        $this->load->library('Pdf');
        $html_content = '<h3 align="center">Data Karyawan</h3>';
        $html_content .= $this->Karyawan_m->fetch_single_details($id_karyawan);
        $this->pdf->loadHtml($html_content);
        $this->pdf->render();
        $this->pdf->stream("" . $id_karyawan . ".pdf", array("Attachment" => 0));
        // $this->mypdf->generate('pdf_all_karyawan', $html_content);
    }
}

/* End of file Karyawan.php */