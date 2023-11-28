<!-- Notification sound -->
<audio id="failed">
  <source src="<?php echo $theme_link; ?>sound/failed.mp3" type="audio/mpeg">
  <source src="<?php echo $theme_link; ?>sound/failed.ogg" type="audio/ogg">
</audio>
<audio id="success">
  <source src="<?php echo $theme_link; ?>sound/success.mp3" type="audio/mpeg">
  <source src="<?php echo $theme_link; ?>sound/success.ogg" type="audio/ogg">
</audio>
<script type="text/javascript">
  var failed_sound = document.getElementById("failed"); 
  var success_sound = document.getElementById("success"); 
</script>

<script type="text/javascript">
<?php if($this->session->flashdata('success')!=''){ ?>
      success_sound.play();
<?php } ?>
<?php if($this->session->flashdata('failed')!=''){ ?>
      failed_sound.play();
<?php } ?>
</script>
<!-- Notification end -->