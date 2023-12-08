<!DOCTYPE html>
<html>

<head>
   <!-- TABLES CSS CODE -->
   <?php include "comman/code_css_form.php"; ?>
   <!-- </copy> -->
</head>

<body class="hold-transition skin-blue  sidebar-mini">

   <!-- **********************MODALS***************** -->
   <?php include "modals/modal_brand.php"; ?>
   <?php include "modals/modal_category.php"; ?>
   <?php include "modals/modal_unit.php"; ?>
   <?php include "modals/modal_tax.php"; ?>
   <?php include "modals/modal_kind.php"; ?>
   <!-- **********************MODALS END***************** -->

   </div>
   <div class="wrapper">
      <?php include "sidebar.php"; ?>
      <?php
      if (!isset($item_name)) {
         $custom_barcode = '';
         $item_name = $sku = $hsn = $opening_stock = $item_code = $brand_id = $category_id = $category_item_id = $gst_percentage = $tax_type =
            $sales_price = $purchase_price = $profit_margin = $unit_id = $kind_id = $price = $lot_number = "";
         $stock = 0;
         $alert_qty = 0;
         $expire_date = '';
         $description = '';
         $final_price = '';
         $tax_id = '';
         $discount = '';
         $discount_type = 'Percentage';



         //Create items unique Number
         $qs5 = "select item_init from db_company";
         $q5 = $this->db->query($qs5);
         $item_init = $q5->row()->item_init;

         $this->db->query("ALTER TABLE db_items AUTO_INCREMENT = 1");
         $qs4 = "select coalesce(max(id),0)+1 as maxid from db_items";
         $q1 = $this->db->query($qs4);
         $maxid = $q1->row()->maxid;
         $item_code = $item_init . str_pad($maxid, 4, '0', STR_PAD_LEFT);
         //end
      

      }
      if ($item_name != "") {
         $new_opening_stock = '0';
         $type_item = 'update';
      } else {
         $new_opening_stock = '999';
         $type_item = 'new';
      }

      $adjustment_note = '';
      ?>

      <input type="hidden" value="<?php print $type_item; ?>" id="type_item" name="type_item">
      <input type="hidden" value="<?php print $maxid; ?>" id="maxid" name="maxid">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <h1>
               <?= $page_title; ?>
               <small>Add/Update Items</small>
            </h1>
            <ol class="breadcrumb">
               <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
               <li><a href="<?php echo $base_url; ?>items">
                     <?= $this->lang->line('items_list'); ?>
                  </a></li>
               <li class="active">
                  <?= $page_title; ?>
               </li>
            </ol>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="row">
               <!-- ********** ALERT MESSAGE START******* -->
               <?php include "comman/code_flashdata.php"; ?>
               <!-- ********** ALERT MESSAGE END******* -->
               <!-- right column -->
               <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="box box-info ">

                     <?= form_open('#', array('class' => 'form', 'id' => 'items-form', 'enctype' => 'multipart/form-data', 'method' => 'POST')); ?>
                     <input type="hidden" id="base_url" value="<?php echo $base_url;
                     ; ?>">


                     <div class="form-group col-md-4 <?= tax_disable_class() ?>" style="display:none">
                        <label for="tax_type">
                           <?= $this->lang->line('tax_type'); ?><span class="text-danger">*(cái này ko rõ, để mặc định
                              đi)</span>
                        </label>
                        <select class="form-control select2" id="tax_type" name="tax_type" style="width: 100%;">
                           <?php
                           $inclusive_selected = $exclusive_selected = '';
                           if ($tax_type == 'Inclusive') {
                              $inclusive_selected = 'selected';
                           }
                           if ($tax_type == 'Exclusive') {
                              $exclusive_selected = 'selected';
                           }

                           ?>
                           <option <?= $exclusive_selected ?> value="Exclusive">Exclusive</option>
                           <option <?= $inclusive_selected ?> value="Inclusive">Inclusive</option>
                        </select>
                        <span id="tax_type_msg" style="display:none" class="text-danger"></span>

                     </div>

                     <div class="form-group col-md-4" style="display:none">
                        <label for="purchase_price">
                           <?= $this->lang->line('purchase_price'); ?><span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control only_currency" id="purchase_price" name="purchase_price"
                           placeholder="Giá nhập hàng kèm thuế " value="<?php print $purchase_price; ?>" readonly=''>
                        <span id="purchase_price_msg" style="display:none" class="text-danger"></span>
                     </div>

                     <div class="form-group col-md-4" style="display:none">
                        <label for="profit_margin">
                           <?= $this->lang->line('profit_margin'); ?>(%) <i class="hover-q " data-container="body"
                              data-toggle="popover" data-placement="top"
                              data-content="<?= $this->lang->line('based_on_purchase_price'); ?>" data-html="true"
                              data-trigger="hover" data-original-title="">
                              <i class="fa fa-info-circle text-maroon text-black hover-q"></i>
                           </i>
                        </label>
                        <input type="text" class="form-control only_currency" id="profit_margin" name="profit_margin"
                           placeholder="Lợi nhuận %" value="<?php print $profit_margin; ?>">
                        <span id="profit_margin_msg" style="display:none" class="text-danger"></span>
                     </div>

                     <div class="form-group col-md-4" style="display:none">
                        <label for="alert_qty">
                           <?= $this->lang->line('minimum_qty'); ?><span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" id="alert_qty" name="alert_qty" placeholder="" min="0"
                           value="<?php print $alert_qty; ?>">
                        <span id="alert_qty_msg" style="display:none" class="text-danger"></span>
                     </div>

                     <div class="box-body">
                        <div class="row">


                           <div class="form-group col-md-4">
                              <input type="text" class="form-control" id="category_item_id" name="category_item_id"
                                 style="display:none" placeholder="" value="<?php print $category_item_id; ?>">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label for="item_name">
                                 <?= $this->lang->line('item_name'); ?><span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" id="item_name" name="item_name" placeholder=""
                                 value="<?php print $item_name; ?>">
                              <span id="item_name_msg" style="display:none" class="text-danger"></span>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="brand_id">Nhãn hiệu</label>
                              <div class="input-group">
                                 <select class="form-control select2" id="brand_id" name="brand_id"
                                    style="width: 100%;">
                                    <?php
                                    $query1 = "select * from db_brands where status=1";
                                    $q1 = $this->db->query($query1);
                                    if ($q1->num_rows($q1) > 0) {
                                       echo '<option value="">-Select-</option>';
                                       foreach ($q1->result() as $res1) {
                                          $selected = ($brand_id == $res1->id) ? 'selected' : '';
                                          echo "<option $selected value='" . $res1->id . "'>" . $res1->brand_name . "</option>";
                                       }
                                    } else {
                                       ?>
                                       <option value="">No Records Found</option>
                                       <?php
                                    }
                                    ?>
                                 </select>
                                 <span class="input-group-addon pointer" data-toggle="modal" data-target="#brand_modal"
                                    title="Add Customer"><i class="fa fa-plus-square-o text-primary fa-lg"></i></span>
                              </div>
                              <span id="brand_id_msg" style="display:none" class="text-danger"></span>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="category_id">Danh mục <span class="text-danger">*</span></label>
                              <div class="input-group">
                                 <select class="form-control select2" id="category_id" name="category_id"
                                    style="width: 100%;" value="<?php print $category_id; ?>">
                                    <?php
                                    $query1 = "SELECT * FROM db_category WHERE status=1";
                                    $q1 = $this->db->query($query1);

                                    if ($q1->num_rows($q1) > 0) {
                                       echo '<option value="">-Select-</option>';

                                       foreach ($q1->result() as $res1) {
                                          $selected = ($category_id == $res1->id) ? 'selected' : '';

                                          echo "<option $selected value='" . $res1->id . "'>" . $res1->category_name . "</option>";

                                          $query2 = "SELECT * FROM db_category_item WHERE status=1 AND category_id = $res1->id";
                                          $q2 = $this->db->query($query2);

                                          if ($q2->num_rows($q2) > 0) {
                                             foreach ($q2->result() as $res2) {
                                                // $category_item_id = $res2->id;
                                    
                                                $selected2 = ($category_item_id == $res2->id) ? 'selected' : '';


                                                echo "<option $selected2 value='" . $res1->id . "' data-parent-id='" . $res2->id . "'>&nbsp;&nbsp;&nbsp;" . $res2->category_item_name . "</option>";
                                             }
                                          }
                                       }
                                    } else {
                                       echo '<option value="">No Records Found</option>';
                                    }
                                    ?>
                                 </select>
                                 <span class="input-group-addon pointer" data-toggle="modal"
                                    data-target="#category_modal" title="Add Category"><i
                                       class="fa fa-plus-square-o text-primary fa-lg"></i></span>
                              </div>
                              <span id="category_id_msg" style="display:none" class="text-danger"></span>
                           </div>

                           <div class="form-group col-md-4">
                              <label for="unit_id" class="control-label">
                                 <?= $this->lang->line('unit'); ?><span class="text-danger">*</span>
                              </label>
                              <div class="input-group">
                                 <select class="form-control select2" id="unit_id" name="unit_id" style="width: 100%;">
                                    <?php
                                    $query1 = "select * from db_units where status=1";
                                    $q1 = $this->db->query($query1);
                                    if ($q1->num_rows($q1) > 0) {
                                       echo '<option value="">-Select-</option>';
                                       foreach ($q1->result() as $res1) {
                                          $selected = ($res1->id == $unit_id) ? 'selected' : '';
                                          echo "<option $selected value='" . $res1->id . "'>" . $res1->unit_name . "</option>";
                                       }
                                    } else {
                                       ?>
                                       <option value="">No Records Found</option>
                                       <?php
                                    }
                                    ?>
                                 </select>
                                 <span class="input-group-addon pointer" data-toggle="modal" data-target="#unit_modal"
                                    title="Add Unit"><i class="fa fa-plus-square-o text-primary fa-lg"></i></span>
                              </div>
                              <span id="unit_id_msg" style="display:none" class="text-danger"></span>
                           </div>
                           <div class="form-group col-md-4" style="display:none">
                              <label for="sku">SKU</label>
                              <input type="text" class="form-control" id="sku" name="sku" placeholder=""
                                 value="<?php print $sku; ?>">
                              <span id="sku_msg" style="display:none" class="text-danger"></span>
                           </div>
                           <div class="form-group col-md-4" style="display:none">
                              <label for="hsn">
                                 <?= $this->lang->line('hsn'); ?>
                              </label>
                              <input type="text" class="form-control" id="hsn" name="hsn" placeholder=""
                                 value="<?php print $hsn; ?>">
                              <span id="hsn_msg" style="display:none" class="text-danger"></span>
                           </div>

                           <div class="form-group col-md-4 hide">
                              <label for="lot_number">
                                 <?= $this->lang->line('lot_number'); ?>
                              </label>
                              <input type="text" class="form-control no_special_char" id="lot_number" name="lot_number"
                                 placeholder="" value="<?php print $lot_number; ?>">
                              <span id="lot_number_msg" style="display:none" class="text-danger"></span>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="expire_date">
                                 <?= $this->lang->line('expire_date'); ?>
                              </label>
                              <div class="input-group date">
                                 <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                 </div>
                                 <input type="text" class="form-control pull-right datepicker" id="expire_date"
                                    name="expire_date" value="<?= $expire_date; ?>">
                              </div>
                              <span id="expire_date_msg" style="display:none" class="text-danger"></span>
                           </div>

                           <div class="form-group col-md-4 <?= tax_disable_class() ?>">
                              <label for="tax_id">
                                 <?= $this->lang->line('tax'); ?><span class="text-danger">*</span>
                              </label>
                              <div class="input-group">
                                 <select class="form-control select2" id="tax_id" name="tax_id" style="width: 100%;">
                                    <?php
                                    $query1 = "SELECT * FROM db_tax WHERE STATUS=1 ORDER BY undelete_bit DESC";
                                    $q1 = $this->db->query($query1);
                                    if ($q1->num_rows($q1) > 0) {
                                       //echo '<option data-tax="0" value="">-Select-</option>'; 
                                       foreach ($q1->result() as $res1) {
                                          $selected = ($tax_id == $res1->id) ? 'selected' : '';
                                          echo "<option $selected data-tax='" . $res1->tax . "' value='" . $res1->id . "'>" . $res1->tax_name . "(" . $res1->tax . "%)</option>";
                                       }
                                    } else {
                                       ?>
                                       <option value="">No Records Found</option>
                                       <?php
                                    }
                                    ?>
                                 </select>
                                 <span class="input-group-addon pointer" data-toggle="modal" data-target="#tax_modal"
                                    title="Add Tax"><i class="fa fa-plus-square-o text-primary fa-lg"></i></span>
                              </div>
                              <span id="tax_id_msg" style="display:none" class="text-danger"></span>
                           </div>

                           <div class="form-group col-md-4">
                              <label for="custom_barcode">
                                 <?= $this->lang->line('description'); ?>
                              </label>
                              <textarea type="text" class="form-control" id="description" name="description"
                                 placeholder=""><?php print $description; ?></textarea>
                              <span id="description_msg" style="display:none" class="text-danger"></span>
                           </div>

                           <div class="form-group col-md-4">
                              <!--  <label for="item_image"><?= $this->lang->line('select_image'); ?></label>
                                 <input type="file" name="item_image" id="item_image">
                                 <span id="item_image_msg" style="display:block;" class="text-danger">Max Width/Height: 1000px * 1000px & Size: 1MB </span>
 -->

                              <label for="item_image">
                                 <?= $this->lang->line('select_image'); ?>
                              </label>
                              <input type="file" name="item_image" id="item_image">
                              <span id="item_image_msg" style="display:block;" class="text-danger">Max Width/Height:
                                 300px * 200px & Size: 300kB, nếu ảnh không hiển thị hãy thử ảnh logo 75*50 </span>

                           </div>
                        </div>
                        <hr>
                        <div class="row">

                           <div class="form-group col-md-4">
                              <label for="item_code">
                                 <?= $this->lang->line('item_code'); ?><span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" id="item_code" name="item_code" placeholder=""
                                 value="<?php print $item_code; ?>">
                              <span id="item_code_msg" style="display:none" class="text-danger"></span>
                           </div>

                           <div class="form-group col-md-4">
                              <label for="custom_barcode">
                                 <?= $this->lang->line('barcode'); ?>
                              </label>
                              <input type="text" class="form-control" id="custom_barcode" name="custom_barcode"
                                 placeholder="" value="<?php print $custom_barcode; ?>">
                              <span id="custom_barcode_msg" style="display:none" class="text-danger"></span>
                           </div>



                        </div>
                        <!-- /row -->
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label for="price">
                                 <?= $this->lang->line('input_price'); ?><span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control only_currency" id="price" name="price"
                                 placeholder="Giá nhập hàng" value="<?php print $price; ?>">
                              <span id="price_msg" style="display:none" class="text-danger"></span>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="sales_price" class="control-label">
                                 <?= $this->lang->line('sales_price'); ?><span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control only_currency " id="sales_price" name="sales_price"
                                 placeholder="Giá bán trước thuế" value="<?php print $sales_price; ?>">
                              <span id="sales_price_msg" style="display:none" class="text-danger"></span>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="final_price" class="control-label">
                                 <?= $this->lang->line('final_price'); ?><span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control only_currency " id="final_price" name="final_price"
                                 placeholder="Giá bán sau thuế" value="<?php print $final_price; ?>" readonly>
                              <span id="final_price_msg" style="display:none" class="text-danger"></span>
                           </div>
                        </div>


                        <div class="row">
                           <div class="form-group col-md-4">
                              <label for="discount_type">
                                 <?= $this->lang->line('discount_type'); ?>
                              </label>
                              <select class="form-control" id="discount_type" name="discount_type" style="width: 100%;">
                                 <option value='Percentage'>Theo phần trăm(%)</option>
                                 <option value='Fixed'>Giảm cố định(
                                    <?= $CI->currency() ?>)
                                 </option>
                              </select>
                              <span id="discount_type_msg" style="display:none" class="text-danger"></span>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="discount">
                                 <?= $this->lang->line('discount'); ?>
                              </label>
                              <input type="text" class="form-control only_currency" id="discount" name="discount"
                                 value="<?php print $discount; ?>">
                              <span id="discount_msg" style="display:none" class="text-danger"></span>
                           </div>

                        </div>

                        <div class="row">
                           <div class="form-group col-md-4">
                              <label for="current_opening_stock">
                                 <?= $this->lang->line('current_opening_stock'); ?>
                              </label>
                              <input type="text" class="form-control only_currency" id="current_opening_stock"
                                 name="current_opening_stock" placeholder="" readonly="" value="<?php print $stock; ?>">
                              <span id="current_opening_stock_msg" style="display:none" class="text-danger"></span>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="new_opening_stock">
                                 <?= $this->lang->line('adjust_stock'); ?> <i class="hover-q " data-container="body"
                                    data-toggle="popover" data-placement="top"
                                    data-content="<?= $this->lang->line('stock_adjustment_msg'); ?>" data-html="true"
                                    data-trigger="hover" data-original-title="">
                                    <i class="fa fa-info-circle text-maroon text-black hover-q"></i>
                                 </i>
                              </label>
                              <input type="text" class="form-control" id="new_opening_stock" name="new_opening_stock"
                                 placeholder="-/+" value="<?php print $new_opening_stock; ?>">
                              <span id="new_opening_stock_msg" style="display:none" class="text-danger"></span>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="adjustment_note">
                                 <?= $this->lang->line('adjustment_note'); ?>
                              </label>
                              <textarea type="text" class="form-control" id="adjustment_note" name="adjustment_note"
                                 placeholder=""><?php print $adjustment_note; ?></textarea>
                              <span id="adjustment_note_msg" style="display:none" class="text-danger"></span>
                           </div>
                        </div>

                        <div class="row">

                           <div class="form-group col-md-4">
                              <label for="kind_id" class="control-label">
                                 <?= $this->lang->line('kind'); ?><span class="text-danger"></span>
                              </label>
                              <div class="input-group">
                                 <select class="form-control select2" id="kind_id" name="kind_id" style="width: 100%;">
                                    <?php
                                    $query1 = "select * from db_kinds where status=1";
                                    $q1 = $this->db->query($query1);
                                    if ($q1->num_rows($q1) > 0) {
                                       echo '<option value="">-Select-</option>';
                                       foreach ($q1->result() as $res1) {
                                          $selected = ($kind_id == $res1->id) ? 'selected' : '';
                                          echo "<option $selected value='" . $res1->id . "'>" . $res1->kind_name . "</option>";
                                       }
                                    } else {
                                       ?>
                                       <option value="">No Records Found</option>
                                       <?php
                                    }
                                    ?>
                                 </select>
                                 <span class="input-group-addon pointer" data-toggle="modal" data-target="#kind_modal"
                                    title="Add Kind"><i class="fa fa-plus-square-o text-primary fa-lg"></i></span>
                              </div>
                              <span id="kind_id_msg" style="display:none" class="text-danger"></span>
                           </div>
                        </div>

                        <br>
                        <div class="col-md-12" id='kinds_input'>

                           <div class="box">
                              <div class="box-header">
                                 <h3 class="box-title text-blue">
                                    <br>
                                    <label for="kind_id" class="control-label">
                                       Nhập các sản phẩm theo thuộc tính<span class="text-danger"></span>
                                    </label>
                                    <select class="form-control select2" id="kind_input_id" name="kind_input_id"
                                       style="width: 100%;">
                                       <?php
                                       $query1 = "select * from db_kinds where status=1";
                                       $q1 = $this->db->query($query1);
                                       if ($q1->num_rows($q1) > 0) {
                                          echo '<option value="">-Select-</option>';
                                          foreach ($q1->result() as $res1) {
                                             $selected = ($kind_id == $res1->id) ? 'selected' : '';
                                             echo "<option $selected value='" . $res1->id . "'>" . $res1->kind_name . "</option>";
                                          }
                                       } else {
                                          ?>
                                          <option value="">No Records Found</option>
                                          <?php
                                       }
                                       ?>
                                    </select>
                                 </h3>

                              </div>

                              <!-- /.box-header -->
                              <div class="box-body table-responsive no-padding">

                                 <table class="table table-bordered table-hover " id="report-data">
                                    <thead>
                                       <tr class="bg-gray">
                                          <th width="35%">
                                             <?= $this->lang->line('item_name'); ?>
                                          </th>
                                          <th width="10%">
                                             <?= $this->lang->line('item_code'); ?>
                                          </th>
                                          <th width="15%">
                                             <?= $this->lang->line('barcode'); ?>
                                          </th>

                                          <th width="10%">
                                             <?= $this->lang->line('stock'); ?>
                                          </th>
                                          <th width="10%">
                                             <?= $this->lang->line('input_price'); ?>
                                          </th>
                                          <th width="10%">
                                             <?= $this->lang->line('price'); ?>
                                          </th>
                                          <th width="5%">
                                             <?= $this->lang->line('action'); ?>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody id="pos-form-tbody"
                                       style="font-size: 16px;font-weight: bold;overflow: scroll;">

                                 </table>


                              </div>
                              <!-- /.box-body -->
                           </div>
                           <!-- /.box -->
                        </div>
                        <!-- /row -->
                        <!-- /.box-body -->
                        <div class="box-footer">
                           <div class="col-sm-8 col-sm-offset-2 text-center">
                              <!-- <div class="col-sm-4"></div> -->
                              <?php
                              if ($item_name != "") {
                                 $btn_name = "Update";
                                 $btn_id = "update";
                                 ?>
                                 <input type="hidden" name="q_id" id="q_id" value="<?php echo $q_id; ?>" />
                                 <?php
                              } else {
                                 $btn_name = "Save";
                                 $btn_id = "save";
                              }

                              ?>
                              <div class="col-md-3 col-md-offset-3">
                                 <button type="button" id="<?php echo $btn_id; ?>" class=" btn btn-block btn-success"
                                    title="Save Data">
                                    <?php echo $btn_name; ?>
                                 </button>
                              </div>
                              <div class="col-sm-3">
                                 <a href="<?= base_url('dashboard'); ?>">
                                    <button type="button" class="col-sm-3 btn btn-block btn-warning close_btn"
                                       title="Go Dashboard">Close</button>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <!-- /.box-footer -->
                        <?= form_close(); ?>
                     </div>
                     <!-- /.box -->
                  </div>
                  <!--/.col (right) -->
               </div>
               <div class="col-md-12" id ='lichsu'>

                  <div class="box">
                     <div class="box-header">
                        <h3 class="box-title text-blue">
                           <?= $this->lang->line('opening_stock_adjustment_records'); ?>
                        </h3>
                     </div>

                     <input type="hidden" value='0' id="hidden_rowcount" name="hidden_rowcount">
                     <!-- /.box-header -->
                     <div class="box-body table-responsive no-padding">

                        <table class="table table-bordered table-hover " id="report-data">
                           <thead>
                              <tr class="bg-gray">
                                 <th style="">#</th>
                                 <th style="">
                                    <?= $this->lang->line('entry_date'); ?>
                                 </th>
                                 <th style="">
                                    <?= $this->lang->line('stock'); ?>
                                 </th>
                                 <th style="">
                                    <?= $this->lang->line('note'); ?>
                                 </th>
                                 <th style="">
                                    <?= $this->lang->line('action'); ?>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              if (isset($q_id)) {
                                 $q3 = $this->db->query("select * from db_stockentry where item_id=$q_id");
                                 if ($q3->num_rows() > 0) {
                                    $i = 1;
                                    $total_qty = 0;
                                    foreach ($q3->result() as $res3) {
                                       echo "<td>" . $i . "</td>";
                                       echo "<td>" . show_date($res3->entry_date) . "</td>";
                                       echo "<td>" . $res3->qty . "</td>";
                                       echo "<td>" . $res3->note . "</td>";
                                       echo '<td><i class="fa fa-trash text-red pointer" onclick="delete_stock_entry(' . $res3->id . ')"> Delete</i></td>';
                                       echo "</tr>";
                                       $i++;
                                       $total_qty += $res3->qty;
                                    }
                                    echo "<tr>
                                    <td colspan='2' class='text-right text-bold'>" . $this->lang->line('total') . "</td>
                                    <td>" . $total_qty . "<td>
                                    <td></td>

                                    </tr>";
                                 } else {
                                    echo "<tr><td colspan='5' class='text-center text-bold'>Không có sản phẩm nào!!</td></tr>";
                                 }
                              } else {
                                 echo "<tr><td colspan='5' class='text-center text-bold'>Không có sản phẩm nào!!</td></tr>";
                              }
                              ?>
                           </tbody>
                        </table>


                     </div>
                     <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
               </div>
               <!-- /.row -->
         </section>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php include "footer.php"; ?>
      <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
   </div>


   <!-- ./wrapper -->
   <!-- SOUND CODE -->
   <?php include "comman/code_js_sound.php"; ?>
   <!-- TABLES CODE -->
   <?php include "comman/code_js_form.php"; ?>
   <script src="<?php echo $theme_link; ?>js/items.js"></script>
   <script src="<?php echo $theme_link; ?>js/modals.js"></script>
   <script>
      $("#discount_type").val('<?= $discount_type; ?>');
      //  $("#category_item_id").val('<?= $category_item_id; ?>');
   </script>

   <script>
      $(document).ready(function () {
         // Lắng nghe sự kiện thay đổi của dropdown
         $('#category_id').change(function () {
            // Lấy giá trị của option được chọn
            var selectedOption = $(this).find(':selected');

            // Kiểm tra xem option có giá trị hay không
            if (selectedOption.val() !== '') {
               // Lấy giá trị của category_id
               var category_id = selectedOption.val();

               // Lấy giá trị của category_item_id
               var category_item_id = selectedOption.data('parent-id');

               // Hiển thị giá trị của category_id và category_item_id (có thể sử dụng để kiểm tra)
               console.log("Selected category_id: " + category_id);
               console.log("Selected category_item_id: " + category_item_id);

               $("#category_item_id").val(category_item_id);
            }
         });




         $('#kind_input_id').on('change', function () {
            const selectedValue = $(this).val();
            const selectedText = $("#kind_input_id option:selected").text();
            console.log("Giá trị được chọn: ", selectedValue + "=" + selectedText);
            // Thực hiện các hành động khác dựa trên giá trị đã chọn ở đây

            var item_name = $("#item_name").val() + " " + selectedText;
            var ma_vach = "";
            var gia_nhap = $('#price').val();
            var gia_ban = $('#sales_price').val();
            var ton_kho = $('#new_opening_stock').val();

            if (gia_nhap == undefined) {
               gia_nhap = '0';
            }

            if (gia_ban == undefined) {
               gia_ban = '0';
            }

            if (ton_kho == undefined) {
               ton_kho = '999';
            }



            $("#hidden_rowcount").val(parseFloat($("#hidden_rowcount").val()) + 1);

            var maxid = $("#maxid").val();

            var itemCode = 'IT' + String(maxid).padStart(4, '0');
            $("#maxid").val(parseFloat($("#maxid").val()) + 1);



            var rowcount = $("#hidden_rowcount").val();//0,1,2...
            var str = ' <tr id="row_' + rowcount + '" data-row="0" data-item-id=' + rowcount + '>';/*item id*/

            var remove_btn = '<a class="fa fa-fw fa-trash-o text-red" style="cursor: pointer;font-size: 20px;" onclick="removerow(' + rowcount + ')" title="Delete Item?"></a>';

            //ten san pham
            info = '<input id="item_name_' + rowcount + '"  name="item_name_' + rowcount + '" type="text" class="form-control no-padding min_width" value="' + item_name + '">';
            str += '<td id="td_' + rowcount + '_1" class="text-right">' + info + '</td>';
            //ma san pham
            info = '<input id="item_code_' + rowcount + '"  name="item_code_' + rowcount + '" type="text" class="form-control no-padding min_width" value="' + itemCode + '">';
            str += '<td id="td_' + rowcount + '_2" class="text-right">' + info + '</td>';

            //ma vach
            info = '<input id="barcode_' + rowcount + '"  name="barcode_' + rowcount + '" type="text" class="form-control no-padding min_width" value="' + '' + '">';
            str += '<td id="td_' + rowcount + '_3" class="text-right">' + info + '</td>';

            //tồn kho
            info = '<input id="new_opening_stock_' + rowcount + '"  name="new_opening_stock_' + rowcount + '" type="text" class="form-control no-padding min_width" value="' + ton_kho + '">';
            str += '<td id="td_' + rowcount + '_4" class="text-right">' + info + '</td>';

            //Giá nhập
            info = '<input id="price_' + rowcount + '"  name="price_' + rowcount + '" type="text" class="form-control no-padding min_width" value="' + gia_nhap + '">';
            str += '<td id="td_' + rowcount + '_5" class="text-right">' + info + '</td>';

            //Giá bán
            info = '<input id="sales_price_' + rowcount + '"  name="sales_price_' + rowcount + '" type="text" class="form-control no-padding min_width" value="' + gia_ban + '">';
            str += '<td id="td_' + rowcount + '_6" class="text-right">' + info + '</td>';

            str+='<input type="hidden" id="kind_id_'+rowcount+'" name="kind_id_'+rowcount+'" value="'+selectedValue+'">';

            str += '<td id="td_' + rowcount + '_7">' + remove_btn + '</td>';/* td_0_5 item gst_amt */

            $('#pos-form-tbody').append(str);


         });
      });
   </script>

   <!-- Make sidebar menu hughlighter/selector -->
   <script>
      $(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");

      function removerow(id) {//id=Rowid  
         $("#row_" + id).remove();
         $("#hidden_rowcount").val(parseFloat($("#hidden_rowcount").val()) - 1);
         $("#maxid").val(parseFloat($("#maxid").val()) - 1);

      }

      if($("#type_item").val()=='update'){
         //kinds_input,lichsu
         $("#kinds_input").hide();
         $("#lichsu").show();

      } else {
         $("#kinds_input").show();
         $("#lichsu").hide();

      }


   </script>
</body>

</html>