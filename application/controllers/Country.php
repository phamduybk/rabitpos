<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('country_model','country');
	}

	public function index(){
		$this->permission_check('places_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('countries_list');
		$this->load->view('country-list', $data);
	}
	public function newcountry(){
		$this->form_validation->set_rules('country_name', 'Country', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$result=$this->country->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter country name.";
		}
	}
	public function update($id){
		$this->permission_check('places_edit');
		$result=$this->country->get_details($id);
		$data=array_merge($this->data,$result);
		$data['page_title']=$this->lang->line('country');
		$this->load->view('country', $data);
	}
	public function update_country(){
		
		$this->form_validation->set_rules('country_name', 'country', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result=$this->country->update_country();
			echo $result;
		} else {
			echo "Please Enter country name.";
		}
	}
	public function add(){
		$this->permission_check('places_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('country');
		$this->load->view('country', $data);
	}

	public function ajax_list()
	{
		$list = $this->country->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $country) {
			$no++;
			$row = array();
			$row[] = $country->country;
			

			 		if($country->status==1){ 
			 			$str= "<span onclick='update_status(".$country->id.",0)' id='span_".$country->id."'  class='label label-success' style='cursor:pointer'>Active </span>";}
					else{ 
						$str = "<span onclick='update_status(".$country->id.",1)' id='span_".$country->id."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
					}
			$row[] = $str;			
			         $str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('places_edit'))
											$str2.='<li>
												<a title="Edit Record ?" href="country/update/'.$country->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('places_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_country('.$country->id.')">
													<i class="fa fa-fw fa-trash text-red"></i>Delete
												</a>
											</li>
											
										</ul>
									</div>';			
			$row[] = $str2;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->country->count_all(),
						"recordsFiltered" => $this->country->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function update_status(){
		$this->permission_check_with_msg('places_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$result=$this->country->update_status($id,$status);
		return $result;
	}
	public function delete_country(){
		$this->permission_check_with_msg('places_delete');
		$id=$this->input->post('q_id');
		$result=$this->country->delete_country($id);
		return $result;
	}
}

