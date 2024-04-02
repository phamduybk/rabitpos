<?php
/*$q1 = $this->db->select('permissions')->get('db_permissions');
echo "<pre>";
              print_r($q1->result_array());
              exit();*/
?>
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
    if (!isset($name)) {
      $name = $description = "";
      $date = 0;
    }

    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $page_title; ?>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo $base_url; ?>guaran_package/view">
              <?= $this->lang->line('guarantee_list'); ?>
            </a></li>
          <li class="active">
            <?= $page_title; ?>
          </li>
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
                <h3 class="box-title">Hãy nhập gói bảo hành và chính sách bảo hành</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" id="roles-form" onkeypress="return event.keyCode != 13;">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                  value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="base_url" value="<?php echo $base_url;
                ; ?>">
                <div class="box-body">
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">
                      <?= $this->lang->line('role_name'); ?><label class="text-danger">*</label>
                    </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control input-sm" id="name" name="name" placeholder=""
                        onkeyup="shift_cursor(event,'description')" value="<?php print $name; ?>" autofocus>
                      <span id="name_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">
                      <?= $this->lang->line('description'); ?>
                    </label>
                    <div class="col-sm-4">
                      <textarea type="text" class="form-control" id="description" name="description"
                        placeholder=""><?php print $description; ?></textarea>
                      <span id="description_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">
                      <?= $this->lang->line('date_guarantee'); ?><label class="text-danger">*</label>
                    </label>
                    <div class="col-sm-4">
                           <select class="form-control select2" id="date"
                                                   name="date" style="width: 100%;">
                                                   <option value="3">3 ngày</option>
                                                   <option value="7">1 tuần</option>
                                                   <option value="14">2 tuần</option>
                                                   <option value="30">1 tháng</option>
                                                   <option value="60">2 tháng</option>
                                                   <option value="180">6 tháng</option>
                                                   <option value="365">1 năm</option>
                                                   <option value="730">2 năm</option>
                                                   <option value="1095">3 năm</option>
                                                   <option value="1825">5 năm</option>
                                                </select>
                    </div>
                  </div>



                </div>
                <!-- /.box-footer -->
                <div class="box-footer">
                  <div class="col-sm-8 col-sm-offset-2 text-center">
                    <!-- <div class="col-sm-4"></div> -->
                    <?php
                    if ($name != "") {
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

  <script type="text/javascript">
      $("#date").val('<?= $date; ?>').select2();
   </script>
  <script src="<?php echo $theme_link; ?>js/guaran_package.js"></script>
  <!-- SELECT THE CHECKBOX'S -->
  <!-- Make sidebar menu hughlighter/selector -->
  <script>$(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");</script>
</body>

</html>