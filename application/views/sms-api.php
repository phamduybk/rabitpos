<!DOCTYPE html>
<html>
<head>
  <!-- FORM CSS CODE -->
<?php include"comman/code_css_form.php"; ?>
<!-- </copy> -->  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
 <?php include"sidebar.php"; ?>
<?php 
$sms_status = $this->db->query("select sms_status from db_company where id=1")->row()->sms_status;
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?= $this->lang->line('sms_api'); ?>
        <small>Add/Update SMS API</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active"> <?= $this->lang->line('sms_api'); ?></li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- right column -->
        <!-- ********** ALERT MESSAGE START******* -->
        <?php include"comman/code_flashdata.php"; ?>
        <!-- ********** ALERT MESSAGE END******* -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info ">
           
            <!-- form start -->
            <form class="form-horizontal" id="api-form" method="post">
              <input type="hidden" name="hidden_rowcount" id="hidden_rowcount" value="">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
              <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
              <div class="box-body">

               
        
        <div class="form-group " >
          <div class="col-sm-12">
            <div class="callout callout-info">
              <h4>Hướng dẫn sử dụng</h4>
                <p>
                 <br>https://www.youtube.com/watch?v=fG43VdSGQX8 <br>
                   Đây là tin nhắn Gmail giúp bạn reset tài khoản, khôi phục mật khẩu<br>
                   Bạn điều tài khoản Gmail và mật khẩu ứng dụng vào để cài đặt
                   Hãy lưu ý mật khẩu ứng dụng khác với mật khẩu gmail nhé
                   Nếu không điền mặc định bạn nhận OTP bằng acc của admin (rabitshopvn@gmail.com)
                  <br>

                </p>
            </div>
           </div>
          <div class="col-sm-12  table-responsive">
            <table class="table" id='api_table'>
                <thead>
                  <th width="15%"></th>
                  <th width="20%" class="text-center">Key</th>
                  <th width="40%" class="text-center">Key Value</th>
                  <th><input type="button" class="btn btn-success" name="new_row" onclick="addrow();" value="+" title="New Line"  ></th>
                </thead>
                <tbody>
                  <?php 
                  $q2=$this->db->query("select * from db_smsapi");
                  $i=0;
                  foreach($q2->result() as $res2){
                    $i++;
                    if($res2->info == 'url'){
                  ?>

                <?php 
                    }//url end
                    else if($res2->info == 'mobile'){
                      ?>
                      <tr id="row_<?= $i; ?>" data-row='<?= $i; ?>'>
                          <td  class="text-right"><label class="control-label">Tài khoản Gmail của bạn<label class="text-danger">*</label></label>
                          <input type="hidden" id="info_<?= $i; ?>" name="info_<?= $i; ?>" value="<?php echo  $res2->info; ?>">
                          </td>
                           <td >
                            <input id="key_<?= $i; ?>" name="key_<?= $i; ?>"  type="text" class="form-control " placeholder="" value='<?= $res2->key; ?>' />
                          </td>
                          <td><input id="key_val_<?= $i; ?>" name="key_val_<?= $i; ?>"  type="text" class="form-control " placeholder="" readonly="true" value='<?= $res2->key_value; ?>' /></td>
                          <td><input type="button" class="btn btn-danger" name="btn_<?= $i; ?>" id="btn_<?= $i; ?>" value="-" title="Cant' Remove" disabled='true' ></td">
                        </tr>
                <?php 
                    }//mobile end
                    else if($res2->info == 'message'){
                      ?>
                      <tr id="row_<?= $i; ?>" data-row='<?= $i; ?>'>
                          <td  class="text-right"><label class="control-label">Mật khẩu ứng dụng<label class="text-danger">*</label></label>
                          <input type="hidden" id="info_<?= $i; ?>" name="info_<?= $i; ?>" value="<?php echo  $res2->info; ?>">
                          </td>
                           <td >
                            <input id="key_<?= $i; ?>" name="key_<?= $i; ?>"  type="text" class="form-control " placeholder="" value='<?= $res2->key; ?>' />
                          </td>
                          <td><input id="key_val_<?= $i; ?>" name="key_val_<?= $i; ?>"  type="text" class="form-control " placeholder="" readonly="true" value='<?= $res2->key_value; ?>' /></td>
                          <td><input type="button" class="btn btn-danger" name="btn_<?= $i; ?>" id="btn_<?= $i; ?>" value="-" title="Cant' Remove" disabled='true' ></td">
                        </tr>
                <?php 
                    }//mobile end
                    else{
                      ?>
                      <tr id="row_<?= $i; ?>" data-row='<?= $i; ?>'>
                          <td>
                            <input type="hidden" id="info_<?= $i; ?>" name="info_<?= $i; ?>" value="<?php echo  $res2->info; ?>">
                          </td>
                           <td >
                            <input id="key_<?= $i; ?>" name="key_<?= $i; ?>"  type="text" class="form-control " placeholder="" value='<?= $res2->key; ?>' />
                          </td>
                          <td><input id="key_val_<?= $i; ?>" name="key_val_<?= $i; ?>"  type="text" class="form-control " placeholder="" value='<?= $res2->key_value; ?>' /></td>
                          <td><input type="button" class="btn btn-danger" name="btn_<?= $i; ?>" id="btn_<?= $i; ?>" value="-" title="Remove ?" onclick="removerow('<?= $i; ?>')"  ></td">
                        </tr>
                <?php 
                    }//mobile end
                }//foreach end
                ?>
                </tbody>
                
              </table>
            
          </div>

          <div class="form-group">
         <label for="sms_status" class="col-sm-2 control-label">Gmail Status<label class="text-danger">*</label></label>

                  <div class="col-sm-4">
                    <select class="form-control" id="sms_status" name="sms_status"  style="width: 100%;" >
                      <option value="1">Kích hoạt</option>
                      <option value="0">Hủy kích hoạt</option>
                  </select>
          <span id="sms_status_msg" style="display:none" class="text-danger"></span>
                  </div>
            </div>
        </div>
          <!-- server code -->
       

              </div>
              <!-- /.box-body -->
			  
			  <?php
                        $btn_name="Update";
                            $btn_id="update";
                        ?>
						
              <div class="box-footer col-sm-12">
				  <div class="col-sm-6">
					<div class="col-sm-4"></div>
					<div class="col-sm-8">
            <button type="button" class="btn bg-orange" title="Back to List" onclick="history.back();">Back</button>
					<button type="button" class="btn btn-success" id="<?php echo $btn_id; ?>"><?php echo $btn_name; ?></button>
					
						
						<a href='<?php echo $base_url; ?>dashboard'><button type="button" class="btn btn-danger" title="Go Dashboard">Close</button></a>
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
<!-- bootstrap datepicker -->
<script src="<?php echo $theme_link; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!--Toastr notification -->
<script src="<?php echo $theme_link; ?>toastr/toastr.js"></script>
<script src="<?php echo $theme_link; ?>toastr/toastr_custom.js"></script>
<!--Toastr notification end-->
<script src="<?php echo $theme_link; ?>js/sweetalert.min.js"></script>

