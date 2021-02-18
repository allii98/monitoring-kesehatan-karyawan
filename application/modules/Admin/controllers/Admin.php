<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_m');
        $this->load->model('Admin_m');
        if (!$this->session->userdata('userlogin')) {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pesan', $pemberitahuan);
            redirect('Login');
        }
    }

    /**
     * Generated data untuk chart di frontend
     *
     * @return JSON chart data
     */
    private function getChart()
    {
        //get data from db
        $monitors = $this->db->select("id_monitor,covid,MONTH(tanggal) as bulan")
            ->from('tb_sakit')
            ->where('YEAR(tanggal)=' . date('Y'))
            ->get()->result();

        //deklarasi variable chart dan membuat struktur chart bulan
        $charts = ["positive" => [], "negative" => []];
        for ($i = 1; $i <= 12; $i++) {
            @$charts["positive"][$i] = 0;
            @$charts["negative"][$i] = 0;
        }

        //mengisi data dari db ke var charts sesuai dengan ketentuan bulan dan status
        foreach ($monitors as $m) {
            if ($m->covid == 2) {
                $charts["negative"][$m->bulan] = $charts["negative"][$m->bulan] + 1;
            } else {
                $charts["positive"][$m->bulan] = $charts["positive"][$m->bulan] + 1;
            }
        }
        //menghapus index
        $_tmpChart = ["negative" => [], "positive" => []];
        foreach ($charts["negative"] as $cn) {
            $_tmpChart["negative"][] = $cn;
        }
        foreach ($charts["positive"] as $cp) {
            $_tmpChart["positive"][] = $cp;
        }

        // mengubah data chart ke json
        return json_encode($_tmpChart);
    }
    public function index()
    {
        $db2 = $this->load->database('db2', TRUE);
        $user = $db2->query("SELECT COUNT(id_user) AS usr FROM user_ho WHERE id_user ")->row();
        $sakit = $this->db->query("SELECT COUNT(id_monitor) AS monitor FROM tb_sakit WHERE id_monitor")->row();
        $positif = $this->db->query("SELECT COUNT(id_monitor) AS monitor FROM tb_sakit WHERE covid IN (1)")->row();
        $negatif = $this->db->query("SELECT COUNT(id_monitor) AS monitor FROM tb_sakit WHERE covid IN (2)")->row();




        $data = [
            'tittle'          => 'Dashboard',
            'get' => $this->Admin_m->getDataSuhu(),
            "user" => $user->usr,
            "sakit" => $sakit->monitor,
            "positif" => $positif->monitor,
            "negatif" => $negatif->monitor,
            "chart" => $this->getChart()

        ];
        // print_r($data);
        $this->template->load('template', 'dashboard', $data);
    }
}