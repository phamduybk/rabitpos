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
	
	if(!isset($expense_amt)){
    $category_id =$expense_for=$note=$expense_amt=$q_id=$reference_no='';
    $expense_date=show_date(date("d-m-Y"));
	}
 ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $this->lang->line('expense'); ?>
        <small>Add/Update Expense</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $base_url; ?>expense"><?= $this->lang->line('expenses_list'); ?></a></li>
        <li class="active"><?= $this->lang->line('expense'); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- ********** ALERT MESSAGE START******* -->
          <?php include"comman/code_flashdata.php"; ?>
            <!-- ********** ALERT MESSAGE END******* -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info ">
            <div class="box-header with-border">
              <h3 class="box-title">Please Enter Valid Data</h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <form class="form-horizontal" id="expense-form" >
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
              <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
              <div class="box-body">
                <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                      <label for="expense_date" class="col-sm-4 control-label"><?= $this->lang->line('expense_date'); ?> <label class="text-danger">*</label></label>

                  <div class="col-sm-8">
                    <div class="input-group date">
                      <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right datepicker" value="<?php echo  $expense_date; ?>" id="expense_date" name="expense_date" readonly onkeyup="shift_cursor(event,'category_id')">
                      <span id="expense_date_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>
                  </div>

                  <div class="form-group">
                  <label for="category_id" class="col-sm-4 control-label"><?= $this->lang->line('category'); ?> <label class="text-danger">*</label></label>

                  <div class="col-sm-8">
                      <select class="form-control select2" id="category_id" name="category_id"  style="width: 100%;" onkeyup="shift_cursor(event,'expense_for')" value="<?php print $category_id; ?>">
                        <?php
                        $query1="select * from db_expense_category where status=1";
                        $q1=$this->db->query($query1);
                        if($q1->num_rows($q1)>0)
                         {  echo '<option value="">-Select-</option>'; 
                             foreach($q1->result() as $res1)
                           { 
                             $selected = ($category_id==$res1->id)? 'selected' : '';
                             echo "<option $selected value='".$res1->id."'>".$res1->category_name."</option>";
                           }
                         }
                         else
                         {
                            ?>
                            <option value="">No Records Found</option>
                            <?php
                         }
                        ?>
                              </select>
                      <span id="category_id_msg" style="display:none" class="text-danger"></span>
                              </div>
                              </div>

                  <div class="form-group">
                      <label for="expense_for" class="col-sm-4 control-label"><?= $this->lang->line('expense_for'); ?> <label class="text-danger">*</label></label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="expense_for" name="expense_for" placeholder="" onkeyup="shift_cursor(event,'expense_amt')" value="<?php print $expense_for; ?>" >
          <span id="expense_for_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="expense_amt" class="col-sm-4 control-label"><?= $this->lang->line('amount'); ?> <label class="text-danger">*</label></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control only_currency" id="expense_amt" name="expense_amt" placeholder="" value="<?php print $expense_amt; ?>" onkeyup="shift_cursor(event,'reference_no')" >
          <span id="expense_amt_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  <!-- ########### -->
               </div>


               <div class="col-md-5">
                  
                   
                 
                   <div class="form-group">
                  <label for="reference_no" class="col-sm-4 control-label"><?= $this->lang->line('reference_no'); ?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="reference_no" name="reference_no" placeholder="" value="<?php print $reference_no; ?>" onkeyup="shift_cursor(event,'note')" >
          <span id="reference_no_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                   <div class="form-group">
                  <label for="note" class="col-sm-4 control-label"><?= $this->lang->line('note'); ?></label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" id="note" name="note" placeholder="" ><?php print $note; ?></textarea>
          <span id="note_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                   
                </div>
                  <!-- ########### -->
</div>
              
				
				
              </div>
              <!-- /.box-body -->

             <div class="box-footer">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                   <!-- <div class="col-sm-4"></div> -->
                   <?php
                      if($q_id!=""){
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
                                 
                   <div class="col-md-3 col-md-offset-3">
                      <button type="button" id="<?php echo $btn_id;?>" class=" btn btn-block btn-success" title="Save Data"><?php echo $btn_name;?></button>
                   </div>
                   <div class="col-sm-3">
                    <a href="<?=base_url('dashboard');?>">
                      <button type="button" class="col-sm-3 btn btn-block btn-warning close_btn" title="Go Dashboard">Close</button>
                    </a>
                   </div>
                </div>
             </div>
             <!-- /.box-footer -->
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

<!-- SOUND CODE -->
<?php include"comman/code_js_sound.php"; ?>
<!-- TABLES CODE -->
<?php include"comman/code_js_form.php"; ?>

<script src="<?php echo $theme_link; ?>js/expense.js"></script>
<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
</body>
</html>
