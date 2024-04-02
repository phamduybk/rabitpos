<div class="sales_item_modal">
   <div class="modal fade in" id="sales_item" tabindex='-1'>
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header header-custom">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
               <h4 class="modal-title text-center">
                  <?= $this->lang->line('manage_sales_item'); ?>
               </h4>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                           <b>
                              <?= $this->lang->line('item_name'); ?> :
                           </b> <span id='popup_item_name'><span>
                        </div>
                        <!-- /.col -->
                     </div>
                     <!-- /.row -->
                  </div>
                  <div class="col-md-12">
                     <div>

                        <div class="col-md-12 ">
                           <div class="box box-solid bg-gray">
                              <div class="box-body">
                                 <div class="row">

                                    <div class="col-md-6 <?= tax_disable_class() ?>">
                                       <div class="form-group">
                                          <label for="popup_tax_type">
                                             <?= $this->lang->line('tax_type'); ?>
                                          </label>
                                          <select class="form-control" id="popup_tax_type" name="popup_tax_id"
                                             style="width: 100%;">
                                             <option value="Exclusive">Exclusive</option>
                                             <option value="Inclusive">Inclusive</option>
                                          </select>
                                       </div>

                                    </div>

                                    <div class="col-md-6 <?= tax_disable_class() ?>">
                                       <div class="form-group">
                                          <label for="popup_tax_id">
                                             <?= $this->lang->line('tax'); ?>
                                          </label>
                                          <select class="form-control" id="popup_tax_id" name="popup_tax_id"
                                             style="width: 100%;">
                                             <?php
                                             $query2 = "select * from db_tax where status=1";
                                             $q2 = $this->db->query($query2);
                                             if ($q2->num_rows() > 0) {
                                                echo '<option value="">-Select-</option>';
                                                foreach ($q2->result() as $res1) {
                                                   echo "<option data-tax='" . $res1->tax . "' data-tax-value='" . $res1->tax_name . "' value='" . $res1->id . "'>" . $res1->tax_name . "</option>";
                                                }
                                             } else {
                                                ?>
                                                <option value="">No Records Found</option>
                                                <?php
                                             }
                                             ?>
                                          </select>
                                       </div>

                                    </div>

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="item_discount_type">
                                             Loại giá bán
                                          </label>
                                          <select class="form-control" id="type_price_type" name="type_price_type"
                                             style="width: 100%;">
                                             <option value='0'>Giá bán lẻ</option>
                                             <option value='1'>Giá bán buôn</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="item_discount_type">
                                             <?= $this->lang->line('discount_type'); ?>
                                          </label>
                                          <select class="form-control" id="item_discount_type" name="item_discount_type"
                                             style="width: 100%;">
                                             <option value='Percentage'>Percentage(%)</option>
                                             <option value='Fixed'>Fixed(
                                                <?= $CI->currency() ?>)
                                             </option>
                                          </select>
                                       </div>

                                    </div>

                                    <input type="text" class="form-control" id="type_show_time" name="type_show_time"
                                       style="display:none" placeholder="" value="<?php print $type_show_time; ?>">

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="item_discount_input">
                                             <?= $this->lang->line('discount'); ?>
                                          </label>
                                          <input type="text" class="form-control only_currency" id="item_discount_input"
                                             name="item_discount_input" placeholder="" value="0">
                                       </div>

                                    </div>

                                    <div class="col-md-6" id="form_start_date">
                                       <div class="form-group">
                                          <label for="item_discount_type">
                                             Thời gian bắt đầu
                                          </label>
                                          <input type="time" class="form-control pull-right time" id="start_date"
                                             name="start_date" value="">
                                       </div>
                                    </div>

                                    <div class="col-md-6" id="form_end_date">
                                       <div class="form-group">
                                          <label for="item_discount_type">
                                             Thời gian kết thúc
                                          </label>

                                          <?php
                                          // Get the current time in HH:MM format
                                          $current_time = date("H:i");

                                          // Set the current time as the default value for the input field
                                          echo '<input type="time" class="form-control pull-right time" id="end_date" name="end_date" value="' . $current_time . '">';
                                          ?>
                                       </div>
                                    </div>


                                    <div class="col-md-12">

                                       <div class="col-md-4">
                                          <div class="form-group">

                                             <div class="checkbox-list">
                                                <?php
                                                $queryItems = "SELECT item_child_name, id, price,group_id FROM db_item_childs WHERE status = 1 order by item_child_name";
                                                $resultItems = $this->db->query($queryItems);

                                                $count = 0;
                                                if ($resultItems->num_rows() > 0) {
                                                   foreach ($resultItems->result() as $item) {
                                                      if ($item->group_id % 3 == 0) {

                                                         if ($item->price > 0) {
                                                            $name_show = $item->item_child_name . ' - ' . $item->price . ' ' . $CI->currency();
                                                         } else {
                                                            $name_show = $item->item_child_name;
                                                         }

                                                         echo '<div class="checkbox white-checkbox">'; // Added custom class "white-checkbox"
                                                         echo '<label>';
                                                         echo '<input type="checkbox" class="item-checkbox" data-item-id="' . $item->id . '" data-item-price="' . $item->price . '" data-item-name="' . $name_show . '" onclick="calculateSubPrice()"> ' . $name_show;
                                                         echo '</label>';
                                                         echo '</div>';
                                                      }
                                                      $count++;
                                                   }
                                                } else {
                                                   echo '<p>No items found</p>';
                                                }
                                                ?>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <!-- Display the second column of checkboxes here -->
                                             <div class="checkbox-list">
                                                <?php
                                                $count = 0;
                                                if ($resultItems->num_rows() > 0) {
                                                   foreach ($resultItems->result() as $item) {
                                                      if ($item->group_id % 3 == 1) {

                                                         if ($item->price > 0) {
                                                            $name_show = $item->item_child_name . ' - ' . $item->price . ' ' . $CI->currency();
                                                         } else {
                                                            $name_show = $item->item_child_name;
                                                         }
                                                         echo '<div class="checkbox white-checkbox">'; // Added custom class "white-checkbox"
                                                         echo '<label>';
                                                         echo '<input type="checkbox" class="item-checkbox" data-item-id="' . $item->id . '" data-item-price="' . $item->price . '" data-item-name="' . $name_show . '" onclick="calculateSubPrice()"> ' . $name_show;
                                                         echo '</label>';
                                                         echo '</div>';
                                                      }
                                                      $count++;
                                                   }
                                                }
                                                ?>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <!-- Display the second column of checkboxes here -->
                                             <div class="checkbox-list">
                                                <?php
                                                $count = 0;
                                                if ($resultItems->num_rows() > 0) {
                                                   foreach ($resultItems->result() as $item) {
                                                      if ($item->group_id % 3 == 2) {

                                                         if ($item->price > 0) {
                                                            $name_show = $item->item_child_name . ' - ' . number_format(($item->price), 0) . $CI->currency();
                                                         } else {
                                                            $name_show = $item->item_child_name;
                                                         }
                                                         echo '<div class="checkbox white-checkbox">'; // Added custom class "white-checkbox"
                                                         echo '<label>';
                                                         echo '<input type="checkbox" class="item-checkbox" data-item-id="' . $item->id . '" data-item-price="' . $item->price . '" data-item-name="' . $name_show . '" onclick="calculateSubPrice()"> ' . $name_show;
                                                         echo '</label>';
                                                         echo '</div>';
                                                      }
                                                      $count++;
                                                   }
                                                }
                                                ?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="sub_price_input_label">
                                             <?= $this->lang->line('sub_price'); ?>
                                          </label>
                                          <input type="text" class="form-control only_currency" id="sub_price_input"
                                             name="sub_price_input" placeholder="" value="0">
                                       </div>

                                    </div>

                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="popup_tax_type">
                                             <?= $this->lang->line('description'); ?>
                                          </label>
                                          <textarea type="text" class="form-control" id="popup_description"
                                             placeholder=""></textarea>
                                       </div>

                                    </div>





                                    <!-- <div class="col-md-6">
                                       <div class="">
                                          <label for="popup_tax_amt">Tax Amount</label>
                                          <input type="text" class="form-control text-right paid_amt" id="popup_tax_amt" name="popup_tax_amt" readonly>
                                          <span id="popup_tax_amt_msg"  style="display:none" class="text-danger"></span>
                                       </div>
                                    </div> -->

                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- col-md-12 -->
                     </div>
                  </div>
                  <!-- col-md-9 -->
                  <!-- RIGHT HAND -->
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" id="popup_row_id">
               <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
               <button type="button" onclick="set_info()" class="btn bg-green btn-lg place_order btn-lg">Set<i
                     class="fa  fa-check "></i></button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
</div>