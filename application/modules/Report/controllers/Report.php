<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_m');
    }


    public function index()
    {
        $data = [
            'tittle'          => 'Laporan karyawan Sakit',
            'user' => $this->Report_m->getUser()
        ];
        $this->template->load('template', 'v_semua', $data);
    }

    public function suhu()
    {
        $data = [
            'tittle'          => 'Laporan suhu karyawan',
            'user' => $this->Report_m->get_user()
        ];
        $this->template->load('template', 'v_suhu', $data);
    }

    public function process_suhu_employee($startDate, $endDate, $employeeId)
    {
        // data process
        $startDate = str_replace('_', '-', $startDate);
        $startDate = str_replace('!', '', $startDate);

        $data = $this->Report_m->process_suhu_employee($startDate, $endDate, $employeeId);

        $date_a = strtotime($startDate);
        $date_b = strtotime($endDate);
        $datediff = $date_b - $date_a;

        $days = round($datediff / (60 * 60 * 24));

        $data['data'] = $data;
        $data['days']        = $days;
        $data['employeeId'] = $employeeId;
        $data['period']        = $startDate . ' - ' . $endDate;
        $data['startDate']  = $startDate;
        $data['endDate']    = $endDate;

        // echo '<pre>';
        // print_r($data);

        $this->load->view('v_tampilSuhu', $data);
    }

    public function pdf_suhu_employee($startDate, $endDate, $employeeId)
    {
        // data process
        $startDate = str_replace('_', '-', $startDate);
        $startDate = str_replace('!', '', $startDate);

        $data = $this->Report_m->process_suhu_employee($startDate, $endDate, $employeeId);

        $date_a = strtotime($startDate);
        $date_b = strtotime($endDate);
        $datediff = $date_b - $date_a;

        $days = round($datediff / (60 * 60 * 24));

        $data['data'] = $data;
        $data['days']        = $days;
        $data['employeeId'] = $employeeId;
        $data['period']        = $startDate . ' - ' . $endDate;
        $data['startDate']  = $startDate;
        $data['endDate']    = $endDate;

        $this->load->library('Mypdf');

        $this->mypdf->generate('pdf_suhu', $data);
    }

    public function process_all_employee($employeeId)
    {

        $data = $this->Report_m->process_per_employee($employeeId);

        $data['data'] = $data;

        $data['employeeId'] = $employeeId;
        // print_r($data);
        $this->load->view('tampil', $data);
    }

    public function perkaryawan()
    {
        $data = [
            'tittle'          => 'Laporan karyawan terpapar covid19',
            'user' => $this->Report_m->getUserCovid()
        ];
        $this->template->load('template', 'v_perkaryawan', $data);
    }

    public function process_per_employee($employeeId)
    {


        $data = $this->Report_m->process_per_employee($employeeId);

        $data['data'] = $data;

        $data['employeeId'] = $employeeId;
        // print_r($data);
        $this->load->view('v_covid', $data);
    }

    public function pdf_per_employee($employeeId)
    {

        $data = $this->Report_m->process_per_employee($employeeId);


        $data['data'] = $data;

        $data['employeeId'] = $employeeId;
        // echo '<pre>';
        $this->load->library('Mypdf');

        $this->mypdf->generate('pdf_covid', $data);
    }

    public function pdf_all_employee($employeeId)
    {

        $data = $this->Report_m->process_per_employee($employeeId);

        $data['data'] = $data;

        $data['employeeId'] = $employeeId;
        // echo '<pre>';
        // print_r($data);

        $this->load->library('Mypdf');


        $this->mypdf->generate('pdf_all_karyawan', $data);
    }
}

/* End of file Report.php */