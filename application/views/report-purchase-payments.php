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
                  <?=$page_title;?>
                  <small></small>
               </h1>
               <ol class="breadcrumb">
                  <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active"><?=$page_title;?></li>
               </ol>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- right column -->
                  <div class="col-md-12">
                     <!-- Horizontal Form -->
                     <div class="box box-info ">
                        <div class="box-header with-border">
                           <h3 class="box-title">Please Enter Valid Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id="report-form" onkeypress="return event.keyCode != 13;">
                           <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                           <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="from_date" class="col-sm-2 control-label"><?= $this->lang->line('from_date'); ?></label>
                                 <div class="col-sm-3">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                       </div>
                                       <input type="text" class="form-control pull-right datepicker" id="from_date" name="from_date" value="<?php echo show_date(date('d-m-Y'));?>" >
                                    </div>
                                    <span id="Sales_date_msg" style="display:none" class="text-danger"></span>
                                 </div>
                                 <label for="to_date" class="col-sm-2 control-label"><?= $this->lang->line('to_date'); ?></label>
                                 <div class="col-sm-3">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                       </div>
                                       <input type="text" class="form-control pull-right datepicker" id="to_date" name="to_date" value="<?php echo show_date(date('d-m-Y'))?>" >
                                    </div>
                                    <span id="Sales_date_msg" style="display:none" class="text-danger"></span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="supplier_id" class="col-sm-2 control-label"><?= $this->lang->line('supplier_name'); ?></label>
                                 <div class="col-sm-3">
                                    <select class="form-control select2 " id="supplier_id" name="supplier_id"  style="width: 100%;">
                                    </select>
                                    <span id="supplier_id_msg" style="display:none" class="text-danger"></span>
                                 </div>
                                 <label for="payment_type" class="col-sm-2 control-label"><?= $this->lang->line('payment_type'); ?></label>
                                 <div class="col-sm-3">
                                    <select class="form-control select2 " id="payment_type" name="payment_type"  style="width: 100%;">
                                       <option value="">-All-</option>
                                       <?php
                                          $q1=$this->db->query("select * from db_paymenttypes");
                                          if($q1->num_rows()>0)
                                           {
                                               foreach($q1->result() as $res1)
                                             {
                                               echo "<option value='".$res1->payment_type."'>".$res1->payment_type."</option>";
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
                                    <span id="payment_type_msg" style="display:none" class="text-danger"></span>
                                 </div>
                              </div>
                           </div>
                           <!-- /.box-body -->
                           <div class="box-footer">
                              <div class="col-sm-8 col-sm-offset-2 text-center">
                                 <div class="col-md-3 col-md-offset-3">
                                    <button type="button" id="view" class=" btn btn-block btn-success" title="Save Data">Show</button>
                                 </div>
                                 <div class="col-sm-3">
                                    <a href="<?=base_url('dashboard');?>">
                                    <button type="button" class="col-sm-3 btn btn-block btn-warning close_btn" title="Go Dashboard">Close</button>
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <!-- /.box-footer -->
                        </form>
                     </div>
                     <!-- /.box -->
                  </div>
                  <!--/.col (right) -->
               </div>
               <!-- /.row -->
            </section>
            <!-- /.content -->
            <section class="content">
               <div class="row">
                  <!-- right column -->
                  <div class="col-md-12">
                     <!-- Custom Tabs -->
                     <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#tab_1" data-toggle="tab"><?= $this->lang->line('purchase_payments'); ?></a></li>
                           <li><a href="#tab_2" data-toggle="tab"><?= $this->lang->line('supplier_payments'); ?></a></li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane active" id="tab_1">
                              <div class="row">
                                 <!-- right column -->
                                 <div class="col-md-12">
                                    <!-- form start -->
                                    <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                                    <?php $this->load->view('components/export_btn',array('tableId' => 'report-data-1'));?>
                                    <br><br>
                                    <div class="table-responsive">
                                       <table class="table table-bordered table-hover purchase_payments" id="report-data-1" >
                                          <thead>
                                             <tr  class="bg-blue">
                                                <th style="">#</th>
                                                <th style=""><?= $this->lang->line('purchase'); ?> <br><?= $this->lang->line('invoice_no'); ?></th>
                                                <th style=""><?= $this->lang->line('payment_date'); ?></th>
                                                <th style=""><?= $this->lang->line('supplier_id'); ?></th>
                                                <th style=""><?= $this->lang->line('supplier_name'); ?></th>
                                                <th style=""><?= $this->lang->line('payment_type'); ?></th>
                                                <th style=""><?= $this->lang->line('payment_note'); ?></th>
                                                <th style=""><?= $this->lang->line('paid_amount'); ?>(<?= $CI->currency(); ?>)</th>
                                             </tr>
                                          </thead>
                                          <tbody id="tbodyid">
                                          </tbody>
                                       </table>
                                    </div>
                                    <!-- /.box-body -->
                                 </div>
                                 <!--/.col (right) -->
                              </div>
                              <!-- /.row -->
                           </div>
                           <!-- /.tab-pane -->
                           <div class="tab-pane" id="tab_2">
                              <div class="row">
                                 <!-- right column -->
                                 <div class="col-md-12">
                                    <!-- form start -->
                                    <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                                    <?php $this->load->view('components/export_btn',array('tableId' => 'report-data-2'));?>
                                    <br><br>
                                    <div class="table-responsive">
                                       <table class="table table-bordered table-hover supplier_payments" id="report-data-2" >
                                          <thead>
                                             <tr  class="bg-blue">
                                                <th style="">#</th>
                                                <th style=""><?= $this->lang->line('payment_date'); ?></th>
                                                <th style=""><?= $this->lang->line('supplier_name'); ?></th>
                                                <th style=""><?= $this->lang->line('payment_type'); ?></th>
                                                <th style=""><?= $this->lang->line('payment_note'); ?></th>
                                                <th style=""><?= $this->lang->line('paid_amount'); ?>(<?= $CI->currency(); ?>)</th>
                                             </tr>
                                          </thead>
                                          <tbody id="">
                                          </tbody>
                                       </table>
                                    </div>
                                    <!-- /.box-body -->
                                 </div>
                                 <!--/.col (right) -->
                              </div>
                              <!-- /.row -->
                           </div>
                           <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                     </div>
                     <!-- nav-tabs-custom -->
                  </div>
               </div>
            </section>
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
      <!-- TABLE EXPORT CODE -->
      <?php include"comman/code_js_export.php"; ?>

      <script src="<?php echo $theme_link; ?>js/ajaxselect/supplier_select_ajax.js"></script>  
      <script type="text/javascript">
         //supplier Selection Box Search
         function getsupplierSelectionId() {
           return '#supplier_id';
         }
         //supplier Selection Box Search - END
      </script>
      
      <script type="text/javascript">
         $("#view").on("click",function(){
         
         
           var from_date=document.getElementById("from_date").value.trim();
           var to_date=document.getElementById("to_date").value.trim();
           var supplier_id=document.getElementById("supplier_id").value.trim();
           var payment_type=document.getElementById("payment_type").value.trim();
         
         if(from_date == "")
             {
                 toastr["warning"]("Select From Date!");
                 document.getElementById("from_date").focus();
                 return;
             }
          
          if(to_date == "")
             {
                 toastr["warning"]("Select To Date!");
                 document.getElementById("to_date").focus();
                 return;
             }
         
           
               $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
               $.post("show_purchase_payments_report",{payment_type:payment_type,supplier_id:supplier_id,from_date:from_date,to_date:to_date},function(result){
                 //alert(result);
                   setTimeout(function() {
                    $(".purchase_payments tbody").empty().append(result);     
                    $(".overlay").remove();
                   }, 0);
                  }); 
         
               $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
               $.post("supplier_payments_report",{payment_type:payment_type,supplier_id:supplier_id,from_date:from_date,to_date:to_date},function(result){
                 //alert(result);
                   setTimeout(function() {
                    $(".supplier_payments tbody").empty().append(result);     
                    $(".overlay").remove();
                   }, 0);
                  }); 
             
         
         });
         
         
      </script>
      <!-- Make sidebar menu hughlighter/selector -->
      <script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
   </body>
</html>
