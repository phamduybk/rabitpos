<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_sn extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();
		$this->load->model('item_sn_model', 'item_sn');
	}

	public function add()
	{
		$this->permission_check('units_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('item_childs');
		$this->load->view('item_child', $data);
	}

	public function add_new_item_sn()
	{
		$this->permission_check_with_msg('items_category_edit');
		$item_id = $this->input->post('q_id');
		$code = $this->input->post('code');


		$query = "insert into db_item_sn(item_id,code,description,status) 
		values('$item_id','$code','',1)";

		if ($this->db->simple_query($query)) {

			$info = array(
				'entry_date'            => date("Y-m-d"),
				'item_id'               => $item_id,
				'qty'                   => 1,
				'status'                => 1,
				'note'                  => "Add: " . $code,
			);

			$q1 = $this->db->insert('db_stockentry', $info);

			$query1 = "update db_items set stock = stock + 1 where id in($item_id)";
			if ($this->db->simple_query($query1)) {
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "failed";
		}
	}

	public function delete_item_sn()
	{
		$this->permission_check_with_msg('items_category_delete');
		$ids = $this->input->post('q_id');
		$item_id = $this->input->post('item_id');
		$code = $this->input->post('code');

		$query = "update db_items set stock = stock -1 where id in($item_id)";

		$info = array(
			'entry_date'            => date("Y-m-d"),
			'item_id'               => $item_id,
			'qty'                   => -1,
			'status'                => 1,
			'note'                  => "Remove:" . $code,
		);

		$q1 = $this->db->insert('db_stockentry', $info);

		if ($this->db->simple_query($query)) {
			$query1 = "delete from db_item_sn where id in($ids)";
			if ($this->db->simple_query($query1)) {
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "failed";
		}
	}

	//ITS FROM POP UP MODAL

	public function update($id)
	{
		$this->permission_check('units_edit');
		$data = $this->data;
		$result = $this->item_sn->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('units');
		$this->load->view('item_child', $data);
	}

	public function index()
	{
		$this->permission_check('units_view');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('item_sn_list');
		$this->load->view('item_sn_list', $data);
	}

	public function ajax_list()
	{
		$list = $this->item_sn->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $unit) {
			$no++;
			$row = array();
			$row[] = $unit->code;

			$row[] = $this->db->query("SELECT item_name FROM db_items where id = '$unit->item_id'")->row()->item_name;

			$row[] = $unit->create_time;

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
												<a title="Editd Record ?" href="' . base_url('items/update/' . $unit->item_id) . '">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

			$row[] = $str2;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->item_sn->count_all(),
			"recordsFiltered" => $this->item_sn->count_filtered(),
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
		$result = $this->item_sn->update_status($id, $status);
		return $result;
	}
	public function delete_unit()
	{
		$this->permission_check_with_msg('units_delete');
		$id = $this->input->post('q_id');
		$result = $this->item_sn->delete_unit($id);
		return $result;
	}
}
