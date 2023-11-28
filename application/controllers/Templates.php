<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('templates_model','templates');
	}

	public function sms_new(){
		$this->permission_check('sms_template_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('sms_template');
		$this->load->view('sms-template', $data);
	}
	public function newtemplate(){
		$this->permission_check('sms_template_add');
		$this->form_validation->set_rules('template_name', 'Templates', 'trim|required');
		$this->form_validation->set_rules('content', 'Templates', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			$result=$this->templates->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Templates name & Content!";
		}
	}
	public function update($id){
		$this->permission_check('sms_template_edit');
		$data=$this->data;
		$result=$this->templates->get_details($id,$data);
		$data=array_merge($data,$result);
		$data['page_title']=$this->lang->line('sms_template');
		$this->load->view('sms-template', $data);
	}
	public function update_template(){
		$this->permission_check('sms_template_edit');
		$this->form_validation->set_rules('template_name', 'Templates', 'trim|required');
		$this->form_validation->set_rules('content', 'Templates', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result=$this->templates->update_template();
			echo $result;
		} else {
			echo "Please Enter Templates name & Content!";
		}
	}
	public function sms(){
		$this->permission_check('sms_template_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('sms_templates_list');
		$this->load->view('sms-templates-list', $data);
	}

	public function ajax_list()
	{
		$list = $this->templates->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $templates) {
			$no++;
			$row = array();
			
			$row[] = $templates->id;
			$row[] = $templates->template_name;
			$row[] = $templates->content;

			 		if($templates->status==1){ 
			 			$str= "<span onclick='update_status(".$templates->id.",0)' id='span_".$templates->id."'  class='label label-success' style='cursor:pointer'>Active </span>";}
					else{ 
						$str = "<span onclick='update_status(".$templates->id.",1)' id='span_".$templates->id."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
					}
			$row[] = $str;			
			   		$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('sms_template_edit'))
											$str2.='<li>
												<a title="Update Record ?" href="update/'.$templates->id.'">
													Update
												</a>
											</li>';

											if($this->permissions('sms_template_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_template('.$templates->id.')">
													Delete
												</a>
											</li>
											
										</ul>
									</div>';			

			$row[] = $str2;						
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->templates->count_all(),
						"recordsFiltered" => $this->templates->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function update_status(){
		$this->permission_check_with_msg('sms_template_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$result=$this->templates->update_status($id,$status);
		return $result;
	}
	public function delete_template(){
		$this->permission_check_with_msg('sms_template_delete');
		$id=$this->input->post('q_id');
		$result=$this->templates->delete_template($id);
		return $result;
	}
}

