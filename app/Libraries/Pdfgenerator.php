<?php namespace App\Libraries;

use Dompdf\Dompdf;

class Pdfgenerator {
  public function generate($html, $filename, $stream, $paper, $orientation)
  {
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    if ($stream == TRUE) {
        $dompdf->stream($filename.".pdf", array("Attachment" => false));
    } else {
        return $dompdf->output();
    }
  }
}