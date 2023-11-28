<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('expense_model','expense');
		$this->load->model('expense_category_model','category');
	}
	/* ######################################## EXPENSE START ############################# */
	public function index()
	{
		$this->permission_check('expense_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('expenses_list');
		$this->load->view('expense-list',$data);
	}
	public function add()
	{
		$this->permission_check('expense_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('expenses');
		$this->load->view('expense',$data);
	}
	
	
	public function newexpense(){
		$this->form_validation->set_rules('expense_date', 'Expense Date', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('expense_amt', 'Expense Amount', 'trim|required');
		$this->form_validation->set_rules('expense_for', 'Expense for', 'trim|required');

		
		if ($this->form_validation->run() == TRUE) {
			$result=$this->expense->verify_and_save();
			echo $result;
		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}
	public function update($id){
		$this->permission_check('expense_edit');
		$data=$this->data;
		$result=$this->expense->get_details($id,$data);
		$data=array_merge($data,$result);
		$this->load->view('expense', $data);
	}
	public function update_expense(){
		$this->form_validation->set_rules('expense_date', 'Expense Date', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('expense_amt', 'Expense Amount', 'trim|required');
		$this->form_validation->set_rules('expense_for', 'Expense for', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result=$this->expense->update_expense();
			echo $result;
		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}

	public function ajax_list()
	{
		$list = $this->expense->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $expense) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value='.$expense->id.' class="checkbox column_checkbox" >';
			$row[] = show_date($expense->expense_date);
			$row[] = $expense->category_name;
			$row[] = $expense->reference_no;
			$row[] = $expense->expense_for;
			$row[] = app_number_format($expense->expense_amt);
			$row[] = $expense->note;			
			$row[] = ucfirst($expense->created_by);			
				     $str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('expense_edit'))
											$str2.='<li>
												<a title="Edit Record ?" href="expense/update/'.$expense->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('expense_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_expense('.$expense->id.')">
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
						"recordsTotal" => $this->expense->count_all(),
						"recordsFiltered" => $this->expense->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function update_status(){
		$this->permission_check_with_msg('expense_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		return $this->expense->update_status($id,$status);
		
	}
	public function delete_expense(){
		$this->permission_check_with_msg('expense_delete');
		$id=$this->input->post('q_id');
		return $this->expense->delete_expenses_from_table($id);
	}
	public function multi_delete_expense(){
		$this->permission_check_with_msg('expense_delete');
		$ids=implode (",",$_POST['checkbox']);
		return $this->expense->delete_expenses_from_table($ids);
	}
	
	/* ######################################## EXPENSE END ############################# */





	/* ######################################## EXPENSE CATEGORY START ############################# */
	public function category()
	{	
		$this->permission_check('expense_category_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('expense_category_list');
		$this->load->view('expense-category-list',$data);
	}
	public function category_add()
	{
		$this->permission_check('expense_category_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('expense_category');
		$this->load->view('expense-category',$data);
	}
	public function newcategory(){
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('expense_category_model');
			$result=$this->expense_category_model->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Category name.";
		}
	}
	public function ajax_list_expense()
	{
		
		$list = $this->category->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $category) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value='.$category->id.' class="checkbox column_checkbox" >';
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

											if($this->permissions('expense_category_edit'))
											$str2.='<li>
												<a title="Edit Record ?" href="expense_update/'.$category->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('expense_category_delete'))
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
	public function expense_update($id){
		$this->permission_check_with_msg('expense_category_edit');
		$data=$this->data;		
		$result=$this->category->get_details($id,$data);
		$data=array_merge($data,$result);
		$data['page_title']=$this->lang->line('expense_category');
		$this->load->view('expense-category', $data);
	}
	public function update_category(){
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result=$this->category->update_category();
			echo $result;
		} else {
			echo "Please Enter Category name.";
		}
	}

	public function expense_update_status(){
		$this->permission_check_with_msg('expense_category_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		return $this->category->update_status($id,$status);
		
	}
	public function delete_category(){
		$this->permission_check_with_msg('expense_category_delete');
		$id=$this->input->post('q_id');
		return $this->category->delete_categories_from_table($id);
	}
	public function multi_delete(){
		$this->permission_check_with_msg('expense_category_delete');
		$ids=implode (",",$_POST['checkbox']);
		return $this->category->delete_categories_from_table($ids);
	}
	/* ######################################## EXPENSE CATEGORY END############################# */

}
