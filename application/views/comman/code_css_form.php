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
  <!-- bootstrap date-range-picker -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/daterangepicker/daterangepicker.css">
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
  <!-- Theme color finder -->
  <script type="text/javascript">
  var theme_skin = (typeof (Storage) !== "undefined") ? localStorage.getItem('skin') : 'skin-blue';
  theme_skin = (theme_skin=='' || theme_skin==null) ? 'skin-blue' : theme_skin;
  var sidebar_collapse = (typeof (Storage) !== "undefined") ? localStorage.getItem('collapse') : 'skin-blue';
  </script>
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo $theme_link; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>