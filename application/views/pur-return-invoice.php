<!DOCTYPE html>
<html>
<head>
<!-- TABLES CSS CODE -->
<?php include"comman/code_css_form.php"; ?>
<!-- </copy> -->  
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <?php include"sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $this->lang->line('invoice'); ?>
        <small>Add/Update Invoice</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $base_url; ?>purchase_return"><?= $this->lang->line('purchase_returns_list'); ?></a></li>
        <li><a href="<?php echo $base_url; ?>purchase_return/create"><?= $this->lang->line('create_new'); ?></a></li>
        <li class="active"><?= $this->lang->line('invoice'); ?></li>
      </ol>
    </section>
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
    $company_pan_no=$res1->pan_no;

    
    $q3=$this->db->query("SELECT b.purchase_id,a.supplier_name,a.mobile,a.phone,a.gstin,a.tax_number,a.email,
                           a.opening_balance,a.country_id,a.state_id,a.city,
                           a.postcode,a.address,b.return_date,b.reference_no,
                           b.return_code,b.return_status,b.return_note,
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

                           FROM db_suppliers a,
                           db_purchasereturn b 
                           WHERE 
                           a.`id`=b.`supplier_id` AND 
                           b.`id`='$return_id' 
                           ");
                          
    
    $res3=$q3->row();
    $purchase_id=$res3->purchase_id;
    $supplier_name=$res3->supplier_name;
    $supplier_mobile=$res3->mobile;
    $supplier_phone=$res3->phone;
    $supplier_email=$res3->email;
    $supplier_state=$res3->state_id;
    $supplier_city=$res3->city;
    $supplier_address=$res3->address;
    $supplier_postcode=$res3->postcode;
    $supplier_gst_no=$res3->gstin;
    $supplier_tax_number=$res3->tax_number;
    $supplier_opening_balance=$res3->opening_balance;
    $return_date=$res3->return_date;
    $reference_no=$res3->reference_no;
    $return_code=$res3->return_code;
    $return_status=$res3->return_status;
    $return_note=$res3->return_note;

    
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
    
    $supplier_country = $this->db->query("select country from db_country where id=".$res3->country_id)->row()->country;
    if(!empty($supplier_state)){
      $supplier_state = $this->db->query("select state from db_states where id=".$supplier_state)->row()->state;
    }

    $purchase_code = (!empty($purchase_id))?$this->db->query("select purchase_code from db_purchase where id=".$purchase_id)->row()->purchase_code:'';
    ?>


    <!-- Main content -->
    <section class="content-header">
    <div class="row">
      <div class="col-md-12">
      <!-- ********** ALERT MESSAGE START******* -->
                 
            <?php if($this->session->flashdata('error')!=''){ ?>
                <div class="alert alert-danger text-left">
                 <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?= $this->session->flashdata('error') ?></strong>
              </div> 
               <?php
              }
              else{ ?>
                <div class="alert alert-success text-left">
                 <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>
                  <?php 
                   if(!empty($this->session->flashdata('success'))){ 
                    echo $this->session->flashdata('success')."<br>";
                   }
                   if(!empty($purchase_id)){ 
                    echo "<i class='fa fa-fw fa-hand-o-right'></i>Return Against Purchase Entry [Purchase Code is ".$this->db->select('purchase_code')->where('id',$purchase_id)->get('db_purchase')->row()->purchase_code.'].';
                    //echo "<br>";
                   } 
                   else{
                    echo '<i class="fa fa-fw fa-hand-o-right"></i>Direct Return Invoice.';
                   }
                   ?>
                  </strong>
              </div>
              <?php } ?>
            <!-- ********** ALERT MESSAGE END******* -->
     </div>
    </div>
    </section>
    <section class="invoice">
      <!-- title row -->
      <div class="printableArea">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?= $this->lang->line('purchase_return_invoice'); ?>
            <small class="pull-right">Date: <?= show_date($return_date); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <i><?= $this->lang->line('from'); ?></i>
          <address>
            <strong><?php echo  $company_name; ?></strong><br>
            <?php echo  $company_address; ?>,
            <?= $this->lang->line('city'); ?>:<?php echo  $company_city; ?><br>
            <?= $this->lang->line('phone'); ?>: <?php echo  $company_phone; ?>,
            <?= $this->lang->line('mobile'); ?>: <?php echo  $company_mobile; ?><br>
            <?php echo (!empty(trim($company_email))) ? $this->lang->line('email').": ".$company_email."<br>" : '';?>
            <?php echo (!empty(trim($company_gst_no))) ? $this->lang->line('gst_number').": ".$company_gst_no."<br>" : '';?>
            <?php echo (!empty(trim($company_vat_no))) ? $this->lang->line('vat_number').": ".$company_vat_no."<br>" : '';?>
            <?php echo (!empty(trim($company_pan_no))) ? $this->lang->line('vat_number').": ".$company_pan_no."<br>" : '';?>
           
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <i><?= $this->lang->line('supplier_details'); ?><br></i>
          <address>
            <strong><?php echo  $supplier_name; ?></strong><br>
            <?php 
              if(!empty($supplier_address)){
                echo $supplier_address;
              }
              if(!empty($supplier_country)){
                echo $supplier_country;
              }
              if(!empty($supplier_state)){
                echo ",".$supplier_state;
              }
              if(!empty($supplier_city)){
                echo ",".$supplier_city;
              }
              if(!empty($supplier_postcode)){
                echo "-".$supplier_postcode;
              }
            ?>
            <br>
            <?php echo (!empty(trim($supplier_mobile))) ? $this->lang->line('mobile').": ".$supplier_mobile."<br>" : '';?>
            <?php echo (!empty(trim($supplier_phone))) ? $this->lang->line('phone').": ".$supplier_phone."<br>" : '';?>
            <?php echo (!empty(trim($supplier_email))) ? $this->lang->line('email').": ".$supplier_email."<br>" : '';?>
            <?php echo (!empty(trim($supplier_gst_no))) ? $this->lang->line('gst_number').": ".$supplier_gst_no."<br>" : '';?>
            <?php echo (!empty(trim($supplier_tax_number))) ? $this->lang->line('tax_number').": ".$supplier_tax_number."<br>" : '';?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b><?= $this->lang->line('invoice'); ?> #<?php echo  $return_code; ?></b><br>
          <b><?= $this->lang->line('return_status'); ?> :<?php echo  $return_status; ?></b><br>
          <b><?= $this->lang->line('reference_no'); ?> :<?php echo  $reference_no; ?></b><br>
          <?php if($purchase_code) {?>
            <b><?= $this->lang->line('return_against_purchase'); ?> :#<?php echo  $purchase_code; ?></b><br>
          <?php } ?>
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped records_table table-bordered">
            <thead class="bg-gray-active">
            <tr>
              <th>#</th>
              <th><?= $this->lang->line('item_name'); ?></th>
              <th><?= $this->lang->line('price'); ?></th>
              <th><?= $this->lang->line('discount'); ?></th>
              <th><?= $this->lang->line('discount_amount'); ?></th>
              <th><?= $this->lang->line('quantity'); ?></th>
              <th class="<?=tax_disable_class()?>"><?= $this->lang->line('tax'); ?></th>
              <th class="<?=tax_disable_class()?>"><?= $this->lang->line('tax_amount'); ?></th>
              
              <th><?= $this->lang->line('unit_cost'); ?></th>
              <th><?= $this->lang->line('total'); ?></th>
            </tr>
            </thead>
            <tbody>

              <?php
              $i=0;
              $tot_qty=0;
              $tot_purchase_price=0;
              $tot_tax_amt=0;
              $tot_discount_amt=0;
              $tot_unit_total_cost=0;
              $tot_total_cost=0;

              $this->db->select("a.return_qty,
                                 a.tax_type,
                                 a.price_per_unit,
                                 a.tax_amt,
                                 a.discount_input,
                                 a.discount_type,
                                 a.discount_amt, 
                                 a.unit_total_cost,
                                 a.total_cost,
                                 b.tax,
                                 b.tax_name,
                                 c.item_name,
                                 a.description
                                 ");
              $this->db->from("db_purchaseitemsreturn a");
              $this->db->where("a.return_id",$return_id);
              $this->db->join("db_tax b","b.id=a.tax_id","left");
              $this->db->join("db_items c","c.id=a.item_id","left");
              $q2 = $this->db->get();

              foreach ($q2->result() as $res2) {

                  echo "<tr>";  
                  echo "<td>".++$i."</td>";
                  echo "<td>";
                    echo $res2->item_name;
                    echo (!empty($res2->description)) ? "<br><i>[".nl2br($res2->description)."]</i>" : '';
                  echo "</td>";
                  echo "<td>".$CI->currency($res2->price_per_unit)."</td>";
                  echo "<td>";
                    echo $res2->discount_input;
                      if(!empty($res2->discount_input) && $res2->discount_input>0){
                        echo (strtoupper($res2->discount_type)==strtoupper('Percentage')) ? "<br><b>(%)</b>" : "<br><b>(Fixed)</b>";
                      }
                  echo "</td>";
                  echo "<td class='text-right'>".$CI->currency($res2->discount_amt)."</td>";
                  echo "<td>".$res2->return_qty."</td>";

                  echo "<td class='".tax_disable_class()."'>";
                    echo $res2->tax_name;
                      echo ($res2->tax_type=='Inclusive')? '<br><b>Inclusive</b>' : '<br><b>Exclusive</b>';
                    echo "</td>";
                  echo "<td class='text-right ".tax_disable_class()."'>".$CI->currency($res2->tax_amt)."</td>";
                  
                  echo "<td class='text-right'>".$CI->currency($res2->unit_total_cost)."</td>";
                  echo "<td class='text-right'>".$CI->currency($res2->total_cost)."</td>";
                  echo "</tr>";  

                  $tot_qty +=$res2->return_qty;
                  $tot_purchase_price +=$res2->price_per_unit;
                  $tot_tax_amt +=$res2->tax_amt;
                  $tot_discount_amt +=$res2->discount_amt;
                  $tot_unit_total_cost +=$res2->unit_total_cost;
                  $tot_total_cost +=$res2->total_cost;
              }
              ?>
         
      
            </tbody>
            <tfoot class="text-right text-bold bg-gray">
              <tr>
                <td colspan="4" class="text-center"><?= $this->lang->line('total'); ?></td>
                <td><?= $CI->currency(number_format($tot_discount_amt,0,'.','')) ;?></td>
                <td class="text-left"><?=number_format($tot_qty,0);?></td>
                <td class="<?=tax_disable_class()?>"></td>
                <td class="<?=tax_disable_class()?>"><?=$CI->currency($tot_tax_amt);?></td>
                
                <td><?= $CI->currency(number_format($tot_unit_total_cost,0,'.','')) ;?></td>
                <td><?= $CI->currency(number_format($tot_total_cost,0,'.','')) ;?></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    
      <div class="row">
       <div class="col-md-6">
           <div class="row">
              <div class="col-md-12">
                 <div class="form-group">
                    <label for="discount_to_all_input" class="col-sm-4 control-label" style="font-size: 17px;"><?= $this->lang->line('discount_on_all'); ?></label>    
                    <div class="col-sm-8">
                       <label class="control-label  " style="font-size: 17px;">: <?=$discount_to_all_input; ?> (<?= $discount_to_all_type ?>)</label>
                    </div>
                 </div>
              </div>
           </div>
          <div class="row">
              <div class="col-md-12">
                 <div class="form-group">
                    <label for="return_note" class="col-sm-4 control-label" style="font-size: 17px;"><?= $this->lang->line('note'); ?></label>    
                    <div class="col-sm-8">
                       <label class="control-label  " style="font-size: 17px;">: <?=$return_note;?></label>
                    </div>
                 </div>
              </div>
           </div> 
           <div class="row">
              <div class="col-md-12">
                 <div class="form-group">
                    <table class="table table-hover table-bordered" style="width:100%" id=""><h4 class="box-title text-info"><?= $this->lang->line('payments_information'); ?> : </h4>
                       <thead>
                          <tr class="bg-purple " >
                             <th>#</th>
                             <th><?= $this->lang->line('date'); ?></th>
                             <th><?= $this->lang->line('payment_type'); ?></th>
                             <th><?= $this->lang->line('payment_note'); ?></th>
                             <th><?= $this->lang->line('payment'); ?></th>
                          </tr>
                       </thead>
                       <tbody>
                          <?php 
                            if(isset($return_id)){
                              $q3 = $this->db->query("select * from db_purchasepaymentsreturn where return_id=$return_id");
                              if($q3->num_rows()>0){
                                $i=1;
                                $total_paid = 0;
                                foreach ($q3->result() as $res3) {
                                  echo "<tr class='text-center text-bold' id='payment_row_".$res3->id."'>";
                                  echo "<td>".$i++."</td>";
                                  echo "<td>".show_date($res3->payment_date)."</td>";
                                  echo "<td>".$res3->payment_type."</td>";
                                  echo "<td>".$res3->payment_note."</td>";
                                  echo "<td class='text-right'>".$CI->currency($res3->payment)."</td>";
                                  echo "</tr>";
                                  $total_paid +=$res3->payment;
                                }
                                echo "<tr class='text-right text-bold'><td colspan='4' >Total</td><td>".$CI->currency(number_format($total_paid,0,'.',''))."</td></tr>";
                              }
                              else{
                                echo "<tr><td colspan='5' class='text-center text-bold'>No Previous Payments Found!!</td></tr>";
                              }

                            }
                            else{
                              echo "<tr><td colspan='5' class='text-center text-bold'>Payments Pending!!</td></tr>";
                            }
                          ?>
                       </tbody>
                    </table>
                 </div>
              </div>
           </div>           
        </div>

        <div class="col-md-6">
           <div class="row">
              <div class="col-md-12">
                 <div class="form-group">
                     
                    <table  class="col-md-11">
                       <tr>
                          <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('subtotal'); ?></th>
                          <th class="text-right" style="padding-left:10%;font-size: 17px;">
                             <h4><b id="subtotal_amt" name="subtotal_amt"><?=$CI->currency($subtotal);?></b></h4>
                          </th>
                       </tr>
                       <tr>
                          <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('other_charges'); ?></th>
                          <th class="text-right" style="padding-left:10%;font-size: 17px;">
                             <h4><b id="other_charges_amt" name="other_charges_amt"><?=$CI->currency($other_charges_amt);?></b></h4>
                          </th>
                       </tr>
                       <tr>
                          <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('discount_on_all'); ?></th>
                          <th class="text-right" style="padding-left:10%;font-size: 17px;">
                             <h4><b id="discount_to_all_amt" name="discount_to_all_amt"><?=$CI->currency($tot_discount_to_all_amt);?></b></h4>
                          </th>
                       </tr>
                       <tr>
                          <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('round_off'); ?></th>
                          <th class="text-right" style="padding-left:10%;font-size: 17px;">
                             <h4><b id="round_off_amt" name="tot_round_off_amt"><?=$CI->currency($round_off);?></b></h4>
                          </th>
                       </tr>
                       <tr>
                          <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('grand_total'); ?></th>
                          <th class="text-right" style="padding-left:10%;font-size: 17px;">
                             <h4><b id="total_amt" name="total_amt"><?=$CI->currency($grand_total);?></b></h4>
                          </th>
                       </tr>
                    </table>
                 </div>
              </div>
           </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </div><!-- printableArea -->
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <?php if($CI->permissions('sales_edit')) { ?>
          <a href="<?php echo $base_url; ?>purchase_return/edit/<?php echo  $return_id ?>" class="btn btn-success">
            <i class="fa  fa-edit"></i> Edit
          </a>
          <?php } ?>


          <a href="<?php echo $base_url; ?>purchase_return/print_invoice/<?php echo  $return_id ?>" target="_blank" class="btn btn-warning">
            <i class="fa fa-print"></i> 
          Print
        </a>


        <a href="<?php echo $base_url; ?>purchase_return/pdf/<?php echo  $return_id ?>" target="_blank" class="btn btn-primary">
            <i class="fa fa-file-pdf-o"></i> 
          PDF
        </a>
        
       
          
          
        </div>
      </div>

    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  <?php include"footer.php"; ?>

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- SOUND CODE -->
<?php include"comman/code_js_sound.php"; ?>
<!-- TABLES CODE -->
<?php include"comman/code_js_form.php"; ?>

<!-- Make sidebar menu hughlighter/selector -->
<script>$(".purchase-returns-list-active-li").addClass("active");</script>
</body>
</html>
