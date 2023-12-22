<div class="modal fade" id="multiple-payments-modal" tabindex='-1'>

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header header-custom">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Thanh toán</h4>
      </div>
      <div class="modal-body">

        <div class="row">
          <!-- LEFT HAND -->
          <div class="col-md-8">
            <div>

              <?php
              $atleast_one_payments = 'true';
              if (isset($sales_id) && $sales_id != '') { //For Save Operation or for new entry

                $q22 = $this->db->query("select payment,payment_type,payment_note from db_salespayments where sales_id='$sales_id'");
                if ($q22->num_rows() > 0) {
                  $atleast_one_payments = 'false';
                  $i = 0;
                  foreach ($q22->result() as $res22) {
                    $i++;
              ?>
                    <div class="col-md-12  payments_div">
                      <div class="box box-solid bg-gray">
                        <div class="box-body">
                          <div class="row">

                            <div class="col-md-6">
                              <div class="">
                                <label for="amount_<?= $i; ?>">Amount</label>
                                <input type="text" class="form-control text-right payment only_currency" value='<?= $res22->payment; ?>' id="amount_<?= $i; ?>" name="amount_<?= $i; ?>" placeholder="" onkeyup="calculate_payments()">
                                <span id="amount_<?= $i; ?>_msg" style="display:none" class="text-danger"></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="">
                                <label for="payment_type_<?= $i; ?>">Payment Type</label>
                                <select class="form-control" id='payment_type_<?= $i; ?>' name="payment_type_<?= $i; ?>">
                                  <?php
                                  $q1 = $this->db->query("select * from db_paymenttypes where status=1");
                                  if ($q1->num_rows() > 0) {
                                    foreach ($q1->result() as $res1) {
                                      $selected = ($res22->payment_type == $res1->payment_type) ? 'selected' : '';
                                      echo "<option $selected value='" . $res1->payment_type . "'>" . $res1->payment_type . "</option>";
                                    }
                                  } else {
                                    echo "No Records Found";
                                  }
                                  ?>
                                </select>
                                <span id="payment_type_<?= $i; ?>_msg" style="display:none" class="text-danger"></span>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="">
                                <label for="payment_note_<?= $i; ?>">Payment Note</label>
                                <textarea type="text" class="form-control" id="payment_note_<?= $i; ?>" name="payment_note_<?= $i; ?>" placeholder=""><?= $res22->payment_note; ?></textarea>
                                <span id="payment_note_<?= $i; ?>_msg" style="display:none" class="text-danger"></span>
                              </div>
                            </div>

                            <div class="clearfix"></div>
                          </div>
                        </div>
                      </div>
                    </div><!-- col-md-12 -->
                  <?php } //foreach() 
                  ?>

                  <input type="hidden" data-var='inside_forech' name="payment_row_count" id='payment_row_count' value="<?= $i; ?>">

                <?php } //num_rows if() 
                else {
                  $atleast_one_payments = 'true';
                }
                ?>

              <?php
              }
              if ($atleast_one_payments == 'true') { ?>
                <input type="hidden" data-var='inside_else' name="payment_row_count" id='payment_row_count' value="1">
                <div class="col-md-12  payments_div">
                  <div class="box box-solid bg-gray">
                    <div class="box-body">
                      <div class="row">

                        <div class="col-md-6">
                          <div class="">
                            <label for="amount_1">Khách trả</label>
                            <input type="text" class="form-control text-right custom-font-size payment" id="amount_1" name="amount_1" placeholder="" onkeyup="calculate_payments()">
                            <span id="amount_1_msg" style="display:none" class="text-danger"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="">
                            <label for="payment_type_1">Ghi chú thanh toán</label>
                            <select class="form-control" id='payment_type_1' name="payment_type_1">
                              <?php
                              $q1 = $this->db->query("select * from db_paymenttypes where status=1");
                              if ($q1->num_rows() > 0) {
                                $count = 0; // Số thứ tự của lựa chọn
                                foreach ($q1->result() as $res1) {
                                  $count++;

                                  if ($count == 1) continue;
                                  // Nếu đây là lựa chọn thứ hai, thêm thuộc tính selected
                                  $selected = ($count == 2) ? 'selected' : '';

                                  if($res1->bank_number != '' && $res1->bank_number!=null) {
                                    echo "<option value='" .
                                    'STK: ' .
                                    $res1->bank_number .
                                    '==>' .
                                    $res1->bank_name .
                                    ' (' .
                                    $res1->bank_infor .
                                    ') ====' .
                                    $res1->bank_image .
                                    "' $selected>" . $res1->payment_type . "</option>";
                                  } else {
                                    echo "<option value='" .
                                    "' $selected>" . $res1->payment_type . "</option>";
                                  }

                                 
                                }
                              } else {
                                echo "No Records Found";
                              }
                              ?>
                            </select>
                            <span id="payment_type_1_msg" style="display:none" class="text-danger"></span>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="">
                            <label for="payment_note_1">Ghi chú thanh toán</label>
                            <textarea type="text" class="form-control" id="payment_note_1" name="payment_note_1" placeholder=""></textarea>
                            <span id="payment_note_1_msg" style="display:none" class="text-danger"></span>
                          </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="modal-footer" id='modal_tienmat'>
                          <button type="button" class="btn btn-default btn-lg" id="click_1k">1K</button>
                          <button type="button" class="btn btn-default btn-lg" id="click_2k">2K</button>
                          <button type="button" class="btn btn-default btn-lg" id="click_5k">5K</button>
                          <button type="button" class="btn btn-default btn-lg" id="click_10k">10K</button>
                          <button type="button" class="btn btn-default btn-lg" id="click_20k">20K</button>
                          <button type="button" class="btn btn-default btn-lg" id="click_50k">50K</button>
                          <button type="button" class="btn btn-default btn-lg" id="click_100k">100k</button>
                          <button type="button" class="btn btn-default btn-lg" id="click_200k">200k</button>
                          <button type="button" class="btn btn-default btn-lg" id="click_500k">500k</button>
                        </div>

                        <div class="modal-footer" id='madal_bank' style="display:none">


                          <div class="col-md-6 ">
                            <div class="form-group">
                              <div class="col-sm-8 col-sm-offset-4 text-center">
                                <!-- Thêm class 'text-center' để căn giữa theo chiều ngang -->
                                <img width="300px" id='bank_image_show' height="300px" class='img-responsive' style='border:3px solid #d2d6de; display: inline-block;' src="<?php echo base_url($bank_image); ?>">
                                <!-- Thêm style 'display: inline-block;' để div bao quanh hình ảnh chỉ chiếm chiều rộng của nội dung bên trong -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default btn-lg" id="clear_all">Xóa tất cả</button>
                        </div>

                      </div>
                    </div>
                  </div>
                </div><!-- col-md-12 -->
              <?php } ?>

            </div>



            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <button type="button" class="btn btn-primary btn-block" id="add_payment_row">Add Payment Row</button>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- col-md-9 -->


          <!-- RIGHT HAND -->
          <div class="col-md-4">




            <div class="col-md-12">

              <div class="box box-solid bg-blue">
                <div class="box-body">
                  <div class="row ">
                    <div class="col-md-12 border-custom-bottom">
                      <span class="col-md-6 text-right text-bold ">Tổng số lượng:</span>
                      <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_qty">0</span>
                    </div>
                  </div>

                  <div class="row ">
                    <div class="col-md-12 border-custom-bottom">
                      <span class="col-md-6 text-right text-bold ">Tổng:</span>
                      <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_amt">0</span>
                    </div>
                  </div>
                  <!--  -->
                  <div class="row ">
                    <div class="col-md-12 border-custom-bottom">
                      <span class="col-md-6 text-right text-bold ">Giảm giá(-):</span>
                      <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_discount">0</span>
                    </div>
                  </div>
                  <!--  -->
                  <div class="row bg-red">
                    <div class="col-md-12 border-custom-bottom">
                      <span class="col-md-6 text-right text-bold ">Số tiền cần thanh toán:</span>
                      <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_payble">0</span>
                    </div>
                  </div>
                  <!--  -->
                  <div class="row ">
                    <div class="col-md-12 border-custom-bottom">
                      <span class="col-md-6 text-right text-bold ">Số tiền khách trả:</span>
                      <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_paid">0</span>
                    </div>
                  </div>
                  <!--  -->
                  <!--  -->
                  <div class="row ">
                    <div class="col-md-12 border-custom-bottom">
                      <span class="col-md-6 text-right text-bold ">Số tiền thiếu:</span>
                      <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_balance">0</span>
                    </div>
                  </div>
                  <!--  -->
                  <div class="row ">
                    <div class="col-md-12 bg-orange">
                      <span class="col-md-6 text-right text-bold ">Trả lại tiền:</span>
                      <span class="col-md-6 text-right text-bold  custom-font-size sales_div_change_return">0</span>
                    </div>
                  </div>
                  <!--  -->

                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Đóng lại</button>
        <button type="button" class="btn bg-maroon btn-lg make_sale btn-lg" onclick="save()"><i class="fa  fa-save "></i> Lưu lại</button>
        <button type="button" class="btn btn-success btn-lg make_sale btn-lg" onclick="save(true)"><i class="fa  fa-print "></i> Lưu lại & In </button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  <script>

  </script>
</div>