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
	if(!isset($template_name)){
      $template_name=$content=$undelete_bit= $variables="";
	}

  $template_name_readonly ='';
  if($undelete_bit==1){
    $template_name_readonly ='readonly';
  }
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $this->lang->line('sms_template'); ?>
        <small>Add/Update Template</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $base_url; ?>templates/sms"><?= $this->lang->line('sms_templates_list'); ?></a></li>
        <li><a href="<?php echo $base_url; ?>templates/sms_new"><?= $this->lang->line('add_template'); ?></a></li>
        <li class="active"><?= $this->lang->line('sms_template'); ?></li>
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
            <form class="form-horizontal" id="template-form" >
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
              <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
              <div class="box-body">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="template_name" class="col-sm-4 control-label"><?= $this->lang->line('template_name'); ?><label class="text-danger">*</label></label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control input-sm" id="template_name" name="template_name" placeholder="" <?=$template_name_readonly;?>  value="<?php print $template_name; ?>" autofocus >
              <span id="template_name_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  
                  <div class="form-group">
                      <label for="content" class="col-sm-4 control-label"><?= $this->lang->line('content'); ?><label class="text-danger">*</label></label>

                  <div class="col-sm-8">
                    <textarea type="text" spellcheck="false" class="form-control" rows="6" id="content" name="content" placeholder=""><?php print $content; ?></textarea>
          <span id="content_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                 
                  
                  <!-- ########### -->
               </div>

               <?php if(!empty($variables)){ ?>
               <div class="col-md-5">
                    <div class="form-group">
                        <div class="col-sm-6 col-md-offset-2">
                          <label class="control-label"><u>SMS CONTENT VARIABLES</u></label><br>
                          <?= $variables; ?>
                        </div>
                    </div>
                </div>
              <?php } ?>
                  <!-- ########### -->
</div>
              
        
        
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
         
          
          <div class="col-sm-12">
          <div class="col-sm-8 col-md-offset-2">
          <button type="button" class="btn bg-orange" title="Back to List" onclick="history.back();">Back</button>
            <?php
                       if($template_name!=""){
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
              <button type="button" id="<?php echo $btn_id;?>" class="btn btn-success" title="Save Data"><?php echo $btn_name;?></button>
            
            <a href='<?php echo $base_url; ?>dashboard'><button type="button" class="btn btn-danger" title="Go Dashboard">Close</button></a>
            </div>
           </div>  
            
              </div>
              <!-- /.box-footer -->
            </form>
            <!-- form start -->
            
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

<!-- jQuery 2.2.3 -->
<script src="<?php echo $theme_link; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $theme_link; ?>bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $theme_link; ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $theme_link; ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $theme_link; ?>dist/js/demo.js"></script>
<!--Toastr notification -->
<script src="<?php echo $theme_link; ?>toastr/toastr.js"></script>
<script src="<?php echo $theme_link; ?>toastr/toastr_custom.js"></script>
<!--Toastr notification end-->
<script src="<?php echo $theme_link; ?>js/special_char_check.js"></script>
<!-- sweet alert -->
<script src="<?php echo $theme_link; ?>js/sweetalert.min.js"></script>
<script type="text/javascript" >
$(function($) { // this script needs to be loaded on every page where an ajax POST may happen
    $.ajaxSetup({ data: {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }  }); });
</script>
<script type="text/javascript">
  $(document).submit(function(e){
    e.preventDefault();
  });
</script>
<script src="<?php echo $theme_link; ?>js/templates.js"></script>
<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
</body>
</html>
