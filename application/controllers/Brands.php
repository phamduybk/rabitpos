<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('brand_model','brand');
	}

	public function add(){
		$this->permission_check('brand_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('brand');
		$this->load->view('brand', $data);
	}

	//ITS FROM POP UP MODAL
	public function add_brand_modal(){
		$this->form_validation->set_rules('brand', 'Brand Name', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$result=$this->brand->verify_and_save();
			//fetch latest item details
			$res=array();
			$query=$this->db->query("select id,brand_name from db_brands order by id desc limit 1");
			$res['id']=$query->row()->id;
			$res['brand']=$query->row()->brand_name;
			$res['result']=$result;
			
			echo json_encode($res);

		} 
		else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}
	//END

	public function newbrand(){
		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
	

		if ($this->form_validation->run() == TRUE) {
			
			$result=$this->brand->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Brand name.";
		}
	}
	public function update($id){
		$this->permission_check('brand_edit');
		$data=$this->data;

		$this->load->model('brand_model');
		$result=$this->brand_model->get_details($id,$data);
		$data=array_merge($data,$result);
		$data['page_title']=$this->lang->line('brand');
		$this->load->view('brand', $data);
	}
	public function update_brand(){
		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('brand_model');
			$result=$this->brand_model->update_brand();
			echo $result;
		} else {
			echo "Please Enter Brand name.";
		}
	}
	public function view(){
		$this->permission_check('brand_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('brands_list');
		$this->load->view('brand-view', $data);
	}

	public function ajax_list()
	{
		$list = $this->brand->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $brand) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value='.$brand->id.' class="checkbox column_checkbox" >';
			$row[] = $brand->brand_code;
			$row[] = $brand->brand_name;
			$row[] = $brand->description;

			 		if($brand->status==1){ 
			 			$str= "<span onclick='update_status(".$brand->id.",0)' id='span_".$brand->id."'  class='label label-success' style='cursor:pointer'>Active </span>";}
					else{ 
						$str = "<span onclick='update_status(".$brand->id.",1)' id='span_".$brand->id."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
					}
			$row[] = $str;			
					$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('brand_edit'))
											$str2.='<li>
												<a title="Edit Record ?" href="update/'.$brand->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('brand_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_brand('.$brand->id.')">
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
						"recordsTotal" => $this->brand->count_all(),
						"recordsFiltered" => $this->brand->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function update_status(){
		$this->permission_check_with_msg('brand_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');

		$this->load->model('brand_model');
		$result=$this->brand_model->update_status($id,$status);
		return $result;
	}
	
	public function delete_brand(){
		$this->permission_check_with_msg('brand_delete');
		$id=$this->input->post('q_id');
		return $this->brand->delete_brands_from_table($id);
	}
	public function multi_delete(){
		$this->permission_check_with_msg('brand_delete');
		$ids=implode (",",$_POST['checkbox']);
		return $this->brand->delete_brands_from_table($ids);
	}

}

