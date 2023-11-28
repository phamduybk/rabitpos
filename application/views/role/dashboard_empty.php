<!DOCTYPE html>
<html>
<head>
<!-- FORM CSS CODE -->
<?php $this->load->view('comman/code_css_datatable'); ?>
<!-- </copy> -->  

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Notification sound -->
  <audio id="login">
    <source src="<?php echo $theme_link; ?>sound/login.mp3" type="audio/mpeg">
    <source src="<?php echo $theme_link; ?>sound/login.ogg" type="audio/ogg">
  </audio>
  <script type="text/javascript">
    var login_sound = document.getElementById("login"); 
  </script>
  <!-- Notification end -->
  <script type="text/javascript">
  <?php if($this->session->flashdata('success')!=''){ ?>
        login_sound.play();
  <?php } ?>
  </script>
  
  <?php 
  $this->load->view('sidebar');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$page_title;?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Home</li>
      </ol>
    </section><br/>
    <div class="col-md-12">
      <!-- ********** ALERT MESSAGE START******* -->
       <?php $this->load->view('comman/code_flashdata'); ?>
       <!-- ********** ALERT MESSAGE END******* -->
     </div>
     
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('footer'); ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- SOUND CODE -->
<?php $this->load->view('comman/code_js_sound'); ?>
<!-- TABLES CODE -->
<?php $this->load->view('comman/code_js_datatable'); ?>
<!-- bootstrap datepicker -->


</body>
</html>
