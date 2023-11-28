<!DOCTYPE html>
<html>
<head>
  <!-- TABLES CSS CODE -->
<?php include"comman/code_css_datatable.php"; ?>
<!-- bootstrap datepicker -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Left side column. contains the logo and sidebar -->
  
  <?php include"sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $this->lang->line('sms_templates_list'); ?>
        <small>View/Search Template</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $this->lang->line('sms_templates_list'); ?></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- ********** ALERT MESSAGE START******* -->
        <?php include"comman/code_flashdata.php"; ?>
        <!-- ********** ALERT MESSAGE END******* -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $this->lang->line('sms_templates_list'); ?></h3>
              <div class="box-tools">
                <a class="btn btn-block btn-info" href="<?php echo $base_url; ?>templates/sms_new">
                <i class="fa fa-plus"></i> <?= $this->lang->line('add_template'); ?></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                  <th>#</th>
                  <th><?= $this->lang->line('template_name'); ?></th>
                  <th><?= $this->lang->line('content'); ?></th>
                  <th><?= $this->lang->line('status'); ?></th>
                  <th><?= $this->lang->line('action'); ?></th>
                </tr>
                </thead>
                <tbody>
				
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
<?php include"comman/code_js_datatable.php"; ?>
<script type="text/javascript">
var table;
$(document).ready(function() {
    //datatables
    table = $('#example2').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "responsive": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('templates/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0,3,4 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    });
    new $.fn.dataTable.FixedHeader( table );
});
</script>
<script src="<?php echo $theme_link; ?>js/templates.js"></script>
<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
</body>
</html>
