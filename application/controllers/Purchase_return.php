<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_return extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('purchase_returns_model','purchase');
	}

	public function index()
	{
		$this->permission_check('purchase_return_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('purchase_returns_list');
		$this->load->view('purchase-returns-list',$data);
	}
	
	public function create(){
		$this->permission_check('purchase_return_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('purchase_return');
		$data['oper']='create_new_return';
		$data['subtitle']=$this->lang->line('create_new_return');;
		$this->load->view('purchase_return', $data);
	}

	public function add($id){
		$this->permission_check('purchase_return_edit');

		$q2=$this->db->query("select purchase_status from db_purchase where id=".$id);
		if($q2->row()->purchase_status!='Received'){
			$this->session->set_flashdata('warning','Sorry! '.$q2->row()->purchase_status.' Invoice could not be returned!');
			redirect($_SERVER['HTTP_REFERER']);
			exit();
		}

		$q1=$this->db->query("select id from db_purchasereturn where purchase_id=".$id);
		if($q1->num_rows()>0){
			$this->session->set_flashdata('success','Purchase Return Invoice Already Generated!');
			redirect(base_url('purchase_return/edit/'.$q1->row()->id),'refresh');exit();
		}
		
		$data=$this->data;
		$data=array_merge($data,array('purchase_id'=>$id));
		$data['page_title']=$this->lang->line('purchase_return');
		$data['oper']='return_against_purchase';
		$data['subtitle']=$this->lang->line('return_against_purchase');;
		$this->load->view('purchase_return', $data);
	}

	public function purchase_save_and_update(){
		$this->form_validation->set_rules('return_date', 'Return Date', 'trim|required');
		$this->form_validation->set_rules('supplier_id', 'Supplier Name', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
	    	$result = $this->purchase->verify_save_and_update();
	    	echo $result;
		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}
	

	public function edit($id){
		$this->permission_check('purchase_return_edit');
		$data=$this->data;
		$data=array_merge($data,array('return_id'=>$id));
		$data['oper']='edit_existing_return';
		$data['subtitle']=$this->lang->line('edit_return_purchase_entry');;
		$data['page_title']=$this->lang->line('edit_purchase_return');
		$this->load->view('purchase_return', $data);
	}
	
	//adding new item from Modal
	public function newsupplier(){
	
		$this->form_validation->set_rules('supplier_name', 'supplier Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			$this->load->model('suppliers_model');
			$result=$this->suppliers_model->verify_and_save();
			//fetch latest item details
			$res=array();
			$query=$this->db->query("select id,supplier_name from db_suppliers order by id desc limit 1");
			$res['id']=$query->row()->id;
			$res['supplier_name']=$query->row()->supplier_name;
			$res['result']=$result;
			
			echo json_encode($res);

		} 
		else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}

	public function ajax_list()
	{
		$list = $this->purchase->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $purchase) {
			
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value='.$purchase->id.' class="checkbox column_checkbox" >';
			$row[] = show_date($purchase->return_date);
			
			$row[] = $purchase->purchase_code;
			$row[] = $purchase->return_code;
			$row[] = $purchase->return_status;
			$row[] = $purchase->reference_no;
			$row[] = $purchase->supplier_name;
			/*$row[] = $purchase->warehouse_name;*/
			$row[] = app_number_format($purchase->grand_total);
			$row[] = app_number_format($purchase->paid_amount);
			$row[] = app_number_format($purchase->return_due);
					$str='';
					if($purchase->payment_status=='Unpaid')
			          $str= "<span class='label label-danger' style='cursor:pointer'>Unpaid </span>";
			        if($purchase->payment_status=='Partial')
			          $str="<span class='label label-warning' style='cursor:pointer'> Partial </span>";
			        if($purchase->payment_status=='Paid')
			          $str="<span class='label label-success' style='cursor:pointer'> Paid </span>";

			$row[] = $str;
			$row[] = ucfirst($purchase->created_by);
					$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';
											if($this->permissions('purchase_return_view'))
											$str2.='<li>
												<a title="View Invoice" href="'.base_url().'purchase_return/invoice/'.$purchase->id.'" ><i class="fa fa-fw fa-eye text-blue"></i>View Purchase
												</a>
											</li>';

											if($this->permissions('purchase_return_edit'))
											$str2.='<li>
												<a title="Update Record ?" href="'.base_url().'purchase_return/edit/'.$purchase->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('purchase_return_payment_add'))
											$str2.='
											<li>
												<a title="Pay" class="pointer" onclick="view_payments('.$purchase->id.')" >
													<i class="fa fa-fw fa-money text-blue"></i>View Payments
												</a>
											</li>';

											if($this->permissions('purchase_return_payment_add'))
											$str2.='<li>
												<a title="Pay" class="pointer" onclick="pay_now('.$purchase->id.')" >
													<i class="fa fa-fw  fa-hourglass-half text-blue"></i>Pay Now
												</a>
											</li>';

											if($this->permissions('purchase_return_add') || $this->permissions('purchase_return_edit'))
											$str2.='<li>
												<a title="Update Record ?" target="_blank" href="'.base_url().'purchase_return/print_invoice/'.$purchase->id.'">
													<i class="fa fa-fw fa-print text-blue"></i>Print
												</a>
											</li>
											<li>
												<a title="Update Record ?" target="_blank" href="'.base_url().'purchase_return/pdf/'.$purchase->id.'">
													<i class="fa fa-fw fa-file-pdf-o text-blue"></i>PDF
												</a>
											</li>';

											
											if($this->permissions('purchase_return_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_return(\''.$purchase->id.'\')">
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
						"recordsTotal" => $this->purchase->count_all(),
						"recordsFiltered" => $this->purchase->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function delete_return(){
		$this->permission_check_with_msg('purchase_return_delete');
		$id=$this->input->post('q_id');
		echo $this->purchase->delete_return($id);
	}
	public function multi_delete(){
		$this->permission_check_with_msg('purchase_return_delete');
		$ids=implode (",",$_POST['checkbox']);
		echo $this->purchase->delete_return($ids);
	}


	//Table ajax code
	public function search_item(){
		$q=$this->input->get('q');
		$result=$this->purchase->search_item($q);
		echo $result;
	}
	public function find_item_details(){
		$id=$this->input->post('id');
		
		$result=$this->purchase->find_item_details($id);
		echo $result;
	}

	//Purchase invoice form
	public function invoice($id)
	{
		if(!$this->permissions('purchase_return_add') && !$this->permissions('purchase_return_edit')){
			$this->show_access_denied_page();
		}
		$data=$this->data;
		$data=array_merge($data,array('return_id'=>$id));
		$data['page_title']=$this->lang->line('purchase_return_invoice');
		$this->load->view('pur-return-invoice',$data);
	}
	
	//Print Purchase invoice 
	public function print_invoice($return_id)
	{
		if(!$this->permissions('purchase_return_add') && !$this->permissions('purchase_return_edit')){
			$this->show_access_denied_page();
		}
		$data=$this->data;
		$data=array_merge($data,array('return_id'=>$return_id));
		$data['page_title']=$this->lang->line('purchase_return_invoice');
		$this->load->view('print-purchase-return-invoice',$data);
	}
	public function pdf($return_id)
	{
		if(!$this->permissions('purchase_return_add') && !$this->permissions('purchase_return_edit')){
			$this->show_access_denied_page();
		}
		$data=$this->data;
		$data=array_merge($data,array('return_id'=>$return_id));
		$data['page_title']=$this->lang->line('purchase_invoice');
		$this->load->view('print-purchase-return-invoice',$data);

		mb_internal_encoding('UTF-8');

		// Get output html
        $html = $this->output->get_output();
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');/*landscape or portrait*/
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("Purchase_return_invoice_$return_id", array("Attachment"=>0));
	}


	//Purchase Barcode image
	public function barcode_image($item_code)
	{
		$this->load->library('zend');
	    $this->zend->load('Zend/Barcode');
	    Zend_Barcode::render('code39', 'image', array('text' => $item_code), array());
	}


	public function return_row_with_data($rowcount,$item_id){
		echo $this->purchase->get_items_info($rowcount,$item_id);
	}
	/*Retrive existing return list*/
	public function return_purchase_list($return_id){
		echo $this->purchase->return_purchase_list($return_id);
	}

	/*Purchase List from existing purchase entry*/
	public function purchase_list($purchase_id){
		echo $this->purchase->purchase_list($purchase_id);
	}
	
	public function delete_payment(){
		$this->permission_check_with_msg('purchase_return_payment_delete');
		$payment_id = $this->input->post('payment_id');
		echo $this->purchase->delete_payment($payment_id);
	}

	public function show_pay_now_modal(){
		$this->permission_check_with_msg('purchase_return_view');
		$purchase_id=$this->input->post('purchase_id');
		echo $this->purchase->show_pay_now_modal($purchase_id);
	}

	public function save_payment(){
		$this->permission_check_with_msg('purchase_return_add');
		echo $this->purchase->save_payment();
	}
	
	public function view_payments_modal(){
		$this->permission_check_with_msg('purchase_return_view');
		$purchase_id=$this->input->post('purchase_id');
		echo $this->purchase->view_payments_modal($purchase_id);
	}


}
