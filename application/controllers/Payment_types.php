<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_types extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('payment_types_model','payment_types');
	}

	public function add(){
		$this->permission_check('payment_types_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('payment_types');
		$this->load->view('payment_types', $data);
	}
	public function new_payment_type(){

		$this->form_validation->set_rules('payment_type_name', 'Payment Type Name', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			
			$result=$this->payment_types->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Payment Type Name.";
		}
	}
	public function update($id){
		$this->permission_check('payment_types_edit');
		$data=$this->data;
		$result=$this->payment_types->get_details($id,$data);
		$data=array_merge($data,$result);
		$data['page_title']=$this->lang->line('payment_types');
		$this->load->view('payment_types', $data);
	}
	public function update_payment_type(){
		$this->form_validation->set_rules('payment_type_name', 'Payment Type Name', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result=$this->payment_types->update_payment_type();
			echo $result;
		} else {
			echo "Please Enter Payment Type Name.";
		}
	}
	public function index(){
		$this->permission_check('payment_types_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('payment_types_list');
		$this->load->view('payment_types_list', $data);
	}

	public function ajax_list()
	{
		$list = $this->payment_types->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $payment_type) {
			$no++;
			$row = array();
			$row[] = $payment_type->payment_type;
			
			 		if($payment_type->status==1){ 
			 			$str= "<span onclick='update_status(".$payment_type->id.",0)' id='span_".$payment_type->id."'  class='label label-success' style='cursor:pointer'>Active </span>";}
					else{ 
						$str = "<span onclick='update_status(".$payment_type->id.",1)' id='span_".$payment_type->id."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
					}
			$row[] = $str;			
			         $str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('payment_types_edit'))
											$str2.='<li>
												<a title="Editd Record ?" href="'.base_url('payment_types/update/'.$payment_type->id).'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('payment_types_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_payment_type('.$payment_type->id.')">
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
						"recordsTotal" => $this->payment_types->count_all(),
						"recordsFiltered" => $this->payment_types->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function update_status(){
		$this->permission_check_with_msg('payment_types_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$result=$this->payment_types->update_status($id,$status);
		return $result;
	}
	public function delete_payment_type(){
		$this->permission_check_with_msg('payment_types_delete');
		$id=$this->input->post('q_id');
		$result=$this->payment_types->delete_payment_type($id);
		return $result;
	}
}

