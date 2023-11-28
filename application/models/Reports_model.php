<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {

	public function show_sales_report(){
		extract($_POST);

		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.id,a.sales_code,a.sales_date,b.customer_name,b.customer_code,a.grand_total,a.paid_amount");
	    
		if($customer_id!=''){
			
			$this->db->where("a.customer_id=$customer_id");
		}
		if($view_all=="no"){
			$this->db->where("(a.sales_date>='$from_date' and a.sales_date<='$to_date')");
		}
		$this->db->where("b.`id`= a.`customer_id`");
		$this->db->from("db_sales as a");
		$this->db->where("a.`sales_status`= 'Final'");
		$this->db->from("db_customers as b");
		
		if($payment_status=='Paid'){
			$this->db->where("a.grand_total=a.paid_amount");
		}
		else if($payment_status=='Unpaid'){
			$this->db->where("a.paid_amount=0");
		}
		else if($payment_status=='Partial'){
			$this->db->where("(a.grand_total!=a.paid_amount and a.paid_amount>0)");
		}
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_grand_total=0;
			$tot_paid_amount=0;
			$tot_due_amount=0;
			foreach ($q1->result() as $res1) {
				
				$date_difference = ($res1->paid_amount==0 || ($res1->grand_total!=$res1->paid_amount && $res1->paid_amount>0) ) ? date_difference($res1->sales_date,date("Y-m-d")) : 0;

				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("sales/invoice/$res1->id")."'>".$res1->sales_code."</a></td>";
				echo "<td>".show_date($res1->sales_date)."</td>";
				echo "<td>".$res1->customer_code."</td>";
				echo "<td>".$res1->customer_name."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->paid_amount)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total-$res1->paid_amount)."</td>";
				echo "<td class='text-left'>$date_difference</td>";
				echo "</tr>";
				$tot_grand_total+=$res1->grand_total;
				$tot_paid_amount+=$res1->paid_amount;
				$tot_due_amount+=($res1->grand_total-$res1->paid_amount);

			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_grand_total)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_paid_amount)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_due_amount)."</td>
					  <td></td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=14>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	public function show_sales_return_report(){
		extract($_POST);

		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.id,a.return_code,a.return_date,b.customer_name,b.customer_code,a.grand_total,a.paid_amount");
	    
		if($customer_id!=''){
			
			$this->db->where("a.customer_id=$customer_id");
		}
		if($view_all=="no"){
			$this->db->where("(a.return_date>='$from_date' and a.return_date<='$to_date')");
		}
		$this->db->where("b.`id`= a.`customer_id`");
		$this->db->from("db_salesreturn as a");
		$this->db->from("db_customers as b");
		$this->db->select("CASE WHEN c.sales_code IS NULL THEN '' ELSE c.sales_code END AS sales_code");
		$this->db->join('db_sales as c','c.id=a.sales_id','left');
		
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_grand_total=0;
			$tot_paid_amount=0;
			$tot_due_amount=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("sales_return/invoice/$res1->id")."'>".$res1->return_code."</a></td>";
				echo "<td>".show_date($res1->return_date)."</td>";
				
				echo (!empty($res1->sales_code)) ? "<td><a title='Return Raised Against this Invoice' href='".base_url("sales/invoice/$res1->id")."'>".$res1->sales_code."</a></td>" : '<td>-NA-</td>';
				echo "<td>".$res1->customer_name."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->paid_amount)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total-$res1->paid_amount)."</td>";
				echo "</tr>";
				$tot_grand_total+=$res1->grand_total;
				$tot_paid_amount+=$res1->paid_amount;
				$tot_due_amount+=($res1->grand_total-$res1->paid_amount);

			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_grand_total)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_paid_amount)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_due_amount)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	public function show_purchase_report(){
		extract($_POST);
		
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.id,a.purchase_code,a.purchase_date,b.supplier_name,b.supplier_code,a.grand_total,a.paid_amount");
	    
		if($supplier_id!=''){
			$this->db->where("a.supplier_id=$supplier_id");
		}
		if($view_all=="no"){
			$this->db->where("(a.purchase_date>='$from_date' and a.purchase_date<='$to_date')");
		}
		$this->db->where("b.`id`= a.`supplier_id`");
		$this->db->from("db_purchase as a");
		$this->db->where("a.`purchase_status`= 'Received'");
		$this->db->from("db_suppliers as b");
		
		if($payment_status=='Paid'){
			$this->db->where("a.grand_total=a.paid_amount");
		}
		else if($payment_status=='Unpaid'){
			$this->db->where("a.paid_amount=0");
		}
		else if($payment_status=='Partial'){
			$this->db->where("(a.grand_total!=a.paid_amount and a.paid_amount>0)");
		}

		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_grand_total=0;
			$tot_paid_amount=0;
			$tot_due_amount=0;
			foreach ($q1->result() as $res1) {
				$date_difference = ($res1->paid_amount==0 || ($res1->grand_total!=$res1->paid_amount && $res1->paid_amount>0) ) ? date_difference($res1->purchase_date,date("Y-m-d")) : 0;

				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("purchase/invoice/$res1->id")."'>".$res1->purchase_code."</a></td>";
				echo "<td>".show_date($res1->purchase_date)."</td>";
				echo "<td>".$res1->supplier_code."</td>";
				echo "<td>".$res1->supplier_name."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->paid_amount)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total-$res1->paid_amount)."</td>";
				echo "<td class='text-left'>$date_difference</td>";
				echo "</tr>";
				$tot_grand_total+=$res1->grand_total;
				$tot_paid_amount+=$res1->paid_amount;
				$tot_due_amount+=($res1->grand_total-$res1->paid_amount);

			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_grand_total)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_paid_amount)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_due_amount)."</td>
					  <td></td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=14>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	public function show_purchase_return_report(){
		extract($_POST);
		
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.id,a.return_code,a.return_date,b.supplier_name,a.grand_total,a.paid_amount");
	    
		if($supplier_id!=''){
			$this->db->where("a.supplier_id=$supplier_id");
		}
		if($view_all=="no"){
			$this->db->where("(a.return_date>='$from_date' and a.return_date<='$to_date')");
		}
		$this->db->where("b.`id`= a.`supplier_id`");
		$this->db->from("db_purchasereturn as a");
		$this->db->from("db_suppliers as b");
		$this->db->select("CASE WHEN c.purchase_code IS NULL THEN '' ELSE c.purchase_code END AS purchase_code");
		$this->db->join('db_purchase as c','c.id=a.purchase_id','left');
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_grand_total=0;
			$tot_paid_amount=0;
			$tot_due_amount=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("purchase_return/invoice/$res1->id")."'>".$res1->return_code."</a></td>";
				echo "<td>".show_date($res1->return_date)."</td>";
				echo (!empty($res1->purchase_code)) ? "<td><a title='Return Raised Against this Invoice' href='".base_url("purchase/invoice/$res1->id")."'>".$res1->purchase_code."</a></td>" : '<td>-NA-</td>';
				
				echo "<td>".$res1->supplier_name."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->paid_amount)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total-$res1->paid_amount)."</td>";
				echo "</tr>";
				$tot_grand_total+=$res1->grand_total;
				$tot_paid_amount+=$res1->paid_amount;
				$tot_due_amount+=($res1->grand_total-$res1->paid_amount);

			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_grand_total)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_paid_amount)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_due_amount)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	
	public function show_expense_report(){
		extract($_POST);
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));

		/*$q1=$this->db->query("SELECT a.*,b.category_name from db_expense as a,db_expense_category as b where b.id=a.category_id and a.expense_date>='$from_date' and expense_date<='$to_date'");*/
		
		$this->db->select("a.*,b.category_name");
	    
		if($category_id!=''){
			$this->db->where("a.category_id=$category_id");
		}
		if($view_all=="no"){
			$this->db->where("(a.expense_date>='$from_date' and a.expense_date<='$to_date')");
		}
		$this->db->where("b.`id`= a.`category_id`");
		$this->db->from("db_expense as a");
		$this->db->from("db_expense_category as b");
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		
		if($q1->num_rows()>0){
			$i=0;
			$tot_expense_amt=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".$res1->expense_code."</td>";
				echo "<td>".$res1->expense_date."</td>";
				echo "<td>".$res1->category_name."</td>";
				echo "<td>".$res1->reference_no."</td>";
				echo "<td>".$res1->expense_for."</td>";
				echo "<td class='text-right'>".app_number_format($res1->expense_amt)."</td>";
				echo "<td>".$res1->note."</td>";
				echo "<td>".ucfirst($res1->created_by)."</td>";
				echo "</tr>";
				$tot_expense_amt+=$res1->expense_amt;
			}
			echo "<tr>
					  <td class='text-right text-bold' colspan='6'><b>Total Expense :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_expense_amt)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function show_stock_report(){
		extract($_POST);
		
		
		$this->db->select("
							a.item_code,
							a.item_name,
							c.brand_name,
							d.category_name,
							a.purchase_price,
							b.tax_name,
							a.tax_type,
							a.sales_price,
							a.stock,
							");
		$this->db->from("db_items as a");
		$this->db->join("db_tax as b","b.id=a.tax_id","left");
		$this->db->join("db_brands as c","c.id=a.brand_id","left");
		$this->db->join("db_category as d","d.id=a.category_id","left");

		$this->db->order_by("a.id");
		if(!empty($brand_id)){
			$this->db->where("a.brand_id",$brand_id);
		}
		if(!empty($category_id)){
			$this->db->where("a.category_id",$category_id);
		}

		if(!empty($item_id)){
			$this->db->where("a.id",$item_id);
		  }
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		$str='';
		if($q1->num_rows()>0){
			$i=0;
			$tot_stock_value=0;
			$tot_purchase_price=0;
			$tot_sales_price=0;
			$tot_stock=0;

			foreach ($q1->result() as $res1) {
				$tax_type = ($res1->tax_type=='Inclusive') ? 'Inc.' : 'Exc.';
				$stock_value = $res1->purchase_price * $res1->stock;
				$str.="<tr>";
				$str.="<td>".++$i."</td>";
				$str.="<td>".$res1->item_code."</td>";
				$str.="<td>".$res1->item_name."</td>";
				$str.="<td>".$res1->brand_name."</td>";
				$str.="<td>".$res1->category_name."</td>";
				$str.="<td class='text-right'>".app_number_format($res1->purchase_price)."</td>";
				$str.="<td>".$res1->tax_name."[".$tax_type."]</td>";
				$str.="<td class='text-right'>".app_number_format($res1->sales_price)."</td>";
				$str.="<td>".$res1->stock."</td>";
				$str.="<td class='text-right'>".$stock_value."</td>";
				$str.="</tr>";
				$tot_purchase_price+=$res1->purchase_price;
				$tot_sales_price+=$res1->sales_price;
				$tot_stock_value+=$stock_value;
				$tot_stock+=$res1->stock;

			}

			$str.="<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_purchase_price)."</td>
					  <td class='text-right text-bold'></td>
					  <td class='text-right text-bold'>".app_number_format($tot_sales_price)."</td>
					  <td class='text-bold'>".app_number_format($tot_stock)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_stock_value)."</td>
				  </tr>";
		}
		else{
			$str.="<tr>";
			$str.="<td class='text-center text-danger' colspan=8>No Records Found</td>";
			$str.="</tr>";
		}

		return $str;
		
	    exit;
	}
	public function show_item_sales_report(){
		extract($_POST);

		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.id,a.sales_code,a.sales_date,b.customer_name,b.customer_code,c.total_cost");
		$this->db->select("c.sales_qty,d.item_name");
	    
	    
		if($view_all=="no"){
			$this->db->where("(a.sales_date>='$from_date' and a.sales_date<='$to_date')");
		}
//		$this->db->group_by("c.`item_id`");
		$this->db->order_by("a.`sales_date`,a.sales_code",'asc');
		$this->db->from("db_sales as a");
		$this->db->where("a.`id`= c.`sales_id`");
		$this->db->where("a.`sales_status`= 'Final'");
		$this->db->from("db_items as d");
		$this->db->where("d.`id`= c.`item_id`");
		$this->db->from("db_customers as b");
		$this->db->where("b.`id`= a.`customer_id`");
		$this->db->from("db_salesitems as c");
		if($item_id!=''){
			$this->db->where("c.item_id=$item_id");
		}

		if($category_id!=''){
			$this->db->where("d.category_id=$category_id");
		}		
		
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_total_cost=0;
			$tot_paid_amount=0;
			$tot_due_amount=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("sales/invoice/$res1->id")."'>".$res1->sales_code."</a></td>";
				echo "<td>".show_date($res1->sales_date)."</td>";
				echo "<td>".$res1->customer_name."</td>";
				echo "<td>".$res1->item_name."</td>";
				echo "<td>".$res1->sales_qty."</td>";
				echo "<td class='text-right'>".app_number_format($res1->total_cost)."</td>";
				
				echo "</tr>";
				$tot_total_cost+=$res1->total_cost;
				
			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='6'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_total_cost)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function show_item_purchase_report(){
		extract($_POST);

		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.id,a.purchase_code,a.purchase_date,b.supplier_name,b.supplier_code,c.total_cost");
		$this->db->select("c.purchase_qty,d.item_name");
	    
	    
		if($view_all=="no"){
			$this->db->where("(a.purchase_date>='$from_date' and a.purchase_date<='$to_date')");
		}
//		$this->db->group_by("c.`item_id`");
		$this->db->order_by("a.`purchase_date`,a.purchase_code",'asc');
		$this->db->from("db_purchase as a");
		$this->db->where("a.`id`= c.`purchase_id`");
		$this->db->where("a.`purchase_status`= 'Received'");
		$this->db->from("db_items as d");
		$this->db->where("d.`id`= c.`item_id`");
		$this->db->from("db_suppliers as b");
		$this->db->where("b.`id`= a.`supplier_id`");
		$this->db->from("db_purchaseitems as c");
		if($item_id!=''){
			$this->db->where("c.item_id=$item_id");
		}
		
		
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_total_cost=0;
			$tot_paid_amount=0;
			$tot_due_amount=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("purchase/invoice/$res1->id")."'>".$res1->purchase_code."</a></td>";
				echo "<td>".show_date($res1->purchase_date)."</td>";
				echo "<td>".$res1->supplier_name."</td>";
				echo "<td>".$res1->item_name."</td>";
				echo "<td>".$res1->purchase_qty."</td>";
				echo "<td class='text-right'>".app_number_format($res1->total_cost)."</td>";
				
				echo "</tr>";
				$tot_total_cost+=$res1->total_cost;
				
			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='6'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_total_cost)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function show_purchase_payments_report(){
		extract($_POST);
		$supplier_id = $this->input->post('supplier_id');
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		$payment_type = $this->input->post('payment_type');
		
		$this->db->select("c.id,c.purchase_code,a.payment_date,b.supplier_name,b.supplier_code,a.payment_type,a.payment_note,a.payment");
	    
		if($supplier_id!=''){
			$this->db->where("c.supplier_id=$supplier_id");
		}
		if(!empty($payment_type)){
			$this->db->where("a.payment_type",$payment_type);
		}
		$this->db->where("b.id=c.`supplier_id`");
		$this->db->where("(a.payment_date>='$from_date' and a.payment_date<='$to_date')");
		
		$this->db->where("c.id=a.purchase_id");

		$this->db->from("db_purchasepayments as a");
		$this->db->from("db_suppliers as b");
		$this->db->from("db_purchase as c");
		$this->db->where("c.`purchase_status`= 'Received'");
		//$this->db->group_by("c.purchase_code");
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_payment=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("purchase/invoice/$res1->id")."'>".$res1->purchase_code."</a></td>";
				echo "<td>".show_date($res1->payment_date)."</td>";
				echo "<td>".$res1->supplier_code."</td>";
				echo "<td>".$res1->supplier_name."</td>";
				echo "<td>".$res1->payment_type."</td>";
				echo "<td>".$res1->payment_note."</td>";
				echo "<td class='text-right'>".app_number_format($res1->payment)."</td>";
				echo "</tr>";
				$tot_payment+=$res1->payment;
			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='7'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_payment)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=8>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function supplier_payments_report(){
		extract($_POST);
		
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		$payment_type = $this->input->post('payment_type');

		$this->db->select("a.payment_date,b.supplier_name,a.payment_type,a.payment_note,a.payment");
	    
		if($supplier_id!=''){
			$this->db->where("a.supplier_id=$supplier_id");
		}
		if(!empty($payment_type)){
			$this->db->where("a.payment_type",$payment_type);
		}
		$this->db->where("a.payment>0");
		$this->db->where("(a.payment_date>='$from_date' and a.payment_date<='$to_date')");
		
	

		$this->db->from("db_supplier_payments as a");
		$this->db->from("db_suppliers as b");
		$this->db->where("b.id=a.`supplier_id`");
		
		//$this->db->group_by("c.sales_code");
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_payment=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".show_date($res1->payment_date)."</td>";
				echo "<td>".$res1->supplier_name."</td>";
				echo "<td>".$res1->payment_type."</td>";
				echo "<td>".$res1->payment_note."</td>";
				echo "<td class='text-right'>".app_number_format($res1->payment)."</td>";
				echo "</tr>";
				$tot_payment+=$res1->payment;
			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_payment)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=6>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function show_sales_payments_report(){
		extract($_POST);
		
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		$payment_type = $this->input->post('payment_type');
		$this->db->select("c.id,c.sales_code,a.payment_date,b.customer_name,b.customer_code,a.payment_type,a.payment_note,a.payment,a.created_by");
	    
		if($customer_id!=''){
			$this->db->where("c.customer_id=$customer_id");
		}
		if(!empty($payment_type)){
			$this->db->where("a.payment_type",$payment_type);
		}
		$this->db->where("b.id=c.`customer_id`");
		$this->db->where("a.payment>0");
		$this->db->where("(a.payment_date>='$from_date' and a.payment_date<='$to_date')");
		
		$this->db->where("c.id=a.sales_id");

		$this->db->from("db_salespayments as a");
		$this->db->from("db_customers as b");
		$this->db->from("db_sales as c");
		$this->db->where("c.`sales_status`= 'Final'");
		//$this->db->group_by("c.sales_code");
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_payment=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("sales/invoice/$res1->id")."'>".$res1->sales_code."</a></td>";
				echo "<td>".show_date($res1->payment_date)."</td>";
				echo "<td>".$res1->customer_code."</td>";
				echo "<td>".$res1->customer_name."</td>";
				echo "<td>".$res1->payment_type."</td>";
				echo "<td>".$res1->payment_note."</td>";
				echo "<td class='text-right'>".app_number_format($res1->payment)."</td>";
				echo "<td>".$res1->created_by."</td>";
				echo "</tr>";
				$tot_payment+=$res1->payment;
			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='7'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_payment)."</td>
					  <td></td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=9>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	public function customer_payments_report(){
		extract($_POST);
		
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		$payment_type = $this->input->post('payment_type');
		$this->db->select("a.payment_date,b.customer_name,a.payment_type,a.payment_note,a.payment,a.created_by");
	    
		if($customer_id!=''){
			$this->db->where("a.customer_id=$customer_id");
		}
		
		if(!empty($payment_type)){
			$this->db->where("a.payment_type",$payment_type);
		}
		
		$this->db->where("a.payment>0");
		$this->db->where("(a.payment_date>='$from_date' and a.payment_date<='$to_date')");
		
	

		$this->db->from("db_customer_payments as a");
		$this->db->from("db_customers as b");
		$this->db->where("b.id=a.`customer_id`");
		
		//$this->db->group_by("c.sales_code");
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_payment=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".show_date($res1->payment_date)."</td>";
				echo "<td>".$res1->customer_name."</td>";
				echo "<td>".$res1->payment_type."</td>";
				echo "<td>".$res1->payment_note."</td>";
				echo "<td class='text-right'>".app_number_format($res1->payment)."</td>";
				echo "<td>".$res1->created_by."</td>";
				echo "</tr>";
				$tot_payment+=$res1->payment;
			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_payment)."</td>
					  <td></td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=7>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	/*Expired Items Report*/
	public function show_expired_items_report(){
		extract($_POST);
		$CI =& get_instance();

		
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("id,item_code,item_name,expire_date,stock,lot_number");
	    
		if($item_id!=''){
			
			$this->db->where("id=$item_id");
		}
		if($view_all=="no"){
			$this->db->where("(expire_date<='$to_date')");
		}
		$this->db->from("db_items");
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".$res1->item_code."</td>";
				echo "<td>".$res1->item_name."</td>";
				echo "<td>".$res1->lot_number."</td>";
				echo "<td>".show_date($res1->expire_date)."</td>";
				echo "<td>".$res1->stock."</td>";

			}
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=6>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	function _create_query($table_name,$table_column,$from_date,$to_date){
		$ids = array();

		if($table_column=='db_purchase'){
			$this->db->where("purchase_status='Received'");
		}
		else if($table_column=='db_sales'){
			$this->db->where("sales_status='Final'");
		}

		$this->db->where("(".$table_column.">='$from_date' and ".$table_column."<='$to_date')");

		$this->db->select("id");
		$this->db->from($table_name);
		$query = $this->db->get();
		if($query->num_rows()>0){
			foreach ($query->result() as $res) {
				$ids[] = $res->id;
	    	}	
		}
		return (count($ids)>0) ? implode (", ", $ids) : 'null';
	}
	function _get_db_sales_ids($from_date,$to_date){

		return $this->_create_query('db_sales','sales_date',$from_date,$to_date);

	}

	function _get_db_sales_return_ids($from_date,$to_date){

		return $this->_create_query('db_salesreturn','return_date',$from_date,$to_date);

	}

	public function get_profit_loss_report(){
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			$from_date=date("Y-m-d",strtotime($from_date));
			$to_date=date("Y-m-d",strtotime($to_date));

			$sales_ids = $this->_get_db_sales_ids($from_date,$to_date);
			$sales_return_ids = $this->_get_db_sales_return_ids($from_date,$to_date);


			$info=array();

			//Get opening Balance
			$this->db->select("COALESCE(SUM(b.qty*a.purchase_price),0) AS  opening_stock_price");
			$this->db->from("db_items AS a , db_stockentry AS b");
			$this->db->where("a.id=b.item_id");
            $opening_stock_price=$this->db->get()->row()->opening_stock_price;
            $info['opening_stock_price']=number_format($opening_stock_price,0);
            
            //total purchase amt
			$this->db->select("COALESCE(SUM(a.tax_amt),0) AS tax_amt");
			$this->db->from("db_purchaseitems as a,db_purchase as b");
			$this->db->where("a.purchase_id=b.id and b.purchase_status='Received'");
			$this->db->where("(b.purchase_date>='$from_date' and b.purchase_date<='$to_date')");
            $purchase_tax_amt=$this->db->get()->row()->tax_amt;
            $info['purchase_tax_amt']=number_format($purchase_tax_amt,0);

            //total purchase amt
			$this->db->select("COALESCE(SUM(grand_total),0) AS pur_total");
			$this->db->from("db_purchase");
			$this->db->where("purchase_status='Received'");
			$this->db->where("(purchase_date>='$from_date' and purchase_date<='$to_date')");
            $pur_total=$this->db->get()->row()->pur_total;
            $pur_total-=$purchase_tax_amt;
            $info['pur_total']=number_format($pur_total,0);

            //Other Charge of Purchase entry
			$this->db->select("COALESCE(SUM(other_charges_amt),0) AS other_charges_amt");
			$this->db->from("db_purchase");
			$this->db->where("purchase_status='Received'");
			$this->db->where("(purchase_date>='$from_date' and purchase_date<='$to_date')");
            $pur_other_charges_amt=$this->db->get()->row()->other_charges_amt;
            $info['pur_other_charges_amt']=number_format($pur_other_charges_amt,0);


            
            //Disount purchase entry
			$this->db->select("COALESCE(SUM(a.discount_amt),0) AS discount_amt");
			$this->db->from("db_purchaseitems as a,db_purchase as b");
			$this->db->where("a.purchase_id=b.id and b.purchase_status='Received'");
			$this->db->where("(b.purchase_date>='$from_date' and b.purchase_date<='$to_date')");
            $purchase_discount_amt=$this->db->get()->row()->discount_amt;

			$this->db->select("COALESCE(SUM(tot_discount_to_all_amt),0) AS tot_discount_to_all_amt");
			$this->db->from("db_purchase");
			$this->db->where("purchase_status='Received'");
			$this->db->where("(purchase_date>='$from_date' and purchase_date<='$to_date')");
			$purchase_discount_amt=$this->db->get()->row()->tot_discount_to_all_amt;
            $info['purchase_discount_amt']=number_format($purchase_discount_amt,0);

            //purchase Paid Amount
			$this->db->select("COALESCE(SUM(paid_amount),0) AS paid_amount");
			$this->db->from("db_purchase");
			$this->db->where("purchase_status='Received'");
			$this->db->where("(purchase_date>='$from_date' and purchase_date<='$to_date')");
            $purchase_paid_amount=$this->db->get()->row()->paid_amount;
            $info['purchase_paid_amount']=number_format($purchase_paid_amount,0);
            
            //total purchase return tax amt
            $this->db->select("COALESCE(SUM(a.tax_amt),0) AS tax_amt");
			$this->db->from("db_purchaseitemsreturn as a,db_purchasereturn as b");
			$this->db->where("a.return_id=b.id");
			$this->db->where("(b.return_date>='$from_date' and b.return_date<='$to_date')");
            $purchase_return_tax_amt=$this->db->get()->row()->tax_amt;
            $info['purchase_return_tax_amt']=number_format($purchase_return_tax_amt,0);
            
            //total purchase return amt
			$this->db->select("COALESCE(SUM(grand_total),0) AS pur_total");
			$this->db->from("db_purchasereturn");
			$this->db->where("(return_date>='$from_date' and return_date<='$to_date')");
            $pur_return_total=$this->db->get()->row()->pur_total;
            $pur_return_total-=$purchase_return_tax_amt;
            $info['pur_return_total']=(number_format($pur_return_total,0));

            //Other Charge of Purchase return entry
			$this->db->select("COALESCE(SUM(other_charges_amt),0) AS other_charges_amt");
			$this->db->from("db_purchasereturn");
			$this->db->where("(return_date>='$from_date' and return_date<='$to_date')");
            $pur_return_other_charges_amt=$this->db->get()->row()->other_charges_amt;
            $info['pur_return_other_charges_amt']=(number_format($pur_return_other_charges_amt,0));
            
            //Disount purchase return entry
			$this->db->select("COALESCE(SUM(a.discount_amt),0) AS discount_amt");
			$this->db->from("db_purchaseitemsreturn as a,db_purchasereturn as b");
			$this->db->where("a.return_id =b.id");
			$this->db->where("(b.return_date>='$from_date' and b.return_date<='$to_date')");
            $purchase_return_discount_amt=$this->db->get()->row()->discount_amt;

			$this->db->select("COALESCE(SUM(tot_discount_to_all_amt),0) AS tot_discount_to_all_amt");
			$this->db->from("db_purchasereturn");
			$this->db->where("(return_date>='$from_date' and return_date<='$to_date')");
			$purchase_return_discount_amt=$this->db->get()->row()->tot_discount_to_all_amt;            
            $info['purchase_return_discount_amt']=(number_format($purchase_return_discount_amt,0));




            //Purchase Return Paid Amount
			$this->db->select("COALESCE(SUM(paid_amount),0) AS paid_amount");
			$this->db->from("db_purchasereturn");
			$this->db->where("(return_date>='$from_date' and return_date<='$to_date')");
            $purchase_return_paid_amount=$this->db->get()->row()->paid_amount;
            $info['purchase_return_paid_amount']=(number_format($purchase_return_paid_amount,0));
            
            
            //total sales amt
			$this->db->select("COALESCE(SUM(a.tax_amt),0) AS tax_amt");
			$this->db->from("db_salesitems as a,db_sales as b");
			$this->db->where("a.sales_id=b.id and b.sales_status='Final'");
			$this->db->where("(b.sales_date>='$from_date' and b.sales_date<='$to_date')");
            $sales_tax_amt=$this->db->get()->row()->tax_amt;
            $info['sales_tax_amt']=(number_format($sales_tax_amt,0));
            



            //Other Charge of Sales entry
			$this->db->select("COALESCE(SUM(other_charges_amt),0) AS other_charges_amt");
			$this->db->from("db_sales");
			$this->db->where("sales_status='Final'");
			$this->db->where("(sales_date>='$from_date' and sales_date<='$to_date')");
            $sal_other_charges_amt=$this->db->get()->row()->other_charges_amt;
            $info['sal_other_charges_amt']=(number_format($sal_other_charges_amt,0));
            



            //Disount sales entry
            
			$this->db->select("COALESCE(SUM(a.discount_amt),0) AS discount_amt");
			$this->db->from("db_salesitems as a,db_sales as b");
			$this->db->where(" a.sales_id=b.id and b.sales_status='Final'");
            $sales_discount_amt=$this->db->get()->row()->discount_amt;
            
			$this->db->select("COALESCE(SUM(tot_discount_to_all_amt),0) AS tot_discount_to_all_amt");
			$this->db->from("db_sales");
			$this->db->where("sales_status='Final'");
			$this->db->where("(sales_date>='$from_date' and sales_date<='$to_date')");
			$sales_discount_amt=$this->db->get()->row()->tot_discount_to_all_amt;
            $info['sales_discount_amt']=(number_format($sales_discount_amt,0));
            
            


            //Total SAles amount
			$this->db->select("COALESCE(sum(grand_total),0) AS tot_sal_grand_total");
			$this->db->from("db_sales");
			$this->db->where("sales_status='Final'");
			$this->db->where("(sales_date>='$from_date' and sales_date<='$to_date')");
            $sal_total=$this->db->get()->row()->tot_sal_grand_total;
            $sal_total-=$sales_tax_amt;
            $info['sal_total']=(number_format($sal_total,0));
            

        

            //sales Paid Amount
			$this->db->select("COALESCE(SUM(paid_amount),0) AS paid_amount");
			$this->db->from("db_sales");
			$this->db->where("sales_status='Final'");
			$this->db->where("(sales_date>='$from_date' and sales_date<='$to_date')");
            $sales_paid_amount=$this->db->get()->row()->paid_amount;
            $info['sales_paid_amount']=(number_format($sales_paid_amount,0));
            


            //total sales return amt
			$this->db->select("COALESCE(SUM(a.tax_amt),0) AS tax_amt");
			$this->db->from("db_salesitemsreturn as a");
			$this->db->from("db_salesreturn as b");
			$this->db->where("a.return_id=b.id");
			$this->db->where("(b.return_date>='$from_date' and b.return_date<='$to_date')");
            $sales_return_tax_amt=$this->db->get()->row()->tax_amt;
            $info['sales_return_tax_amt']=(number_format($sales_return_tax_amt,0));
            

         

            //total sales return amt
			$this->db->select("COALESCE(SUM(grand_total),0) AS sal_total");
			$this->db->from("db_salesreturn");
			$this->db->where("(return_date>='$from_date' and return_date<='$to_date')");
            $sal_return_total=$this->db->get()->row()->sal_total;
            $sal_return_total-=$sales_return_tax_amt;
            $info['sal_return_total']=(number_format($sal_return_total,0));
          


            //Other Charge of Sales return entry
			$this->db->select("COALESCE(SUM(other_charges_amt),0) AS other_charges_amt");
			$this->db->from("db_salesreturn");
			$this->db->where("(return_date>='$from_date' and return_date<='$to_date')");
            $sal_return_other_charges_amt=$this->db->get()->row()->other_charges_amt;
            $info['sal_return_other_charges_amt']=(number_format($sal_return_other_charges_amt,0));
            
            //Disount sales return entry
			$this->db->select("COALESCE(SUM(a.discount_amt),0) AS discount_amt");
			$this->db->from("db_salesitemsreturn as a, db_salesreturn as b ");
			$this->db->where("a.return_id = b.id");
			$this->db->where("(b.return_date>='$from_date' and b.return_date<='$to_date')");
            $sales_return_discount_amt=$this->db->get()->row()->discount_amt;

			$this->db->select("COALESCE(SUM(tot_discount_to_all_amt),0) AS tot_discount_to_all_amt");
			$this->db->from("db_salesreturn");
			$this->db->where("(return_date>='$from_date' and return_date<='$to_date')");
            $sales_return_discount_amt=$this->db->get()->row()->tot_discount_to_all_amt;
            $info['sales_return_discount_amt']=(number_format($sales_return_discount_amt,0));
            

            //sales Return Paid Amount
			$this->db->select("COALESCE(SUM(paid_amount),0) AS paid_amount");
			$this->db->from("db_salesreturn");
			$this->db->where("(return_date>='$from_date' and return_date<='$to_date')");
            $sales_return_paid_amount=$this->db->get()->row()->paid_amount;
            $info['sales_return_paid_amount']=(number_format($sales_return_paid_amount,0));
            
            
            //total expense amt
			$this->db->select("COALESCE(SUM(expense_amt),0) AS exp_total");
			$this->db->from("db_expense");
			$this->db->where("(expense_date>='$from_date' and expense_date<='$to_date')");
            $exp_total=$this->db->get()->row()->exp_total;
            $info['exp_total']=(number_format($exp_total,0));;
            
            //total purchase due
			$this->db->select("(COALESCE(SUM(grand_total),0)-COALESCE(SUM(paid_amount),0)) AS purchase_due");
			$this->db->from("db_purchase");
			$this->db->where("purchase_status='Received'");
			$this->db->where("(purchase_date>='$from_date' and purchase_date<='$to_date')");
            $purchase_due_total=$this->db->get()->row()->purchase_due;
            $info['purchase_due_total']=(number_format($purchase_due_total,0));
            
            //total purchase due
			$this->db->select("(COALESCE(SUM(grand_total),0)-COALESCE(SUM(paid_amount),0)) AS purchase_due");
			$this->db->from("db_purchasereturn");
			$this->db->where("(return_date>='$from_date' and return_date<='$to_date')");
            $purchase_return_due_total=$this->db->get()->row()->purchase_due;
            $info['purchase_return_due_total']=(number_format($purchase_return_due_total,0));
            
            //total sales due
			$this->db->select("(COALESCE(SUM(grand_total),0)-COALESCE(SUM(paid_amount),0)) AS sales_due");
			$this->db->from("db_sales");
			$this->db->where("sales_status='Final'");
			$this->db->where("(sales_date>='$from_date' and sales_date<='$to_date')");
            $sales_due_total=$this->db->get()->row()->sales_due;
            $info['sales_due_total']=(number_format($sales_due_total,0));
            
            //total sales return due
			$this->db->select("(COALESCE(SUM(grand_total),0)-COALESCE(SUM(paid_amount),0)) AS return_due");
			$this->db->from("db_salesreturn");
			$this->db->where("(return_date>='$from_date' and return_date<='$to_date')");
            $sales_return_due_total=$this->db->get()->row()->return_due;
            $info['sales_return_due_total']=(number_format($sales_return_due_total,0));
            
            
			/*$this->db->select("b.tax_amt,b.item_id,a.item_name,COALESCE(sum(b.sales_qty),0) as sales_qty,
                  COALESCE(SUM(total_cost),0) as total_cost");
			$this->db->select("COALESCE(SUM(b.purchase_price * b.sales_qty),0) as purchase_price");
			$this->db->from("db_items as a, db_salesitems as b, db_sales as c");
			$this->db->where("c.id=b.sales_id and a.id=b.item_id and c.sales_status='Final'");
			$this->db->where("(c.sales_date>='$from_date' and c.sales_date<='$to_date')");

			$this->db->group_by("item_id");
			//$this->db->where("a.service_bit=0");
			//echo $this->db->get_compiled_select();exit();
            $q1=$this->db->get();
            
            if($q1->num_rows()>0){
            $i=0;
            $tot_purchase_price=0;
            $tot_sales_cost=0;
            $gross_profit=0;
            $tot_purchase_return_price=0;
            $tot_sales_return_price=0;
            $tot_sales_qty=0;
            $tot_purchase_return_qty=0;
            $tot_sales_return_qty=0;
            $grand_profit=0;
            $tot_net_profit=0;
            foreach ($q1->result() as $res1) {
	              //Purchase Return Quantity
	              $purchase_return_qty=$this->db->query("
	                  SELECT COALESCE(sum(a.return_qty),0) as return_qty
	                  FROM db_purchaseitemsreturn as a, db_purchasereturn as b
	                  WHERE 
	                  a.return_id = b.id and
	                  b.return_date>='".$from_date."' and b.return_date<='".$to_date."' and
	                  a.item_id =".$res1->item_id)->row()->return_qty;
	            
	              //Sales Return Quantity
	              $q3=$this->db->query("
	                  SELECT COALESCE(sum(a.total_cost),0) as total_cost,COALESCE(sum(a.return_qty),0) as return_qty
	                  FROM db_salesitemsreturn as a,db_salesreturn as b
	                  WHERE 
	                  a.return_id = b.id and
	                  b.return_date>='".$from_date."' and b.return_date<='".$to_date."' and
	                  a.item_id =".$res1->item_id);

	              $sales_return_total_cost=$q3->row()->total_cost;
	              $sales_return_qty=$q3->row()->return_qty;
	              
	              $qty = $res1->sales_qty-$sales_return_qty;
	              $purchase_price = $res1->purchase_price*$qty;
	            
	              $total_cost = ($res1->total_cost - $sales_return_total_cost);
	              //$purchase_return_price = $res1->purchase_price*$purchase_return_qty;
	              $profit = $total_cost - $purchase_price;
	            
	              $tax_amt = $res1->tax_amt/$res1->sales_qty;
	            
	                //$net_profit =$profit-($tax_amt*$qty);
	                $net_profit =$profit;//As Per Customer Needs
	            
	              $gross_profit+=$profit;
	              $tot_net_profit+=$net_profit;
            	}  //for    
            }//foreach
            else{
	            $gross_profit=0;
	            $tot_net_profit=0;
            }
            

            //$purchase_discount_amt -=  $purchase_return_discount_amt;

			$sales_discount_amt -= $sales_return_discount_amt;

            $tot_net_profit -=$exp_total;
            $tot_net_profit -=$sales_discount_amt;

            $info['gross_profit']=(number_format($gross_profit,0));
            $info['tot_net_profit']=(number_format($tot_net_profit,0));*/


            //GROSS PROFIT & NET PROFIT
            $sales_details = $this->get_sales_item_sum($sales_ids);
            $sal_item_pur_price = $sales_details['purchase_price'];
            $sal_cost = $sales_details['sales_price'];
            $sal_tax_amt = $sales_details['tax_amt'];
            $net_sales = $sal_cost-$sal_item_pur_price;//ACTUAL SALES VALUE


            $return_details = $this->get_sales_return_item_sum($sales_return_ids);
            $ret_item_pur_price = $return_details['purchase_price'];
            $ret_cost = $return_details['return_price'];
            $ret_tax_amt = $return_details['tax_amt'];
            $net_return = $ret_cost - $ret_item_pur_price;//ACTUAL RETURN VALUE
            

            //TO FIND GROSS PROFIT = (SALES PRICE - PURCHASE PRICE OF ITEM) - (SALES RETURN - PURCHASE PRICE OF ITEM)
            /**
             * Gorss prfit = Sales - Purchase price
             * To find gross prfit we are also want deduct return sales records
            */
            $gross_profit = $net_sales - $net_return;

            $info['net_sales']=(number_format($sal_cost,0));
            $info['sales_return_total']=(number_format($ret_cost,0));
            $info['gross_profit']=(number_format($gross_profit,0));

            
            //Tax
            //Sales & Retuern tax, because we are calculating sum
            $tot_tax = $sal_tax_amt - $ret_tax_amt;
            //Now you got valid tax

            //To find net profit now need to deduct valid tax from gross profit
            //also deduct expenses
            $net_profit = ($gross_profit - $tot_tax) - $exp_total;
            $info['tot_net_profit']=(number_format($net_profit,0));



            return $info;
	}

	public function get_sales_item_sum($sales_ids){
		$this->db->select("sales_qty,purchase_price,total_cost,tax_amt");
		$this->db->from('db_salesitems');
		$this->db->where("sales_id in (".$sales_ids.")");

		$Q1 = $this->db->get();
		$sum_pur_price = 0;
		$sum_sal_price = 0;
		$sum_tax_amt = 0;
		if($Q1->num_rows()>0){
			foreach ($Q1->result() as $res1){
				$sales_qty = $res1->sales_qty;
				$purchase_price = $res1->purchase_price;
				$sales_price = $res1->total_cost;
				$tax_amt = $res1->tax_amt;

				$tot_pur_price = $sales_qty * $purchase_price;

				$sum_pur_price+=$tot_pur_price;
				$sum_sal_price+=$sales_price;
				$sum_tax_amt+=$tax_amt;
			}
		}

		return array(
					'purchase_price' => $sum_pur_price,
					'sales_price' => $sum_sal_price,
					'tax_amt' => $sum_tax_amt,
				);
	}
	public function get_sales_return_item_sum($sales_return_ids){
		$this->db->select("return_qty,purchase_price,total_cost,tax_amt");
		$this->db->from('db_salesitemsreturn');
		$this->db->where("return_id in (".$sales_return_ids.")");

		$Q1 = $this->db->get();
		$sum_pur_price = 0;
		$sum_return_price = 0;
		$sum_tax_amt = 0;
		if($Q1->num_rows()>0){
			foreach ($Q1->result() as $res1){
				$return_qty = $res1->return_qty;
				$purchase_price = $res1->purchase_price;
				$return_price = $res1->total_cost;
				$tax_amt = $res1->tax_amt;

				$tot_pur_price = $return_qty * $purchase_price;

				$sum_pur_price+=$tot_pur_price;
				$sum_return_price+=$return_price;
				$sum_tax_amt+=$tax_amt;
			}
		}

		return array(
					'purchase_price' => $sum_pur_price,
					'return_price' => $sum_return_price,
					'tax_amt' => $sum_tax_amt,
				);
	}

	public function get_profit_by_item(){
		$CI =& get_instance();
		extract($_POST);
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
	
			$this->db->select("a.id as sales_id");
			$this->db->select("COALESCE(sum(b.sales_qty),0) as sales_qty,b.tax_amt,b.item_id,COALESCE(SUM(b.total_cost),0) as total_cost");

			$this->db->select("b.purchase_price");

			$this->db->select("c.item_name");
			$this->db->from("db_sales a");
			$this->db->where("(a.sales_date>='$from_date' and a.sales_date<='$to_date')");
			$this->db->join("db_salesitems b","b.sales_id=a.id","left");
			$this->db->join("db_items c","c.id=b.item_id","left");
			$this->db->group_by("b.item_id");

			//echo $this->db->get_compiled_select();exit;
			$q1= $this->db->get();

		if($q1->num_rows()>0){
			$i=0;
			$tot_purchase_price=0;
			$tot_sales_cost=0;
			$gross_profit=0;
			$tot_purchase_return_price=0;
			$tot_sales_return_price=0;
			$tot_sales_qty=0;
			$tot_purchase_return_qty=0;
			$tot_sales_return_qty=0;
			$grand_profit=0;
			$tot_net_profit=0;
			 
			foreach ($q1->result() as $res1) {
				$sales_id = $res1->sales_id;

				//echo "<br>--> ".$res1->item_id;continue;	
				/*Purchase Return Quantity*/
				$purchase_return_qty=$this->db->query("
						SELECT COALESCE(sum(return_qty),0) as return_qty
						FROM db_purchaseitemsreturn
						WHERE 
						item_id =".$res1->item_id)->row()->return_qty;

				/*Sales Return Quantity*/
				$q3=$this->db->query("
						SELECT COALESCE(sum(total_cost),0) as total_cost,COALESCE(sum(return_qty),0) as return_qty
						FROM db_salesitemsreturn
						WHERE 
						sales_id='$sales_id' and
						item_id =".$res1->item_id);
				$sales_return_total_cost=$q3->row()->total_cost;
				$sales_return_qty=$q3->row()->return_qty;
				
				$qty = $res1->sales_qty-$sales_return_qty;
				
				$purchase_price = $res1->purchase_price*$qty;

				$total_cost = ($res1->total_cost - $sales_return_total_cost);
				
				$profit = $total_cost - $purchase_price;

				$tax_amt = $res1->tax_amt/$res1->sales_qty;

			    $net_profit =$profit-($tax_amt*$qty);

				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".$res1->item_name."</td>";
				echo "<td>".$qty."</td>";
				echo "<td style='text-align:right;'>".app_number_format($total_cost)."</td>";
				echo "<td style='text-align:right;'>".app_number_format($purchase_price)."</td>";
				echo "<td style='text-align:right;'>".app_number_format($profit)."</td>";
				
				echo "</tr>";
				$tot_purchase_price+=$purchase_price;
				
				$tot_sales_cost+=$total_cost;
				
				$tot_sales_qty+=($res1->sales_qty-$sales_return_qty);
				$tot_purchase_return_qty+=$purchase_return_qty;
				$tot_sales_return_qty+=$sales_return_qty;
				$gross_profit+=$profit;
				$tot_net_profit+=$net_profit;
			}
			echo "<tr>
					  <td class='text-right text-bold' colspan='2'><b>Total :</b></td>
					  <td class='text-bold'>".$tot_sales_qty."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_sales_cost)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_purchase_price)."</td>
					  
					  <td class='text-right text-bold'>".app_number_format($gross_profit)."</td>
					  
				  </tr>";
				  
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=6>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function get_profit_by_invoice(){
		$CI =& get_instance();
		extract($_POST);
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		$q1=$this->db->query("SELECT a.id,a.sales_date,a.sales_code,b.customer_name ,a.tot_discount_to_all_amt as discount from db_sales as a,db_customers as b 
								where 
								a.sales_status='Final'
								and
								b.id=a.customer_id
								and
								( a.sales_date>='".$from_date."' and  a.sales_date<='".$to_date."')
								");

		if($q1->num_rows()>0){
			$i=0;
			$tot_purchase_price=0;
			$tot_sales_cost=0;
			$tot_profit=0;
			$net_profit=0;
			$tot_net_profit=0;
			$tot_discount=0;

			foreach ($q1->result() as $res1) {
			
				$q2=$this->db->query("SELECT b.sales_qty,COALESCE(SUM(b.purchase_price*b.sales_qty),0) AS purchase_price, COALESCE(SUM(total_cost),0) AS total_cost FROM db_items AS a, db_salesitems AS b, db_sales AS c WHERE c.id=b.sales_id AND a.id=b.item_id and c.sales_status='Final'
					AND b.sales_id=".$res1->id);

				$q3=$this->db->query("SELECT COALESCE(SUM(b.purchase_price*b.return_qty),0) AS purchase_price, COALESCE(SUM(total_cost),0) AS total_cost FROM db_items AS a, db_salesitemsreturn AS b, db_salesreturn AS c WHERE c.id=b.return_id AND a.id=b.item_id and c.return_status!='Final'
					AND b.sales_id=".$res1->id);
				$purchase_return_price=$q3->row()->purchase_price;


				$discount =  $res1->discount;
				$discount = (empty($discount)) ? 0 : $discount;

				//Total price item_purchase_price * qty
				$purchase_price = ($q2->row()->purchase_price-$purchase_return_price);
				//Total price item_sales_price * qty
				$sales_price = ($q2->row()->total_cost-$q3->row()->total_cost);

				$profit = ($sales_price - $purchase_price)-($discount);

				
				/*$sales_tax_amt =$this->db->query("select COALESCE(SUM(tax_amt),0) AS tax_amt from db_salesitems where sales_id=".$res1->id)->row()->tax_amt;
				
				$sales_return_tax_amt =$this->db->query("select COALESCE(SUM(tax_amt),0) AS tax_amt from db_salesitemsreturn where sales_id=".$res1->id)->row()->tax_amt;

				$net_profit = $profit + ($sales_tax_amt-$sales_return_tax_amt);*/
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".$res1->sales_code."</td>";
				echo "<td>".show_date($res1->sales_date)."</td>";
				echo "<td>".$res1->customer_name."</td>";
				echo "<td style='text-align:right;'>".app_number_format($sales_price)."</td>";
				echo "<td style='text-align:right;'>".app_number_format($purchase_price)."</td>";
				echo "<td style='text-align:right;'>".app_number_format($discount)."</td>";
				echo "<td style='text-align:right;'>".app_number_format($profit)."</td>";
				//echo "<td style='text-align:right;'>".app_number_format($net_profit)."</td>";
				echo "</tr>";
				$tot_purchase_price+=$purchase_price;
				$tot_sales_cost+=$sales_price;
				$tot_profit+=$profit;
				$tot_net_profit+=$net_profit;
				$tot_discount+=$discount;
			}
			echo "<tr>
					  <td class='text-right text-bold' colspan='4'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_sales_cost)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_purchase_price)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_discount)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_profit)."</td>
					  
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=7>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	public function brand_wise_stock(){
		extract($_POST);

		
		$this->db->select("a.item_name,COALESCE(sum(a.stock),0) as stock");
		$this->db->select("b.brand_name");
		$this->db->from("db_items as a");
		$this->db->join('db_brands as b', 'b.id=a.brand_id', 'left');
		$this->db->order_by("b.brand_name");
		$this->db->group_by("a.brand_id");
		

	
		$this->db->order_by("a.id");
		if(!empty($brand_id)){
			$this->db->where("a.brand_id",$brand_id);
		}
		

		//echo $this->db->get_compiled_select();exit();
		$str='';
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			foreach ($q1->result() as $res1) {
				//$tax_type = ($res1->tax_type=='Inclusive') ? 'Inc.' : 'Exc.';
				$str.="<tr>";
				$str.="<td>".++$i."</td>";
				//$str.="<td>".$res1->item_code."</td>";
				$str.="<td>".$res1->brand_name."</td>";
				//$str.="<td class='text-right'>".$res1->purchase_price."</td>";
				//$str.="<td>".$res1->tax_name."[".$tax_type."]</td>";
				//$str.="<td class='text-right'>".$res1->sales_price."</td>";
				$str.="<td>".$res1->stock."</td>";
				$str.="</tr>";
			}
		}
		else{
			$str.="<tr>";
			$str.="<td class='text-center text-danger' colspan=13>No Records Found</td>";
			$str.="</tr>";
		}
		
		return $str;
	    exit;
	}

	public function category_wise_stock(){
		extract($_POST);

		
		$this->db->select("c.category_name,COALESCE(sum(a.stock),0) as stock");
		
		$this->db->from("db_items as a");
		
		$this->db->join('db_category as c', 'c.id=a.category_id', 'left');
		
		$this->db->group_by("a.category_id");
		
		$this->db->order_by("a.id");

		if(!empty($category_id)){
			$this->db->where("a.category_id",$category_id);
		}
		

		//echo $this->db->get_compiled_select();exit();
		$str='';
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			foreach ($q1->result() as $res1) {
				$str.="<tr>";
				$str.="<td>".++$i."</td>";
				$str.="<td>".$res1->category_name."</td>";
				$str.="<td>".$res1->stock."</td>";
				$str.="</tr>";
			}
		}
		else{
			$str.="<tr>";
			$str.="<td class='text-center text-danger' colspan=13>No Records Found</td>";
			$str.="</tr>";
		}
		
		return $str;
	    exit;
	}
}
