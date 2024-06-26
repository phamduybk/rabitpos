<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Types extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();
		$this->load->model('types_model', 'types');
	}

	public function add()
	{
		$this->permission_check('units_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('types');
		$this->load->view('type', $data);
	}

	//ITS FROM POP UP MODAL
	public function add_type_modal()
	{

		$this->form_validation->set_rules('type_name', 'type Name', 'trim|required');
		if ($this->form_validation->run() == TRUE) {

			$result = $this->types->verify_and_save();
			//fetch latest item details
			$res = array();
			$query = $this->db->query("select id,type_name from db_types order by id desc limit 1");
			$res['id'] = $query->row()->id;
			$res['type_name'] = $query->row()->type_name;
			$res['result'] = $result;

			echo json_encode($res);
		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}
	//END

	public function new_unit()
	{

		//$this->form_validation->set_rules('type_name', 'type Name', 'trim|required');
		//$this->form_validation->set_rules('description', 'Description', 'trim|required');

		if (TRUE) {

			$result = $this->types->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Unit Name.";
		}
	}
	public function update($id)
	{
		$this->permission_check('units_edit');
		$data = $this->data;
		$result = $this->types->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('units');
		$this->load->view('type', $data);
	}
	public function update_Unit()
	{
		$this->form_validation->set_rules('type_name', 'Unit Name', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result = $this->types->update_Unit();
			echo $result;
		} else {
			echo "Please Enter Unit name.";
		}
	}
	public function index()
	{
		$this->permission_check('units_view');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('types_list');
		$this->load->view('types-list', $data);
	}

	public function ajax_list()
	{
		$list = $this->types->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $unit) {
			$no++;
			$row = array();
			$row[] = $unit->type_name;
			$row[] = $unit->description;


			//percent_decrease,price_type
		/* 	if ($unit->price_type == 0) {
				$row[] = 'Giá bán lẻ';
			} else  */
			if ($unit->price_type == 1) {
				$row[] = 'Giá bán buôn';
			} else {
				$row[] = 'Giá bán lẻ';
			}

			if ($unit->discount_type == 'Fixed') {
				$row[] = 'Giảm cố định';
			} else if ($unit->discount_type == 'Percentage') {
				$row[] = 'Giảm theo %';
			} else {
				$row[] = 'Chưa cấu hình';
			}

			$row[] = $unit->discount;


			if ($unit->status == 1) {
				$str = "<span onclick='update_status(" . $unit->id . ",0)' id='span_" . $unit->id . "'  class='label label-success' style='cursor:pointer'>Active </span>";
			} else {
				$str = "<span onclick='update_status(" . $unit->id . ",1)' id='span_" . $unit->id . "'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
			}
			$row[] = $str;
			$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

			if ($this->permissions('units_edit'))
				$str2 .= '<li>
												<a title="Editd Record ?" href="' . base_url('types/update/' . $unit->id) . '">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

			if ($this->permissions('units_delete'))
				$str2 .= '<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_unit(' . $unit->id . ')">
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
			"recordsTotal" => $this->types->count_all(),
			"recordsFiltered" => $this->types->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function update_status()
	{
		$this->permission_check_with_msg('units_edit');
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$result = $this->types->update_status($id, $status);
		return $result;
	}
	public function delete_unit()
	{
		$this->permission_check_with_msg('units_delete');
		$id = $this->input->post('q_id');
		$result = $this->types->delete_unit($id);
		return $result;
	}
}
