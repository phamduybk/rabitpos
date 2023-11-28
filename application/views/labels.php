<!DOCTYPE html>
<html>

<head>
<!-- FORM CSS CODE -->
<?php include"comman/code_css_form.php"; ?>
<!-- </copy> -->  
<style type="text/css">
  .inner-div-2{
      margin-top: 0.5in !important;
      margin-bottom: 0.5in !important;
      margin-left: 0.5in !important;
      margin-right: 0.5in !important;
  }
  .label_border{

    border: 0.1px dotted grey !important;
    overflow: hidden;
    box-sizing: border-box;
  }
</style>
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
            <small>Add/Update Sales</small>
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
                     
                        <!-- style="background: #68deac;" -->
                        
                        <!-- form start -->
                         <!-- OK START -->
                        
                     
                           <?= form_open('#', array('class' => 'form-horizontal', 'id' => 'labels-form', 'enctype'=>'multipart/form-data', 'method'=>'POST'));?>
                           <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                           <input type="hidden" value='1' id="hidden_rowcount" name="hidden_rowcount">
                           <input type="hidden" value='0' id="hidden_update_rowid" name="hidden_update_rowid">

                           <div class="row">
                              <div class="col-xs-12 ">
                                 
                                    <div class="box box-info">
                                       <!-- /.box-header -->
                                       <div class="box-body ">
                                       
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
                                          
                                            <div class="col-md-8 col-md-offset-2 d-flex justify-content" >
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Select Items"><i class="fa fa-barcode"></i></span>
                                                 <input type="text" class="form-control " placeholder="Item name/Barcode/Itemcode" id="item_search">
                                              </div>
                                            </div>
                                            <br>
                                            <br>
                                          
                                          
                                          <table class="table table-hover table-bordered col-md-8 col-md-offset-2 d-flex justify-content" style="width:67%" id="sales_table">
                                             <thead class="custom_thead">
                                                <tr class="bg-primary" >
                                                   <th rowspan='2' style="width:45%"><?= $this->lang->line('item_name'); ?></th>
                                                   <th rowspan='2' style="width:45%"><?= $this->lang->line('quantity'); ?></th>
                                                   <th rowspan='2' style="width:10%"><?= $this->lang->line('action'); ?></th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                               
                                             </tbody>
                                             
                                          </table>
                                          <div class="col-md-6">
                                              <div class="row">
                                                  <div class="col-md-12">
                                                     <div class="form-group">
                                                        <label for="" class="col-sm-4 control-label"><?= $this->lang->line('total_labels'); ?></label>    
                                                        <div class="col-sm-4">
                                                           <label class="control-label total_quantity text-success" style="">0</label>
                                                        </div>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                       </div>
                                       <!-- /.box-body -->

                                       <!-- /.box-body -->
                                       <div class="box-footer col-sm-12">
                                          <center>
                                           
                                             <div class="col-md-3 col-md-offset-3">
                                                <button type="button" id="preview" class="btn bg-maroon btn-block btn-flat btn-lg payments_modal" title="Preview Labels">Preview</button>
                                             </div>
                                             <div class="col-sm-3"><a href="<?= base_url()?>dashboard">
                                                <button type="button" class="btn bg-gray btn-block btn-flat btn-lg" title="Go Dashboard">Close</button>
                                              </a>
                                            </div>
                                          </center>
                                       </div>
                                    </div>
                                 
                                 <!-- /.box -->
                              </div>

                           </div>
                           <div class="row">
                              <div class="col-xs-12 ">
                                    <div class="box box-info">
                                       <!-- /.box-body -->
                                       <div class="box-footer col-sm-12">
                                          <span id="preview_data" class=" col-md-offset-1 col-sm-10" style="overflow: auto;" >
                                            
                                          </span>
                                          <div class="col-sm-1">
                                            <input type="button" class="btn btn-primary btn-flat" id="print" value="Print">
                                          </div>
                                       </div>
                                    </div>
                                 
                                 <!-- /.box -->
                              </div>

                           </div>
                           <?= form_close(); ?>
                           <!-- OK END -->
                     
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

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

      <script src="<?php echo $theme_link; ?>js/labels.js"></script>  
      <script>
       $('#item_search').keypress(function (e) {
 var key = e.which;
 // the enter key code
 if(key == 13){
    $("#item_search").autocomplete('search');
  }
  return;
});  
        
         /* ---------- Final Description of amount ------------*/
         function final_total(){
          var rowcount=$("#hidden_rowcount").val();
           var total_quantity=0;
         
           for(i=1;i<=rowcount;i++){
         
             if(document.getElementById("td_data_"+i+"_1")){
               //customer_id must exist
               if($("#td_data_"+i+"_1").val()!=null && $("#td_data_"+i+"_1").val()!=''){
                     
                    total_quantity +=parseInt($("#td_data_"+i+"_3").val().trim());
                }
                   
             }//if end
           }//for end
          //Show total Sales Quantitys
           $(".total_quantity").html(total_quantity);
         }
         /* ---------- Final Description of amount end ------------*/
          
         function removerow(id){//id=Rowid
           
         $("#row_"+id).remove();
         final_total();
         failed.currentTime = 0;
        failed.play();
         }

         /*Print Div*/
         $("#print").on("click",function(event) {
            PrintMe("preview_data");
            
         });

         function PrintMe(DivID) {
            var disp_setting="toolbar=yes,location=no,";
            disp_setting+="directories=yes,menubar=yes,";
            disp_setting+="scrollbars=yes,width=800, height=600, left=100, top=25";
               var content_vlue = document.getElementById(DivID).innerHTML;
               var docprint=window.open("","",disp_setting);
               docprint.document.open();
               docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
               docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
               docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
               docprint.document.write('<head><title>My Title</title>');
               docprint.document.write('<style type="text/css">body{ margin:0px;');
               docprint.document.write('font-family:verdana,Arial;color:#000;');
               docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:12px;}');
               docprint.document.write('a{color:#000;text-decoration:none;} </style>');
               docprint.document.write('</head><body onLoad="self.print()">');
               docprint.document.write(content_vlue);
               docprint.document.write('</body></html>');
               docprint.document.close();
               docprint.focus();
            }
      </script>
      <!-- Purchase List Barcode -->
      <script type="text/javascript">
        jQuery(document).ready(function($) {
          <?php
          if(isset($purchase_id)){ ?>
               $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
              var base_url=$("#base_url").val().trim();
              var rowcount=$("#hidden_rowcount").val();
              $.post(base_url+"items/show_labels/"+<?=$purchase_id;?>,{},function(result){
                    $('#sales_table tbody').append(result);
                    $("#hidden_rowcount").val($('#sales_table tbody tr').length+1);
                    $("#preview").trigger('click');
                    success.currentTime = 0;
                    success.play();
                    final_total();
                    $(".overlay").remove();
                });
          <?php }
          ?>  
        });
      </script>
      <!-- Purchase List Barcode end-->
      <!-- Make sidebar menu hughlighter/selector -->
      <script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
</body>
</html>
