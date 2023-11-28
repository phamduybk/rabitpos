<div class="purchase_item_modal">
   <div class="modal fade in" id="purchase_item" tabindex='-1'>
      <div class="modal-dialog ">
         <div class="modal-content">
            <div class="modal-header header-custom">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span></button>
               <h4 class="modal-title text-center"><?= $this->lang->line('manage_purchase_item'); ?></h4>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                           <b><?= $this->lang->line('item_name'); ?> : </b> <span id='popup_item_name'><span>
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
                                    
                                    <div class="col-md-6 <?=tax_disable_class()?>">
                                        <div class="form-group">
                                          <label for="popup_tax_type"><?= $this->lang->line('tax_type'); ?></label>
                                         <select class="form-control" id="popup_tax_type" name="popup_tax_id"  style="width: 100%;" >
                                          <option value="Exclusive">Exclusive</option>
                                           <option value="Inclusive">Inclusive</option>
                                          </select>
                                        </div>
                                   
                                    </div>

                                    <div class="col-md-6 <?=tax_disable_class()?>">
                                        <div class="form-group">
                                          <label for="popup_tax_id"><?= $this->lang->line('tax'); ?></label>
                                         <select class="form-control" id="popup_tax_id" name="popup_tax_id"  style="width: 100%;" >
                                            <?php
                                            $query2="select * from db_tax where status=1";
                                            $q2=$this->db->query($query2);
                                            if($q2->num_rows()>0)
                                             {
                                              echo '<option value="">-Select-</option>'; 
                                              foreach($q2->result() as $res1)
                                               {
                                                 echo "<option data-tax='".$res1->tax."' data-tax-value='".$res1->tax_name."' value='".$res1->id."'>".$res1->tax_name."</option>";
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="item_discount_type"><?= $this->lang->line('discount_type'); ?></label>
                                         <select class="form-control" id="item_discount_type" name="item_discount_type"  style="width: 100%;" >
                                          <option value='Percentage'>Percentage(%)</option>
                                          <option value='Fixed'>Fixed(<?= $CI->currency() ?>)</option>
                                          </select>
                                        </div>
                                   
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="item_discount_input"><?= $this->lang->line('discount'); ?></label>
                                        <input type="text" class="form-control only_currency" id="item_discount_input" name="item_discount_input" placeholder="" value="0">
                                        </div>
                                   
                                    </div>
                                   

                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label for="popup_tax_type"><?= $this->lang->line('description'); ?></label>
                                         <textarea type="text" class="form-control" id="popup_description" placeholder=""></textarea>
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
               <button type="button" onclick="set_info()" class="btn bg-green btn-lg place_order btn-lg">Set<i class="fa  fa-check "></i></button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
</div>
