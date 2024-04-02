<!DOCTYPE html>
<html>

<head>
  <!-- TABLES CSS CODE -->
  <?php include "comman/code_css_form.php"; ?>
  <!-- </copy>q_id -->
</head>

<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- Messages: style can be found in dropdown.less-->
            <li class="hidden-xs" id="fullscreen"><a title="Fullscreen On/Off"><i
                  class="fa fa-arrows-alt text-white"></i> </a></li>
            <li class="text-center" id="">
              <a title="Dashboard" href="<?php echo $base_url; ?>dashboard"><i
                  class="fa fa-dashboard text-yellow"></i><b class="hidden-xs">
                  <?= $this->lang->line('dashboard'); ?>
                </b></a>
            </li>

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo get_profile_picture(); ?>" class="user-image" alt="User Image">
                <span class="hidden-xs">
                  <?php print ucfirst($this->session->userdata('inv_username')); ?>
                </span>
              </a>

              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo get_profile_picture(); ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php print ucfirst($this->session->userdata('inv_username')); ?>
                    <small>Year
                      <?= date("Y"); ?>
                    </small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo $base_url; ?>users/edit/<?= $this->session->userdata('inv_userid'); ?>"
                      class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo $base_url; ?>logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
  </div>
  <!-- /.container-fluid -->
  </nav>
  </header>

  <?php
  if (!isset($kitchen_name)) {
    $kitchen_name = $description = $q_id = "";
  }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- ********** ALERT MESSAGE START******* -->
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

              <input type="hidden" id="q_id" value="<?php echo $q_id;
              ; ?>">
              <div class="box-body">


                <div class="form-group">
                  <label for="unit_name" class="col-sm-4 control-label" style="font-size: x-large;">
                    <?php print $kitchen_name; ?><label class="text-danger">*</label>
                  </label>
                </div>

                <table id="example2" class="table table-bordered table-striped" width="100%">
                  <thead class="bg-primary ">
                    <tr>
                      <th class="text-center">
                        <input type="checkbox" class="group_check checkbox">
                      </th>
                      <th>Vị trí </th>
                      <th>Ghi chú</th>
                      <th>Tên món</th>
                      <th>Số lượng</th>
                      <th>Giá</th>
                      <th>
                        <?= $this->lang->line('status'); ?>
                      </th>
                      <th>
                        <?= $this->lang->line('action'); ?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>

                </table>


              </div>
              <!-- /.box-body -->
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

  <?php include "comman/code_js_datatable.php"; ?>

  <script type="text/javascript">
    $(document).ready(function () {

      // Khai báo biến để sử dụng ở nhiều chỗ
      var q_id = $('#q_id').val();
      var base_url = $("#base_url").val().trim();
      var urlCall = base_url + "kitchen/view_list";

      // Function để reload dữ liệu
      function reloadData() {
        table.ajax.reload(); // Reload DataTable data
        $('.column_checkbox').iCheck({
          checkboxClass: 'icheckbox_square-orange',
          radioClass: 'iradio_square-orange',
          increaseArea: '10%'
        });
        call_code();
        //$(".delete_btn").hide();
      }

      // Khởi tạo DataTable
      var table = $('#example2').DataTable({
        dom: '<"row margin-bottom-12"<"col-sm-12"<"pull-left"l><"pull-right"fr><"pull-right margin-left-10 "B>>>tip',
        buttons: {
          buttons: []
        },
        "processing": true,
        "serverSide": true,
        "order": [],
        "responsive": true,
        language: {
          processing: '<div class="text-primary bg-primary" style="position: relative;z-index:100;overflow: visible;">Processing...</div>'
        },
        "ajax": {
          "url": urlCall,
          "type": "POST",
          "data": {
            q_id: q_id
          },
          complete: function (data) {
            $('.column_checkbox').iCheck({
              checkboxClass: 'icheckbox_square-orange',
              radioClass: 'iradio_square-orange',
              increaseArea: '10%'
            });
            call_code();
            //$(".delete_btn").hide();
          },
        },
        "columnDefs": [
          {
            "targets": [0, 6],
            "orderable": false,
          },
          {
            "targets": [0],
            "className": "text-center",
          },
        ],
      });

      new $.fn.dataTable.FixedHeader(table);

      // Thiết lập interval để reload dữ liệu mỗi 10 giây
      var reloadInterval = setInterval(reloadData, 10000);

      // Dừng interval khi trang web được tải lại hoặc người dùng rời khỏi trang
      $(window).on('unload', function () {
        clearInterval(reloadInterval);
      });

    });
  </script>

  <script src="<?php echo $theme_link; ?>js/kitchen.js"></script>
  <!-- Make sidebar menu hughlighter/selector -->
  <script>$(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");</script>

  <script src="<?php echo $theme_link; ?>js/fullscreen.js"></script>
</body>

</html>