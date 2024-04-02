<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guaran_item extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();
		$this->load->model('guaran_item_model', 'guaran_items');
	}

	public function update($id)
	{

		$data = $this->data;

		$this->load->model('guaran_item_model');
		$result = $this->guaran_items->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('guarantee_item');
		$this->load->view('guaran_item', $data);
	}

	public function update_role()
	{
		$this->load->model('guaran_item_model');
		$result = $this->guaran_items->update_role();
		return $result;
	}

	public function view()
	{
		$data = $this->data;
		$data['page_title'] = $this->lang->line('guarantee_package');
		$this->load->view('guaran_item-list', $data);
	}

	public function ajax_list()
	{
		$list = $this->guaran_items->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $roles) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $roles->customer;
			$row[] = $roles->phone;
			$row[] = $roles->item_code;
		//	$row[] = $roles->sale_code;
		   $row[] = '<a href="../sales/invoice/' . $roles->sale_id . '">' . $roles->sale_code . '</a>';


			$row[] = $roles->name_guaran;

			$item_id = $roles->item_id;

			$q44 = $this->db->query("select item_name from db_items where id='$item_id'");
			$row[] = $q44->row()->item_name;


			$row[] = $roles->description;

			$exprire_time = $roles->exprire_time;

			$row[] = $exprire_time;

			$currentDate = date('Y-m-d');

			// Lấy ngày hết hạn từ biến $expire_time
			$expireDate = date('Y-m-d', strtotime($exprire_time));

			// So sánh ngày hết hạn với ngày hiện tại
			if ($expireDate > $currentDate) {
				// Còn hạn
				$str = "<span id='span_" . $roles->id . "'  class='label label-success' style='cursor:pointer'>Còn hạn</span>";
			} else {
				// Hết hạn
				$str = "<span id='span_" . $roles->id . "'  class='label label-danger' style='cursor:pointer'>Hết hạn</span>";
			}


			$row[] = $str;

			$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';


			$str2 .= '<li>
												<a title="Edit Record ?" href="update/' . $roles->id . '">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';


			$str2 .= '<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_roles(' . $roles->id . ')">
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
			"recordsTotal" => $this->guaran_items->count_all(),
			"recordsFiltered" => $this->guaran_items->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function update_status()
	{
		$this->permission_check_with_msg('roles_edit');
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$this->load->model('guaran_item_model');
		$result = $this->guaran_item_model->update_status($id, $status);
		return $result;
	}

	public function delete_roles()
	{
		$id = $this->input->post('q_id');
		$this->load->model('guaran_item_model');
		return $this->guaran_item_model->delete_item_from_table($id);
	}
	public function multi_delete()
	{
		$ids = implode(",", $_POST['checkbox']);
		$this->load->model('guaran_item_model');
		return $this->guaran_item_model->delete_item_from_table($ids);
	}
}
