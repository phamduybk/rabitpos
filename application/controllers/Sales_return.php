<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_return extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('sales_return_model','sales');
		$this->load->helper('sms_template_helper');
	}

	public function is_sms_enabled(){
		return is_sms_enabled();
	}

	public function index()
	{
		$this->permission_check('sales_return_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('sales_returns_list');
		$this->load->view('sales-return-list',$data);
	}

	public function create(){
		$this->permission_check('sales_return_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('sales_return');
		$data['oper']='create_new_return';
		$data['subtitle']=$this->lang->line('create_new_return');;
		$this->load->view('sales-return', $data);
	}

  public function add($id){
  		$this->permission_check('sales_return_edit');
  		$q2=$this->db->query("select sales_status from db_sales where id=".$id);
		if($q2->row()->sales_status=='Quotation'){
			$this->session->set_flashdata('warning','Sorry! Quotation could not be returned!');
			redirect($_SERVER['HTTP_REFERER']);
			exit();
		}

  	    $q1=$this->db->query("select id from db_salesreturn where sales_id=".$id);
		if($q1->num_rows()>0){
			$this->session->set_flashdata('success','Sales Return Invoice Already Generated!');
			redirect(base_url('sales_return/edit/'.$q1->row()->id),'refresh');exit();
		}
	    
	    $data=$this->data;
	    $data['sales_id']=$id;;
	    $data['page_title']=$this->lang->line('sales_return');
	    $data['oper']='return_against_sales';
	    $data['subtitle']=$this->lang->line('return_against_sales');;
	    $this->load->view('sales-return', $data);
	  }

	/*
	public function add()
	{	
		$this->permission_check('sales_return_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('sales_return');
		$this->load->view('sales-return',$data);
	}*/
	

	public function sales_save_and_update(){
		$this->form_validation->set_rules('return_date', 'Return Date', 'trim|required');
		$this->form_validation->set_rules('customer_id', 'Customer Name', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
	    	$result = $this->sales->verify_save_and_update();
	    	echo $result;
		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}
	
	
	public function edit($id){
		$this->permission_check('sales_return_edit');
		$data=$this->data;
		$data=array_merge($data,array('return_id'=>$id));
		$data['oper']='edit_existing_return';
		$data['subtitle']=$this->lang->line('edit_return_sales_entry');;
		$data['page_title']=$this->lang->line('sales_return');
		$this->load->view('sales-return', $data);
	}
	

	public function ajax_list()
	{
		$list = $this->sales->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $sales) {
			
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value='.$sales->id.' class="checkbox column_checkbox" >';
			$row[] = show_date($sales->return_date);
			$row[] = $sales->sales_code;
			$row[] = $sales->return_code;
			$row[] = $sales->return_status;
			$row[] = $sales->reference_no;
			$row[] = $sales->customer_name;
			//$row[] = $sales->warehouse_name;
			$row[] = app_number_format($sales->grand_total);
			$row[] = app_number_format($sales->paid_amount);
			$row[] = app_number_format($sales->return_due);
					$str='';
					if($sales->payment_status=='Unpaid')
			          $str= "<span class='label label-danger' style='cursor:pointer'>Unpaid </span>";
			        if($sales->payment_status=='Partial')
			          $str="<span class='label label-warning' style='cursor:pointer'> Partial </span>";
			        if($sales->payment_status=='Paid')
			          $str="<span class='label label-success' style='cursor:pointer'> Paid </span>";

			$row[] = $str;
			$row[] = ucfirst($sales->created_by);

					 /*if($sales->pos ==1):
					 	$str1='pos/edit/';
					 else:*/
					 	$str1='sales_return/edit/';
					 /*endif;*/

					$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';
											if($this->permissions('sales_return_view'))
											$str2.='<li>
												<a title="View Invoice" href="sales_return/invoice/'.$sales->id.'" >
													<i class="fa fa-fw fa-eye text-blue"></i>View sales
												</a>
											</li>';

											if($this->permissions('sales_return_edit'))
											$str2.='<li>
												<a title="Update Record ?" href="'.$str1.$sales->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('sales_return_payment_view'))
											$str2.='<li>
												<a title="Pay" class="pointer" onclick="view_payments('.$sales->id.')" >
													<i class="fa fa-fw fa-money text-blue"></i>View Payments
												</a>
											</li>';

											if($this->permissions('sales_return_payment_add'))
											$str2.='<li>
												<a title="Pay" class="pointer" onclick="pay_now('.$sales->id.')" >
													<i class="fa fa-fw fa-hourglass-half text-blue"></i>Pay Now
												</a>
											</li>';

											if($this->permissions('sales_return_add') || $this->permissions('sales_return_edit'))
											$str2.='<li>
												<a title="Update Record ?" target="_blank" href="sales_return/print_invoice/'.$sales->id.'">
													<i class="fa fa-fw fa-print text-blue"></i>Print
												</a>
											</li>

											<li>
												<a title="Update Record ?" target="_blank" href="sales_return/pdf/'.$sales->id.'">
													<i class="fa fa-fw fa-file-pdf-o text-blue"></i>PDF
												</a>
											</li>';

											if($this->permissions('sales_return_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_return(\''.$sales->id.'\')">
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
						"recordsTotal" => $this->sales->count_all(),
						"recordsFiltered" => $this->sales->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function update_status(){
		$this->permission_check('sales_return_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');

		
		$result=$this->sales->update_status($id,$status);
		return $result;
	}
	public function delete_return(){
		$this->permission_check_with_msg('sales_return_delete');
		$id=$this->input->post('q_id');
		echo $this->sales->delete_return($id);
	}
	public function multi_delete(){
		$this->permission_check_with_msg('sales_return_delete');
		$ids=implode (",",$_POST['checkbox']);
		echo $this->sales->delete_return($ids);
	}


	//Table ajax code
	public function search_item(){
		$q=$this->input->get('q');
		$result=$this->sales->search_item($q);
		echo $result;
	}
	public function find_item_details(){
		$id=$this->input->post('id');
		
		$result=$this->sales->find_item_details($id);
		echo $result;
	}

	//sales invoice form
	public function invoice($id)
	{	
		if(!$this->permissions('sales_return_add') && !$this->permissions('sales_return_edit')){
			$this->show_access_denied_page();
		}
		$data=$this->data;
		$data=array_merge($data,array('return_id'=>$id));
		$data['page_title']=$this->lang->line('sales_return_invoice');
		$this->load->view('sal-return-invoice',$data);
	}
	
	//Print sales invoice 
	public function print_invoice($return_id)
	{
		if(!$this->permissions('sales_return_add') && !$this->permissions('sales_return_edit')){
			$this->show_access_denied_page();
		}
		$data=$this->data;
		$data=array_merge($data,array('return_id'=>$return_id));
		$data['page_title']=$this->lang->line('sales_invoice');
		$this->load->view('print-sales-return-invoice',$data);
		
	}

	//Print sales POS invoice 
	public function print_invoice_pos($return_id)
	{
		if(!$this->permissions('sales_return_add') && !$this->permissions('sales_return_edit')){
			$this->show_access_denied_page();
		}
		$data=$this->data;
		$data=array_merge($data,array('return_id'=>$return_id));
		$data['page_title']=$this->lang->line('sales_return_invoice');
		$this->load->view('sal-invoice-pos',$data);
	}
	
	
	public function pdf($return_id){
		if(!$this->permissions('sales_return_add') && !$this->permissions('sales_return_edit')){
			$this->show_access_denied_page();
		}
		$this->load->model('pdf_model');

		$data=$this->data;
		$data['page_title']=$this->lang->line('return_invoice');
        $data=array_merge($data,array('return_id'=>$return_id));

        $this->load->view('print-sales-return-invoice',$data);

        // Get output html
        $html = $this->output->get_output();

        $this->pdf_model->render($html,'Return Invoice - ');
	}

	
	/*v1.1*/
	public function return_row_with_data($rowcount,$item_id){
		echo $this->sales->get_items_info($rowcount,$item_id);
	}
	/*Retrive existing return list*/
	public function return_sales_list($return_id){
		echo $this->sales->return_sales_list($return_id);
	}
	/*Sales List from existing sales entry*/
	public function sales_list($sales_id){
		echo $this->sales->sales_list($sales_id);
	}
	public function delete_payment(){
		$this->permission_check_with_msg('sales_return_payment_delete');
		$payment_id = $this->input->post('payment_id');
		echo $this->sales->delete_payment($payment_id);
	}
	public function show_pay_now_modal(){
		$this->permission_check_with_msg('sales_return_view');
		$return_id=$this->input->post('return_id');
		echo $this->sales->show_pay_now_modal($return_id);
	}
	public function save_payment(){
		$this->permission_check_with_msg('sales_return_add');
		echo $this->sales->save_payment();
	}
	public function view_payments_modal(){
		$this->permission_check_with_msg('sales_return_view');
		$return_id=$this->input->post('return_id');
		echo $this->sales->view_payments_modal($return_id);
	}
}
