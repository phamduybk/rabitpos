<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?php print $SITE_TITLE; ?> | Change Password
  </title>
  <link rel='shortcut icon' href='<?php echo $theme_link; ?>images/favicon.ico' />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/iCheck/square/blue.css">

</head>

<body class="hold-transition login-page"
  style="height: 100vh; background-repeat: no-repeat; background: url('<?= base_url('images/bg/pos-background.jpeg') ?>') no-repeat center center fixed; background-size: cover;">
  <!-- Your page content goes here -->
</body>

<?php
//Find Logo Path
$logo = $this->db->query("select logo from db_sitesettings")->row()->logo;
?>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>
        <img src="<?php echo $base_url; ?>uploads/<?= $logo; ?>" width="20%" height="20%">
      </b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Change Password</p>
    <div class="text-danger tex-center">
      <?php echo $this->session->flashdata('failed'); ?>
    </div>
    <div class="text-success tex-center">
      <?php echo $this->session->flashdata('success'); ?>
    </div>


    <form action="<?php echo $base_url; ?>login/change_password" method="post" id="password-form" autocomplete="off">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
        value="<?php echo $this->security->get_csrf_hash(); ?>">
      <input type="hidden" name="email" id="email" value="<?= $email; ?>">
      <input type="hidden" name="otp" id="otp" value="<?= $otp; ?>">
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="New Password" id="password" name="password"
          autofocus><span class="glyphicon glyphicon-lock  form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirm Password" id="cpassword" name="cpassword"
          autofocus><span class="glyphicon glyphicon-lock  form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
      </div>


    </form>
    <a class="pull-right" href="../<?php $base_url; ?>">Click đây để đăng nhập</a><br>

  </div>
  <!-- /.login-box-body -->

</div>

<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo $theme_link; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $theme_link; ?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo $theme_link; ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script type="text/javascript">
  $(function ($) { // this script needs to be loaded on every page where an ajax POST may happen
    $.ajaxSetup({ data: { '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>' } });
  });
</script>

</body>

</html>