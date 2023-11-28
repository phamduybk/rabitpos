<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();
	}

	public function index()
	{
		$this->permission_check('company_edit');
		$this->load->model('company_model');
		$data = $this->company_model->get_details();
		$data['page_title'] = $this->lang->line('company_profile');
		$this->load->view('company-profile', $data);
	}
	public function update_company()
	{
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
		//$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		//	$this->form_validation->set_rules('city', 'city', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('company_model');
			$result = $this->company_model->update_company();
			echo $result;
		} else {
			echo "Please Enter Compulsary(* marked) fields!";
		}
	}



}
