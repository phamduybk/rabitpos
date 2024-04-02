<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_model extends CI_Model {

	//Datatable start
	var $table = 'db_customers as a';
	var $column_order = array('a.customer_code','a.id','a.customer_name','a.mobile','a.type_id','a.status','a.sales_due','a.sales_return_due'); //set column field database for datatable orderable
	var $column_search = array('a.customer_code','a.id','a.customer_name','a.mobile','a.type_id','a.status','a.sales_due','a.sales_return_due'); //set column field database for datatable searchable 
	var $order = array('a.id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
	{
		$this->db->select($this->column_order);
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	//Datatable end

	//Save Cutomers
	public function verify_and_save(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));

		$state = (!empty($state)) ? $state : 'NULL';

		//Validate This customers already exist or not
		/*$query=$this->db->query("select * from db_customers where upper(customer_name)=upper('$customer_name')");
		if($query->num_rows()>0){
			return "Sorry! This Customers Name already Exist.";
		}*/
		$query2=$this->db->query("select * from db_customers where mobile='$mobile'");
		if($query2->num_rows()>0 && !empty($mobile)){
			return "Sorry!This Mobile Number already Exist.";;
		}
		
		$qs5="select customer_init from db_company";
		$q5=$this->db->query($qs5);
		$customer_init=$q5->row()->customer_init;

		//Create customers unique Number
		$qs4="select coalesce(max(id),0)+1 as maxid from db_customers";
		$q1=$this->db->query($qs4);
		$maxid=$q1->row()->maxid;
		$customer_code=$customer_init.str_pad($maxid, 4, '0', STR_PAD_LEFT);
		//end

		$query1="insert into db_customers(customer_code,customer_name,mobile,phone,email,
											country_id,state_id,city,postcode,address,opening_balance,
											system_ip,system_name,
											created_date,created_time,created_by,status,gstin,tax_number,type_id)
											values('$customer_code','$customer_name','$mobile','$phone','$email',
											'$country',$state,'$city','$postcode','$address','$opening_balance',
											'$SYSTEM_IP','$SYSTEM_NAME',
											'$CUR_DATE','$CUR_TIME','$CUR_USERNAME',1,'$gstin','$tax_number','$type_id')";

		if ($this->db->simple_query($query1)){
				//$this->session->set_flashdata('success', 'Success!! New Customer Added Successfully!');
		        return "success";
		}
		else{
		        return "failed";
		}
		
	}

	//Get customers_details
	public function get_details($id,$data){
		//Validate This customers already exist or not
		$query=$this->db->query("select * from db_customers where upper(id)=upper('$id')");
		if($query->num_rows()==0){
			show_404();exit;
		}
		else{
			$query=$query->row();
			$data['q_id']=$query->id;
			$data['customer_name']=$query->customer_name;
			$data['mobile']=$query->mobile;
			$data['phone']=$query->phone;
			$data['email']=$query->email;
			$data['country_id']=$query->country_id;
			$data['state_id']=$query->state_id;
			$data['city']=$query->city;
			$data['postcode']=$query->postcode;
			$data['address']=$query->address;
			$data['gstin']=$query->gstin;
			$data['tax_number']=$query->tax_number;
			$data['opening_balance']=$query->opening_balance;
			$data['type_id']=$query->type_id;

			return $data;
		}
	}
	public function update_customers(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));

		if($q_id==1){
			echo "Sorry! This Record Restricted! Can't Update";exit();
		}

		$state = (!empty($state)) ? $state : 'NULL';

		//Validate This customers already exist or not
		/*$query=$this->db->query("select * from db_customers where upper(customer_name)=upper('$customer_name') and id<>$q_id");
		if($query->num_rows()>0){
			return "This Customers Name already Exist.";
			
		}
		else{*/
			$query1="update db_customers set customer_name='$customer_name',mobile='$mobile',phone='$phone',
							email='$email',country_id='$country',state_id=$state,city='$city',
							opening_balance='$opening_balance',
							postcode='$postcode',address='$address',gstin='$gstin',tax_number='$tax_number',type_id='$type_id'
							 where id=$q_id";
			if ($this->db->simple_query($query1)){
					//$this->session->set_flashdata('success', 'Success!! Customer Updated Successfully!');
			        return "success";
			}
			else{
			        return "failed";
			}
		/*}*/
	}
	public function update_status($id,$status){

		if($id==1){
			echo "Sorry! This Record Restricted! Can't Update Status";exit();
		}

        $query1="update db_customers set status='$status' where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}

	public function delete_customers_from_table($ids){

		if (demo_app()) {
			echo "Demo không cho phép xóa";
			return;
		}

		if($ids==1){
			echo "Sorry! This Record Restricted! Can't Delete";exit();
		}
		$q1 = $this->db->query("select count(*) as tot_entrys from db_sales where customer_id in ($ids)");
		if($q1->row()->tot_entrys >0 ){
			echo "Sales Invoices Exist of Customer! Please Delete Sales Invoices!";exit();
		}
		$q1 = $this->db->query("delete from db_cobpayments where customer_id<>1 and customer_id in ($ids)");
		$query1="delete from db_customers where id in($ids) and id<>1";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }	
	}

	public function show_pay_now_modal($customer_id){
		$CI =& get_instance();
		$sales_id='';
		
		$q2=$this->db->query("select * from db_customers where id=$customer_id");
		$res2=$q2->row();

		$customer_name=$res2->customer_name;
	    $customer_mobile=$res2->mobile;
	    $customer_phone=$res2->phone;
	    $customer_email=$res2->email;
	    $customer_country=$res2->country_id;
	    $customer_state=$res2->state_id;
	    $customer_address=$res2->address;
	    $customer_postcode=$res2->postcode;
	    $customer_gst_no=$res2->gstin;
	    $customer_tax_number=$res2->tax_number;
	    $customer_opening_balance=$res2->opening_balance;
	    $customer_sales_due=$res2->sales_due;

	    $sales_date='';//$res1->sales_date;
	    $reference_no='';//$res1->reference_no;
	    $sales_code='';//$res1->sales_code;
	    $sales_note='';//$res1->sales_note;
	    $grand_total=0;//$res1->grand_total;
	    $paid_amount=0;//$res1->paid_amount;
	    //$due_amount =0;//$grand_total - $paid_amount;

	    if(!empty($customer_country)){
	      $customer_country = $this->db->query("select country from db_country where id='$customer_country'")->row()->country;  
	    }
	    if(!empty($customer_state)){
	      $customer_state = $this->db->query("select state from db_states where id='$customer_state'")->row()->state;  
	    }
	    $sum_of_ob_paid = $this->db->query("select coalesce(sum(payment),0) sum_of_ob_paid from db_cobpayments where customer_id=$customer_id")->row()->sum_of_ob_paid; 
	    $customer_opening_balance_due = $customer_opening_balance - $sum_of_ob_paid;

	    $q6 = $this->db->query("select coalesce(sum(grand_total),0) as total_sales_amount,coalesce(sum(paid_amount),0) as total_paid_amount from db_sales where customer_id=$customer_id"); 
	    $total_sales_amount = $q6->row()->total_sales_amount;
	    $total_paid_amount = $q6->row()->total_paid_amount;
	    //$total_sales_due_amount =$total_sales_amount - $total_paid_amount;
	    $due_amount = number_format($customer_sales_due + $customer_opening_balance_due,2,'.','') ;
		?>
		<div class="modal fade" id="pay_now">
		  <div class="modal-dialog ">
		    <div class="modal-content">
		      <div class="modal-header header-custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center">Pay Due Payments</h4>
		      </div>
		      <div class="modal-body">
		        
		    <div class="row">
		      <div class="col-md-12">
		      	<div class="row invoice-info">
			        <div class="col-sm-12 invoice-col">
			          <i><?= $this->lang->line('customer_details'); ?></i>
			          <address>
			            <strong><?php echo  $customer_name; ?></strong><br>
			            <?php echo (!empty(trim($customer_mobile))) ? $this->lang->line('mobile').": ".$customer_mobile."<br>" : '';?>
			            <?php echo (!empty(trim($customer_phone))) ? $this->lang->line('phone').": ".$customer_phone."<br>" : '';?>
			            <?php echo (!empty(trim($customer_email))) ? $this->lang->line('email').": ".$customer_email."<br>" : '';?>
			            <?php echo (!empty(trim($customer_gst_no))) ? $this->lang->line('gst_number').": ".$customer_gst_no."<br>" : '';?>
			            <?php echo (!empty(trim($customer_tax_number))) ? $this->lang->line('tax_number').": ".$customer_tax_number."<br>" : '';?>
			            
			          </address>
			        </div>
			        <!-- /.col -->
			        <div class="col-sm-12 invoice-col">

			        	<table class="table table-sm table-bordered bg-info" width="100%">
			        		<tr>
			        			<td class="text-right"><?= $this->lang->line('opening_balance'); ?></td>
			        			<td class="text-right"><?= $CI->currency($customer_opening_balance); ?></td>
			        			<td class="text-right"><?= $this->lang->line('total_sales_amount'); ?></td>
			        			<td class="text-right"><?= $CI->currency($total_sales_amount); ?></td>
			        		</tr>
			        		<tr>
			        			<td class="text-right"><?= $this->lang->line('opening_balance_due'); ?></td>
			        			<td class="text-right"><?= $CI->currency($customer_opening_balance_due); ?></td>
			        			<td class="text-right"><?= $this->lang->line('paid_amount'); ?></td>
			        			<td class="text-right"><?= $CI->currency($total_paid_amount); ?></td>
			        		</tr>
			        		<tr>
			        			<td colspan="2"></td>
			        			<td class="text-right"><?= $this->lang->line('sales_due'); ?></td>
			        			<td class="text-right"><?= $CI->currency($customer_sales_due); ?></td>
			        		</tr>
			        	</table>
			         
			        </div>
			        <!-- /.col -->
			      </div>
			      <!-- /.row -->
		      </div>
		      <div class="col-md-12">
		        <div>
		        <input type="hidden" name="payment_row_count" id='payment_row_count' value="1">
		        <div class="col-md-12  payments_div">
		          <div class="box box-solid bg-gray">
		            <div class="box-body">
		              <div class="row">
		         		<div class="col-md-4">
		                  <div class="">
		                  <label for="payment_date">Date</label>
		                    <div class="input-group date">
			                      <div class="input-group-addon">
			                      <i class="fa fa-calendar"></i>
			                      </div>
			                      <input type="text" class="form-control pull-right datepicker" value="<?= show_date(date("d-m-Y")); ?>" id="payment_date" name="payment_date" readonly>
			                    </div>
		                      <span id="payment_date_msg" style="display:none" class="text-danger"></span>
		                </div>
		               </div>
		                <div class="col-md-4">
		                  <div class="">
		                  <label for="amount">Amount</label>
		                    <input type="text" class="form-control text-right paid_amt" data-due-amt='<?=$due_amount;?>' id="amount" name="amount" placeholder="" value="<?=$due_amount;?>" onkeyup="calculate_payments()">
		                      <span id="amount_msg" style="display:none" class="text-danger"></span>
		                </div>
		               </div>
		                <div class="col-md-4">
		                  <div class="">
		                    <label for="payment_type">Payment Type</label>
		                    <select class="form-control" id='payment_type' name="payment_type">
		                      <?php
		                        $q1=$this->db->query("select * from db_paymenttypes where status=1");
		                         if($q1->num_rows()>0){
		                             foreach($q1->result() as $res1){
		                             echo "<option value='".$res1->payment_type."'>".$res1->payment_type ."</option>";
		                           }
		                         }
		                         else{
		                            echo "No Records Found";
		                         }
		                        ?>
		                    </select>
		                    <span id="payment_type_msg" style="display:none" class="text-danger"></span>
		                  </div>
		                </div>
		            <div class="clearfix"></div>
		        </div>  
		        <div class="row">
		               <div class="col-md-12">
		                  <div class="">
		                    <label for="payment_note">Payment Note</label>
		                    <textarea type="text" class="form-control" id="payment_note" name="payment_note" placeholder="" ></textarea>
		                    <span id="payment_note_msg" style="display:none" class="text-danger"></span>
		                  </div>
		               </div>
		                
		            <div class="clearfix"></div>
		        </div>   
		        </div>
		        </div>
		      </div><!-- col-md-12 -->
		    </div>
		      </div><!-- col-md-9 -->
		      <!-- RIGHT HAND -->
		    </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
		        <button type="button" onclick="save_payment(<?=$customer_id;?>)" class="btn bg-green btn-lg place_order btn-lg payment_save">Save<i class="fa  fa-check "></i></button>
		      </div>
		    </div>
		    <!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		</div>
		<?php
	}

	public function save_payment(){
		$this->db->trans_begin();
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST,$_GET))));
		//echo "<pre>";print_r($this->security->xss_clean(html_escape(array_merge($this->data,$_POST,$_GET))));exit();

		$this->load->model('sales_model');
		
    	if($amount=='' || $amount==0){$amount=null;}


		if($amount>0 && !empty($payment_type)){

			//Get Opening Balance
			$q2=$this->db->query("select * from db_customers where id=$customer_id");
			$res2=$q2->row();
			$customer_opening_balance=$res2->opening_balance;
	    	$customer_sales_due=$res2->sales_due;

	    	$sum_of_ob_paid = $this->db->query("select coalesce(sum(payment),0) sum_of_ob_paid from db_cobpayments where customer_id=$customer_id")->row()->sum_of_ob_paid; 
	    	$customer_opening_balance_due = $customer_opening_balance - $sum_of_ob_paid;

	    	/*$customer_payment = array(
	    								'customer_id' 		=> $customer_id,
	    								'payment_date' 		=> date("Y-m-d",strtotime($payment_date)),
	    								'payment_type' 		=> $payment_type,
	    								'payment' 			=> $amount,
	    								'payment_note' 		=> $payment_note,
	    								'created_date' 		=> $CUR_DATE,
					    				'created_time' 		=> $CUR_TIME,
					    				'created_by' 		=> $CUR_USERNAME,
					    				'system_ip' 		=> $SYSTEM_IP,
					    				'system_name' 		=> $SYSTEM_NAME,
					    				'status' 			=> 1,
	    							);
	    	$q1=$this->db->insert("db_customer_payments",$customer_payment);
	    	if(!$q1){
	    		return "failed";
	    	}
	    	$customer_payment_id = $this->db->insert_id();*/

	    	while($amount>0) {

	    		
	    		//Adjust Opening Balance
	    		if($amount<=$customer_opening_balance_due && $customer_opening_balance_due>0){
	    			$row_data = array(	'customer_id' 		=> $customer_id,
	    							  	'payment_date'		=> date("Y-m-d",strtotime($payment_date)),
										'payment_type' 		=> $payment_type,
										'payment' 			=> $amount,
										'payment_note' 		=> $payment_note,
										'created_date' 		=> $CUR_DATE,
					    				'created_time' 		=> $CUR_TIME,
					    				'created_by' 		=> $CUR_USERNAME,
					    				'system_ip' 		=> $SYSTEM_IP,
					    				'system_name' 		=> $SYSTEM_NAME,
					    				'status' 			=> 1,
	    								 );
	    			$q3 = $this->db->insert('db_cobpayments', $row_data);
	    			$amount=0;
	    		}
	    		if($amount>=$customer_opening_balance_due && $customer_opening_balance_due){
	    			$row_data = array(	'customer_id' 		=> $customer_id,
	    							  	'payment_date'		=> date("Y-m-d",strtotime($payment_date)),
										'payment_type' 		=> $payment_type,
										'payment' 			=> $customer_opening_balance_due,
										'payment_note' 		=> $payment_note,
										'created_date' 		=> $CUR_DATE,
					    				'created_time' 		=> $CUR_TIME,
					    				'created_by' 		=> $CUR_USERNAME,
					    				'system_ip' 		=> $SYSTEM_IP,
					    				'system_name' 		=> $SYSTEM_NAME,
					    				'status' 			=> 1,
	    								 );
	    			$q3 = $this->db->insert('db_cobpayments', $row_data);
	    			$amount-=$customer_opening_balance_due;
	    		}

	    		//Set Sales Payments
	    		if($amount<=$customer_sales_due){
	    			$qs4=$this->db->query("select id,grand_total,paid_amount,coalesce(grand_total-paid_amount,0) as sales_due from db_sales where grand_total!=paid_amount and customer_id=".$customer_id);
	    			foreach ($qs4->result() as $res) {
	    				$grand_total = $res->grand_total;
	    				$paid_amount = $res->paid_amount;
	    				$sales_due = $res->sales_due;
	    				$sales_id = $res->id;
	    				if($amount<=$sales_due && $sales_due>0){
	    					$salespayments_entry = array(
								'sales_id' 		=> $sales_id, 
								'payment_date'		=> date("Y-m-d",strtotime($payment_date)),//Current Payment with sales entry
								'payment_type' 		=> $payment_type,
								'payment' 			=> $amount,
								'payment_note' 		=> $payment_note,
								'created_date' 		=> $CUR_DATE,
			    				'created_time' 		=> $CUR_TIME,
			    				'created_by' 		=> $CUR_USERNAME,
			    				'system_ip' 		=> $SYSTEM_IP,
			    				'system_name' 		=> $SYSTEM_NAME,
			    				'status' 			=> 1,
							);
						   $amount=0;
	    				}
	    			    if($amount>=$sales_due && $sales_due>0){
	    					$salespayments_entry = array(
								'sales_id' 		=> $sales_id, 
								'payment_date'		=> date("Y-m-d",strtotime($payment_date)),//Current Payment with sales entry
								'payment_type' 		=> $payment_type,
								'payment' 			=> $sales_due,
								'payment_note' 		=> $payment_note,
								'created_date' 		=> $CUR_DATE,
			    				'created_time' 		=> $CUR_TIME,
			    				'created_by' 		=> $CUR_USERNAME,
			    				'system_ip' 		=> $SYSTEM_IP,
			    				'system_name' 		=> $SYSTEM_NAME,
			    				'status' 			=> 1,
							);
						   $amount-=$sales_due;
	    				}

	    				$q3 = $this->db->insert('db_salespayments', $salespayments_entry);

	    				
	    				$q10=$this->sales_model->update_sales_payment_status($sales_id,$customer_id);
						if($q10!=1){
							return "failed";
						}
	    			}
					
	    		}
	    		

	    	}
				
			
		}
		else{
			return "Please Enter Valid Amount!";
		}
		
		$this->db->trans_commit();
		return "success";

	}

	public function show_pay_return_due_modal($customer_id){

		$CI =& get_instance();
		$sales_id='';
		
		$q2=$this->db->query("select * from db_customers where id=$customer_id");
		$res2=$q2->row();

		$customer_name=$res2->customer_name;
	    $customer_mobile=$res2->mobile;
	    $customer_phone=$res2->phone;
	    $customer_email=$res2->email;
	    $customer_country=$res2->country_id;
	    $customer_state=$res2->state_id;
	    $customer_address=$res2->address;
	    $customer_postcode=$res2->postcode;
	    $customer_gst_no=$res2->gstin;
	    $customer_tax_number=$res2->tax_number;
	    //$customer_opening_balance=$res2->opening_balance;
	    $customer_sales_return_due=$res2->sales_return_due;

	    $sales_date='';//$res1->sales_date;
	    $reference_no='';//$res1->reference_no;
	    $sales_code='';//$res1->sales_code;
	    $sales_note='';//$res1->sales_note;
	    $grand_total=0;//$res1->grand_total;
	    $paid_amount=0;//$res1->paid_amount;
	    //$due_amount =0;//$grand_total - $paid_amount;

	    if(!empty($customer_country)){
	      $customer_country = $this->db->query("select country from db_country where id='$customer_country'")->row()->country;  
	    }
	    if(!empty($customer_state)){
	      $customer_state = $this->db->query("select state from db_states where id='$customer_state'")->row()->state;  
	    }
	    //$sum_of_ob_paid = $this->db->query("select coalesce(sum(payment),0) sum_of_ob_paid from db_cobpayments where customer_id=$customer_id")->row()->sum_of_ob_paid; 
	    //$customer_opening_balance_due = $customer_opening_balance - $sum_of_ob_paid;

	    $q6 = $this->db->query("select coalesce(sum(grand_total),0) as total_sales_amount,coalesce(sum(paid_amount),0) as total_paid_amount from db_salesreturn where customer_id=$customer_id"); 
	    $total_sales_amount = $q6->row()->total_sales_amount;
	    $total_paid_amount = $q6->row()->total_paid_amount;
	    //$total_sales_due_amount =$total_sales_amount - $total_paid_amount;
	    $due_amount = number_format($total_sales_amount - $total_paid_amount,0,'.','') ;
		?>
		<div class="modal fade" id="pay_return_due">
		  <div class="modal-dialog ">
		    <div class="modal-content">
		      <div class="modal-header header-custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center">Pay Sales Return Due Payments</h4>
		      </div>
		      <div class="modal-body">
		        
		    <div class="row">
		      <div class="col-md-12">
		      	<div class="row invoice-info">
			        <div class="col-sm-12 invoice-col">
			          <i><?= $this->lang->line('customer_details'); ?></i>
			          <address>
			            <strong><?php echo  $customer_name; ?></strong><br>
			            <?php echo (!empty(trim($customer_mobile))) ? $this->lang->line('mobile').": ".$customer_mobile."<br>" : '';?>
			            <?php echo (!empty(trim($customer_phone))) ? $this->lang->line('phone').": ".$customer_phone."<br>" : '';?>
			            <?php echo (!empty(trim($customer_email))) ? $this->lang->line('email').": ".$customer_email."<br>" : '';?>
			            <?php echo (!empty(trim($customer_gst_no))) ? $this->lang->line('gst_number').": ".$customer_gst_no."<br>" : '';?>
			            <?php echo (!empty(trim($customer_tax_number))) ? $this->lang->line('tax_number').": ".$customer_tax_number."<br>" : '';?>
			            
			          </address>
			        </div>
			        <!-- /.col -->
			        <div class="col-sm-12 invoice-col">

			        	<table class="table table-sm table-bordered bg-info" width="100%">
			        		<tr>
			        			<td class="text-right"><?= $this->lang->line('total_sales_amount'); ?></td>
			        			<td class="text-right"><?= $CI->currency($total_sales_amount); ?></td>
			        		</tr>
			        		<tr>
			        			<td class="text-right"><?= $this->lang->line('paid_amount'); ?></td>
			        			<td class="text-right"><?= $CI->currency($total_paid_amount); ?></td>
			        		</tr>
			        		<tr>
			        			<td class="text-right"><?= $this->lang->line('sales_due'); ?></td>
			        			<td class="text-right"><?= $CI->currency($customer_sales_return_due); ?></td>
			        		</tr>
			        	</table>
			         
			        </div>
			        <!-- /.col -->
			      </div>
			      <!-- /.row -->
		      </div>
		      <div class="col-md-12">
		        <div>
		        <input type="hidden" name="payment_row_count" id='payment_row_count' value="1">
		        <div class="col-md-12  payments_div">
		          <div class="box box-solid bg-gray">
		            <div class="box-body">
		              <div class="row">
		         		<div class="col-md-4">
		                  <div class="">
		                  <label for="payment_date">Date</label>
		                    <div class="input-group date">
			                      <div class="input-group-addon">
			                      <i class="fa fa-calendar"></i>
			                      </div>
			                      <input type="text" class="form-control pull-right datepicker" value="<?= show_date(date("d-m-Y")); ?>" id="return_due_payment_date" name="return_due_payment_date" readonly>
			                    </div>
		                      <span id="return_due_payment_date_msg" style="display:none" class="text-danger"></span>
		                </div>
		               </div>
		                <div class="col-md-4">
		                  <div class="">
		                  <label for="amount">Amount</label>
		                    <input type="text" class="form-control text-right return_due_paid_amt" data-due-amt='<?=$due_amount;?>' id="return_due_amount" name="return_due_amount" placeholder="" value="<?=$due_amount;?>" >
		                      <span id="return_due_amount_msg" style="display:none" class="text-danger"></span>
		                </div>
		               </div>
		                <div class="col-md-4">
		                  <div class="">
		                    <label for="payment_type">Payment Type</label>
		                    <select class="form-control" id='return_due_payment_type' name="return_due_payment_type">
		                      <?php
		                        $q1=$this->db->query("select * from db_paymenttypes where status=1");
		                         if($q1->num_rows()>0){
		                             foreach($q1->result() as $res1){
		                             echo "<option value='".$res1->payment_type."'>".$res1->payment_type ."</option>";
		                           }
		                         }
		                         else{
		                            echo "No Records Found";
		                         }
		                        ?>
		                    </select>
		                    <span id="return_due_payment_type_msg" style="display:none" class="text-danger"></span>
		                  </div>
		                </div>
		            <div class="clearfix"></div>
		        </div>  
		        <div class="row">
		               <div class="col-md-12">
		                  <div class="">
		                    <label for="payment_note">Payment Note</label>
		                    <textarea type="text" class="form-control" id="return_due_payment_note" name="return_due_payment_note" placeholder="" ></textarea>
		                    <span id="return_due_payment_note_msg" style="display:none" class="text-danger"></span>
		                  </div>
		               </div>
		                
		            <div class="clearfix"></div>
		        </div>   
		        </div>
		        </div>
		      </div><!-- col-md-12 -->
		    </div>
		      </div><!-- col-md-9 -->
		      <!-- RIGHT HAND -->
		    </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
		        <button type="button" onclick="save_return_due_payment(<?=$customer_id;?>)" class="btn bg-green btn-lg place_order btn-lg return_due_payment_save">Save<i class="fa  fa-check "></i></button>
		      </div>
		    </div>
		    <!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		</div>
		<?php
	}
	public function save_return_due_payment(){
		$this->db->trans_begin();
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST,$_GET))));
		//echo "<pre>";print_r($this->security->xss_clean(html_escape(array_merge($this->data,$_POST,$_GET))));exit();

		$this->load->model('sales_return_model');
		
    	if($amount=='' || $amount==0){$amount=null;}


		if($amount>0 && !empty($payment_type)){

			$q2=$this->db->query("select * from db_customers where id=$customer_id");
			$res2=$q2->row();
	    	$customer_sales_return_due=$res2->sales_return_due;


	    	while($amount>0) {

	    		//Set Sales Payments
	    		if($amount<=$customer_sales_return_due){
	    			$qs4=$this->db->query("select id,grand_total,paid_amount,coalesce(grand_total-paid_amount,0) as sales_due from db_salesreturn where grand_total!=paid_amount and customer_id=".$customer_id);
	    			foreach ($qs4->result() as $res) {
	    				$grand_total = $res->grand_total;
	    				$paid_amount = $res->paid_amount;
	    				$sales_due = $res->sales_due;
	    				$return_id = $res->id;
	    				if($amount<=$sales_due && $sales_due>0){
	    					$salespayments_entry = array(
								'return_id' 		=> $return_id, 
								'payment_date'		=> date("Y-m-d",strtotime($payment_date)),//Current Payment with sales entry
								'payment_type' 		=> $payment_type,
								'payment' 			=> $amount,
								'payment_note' 		=> $payment_note,
								'created_date' 		=> $CUR_DATE,
			    				'created_time' 		=> $CUR_TIME,
			    				'created_by' 		=> $CUR_USERNAME,
			    				'system_ip' 		=> $SYSTEM_IP,
			    				'system_name' 		=> $SYSTEM_NAME,
			    				'status' 			=> 1,
							);
						   $amount=0;
	    				}
	    			    if($amount>=$sales_due && $sales_due>0){
	    					$salespayments_entry = array(
								'return_id' 		=> $return_id, 
								'payment_date'		=> date("Y-m-d",strtotime($payment_date)),//Current Payment with sales entry
								'payment_type' 		=> $payment_type,
								'payment' 			=> $sales_due,
								'payment_note' 		=> $payment_note,
								'created_date' 		=> $CUR_DATE,
			    				'created_time' 		=> $CUR_TIME,
			    				'created_by' 		=> $CUR_USERNAME,
			    				'system_ip' 		=> $SYSTEM_IP,
			    				'system_name' 		=> $SYSTEM_NAME,
			    				'status' 			=> 1,
							);
						   $amount-=$sales_due;
	    				}

	    				$q3 = $this->db->insert('db_salespaymentsreturn', $salespayments_entry);

	    				
	    				$q10=$this->sales_return_model->update_sales_payment_status($return_id,$customer_id);
						if($q10!=1){
							return "failed";
						}
	    			}
					
	    		}
	    		

	    	}
				
			
		}
		else{
			return "Please Enter Valid Amount!";
		}
		
		$this->db->trans_commit();
		return "success";

	}

	public function delete_opening_balance_entry($entry_id){
		$customer_id = $this->input->post('customer_id');
        $this->db->trans_begin();
		$q1=$this->db->query("delete from db_cobpayments where id=$entry_id");
		if(!$q1){
			return "failed";
		}
		//$this->session->set_flashdata('success', 'Success!! Opening Balance Entry Deleted!');
		$this->db->trans_commit();
		return "success";
	}
	public function getCustomersArray($id=''){
		$q = '';

		$this->db->select("id, customer_name, mobile , type_id,sales_due")->from('db_customers');
		
		if(!empty($id)){

			$this->db->where("id",$id);
			
		}else{

			$q = (isset($_POST['searchTerm'])) ? strtoupper($_POST['searchTerm']) : '';
			$type_id = (isset($_POST['type_id'])) ? $_POST['type_id'] : '';
			if(!empty($type_id)){
				$this->db->where("((upper(customer_name) like '%$q%' or upper(mobile) like '%$q%') and type_id = $type_id)");
			} else {
				$this->db->where("(upper(customer_name) like '%$q%' or upper(mobile) like '%$q%')");
			}
			

			
			
		}
		$this->db->limit(10);
		//echo $this->db->get_compiled_select();exit;
		$query = $this->db->get();

		$display_json = array();

		if($query->num_rows()>0){
			foreach($query->result() as $res){

				$json_arr["id"] 					 = $res->id;
			  	$json_arr["text"] 					 = $res->customer_name;
			  	$json_arr["mobile"] 				 = $res->mobile;
				$json_arr["sales_due"] 				 = $res->sales_due;


				$type_id = $res->type_id;

				$q1 = $this->db->query("SELECT type_name,percent_decrease,price_type,discount_type,discount FROM db_types where id = '$type_id'")->row();
				$json_arr["type_name"] = $q1->type_name;
				$json_arr["percent_decrease"] = $q1->percent_decrease;
				$json_arr["price_type"] = $q1->price_type;
				$json_arr["discount_type"] = $q1->discount_type;
				$json_arr["discount"] = $q1->discount;
				//$json_arr["type_name"] = 'av';
			  	
			  	array_push($display_json, $json_arr);
			}
		}
		return $display_json;
	}
	public function getCustomersJson($id){
		return json_encode($this->getCustomersArray($id));
	}
}
