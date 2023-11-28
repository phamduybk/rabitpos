<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

use chillerlan\QRCode\{QRCode, QROptions};

class Qrcode_model extends CI_Model {
    public function __construct(){
		parent::__construct();
	}

	public function qr_image($data='')
	{
		$data  = trim($data);	

		//if the parameter value has slash
		$data = base64_decode(str_replace('-', '=', str_replace('_', '/', $data)));

		// quick and simple:
		//return '<img src="'.(new QRCode)->render($data).'" alt="QR Code" />';
		
		return (!empty($data)) ? '<img src="'.(new QRCode)->render($data).'" alt="QR Code" />' : '';		
	}
}