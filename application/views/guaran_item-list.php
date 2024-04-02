<!DOCTYPE html>
<html>

<head>
  <!-- TABLES CSS CODE -->
  <?php include "comman/code_css_datatable.php"; ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Left side column. contains the logo and sidebar -->

    <?php include "sidebar.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $page_title; ?>

        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><?= $page_title; ?></li>
        </ol>
      </section>

      <!-- Main content -->
      <?= form_open('#', array('class' => '', 'id' => 'table_form')); ?>
      <input type="hidden" id='base_url' value="<?= $base_url; ?>">
      <section class="content">




        <div class="row">
          <!-- ********** ALERT MESSAGE START******* -->
    


          <div class="row">

            <div class="col-md-12">

              <div class="col-md-3">
                <div class="form-group">
                  <label for="search_customer_id"><?= $this->lang->line('customers'); ?> </label></label>
                  <select class="form-control select2" id="search_customer_id" name="search_customer_id" style="width: 100%;">
                  </select>
                  <span id="search_customer_id_msg" style="display:none" class="text-danger"></span>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="sales_from_date"><?= $this->lang->line('from_date'); ?> </label></label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right datepicker" id="sales_from_date" name="sales_from_date">
                  </div>
                  <span id="sales_from_date_msg" style="display:none" class="text-danger"></span>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="sales_to_date"><?= $this->lang->line('to_date'); ?> </label></label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right datepicker" id="sales_to_date" name="sales_to_date">
                  </div>
                  <span id="sales_to_date_msg" style="display:none" class="text-danger"></span>
                </div>
              </div>



            </div>
          </div>
          <!-- ********** ALERT MESSAGE END******* -->
          <div class="col-xs-12">
            <div class="box">

              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped" width="100%">
                  <thead class="bg-primary ">
                    <tr>
                      <th class="text-center">#</th>
                      <th><?= $this->lang->line('customer'); ?></th>
                      <th><?= $this->lang->line('mobile'); ?></th>
                      <th><?= $this->lang->line('item_sn'); ?></th>
                      <th><?= $this->lang->line('sale_code'); ?></th>
                      <th><?= $this->lang->line('name_guarantee'); ?></th>
                      <th><?= $this->lang->line('item_name'); ?></th>
                      <th><?= $this->lang->line('description'); ?></th>
                      <th><?= $this->lang->line('exprire'); ?></th>
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
      <?= form_close(); ?>
    </div>
    <!-- /.content-wrapper -->
    <?php include "footer.php"; ?>
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- SOUND CODE -->
  <?php include "comman/code_js_sound.php"; ?>
  <!-- TABLES CODE -->
  <?php include "comman/code_js_datatable.php"; ?>

  <script src="<?php echo $theme_link; ?>plugins/datepicker/bootstrap-datepicker.js"></script>

  <script src="<?php echo $theme_link; ?>js/ajaxselect/customer_select_ajax.js"></script>

  <script type="text/javascript">
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      todayHighlight: true
    });
  </script>

  <script type="text/javascript">
    //Customer Selection Box Search
    function getCustomerSelectionId() {
      return '#search_customer_id';
    }
    //Customer Selection Box Search - END


    function load_datatable(argument) {
      //datatables
      var table = $('#example2').DataTable({

        /* FOR EXPORT BUTTONS START*/
        dom: '<"row margin-bottom-12"<"col-sm-12"<"pull-left"l><"pull-right"fr><"pull-right margin-left-10 "B>>>tip',
        /* dom:'<"row"<"col-sm-12"<"pull-left"B><"pull-right">>> <"row margin-bottom-12"<"col-sm-12"<"pull-left"l><"pull-right"fr>>>tip',*/
        buttons: {
          buttons: [{
              className: 'btn bg-red color-palette btn-flat hidden delete_btn pull-left',
              text: 'Delete',
              action: function(e, dt, node, config) {
                multi_delete();
              }
            },
            {
              extend: 'copy',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [1, 2, 3]
              }
            },
            {
              extend: 'excel',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [1, 2, 3]
              }
            },
            {
              extend: 'pdf',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [1, 2, 3]
              }
            },
            {
              extend: 'print',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [1, 2, 3]
              }
            },
            {
              extend: 'csv',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [1, 2, 3]
              }
            },
            {
              extend: 'colvis',
              className: 'btn bg-teal color-palette btn-flat',
              text: 'Columns'
            },

          ]
        },
        /* FOR EXPORT BUTTONS END */

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "responsive": true,
        language: {
          processing: '<div class="text-primary bg-primary" style="position: relative;z-index:100;overflow: visible;">Processing...</div>'
        },
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('guaran_item/ajax_list') ?>",
          "type": "POST",
          "data": {
            sales_from_date: $("#sales_from_date").val(),
            sales_to_date: $("#sales_to_date").val(),
            customer_id: $("#search_customer_id").val(),
          },

          complete: function(data) {
            $('.column_checkbox').iCheck({
              checkboxClass: 'icheckbox_square-orange',
              /*uncheckedClass: 'bg-white',*/
              radioClass: 'iradio_square-orange',
              increaseArea: '10%' // optional
            });
            call_code();
            //$(".delete_btn").hide();
          },

        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0, 4], //first column / numbering column
            "orderable": false, //set not orderable
          },
          {
            "targets": [0],
            "className": "text-center",
          },

        ],
      });
      new $.fn.dataTable.FixedHeader(table);
    }
    $(document).ready(function() {
      load_datatable();
    });

    $("#sales_from_date,#sales_to_date,#search_customer_id").on("change", function() {
      $('#example2').DataTable().destroy();
      load_datatable();
    });
  </script>

  <script src="<?php echo $theme_link; ?>js/guaran_item.js"></script>
  <!-- Make sidebar menu hughlighter/selector -->
  <script>
    $(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");
  </script>
</body>

</html>