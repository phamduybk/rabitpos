<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax_group extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('tax_group_model','tax');
	}
	

	public function index(){
		$this->permission_check('tax_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('tax_list');
		$this->load->view('tax-list', $data);
	}
	public function newtax(){
		$this->form_validation->set_rules('tax_name', 'Tax Name', 'trim|required');
		$this->form_validation->set_rules('tax', 'Tax Name', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$result=$this->tax->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Tax Name & Tax Percentage!";
		}
	}
	public function update($id){
		$this->permission_check('tax_edit');
		$result=$this->tax->get_details($id);
		$data=array_merge($this->data,$result);
		$data['page_title']=$this->lang->line('tax_group');
		$this->load->view('tax-group', $data);
	}
	public function update_tax(){
		$this->form_validation->set_rules('tax_name', 'Tax Name', 'trim|required');
		$this->form_validation->set_rules('tax', 'tax', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result=$this->tax->update_tax();
			echo $result;
		} else {
			echo "Please Enter Tax Name & Tax Percentage!";
		}
	}
	public function add(){
		$this->permission_check('tax_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('tax_group');
		$this->load->view('tax-group', $data);
	}

	public function get_tax_name($ids=''){
		if(!empty($ids)){
			$q1=$this->db->query("select tax_name from db_tax where id in($ids)");
			if($q1->num_rows()>0){
				$info='';
				foreach ($q1->result() as $res1) {
					if(empty($info)){
						$info = "(".$res1->tax_name.")";
					}
					else{
						$info .= "+(".$res1->tax_name.")";
					}
				}
				return $info;
			}
		}
		return;
	}
	public function ajax_list()
	{
		$list = $this->tax->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $tax) {
			$no++;
			$row = array();
			
			$row[] = $tax->tax_name;
			$row[] = $tax->tax;
			$row[] = $this->get_tax_name($tax->subtax_ids);
			 		if($tax->status==1){ 
			 			$str= "<span onclick='update_status(".$tax->id.",0)' id='span_".$tax->id."'  class='label label-success' style='cursor:pointer'>Active </span>";}
					else{ 
						$str = "<span onclick='update_status(".$tax->id.",1)' id='span_".$tax->id."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
					}
			$row[] = $str;			
			         $str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('tax_edit'))
											$str2.='<li>
												<a title="Edit Record ?" href="tax_group/update/'.$tax->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('tax_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_tax('.$tax->id.')">
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
						"recordsTotal" => $this->tax->count_all(),
						"recordsFiltered" => $this->tax->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}



	
}

