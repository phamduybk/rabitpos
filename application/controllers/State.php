<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('state_model','state');
	}

	public function index(){
		$this->permission_check('places_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('states_list');
		$this->load->view('state-list', $data);
	}
	public function newstate(){
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$result=$this->state->verify_and_save();
			echo $result;
		} else {
			echo "Please enter compulsary(* marked) fields!";
		}
	}
	public function update($id){
		$this->permission_check('places_edit');
		$result=$this->state->get_details($id);
		$data=array_merge($this->data,$result);
		$data['page_title']=$this->lang->line('state');
		$this->load->view('state', $data);
	}
	public function update_state(){
		
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$result=$this->state->update_state();
			echo $result;
		} else {
			echo "Please Enter state name.";
		}
	}
	public function add(){
		$this->permission_check('places_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('state');
		$this->load->view('state', $data);
	}

	public function ajax_list()
	{
		$list = $this->state->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $state) {
			$no++;
			$row = array();
			$row[] = $state->state;
			$row[] = $state->country;
			

			 		if($state->status==1){ 
			 			$str= "<span onclick='update_status(".$state->id.",0)' id='span_".$state->id."'  class='label label-success' style='cursor:pointer'>Active </span>";}
					else{ 
						$str = "<span onclick='update_status(".$state->id.",1)' id='span_".$state->id."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
					}
			$row[] = $str;			
			         $str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('places_edit'))
											$str2.='<li>
												<a title="Edit Record ?" href="state/update/'.$state->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('places_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_state('.$state->id.')">
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
						"recordsTotal" => $this->state->count_all(),
						"recordsFiltered" => $this->state->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function update_status(){
		$this->permission_check_with_msg('places_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$result=$this->state->update_status($id,$status);
		return $result;
	}
	public function delete_state(){
		$this->permission_check_with_msg('places_delete');
		$id=$this->input->post('q_id');
		$result=$this->state->delete_state($id);
		return $result;
	}
}