<!-- Notification sound -->
<audio id="success">
  <source src="<?php echo $theme_link; ?>sound/success.mp3" type="audio/mpeg">
  <source src="<?php echo $theme_link; ?>sound/success.ogg" type="audio/ogg">
</audio>
<audio id="failed">
  <source src="<?php echo $theme_link; ?>sound/failed.mp3" type="audio/mpeg">
  <source src="<?php echo $theme_link; ?>sound/failed.ogg" type="audio/ogg">
</audio>
<audio id="notify">
  <source src="<?php echo $theme_link; ?>sound/notify.mp3" type="audio/mpeg">
  <source src="<?php echo $theme_link; ?>sound/notify.ogg" type="audio/ogg">
</audio>
<script type="text/javascript">
  var success_sound = document.getElementById("success"); 
  var failed_sound = document.getElementById("failed"); 
  var notify_sound = document.getElementById("notify"); 
</script>
<!-- Notification end -->

<script type="text/javascript" >
$(function($) { // this script needs to be loaded on every page where an ajax POST may happen
    $.ajaxSetup({ data: {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }  }); });
</script>
<script src="<?php echo $theme_link; ?>js/sms.js"></script>
<script src="<?php echo $theme_link; ?>js/special_char_check.js"></script>
<script src="<?php echo $theme_link; ?>plugins/select2/select2.full.min.js"></script>
<script>
  //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
    format: 'dd-mm-yyyy',
     todayHighlight: true
    });
  $(function () {
   $(".select2").select2();
  });

</script>
<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
<script>
//UPDATE ROW COUNT
$("#hidden_rowcount").val("<?= $i;?>");

//UPDATE current sms_status
<?php if($sms_status==1){ ?>
  $("#sms_status").val("<?= $sms_status;?>");  
<?php } else{?>
  $("#sms_status").val(0);  
<?php } ?>
</script>
<script type="text/javascript">
 
  function removerow(id){//id=Rowid
  
      $("#row_"+id).remove();
     // final_total();
      }
    function addrow(id){
      
        var rowcount=$("#hidden_rowcount").val();
        rowcount=parseInt(rowcount)+1;
          $("#hidden_rowcount").val(rowcount);

          var str='<tr id="row_'+rowcount+'" data-row="'+rowcount+'">';
          
          
          str+='<td><input type="hidden" id="info_'+rowcount+'" name="info_'+rowcount+'" value=""></td>';
        str+='<td><input id="key_'+rowcount+'" name="key_'+rowcount+'"  type="text" class="form-control" /></td>';
        str+='<td><input id="key_val_'+rowcount+'" name="key_val_'+rowcount+'"  type="text" class="form-control" /></td>';
        str+='<td><input type="button" class="btn btn-danger" name="btn_'+rowcount+'" id="btn_'+rowcount+'" value="-" title="Remove Record" onclick="removerow('+rowcount+')"></td>';
          str+='</tr>';
           //console.log(str);
                $('#api_table tbody').append(str);
     
      //return;
    }


</script>
</body>
</html>
