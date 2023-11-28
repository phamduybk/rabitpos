<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_model extends CI_Model {

	//Datatable start
	var $table = 'db_purchase as a';
	var $column_order = array( 'a.id','a.purchase_date','a.purchase_code','a.reference_no','a.grand_total','a.payment_status','a.created_by','b.supplier_name','a.paid_amount','a.purchase_status','a.return_bit'); //set column field database for datatable orderable
	var $column_search = array('a.id','a.purchase_date','a.purchase_code','a.reference_no','a.grand_total','a.payment_status','a.created_by','b.supplier_name','a.paid_amount','a.purchase_status','a.return_bit'); //set column field database for datatable searchable 
	var $order = array('a.id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
	{
		$this->db->select($this->column_order);
		$this->db->from($this->table);
		$this->db->select("coalesce(a.grand_total,0)-coalesce(a.paid_amount,0) as purchase_due");
		$this->db->from('db_suppliers as b');
		//$this->db->from('db_warehouse as c');
		$this->db->where('b.id=a.supplier_id');
		//$this->db->where('c.id=a.warehouse_id');

		if(!permissions('view_all_users_purchase_invoices')){
	      	$this->db->where("upper(a.created_by)",strtoupper($this->session->userdata('inv_username')));
	      }


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

	public function xss_html_filter($input){
		return $this->security->xss_clean(html_escape($input));
	}

	//Save Cutomers
	public function verify_save_and_update(){
		//Filtering XSS and html escape from user inputs 
		extract($this->xss_html_filter(array_merge($this->data,$_POST,$_GET)));
		//echo "<pre>";print_r($this->xss_html_filter(array_merge($this->data,$_POST,$_GET)));exit();
		
		$this->db->trans_begin();
		$pur_date=date('Y-m-d',strtotime($pur_date));

		if($other_charges_input=='' || $other_charges_input==0){$other_charges_input=null;}
	    if($other_charges_tax_id=='' || $other_charges_tax_id==0){$other_charges_tax_id=null;}
	    if($other_charges_amt=='' || $other_charges_amt==0){$other_charges_amt=null;}
	    if($discount_to_all_input=='' || $discount_to_all_input==0){$discount_to_all_input=null;}
	    if($tot_discount_to_all_amt=='' || $tot_discount_to_all_amt==0){$tot_discount_to_all_amt=null;}
	    if($tot_round_off_amt=='' || $tot_round_off_amt==0){$tot_round_off_amt=null;}

	    if($command=='save'){//Create purchase code unique if first time entry
		    $qs5="select purchase_init from db_company";
			$q5=$this->db->query($qs5);
			$purchase_init=$q5->row()->purchase_init;

			$this->db->query("ALTER TABLE db_purchase AUTO_INCREMENT = 1");
			$q4=$this->db->query("select coalesce(max(id),0)+1 as maxid from db_purchase");
			$maxid=$q4->row()->maxid;
			$purchase_code=$purchase_init.str_pad($maxid, 4, '0', STR_PAD_LEFT);

		    $purchase_entry = array(
		    				'purchase_code' 			=> $purchase_code, 
		    				'reference_no' 				=> $reference_no, 
		    				'purchase_date' 			=> $pur_date,
		    				'purchase_status' 			=> $purchase_status,
		    				'supplier_id' 				=> $supplier_id,
		    				/*'warehouse_id' 				=> $warehouse_id,*/
		    				/*Other Charges*/
		    				'other_charges_input' 		=> $other_charges_input,
		    				'other_charges_tax_id' 		=> $other_charges_tax_id,
		    				'other_charges_amt' 		=> $other_charges_amt,
		    				/*Discount*/
		    				'discount_to_all_input' 	=> $discount_to_all_input,
		    				'discount_to_all_type' 		=> $discount_to_all_type,
		    				'tot_discount_to_all_amt' 	=> $tot_discount_to_all_amt,
		    				/*Subtotal & Total */
		    				'subtotal' 					=> $tot_subtotal_amt,
		    				'round_off' 				=> $tot_round_off_amt,
		    				'grand_total' 				=> $tot_total_amt,
		    				'purchase_note' 			=> $purchase_note,
		    				/*System Info*/
		    				'created_date' 				=> $CUR_DATE,
		    				'created_time' 				=> $CUR_TIME,
		    				'created_by' 				=> $CUR_USERNAME,
		    				'system_ip' 				=> $SYSTEM_IP,
		    				'system_name' 				=> $SYSTEM_NAME,
		    				'status' 					=> 1,
		    			);

			$q1 = $this->db->insert('db_purchase', $purchase_entry);
			$purchase_id = $this->db->insert_id();
		}
		else if($command=='update'){	
			$purchase_entry = array(
		    				'reference_no' 				=> $reference_no, 
		    				'purchase_date' 			=> $pur_date,
		    				'purchase_status' 			=> $purchase_status,
		    				'supplier_id' 				=> $supplier_id,
		    				/*'warehouse_id' 				=> $warehouse_id,*/
		    				/*Other Charges*/
		    				'other_charges_input' 		=> $other_charges_input,
		    				'other_charges_tax_id' 		=> $other_charges_tax_id,
		    				'other_charges_amt' 		=> $other_charges_amt,
		    				/*Discount*/
		    				'discount_to_all_input' 	=> $discount_to_all_input,
		    				'discount_to_all_type' 		=> $discount_to_all_type,
		    				'tot_discount_to_all_amt' 	=> $tot_discount_to_all_amt,
		    				/*Subtotal & Total */
		    				'subtotal' 					=> $tot_subtotal_amt,
		    				'round_off' 				=> $tot_round_off_amt,
		    				'grand_total' 				=> $tot_total_amt,
		    				'purchase_note' 			=> $purchase_note,
		    			);
					
			$q1 = $this->db->where('id',$purchase_id)->update('db_purchase', $purchase_entry);

			$q11=$this->db->query("delete from db_purchaseitems where purchase_id='$purchase_id'");
			if(!$q11){
				return "failed";
			}
		}
		//end

		//Import post data from form
		for($i=1;$i<=$rowcount;$i++){
		
			if(isset($_REQUEST['tr_item_id_'.$i]) && !empty($_REQUEST['tr_item_id_'.$i])){

				$item_id 			=$this->xss_html_filter(trim($_REQUEST['tr_item_id_'.$i]));
				$purchase_qty		=$this->xss_html_filter(trim($_REQUEST['td_data_'.$i.'_3']));
				$price_per_unit 	=$this->xss_html_filter(trim($_REQUEST['td_data_'.$i.'_4']));
				$tax_id 			=$this->xss_html_filter(trim($_REQUEST['tr_tax_id_'.$i]));
				$tax_amt 			=$this->xss_html_filter(trim($_REQUEST['td_data_'.$i.'_5']));
				$tax_type			=$this->xss_html_filter(trim($_REQUEST['tr_tax_type_'.$i]));

				$discount_amt	    =$this->xss_html_filter(trim($_REQUEST['td_data_'.$i.'_8']));//Amount

				$unit_total_cost	=$this->xss_html_filter(trim($_REQUEST['td_data_'.$i.'_10']));
				$total_cost			=$this->xss_html_filter(trim($_REQUEST['td_data_'.$i.'_9']));
				
				$description	    =$this->xss_html_filter(trim($_REQUEST['description_'.$i]));
				$discount_type 		=$this->xss_html_filter(trim($_REQUEST['item_discount_type_'.$i]));
				$discount_input 	=$this->xss_html_filter(trim($_REQUEST['item_discount_input_'.$i]));
				
				if($tax_id=='' || $tax_id==0){$tax_id=null;}
				if($tax_amt=='' || $tax_amt==0){$tax_amt=null;}
				
				$purchaseitems_entry = array(
		    				'purchase_id' 		=> $purchase_id,
		    				'purchase_status'	=> $purchase_status,
		    				'item_id' 			=> $item_id,
		    				'purchase_qty' 		=> $purchase_qty,
		    				'price_per_unit' 	=> $price_per_unit,
		    				'tax_id' 			=> $tax_id,
		    				'tax_amt' 			=> $tax_amt,
		    				'tax_type' 			=> $tax_type,
		    				'unit_total_cost' 	=> $unit_total_cost,
		    				'total_cost' 		=> $total_cost,
		    				//'profit_margin_per' => $profit_margin_per,
		    				//'unit_sales_price' 	=> $unit_sales_price,
		    				'status'			=> 1,
		    				'description'		=> $description,

		    				//'unit_discount_per' => $unit_discount_per,
		    				'discount_amt' 		=> $discount_amt,
		    				'discount_type'		=> $discount_type,
		    				'discount_input'		=> $discount_input,
		    			);

				$q2 = $this->db->insert('db_purchaseitems', $purchaseitems_entry);
				
				//UPDATE itemS QUANTITY IN itemS TABLE
				$this->load->model('pos_model');				
				$q6=$this->pos_model->update_items_quantity($item_id);
				if(!$q6){
					return "failed";
				}

				/*Update the item profit margin & item sales price*/
				/*$this->db->where('id',$item_id)->update('db_items',array(
																'profit_margin' => $profit_margin_per, 
																'sales_price'=>$unit_sales_price,
																'price'=>$price_per_unit,
																'purchase_price'=>$unit_total_cost,
																'tax_id'=>$tax_id,
															));*/
				
			}
		
		}//for end

		if($amount=='' || $amount==0){$amount=null;}
		if($amount>0 && !empty($payment_type)){
			$purchasepayments_entry = array(
					'purchase_id' 		=> $purchase_id, 
					'payment_date'		=> $pur_date,//Current Payment with Purchase entry
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

			$q3 = $this->db->insert('db_purchasepayments', $purchasepayments_entry);
			
		}
		
		$q10=$this->update_purchase_payment_status($purchase_id,$supplier_id);
		if($q10!=1){
			return "failed";
		}

		$this->db->trans_commit();
		$this->session->set_flashdata('success', 'Success!! Record Saved Successfully!');
		return "success<<<###>>>$purchase_id";
		
	}//verify_save_and_update() function end

	public function delete_payment($payment_id){
        $this->db->trans_begin();
		$purchase_id = $this->db->query("select purchase_id from db_purchasepayments where id=$payment_id")->row()->purchase_id;

		$q1=$this->db->query("delete from db_purchasepayments where id='$payment_id'");

		$supplier_id = $this->db->query("select supplier_id from db_purchase where id=$purchase_id")->row()->supplier_id;

		$q2=$this->update_purchase_payment_status($purchase_id,$supplier_id);
		if($q1!=1 || $q2!=1)
		{
			$this->db->trans_rollback();
		    return "failed";
		}
		else{
			$this->db->trans_commit();
		        return "success";
		}
	}

	public function update_purchase_payment_status_by_purchase_id($purchase_id,$supplier_id){
		$q8=$this->db->query("select COALESCE(SUM(payment),0) as payment from db_purchasepayments where purchase_id='$purchase_id'");
		$sum_of_payments=$q8->row()->payment;
		

		$q9=$this->db->query("select coalesce(sum(grand_total),0) as total from db_purchase where id='$purchase_id'");
		$payble_total=$q9->row()->total;
		
		//$pending_amt=$payble_total-$sum_of_payments;

		$payment_status='';
		if($payble_total==$sum_of_payments){
			$payment_status="Paid";
		}
		else if($sum_of_payments!=0 && ($sum_of_payments<$payble_total)){
			$payment_status="Partial";
		}
		else if($sum_of_payments==0){
			$payment_status="Unpaid";
		}


		$q7=$this->db->query("update db_purchase set 
							payment_status='$payment_status',
							paid_amount=$sum_of_payments 
							where id='$purchase_id'");
		//$supplier_id =$this->db->query("select supplier_id from db_purchase where id=$purchase_id")->row()->supplier_id;

		$purchase_due =$this->db->query("select COALESCE(SUM(grand_total),0)-COALESCE(SUM(paid_amount),0) as purchase_due from db_purchase where supplier_id=$supplier_id and purchase_status='Received'")->row()->purchase_due;
		
		$q12 = $this->db->query("update db_suppliers set purchase_due=$purchase_due where id=$supplier_id");
		if(!$q7 || !$q12){
			return false;
		}
		if(!record_supplier_payment($supplier_id)){
			return false;
		}
		return true;

	}

	function update_purchase_payment_status($purchase_id,$supplier_id){
		if(!$this->update_purchase_payment_status_by_purchase_id($purchase_id,$supplier_id)){
			return false;
		}
		return true;
	}

	function fun_temp_update_suppliers_purchase_due(){
		
		
		$q11=$this->db->query("select id from db_suppliers");
		if($q11->num_rows()>0){
			foreach ($q11->result() as $res) {

				$q12=$this->db->query("select id,supplier_id from db_purchase where supplier_id=".$res->id);
				if($q12->num_rows()>0){
					foreach ($q12->result() as $res12) {
						if(!$this->purchase_model->update_purchase_payment_status($res12->id,$res12->supplier_id)){
							return false;
						}
					}
				}
				else{
					$q13=$this->db->query("update db_suppliers set purchase_due=0 where id=".$res->id);
					if(!$q13){
						return false;
					}
				}
			}
		}
		return true;
	}



	public function delete_purchase($ids){
      	$this->db->trans_begin();

      	//Find the supplier id in one aray
      	$q11 = $this->db->select("supplier_id,id")->where("id in ($ids)")->get("db_purchase");

		$q8=$this->db->query("SELECT COUNT(*) AS tot_invoices,a.purchase_id,b.purchase_code FROM db_purchasereturn AS a INNER JOIN db_purchase AS b ON b.id=a.purchase_id WHERE purchase_id IN($ids) GROUP BY purchase_id");
		if($q8->num_rows()>0){
			$i=1;
			echo "Sorry! Records Not Deleted! Return Invoices Found Against Purchases:";
			foreach($q8->result() as $res){
				echo "<br>".$i++.".Return Invoice Against Purchase Id:".$res->purchase_code;
			}
			echo "<br>To Delete Purchase! You need to Delete Purchase Return Invoices!";
			exit();
		}
		

		$q3=$this->db->query("delete from db_purchase where id in($ids)");
		$q5=$this->db->query("delete from db_purchasepayments where purchase_id in($ids)");
		$q7=$this->db->query("delete from db_purchaseitems where purchase_id in($ids)");

		//$q6=$this->db->query("select id from db_items");
		$q6 = $this->db->select("item_id")->from("db_purchaseitems")->where("purchase_id in ($ids)")->get();
		if($q6->num_rows()>0){
			$this->load->model('pos_model');				
			foreach ($q6->result() as $res6) {
				$q6=$this->pos_model->update_items_quantity($res6->item_id);
				if(!$q6){
					return "failed";
				}
			}
		}


		foreach ($q11->result() as $res11) {
			$q2=$this->update_purchase_payment_status($res11->id,$res11->supplier_id);
			if(!$q2){ return "failed";}
		}

		if($q3!=1 || $q5!=1 || $q2!=1)
		{
			$this->db->trans_rollback();
		    return "failed";
		}
		else{
			$this->db->trans_commit();
		        return "success";
		}
	}
	public function search_item($q){
		$json_array=array();
        $query1="select id,item_name from db_items where (upper(item_name) like upper('%$q%') or upper(item_code) like upper('%$q%'))";

        $q1=$this->db->query($query1);
        if($q1->num_rows()>0){
            foreach ($q1->result() as $value) {
            	$json_array[]=['id'=>$value->id, 'text'=>$value->item_name];
            }
        }
        return json_encode($json_array);
	}
	
	public function find_item_details($id){
		$json_array=array();
        $query1="select id,item_name,tax_id,sales_price,price,stock,tax_type,profit_margin from db_items where id=$id";

        $q1=$this->db->query($query1);
        if($q1->num_rows()>0){
            foreach ($q1->result() as $value) {
            	$json_array=['id'=>$value->id, 
        			 'item_name'=>$value->item_name,
        			 'purchase_price'=>$value->price,
        			 'sales_price'=>$value->sales_price,
        			 'tax_id'=>$value->tax_id,
        			 'stock'=>$value->stock,
        			 'profit_margin'=>$value->profit_margin,
        			 'tax_type'=>$value->tax_type,
        			];
            }
        }
        return json_encode($json_array);
	}

	

	
	public function inclusive($price='',$tax_per){
		return $price/(($tax_per/100)+1)/10;
	}

	public function get_items_info($rowcount,$item_id){
		$q1=$this->db->select('*')->from('db_items')->where("id=$item_id")->get();
		$q3=$this->db->query("select * from db_tax where id=".$q1->row()->tax_id)->row();

		$info['item_id'] = $q1->row()->id;
		$info['item_name'] = $q1->row()->item_name;
		$info['description'] = '';
		$info['item_available_qty'] = $q1->row()->stock;
		$info['item_price'] = $q1->row()->price;
		$info['item_purchase_price'] = $q1->row()->price;
		$info['item_tax_id'] = $q1->row()->tax_id;
		$info['item_profit_margin'] = $q1->row()->profit_margin;
		$info['item_sales_price'] = $q1->row()->sales_price;
		$info['item_purchase_qty'] = 1;
		$info['item_tax'] = $q3->tax;
		$info['item_tax_name'] = $q3->tax_name;
		$info['item_tax_type'] = $q1->row()->tax_type;
		$info['item_discount'] = '';
		$info['item_discount_type'] = 'Percentage';
		$info['item_discount_input'] = 0;
		$info['item_tax_amt'] = ($q1->row()->tax_type=='Inclusive') ? calculate_inclusive($q1->row()->sales_price,$q3->tax) :calculate_exclusive($q1->row()->sales_price,$q3->tax);
		$this->return_row_with_data($rowcount,$info);
	}
	/* For Purchase Items List Retrieve*/
	public function return_purchase_list($purchase_id){
		$q1=$this->db->select('*')->from('db_purchaseitems')->where("purchase_id=$purchase_id")->get();
		$rowcount =1;
		foreach ($q1->result() as $res1) {
			$q2=$this->db->query("select item_name,stock,tax_type,price from db_items where id=".$res1->item_id);
			$q3=$this->db->query("select * from db_tax where id=".$res1->tax_id)->row();
			
			$info['item_id'] = $res1->item_id;
			$info['item_name'] = $q2->row()->item_name;
			$info['item_available_qty'] = $q2->row()->stock;
			$info['item_price'] = $q2->row()->price;
			$info['item_purchase_price'] = $res1->price_per_unit;
			$info['item_tax_id'] = $res1->tax_id;
			$info['item_profit_margin'] = $res1->profit_margin_per;
			$info['item_sales_price'] = $res1->unit_sales_price;
			$info['item_purchase_qty'] = $res1->purchase_qty;
			$info['item_tax'] = $q3->tax;
			$info['item_tax_name'] = $q3->tax_name;
			$info['item_tax_type'] = $res1->tax_type;
			$info['item_discount'] = $res1->unit_discount_per;
			$info['item_tax_amt'] = $res1->tax_amt;
			$info['description'] = $res1->description;
			$info['item_discount_type'] = $res1->discount_type;
			$info['item_discount_input'] = $res1->discount_input;

			$result = $this->return_row_with_data($rowcount++,$info);
		}
		return $result;
	}

	public function return_row_with_data($rowcount,$info){
		extract($info);
		//print_r($info);exit();
		//$item_tax_amt = (($item_purchase_price * $item_purchase_qty)*$item_tax)/100;
		//$item_amount = ($item_purchase_price * $item_purchase_qty) + $item_tax_amt;
		$item_unit_cost = $item_purchase_price+$item_tax_amt;
		$item_amount = $item_unit_cost * $item_purchase_qty;
		/*if($item_tax_type=='Exclusive'){
			$item_purchase_price=$item_price;
		}
		else{//Inclusive //Working Great
			$item_tax_amt=number_format($this->inclusive($item_price,$item_tax),0,'.','');
			//$item_purchase_price=$item_price-$item_tax_amt;	

			
			$item_purchase_price=$item_price;	
		}*/
		?>
            <tr id="row_<?=$rowcount;?>" data-row='<?=$rowcount;?>'>
               <td id="td_<?=$rowcount;?>_1">
                  <label class='form-control' style='height:auto;'>
                  <a id="td_data_<?=$rowcount;?>_1" href="javascript:void(0)" onclick="show_purchase_item_modal(<?=$rowcount;?>)" title=""><?=$item_name;?></a>
                  	</label>

               </td>
               <!-- Qty -->
               <td id="td_<?=$rowcount;?>_3">
                  <div class="input-group ">
                     <span class="input-group-btn">
                     <button onclick="decrement_qty(<?=$rowcount;?>)" type="button" class="btn btn-default btn-flat"><i class="fa fa-minus text-danger"></i></button></span>
                     <input typ="text" value="<?=$item_purchase_qty;?>" class="form-control no-padding text-center" onkeyup="calculate_tax(<?=$rowcount;?>)" id="td_data_<?=$rowcount;?>_3" name="td_data_<?=$rowcount;?>_3">
                     <span class="input-group-btn">
                     <button onclick="increment_qty(<?=$rowcount;?>)" type="button" class="btn btn-default btn-flat"><i class="fa fa-plus text-success"></i></button></span>
                  </div>
               </td>
               <!-- Purchase Price -->
               <td id="td_<?=$rowcount;?>_4"><input type="text" name="td_data_<?=$rowcount;?>_4" id="td_data_<?=$rowcount;?>_4" class="form-control text-right no-padding only_currency text-center" onkeyup="calculate_tax(<?=$rowcount;?>)" value="<?=$item_purchase_price;?>" ></td>

               <!-- Discount -->
               <td id="td_<?=$rowcount;?>_8">
                  <input type="text" data-toggle="tooltip" title='Click to Change' name="td_data_<?=$rowcount;?>_8" id="td_data_<?=$rowcount;?>_8" class="form-control pointer text-right no-padding only_currency text-center item_discount" value="<?=$item_discount;?>" onclick="show_purchase_item_modal(<?=$rowcount;?>)" readonly>
               </td>

               <!-- TAX -->
               <td id="td_<?=$rowcount;?>_15" class="<?=tax_disable_class()?>">
               	<label class='form-control'>
                  <a id="td_data_<?=$rowcount;?>_15" data-toggle="tooltip" title='Click to Change' class="pointer" onclick="show_purchase_item_modal(<?=$rowcount;?>)" title=""><?=$item_tax_name ;?></a>
                  	</label>
               </td>
               <!-- Tax Amount -->
               <td id="td_<?=$rowcount;?>_5" class="<?=tax_disable_class()?>">
               	<input type="text" name="td_data_<?=$rowcount;?>_5" id="td_data_<?=$rowcount;?>_5" class="form-control text-right no-padding only_currency text-center" readonly  value="<?=$item_tax_amt;?>"></td>

               

               <!-- Unit Cost -->
               <td id="td_<?=$rowcount;?>_10"><input type="text" name="td_data_<?=$rowcount;?>_10" id="td_data_<?=$rowcount;?>_10" class="form-control text-right no-padding only_currency text-center" readonly value="<?=$item_unit_cost;?>"></td>

               <!-- Amount -->
               <td id="td_<?=$rowcount;?>_9"><input type="text" name="td_data_<?=$rowcount;?>_9" id="td_data_<?=$rowcount;?>_9" class="form-control text-right no-padding only_currency text-center" style='border-color: #f39c12;' title='Total' readonly value="<?=$item_amount;?>"></td>

               <!-- Profit Margin -->
              <!--  <td id="td_<?=$rowcount;?>_12"><input type="text" name="td_data_<?=$rowcount;?>_12" id="td_data_<?=$rowcount;?>_12" class="form-control no-padding text-center" value="<?=$item_profit_margin;?>" onkeyup="calculate_sales_price(<?=$rowcount;?>)" ></td> -->

               <!-- sales price -->
               <!-- <td id="td_<?=$rowcount;?>_13"><input type="text" name="td_data_<?=$rowcount;?>_13" id="td_data_<?=$rowcount;?>_13" class="form-control text-right no-padding only_currency text-center" onkeyup="calculate_profit_margin(<?=$rowcount;?>)" value="<?=$item_sales_price;?>" ></td> -->
               
               <!-- ADD button -->
               <td id="td_<?=$rowcount;?>_16" style="text-align: center;">
                  <a class=" fa fa-fw fa-minus-square text-red" style="cursor: pointer;font-size: 34px;" onclick="removerow(<?=$rowcount;?>)" title="Delete ?" name="td_data_<?=$rowcount;?>_16" id="td_data_<?=$rowcount;?>_16"></a>
               </td>
               <input type="hidden" id="tr_available_qty_<?=$rowcount;?>_13" value="<?=$item_available_qty;?>">
               <input type="hidden" id="tr_item_id_<?=$rowcount;?>" name="tr_item_id_<?=$rowcount;?>" value="<?=$item_id;?>">

               <input type="hidden" id="tr_tax_type_<?=$rowcount;?>" name="tr_tax_type_<?=$rowcount;?>" value="<?=$item_tax_type;?>">
               <input type="hidden" id="tr_tax_id_<?=$rowcount;?>" name="tr_tax_id_<?=$rowcount;?>" value="<?=$item_tax_id;?>">
               <input type="hidden" id="tr_tax_value_<?=$rowcount;?>" name="tr_tax_value_<?=$rowcount;?>" value="<?=$item_tax;?>">

               <input type="hidden" id="description_<?=$rowcount;?>" name="description_<?=$rowcount;?>" value="<?=$description;?>">

               <input type="hidden" id="item_discount_type_<?=$rowcount;?>" name="item_discount_type_<?=$rowcount;?>" value="<?=$item_discount_type;?>">
               <input type="hidden" id="item_discount_input_<?=$rowcount;?>" name="item_discount_input_<?=$rowcount;?>" value="<?=$item_discount_input;?>">

               
            </tr>
		<?php

	}

	public function show_pay_now_modal($purchase_id){
		$q1=$this->db->query("select * from db_purchase where id=$purchase_id");
		$res1=$q1->row();
		$supplier_id = $res1->supplier_id;
		$q2=$this->db->query("select * from db_suppliers where id=$supplier_id");
		$res2=$q2->row();

		$supplier_name=$res2->supplier_name;
	    $supplier_mobile=$res2->mobile;
	    $supplier_phone=$res2->phone;
	    $supplier_email=$res2->email;
	    $supplier_state=$res2->state_id;
	    $supplier_address=$res2->address;
	    $supplier_postcode=$res2->postcode;
	    $supplier_gst_no=$res2->gstin;
	    $supplier_tax_number=$res2->tax_number;
	    $supplier_opening_balance=$res2->opening_balance;

	    $purchase_date=$res1->purchase_date;
	    $reference_no=$res1->reference_no;
	    $purchase_code=$res1->purchase_code;
	    $purchase_note=$res1->purchase_note;
	    $grand_total=$res1->grand_total;
	    $paid_amount=$res1->paid_amount;
	    $due_amount =$grand_total - $paid_amount;

	    $supplier_country = $this->db->query("select country from db_country where id=".$res2->country_id)->row()->country;
	    if(!empty($supplier_state)){
    		$supplier_state = $this->db->query("select state from db_states where id=".$res2->state_id)->row()->state;
    	}


		?>
		<div class="modal fade" id="pay_now">
		  <div class="modal-dialog ">
		    <div class="modal-content">
		      <div class="modal-header header-custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center">Payments</h4>
		      </div>
		      <div class="modal-body">
		        
		    <div class="row">
		      <div class="col-md-12">
		      	<div class="row invoice-info">
			        <div class="col-sm-4 invoice-col">
			          Supplier Information
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
			        <div class="col-sm-4 invoice-col">
			          Purchase Information:
			          <address>
			            <b>Invoice #<?php echo  $purchase_code; ?></b><br>
			            <b>Date :<?php echo  show_date($purchase_date); ?></b><br>
			            <b>Grand Total :<?php echo $grand_total; ?></b><br>
			          </address>
			        </div>
			        <!-- /.col -->
			        <div class="col-sm-4 invoice-col">
			          <b>Paid Amount :<span><?php echo number_format($paid_amount,0,'.',''); ?></span></b><br>
			          <b>Due Amount :<span id='due_amount_temp'><?php echo number_format($due_amount,0,'.',''); ?></span></b><br>
			         
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
		                    <input type="text" class="form-control text-right paid_amt" id="amount" name="amount" placeholder="" value="<?=$due_amount;?>" onkeyup="calculate_payments()">
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
		        <button type="button" onclick="save_payment(<?=$purchase_id;?>)" class="btn bg-green btn-lg place_order btn-lg payment_save">Save<i class="fa  fa-check "></i></button>
		      </div>
		    </div>
		    <!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		</div>
		<?php
	}

	public function save_payment(){
		extract($this->xss_html_filter(array_merge($this->data,$_POST,$_GET)));
		//print_r($this->xss_html_filter(array_merge($this->data,$_POST,$_GET)));exit();
    	if($amount=='' || $amount==0){$amount=null;}
		if($amount>0 && !empty($payment_type)){
			$purchasepayments_entry = array(
					'purchase_id' 		=> $purchase_id, 
					'payment_date'		=> date("Y-m-d",strtotime($payment_date)),//Current Payment with Purchase entry
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

			$q3 = $this->db->insert('db_purchasepayments', $purchasepayments_entry);
			
		}
		else{
			return "Please Enter Valid Amount!";
		}
		
		$supplier_id = $this->db->query("select supplier_id from db_purchase where id=$purchase_id")->row()->supplier_id;

		$q10=$this->update_purchase_payment_status($purchase_id,$supplier_id);
		if($q10!=1){
			return "failed";
		}
		return "success";

	}
	
	public function view_payments_modal($purchase_id){
		$q1=$this->db->query("select * from db_purchase where id=$purchase_id");
		$res1=$q1->row();
		$supplier_id = $res1->supplier_id;
		$q2=$this->db->query("select * from db_suppliers where id=$supplier_id");
		$res2=$q2->row();

		$supplier_name=$res2->supplier_name;
	    $supplier_mobile=$res2->mobile;
	    $supplier_phone=$res2->phone;
	    $supplier_email=$res2->email;
	    $supplier_state=$res2->state_id;
	    $supplier_address=$res2->address;
	    $supplier_postcode=$res2->postcode;
	    $supplier_gst_no=$res2->gstin;
	    $supplier_tax_number=$res2->tax_number;
	    $supplier_opening_balance=$res2->opening_balance;

	    $purchase_date=$res1->purchase_date;
	    $reference_no=$res1->reference_no;
	    $purchase_code=$res1->purchase_code;
	    $purchase_note=$res1->purchase_note;
	    $grand_total=$res1->grand_total;
	    $paid_amount=$res1->paid_amount;
	    $due_amount =$grand_total - $paid_amount;

	    $supplier_country = $this->db->query("select country from db_country where id=".$res2->country_id)->row()->country;
	    $supplier_state=(!empty($supplier_state)) ? $this->db->query("select state from db_states where id=".$res2->state_id)->row()->state : '';
	    

		?>
		<div class="modal fade" id="view_payments_modal">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header header-custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center">Payments</h4>
		      </div>
		      <div class="modal-body">
		        
		    <div class="row">
		      <div class="col-md-12">
		      	<div class="row invoice-info">
			        <div class="col-sm-4 invoice-col">
			          Supplier Information
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
			        <div class="col-sm-4 invoice-col">
			          Purchase Information:
			          <address>
			            <b>Invoice #<?php echo  $purchase_code; ?></b><br>
			            <b>Date :<?=  show_date($purchase_date); ?></b><br>
			            <b>Grand Total :<?php echo $grand_total; ?></b><br>
			          </address>
			        </div>
			        <!-- /.col -->
			        <div class="col-sm-4 invoice-col">
			          <b>Paid Amount :<span><?php echo number_format($paid_amount,0,'.',''); ?></span></b><br>
			          <b>Due Amount :<span id='due_amount_temp'><?php echo number_format($due_amount,0,'.',''); ?></span></b><br>
			         
			        </div>
			        <!-- /.col -->
			      </div>
			      <!-- /.row -->
		      </div>
		      <div class="col-md-12">
		       
		     
		              <div class="row">
		         		<div class="col-md-12">
		                  
		                      <table class="table table-bordered">
                                  <thead>
                                  <tr class="bg-primary">
                                    <th>#</th>
                                    <th>Payment Date</th>
                                    <th>Payment</th>
                                    <th>Payment Type</th>
                                    <th>Payment Note</th>
                                    <th>Created by</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	$q1=$this->db->query("select * from db_purchasepayments where purchase_id=$purchase_id");
									$i=1;
									$str = '';
									if($q1->num_rows()>0){
										foreach ($q1->result() as $res1) {
											echo "<tr>";
											echo "<td>".$i++."</td>";
											echo "<td>".show_date($res1->payment_date)."</td>";
											echo "<td>".$res1->payment."</td>";
											echo "<td>".$res1->payment_type."</td>";
											echo "<td>".$res1->payment_note."</td>";
											echo "<td>".ucfirst($res1->created_by)."</td>";
										
											echo "<td><a onclick='delete_purchase_payment(".$res1->id.")' class='pointer btn  btn-danger' ><i class='fa fa-trash'></i></</td>";	
											echo "</tr>";
										}
									}
									else{
										echo "<tr><td colspan='7' class='text-danger text-center'>No Records Found</td></tr>";
									}
									?>
                                </tbody>
                            </table>
		               
		               </div>
		            <div class="clearfix"></div>
		        </div>    
		       
		     
		   
		      </div><!-- col-md-9 -->
		      <!-- RIGHT HAND -->
		    </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
		        
		      </div>
		    </div>
		    <!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		</div>
		<?php
	}
}
