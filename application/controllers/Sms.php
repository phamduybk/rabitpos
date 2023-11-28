<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
	}
	
	//Open SMS Form 
	public function index(){
		$this->permission_check('send_sms');
		$data=$this->data;
		$data['page_title']=$this->lang->line('send_sms');
		$this->load->view('sms', $data);
	}


	//Create Message
	public function send_message(){
		$this->permission_check('send_sms');
		$data=$this->data;
		$this->load->model('sms_model');
		extract($this->security->xss_clean(html_escape($_POST)));
		$result= $this->sms_model->send_sms($mobile,$message);
		echo $result;
	}

	
	//Open SMS API Form 
	public function api(){
		$this->permission_check('sms_api_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('sms_api');
		$this->load->view('sms-api', $data);
	}

	//UPDATE SMS API
	public function api_update(){
		$this->permission_check_with_msg('sms_api_edit');
		$this->load->model('sms_model');
    	echo $this->sms_model->api_update();
	}
}

