<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf_model extends CI_Model {

		public function render($html='',$pdf_name = 'Invoice'){

	        $options = new Options();

	        $options->setIsPhpEnabled(true);
	        $options->setIsRemoteEnabled(true);


	        $dompdf = new Dompdf();

	        $dompdf->setOptions($options);


	        // Load HTML content
	        $dompdf->loadHtml($html);
	        
	        // (Optional) Setup the paper size and orientation
	        $dompdf->setPaper('A4', 'portrait');/*landscape or portrait*/
	        
	        // Render the HTML as PDF
	        $dompdf->render();
	        // Output the generated PDF (1 = download and 0 = preview)
	        $dompdf->stream($pdf_name, array("Attachment"=>0));


		}

}
