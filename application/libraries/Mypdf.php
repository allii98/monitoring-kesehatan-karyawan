<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Mypdf
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'letter', $orientation = 'landscape')
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);
        // $dompdf->set_option('chroot', __DIR__);
        // Render the HTML as PDF
        $dompdf->render();
        // $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
        $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    }
}

/* End of file Mypdf.php */