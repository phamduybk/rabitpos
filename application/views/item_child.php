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
    if (!isset($item_child_name)) {
      $item_child_name = $description = "";
      $group_id = $price = "0";
    }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $this->lang->line('item_child'); ?>
          <small>Add/Update Kind</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo $base_url; ?>item_childs">
              <?= $this->lang->line('view_kinds'); ?>
            </a></li>
          <li class="active">
            <?= $this->lang->line('kind'); ?>
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

              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" id="units-form" onkeypress="return event.keyCode != 13;">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                  value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="base_url" value="<?php echo $base_url;
                ; ?>">
                <div class="box-body">


                  <div class="form-group">
                    <label for="item_child_name" class="col-sm-2 control-label">
                      <?= $this->lang->line('item_child_name'); ?><label class="text-danger">*</label>
                    </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control input-sm" id="item_child_name" name="item_child_name"
                        placeholder="" onkeyup="shift_cursor(event,'description')"
                        value="<?php print $item_child_name; ?>" autofocus>
                      <span id="item_child_name_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">
                      <?= $this->lang->line('price'); ?><label class="text-danger">*</label>
                    </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control input-sm" id="price" name="price" placeholder=""
                        onkeyup="shift_cursor(event,'description')" value="<?php print $price; ?>" autofocus>
                      <span id="price_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="group_id" class="col-sm-2 control-label">
                      <?= $this->lang->line('group'); ?><label class="text-danger">*</label>
                    </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control input-sm" id="group_id" name="group_id" placeholder=""
                        onkeyup="shift_cursor(event,'description')" value="<?php print $group_id; ?>" autofocus>
                      <span id="group_id_msg" style="display:none" class="text-danger"></span>
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


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="col-sm-8 col-sm-offset-2 text-center">
                    <!-- <div class="col-sm-4"></div> -->
                    <?php
                    if ($item_child_name != "") {
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

  <script src="<?php echo $theme_link; ?>js/item_childs.js"></script>
  <!-- Make sidebar menu hughlighter/selector -->
  <script>$(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");</script>
</body>

</html>