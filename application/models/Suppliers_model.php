<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers_model extends CI_Model {

	//Datatable start
	var $table = 'db_suppliers as a';
	var $column_order = array('a.supplier_code','a.id','a.supplier_name','a.mobile','a.email','a.opening_balance','a.purchase_due','a.purchase_return_due','a.status'); //set column field database for datatable orderable
	var $column_search = array('a.supplier_code','a.id','a.supplier_name','a.mobile','a.email','a.opening_balance','a.purchase_due','a.purchase_return_due','a.status'); //set column field database for datatable searchable 
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
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_REQUEST))));

		$state = (!empty($state)) ? $state : 'NULL';

		//Validate This suppliers already exist or not		
		/*$query=$this->db->query("select * from db_suppliers where upper(supplier_name)=upper('$supplier_name')");
		if($query->num_rows()>0){
			return "Sorry! This Suppliers Name already Exist.";
		}*/
		if(!empty($mobile)){
			$query2=$this->db->query("select * from db_suppliers where mobile='$mobile'");
			if($query2->num_rows()>0){
				return "Sorry!This Mobile Number already Exist.";;
			}
		}
		
		$qs5="select supplier_init from db_company";
		$q5=$this->db->query($qs5);
		$supplier_init=$q5->row()->supplier_init;

		//Create suppliers unique Number
		$this->db->query("ALTER TABLE db_suppliers AUTO_INCREMENT = 1");
		$qs4="select coalesce(max(id),0)+1 as maxid from db_suppliers";
		$q1=$this->db->query($qs4);
		$maxid=$q1->row()->maxid;
		$supplier_code=$supplier_init.str_pad($maxid, 4, '0', STR_PAD_LEFT);
		//end

		$query1="insert into db_suppliers(supplier_code,supplier_name,mobile,phone,email,
											country_id,state_id,city,
                      postcode,address,opening_balance,
											system_ip,system_name,
											created_date,created_time,created_by,status,gstin,tax_number)
											values('$supplier_code','$supplier_name','$mobile','$phone','$email',
											'$country',$state,'$city',
                      '$postcode','$address','$opening_balance',
											'$SYSTEM_IP','$SYSTEM_NAME',
											'$CUR_DATE','$CUR_TIME','$CUR_USERNAME',1,'$gstin','$tax_number')";
		
		if ($this->db->simple_query($query1)){
				$this->session->set_flashdata('success', 'Nhà cung cấp mới đã được thêm thành công!');
		        return "success";
		}
		else{
		        return "failed";
		}
		
	}

	//Get suppliers_details
	public function get_details($id,$data){
		//Validate This suppliers already exist or not
		$query=$this->db->query("select * from db_suppliers where upper(id)=upper('$id')");
		if($query->num_rows()==0){
			show_404();exit;
		}
		else{
			$query=$query->row();
			$data['q_id']=$query->id;
			$data['supplier_name']=$query->supplier_name;
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

			return $data;
		}
	}
	public function update_suppliers(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_REQUEST))));

		$state = (!empty($state)) ? $state : 'NULL';

		//Validate This suppliers already exist or not
		/*$query=$this->db->query("select * from db_suppliers where upper(supplier_name)=upper('$supplier_name') and id<>$q_id");
		if($query->num_rows()>0){
			return "This suppliers Name already Exist.";
			
		}
		else{*/
			$query1="update db_suppliers set supplier_name='$supplier_name',mobile='$mobile',phone='$phone',
							email='$email',country_id='$country',state_id=$state,opening_balance='$opening_balance',
							postcode='$postcode',city='$city',
              address='$address',gstin='$gstin',tax_number='$tax_number'
							 where id=$q_id";

			if ($this->db->simple_query($query1)){
					$this->session->set_flashdata('success', 'Success!! Supplier Updated Successfully!');
			        return "success";
			}
			else{
			        return "failed";
			}
		//}
	}
	public function update_status($id,$status){
        $query1="update db_suppliers set status='$status' where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}
	
	public function delete_suppliers_from_table($ids){


    if (demo_app()) {
			echo "Demo không cho phép xóa";
			return;
		}

		$query1="delete from db_suppliers where id in($ids)";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }	
	}
	public function show_pay_now_modal($supplier_id){
    $CI =& get_instance();
    $purchase_id='';
    
    $q2=$this->db->query("select * from db_suppliers where id=$supplier_id");
    $res2=$q2->row();

    $supplier_name=$res2->supplier_name;
      $supplier_mobile=$res2->mobile;
      $supplier_phone=$res2->phone;
      $supplier_email=$res2->email;
      $supplier_country=$res2->country_id;
      $supplier_state=$res2->state_id;
      $supplier_address=$res2->address;
      $supplier_postcode=$res2->postcode;
      $supplier_gst_no=$res2->gstin;
      $supplier_tax_number=$res2->tax_number;
      $supplier_opening_balance=$res2->opening_balance;
      $supplier_purchase_due=$res2->purchase_due;

      $purchase_date='';//$res1->purchase_date;
      $reference_no='';//$res1->reference_no;
      $purchase_code='';//$res1->purchase_code;
      $purchase_note='';//$res1->purchase_note;
      $grand_total=0;//$res1->grand_total;
      $paid_amount=0;//$res1->paid_amount;
      //$due_amount =0;//$grand_total - $paid_amount;

      if(!empty($supplier_country)){
        $supplier_country = $this->db->query("select country from db_country where id='$supplier_country'")->row()->country;  
      }
      if(!empty($supplier_state)){
        $supplier_state = $this->db->query("select state from db_states where id='$supplier_state'")->row()->state;  
      }
      $sum_of_ob_paid = $this->db->query("select coalesce(sum(payment),0) sum_of_ob_paid from db_sobpayments where supplier_id=$supplier_id")->row()->sum_of_ob_paid; 
      $supplier_opening_balance_due = $supplier_opening_balance - $sum_of_ob_paid;

      $q6 = $this->db->query("select coalesce(sum(grand_total),0) as total_purchase_amount,coalesce(sum(paid_amount),0) as total_paid_amount from db_purchase where supplier_id=$supplier_id"); 
      $total_purchase_amount = $q6->row()->total_purchase_amount;
      $total_paid_amount = $q6->row()->total_paid_amount;
      //$total_purchase_due_amount =$total_purchase_amount - $total_paid_amount;
      $due_amount = number_format($supplier_purchase_due + $supplier_opening_balance_due,0,'.','') ;
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
                <i><?= $this->lang->line('supplier_details'); ?></i>
                <address>
                  <strong><?php echo  $supplier_name; ?></strong><br>
                  <?php echo (!empty(trim($supplier_mobile))) ? $this->lang->line('mobile').": ".$supplier_mobile."<br>" : '';?>
                  <?php echo (!empty(trim($supplier_phone))) ? $this->lang->line('phone').": ".$supplier_phone."<br>" : '';?>
                  <?php echo (!empty(trim($supplier_email))) ? $this->lang->line('email').": ".$supplier_email."<br>" : '';?>
                  <?php echo (!empty(trim($supplier_gst_no))) ? $this->lang->line('gst_number').": ".$supplier_gst_no."<br>" : '';?>
                  <?php echo (!empty(trim($supplier_tax_number))) ? $this->lang->line('tax_number').": ".$supplier_tax_number."<br>" : '';?>
                  
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-12 invoice-col">

                <table class="table table-sm table-bordered bg-info" width="100%">
                  <tr>
                    <td class="text-right"><?= $this->lang->line('opening_balance'); ?></td>
                    <td class="text-right"><?= $CI->currency($supplier_opening_balance); ?></td>
                    <td class="text-right"><?= $this->lang->line('total_purchase_amount'); ?></td>
                    <td class="text-right"><?= $CI->currency($total_purchase_amount); ?></td>
                  </tr>
                  <tr>
                    <td class="text-right"><?= $this->lang->line('opening_balance_due'); ?></td>
                    <td class="text-right"><?= $CI->currency($supplier_opening_balance_due); ?></td>
                    <td class="text-right"><?= $this->lang->line('paid_amount'); ?></td>
                    <td class="text-right"><?= $CI->currency($total_paid_amount); ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                    <td class="text-right"><?= $this->lang->line('purchase_due'); ?></td>
                    <td class="text-right"><?= $CI->currency($supplier_purchase_due); ?></td>
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
            <button type="button" onclick="save_payment(<?=$supplier_id;?>)" class="btn bg-green btn-lg place_order btn-lg payment_save">Save<i class="fa  fa-check "></i></button>
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

    $this->load->model('purchase_model');
    
      if($amount=='' || $amount==0){$amount=null;}


    if($amount>0 && !empty($payment_type)){

      //Get Opening Balance
      $q2=$this->db->query("select * from db_suppliers where id=$supplier_id");
      $res2=$q2->row();
      $supplier_opening_balance=$res2->opening_balance;
        $supplier_purchase_due=$res2->purchase_due;

        $sum_of_ob_paid = $this->db->query("select coalesce(sum(payment),0) sum_of_ob_paid from db_sobpayments where supplier_id=$supplier_id")->row()->sum_of_ob_paid; 
        $supplier_opening_balance_due = $supplier_opening_balance - $sum_of_ob_paid;


        while($amount>0) {

          
          //Adjust Opening Balance
          if($amount<=$supplier_opening_balance_due && $supplier_opening_balance_due>0){
            $row_data = array(  'supplier_id'     => $supplier_id,
                        'payment_date'    => date("Y-m-d",strtotime($payment_date)),
                    'payment_type'    => $payment_type,
                    'payment'       => $amount,
                    'payment_note'    => $payment_note,
                    'created_date'    => $CUR_DATE,
                      'created_time'    => $CUR_TIME,
                      'created_by'    => $CUR_USERNAME,
                      'system_ip'     => $SYSTEM_IP,
                      'system_name'     => $SYSTEM_NAME,
                      'status'      => 1,
                       );
            $q3 = $this->db->insert('db_sobpayments', $row_data);
            $amount=0;
          }
          if($amount>=$supplier_opening_balance_due && $supplier_opening_balance_due){
            $row_data = array(  'supplier_id'     => $supplier_id,
                        'payment_date'    => date("Y-m-d",strtotime($payment_date)),
                    'payment_type'    => $payment_type,
                    'payment'       => $supplier_opening_balance_due,
                    'payment_note'    => $payment_note,
                    'created_date'    => $CUR_DATE,
                      'created_time'    => $CUR_TIME,
                      'created_by'    => $CUR_USERNAME,
                      'system_ip'     => $SYSTEM_IP,
                      'system_name'     => $SYSTEM_NAME,
                      'status'      => 1,
                       );
            $q3 = $this->db->insert('db_sobpayments', $row_data);
            $amount-=$supplier_opening_balance_due;
          }

          //Set purchase Payments
          if($amount<=$supplier_purchase_due){
            $qs4=$this->db->query("select id,grand_total,paid_amount,coalesce(grand_total-paid_amount,0) as purchase_due from db_purchase where grand_total!=paid_amount and supplier_id=".$supplier_id);
            foreach ($qs4->result() as $res) {
              $grand_total = $res->grand_total;
              $paid_amount = $res->paid_amount;
              $purchase_due = $res->purchase_due;
              $purchase_id = $res->id;
              if($amount<=$purchase_due && $purchase_due>0){
                $purchasepayments_entry = array(
                'purchase_id'    => $purchase_id, 
                'payment_date'    => date("Y-m-d",strtotime($payment_date)),//Current Payment with purchase entry
                'payment_type'    => $payment_type,
                'payment'       => $amount,
                'payment_note'    => $payment_note,
                'created_date'    => $CUR_DATE,
                  'created_time'    => $CUR_TIME,
                  'created_by'    => $CUR_USERNAME,
                  'system_ip'     => $SYSTEM_IP,
                  'system_name'     => $SYSTEM_NAME,
                  'status'      => 1,
              );
               $amount=0;
              }
                if($amount>=$purchase_due && $purchase_due>0){
                $purchasepayments_entry = array(
                'purchase_id'    => $purchase_id, 
                'payment_date'    => date("Y-m-d",strtotime($payment_date)),//Current Payment with purchase entry
                'payment_type'    => $payment_type,
                'payment'       => $purchase_due,
                'payment_note'    => $payment_note,
                'created_date'    => $CUR_DATE,
                  'created_time'    => $CUR_TIME,
                  'created_by'    => $CUR_USERNAME,
                  'system_ip'     => $SYSTEM_IP,
                  'system_name'     => $SYSTEM_NAME,
                  'status'      => 1,
              );
               $amount-=$purchase_due;
              }

              $q3 = $this->db->insert('db_purchasepayments', $purchasepayments_entry);

              
              $q10=$this->purchase_model->update_purchase_payment_status($purchase_id,$supplier_id);
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

  public function show_pay_return_due_modal($supplier_id){

    $CI =& get_instance();
    $purchase_id='';
    
    $q2=$this->db->query("select * from db_suppliers where id=$supplier_id");
    $res2=$q2->row();

    $supplier_name=$res2->supplier_name;
      $supplier_mobile=$res2->mobile;
      $supplier_phone=$res2->phone;
      $supplier_email=$res2->email;
      $supplier_country=$res2->country_id;
      $supplier_state=$res2->state_id;
      $supplier_address=$res2->address;
      $supplier_postcode=$res2->postcode;
      $supplier_gst_no=$res2->gstin;
      $supplier_tax_number=$res2->tax_number;
      //$supplier_opening_balance=$res2->opening_balance;
      $supplier_purchase_return_due=$res2->purchase_return_due;

      $purchase_date='';//$res1->purchase_date;
      $reference_no='';//$res1->reference_no;
      $purchase_code='';//$res1->purchase_code;
      $purchase_note='';//$res1->purchase_note;
      $grand_total=0;//$res1->grand_total;
      $paid_amount=0;//$res1->paid_amount;
      //$due_amount =0;//$grand_total - $paid_amount;

      if(!empty($supplier_country)){
        $supplier_country = $this->db->query("select country from db_country where id='$supplier_country'")->row()->country;  
      }
      if(!empty($supplier_state)){
        $supplier_state = $this->db->query("select state from db_states where id='$supplier_state'")->row()->state;  
      }
      //$sum_of_ob_paid = $this->db->query("select coalesce(sum(payment),0) sum_of_ob_paid from db_sobpayments where supplier_id=$supplier_id")->row()->sum_of_ob_paid; 
      //$supplier_opening_balance_due = $supplier_opening_balance - $sum_of_ob_paid;

      $q6 = $this->db->query("select coalesce(sum(grand_total),0) as total_purchase_amount,coalesce(sum(paid_amount),0) as total_paid_amount from db_purchasereturn where supplier_id=$supplier_id"); 
      $total_purchase_amount = $q6->row()->total_purchase_amount;
      $total_paid_amount = $q6->row()->total_paid_amount;
      //$total_purchase_due_amount =$total_purchase_amount - $total_paid_amount;
      $due_amount = number_format($total_purchase_amount - $total_paid_amount,0,'.','') ;
    ?>
    <div class="modal fade" id="pay_return_due">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header header-custom">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Pay purchase Return Due Payments</h4>
          </div>
          <div class="modal-body">
            
        <div class="row">
          <div class="col-md-12">
            <div class="row invoice-info">
              <div class="col-sm-12 invoice-col">
                <i><?= $this->lang->line('supplier_details'); ?></i>
                <address>
                  <strong><?php echo  $supplier_name; ?></strong><br>
                  <?php echo (!empty(trim($supplier_mobile))) ? $this->lang->line('mobile').": ".$supplier_mobile."<br>" : '';?>
                  <?php echo (!empty(trim($supplier_phone))) ? $this->lang->line('phone').": ".$supplier_phone."<br>" : '';?>
                  <?php echo (!empty(trim($supplier_email))) ? $this->lang->line('email').": ".$supplier_email."<br>" : '';?>
                  <?php echo (!empty(trim($supplier_gst_no))) ? $this->lang->line('gst_number').": ".$supplier_gst_no."<br>" : '';?>
                  <?php echo (!empty(trim($supplier_tax_number))) ? $this->lang->line('tax_number').": ".$supplier_tax_number."<br>" : '';?>
                  
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-12 invoice-col">

                <table class="table table-sm table-bordered bg-info" width="100%">
                  <tr>
                    <td class="text-right"><?= $this->lang->line('total_purchase_amount'); ?></td>
                    <td class="text-right"><?= $CI->currency($total_purchase_amount); ?></td>
                  </tr>
                  <tr>
                    <td class="text-right"><?= $this->lang->line('paid_amount'); ?></td>
                    <td class="text-right"><?= $CI->currency($total_paid_amount); ?></td>
                  </tr>
                  <tr>
                    <td class="text-right"><?= $this->lang->line('purchase_due'); ?></td>
                    <td class="text-right"><?= $CI->currency($supplier_purchase_return_due); ?></td>
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
            <button type="button" onclick="save_return_due_payment(<?=$supplier_id;?>)" class="btn bg-green btn-lg place_order btn-lg return_due_payment_save">Save<i class="fa  fa-check "></i></button>
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

    $this->load->model('purchase_returns_model');
    
      if($amount=='' || $amount==0){$amount=null;}


    if($amount>0 && !empty($payment_type)){

      $q2=$this->db->query("select * from db_suppliers where id=$supplier_id");
      $res2=$q2->row();
        $supplier_purchase_return_due=$res2->purchase_return_due;


        while($amount>0) {

          //Set purchase Payments
          if($amount<=$supplier_purchase_return_due){
            $qs4=$this->db->query("select id,grand_total,paid_amount,coalesce(grand_total-paid_amount,0) as purchase_due from db_purchasereturn where grand_total!=paid_amount and supplier_id=".$supplier_id);
            foreach ($qs4->result() as $res) {
              $grand_total = $res->grand_total;
              $paid_amount = $res->paid_amount;
              $purchase_due = $res->purchase_due;
              $return_id = $res->id;
              if($amount<=$purchase_due && $purchase_due>0){
                $purchasepayments_entry = array(
                'return_id'     => $return_id, 
                'payment_date'    => date("Y-m-d",strtotime($payment_date)),//Current Payment with purchase entry
                'payment_type'    => $payment_type,
                'payment'       => $amount,
                'payment_note'    => $payment_note,
                'created_date'    => $CUR_DATE,
                  'created_time'    => $CUR_TIME,
                  'created_by'    => $CUR_USERNAME,
                  'system_ip'     => $SYSTEM_IP,
                  'system_name'     => $SYSTEM_NAME,
                  'status'      => 1,
              );
               $amount=0;
              }
                if($amount>=$purchase_due && $purchase_due>0){
                $purchasepayments_entry = array(
                'return_id'     => $return_id, 
                'payment_date'    => date("Y-m-d",strtotime($payment_date)),//Current Payment with purchase entry
                'payment_type'    => $payment_type,
                'payment'       => $purchase_due,
                'payment_note'    => $payment_note,
                'created_date'    => $CUR_DATE,
                  'created_time'    => $CUR_TIME,
                  'created_by'    => $CUR_USERNAME,
                  'system_ip'     => $SYSTEM_IP,
                  'system_name'     => $SYSTEM_NAME,
                  'status'      => 1,
              );
               $amount-=$purchase_due;
              }

              $q3 = $this->db->insert('db_purchasepaymentsreturn', $purchasepayments_entry);

              
              $q10=$this->purchase_returns_model->update_purchase_payment_status($return_id,$supplier_id);
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

    if (demo_app()) {
			echo "Demo không cho phép xóa";
			return;
		}

		$supplier_id = $this->input->post('supplier_id');
        $this->db->trans_begin();
		$q1=$this->db->query("delete from db_sobpayments where id=$entry_id");
		if(!$q1){
			return "failed";
		}
		$this->session->set_flashdata('success', 'Success!! Opening Balance Entry Deleted!');
		$this->db->trans_commit();
		return "success";
	}

	public function getSuppliersArray($id=''){
    $q = '';

    $this->db->select("supplier_code, id, supplier_name, mobile")->from('db_suppliers');
    
    if(!empty($id)){

      $this->db->where("id",$id);
      
    }else{

      $q = (isset($_POST['searchTerm'])) ? strtoupper($_POST['searchTerm']) : '';

      $this->db->where("(upper(supplier_name) like '%$q%' or upper(mobile) like '%$q%')");
    }
    $this->db->limit(10);
    //echo $this->db->get_compiled_select();exit;
    $query = $this->db->get();

    $display_json = array();

    if($query->num_rows()>0){
      foreach($query->result() as $res){

          $json_arr["id"]            = $res->id;
          $json_arr["text"]            = $res->supplier_name;
          $json_arr["mobile"]          = $res->mobile;
          
          array_push($display_json, $json_arr);
      }
    }
    return $display_json;
  }
  public function getSuppliersJson($id){
    return json_encode($this->getSuppliersArray($id));
  }


}
