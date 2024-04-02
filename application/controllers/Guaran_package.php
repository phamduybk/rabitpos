<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Guaran_package extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();
		$this->load->model('guaran_package_model', 'guaran_packages');
	}

	public function add()
	{
		$this->permission_check('roles_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('new_guarantee');
		$this->load->view('guaran_package', $data);
	}
	public function new_package()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$this->load->model('guaran_package_model');
			$result = $this->guaran_package_model->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Name.";
		}
	}
	public function update($id)
	{

		$data = $this->data;

		$this->load->model('guaran_package_model');
		$result = $this->guaran_package_model->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('guarantee_package');
		$this->load->view('guaran_package', $data);
	}
	public function update_role()
	{
		$this->load->model('guaran_package_model');
		$result = $this->guaran_packages->update_role();
		return $result;
	}
	public function view()
	{
		//$this->permission_check('roles_view');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('guarantee_package');
		$this->load->view('guaran_package-list', $data);
	}

	public function ajax_list()
	{
		$list = $this->guaran_packages->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $roles) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $roles->name;
			$row[] = $roles->description;

			$date = $roles->date;
			$row[] = getInforDateGuaran($date);

			/* switch ($date) {
						 case 7:
							 $row[] = '1 tuần';
							 break;
						 case 14:
							 $row[] = '2 tuần';
							 break;
						 case 30:
							 $row[] = '1 tháng';
							 break;
						 case 60:
							 $row[] = '2 tháng';
							 break;
						 case 180:
							 $row[] = '6 tháng';
							 break;
						 case 365:
							 $row[] = '1 năm';
							 break;
						 case 730:
							 $row[] = '2 năm';
							 break;
						 case 1095:
							 $row[] = '3 năm';
							 break;
						 case 1825:
							 $row[] = '5 năm';
							 break;
						 default:
							 $row[] = $date . ' ngày';
							 break;
					 } */

			if ($roles->status == 1) {
				$str = "<span onclick='update_status(" . $roles->id . ",0)' id='span_" . $roles->id . "'  class='label label-success' style='cursor:pointer'>Active </span>";
			} else {
				$str = "<span onclick='update_status(" . $roles->id . ",1)' id='span_" . $roles->id . "'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
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
			"recordsTotal" => $this->guaran_packages->count_all(),
			"recordsFiltered" => $this->guaran_packages->count_filtered(),
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

		$this->load->model('guaran_package_model');
		$result = $this->guaran_package_model->update_status($id, $status);
		return $result;
	}

	public function delete_roles()
	{
		$id = $this->input->post('q_id');
		$this->load->model('guaran_package_model');
		return $this->guaran_package_model->delete_package_from_table($id);
	}
	public function multi_delete()
	{
		$ids = implode(",", $_POST['checkbox']);
		$this->load->model('guaran_package_model');
		return $this->guaran_package_model->delete_package_from_table($ids);
	}
}
