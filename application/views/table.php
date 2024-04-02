<!DOCTYPE html>
<html>

<head>
  <!-- TABLES CSS CODE -->
  <?php include "comman/code_css_form.php"; ?>
  <!-- </copy> -->
  <style>
    .orange-border {
      border: 1px solid #3C8DBC;
      border-radius: 2px;
      padding: 2px;
      margin: 2px;
      font-family: 'Helvetica', sans-serif;
      /*   font-size: 14px; */
      background-color: white;
      color: black;
    }

    .delete-button {
      position: absolute;
      top: 5px;
      right: 5px;
      cursor: pointer;
      color: red;
      font-weight: bold;
    }
  </style>
</head>

<?php include "modals/modal_table.php"; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include "sidebar.php"; ?>
    <?php
    if(!isset($table_type_name)) {
      $category_code = $table_type_name = $description = "";
    }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $page_title; ?>
          <small>Quản lý bàn</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo $base_url; ?>table/view">
              <?= $this->lang->line('table_list'); ?>
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
                <h3 class="box-title">Hãy nhập tên nhóm bàn (Tầng hoặc phòng)</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" id="category-form" onkeypress="return event.keyCode != 13;">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                  value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="base_url" value="<?php echo $base_url;
                ; ?>">
                <input type="hidden" id="q_id" value="<?php echo $q_id;
                ; ?>">
                <input type="hidden" id="q_item_id" value="">
                <div class="box-body">


                  <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">
                      <?= $this->lang->line('table_type_name'); ?><label class="text-danger">*</label>
                    </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control input-sm" id="category" name="category" placeholder=""
                        onkeyup="shift_cursor(event,'description')" value="<?php print $table_type_name ; ?>" autofocus>
                      <span id="category_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>


                  <div class="form-group" style="display:none">
                    <label for="description" class="col-sm-2 control-label">
                      <?= $this->lang->line('description'); ?>
                    </label>
                    <div class="col-sm-4">
                      <textarea type="text" class="form-control" id="description" name="description"
                        placeholder=""><?php print $description; ?></textarea>
                      <span id="description_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>


                  <div class="form-group" <?php echo ($q_id == 0) ? 'style="display:none;"' : ''; ?>>
                    <label for="category" class="col-sm-2 control-label">
                      <?= $this->lang->line('table'); ?><label class="text-danger"></label>
                    </label>
                    <div class="col-sm-4">

                      <?php
                      if($q_id > 0) {
                        $query1 = "select * from db_table where table_type_id = $q_id";
                        $q1 = $this->db->query($query1);
                        if($q1->num_rows($q1) > 0) {

                          foreach($q1->result() as $res1) {

                            echo "
                          <div class='action-buttons'>
                            <div class='orange-border'>
                            <button  type='button' data-id='".$res1->id."'>$res1->table_name<i class='fa fa-fw fa-edit text-blue' onclick='show_modal_update($res1->id)'></i></button>
                            <button  type='button' data-id='".$res1->id."'><i class='fa fa-fw fa-trash text-blue'  onclick='delete_category_item($res1->id)'></i></button>
                            </div>
                        </div>";
                          }
                        } else {
                          ?>
                          <option value="">Bạn chưa có bàn nào </option>
                          <?php
                        }
                      }
                      ?>

                    </div>

                  </div>
                </div>



                <div class="form-group" <?php echo ($q_id == 0) ? 'style="display:none;"' : ''; ?>>
                  <label for="category" class="col-sm-2 control-label">

                    <button type="button" id="add_category_item"><i class='fa fa-fw fa-plus text-blue'></i> Thêm bàn</button>
                  </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control input-sm" id="category_item_name" name="category_item_name"
                      placeholder="">
                    <span id="category_item_name_msg" style="display:none" class="text-danger"></span>
                  </div>
                </div>



                <!-- /.box-footer -->
                <div class="box-footer">
                  <div class="col-sm-8 col-sm-offset-2 text-center">
                    <!-- <div class="col-sm-4"></div> -->
                    <?php
                    if($table_type_name != "") {
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

  <script src="<?php echo $theme_link; ?>js/table.js"></script>
  <!-- Make sidebar menu hughlighter/selector -->
  <script>
    $(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");


    $('#add_category_item').on("click", function (e) {


      var base_url = $("#base_url").val().trim();

      var name = $('#category_item_name').val();
      var q_id = $('#q_id').val();

      if (name == '') {
        $('#category_item_name_msg').fadeIn(200).show().html('Tên danh mục con không được bỏ trống').addClass('required');
        return;
      } else {
        $('#category_item_name_msg').fadeOut(200).hide();
      }

      if (confirm("Bạn có muốn thêm danh mục con : " + name )) {

        $.post(base_url + "/table/add_new_category_item", {
          q_id: q_id,
          name: name
        }, function (result) {

          if (result == "success") {
            window.location.reload();
            toastr["success"]("Thêm bản ghi thành công!");
          } else if (result == "failed") {
            window.location.reload();
            toastr["error"]("Thêm bản ghi thất bại!");
          } else {
            toastr["error"](result);
          }
          $(".overlay").remove();
          window.location.reload(true);
          return false;
        });
      }
    });



    $('#update_category_item').on("click", function (e) {


      var base_url = $("#base_url").val().trim();

      var name = $('#input_category_item').val();
      var q_id = $('#q_item_id').val();

      if (name == '') {
        $('#add_category_item_msg').fadeIn(200).show().html('Tên danh mục con không được bỏ trống').addClass('required');
        return;
      } else {
        $('#add_category_item_msg').fadeOut(200).hide();
      }

      $.post(base_url + "/table/update_category_item", {
        q_id: q_id,
        name: name
      }, function (result) {

        if (result == "success") {
          toastr["success"]("Sửa bản ghi thành công!");
        } else if (result == "failed") {
          toastr["error"]("Sửa bản ghi thất bại!");
        } else {
          toastr["error"](result);
        }
        $(".overlay").remove();
        $('#category_item_modal').modal('toggle');

        window.location.reload(true);
        return false;
      });

    });

    function delete_category_item(q_id) {

      var base_url = $("#base_url").val().trim();

      if (confirm("Bạn có muốn xóa danh mục con ?")) {
        $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        $.post(base_url + "/table/delete_table", {
          q_id: q_id
        }, function (result) {
          //alert(result);return;
          if (result == "success") {
            toastr["success"]("Record Deleted Successfully!");

          } else if (result == "failed") {
            toastr["error"]("Failed to Delete .Try again!");
          } else {
            toastr["error"](result);
          }
          $(".overlay").remove();
          window.location.reload(true);
          return false;
        });
      } //end confirmation
    }


    function show_modal_update(q_id) {
      $("#q_item_id").val(q_id);
      $('#category_item_modal').modal('toggle');
      var base_url = $("#base_url").val().trim();
    }
  </script>
</body>

</html>