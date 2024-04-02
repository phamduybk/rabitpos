<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_childs extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('item_childs_model','item_childs');
	}

	public function add(){
		$this->permission_check('units_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('item_childs');
		$this->load->view('item_child', $data);
	}

	//ITS FROM POP UP MODAL
    public function add_item_childs_modal(){

      $this->form_validation->set_rules('kind_name', 'kind Name', 'trim|required');
      if ($this->form_validation->run() == TRUE) {
      	
        $result=$this->item_childs->verify_and_save();
        //fetch latest item details
        $res=array();
        $query=$this->db->query("select id,item_child_name from db_item_childs order by id desc limit 1");
        $res['id']=$query->row()->id;
        $res['item_child_name']=$query->row()->item_child_name;
        $res['result']=$result;
        
        echo json_encode($res);

      } 
      else {
        echo "Please Fill Compulsory(* marked) Fields.";
      }
    }
    //END

	public function new_unit(){

		$this->form_validation->set_rules('item_child_name', 'Item Child Name', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');
		//$this->form_validation->set_rules('description', 'Description', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			
			$result=$this->item_childs->verify_and_save();
			echo $result;
		} else {
			echo "Thông tin sản phẩm phụ không phù hợp!";
		}
	}
	public function update($id){
		$this->permission_check('units_edit');
		$data=$this->data;
		$result=$this->item_childs->get_details($id,$data);
		$data=array_merge($data,$result);
		$data['page_title']=$this->lang->line('units');
		$this->load->view('item_child', $data);
	}
	public function update_unit(){
		$this->form_validation->set_rules('item_child_name', 'Item Child Name', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');

		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result=$this->item_childs->update_unit();
			echo $result;
		} else {
			echo "Thông tin sản phẩm phụ không phù hợp!";
		}
	}
	public function index(){
		$this->permission_check('units_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('kinds_list');
		$this->load->view('item_childs_list', $data);
	}

	public function ajax_list()
	{
		$list = $this->item_childs->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $unit) {
			$no++;
			$row = array();
			$row[] = $unit->item_child_name;
			$row[] = $unit->description;
			$row[] = $unit->price;
			$row[] = $unit->group_id;



			 		if($unit->status==1){ 
			 			$str= "<span onclick='update_status(".$unit->id.",0)' id='span_".$unit->id."'  class='label label-success' style='cursor:pointer'>Active </span>";}
					else{ 
						$str = "<span onclick='update_status(".$unit->id.",1)' id='span_".$unit->id."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
					}
			$row[] = $str;			
			         $str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('units_edit'))
											$str2.='<li>
												<a title="Editd Record ?" href="'.base_url('item_childs/update/'.$unit->id).'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('units_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_unit('.$unit->id.')">
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
						"recordsTotal" => $this->item_childs->count_all(),
						"recordsFiltered" => $this->item_childs->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function update_status(){
		$this->permission_check_with_msg('units_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$result=$this->item_childs->update_status($id,$status);
		return $result;
	}
	public function delete_unit(){
		$this->permission_check_with_msg('units_delete');
		$id=$this->input->post('q_id');
		$result=$this->item_childs->delete_unit($id);
		return $result;
	}
}

