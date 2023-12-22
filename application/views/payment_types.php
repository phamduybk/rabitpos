<!DOCTYPE html>
<html>

<head>
  <!-- TABLES CSS CODE -->
  <?php include "comman/code_css_form.php"; ?>
  <!-- </copy> -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include "sidebar.php"; ?>
    <?php
    if (!isset($payment_type_name)) {
      $payment_type_name = "";
    }
    if (!isset($bank_number)) {
      $bank_number = "";
    }
    if (!isset($bank_name)) {
      $bank_name = "";
    }
    if (!isset($bank_infor)) {
      $bank_infor = "";
    }
    if (!isset($bank_image)) {
      $bank_image = "";
    }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $page_title; ?>
          <small>Add/Update Records</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo $base_url; ?>payment_types"><?= $this->lang->line('payment_types_list'); ?></a></li>
          <li class="active"><?= $this->lang->line('payment_types'); ?></li>
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

              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" id="payment-types-form" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                <div class="box-body">


                  <div class="form-group">
                    <label for="payment_type_name" class="col-sm-2 control-label"><?= $this->lang->line('payment_type_name'); ?><label class="text-danger">*</label></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control input-sm" id="payment_type_name" name="payment_type_name" placeholder="" onkeyup="shift_cursor(event,'description')" value="<?php print $payment_type_name; ?>" autofocus>
                      <span id="payment_type_name_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="bank_number" class="col-sm-2 control-label">Số tài khoản<label class="text-danger"></label></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control input-sm" id="bank_number" name="bank_number" placeholder="" onkeyup="shift_cursor(event,'description')" value="<?php print $bank_number; ?>" autofocus>
                      <span id="bank_number_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="bank_name" class="col-sm-2 control-label">Tên tài khoản<label class="text-danger"></label></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control input-sm" id="bank_name" name="bank_name" placeholder="" onkeyup="shift_cursor(event,'description')" value="<?php print $bank_name; ?>" autofocus>
                      <span id="bank_name_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="bank_infor" class="col-sm-2 control-label">Thông tin thêm<label class="text-danger"></label></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control input-sm" id="bank_infor" name="bank_infor" placeholder="" onkeyup="shift_cursor(event,'description')" value="<?php print $bank_infor; ?>" autofocus>
                      <span id="bank_name_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <?php if (up_load()) { ?>
                      <label for="bank_image" class="col-sm-2 control-label">Ảnh QR code</label>
                      <div class="col-sm-4">
                        <input type="file" id="bank_image" name="bank_image">
                        <span id="bank_image_msg" style="display:block;" class="text-danger">Max Width/Height: 1000px *
                          1000px & Size: 1024kb </span>
                      </div>
                    <?php } ?>

                  </div>

                  <div class="col-md-6 ">
                    <div class="form-group">
                      <div class="col-sm-8 col-sm-offset-4">
                        <img width="200px" height="200px" class='img-responsive' style='border:3px solid #d2d6de;' src="<?php echo base_url($bank_image); ?>">
                      </div>
                    </div>
                  </div>




                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="col-sm-8 col-sm-offset-2 text-center">
                      <!-- <div class="col-sm-4"></div> -->
                      <?php
                      if ($payment_type_name != "") {
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
                        <button type="button" id="<?php echo $btn_id; ?>" class=" btn btn-block btn-success" title="Save Data"><?php echo $btn_name; ?></button>
                      </div>
                      <div class="col-sm-3">
                        <a href="<?= base_url('dashboard'); ?>">
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

  <script src="<?php echo $theme_link; ?>js/payment_types.js"></script>
  <!-- Make sidebar menu hughlighter/selector -->
  <script>
    $(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");
  </script>
</body>

</html>