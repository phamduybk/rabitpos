<!DOCTYPE html>
<html>

<head>
<!-- TABLES CSS CODE -->
<?php include"comman/code_css_form.php"; ?>
<!-- </copy> -->  
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php include"sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $page_title;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- ********** ALERT MESSAGE START******* -->
        <?php include"comman/code_flashdata.php"; ?>
        <!-- ********** ALERT MESSAGE END******* -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info ">
            <div class="box-header with-border">
              <h3 class="box-title">Please Enter Valid Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="category-form" onkeypress="return event.keyCode != 13;">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
              <div class="box-body">
				<div class="form-group">
				  <label for="current_pass" class="col-sm-2 control-label"><?= $this->lang->line('current_password'); ?><label class="text-danger">*</label></label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control input-sm" id="current_pass" name="current_pass" placeholder="" onkeyup="shift_cursor(event,'pass')"  autofocus>
					<span id="category_msg" style="display:none" class="text-danger"></span>
                  </div>
                </div>
				<div class="form-group">
				  <label for="pass" class="col-sm-2 control-label"><?= $this->lang->line('new_password'); ?><label class="text-danger">*</label></label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control input-sm" id="pass" name="pass" placeholder="" onkeyup="shift_cursor(event,'confirm')"  >
					<span id="category_msg" style="display:none" class="text-danger"></span>
                  </div>
                </div>
				<div class="form-group">
				  <label for="confirm" class="col-sm-2 control-label"><?= $this->lang->line('confirm_password'); ?><label class="text-danger">*</label></label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control input-sm" id="confirm" name="confirm" placeholder="">
					<span id="category_msg" style="display:none" class="text-danger"></span>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
              <div class="box-footer">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                   <div class="col-md-3 col-md-offset-3">
                      <button type="button" id="save" class=" btn btn-block btn-success" title="Save Data">Save</button>
                   </div>
                   <div class="col-sm-3">
                    <a href="<?=base_url('dashboard');?>">
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

 <?php include"footer.php"; ?>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- SOUND CODE -->
<?php include"comman/code_js_sound.php"; ?>
<!-- TABLES CODE -->
<?php include"comman/code_js_form.php"; ?>

<script src="<?php echo $theme_link; ?>js/changepass.js"></script>

<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>

</body>
</html>
