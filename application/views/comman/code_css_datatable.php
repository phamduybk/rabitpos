  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$page_title;?></title>
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
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/FixedHeader-3.1.4/css/fixedHeader.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/FixedHeader-3.1.4/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/Responsive-2.2.2/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/Responsive-2.2.2/css/responsive.bootstrap.min.css">  
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/css/buttons.bootstrap.min.css">  
  <!-- end -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/skins/_all-skins.min.css">
 <!--Toastr notification -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>toastr/toastr.css">
  <!--Toastr notification end-->
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/iCheck/square/orange.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--Custom Css File-->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/custom.css">
  <!-- Pace Loader -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/pace/pace.min.css">
  <?php 
      $lang = trim(strtoupper($this->session->userdata('language')));
      if($lang==strtoupper('arabic') || $lang==strtoupper('urdu')) {?>
  <!-- RTL For arabic styles -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>bootstrap/css/bootstrap.rtl.min.css">
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/AdminLTE.rtl.min.css">
  <?php } ?>
  <!-- Theme color finder -->
  <script type="text/javascript">
  var default_skin = 'skin-yellow-light';
  var theme_skin = (typeof (Storage) !== "undefined") ? localStorage.getItem('skin') : default_skin;
  theme_skin = (theme_skin=='' || theme_skin==null) ? default_skin : theme_skin;
  var sidebar_collapse = (typeof (Storage) !== "undefined") ? localStorage.getItem('collapse') : default_skin;
  </script>
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo $theme_link; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
  