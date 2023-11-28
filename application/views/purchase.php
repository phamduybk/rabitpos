<!DOCTYPE html>
<html>

<head>
<!-- TABLES CSS CODE -->
<?php include"comman/code_css_form.php"; ?>
<!-- </copy> -->  
<style type="text/css">
   table.table-bordered > thead > tr > th {
   /* border:1px solid black;*/
   text-align: center;
   }
   .table > tbody > tr > td, 
   .table > tbody > tr > th, 
   .table > tfoot > tr > td, 
   .table > tfoot > tr > th, 
   .table > thead > tr > td, 
   .table > thead > tr > th 
   {
   padding-left: 2px;
   padding-right: 2px;  

   }
</style>
</head>



<body class="hold-transition skin-blue sidebar-mini">
  
<div class="wrapper">
 
 
 <?php include"sidebar.php"; ?>
 
 <?php
    if(!isset($purchase_id)){
      $supplier_id  = $pur_date = $purchase_status = $warehouse_id =
      $reference_no  =
      $other_charges_input          = $other_charges_tax_id =
      $discount_input = $discount_type  = $purchase_note='';
      $pur_date=show_date(date("d-m-Y"));
    }
    else{
      $q2 = $this->db->query("select * from db_purchase where id=$purchase_id");
      $supplier_id=$q2->row()->supplier_id;
      $pur_date=show_date($q2->row()->purchase_date);
      $purchase_status=$q2->row()->purchase_status;
      $warehouse_id=$q2->row()->warehouse_id;
      $reference_no=$q2->row()->reference_no;
      $discount_input=$q2->row()->discount_to_all_input;
      $discount_type=$q2->row()->discount_to_all_type;
      $other_charges_input=$q2->row()->other_charges_input;
      $other_charges_tax_id=$q2->row()->other_charges_tax_id;
      $purchase_note=$q2->row()->purchase_note;

      $items_count = $this->db->query("select count(*) as items_count from db_purchaseitems where purchase_id=$purchase_id")->row()->items_count;
    }
    
    ?>

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- **********************MODALS***************** -->
    <?php include"modals/modal_supplier.php"; ?>
    <?php include"modals/modal_purchase_item.php"; ?>
    <!-- **********************MODALS END***************** -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <h1>
            <?=$page_title;?>
            <small>Add/Update Purchase</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo $base_url; ?>purchase"><?= $this->lang->line('purchase_list'); ?></a></li>
            <li><a href="<?php echo $base_url; ?>purchase/add"><?= $this->lang->line('new_purchase'); ?></a></li>
            <li class="active"><?=$page_title;?></li>
         </ol>
      </section>

    <!-- Main content -->
     <section class="content">
               <div class="row">
                <!-- ********** ALERT MESSAGE START******* -->
               <?php include"comman/code_flashdata.php"; ?>
               <!-- ********** ALERT MESSAGE END******* -->
                  <!-- right column -->
                  <div class="col-md-12">
                     <!-- Horizontal Form -->
                     <div class="box box-info " >
                        <!-- style="background: #68deac;" -->
                        
                        <!-- form start -->
                         <!-- OK START -->
                        <?= form_open('#', array('class' => 'form-horizontal', 'id' => 'purchase-form', 'enctype'=>'multipart/form-data', 'method'=>'POST'));?>
                           <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                           <input type="hidden" value='1' id="hidden_rowcount" name="hidden_rowcount">
                           <input type="hidden" value='0' id="hidden_update_rowid" name="hidden_update_rowid">

                          
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="supplier_id" class="col-sm-2 control-label"><?= $this->lang->line('supplier_name'); ?><label class="text-danger">*</label></label>
                                 <div class="col-sm-3">
                                    <div class="input-group">
                                       <select class="form-control select2" id="supplier_id" name="supplier_id"  style="width: 100%;">
                                       </select>
                                       <span class="input-group-addon pointer" data-toggle="modal" data-target="#supplier-modal" title="New Supplier?"><i class="fa fa-user-plus text-primary fa-lg"></i></span>
                                    </div>
                                    <span id="supplier_id_msg" style="display:none" class="text-danger"></span>
                                 </div>
                                 <label for="pur_date" class="col-sm-2 control-label"><?= $this->lang->line('purchase_date'); ?> <label class="text-danger">*</label></label>
                                 <div class="col-sm-3">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                       </div>
                                       <input type="text" class="form-control pull-right datepicker"  id="pur_date" name="pur_date" readonly onkeyup="shift_cursor(event,'purchase_status')" value="<?= $pur_date;?>">
                                    </div>
                                    <span id="pur_date_msg" style="display:none" class="text-danger"></span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="purchase_status" class="col-sm-2 control-label"><?= $this->lang->line('status'); ?> <label class="text-danger">*</label></label>
                                 <div class="col-sm-3">
                                       <select class="form-control select2" id="purchase_status" name="purchase_status"  style="width: 100%;" onkeyup="shift_cursor(event,'mobile')">
                                         	<!-- <option value="">-Select-</option> -->
                                          <?php 
                                               $received_select = ($purchase_status=='Received') ? 'selected' : ''; 
                                               $pending_select = ($purchase_status=='Pending') ? 'selected' : ''; 
                                               $ordered_select = ($purchase_status=='Ordered') ? 'selected' : ''; 
                                          ?>
              							                <option <?= $received_select; ?> value="Received">Received</option>
              							                <option <?= $pending_select; ?> value="Pending">Pending</option>
              							                <option <?= $ordered_select; ?> value="Ordered">Ordered</option>
                                       </select>
                                    <span id="purchase_status_msg" style="display:none" class="text-danger"></span>
                                 </div>
                                  <label for="reference_no" class="col-sm-2 control-label"><?= $this->lang->line('reference_no'); ?> </label>
                                 <div class="col-sm-3">
                                    <input type="text" value="<?php echo  $reference_no; ?>" class="form-control " id="reference_no" name="reference_no" placeholder="" >
                  <span id="reference_no_msg" style="display:none" class="text-danger"></span>
                                 </div>
                                 
                              </div>
                              <!-- <div class="form-group">
                                <label for="warehouse_id" class="col-sm-2 control-label"><?= $this->lang->line('warehouse'); ?> <label class="text-danger">*</label></label>
                                 <div class="col-sm-3">
                                       <select class="form-control select2" id="warehouse_id" name="warehouse_id"  style="width: 100%;" onkeyup="shift_cursor(event,'mobile')">
                                          <?php
                                             
                                             $query1="select * from db_warehouse where status=1";
                                             $q1=$this->db->query($query1);
                                             if($q1->num_rows($q1)>0)
                                                { 
                                                  //echo "<option value=''>-Select-</option>";
                                                  foreach($q1->result() as $res1)
                                                {
                                                  $selected=($warehouse_id==$res1->id) ? 'selected' : '';
                                                  echo "<option $selected  value='".$res1->id."'>".$res1->warehouse_name ."</option>";
                                                }
                                              }
                                              else
                                              {
                                                 ?>
                                          <option value="">No Records Found</option>
                                          <?php
                                             }
                                             ?>
                                       </select>
                                    <span id="warehouse_id_msg" style="display:none" class="text-danger"></span>
                                 </div>
                              </div> -->
                           </div>
                           <!-- /.box-body -->
                           
                           <div class="row">
                              <div class="col-md-12">
                                <div class="col-md-12">
                                  <div class="box">
                                    <div class="box-info">
                                      <div class="box-header">
                                        <div class="col-md-8 col-md-offset-2 d-flex justify-content" >
                                          <div class="input-group">
                                                <span class="input-group-addon" title="Select Items"><i class="fa fa-barcode"></i></span>
                                                 <input type="text" class="form-control " placeholder="Item name/Barcode/Itemcode" id="item_search">
                                              </div>
                                        </div>
                                      </div>
                                      <div class="box-body">
                                        <div class="table-responsive" style="width: 100%">
                                        <table class="table table-hover table-bordered" style="width:100%" id="purchase_table">
                                             <thead class="custom_thead">
                                                <tr class="bg-primary" >
                                                   <th rowspan='2' style="width:15%"><?= $this->lang->line('item_name'); ?></th>
                                                   <th rowspan='2' style="width:15%;min-width: 180px;"><?= $this->lang->line('quantity'); ?></th>
                                                   <th rowspan='2' style="width:15%"><?= $this->lang->line('purchase_price'); ?>(<?=$CURRENCY;?>)</th>
                                                   <th rowspan='2' style="width:5%"><?= $this->lang->line('discount'); ?>(<?=$CURRENCY;?>)</th>
                                                   <th rowspan='2' class="<?=tax_disable_class()?>" style="width:7.5%"><?= $this->lang->line('tax'); ?> %</th>
                                                   <th rowspan='2' class="<?=tax_disable_class()?>" style="width:7.5%"><?= $this->lang->line('tax_amount'); ?>(<?=$CURRENCY;?>)</th>
                                                   
                                                   <th rowspan='2' style="width:7.5%"><?= $this->lang->line('unit_cost'); ?>(<?=$CURRENCY;?>)</th>
                                                   <th rowspan='2' style="width:7.5%"><?= $this->lang->line('total_amount'); ?>(<?=$CURRENCY;?>)</th>
                                                   <!-- <th rowspan='2' style="width:7.5%"><?= $this->lang->line('profit_margin'); ?>(%)</th>
                                                   <th rowspan='2' style="width:7.5%"><?= $this->lang->line('unit_sales_price'); ?>(<?=$CURRENCY;?>)</th> -->
                                                   <th rowspan='2' style="width:7.5%"><?= $this->lang->line('action'); ?></th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                               
                                             </tbody>
                                          </table>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                  

                                </div>
                              </div>
                              
                              
                              <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="" class="col-sm-4 control-label"><?= $this->lang->line('total_quantities'); ?></label>    
                                          <div class="col-sm-4">
                                             <label class="control-label total_quantity text-success" style="font-size: 15pt;">0</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="other_charges_input" class="col-sm-4 control-label"><?= $this->lang->line('other_charges'); ?></label>    
                                          <div class="col-sm-4">
                                             <input type="text" class="form-control text-right only_currency" id="other_charges_input" name="other_charges_input" onkeyup="final_total();" value="<?php echo  $other_charges_input; ?>">
                                          </div>
                                          <div class="col-sm-4">
                                             <select class="form-control " id="other_charges_tax_id" name="other_charges_tax_id" onchange="final_total();" style="width: 100%;">
                                                <?php
                                                   $q1="select * from db_tax where status=1";
                                                   $q1=$this->db->query($q1);
                                                    if($q1->num_rows()>0)
                                                    {
                                                     echo "<option>None</option>";
                                                     foreach($q1->result() as $res1)
                                                      {
                                                        $selected=($other_charges_tax_id==$res1->id) ? 'selected' : '';
                                                        echo "<option $selected data-tax='".$res1->tax."' value='".$res1->id."'>".$res1->tax_name."</option>";
                                                      }
                                                    }
                                                    else
                                                    {
                                                       ?>
                                                <option value="">No Records Found</option>
                                                <?php
                                                   }
                                                   ?>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="discount_to_all_input" class="col-sm-4 control-label"><?= $this->lang->line('discount_on_all'); ?></label>    
                                          <div class="col-sm-4">
                                             <input type="text" class="form-control  text-right only_currency" id="discount_to_all_input" name="discount_to_all_input" onkeyup="enable_or_disable_item_discount();" value="<?php echo  $discount_input; ?>">
                                          </div>
                                          <div class="col-sm-4">
                                             <select class="form-control" onchange="final_total();" id='discount_to_all_type' name="discount_to_all_type">
                                                <option value='in_percentage'>Per%</option>
                                                <option value='in_fixed'>Fixed</option>
                                             </select>
                                          </div>
                                          <!-- Dynamicaly select Supplier name -->
                                          <script type="text/javascript">
                                             <?php if($discount_type!=''){ ?>
                                                 document.getElementById('discount_to_all_type').value='<?php echo  $discount_type; ?>';
                                             <?php }?>
                                          </script>
                                          <!-- Dynamicaly select Supplier name end-->
                                       </div>
                                    </div>
                                 </div>
                                <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="purchase_note" class="col-sm-4 control-label"><?= $this->lang->line('note'); ?></label>    
                                          <div class="col-sm-8">
                                             <textarea class="form-control text-left" id='purchase_note' name="purchase_note"><?=$purchase_note;?></textarea>
                                            <span id="purchase_note_msg" style="display:none" class="text-danger"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 
                              </div>
                              

                              <div class="col-md-6">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                           
                                          <table  class="col-md-9">
                                             <tr>
                                                <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('subtotal'); ?></th>
                                                <th class="text-right" style="padding-left:10%;font-size: 17px;">
                                                   <h4>
                                                    <?= $CI->currency('<b id="subtotal_amt" name="subtotal_amt">0</b>'); ?>
                                                   </h4>
                                                </th>
                                             </tr>
                                             <tr>
                                                <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('other_charges'); ?></th>
                                                <th class="text-right" style="padding-left:10%;font-size: 17px;">
                                                   <h4>
                                                    <?= $CI->currency('<b id="other_charges_amt" name="other_charges_amt">0</b>'); ?>
                                                  </h4>
                                                </th>
                                             </tr>
                                             <tr>
                                                <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('discount_on_all'); ?></th>
                                                <th class="text-right" style="padding-left:10%;font-size: 17px;">
                                                   <h4>
                                                    <?= $CI->currency('<b id="discount_to_all_amt" name="discount_to_all_amt">0</b>'); ?></h4>
                                                </th>
                                             </tr>
                                             <tr style="<?= (!is_enabled_round_off()) ? 'display: none;' : '';?>">
                                                <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('round_off'); ?>
                                                  
                                                    <i class="hover-q " data-container="body" data-toggle="popover" data-placement="top" data-content="Go to Site Settings-> Site -> Disable the Round Off(Checkbox)." data-html="true" data-trigger="hover" data-original-title="" title="Do you wants to Disable Round Off ?">
                                                      <i class="fa fa-info-circle text-maroon text-black hover-q"></i>
                                                    </i>
                                                  
                                                </th>
                                                <th class="text-right" style="padding-left:10%;font-size: 17px;">
                                                   <h4>
                                                    <?= $CI->currency('<b id="round_off_amt" name="tot_round_off_amt">0</b>'); ?></h4>
                                                </th>
                                             </tr>
                                             <tr>
                                                <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('grand_total'); ?></th>
                                                <th class="text-right" style="padding-left:10%;font-size: 17px;">
                                                   <h4>
                                                    <?= $CI->currency('<b id="total_amt" name="total_amt">0</b>'); ?></h4>
                                                </th>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-xs-12 ">
                                 <div class="col-sm-12">
                                       <div class="box-body ">
                                        <div class="col-md-12">
                                          <table class="table table-hover table-bordered" style="width:100%" id="payments_table"><h4 class="box-title text-info"><?= $this->lang->line('previous_payments_information'); ?> : </h4>
                                             <thead>
                                                <tr class="bg-gray " >
                                                   <th>#</th>
                                                   <th><?= $this->lang->line('date'); ?></th>
                                                   <th><?= $this->lang->line('payment_type'); ?></th>
                                                   <th><?= $this->lang->line('payment_note'); ?></th>
                                                   <th><?= $this->lang->line('payment'); ?></th>
                                                   <th><?= $this->lang->line('action'); ?></th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php 
                                                  if(isset($purchase_id)){
                                                    $q3 = $this->db->query("select * from db_purchasepayments where purchase_id=$purchase_id");
                                                    if($q3->num_rows()>0){
                                                      $i=1;
                                                      $total_paid = 0;
                                                      foreach ($q3->result() as $res3) {
                                                        echo "<tr class='text-center text-bold' id='payment_row_".$res3->id."'>";
                                                        echo "<td>".$i."</td>";
                                                        echo "<td>".show_date($res3->payment_date)."</td>";
                                                        echo "<td>".$res3->payment_type."</td>";
                                                        echo "<td>".$res3->payment_note."</td>";
                                                        echo "<td class='text-right' id='paid_amt_$i'>".
                                                         $CI->currency($res3->payment)."</td>";
                                                        echo '<td><i class="fa fa-trash text-red pointer" onclick="delete_payment('.$res3->id.')"> Delete</i></td>';
                                                        echo "</tr>";
                                                        $total_paid +=$res3->payment;
                                                        $i++;
                                                      }
                                                      echo "<tr class='text-right text-bold'><td colspan='4' >Total</td><td data-rowcount='$i' id='paid_amt_tot'>".
                                                      $CI->currency(number_format($total_paid,0,'.',''))."</td><td></td></tr>";
                                                    }
                                                    else{
                                                      echo "<tr><td colspan='6' class='text-center text-bold'>No Previous Payments Found!!</td></tr>";
                                                    }

                                                  }
                                                  else{
                                                    echo "<tr><td colspan='6' class='text-center text-bold'>Payments Pending!!</td></tr>";
                                                  }
                                                ?>
                                             </tbody>
                                          </table>
                                        </div>
                                       </div>
                                       <!-- /.box-body -->
                                    </div>
                                 <!-- /.box -->
                              </div>

                              <div class="col-xs-12 ">
                                 <div class="col-sm-12">
                                       <div class="box-body ">

                                          <div class="col-md-12 payments_div payments_div_">
                                            <h4 class="box-title text-info"><?= $this->lang->line('make_payment'); ?> : </h4>
                                          <div class="box box-solid bg-gray">
                                            <div class="box-body">
                                              <div class="row">
                                         
                                                <div class="col-md-6">
                                                  <div class="">
                                                  <label for="amount"><?= $this->lang->line('amount'); ?></label>
                                                    <input type="text" class="form-control text-right paid_amt only_currency" id="amount" name="amount" placeholder="" >
                                                      <span id="amount_msg" style="display:none" class="text-danger"></span>
                                                </div>
                                               </div>
                                                <div class="col-md-6">
                                                  <div class="">
                                                    <label for="payment_type"><?= $this->lang->line('payment_type'); ?></label>
                                                    <select class="form-control select2" id='payment_type' name="payment_type">
                                                      <?php
                                                        $q1=$this->db->query("select * from db_paymenttypes where status=1");
                                                         if($q1->num_rows()>0){
                                                            echo "<option value=''>-Select-</option>";
                                                             foreach($q1->result() as $res1){
                                                             echo "<option value='".$res1->payment_type."'>".$res1->payment_type ."</option>";
                                                           }
                                                         }
                                                         else{
                                                            echo "<option>None</option>";
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
                                                    <label for="payment_note"><?= $this->lang->line('payment_note'); ?></label>
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
                                       <!-- /.box-body -->
                                    </div>
                                 <!-- /.box -->
                              </div>

                              

                           </div>
                           
                           <!-- /.box-body -->
                           <div class="box-footer col-sm-12">
                              <center>
                                <?php
                                if(isset($purchase_id)){
                                  $btn_id='update';
                                  $btn_name="Update";
                                  echo '<input type="hidden" name="purchase_id" id="purchase_id" value="'.$purchase_id.'"/>';
                                }
                                else{
                                  $btn_id='save';
                                  $btn_name="Save";
                                }

                                ?>
                                 <div class="col-md-3 col-md-offset-3">
                                    <button type="button" id="<?php echo $btn_id;?>" class="btn bg-maroon btn-block btn-flat btn-lg payments_modal" title="Save Data"><?php echo $btn_name;?></button>
                                 </div>
                                 <div class="col-sm-3"><a href="<?= base_url()?>dashboard">
                                    <button type="button" class="btn bg-gray btn-block btn-flat btn-lg" title="Go Dashboard">Close</button>
                                  </a>
                                </div>
                              </center>
                           </div>
                           

                           <?= form_close(); ?>
                           <!-- OK END -->
                     </div>
                  </div>
                  <!-- /.box-footer -->
                 
               </div>
               <!-- /.box -->
             </section>
            <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 <?php include"footer.php"; ?>
<!-- SOUND CODE -->
<?php include"comman/code_js_sound.php"; ?>
<!-- GENERAL CODE -->
<?php include"comman/code_js_form.php"; ?>

 <script src="<?php echo $theme_link; ?>js/modals.js"></script>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="<?php echo $theme_link; ?>js/purchase.js"></script>  

<script src="<?php echo $theme_link; ?>js/ajaxselect/supplier_select_ajax.js"></script>  

<script>

         //supplier Selection Box Search
         function getsupplierSelectionId() {
           return '#supplier_id';
         }

         $(document).ready(function () {

            var supplier_id = "<?= (!empty($supplier_id)) ? $supplier_id : '';  ?>";

            if(supplier_id!=''){
               autoLoadFirstsupplier(supplier_id);
            }

         });
         //supplier Selection Box Search - END


         $(".close_btn").on("click",function(){
           if(confirm('Are you sure you want to navigate away from this page?')){
               window.location='<?php echo $base_url; ?>dashboard';
             }
         });
         //Initialize Select2 Elements
             $(".select2").select2();
         //Date picker
             $('.datepicker').datepicker({
               autoclose: true,
            format: 'dd-mm-yyyy',
              todayHighlight: true
             });
          
       
         
         /* ---------- CALCULATE TAX -------------*/
         function calculate_tax(i){ //i=Row
           set_tax_value(i);

           //Find the Tax type and Tax amount
           var tax_type = $("#tr_tax_type_"+i).val();
           var tax_amount = $("#td_data_"+i+"_5").val();
           

           var qty=$("#td_data_"+i+"_3").val().trim();
           var purchase_price=parseFloat($("#td_data_"+i+"_4").val().trim());

           var discount_amt=$("#td_data_"+i+"_8").val().trim();
               discount_amt   =(isNaN(parseFloat(discount_amt)))    ? 0 : parseFloat(discount_amt);

           var tax=$("#tr_tax_value_"+i).val().trim();

           

           var amt=parseFloat(qty) * purchase_price;//Taxable
           
           var total_amt=amt-discount_amt;

           total_amt = (tax_type=='Inclusive') ? total_amt : parseFloat(total_amt) + parseFloat(tax_amount);

           //CAlculate Item wise price and tax and discount
           var tax_each = (tax_type=='Inclusive') ? 0 : calculate_exclusive((purchase_price-discount_amt/parseFloat(qty)),tax);
           
           console.log("discount="+(purchase_price-discount_amt/parseFloat(qty)));
           console.log("tax_each="+tax_each);
           var price_per_unit = (purchase_price - (discount_amt/parseFloat(qty)))+(parseFloat(tax_each));

           $("#td_data_"+i+"_10").val('').val(price_per_unit.toFixed(0));

           $("#td_data_"+i+"_9").val('').val(total_amt.toFixed(0));
           final_total();
         }
        
         /* ---------- CALCULATE GST END -------------*/

        
         /* ---------- Final Description of amount ------------*/
         function final_total(){
           

           var rowcount=$("#hidden_rowcount").val();
           var subtotal=parseFloat(0);
           
           var other_charges_per_amt=parseFloat(0);
           var other_charges_total_amt=0;
           var taxable=0;
          if($("#other_charges_input").val()!=null && $("#other_charges_input").val()!=''){
             
              other_charges_tax_id =$('option:selected', '#other_charges_tax_id').attr('data-tax');
             other_charges_input=$("#other_charges_input").val();
             if(other_charges_tax_id>0){

               other_charges_per_amt=(other_charges_tax_id * other_charges_input)/100;
             }
             
             taxable=parseFloat(other_charges_per_amt)+parseFloat(other_charges_input);//Other charges input
             other_charges_total_amt=parseFloat(other_charges_per_amt)+parseFloat(other_charges_input);
           }
           else{
             //$("#other_charges_amt").html('0');
           }
           
         
           var tax_amt=0;
           var actual_taxable=0;
           var total_quantity=0;
         
           for(i=1;i<=rowcount;i++){
         
             if(document.getElementById("td_data_"+i+"_3")){
               //supplier_id must exist
               if($("#td_data_"+i+"_3").val()!=null && $("#td_data_"+i+"_3").val()!=''){
                    actual_taxable=actual_taxable+ + +(parseFloat($("#td_data_"+i+"_13").val()).toFixed(0) * parseFloat($("#td_data_"+i+"_3").val()));
                    subtotal=subtotal+ + +parseFloat($("#td_data_"+i+"_9").val()).toFixed(0);
                    if($("#td_data_"+i+"_7").val()>=0){
                      tax_amt=tax_amt+ + +$("#td_data_"+i+"_7").val();
                    }   
                    total_quantity +=parseFloat($("#td_data_"+i+"_3").val().trim());
                }
                   
             }//if end
           }//for end
           
          
          //Show total Purchase Quantitys
           $(".total_quantity").html(total_quantity);

           //Apply Output on screen
           //subtotal
           if((subtotal!=null || subtotal!='') && (subtotal!=0)){
             
             //subtotal
             $("#subtotal_amt").html(subtotal.toFixed(0));
             
             //other charges total amount
             $("#other_charges_amt").html(parseFloat(other_charges_total_amt).toFixed(0));
             
             //other charges total amount
            

             taxable=taxable+subtotal;
             
             //discount_to_all_amt
            // if($("#discount_to_all_input").val()!=null && $("#discount_to_all_input").val()!=''){
                 var discount_input=parseFloat($("#discount_to_all_input").val());
                 discount_input = isNaN(discount_input) ? 0 : discount_input;
                 var discount=0;
                 if(discount_input>0){
                     var discount_type=$("#discount_to_all_type").val();
                     if(discount_type=='in_fixed'){
                       taxable-=discount_input;
                       discount=discount_input;
                       //Minus
                     }
                     else if(discount_type=='in_percentage'){
                         discount=(taxable*discount_input)/100;
                        taxable-=discount;
             
                     }
                 }
                 else{
                    //discount += $("#")
                 }
                   discount=parseFloat(discount).toFixed(0);
                   
                    $("#discount_to_all_amt").html(discount);  
                    $("#hidden_discount_to_all_amt").val(discount);  
             //}
             //subtotal_round=Math.round(taxable);
             subtotal_round=round_off(taxable);//round_off() method custom defined
             subtotal_diff=subtotal_round-taxable;
         
             $("#round_off_amt").html(parseFloat(subtotal_diff).toFixed(0)); 
             $("#total_amt").html(parseFloat(subtotal_round).toFixed(0)); 
             $("#hidden_total_amt").val(parseFloat(subtotal_round).toFixed(0)); 
           }
           else{
             $("#subtotal_amt").html('0'); 
             
             $("#tax_amt").html('0'); 
           }
           
          // adjust_payments();
          //alert("final_total() end");
         }
         /* ---------- Final Description of amount end ------------*/
          
         function removerow(id){//id=Rowid
           
         $("#row_"+id).remove();
         final_total();
         failed.currentTime = 0;
        failed.play();
         }
               
     

    function enable_or_disable_item_discount(){
      /*var discount_input=parseFloat($("#discount_to_all_input").val());
      discount_input = isNaN(discount_input) ? 0 : discount_input;
      if(discount_input>0){
        $(".item_discount").attr({
          'readonly': true,
          'style': 'border-color:red;cursor:no-drop',
        });
      }
      else{
        $(".item_discount").attr({
          'readonly': false,
          'style': '',
        });
      }*/

      var rowcount=$("#hidden_rowcount").val();
      for(k=1;k<=rowcount;k++){
       if(document.getElementById("tr_item_id_"+k)){
       
         calculate_tax(k);
       }//if end
     }//for end

      //final_total();
    }


    //Purchase Items Modal Operations Start
    function show_purchase_item_modal(row_id){
      $('#purchase_item').modal('toggle');
      $("#popup_tax_id").select2();

      //Find the item details
      var item_name = $("#td_data_"+row_id+"_1").html();
      var tax_type = $("#tr_tax_type_"+row_id).val();
      var tax_id = $("#tr_tax_id_"+row_id).val();

      var description = $("#description_"+row_id).val();

      /*Discount*/
      var item_discount_input = $("#item_discount_input_"+row_id).val();
      var item_discount_type = $("#item_discount_type_"+row_id).val();

      //Set to Popup
      $("#item_discount_input").val(item_discount_input);
      $("#item_discount_type").val(item_discount_type).select2();
      $("#popup_description").val(description);
      $("#popup_item_name").html(item_name);
      $("#popup_tax_type").val(tax_type).select2();
      $("#popup_tax_id").val(tax_id).select2();
      $("#popup_row_id").val(row_id);
    }

    function set_info(){
      var row_id = $("#popup_row_id").val();
      var tax_type = $("#popup_tax_type").val();
      var tax_id = $("#popup_tax_id").val();
      var tax_name = ($('option:selected', "#popup_tax_id").attr('data-tax-value'));
      var tax = parseFloat($('option:selected', "#popup_tax_id").attr('data-tax'));
      var description = $("#popup_description").val();

      /*Discounr*/
      var item_discount_input = $("#item_discount_input").val();
      var item_discount_type = $("#item_discount_type").val();

      //Set it into row 
      $("#item_discount_input_"+row_id).val(item_discount_input);
      $("#item_discount_type_"+row_id).val(item_discount_type);
      $("#tr_tax_type_"+row_id).val(tax_type);
      $("#tr_tax_id_"+row_id).val(tax_id);
      $("#tr_tax_value_"+row_id).val(tax);//%
      $("#td_data_"+row_id+"_15").html(tax_name);
      $("#description_"+row_id).val(description);

      calculate_tax(row_id);
      $('#purchase_item').modal('toggle');
    }
    function set_tax_value(row_id){
      //get the purchase price of the item
      var tax_type = $("#tr_tax_type_"+row_id).val();
      var tax = $("#tr_tax_value_"+row_id).val(); //%
      var qty=$("#td_data_"+row_id+"_3").val().trim();
          qty = (isNaN(qty)) ? 0 :qty;
      var purchase_price = parseFloat($("#td_data_"+row_id+"_4").val());
          purchase_price = (isNaN(purchase_price)) ? 0 :purchase_price;
          purchase_price = purchase_price * qty;

      /*Discount*/
      var item_discount_type = $("#item_discount_type_"+row_id).val();
      var item_discount_input = parseFloat($("#item_discount_input_"+row_id).val());
          item_discount_input = (isNaN(item_discount_input)) ? 0 :item_discount_input;
      //Calculate discount      
      var discount_amt=(item_discount_type=='Percentage') ? ((purchase_price) * item_discount_input)/100 : (item_discount_input * qty);
      purchase_price-=parseFloat(discount_amt);
          
      var tax_amount = (tax_type=='Inclusive') ? calculate_inclusive(purchase_price,tax) : calculate_exclusive(purchase_price,tax);
      
      $("#td_data_"+row_id+"_8").val(discount_amt);

      $("#td_data_"+row_id+"_5").val(tax_amount);
    }
    //Purchase Items Modal Operations End
</script>
      <!-- UPDATE OPERATIONS -->
      <script type="text/javascript">
         <?php if(isset($purchase_id)){ ?> 
             $(document).ready(function(){
                var base_url='<?= base_url();?>';
                var purchase_id='<?= $purchase_id;?>';
                $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
                $.post(base_url+"purchase/return_purchase_list/"+purchase_id,{},function(result){
                  //alert(result);
                  $('#purchase_table tbody').append(result);
                  $("#hidden_rowcount").val(parseFloat(<?=$items_count;?>)+1);
                  success.currentTime = 0;
                  success.play();
                  enable_or_disable_item_discount();
                  $(".overlay").remove();
              }); 
             });
         <?php }?>
      </script>
      <!-- UPDATE OPERATIONS end-->

      <!-- Make sidebar menu hughlighter/selector -->
      <script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
</body>
</html>
