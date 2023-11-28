<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $theme_link; ?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/FixedHeader-3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/Responsive-2.2.2/js/responsive.bootstrap.min.js"></script>
<!-- end -->
<!--  FOR EXPORT BUTTONS START -->
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/buttons.flash.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/buttons.html5.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/buttons.print.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/buttons.colVis.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/buttons.bootstrap.min.js"></script>
<!--  FOR EXPORT BUTTONS END -->

<!-- SlimScroll -->
<script src="<?php echo $theme_link; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $theme_link; ?>plugins/fastclick/fastclick.js"></script>
<!-- Select2 -->
<script src="<?php echo $theme_link; ?>plugins/select2/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script>
  var AdminLTEOptions = {
    /*https://adminlte.io/themes/AdminLTE/documentation/index.html*/
    sidebarExpandOnHover: true,
    navbarMenuHeight: "200px", //The height of the inner menu
    animationSpeed: 250,
  };
</script>
<script src="<?php echo $theme_link; ?>dist/js/app.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $theme_link; ?>dist/js/demo.js"></script>
<!-- page script -->

<!-- Shortcut Keys -->
<script src="<?php echo $theme_link; ?>plugins/shortcuts/shortcuts.js"></script>

<!--Toastr notification -->
<script src="<?php echo $theme_link; ?>toastr/toastr.js"></script>
<script src="<?php echo $theme_link; ?>toastr/toastr_custom.js"></script>
<!--Toastr notification end-->

<!-- Custom JS -->
<script src="<?php echo $theme_link; ?>js/special_char_check.js"></script>
<script src="<?php echo $theme_link; ?>js/custom.js"></script>

<!-- Pace Loader -->
<script src="<?php echo $theme_link; ?>plugins/pace/pace.min.js"></script>
<script type="text/javascript">
$(document).ajaxStart(function() { Pace.restart(); }); 
</script>  
<!-- Sweet alert -->
<script src="<?php echo $theme_link; ?>js/sweetalert.min.js"></script>
<!-- iCheck -->
<script src="<?php echo $theme_link; ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-orange',
      /*uncheckedClass: 'bg-white',*/
      radioClass: 'iradio_square-orange',
      increaseArea: '10%' // optional
    });
  });
</script>
<!-- Initialize Select2 Elements -->
<script type="text/javascript"> $(".select2").select2(); </script>
<!-- Initialize toggler -->
<script type="text/javascript">
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
  });
</script>

<script type="text/javascript" >
$(function($) { // this script needs to be loaded on every page where an ajax POST may happen
  //var csrf = $('input[name="csrf_token"]').val();  // <- get token value from hidden form input
    $.ajaxSetup({ data: {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }  }); });
</script>
<script type="text/javascript">
	function show_delete_btn() {
  var group_check_count = $(".group_check").prop("checked") ? 1: 0;
  var check_count = $('#example2').find('input[type=checkbox]:checked').length-parseInt(group_check_count);

  //console.log($('#example2 > tbody').find('.checkbox').length);
  if(parseInt(check_count)>0){
    $(".delete_btn").removeClass('hidden').show();
  }    
  else{
    $(".delete_btn").addClass('hidden').hide();
  }

  if($('#example2 > tbody').find('.checkbox').length == check_count){
    $(".group_check").prop("checked",true).iCheck('update');
  }
  else{
    $(".group_check").prop("checked",false).iCheck('update');
  }

}
$('.group_check').on('ifChanged', function(event) {
    if(event.target.checked){
      $(".column_checkbox").prop("checked",true).iCheck('update');
    }
    else{
      $(".column_checkbox").prop("checked",false).iCheck('update');
    }
    show_delete_btn();
});


function call_code(){
  $('.column_checkbox').on('ifChanged', function(event) {
      show_delete_btn();
  });
}
</script>
<script type="text/javascript">
$(document).ready(function () { setTimeout(function() {$( ".alert-dismissable" ).fadeOut( 1000, function() {});}, 10000); });
</script>
<script type="text/javascript">
  function round_off(input=0){
    <?php if(is_enabled_round_off()){ ?>
      return Math.round(input);
    <?php }else{?>
      return input;
    <?php }?>
  }
</script>
<script>
  function tax_disabled(){
    <?php if(is_tax_disabled()){ ?>
      return true;
    <?php }else{?>
      return false;
    <?php }?>
  }
</script>