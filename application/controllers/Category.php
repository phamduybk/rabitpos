<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('category_model','category');
	}

	public function add(){
		$this->permission_check('items_category_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('category');
		$this->load->view('category', $data);
	}

	//ITS FROM POP UP MODAL
	  public function add_category_modal(){
	    $this->form_validation->set_rules('category', 'Category Name', 'trim|required');
	    if ($this->form_validation->run() == TRUE) {
	      $result=$this->category->verify_and_save();
	      //fetch latest item details
	      $res=array();
	      $query=$this->db->query("select id,category_name from db_category order by id desc limit 1");
	      $res['id']=$query->row()->id;
	      $res['category']=$query->row()->category_name;
	      $res['result']=$result;
	      
	      echo json_encode($res);

	    } 
	    else {
	      echo "Please Fill Compulsory(* marked) Fields.";
	    }
	  }
	  //END

	public function newcategory(){
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
	

		if ($this->form_validation->run() == TRUE) {
			
			$this->load->model('category_model');
			$result=$this->category_model->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Category name.";
		}
	}
	public function update($id){
		$this->permission_check('items_category_edit');
		$data=$this->data;

		$this->load->model('category_model');
		$result=$this->category_model->get_details($id,$data);
		$data=array_merge($data,$result);
		$data['page_title']=$this->lang->line('category');
		$this->load->view('category', $data);
	}
	public function update_category(){
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			/*$data=$this->data;
			$category=$this->input->post('category');
			$description=$this->input->post('description');
			$q_id=$this->input->post('q_id');*/
			
			$this->load->model('category_model');
			$result=$this->category_model->update_category();
			echo $result;
		} else {
			echo "Please Enter Category name.";
		}
	}
	public function view(){
		$this->permission_check('items_category_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('categories_list');
		$this->load->view('category-view', $data);
	}

	public function ajax_list()
	{
		$list = $this->category->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $category) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value='.$category->id.' class="checkbox column_checkbox" >';
			$row[] = $category->category_code;
			$row[] = $category->category_name;
			$row[] = $category->description;

			 		if($category->status==1){ 
			 			$str= "<span onclick='update_status(".$category->id.",0)' id='span_".$category->id."'  class='label label-success' style='cursor:pointer'>Active </span>";}
					else{ 
						$str = "<span onclick='update_status(".$category->id.",1)' id='span_".$category->id."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
					}
			$row[] = $str;			
					$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('items_category_edit'))
											$str2.='<li>
												<a title="Edit Record ?" href="update/'.$category->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('items_category_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_category('.$category->id.')">
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
						"recordsTotal" => $this->category->count_all(),
						"recordsFiltered" => $this->category->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function update_status(){
		$this->permission_check_with_msg('items_category_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');

		$this->load->model('category_model');
		$result=$this->category_model->update_status($id,$status);
		return $result;
	}
	
	public function delete_category(){
		$this->permission_check_with_msg('items_category_delete');
		$id=$this->input->post('q_id');
		return $this->category->delete_categories_from_table($id);
	}
	public function multi_delete(){
		$this->permission_check_with_msg('items_category_delete');
		$ids=implode (",",$_POST['checkbox']);
		return $this->category->delete_categories_from_table($ids);
	}

}

