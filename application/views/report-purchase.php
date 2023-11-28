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
                  <li><a href="<?php echo $base_url; ?>purchase"><?= $this->lang->line('purchase_list'); ?></a></li>
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
                                       <input type="text" class="form-control pull-right datepicker" id="from_date" name="from_date" onkeyup="shift_cursor(event,'to_date')" value="<?php echo show_date(date('d-m-Y'));?>">
                                    </div>
                                    <span id="sales_date_msg" style="display:none" class="text-danger"></span>
                                 </div>
                                 <label for="to_date" class="col-sm-2 control-label"><?= $this->lang->line('to_date'); ?></label>
                                 <div class="col-sm-3">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                       </div>
                                       <input type="text" class="form-control pull-right datepicker" id="to_date" name="to_date" onkeyup="shift_cursor(event,'category_name')" value="<?php echo show_date(date('d-m-Y'));?>">
                                    </div>
                                    <span id="sales_date_msg" style="display:none" class="text-danger"></span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="supplier_id" class="col-sm-2 control-label"><?= $this->lang->line('supplier_name'); ?></label>
                                 <div class="col-sm-3">
                                    <select class="form-control select2 " id="supplier_id" name="supplier_id"  style="width: 100%;">
                                    </select>
                                    <span id="supplier_id_msg" style="display:none" class="text-danger"></span>
                                 </div>

                                 <label for="payment_status" class="col-sm-2 control-label"><?= $this->lang->line('payment_status'); ?></label>
                                 <div class="col-sm-3">
                                    <select class="form-control select2 " id="payment_status" name="payment_status"  style="width: 100%;" onkeyup="shift_cursor(event,'category_name')">
                                       <option value="">-All-</option>
                                       <option value="Paid">Paid</option>
                                       <option value="Unpaid">Unpaid</option>
                                       <option value="Partial">Partial</option>
                                    </select>
                                    <span id="payment_status_msg" style="display:none" class="text-danger"></span>
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
                     <div class="box">
                        <div class="box-header">
                           <h3 class="box-title">Records Table</h3>
                           <?php $this->load->view('components/export_btn',array('tableId' => 'report-data'));?>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                           <table class="table table-bordered table-hover " id="report-data" >
                              <thead>
                                 <tr class="bg-blue">
                                    <th style="">#</th>
                                    <th style=""><?= $this->lang->line('invoice_no'); ?></th>
                                    <th style=""><?= $this->lang->line('purchase_date'); ?></th>
                                    <th style=""><?= $this->lang->line('supplier_id'); ?></th>
                                    <th style=""><?= $this->lang->line('supplier_name'); ?></th>
                                    <th style=""><?= $this->lang->line('invoice_total'); ?>(<?= $CI->currency(); ?>)</th>
                                    <th style=""><?= $this->lang->line('paid_amount'); ?>(<?= $CI->currency(); ?>)</th>
                                    <th style=""><?= $this->lang->line('due_amount'); ?>(<?= $CI->currency(); ?>)</th>
                                    <th style=""><?= $this->lang->line('due_days'); ?></th>
                                 </tr>
                              </thead>
                              <tbody id="tbodyid">
                              </tbody>
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
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

      
      <script src="<?php echo $theme_link; ?>js/report-purchase.js"></script>
      <script src="<?php echo $theme_link; ?>js/ajaxselect/supplier_select_ajax.js"></script>  
      <script type="text/javascript">
         //supplier Selection Box Search
         function getsupplierSelectionId() {
           return '#supplier_id';
         }
         //supplier Selection Box Search - END
      </script>
      <!-- Make sidebar menu hughlighter/selector -->
      <script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
   </body>
</html>
