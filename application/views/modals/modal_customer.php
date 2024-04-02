<div class="modal fade " id="customer-modal" tabindex='-1'>
  <?= form_open('#', array('class' => '', 'id' => 'customer-form')); ?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header header-custom">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">
          <?= $this->lang->line('add_customer'); ?>
        </h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="box-body4">
              <div class="form-group">
                <label for="customer_name">
                  <?= $this->lang->line('customer_name'); ?>*
                </label>
                <span id="customer_name_msg" class="text-danger text-right pull-right"></span>
                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box-body4">
              <div class="form-group">
                <label for="mobile">
                  <?= $this->lang->line('phone'); ?>
                </label>
                <span id="mobile_msg" class="text-danger text-right pull-right"></span>
                <input type="tel" class="form-control no_special_char_no_space " id="mobile" name="mobile"
                  placeholder="">
              </div>
            </div>
          </div>

        <!--   <div class="col-md-4">
            <div class="box-body4">
              <div class="form-group">
                <label for="phone">
                  <?= $this->lang->line('phone'); ?>
                </label>
                <span id="phone_msg" class="text-danger text-right pull-right"></span>
                <input type="tel" maxlength="10" class="form-control maxlength no_special_char_no_space " id="phone"
                  name="phone" placeholder="">
              </div>
            </div>
          </div> -->
          <div class="col-md-4">
            <div class="box-body4">
              <div class="form-group">
                <label for="email">
                  <?= $this->lang->line('email'); ?>
                </label>
                <span id="email_msg" class="text-danger text-right pull-right"></span>
                <input type="email" class="form-control " id="email" name="email" placeholder="">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box-body4">
              <div class="form-group">
                <label for="opening_balance">
                  <?= $this->lang->line('previous_due'); ?>
                </label>
                <span id="opening_balance_msg" class="text-danger text-right pull-right"></span>
                <input type="text" class="form-control" id="opening_balance" name="opening_balance" placeholder="">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box-body4">
              <div class="form-group">
                <label for="type_id" >Loại khách hàng</label>
                <span id="type_id_msg" class="text-danger text-right pull-right"></span>
                <select class="form-control select2" id="type_id" name="type_id" style="width: 100%;"
                  onkeyup="shift_cursor(event,'type_id')">
                  <?php
                  $query2 = "select * from db_types where status=1";
                  $q2 = $this->db->query($query2);
                  if ($q2->num_rows() > 0) {
                    echo '<option value="">-Select-</option>';
                    foreach ($q2->result() as $res1) {
                      $selected = (1 == $res1->id) ? 'selected' : '';
                      echo "<option $selected value='" . $res1->id . "'>" . $res1->type_name . "</option>";
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
          </div>


          <div class="col-md-4">
            <div class="box-body4">
              <div class="form-group">
                <label for="tax_number">
                  <?= $this->lang->line('tax_number'); ?>
                </label>
                <span id="tax_number_msg" class="text-danger text-right pull-right"></span>
                <input type="text" class="form-control maxlength  " id="tax_number" name="tax_number" placeholder="">
              </div>
            </div>
          </div>


          <?php 
                         //Change Return
                         $CI =& get_instance();
                         $country = $this->db->query("SELECT country FROM db_company")->row()->country;
                         
                    ?>

          <div class="col-md-4">
            <div class="box-body4">
              <div class="form-group">
                <label for="country">
                  <?= $this->lang->line('country'); ?>
                </label>
                <span id="country_msg" class="text-danger text-right pull-right"></span>
                <select class="form-control select2" id="country" name="country" style="width: 100%;"
                  onkeyup="shift_cursor(event,'state')" value="">
                  <?php
                  $query1 = "select * from db_country where status=1";
                  $q1 = $this->db->query($query1);
                  if ($q1->num_rows($q1) > 0) {
                    foreach ($q1->result() as $res1) {
                      $selected = ($res1->country == $country) ? 'selected' : '';
                      echo "<option $selected value='" . $res1->id . "'>" . $res1->country . "</option>";
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
          </div>

          <?php 
                         //Change Return
                         $CI =& get_instance();
                         $state = $this->db->query("SELECT state FROM db_company")->row()->state;
                         
                    ?>

          <div class="col-md-4">
            <div class="box-body4">
              <div class="form-group">
                <label for="city">
                  <?= $this->lang->line('city'); ?>
                </label>
                <span id="city_msg" class="text-danger text-right pull-right"></span>
                <input type="text" class="form-control" id="city" name="city" placeholder="">
              </div>
            </div>
          </div>
        
          <div class="col-md-4">
            <div class="box-body4">
              <div class="form-group">
                <label for="address">
                  <?= $this->lang->line('address'); ?>
                </label>
                <span id="address_msg" class="text-danger text-right pull-right"></span>
                <textarea type="text" class="form-control" id="address" name="address" placeholder=""></textarea>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_customer">Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  <?= form_close(); ?>
</div>
<!-- /.modal -->