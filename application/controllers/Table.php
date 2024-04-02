<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();
		$this->load->model('TableType_model', 'table_type');
	}

	public function add()
	{
		//$this->permission_check('items_table_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('table');
		$this->load->view('table', $data);
	}

	//ITS FROM POP UP MODAL
	public function add_category_modal()
	{
		$this->form_validation->set_rules('category', 'Category Name', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$result = $this->category->verify_and_save();
			//fetch latest item details
			$res = array();
			$query = $this->db->query("select id,table_name from db_table order by id desc limit 1");
			$res['id'] = $query->row()->id;
			$res['table'] = $query->row()->table_name;
			$res['result'] = $result;

			echo json_encode($res);

		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}
	//END

	public function get_json_rooms()
	{
		$data = array();
		$display_room_json = array();
		$sql1 = $this->db->query("SELECT a.id,a.table_type_name,a.description FROM db_table_type a Where a.status = 1 ORDER BY a.id");

		foreach ($sql1->result() as $res1) {
			$json_arr["id"] = $res1->id;
			$json_arr["table_type_name"] = $res1->table_type_name;
			$json_arr["description"] = $res1->description;

			$display_table_json = array();
			$sql = $this->db->query("SELECT a.id, a.table_name,a.table_type_id,a.start_time,b.id as hold_id,b.subtotal,b.sales_date,b.reference_no FROM db_table a  LEFT JOIN db_hold b ON a.id = b.table_id where a.status = 1 and a.table_type_id = $res1->id ORDER BY a.id");
			foreach ($sql->result() as $res) {
				$json_arr["id"] = $res->id;
				$json_arr["table_name"] = $res->table_name;
				$json_arr["table_type_id"] = $res->table_type_id;
				$json_arr["start_time"] = $res->start_time;
				$json_arr["hold_id"] = $res->hold_id;
				$json_arr["subtotal"] = $res->subtotal;
				$json_arr["sales_date"] = $res->sales_date;
				$json_arr["reference_no"] = $res->reference_no;
				array_push($display_table_json, $json_arr);
			}

			$json_arr["list"] = $display_table_json;

			array_push($display_room_json, $json_arr);
		}
		//}
		//echo json_encode($data);exit;
		echo json_encode($display_room_json);
		exit;
	}

	public function get_json_tables()
	{
		$data = array();
		$display_json = array();
		//if (!empty($_GET['name'])) {
		$table_type_id = strtolower(trim($_GET['table_type_id']));

		if (!empty($_GET['table_type_id'])) {
			$sql = $this->db->query("SELECT a.id, a.table_name,a.table_type_id,b.id as hold_id,b.subtotal,b.sales_date,b.reference_no FROM db_table a  LEFT JOIN db_hold b ON a.id = b.table_id where a.status = 1 and a.table_type_id = $table_type_id ORDER BY a.id");

		} else {
			$sql = $this->db->query("SELECT a.id, a.table_name,a.table_type_id,b.id as hold_id,b.subtotal,b.sales_date,b.reference_no FROM db_table a  LEFT JOIN db_hold b ON a.id = b.table_id where a.status = 1 ORDER BY a.id");
		}


		foreach ($sql->result() as $res) {
			$json_arr["id"] = $res->id;
			$json_arr["table_name"] = $res->table_name;
			$json_arr["table_type_id"] = $res->table_type_id;
			$json_arr["hold_id"] = $res->hold_id;
			$json_arr["subtotal"] = $res->subtotal;
			$json_arr["sales_date"] = $res->sales_date;
			$json_arr["reference_no"] = $res->reference_no;
			array_push($display_json, $json_arr);
			/* $display_json[] =$res->id;
								  $display_json[] =$res->item_name;
								  $display_json[] =$res->item_code;*/
		}
		//}
		//echo json_encode($data);exit;
		echo json_encode($display_json);
		exit;
	}

	public function reset_tables()
	{
		$this->db->query("update db_table set status = 0");
		$this->db->query("update db_table set status = 1 where id in (select table_id from db_hold where subtotal > 0)");
	}

	public function on_tables()
	{
		$table_id = $this->input->post('table_id');
		$status = $this->input->post('status');
		$this->db->query("update db_table set status = '$status' where id = '$table_id'");
	}

	public function newcategory()
	{
		$this->form_validation->set_rules('category', 'Category', 'trim|required');


		if ($this->form_validation->run() == TRUE) {

			$this->load->model('tabletype_model');
			$result = $this->tabletype_model->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter table name.";
		}
	}
	public function update($id)
	{
		$this->permission_check('items_category_edit');
		$data = $this->data;

		$this->load->model('tabletype_model');
		$result = $this->tabletype_model->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('table');
		$this->load->view('table', $data);
	}

	public function get_data_details()
	{
		//echo $this->table_model->get_data_details();

		$this->load->model('table_model');
		$result = $this->table_model->get_data_details();
		echo $result;
	}


	public function update_category()
	{
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			/*$data=$this->data;
														 $category=$this->input->post('category');
														 $description=$this->input->post('description');
														 $q_id=$this->input->post('q_id');*/

			$this->load->model('table_model');
			$result = $this->table_model->update_category();
			echo $result;
		} else {
			echo "Please Enter table name.";
		}
	}
	public function view()
	{
		$this->permission_check('items_category_view');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('table_list');
		$this->load->view('table-view', $data);
	}

	public function ajax_list()
	{
		$list = $this->table_type->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $table_type) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value=' . $table_type->id . ' class="checkbox column_checkbox" >';
			$row[] = $table_type->table_type_name;

			$sql = $this->db->query('SELECT table_name FROM db_table where  table_type_id = ' . $table_type->id . ' ');

			$ket_qua = '';
			foreach ($sql->result() as $res) {
				//$ket_qua =$ket_qua.';'.$res->category_item_name;
				$ket_qua = $ket_qua . '<div class="orange-border">' . $res->table_name . '</div>';
			}

			$row[] = $ket_qua;

			if ($table_type->status == 1) {
				$str = "<span onclick='update_status(" . $table_type->id . ",0)' id='span_" . $table_type->id . "'  class='label label-success' style='cursor:pointer'>Active </span>";
			} else {
				$str = "<span onclick='update_status(" . $table_type->id . ",1)' id='span_" . $table_type->id . "'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
			}
			$row[] = $str;
			$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

			if ($this->permissions('items_category_edit'))
				$str2 .= '<li>
												<a title="Edit Record ?" href="update/' . $table_type->id . '">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

			if ($this->permissions('items_category_delete'))
				$str2 .= '<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_category(' . $table_type->id . ')">
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
			"recordsTotal" => $this->table_type->count_all(),
			"recordsFiltered" => $this->table_type->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function update_status()
	{
		$this->permission_check_with_msg('items_category_edit');
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$this->load->model('tabletype_model');
		$result = $this->tabletype_model->update_status($id, $status);
		return $result;
	}

	public function add_new_category_item()
	{
		$this->permission_check_with_msg('items_category_edit');
		$category_id = $this->input->post('q_id');
		$category_item_name = $this->input->post('name');

		$query = $this->db->query("select * from db_table where upper(table_name)=upper('$category_item_name')");
		if ($query->num_rows() > 0) {
			return "Tên bàn đã tồn tại";
		}

		$query1 = "insert into db_table(table_type_id,table_name,description,status) 
		values('$category_id','$category_item_name','',1)";
		if ($this->db->simple_query($query1)) {

			return "success";
		} else {
			return "failed";
		}
	}

	public function update_category_item()
	{
		$this->permission_check_with_msg('items_category_edit');
		$category_id = $this->input->post('q_id');
		$category_item_name = $this->input->post('name');

		$query1 = "UPDATE `db_table` SET `table_name` = '$category_item_name' WHERE `id` = '$category_id'";
		if ($this->db->simple_query($query1)) {

			return "success";
		} else {
			return "failed";
		}
	}

	public function delete_table()
	{
		$this->permission_check_with_msg('items_category_delete');
		$ids = $this->input->post('q_id');
		$tot = $this->db->query('SELECT * FROM db_hold WHERE table_id =' . $ids . '');
		if ($tot->num_rows() > 0) {
			foreach ($tot->result() as $res) {
				$category_name[] = $res->category_name;
			}
			$list = implode(",", $category_name);
			echo "Xin lỗi, bàn vẫn đang sử dụng";
			exit();
		} else {
			$query1 = "delete from db_table where id in($ids)";
			if ($this->db->simple_query($query1)) {
				echo "success";
			} else {
				echo "failed";
			}
		}
	}


	public function delete_category()
	{
		$this->permission_check_with_msg('items_category_delete');
		$id = $this->input->post('q_id');
		return $this->table_type->delete_categories_from_table($id);
	}
	public function multi_delete()
	{
		$this->permission_check_with_msg('items_category_delete');
		$ids = implode(",", $_POST['checkbox']);
		return $this->table_type->delete_categories_from_table($ids);
	}

}

