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
<?php
  
  if(!isset($warehouse_name)){
    $warehouse_name=$mobile=$email=$q_id='';
    $disabled='';
  }else{
    $disabled='disabled="disabled"';
  }
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $this->lang->line('warehouse'); ?>
        <small>Enter Valid Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $base_url; ?>warehouse"><?= $this->lang->line('warehouse_list'); ?></a></li>
        <li class="active"><?= $this->lang->line('warehouse'); ?></li>
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
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="warehouse-form" onkeypress="return event.keyCode != 13;">
              <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
              <div class="box-body">
				<div class="form-group">
				  <label for="warehouse_name" class="col-sm-2 control-label"><?= $this->lang->line('warehouse_name'); ?><label class="text-danger">*</label></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control input-sm" id="warehouse_name" name="warehouse_name" placeholder="" onkeyup="shift_cursor(event,'mobile')" value="<?php print $warehouse_name; ?>"  autofocus>
					<span id="warehouse_name_msg" style="display:none" class="text-danger"></span>
                  </div>
                </div>
                <div class="form-group">
          <label for="mobile" class="col-sm-2 control-label"><?= $this->lang->line('mobile'); ?><label class="text-danger">*</label></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control input-sm no_special_char_no_space"  id="mobile" name="mobile" placeholder="" value="<?= $mobile; ?>" onkeyup="shift_cursor(event,'email')"  >
          <span id="mobile_msg" style="display:none" class="text-danger"></span>
                  </div>
                </div>
                <div class="form-group">
          <label for="email" class="col-sm-2 control-label"><?= $this->lang->line('email'); ?><label class="text-danger">*</label></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control input-sm" value="<?= $email; ?>"  id="email" name="email" placeholder="" onkeyup="shift_cursor(event,'pass')"  >
          <span id="email_msg" style="display:none" class="text-danger"></span>
                  </div>
                </div>
				

              </div>
              <!-- /.box-body -->
              <div class="box-footer col-sm-12">
				  <div class="col-sm-6">
					<div class="col-sm-4"></div>
					<div class="col-sm-8">
					  <?php
                       if($warehouse_name!=""){
                            $btn_name="Update";
                            $btn_id="update";
                           
              }
                        else{
                            $btn_name="Save";
                            $btn_id="save";
                        }

                        ?>
                        <input type="hidden" name="q_id" id="q_id" value="<?php echo $q_id;?>"/>
              <button type="button" id="<?php echo $btn_id;?>" class="btn  btn-success" title="Save Data"><?php echo $btn_name;?></button>
						<a href='dashboard.php'><button type="button" class="btn btn-default" title="Go Dashboard">Close</button></a>
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

<script src="<?php echo $theme_link; ?>js/warehouse.js"></script>
<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>

</body>
</html>
