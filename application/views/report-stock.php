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

    <!-- /.content -->
    <section class="content">
      <div class="row">
                    <div class="col-md-12">
                     <!-- Horizontal Form -->
                     <div class="box box-info ">
                        <div class="box-header with-border">
                           <h3 class="box-title">Please Enter Valid Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id="report-form" onkeypress="return event.keyCode != 13;">
                           <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                           <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">

                           <div class="box-body">
                              <div class="form-group">
                                 <label for="brand_id" class="col-sm-2 control-label"><?= $this->lang->line('brand'); ?></label>
                                 <div class="col-sm-3">
                                    <select class="form-control select2 " id="brand_id" name="brand_id"  style="width: 100%;">
                                       <option value="">-All-</option>
                                       <?php
                                          $q1=$this->db->query("select * from db_brands where status=1");
                                          if($q1->num_rows()>0)
                                                 {
                                                     foreach($q1->result() as $res1)
                                             {
                                               echo "<option value='".$res1->id."'>".$res1->brand_name."</option>";
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
                                    <span id="brand_id_msg" style="display:none" class="text-danger"></span>
                                 </div>

                                 <label for="category_id" class="col-sm-2 control-label"><?= $this->lang->line('category'); ?></label>
                                 <div class="col-sm-3">
                                    <select class="form-control select2 " id="category_id" name="category_id"  style="width: 100%;">
                                       <option value="">-All-</option>
                                       <?php
                                          $q1=$this->db->query("select * from db_category where status=1");
                                          if($q1->num_rows()>0)
                                                 {
                                                     foreach($q1->result() as $res1)
                                             {
                                               echo "<option value='".$res1->id."'>".$res1->category_name."</option>";
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
                                    <span id="category_id_msg" style="display:none" class="text-danger"></span>
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
                  <div class="col-md-12">

                     <!-- Custom Tabs -->
                     <div class="nav-tabs-custom">
                        
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#tab_1" data-toggle="tab"><?= $this->lang->line('item_wise'); ?></a></li>
                           <li><a href="#tab_2" data-toggle="tab"><?= $this->lang->line('brand_wise'); ?></a></li>
                           <li><a href="#tab_3" data-toggle="tab"><?= $this->lang->line('category_wise'); ?></a></li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane active" id="tab_1">
                              <div class="row">
                              <div class="row">
                                 <div class="col-md-8">
                                    <div class="form-group">
                                 <label for="item_id" class="col-sm-2 control-label text-right"><?= $this->lang->line('item_name'); ?></label>
                                 <div class="col-sm-6">
                                    <select class="form-control select2 " id="item_id" name="item_id"  style="width: 100%;">
                                    </select>
                                    <span id="item_id_msg" style="display:none" class="text-danger"></span>
                                 </div>

                                 
                              </div>
                                 </div>
                              </div>
                                 <!-- right column -->
                                 <div class="col-md-12">
                                    <!-- form start -->
                                       <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                                          <?php $this->load->view('components/export_btn',array('tableId' => 'report-data'));?>
                                          <br><br>
                                          <div class="table-responsive">
                                          <table class="table table-bordered table-hover " id="report-data" >
                                            <thead>
                                            <tr class="bg-blue">
                                              <th style="">#</th>
                                              <th style=""><?= $this->lang->line('item_code'); ?></th>
                                              <th style=""><?= $this->lang->line('item_name'); ?></th>
                                              <th style=""><?= $this->lang->line('brand'); ?></th>
                                              <th style=""><?= $this->lang->line('category'); ?></th>
                                              <th style=""><?= $this->lang->line('unit_price'); ?>(<?= $CI->currency(); ?>)</th>
                                              <th style=""><?= $this->lang->line('tax'); ?></th>
                                              <th style=""><?= $this->lang->line('sales_price'); ?>(<?= $CI->currency(); ?>)</th>
                                              <th style=""><?= $this->lang->line('current_stock'); ?></th>
                                              <th style=""><?= $this->lang->line('stock_value'); ?></th>
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
                                       
                                          <?php $this->load->view('components/export_btn',array('tableId' => 'brand_wise_stock'));?>
                                          <br><br>
                                          <div class="table-responsive">
                                          <table class="table table-bordered table-hover " id="brand_wise_stock" >
                                              <thead>
                                              <tr class="bg-blue">
                                                <th style="">#</th>
                                                <th style=""><?= $this->lang->line('brand_name'); ?></th>
                                                <th style=""><?= $this->lang->line('current_stock'); ?></th>
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

                           <div class="tab-pane" id="tab_3">
                              <div class="row">
                                 <!-- right column -->
                                 <div class="col-md-12">
                                    <!-- form start -->
                                       
                                          <?php $this->load->view('components/export_btn',array('tableId' => 'category_wise_stock'));?>
                                          <br><br>
                                          <div class="table-responsive">
                                          <table class="table table-bordered table-hover " id="category_wise_stock" >
                                              <thead>
                                              <tr class="bg-blue">
                                                <th style="">#</th>
                                                <th style=""><?= $this->lang->line('category_name'); ?></th>
                                                <th style=""><?= $this->lang->line('current_stock'); ?></th>
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
                  <!-- /.col -->
     
      
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


<script src="<?php echo $theme_link; ?>js/ajaxselect/item_select_ajax.js"></script>  
<script>
   //Item Selection Box Search
   function getItemSelectionId() {
     return '#item_id';
   }
   //Item Selection Box Search - END


   $("#item_id").on("change", function(){
         load_reports();
   });
</script>

<script type="text/javascript">
  function load_reports(){

   var brand_id=document.getElementById("brand_id").value.trim();
    var category_id=document.getElementById("category_id").value.trim();


   $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');

        $.post("get_stock_report",{brand_id:brand_id,category_id:category_id,item_id:$("#item_id").val()},function(result){
            result = $.parseJSON(result);

              $.each( result, function( key, val ) {
                if(key=='item_wise_report'){
                    $("#tbodyid").empty().append(val);
                }
                if(key=='brand_wise_stock'){
                    $("#brand_wise_stock tbody").empty().append(val);     
                }
                if(key=='category_wise_stock'){
                    $("#category_wise_stock tbody").empty().append(val);     
                }

              });
              $(".overlay").remove();
           });

    }//function end
</script>
<script>
    $("#view,#view_all").on("click",function(){
    
   
     load_reports();
      
    
});


</script>


<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
    
    
</body>
</html>
