<?php
require_once('assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Mypdf
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($view, $data = array(), $filename = 'Laporan', $papper = 'A4', $orientation = 'portrait')
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($papper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();
        $dompdf->stream($filename .  ".pdf", array("Attachment" => FALSE));
    }
}
