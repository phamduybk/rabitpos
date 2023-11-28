<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {
    public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('site_model');
	}
	public function index(){
		$this->permission_check('site_edit');
        $data=$this->site_model->get_details();
        $data['page_title']=$this->lang->line('site_settings');
		$this->load->view('site-settings', $data);
	}

	public function update_site(){
		$this->form_validation->set_rules('site_name', 'Site Name', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$result=$this->site_model->update_site();
			echo $result;
		} else {
			echo "Please Enter Compulsary(* marked) fields!";
		}
	}
	public function langauge($id){
		$this->load->model('language_model');
        $this->language_model->set($id);
        redirect($_SERVER['HTTP_REFERER']);
	}
}
