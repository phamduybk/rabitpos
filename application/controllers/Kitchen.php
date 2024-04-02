<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kitchen extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();
		$this->load->model('kitchen_model', 'kitchen');
	}

	public function add()
	{
		$this->permission_check('currency_add');
		$data = $this->data;
		$data['page_title'] = 'Quản lý bếp';
		$this->load->view('kitchen', $data);
	}
	public function newcurrency()
	{
		$this->form_validation->set_rules('currency_name', 'Currency Name', 'trim|required');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$this->load->model('kitchen_model');
			$result = $this->kitchen_model->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Compulsory(*) Fields!";
		}
	}
	public function update($id)
	{
		$this->permission_check('currency_edit');
		$data = $this->data;

		$this->load->model('kitchen_model');
		$result = $this->kitchen_model->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('kitchens');
		$this->load->view('kitchen', $data);
	}

	public function chinsach()
	{
		$data = $this->data;
		$data['page_title'] ='Điều khoản sử dụng';
		$this->load->view('chinhsach', $data);
	}
	public function update_currency()
	{
		$this->form_validation->set_rules('currency_name', 'Currency Name', 'trim|required');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('kitchen_model');
			$result = $this->cash_model->update_currency();
			echo $result;
		} else {
			echo "Please Enter Compulsory(*) Fields!";
		}
	}
	public function view()
	{
		$this->permission_check('currency_view');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('kitchen_list');
		$this->load->view('kitchen-view', $data);
	}

	public function ajax_list()
	{
		$list = $this->kitchen->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kitchen) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value=' . $kitchen->id . ' class="checkbox column_checkbox" >';
			$row[] = $kitchen->kitchen_name;
			$row[] = $kitchen->description;


			if ($kitchen->status == 1) {
				$str = "<span onclick='update_status(" . $kitchen->id . ",0)' id='span_" . $kitchen->id . "'  class='label label-success' style='cursor:pointer'>Active </span>";
			} else {
				$str = "<span onclick='update_status(" . $kitchen->id . ",1)' id='span_" . $kitchen->id . "'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
			}
			$row[] = $str;
			$str2 = '<div class="btn-group" title="View Account">';

			if ($this->permissions('units_edit'))
				$str2 .= '<li>
					<a title="Quản lý bếp ?" href="' . base_url('kitchen/update/' . $kitchen->id) . '">
						<i class="fa fa-fw fa-edit text-blue"></i>Quản lý bếp
					</a>
				</li>';

			$row[] = $str2;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->kitchen->count_all(),
			"recordsFiltered" => $this->kitchen->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

 	public function view_list()
	{
		//$list = $this->kitchen->get_datatables();

		$data = array();

		$q_id = $_POST['q_id'];

		$sql1 = $this->db->query("SELECT a.id,b.reference_id,c.item_name,a.sales_qty,c.price,a.step,b.sales_note FROM db_holditems a, db_hold b, db_items c Where a.hold_id = b.id and a.item_id = c.id and c.kitchen_id =  $q_id and (a.step = 'INIT' or  a.step = 'PROCESS' or  a.step = 'DONE' ) ORDER BY CASE  WHEN a.step = 'INIT' THEN 0 WHEN a.step = 'PROCESS'  THEN  1  ELSE 2  END, a.id");

		
		foreach ($sql1->result() as $res1) {
		
		
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value=' . $res1->id . ' class="checkbox column_checkbox" >';
			$row[] = $res1->reference_id;
			$row[] = $res1->sales_note;
			$row[] =  $res1->item_name;
			$row[] = $res1->sales_qty;
			$row[] = app_number_format($res1->price); 


			 if ($res1->step == "PROCESS") {
				$str = "<span onclick='update_step_get(" . $res1->id . ",0)' id='span_" . $res1->id . "'  class='label label-success' style='cursor:pointer'>Đã nhận</span>";
			} else  if ($res1->step == "INIT") {
				$str = "<span onclick='update_step_get(" . $res1->id . ",1)' id='span_" . $res1->id . "'  class='label label-danger' style='cursor:pointer'>Chưa nhận</span>";
			} else {
				$str = "<span onclick='update_step_get(" . $res1->id . ",3)' id='span_" . $res1->id . "'  class='label label-warning' style='cursor:pointer'></span>";

			}
			$row[] = $str;

			if ($res1->step == "DONE") {
				$str2 = "<span onclick='update_step_done(" . $res1->id . ",0)' id='span2_" . $res1->id . "'  class='label label-success' style='cursor:pointer'>Đã xong</span>";
			} else if ($res1->step == "PROCESS"){
				$str2 = "<span onclick='update_step_done(" . $res1->id . ",1)' id='span2_" . $res1->id . "'  class='label label-danger' style='cursor:pointer'>Chưa xong</span>";
			} else {
				$str2 = "<span onclick='update_step_done(" . $res1->id . ",3)' id='span2_" . $res1->id . "'  class='label label-warning' style='cursor:pointer'></span>";
				}
			
			$row[] = $str2; 
			$data[] = $row;
		}

		$output = array(
			"data" => $data
		);
		//output to json format
		echo json_encode($output);
	} 

	public function update_step()
	{
		$this->permission_check_with_msg('currency_edit');
		$id = $this->input->post('id');
		$step = $this->input->post('step');

		$this->load->model('kitchen_model');
		$result = $this->kitchen_model->update_step($id, $step);
		return $result;
	}

	public function update_status()
	{
		$this->permission_check_with_msg('currency_edit');
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$this->load->model('kitchen_model');
		$result = $this->kitchen_model->update_status($id, $status);
		return $result;
	}

	public function delete_currency()
	{
		$this->permission_check_with_msg('currency_delete');
		$id = $this->input->post('q_id');
		return $this->cash->delete_currencies_from_table($id);
	}
	public function multi_delete()
	{
		$this->permission_check_with_msg('currency_delete');
		$ids = implode(",", $_POST['checkbox']);
		return $this->cash->delete_currencies_from_table($ids);
	}

	public function phuc_vu_list()
	{
		$data = array();
		$data['result'] = $this->get_phuc_vu_list();
		$data['tot_count'] = $this->get_phuc_vu_count();
		echo json_encode($data);
	}

	public function get_phuc_vu_list()
	{
	
		extract($_POST);
		$i = 0;
		$str = '';

		
		//$q2 = $this->db->query("select * from db_hold order by id desc");
		$q2 = $this->db->query("SELECT a.id,b.reference_id,c.item_name,a.sales_qty,c.price,a.step,b.sales_note FROM db_holditems a, db_hold b, db_items c Where a.hold_id = b.id and a.item_id = c.id and (a.step = 'DONE' or  a.step = 'RUNING' or  a.step = 'FINISH' ) ORDER BY CASE  WHEN a.step = 'DONE' THEN 0 WHEN a.step = 'RUNING'  THEN  1  ELSE 2  END, a.id");


		if ($q2->num_rows() > 0) {
			foreach ($q2->result() as $res1) {

				$str = $str . "<tr>";
				$str = $str . "<td>" . $res1->reference_id . "</td>";
				$str = $str . "<td>" .$res1->item_name . "</td>";
				$str = $str . "<td>" . $res1->sales_qty . "</td>";
				$str = $str . "<td>" . app_number_format($res1->price) . "</td>";
				/* $str = $str . "<td>" . app_number_format($res2->price) . "</td>"; */
				$str = $str . "<td>";
				if ($res1->step == "RUNING") {
					$str2 = "<span onclick='update_step_get(" . $res1->id . ",0)' id='span_" . $res1->id . "'  class='label label-success' style='cursor:pointer'>Đã nhận</span>";
				} else  if ($res1->step == "DONE") {
					$str2 = "<span onclick='update_step_get(" . $res1->id . ",1)' id='span_" . $res1->id . "'  class='label label-danger' style='cursor:pointer'>Chờ phục vụ</span>";
				} else {
					$str2= "<span onclick='update_step_get(" . $res1->id . ",3)' id='span_" . $res1->id . "'  class='label label-warning' style='cursor:pointer'></span>";
	
				}
				$str = $str .$str2;

				// $str = $str . '<a class="fa fa-fw fa-trash-o text-red" style="cursor: pointer;font-size: 20px;" onclick="hold_invoice_delete(' . $res2->id . ')" title="Delete Invoive?"></a>';
				// $str = $str . '<a class="fa fa-fw fa-edit text-success" style="cursor: pointer;font-size: 20px;" onclick="hold_invoice_edit(' . $res2->id . ')" title="Edit Invoive?"></a>';
				$str = $str . "</td>";

				$str = $str . "<td>";
				if ($res1->step == "FINISH") {
					$str3 = "<span onclick='update_step_done(" . $res1->id . ",0)' id='span2_" . $res1->id . "'  class='label label-success' style='cursor:pointer'>Đã hoàn thành</span>";
				} else  if ($res1->step == "RUNING") {
					$str3 = "<span onclick='update_step_done(" . $res1->id . ",1)' id='span2_" . $res1->id . "'  class='label label-danger' style='cursor:pointer'>Đang phục vụ</span>";
				} else {
					$str3= "<span onclick='update_step_done(" . $res1->id . ",3)' id='span2_" . $res1->id . "'  class='label label-warning' style='cursor:pointer'></span>";
				}
				$str = $str .$str3;

				// $str = $str . '<a class="fa fa-fw fa-trash-o text-red" style="cursor: pointer;font-size: 20px;" onclick="hold_invoice_delete(' . $res2->id . ')" title="Delete Invoive?"></a>';
				// $str = $str . '<a class="fa fa-fw fa-edit text-success" style="cursor: pointer;font-size: 20px;" onclick="hold_invoice_edit(' . $res2->id . ')" title="Edit Invoive?"></a>';
				$str = $str . "</td>";


				$str = $str . "</tr>";

				$i++;
			} //for end
		} //if num_rows() end
		else {

			$str = $str . "<tr>";
			$str = $str . '<td colspan="4" class="text-danger text-center">No Records Found</td>';
			$str = $str . '</tr>';

		}
		return $str;
	}
	public function get_phuc_vu_count()
	{

		$q1 = $this->db->query("SELECT a.id,b.reference_id,c.item_name,a.sales_qty,c.price,a.step,b.sales_note FROM db_holditems a, db_hold b, db_items c Where a.hold_id = b.id and a.item_id = c.id and a.step = 'DONE' ORDER BY CASE  WHEN a.step = 'INIT' THEN 0 WHEN a.step = 'PROCESS'  THEN  1  ELSE 2  END, a.id");

		return $q1->num_rows();
	}

}

