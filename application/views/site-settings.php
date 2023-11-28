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
                  <?= $this->lang->line('site_settings'); ?>
                  <small><?= $this->lang->line('add_or_update'); ?> <?= $this->lang->line('site_settings'); ?></small>
               </h1>
               <ol class="breadcrumb">
                  <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">Site Settings</li>
               </ol>
            </section>
            
            <!-- Main content -->
  <?= form_open('#', array('class' => 'form-horizontal', 'id' => 'site-form', 'enctype'=>'multipart/form-data', 'method'=>'POST'));?>
            <section class="content">
               <div class="row">
                  <!-- ********** ALERT MESSAGE START******* -->
                <?php include"comman/code_flashdata.php"; ?>
                  <!-- ********** ALERT MESSAGE END******* -->

                  <div class="col-md-12">
                     <!-- Custom Tabs -->
                     <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#tab_1" data-toggle="tab"><?= $this->lang->line('site'); ?></a></li>
                           <li><a href="#tab_2" data-toggle="tab"><?= $this->lang->line('sales'); ?></a></li>
                           <li><a href="#tab_3" data-toggle="tab"><?= $this->lang->line('prefixes'); ?></a></li>
                           
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane active" id="tab_1">
                              <div class="row">
                                 <!-- right column -->
                                 <div class="col-md-12">
                                    <!-- form start -->
                                       <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                                       <div class="box-body">
                                          <div class="row">
                                             <div class="col-md-5">
                                                <div class="form-group">
                                                   <label for="site_name" class="col-sm-4 control-label"><?= $this->lang->line('site_name'); ?><label class="text-danger">*</label></label>
                                                   <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="site_name" name="site_name" placeholder="" onkeyup="shift_cursor(event,'mobile')" value="<?php print $site_name; ?>" >
                                                      <span id="site_name_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label for="timezone" class="col-sm-4 control-label"><?= $this->lang->line('timezone'); ?><label class="text-danger">*</label> </label>
                                                   <div class="col-sm-8">
                                                      <select class="form-control select2" id="timezone" name="timezone"  style="width: 100%;">
                                                         <?php
                                                            $query2="select * from db_timezone where status=1";
                                                            $q2=$this->db->query($query2);
                                                            if($q2->num_rows()>0)
                                                             {
                                                              
                                                              foreach($q2->result() as $res1)
                                                               {
                                                                 if((isset($timezone) && !empty($timezone)) && trim($timezone)==trim($res1->timezone)){$selected='selected';}else{$selected='';}
                                                                 echo "<option ".$selected." value='".$res1->timezone."'>".$res1->timezone."</option>";
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
                                                      <span id="timezone_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label for="date_format" class="col-sm-4 control-label"><?= $this->lang->line('date_format'); ?><label class="text-danger">*</label> </label>
                                                   <div class="col-sm-8">
                                                      <select class="form-control select2" id="date_format" name="date_format"  style="width: 100%;">
                                                         <option value="dd-mm-yyyy">dd-mm-yyyy</option>
                                                         <!-- <option value="dd/mm/yyyy">dd/mm/yyyy</option> -->
                                                         <option value="mm/dd/yyyy">mm/dd/yyyy</option>
                                                      </select>
                                                      <span id="date_format_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label for="time_format" class="col-sm-4 control-label"><?= $this->lang->line('time_format'); ?><label class="text-danger">*</label> </label>
                                                   <div class="col-sm-8">
                                                      <select class="form-control select2" id="time_format" name="time_format"  style="width: 100%;">
                                                         <option value="12">12 Hours</option>
                                                         <option value="24">24 Hours</option>
                                                      </select>
                                                      <span id="time_format_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label for="currency" class="col-sm-4 control-label"><?= $this->lang->line('currency'); ?><label class="text-danger">*</label> </label>
                                                   <div class="col-sm-8">
                                                      <select class="form-control select2" id="currency" name="currency"  style="width: 100%;">
                                                         <?php
                                                            $query2="select * from db_currency where status=1";
                                                            $q2=$this->db->query($query2);
                                                            if($q2->num_rows()>0)
                                                             {
                                                              
                                                              foreach($q2->result() as $res1)
                                                               {
                                                                 if((isset($currency_id) && !empty($currency_id)) && $currency_id==$res1->id){$selected='selected';}else{$selected='';}
                                                                 echo "<option ".$selected." value='".$res1->id."'>".$res1->currency_name.' '.$res1->currency_code.' ('.$res1->currency.")</option>";
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
                                                      <span id="currency_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>

                                                <div class="form-group">
                                                   <label for="number_to_words" class="col-sm-4 control-label"><?= $this->lang->line('number_to_words_format'); ?><label class="text-danger">*</label> </label>
                                                   <div class="col-sm-8">
                                                      <select class="form-control select2" id="number_to_words" name="number_to_words"  style="width: 100%;">
                                                         <option value="Default">Default</option>
                                                         <option value="Indian">Việt Nam</option>
                                                      </select>
                                                      <span id="number_to_words_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>

                                      
                                             


                                                <div class="form-group">
                                                   <label for="currency_placement" class="col-sm-4 control-label"><?= $this->lang->line('currency_symbol_placement'); ?><label class="text-danger">*</label> </label>
                                                   <div class="col-sm-8">
                                                      <select class="form-control select2" id="currency_placement" name="currency_placement"  style="width: 100%;">
                                                         <option value="Right">After Amount</option>
                                                         <option value="Left">Before Amount</option>
                                                      </select>
                                                      <span id="currency_placement_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                                <?php 
                                               $round_off_checkbox ='';
                                               if($round_off==1){
                                                $round_off_checkbox='checked';
                                               }
                                               ?>
                                                <div class="form-group">
                                                   <label for="round_off" class="col-sm-4 control-label"><?= $this->lang->line('enable_round_off'); ?></label>
                                                   <div class="col-sm-4">
                                                      <input type="checkbox" <?=$round_off_checkbox;?> class="form-control" id="round_off" name="round_off" >
                                                      <span id="round_off_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>

                                                <?php 
                                               $disable_tax_checkbox ='';
                                               if($disable_tax==1){
                                                $disable_tax_checkbox='checked';
                                               }
                                               ?>
                                                <div class="form-group">
                                                   <label for="disable_tax" class="col-sm-4 control-label"><?= $this->lang->line('disable_tax'); ?></label>
                                                   <div class="col-sm-4">
                                                      <input type="checkbox" <?=$disable_tax_checkbox;?> class="form-control" id="disable_tax" name="disable_tax" >
                                                      <span id="disable_tax_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>

                                             </div>
                                             <div class="col-md-5">
                                                <div class="form-group">
                                                     <label for="language_id" class="col-sm-4 control-label"><?= $this->lang->line('language'); ?><label class="text-danger">*</label> </label>
                                                     <div class="col-sm-8">
                                                        <select class="form-control select2" id="language_id" name="language_id"  style="width: 100%;">
                                                           <?php
                                                              $query2="select * from db_languages where status=1";
                                                              $q2=$this->db->query($query2);
                                                              if($q2->num_rows()>0)
                                                               {
                                                                
                                                                foreach($q2->result() as $res1)
                                                                 {
                                                                   $selected = ($res1->id ==$language_id) ? 'selected' : '';
                                                                   echo "<option ".$selected." value='".$res1->id."'>".$res1->language."</option>";
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
                                                        <span id="language_id_msg" style="display:none" class="text-danger"></span>
                                                     </div>
                                                  </div>
                                                  
                                                <div class="form-group">
                                                   <label for="address" class="col-sm-4 control-label"><?= $this->lang->line('site_logo'); ?></label>
                                                   <div class="col-sm-8">
                                                   <?php if (up_load()) { ?>
                                                      <input type="file" id="logo" name="logo">
                                                      <span id="logo_msg" style="display:block;" class="text-danger">Max Width/Height: 500px * 500px & Size: 500px </span>
                                                      <?php } ?>
                                                   </div>
                                                </div>
                                            
                                                <div class="form-group">
                                                   <div class="col-sm-8 col-sm-offset-4">
                                                      <img class='img-responsive' style='border:3px solid #d2d6de;' src="<?php echo $base_url; ?>uploads/<?= $logo;?>">
                                                   </div>
                                                </div>
                                             </div>
                                             <!-- ########### -->
                                          </div>
                                       </div>
                                       <!-- /.box-body -->
                                       <!-- /.box-footer -->
                                    
                                 </div>
                                 <!--/.col (right) -->
                              </div>
                              <!-- /.row -->
                           </div>
                           <!-- /.tab-pane -->
                           <?php 
                           //Change Return
                           $change_return_checkbox ='';
                           if($change_return==1){
                            $change_return_checkbox='checked';
                           }

                           //Show UPI Code
                           $show_upi_code_checkbox ='';
                           if($show_upi_code==1){
                            $show_upi_code_checkbox='checked';
                           }

                          
                            ?>
                           <div class="tab-pane" id="tab_2">
                              <div class="row">
                                 <!-- right column -->
                                 <div class="col-md-12">
                                       <div class="box-body">
                                          <div class="row">
                                             <div class="col-md-8">
                                                <div class="form-group">
                                                   <label for="sales_discount" class="col-sm-4 control-label"><?= $this->lang->line('default_sales_discount'); ?></label>
                                                   <div class="col-sm-4">
                                                      <input type="text" class="form-control" id="sales_discount" name="sales_discount" placeholder="" value="<?php print $sales_discount; ?>" >
                                                      <span id="sales_discount_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-8">
                                                <div class="form-group">
                                                   <label for="sales_discount" class="col-sm-4 control-label"><?= $this->lang->line('show_paid_amount_and_change_return_in_pos'); ?></label>
                                                   <div class="col-sm-4">
                                                      <input type="checkbox" <?=$change_return_checkbox;?> class="form-control" id="change_return" name="change_return" >
                                                      <span id="change_return_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-8">
                                                <div class="form-group">
                                                   <label for="show_upi_code" class="col-sm-4 control-label"><?= $this->lang->line('show_upi_code_on_invoice'); ?><br>(Chỉ hỗ trợ hóa đơn khổ A4)</label>
                                                   <div class="col-sm-4">
                                                      <input type="checkbox" <?=$show_upi_code_checkbox;?> class="form-control" id="show_upi_code" name="show_upi_code" >
                                                      <span id="show_upi_code_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                         
                                             <div class="col-md-8">
                                             <div class="form-group">
                                                   <label for="sales_invoice_formats" class="col-sm-4 control-label"><?= $this->lang->line('sales_invoice_formats'); ?><label class="text-danger">*</label> </label>
                                                   <div class="col-sm-4">
                                                      <select class="form-control select2" id="sales_invoice_format_id" name="sales_invoice_format_id"  style="width: 100%;">
                                                         <option value="1">Hóa đơn khổ K57</option>
                                                         <option value="2">Hóa đơn khổ K80</option>
                                                         <option value="3">Hóa đơn khổ A4</option>
                                                      </select>
                                                      <span id="sales_invoice_format_id_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                              </div>

                                              <div class="col-md-8">
                                                <div class="form-group">
                                                   <label for="sales_invoice_footer_text" class="col-sm-4 control-label"><?= $this->lang->line('sales_invoice_footer_text'); ?></label>
                                                   <div class="col-sm-8">
                                                      <textarea class="form-control" id="sales_invoice_footer_text" name="sales_invoice_footer_text"><?= $sales_invoice_footer_text;?></textarea>
                                                      <span id="sales_invoice_footer_text_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>

                                             <div class="col-md-8">
                                                <div class="form-group">
                                                   <label for="sales_terms_and_conditions" class="col-sm-4 control-label"><?= $this->lang->line('invoice_terms_and_conditions'); ?></label>
                                                   <div class="col-sm-8">
                                                      <textarea class="form-control" id="sales_terms_and_conditions" name="sales_terms_and_conditions"><?= $sales_terms_and_conditions;?></textarea>
                                                      <span id="sales_terms_and_conditions_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             


                                          </div>
                                       </div>
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
                                       <div class="box-body">
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="category_init" class="col-sm-4 control-label"><?= $this->lang->line('category'); ?><label class="text-danger">*</label></label>
                                                   <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="category_init" name="category_init" placeholder="" value="<?php print $category_init; ?>" >
                                                      <span id="category_init_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="item_init" class="col-sm-4 control-label"><?= $this->lang->line('item'); ?><label class="text-danger">*</label></label>
                                                   <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="item_init" name="item_init" placeholder="" value="<?php print $item_init; ?>" >
                                                      <span id="item_init_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="supplier_init" class="col-sm-4 control-label"><?= $this->lang->line('supplier'); ?><label class="text-danger">*</label></label>
                                                   <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="supplier_init" name="supplier_init" placeholder="" value="<?php print $supplier_init; ?>" >
                                                      <span id="supplier_init_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="purchase_init" class="col-sm-4 control-label"><?= $this->lang->line('purchase'); ?><label class="text-danger">*</label></label>
                                                   <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="purchase_init" name="purchase_init" placeholder="" value="<?php print $purchase_init; ?>" >
                                                      <span id="purchase_init_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="purchase_return_init" class="col-sm-4 control-label"><?= $this->lang->line('purchase_return'); ?><label class="text-danger">*</label></label>
                                                   <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="purchase_return_init" name="purchase_return_init" placeholder="" value="<?php print $purchase_return_init; ?>" >
                                                      <span id="purchase_return_init_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="customer_init" class="col-sm-4 control-label"><?= $this->lang->line('customer'); ?><label class="text-danger">*</label></label>
                                                   <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="customer_init" name="customer_init" placeholder="" value="<?php print $customer_init; ?>" >
                                                      <span id="customer_init_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="sales_init" class="col-sm-4 control-label"><?= $this->lang->line('sales'); ?><label class="text-danger">*</label></label>
                                                   <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="sales_init" name="sales_init" placeholder="" value="<?php print $sales_init; ?>" >
                                                      <span id="sales_init_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="sales_return_init" class="col-sm-4 control-label"><?= $this->lang->line('sales_return'); ?><label class="text-danger">*</label></label>
                                                   <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="sales_return_init" name="sales_return_init" placeholder="" value="<?php print $sales_return_init; ?>" >
                                                      <span id="sales_return_init_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="expense_init" class="col-sm-4 control-label"><?= $this->lang->line('expense'); ?><label class="text-danger">*</label></label>
                                                   <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="expense_init" name="expense_init" placeholder="" value="<?php print $expense_init; ?>" >
                                                      <span id="expense_init_msg" style="display:none" class="text-danger"></span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
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
                     <div>
                        <div class="col-sm-8 col-sm-offset-2 text-center">
                           <center>
                              <?php
                                 if($site_name!=""){
                                      $btn_name="Update";
                                      $btn_id="update";
                                      ?>
                              <input type="hidden" name="q_id" id="q_id" value="<?php echo $q_id;?>"/>
                              <?php
                                 }
                                 else{
                                     $btn_name="Save";
                                     $btn_id="save";
                                 }
                                 
                                 ?>
                              <div class="col-md-3 col-md-offset-3">
                                 <button type="button" id="<?php echo $btn_id;?>" class=" btn btn-block btn-success" title="Save Data"><?php echo $btn_name;?></button>
                              </div>
                              <div class="col-sm-3">
                                <a href="<?=base_url('dashboard');?>">
                                 <button type="button" class="col-sm-3 btn btn-block btn-warning close_btn" title="Go Dashboard">Close</button>
                               </a>
                              </div>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </section>
            <!-- /.content -->
            <?= form_close(); ?>
         </div>
         <!-- /.content-wrapper -->
         <?php include"footer.php"; ?>
         <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
         <div class="control-sidebar-bg"></div>
      </div>
      <!-- ./wrapper -->
      
      <?php include'comman/code_js_language.php'; ?>

      <!-- SOUND CODE -->
      <?php include"comman/code_js_sound.php"; ?>
      <!-- TABLES CODE -->
      <?php include"comman/code_js_form.php"; ?>

      <script type="text/javascript">
         $(document).submit(function(event) {
           event.preventDefault();
           if($("#update").length){
             $("#update").trigger('click');
           }
         });
      </script>
      <script src="<?php echo $theme_link; ?>js/site-settings.js"></script>
     
      <script type="text/javascript">
         $("#number_to_words").val('<?= $number_to_words;?>').select2();
         $("#currency_placement").val('<?= $currency_placement;?>').select2();
         $("#date_format").val('<?= $date_format;?>').select2();
         $("#time_format").val('<?= $time_format;?>').select2();
         $("#sales_invoice_format_id").val('<?= $sales_invoice_format_id;?>').select2();
      </script>
      <!-- Make sidebar menu hughlighter/selector -->
      <script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
   </body>
</html>
