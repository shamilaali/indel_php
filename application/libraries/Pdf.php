<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class Pdf
{
    function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='portrait'){
        //$dompdf = new Dompdf\Dompdf();
         $options = new Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', realpath(base_url()));
        $options->set('enable_font_subsetting', false);
        $options->set('pdf_backend', 'CPDF');
        $options->set('default_media_type', 'screen');
        $dompdf = new Dompdf\Dompdf($options);  
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    }
}
?>