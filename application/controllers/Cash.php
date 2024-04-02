<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cash extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('cash_model','cash');
	}

	public function add(){
		$this->permission_check('currency_add');
		$data=$this->data;
		$data['page_title']='Quản lý két tiền';
		$this->load->view('cash', $data);
	}
	public function newcurrency(){
		$this->form_validation->set_rules('currency_name', 'Currency Name', 'trim|required');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');
	
		if ($this->form_validation->run() == TRUE) {
			
			$this->load->model('cash_model');
			$result=$this->currency_model->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Compulsory(*) Fields!";
		}
	}
	public function update($id){
		$this->permission_check('currency_edit');
		$data=$this->data;

		$this->load->model('cash_model');
		$result=$this->currency_model->get_details($id,$data);
		$data=array_merge($data,$result);
		$data['page_title']=$this->lang->line('currency');
		$this->load->view('currency', $data);
	}
	public function update_currency(){
		$this->form_validation->set_rules('currency_name', 'Currency Name', 'trim|required');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('cash_model');
			$result=$this->cash_model->update_currency();
			echo $result;
		} else {
			echo "Please Enter Compulsory(*) Fields!";
		}
	}
	public function view(){
		$this->permission_check('currency_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('cash_list');
		$this->load->view('cash-view', $data);
	}

	public function ajax_list()
	{
		$list = $this->cash->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $cash) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value='.$cash->id.' class="checkbox column_checkbox" >';
			$row[] = $cash->cash_name;
			$row[] = $cash->description;
			$row[] = app_number_format($cash->amount);

			 		if($cash->status==1){ 
			 			$str= "<span onclick='update_status(".$cash->id.",0)' id='span_".$cash->id."'  class='label label-success' style='cursor:pointer'>Active </span>";}
					else{ 
						$str = "<span onclick='update_status(".$cash->id.",1)' id='span_".$cash->id."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
					}
			$row[] = $str;			
					$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('currency_edit'))
											$str2.='<li>
											<a style="cursor:pointer" title="Nạp tiền vào két ?" onclick="nap_ket('.$cash->id.')">
											<i class="fa fa-fw fa-arrow-circle-up text-green"></i>Nạp tiền vào két
										</a>
											</li>';

											if($this->permissions('currency_edit'))
											$str2.='<li>
												<a style="cursor:pointer" title="Rút tiền khỏi két ?" onclick="rut_ket('.$cash->id.')">
													<i class="fa fa-fw fa-arrow-circle-down text-red"></i>Rút tiền khỏi két
												</a>
											</li>
											
										</ul>
									</div>';			

			$row[] = $str2;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->cash->count_all(),
						"recordsFiltered" => $this->cash->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function update_status(){
		$this->permission_check_with_msg('currency_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');

		$this->load->model('cash_model');
		$result=$this->cash_model->update_status($id,$status);
		return $result;
	}

	public function update_amount(){
		$this->permission_check_with_msg('currency_edit');
		$id=$this->input->post('id');
		$amount=$this->input->post('amount');

		$this->load->model('cash_model');
		$result=$this->cash_model->update_amount($id,$amount);
		return $result;
	}
	
	
	public function delete_currency(){
		$this->permission_check_with_msg('currency_delete');
		$id=$this->input->post('q_id');
		return $this->cash->delete_currencies_from_table($id);
	}
	public function multi_delete(){
		$this->permission_check_with_msg('currency_delete');
		$ids=implode (",",$_POST['checkbox']);
		return $this->cash->delete_currencies_from_table($ids);
	}

	public function cash_amount(){
		$amount = $this->db->select("amount")->where("id", 1)->get("db_cash")->row()->amount;
		echo app_number_format($amount);
	}

}

