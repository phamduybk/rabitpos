<!DOCTYPE html>
<html>
<title><?= $page_title;?>Hóa đơn khổ K57</title>
<head>
  <?php include"comman/code_css_form.php"; ?>
<link rel='shortcut icon' href='<?php echo $theme_link; ?>images/favicon.ico' />

<style>
table, th, td {
    border: 0.5px solid black;
    border-collapse: collapse;
    font-family: 'Open Sans', 'Martel Sans', sans-serif;
}
th, td {
    padding: 5px;
    text-align: left;   
    vertical-align:top 
}
body{
  word-wrap: break-word;
}
</style>
</head>
<body onload="window.print();"><!--  -->
<?php

    $q1=$this->db->query("select * from db_company where id=1 and status=1");
    $res1=$q1->row();
    $company_name=$res1->company_name;
    $company_mobile=$res1->mobile;
    $company_phone=$res1->phone;
    $company_email=$res1->email;
    $company_country=$res1->country;
    $company_state=$res1->state;
    $company_city=$res1->city;
    $company_address=$res1->address;
    $company_gst_no=$res1->gst_no;
    $company_vat_no=$res1->vat_no;
    $terms_and_conditions=$res1->sales_terms_and_conditions;

    $q4=$this->db->query("select sales_invoice_footer_text from db_sitesettings where id=1");
    $res4=$q4->row();
    $sales_invoice_footer_text=$res4->sales_invoice_footer_text;
    
    $q3=$this->db->query("SELECT a.customer_name,a.mobile,a.phone,a.gstin,a.tax_number,a.email,
                           a.opening_balance,a.country_id,a.state_id,a.city,
                           a.postcode,a.address,b.sales_date,b.created_time,b.reference_no,
                           b.sales_code,b.sales_note,b.sales_status,
                           coalesce(b.grand_total,0) as grand_total,
                           coalesce(b.subtotal,0) as subtotal,
                           coalesce(b.paid_amount,0) as paid_amount,
                           coalesce(b.other_charges_input,0) as other_charges_input,
                           other_charges_tax_id,
                           coalesce(b.other_charges_amt,0) as other_charges_amt,
                           discount_to_all_input,
                           b.discount_to_all_type,
                           coalesce(b.tot_discount_to_all_amt,0) as tot_discount_to_all_amt,
                           coalesce(b.round_off,0) as round_off,
                           b.payment_status

                           FROM db_customers a,
                           db_sales b 
                           WHERE 
                           a.`id`=b.`customer_id` AND 
                           b.`id`='$sales_id' 
                           ");
                          
    
    $res3=$q3->row();
    $customer_name=$res3->customer_name;
    $customer_mobile=$res3->mobile;
    $customer_phone=$res3->phone;
    $customer_email=$res3->email;
    $customer_country=$res3->country_id;
    $customer_state=$res3->state_id;
    $customer_city=$res3->city;
    $customer_address=$res3->address;
    $customer_postcode=$res3->postcode;
    $customer_gst_no=$res3->gstin;
    $customer_tax_number=$res3->tax_number;
    $customer_opening_balance=$res3->opening_balance;
    $sales_date=$res3->sales_date;
    $created_time=$res3->created_time;
    $reference_no=$res3->reference_no;
    $sales_code=$res3->sales_code;
    $sales_note=$res3->sales_note;
    $sales_status=$res3->sales_status;

    
    $subtotal=$res3->subtotal;
    $grand_total=$res3->grand_total;
    $other_charges_input=$res3->other_charges_input;
    $other_charges_tax_id=$res3->other_charges_tax_id;
    $other_charges_amt=$res3->other_charges_amt;
    $paid_amount=$res3->paid_amount;
    $discount_to_all_input=$res3->discount_to_all_input;
    $discount_to_all_type=$res3->discount_to_all_type;
    $discount_to_all_type = ($discount_to_all_type=='in_percentage') ? '%' : 'Fixed';
    $tot_discount_to_all_amt=$res3->tot_discount_to_all_amt;
    $round_off=$res3->round_off;
    $payment_status=$res3->payment_status;
    
    if(!empty($customer_country)){
      $Query1 = $this->db->query("select country from db_country where id='$customer_country'");
      if($Query1->num_rows()>0){
        $customer_country = $Query1->row()->country;  
      }
      else{
        $customer_country = '';
      }
    }
    if(!empty($customer_state)){
      $Query1 = $this->db->query("select state from db_states where id='$customer_state'");
      if($Query1->num_rows()>0){
        $customer_state = $Query1->row()->state;  
      }
      else{
        $customer_state = '';
      }

       
    }
    $invoice_name = (strtoupper($sales_status) == strtoupper("Quotation")) ? "Quotation" : "Invoice";
    

    ?>

<table align="center" width="100%" height='100%'>
    <thead>
      
      <tr>
          <th colspan="5" rowspan="2" style="padding-left: 15px;">
            <b><?php echo $company_name; ?></b><br/>
            <?php echo $this->lang->line('address')." : ".$company_address; ?><br/>
            <?php echo $company_country; ?><br/>
            <?php echo $this->lang->line('mobile').":".$company_mobile; ?><br/>
            <?php echo (!empty(trim($company_email))) ? $this->lang->line('email').": ".$company_email."<br>" : '';?>
            <?php echo (!empty(trim($company_gst_no))) ? $this->lang->line('gst_number').": ".$company_gst_no."<br>" : '';?>
            <?php echo (!empty(trim($company_vat_no))) ? $this->lang->line('vat_number').": ".$company_vat_no."<br>" : '';?>
          </th>
          <th colspan="5" rowspan="1"><b style="text-transform: capitalize;"><?=$invoice_name;?></th>
            
      </tr>
      <tr>
          <th colspan="3" rowspan="1">
              <?= $this->lang->line('invoice_no'); ?> : <?php echo "$sales_code"; ?><br>
              <?= $this->lang->line('reference_no'); ?> : <?php echo "$reference_no"; ?><br>
              <?= $this->lang->line('payment_status'); ?> : <?php echo "$payment_status"; ?>
          </th>  
          <th colspan="2" rowspan="1"><?= $this->lang->line('date'); ?> : <?php echo show_date($sales_date)." ".$created_time; ?></th>
      </tr>
    


      <tr>
    <td colspan="5" style="padding-left: 15px;">
    <b><?= $this->lang->line('customer_address'); ?></b><br/>
    <?php echo $this->lang->line('name').": ".$customer_name; ?><br/>
      <?php echo (!empty(trim($customer_mobile))) ? $this->lang->line('mobile').": ".$customer_mobile."<br>" : '';?>
      <?php 
              if(!empty($customer_address)){
                echo $customer_address;
              }
              if(!empty($customer_country)){
                echo $customer_country;
              }
              if(!empty($customer_state)){
                echo ",".$customer_state;
              }
              if(!empty($customer_city)){
                echo ",".$customer_city;
              }
              if(!empty($customer_postcode)){
                echo "-".$customer_postcode;
              }
            ?>
            <br>
      <?php echo (!empty(trim($customer_email))) ? $this->lang->line('email').": ".$customer_email."<br>" : '';?>
      <?php echo (!empty(trim($customer_gst_no))) ? $this->lang->line('gst_number').": ".$customer_gst_no."<br>" : '';?>
      <?php echo (!empty(trim($customer_tax_number))) ? $this->lang->line('tax_number').": ".$customer_tax_number."<br>" : '';?>
  </td>
    
    <td colspan="5" style="padding-left: 15px;">
    <b><?= $this->lang->line('shipping_address'); ?></b><br/>
   <?php echo $this->lang->line('name').": ".$customer_name; ?><br/>
      <?php echo (!empty(trim($customer_mobile))) ? $this->lang->line('mobile').": ".$customer_mobile."<br>" : '';?>
      
      <?php 
              if(!empty($customer_address)){
                echo $customer_address;
              }
              if(!empty($customer_country)){
                echo $customer_country;
              }
              if(!empty($customer_state)){
                echo ",".$customer_state;
              }
              if(!empty($customer_city)){
                echo ",".$customer_city;
              }
              if(!empty($customer_postcode)){
                echo "-".$customer_postcode;
              }
            ?>
            <br>
      <?php echo (!empty(trim($customer_email))) ? $this->lang->line('email').": ".$customer_email."<br>" : '';?>
      <?php echo (!empty(trim($customer_gst_no))) ? $this->lang->line('gst_number').": ".$customer_gst_no."<br>" : '';?>
      <?php echo (!empty(trim($customer_tax_number))) ? $this->lang->line('tax_number').": ".$customer_tax_number."<br>" : '';?>
  </td>
  </tr>
  
    
  <tr>
    <th >#</th>
    <th ><?= $this->lang->line('item_name'); ?></th>
    <th ><?= $this->lang->line('sales_price'); ?></th>
    <th ><?= $this->lang->line('quantity'); ?></th>
    <th ><?= $this->lang->line('tax'); ?></th>
    <th ><?= $this->lang->line('tax_amount'); ?></th>
    <th ><?= $this->lang->line('discount'); ?></th>
    <th ><?= $this->lang->line('discount_amount'); ?></th>
    <th ><?= $this->lang->line('unit_cost'); ?></th>
    <th ><?= $this->lang->line('total_amount'); ?></th>
  </tr>
  </thead>
<tbody>
  <tr>
 <?php
              $i=0;
              $tot_qty=0;
              $tot_sales_price=0;
              $tot_tax_amt=0;
              $tot_discount_amt=0;
              $tot_unit_total_cost=0;
              $tot_total_cost=0;
              $q2=$this->db->query("SELECT c.item_name, a.sales_qty,
                                  a.price_per_unit, b.tax,b.tax_name,a.tax_amt,
                                  a.discount_input,a.discount_amt, a.unit_total_cost,
                                  a.total_cost 
                                  FROM 
                                  db_salesitems AS a,db_tax AS b,db_items AS c 
                                  WHERE 
                                  c.id=a.item_id AND b.id=a.tax_id AND a.sales_id='$sales_id'");
              foreach ($q2->result() as $res2) {
                  $discount = (empty($res2->discount_input)||$res2->discount_input==0)? '0':$res2->discount_input."%";
                  $discount_amt = (empty($res2->discount_amt)||$res2->discount_input==0)? '0':$res2->discount_amt."";
                  echo "<tr>";  
                  echo "<td>".++$i."</td>";
                  echo "<td>".$res2->item_name."</td>";
                  echo "<td>".$res2->price_per_unit."</td>";
                  echo "<td>".$res2->sales_qty."</td>";
                  echo "<td>".$res2->tax."%<br>".$res2->tax_name."</td>";
                  echo "<td style='text-align: right;'>".$res2->tax_amt."</td>";
                  echo "<td style='text-align: right;'>".$discount."</td>";
                  echo "<td style='text-align: right;'>".$discount_amt."</td>";
                  echo "<td style='text-align: right;'>".$res2->unit_total_cost."</td>";
                  echo "<td style='text-align: right;'>".$res2->total_cost."</td>";
                  echo "</tr>";  
                  $tot_qty +=$res2->sales_qty;
                  $tot_sales_price +=$res2->price_per_unit;
                  $tot_tax_amt +=$res2->tax_amt;
                  $tot_discount_amt +=$res2->discount_amt;
                  $tot_unit_total_cost +=$res2->unit_total_cost;
                  $tot_total_cost +=$res2->total_cost;
              }
              ?>
  </tr>
  </tbody>
<tfoot>
  <tr>
    <td colspan="3" style="text-align: center;font-weight: bold;"><?= $this->lang->line('total'); ?></td>
    <td colspan="1" style="font-weight: bold;"><?=$tot_qty; ?></td>
    <td colspan="1" style="">-</td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_tax_amt),0,'.',''); ?></b></td>
    <td colspan="1" style="">-</td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_discount_amt),0,'.',''); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_unit_total_cost),0,'.',''); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_total_cost),0,'.',''); ?></b></td>
  </tr>
  <tr>
    <td colspan="9" style="text-align: right;"><b><?= $this->lang->line('subtotal'); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(round($subtotal),0,'.',''); ?></b></td>
  </tr>
  <tr>
    <td colspan="9" style="text-align: right;"><b><?= $this->lang->line('other_charges'); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(round($other_charges_amt),0,'.',''); ?></b></td>
  </tr>
  <tr>
    <td colspan="9" style="text-align: right;"><b><?= $this->lang->line('discount_on_all'); ?>(<?= $discount_to_all_input." ".$discount_to_all_type; ?>)</b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(round($tot_discount_to_all_amt),0,'.',''); ?></b></td>
  </tr>
  <tr>
    <td colspan="9" style="text-align: right;"><b><?= $this->lang->line('grand_total'); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(round($grand_total),0,'.',''); ?></b></td>
  </tr>
  <tr>
    <td colspan="10">
<?php
     
      echo "<span class='amt-in-word'>Amount in words: <i style='font-weight:bold;'>".NumberToWords(round($grand_total))."</i></span>";

      ?>
  
</td>
  </tr>

  <?php if(!empty(trim($terms_and_conditions))){ ?>
    <tr>
      <td colspan="10" style="">
        <span><b> <?= $this->lang->line('terms_and_conditions'); ?></b></span><br>
        <span style='font-size: 8px;'><?= nl2br($terms_and_conditions);  ?></span>
      </td>
    </tr>
  <?php } ?>


  <tr>
    <td colspan="5" style="height:100px;">
      <b><?= $this->lang->line('customer_signature'); ?></b><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>
    </td>
    <td colspan="5">
      <b><?= $this->lang->line('authorised_signature'); ?></b><br/><br/><br/><br/><br/>
    </td>
  </tr>
  <?php if(!empty($sales_invoice_footer_text)) {?>
  <tr style="border-top: 1px solid;">
    <td colspan="10" style="text-align: center;">
      <b><?= $sales_invoice_footer_text; ?></b>
    </td>
  </tr>
  <?php } ?>
</tfoot>
</table>



</body>
</html>
