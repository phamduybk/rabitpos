<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		if($this->get_current_version_of_db()!=app_version()){ redirect(base_url('updates/update_db'),'refresh'); }
	}
	public function dashboard_values(){
		$this->load->model('dashboard_model');//Model
		$data=$this->dashboard_model->breadboard_values();//Model->Method
		return $data;
	}
	public function test(){
		$this->permission_check('items_category_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('category');
		$this->load->view('test.php', $data);
	}
	public function index()
	{	
		$data1=$this->data;
		$data2=$this->dashboard_values();
		$data=array_merge($data1,$data2);
		$data['page_title']=$this->lang->line('dashboard');
		
		if(!$this->permissions('dashboard_view')){
			$this->load->view('role/dashboard_empty',$data);
		}
		else{
			$this->load->view('dashboard',$data);
		}
		
	}
	
}
