<!DOCTYPE html>
<html>

<head>
  <!-- ************************************************************** -->
  <meta charset="UTF-8">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $page_title;?></title>
  <link rel='shortcut icon' href='<?php echo $theme_link; ?>images/favicon.ico' />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>css/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>css/ionicons-2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/skins/_all-skins.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/datepicker/datepicker3.css">
  <!--Toastr notification -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>toastr/toastr.css">
  <!--Custom Css File-->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/custom.css">
  <!-- Autocomplete -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/autocomplete/autocomplete.css">
  <!-- Pace Loader -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/pace/pace.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/iCheck/square/orange.css">
  <?php 
      $lang = trim(strtoupper($this->session->userdata('language')));
      if($lang==strtoupper('arabic') || $lang==strtoupper('urdu')) {?>
  <!-- RTL For arabic styles -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>bootstrap/css/bootstrap.rtl.min.css">
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/AdminLTE.rtl.min.css">
  <?php } ?>
  <!-- ************************************************************** -->
  
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php include"sidebar.php"; ?>
 <?php
	if(!isset($category_name)){
      $category_code=$category_name=$description="";
	}
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$page_title;?>
        <small>Add/Update Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $base_url; ?>category/view"><?= $this->lang->line('categories_list'); ?></a></li>
        <li class="active"><?=$page_title;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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

<script src="<?php echo $theme_link; ?>js/category.js"></script>
<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
</body>
</html>
