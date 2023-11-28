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

if(!isset($state)){
      $country=$state="";
	}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $this->lang->line('state'); ?>
        <small>Add/Update State</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $base_url; ?>state"><?= $this->lang->line('states_list'); ?></a></li>
        <li class="active"><?= $this->lang->line('state'); ?></li>
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
              <h3 class="box-title">Please Enter Valid Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="state-form" method="post">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            	<input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
              <div class="box-body">
			   
                 <div class="form-group">
				 
				  <label for="state" class="col-sm-2 control-label"><?= $this->lang->line('state_name'); ?><label class="text-danger">*</label></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="state" name="state" placeholder="" onkeyup="shift_cursor(event,'country')" value="<?php echo $state; ?>">
					<span id="state_msg" style="display:none" class="text-danger"></span>
                  </div>
                </div>
				<div class="form-group">
				 <label for="country_name" class="col-sm-2 control-label"><?= $this->lang->line('country'); ?><label class="text-danger">*</label></label>

                  <div class="col-sm-4">
                    <select class="form-control" id="country" name="country"  style="width: 100%;" >
					  <?php
						$q1=$this->db->query("select * from db_country where status=1");
						 if($q1->num_rows()>0)
						 {
							echo '<option value="">-Select-</option>'; 
							foreach($q1->result() as $res1)
							 {
								 echo "<option value='".$res1->country."'>".$res1->country."</option>";
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
					<span id="country_msg" style="display:none" class="text-danger"></span>
                  </div>
		        </div>
				
								
              </div>
              <!-- /.box-body -->
			        <div class="box-footer">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                   <!-- <div class="col-sm-4"></div> -->
                   <?php
                      if($state!=""){
                           $btn_name="Update";
                           $btn_id="update";
                          ?>
                            <input type="hidden" name="q_id" id="q_id" value="<?php echo $q_id;?>"/>
                            <?php
                      }
                                else{
                                    $btn_name="Save";
                                    $btn_id="save";
                                }
                      
                                ?>
                                 
                   <div class="col-md-3 col-md-offset-3">
                      <button type="button" id="<?php echo $btn_id;?>" class=" btn btn-block btn-success" title="Save Data"><?php echo $btn_name;?></button>
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

<script src="<?php echo $theme_link; ?>js/state.js"></script>
<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
<script>
<?php
if($country!=""){
	?>
	
	$("#country").val('<?php echo $country;?>');
	<?php
}

?>
</script>

</body>
</html>
