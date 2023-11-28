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
          <?= $this->lang->line('warehouse_list'); ?>
          <small>Manage Warehouse</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><?= $this->lang->line('warehouse_list'); ?></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- ********** ALERT MESSAGE START******* -->
          <?php include "comman/code_flashdata.php"; ?>
          <!-- ********** ALERT MESSAGE END******* -->
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?= $this->lang->line('warehouse_list'); ?></h3>
                <div class="box-tools">
                  <a class="btn btn-block btn-info" href="<?php echo $base_url; ?>warehouse/add">
                    <i class="fa fa-plus"></i> New Warehouse</a>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                <table id="example2" class="table table-bordered table-striped" width="100%">
                  <thead class="bg-primary ">
                    <tr>
                      <th>Sl.No</th>
                      <th>Warehouse name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $i = 1;

                    $qs1 = "select * from db_warehouse";

                    $q1 = $this->db->query($qs1);

                    if ($q1->num_rows() > 0) {
                      foreach ($q1->result() as $res1) {
                    ?>
                        <tr>
                          <td> <?php echo $i++; ?> </td>
                          <td> <?php echo $res1->warehouse_name; ?> </td>
                          <td> <?php echo $res1->mobile; ?> </td>
                          <td> <?php echo $res1->email; ?> </td>
                          <td>
                            <?php
                            if ($res1->status == 1)                   //1=Active, 0=Inactive
                            {
                              echo "  <span onclick='update_status(" . $res1->id . ",0)' id='span_" . $res1->id . "'  class='label label-success' style='cursor:pointer'>Active </span>";
                            } else {
                              echo "<span onclick='update_status(" . $res1->id . ",1)' id='span_" . $res1->id . "'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
                            }
                            ?>
                          </td>
                          <td>
                            <div class="btn-group" title="View Account">
                              <a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
                                Action <span class="caret"></span>
                              </a>
                              <ul role="menu" class="dropdown-menu dropdown-light pull-right">
                                <li>
                                  <a title="Update Record ?" href="<?= base_url() ?>warehouse/edit/<?= $res1->id; ?>">
                                    Edit
                                  </a>
                                </li>
                                <li>
                                  <a style="cursor:pointer" title="Delete Record ?" onclick="delete_warehouse('<?= $res1->id; ?>')">
                                    Delete
                                  </a>
                                </li>

                              </ul>
                            </div>
                          </td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
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

  <script src="<?php echo $theme_link; ?>js/warehouse.js"></script>

  <script type="text/javascript">
    function delete_warehouse(id) {
      if (confirm("Do You Wants to Delete Record ?")) {
        $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        $.post("warehouse/delete_warehouse", {
          id: id
        }, function(result) {
          //alert(result);return;
          if (result == "success") {
            toastr["success"]("Record Deleted Successfully!");
            // $('#example2').DataTable().ajax.reload();
            location.reload();

          } else if (result == "failed") {
            toastr["error"]("Failed to Delete .Try again!");

          } else {
            toastr["error"]("Error! Something Went Wrong!");

          }
          $(".overlay").remove();
        });
      } //end confirmation
    }
    //Delete Record end    
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
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
                columns: [0, 1, 2, 3, 4]
              }
            },
            {
              extend: 'excel',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [0, 1, 2, 3, 4]
              }
            },
            {
              extend: 'pdf',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [0, 1, 2, 3, 4]
              }
            },
            {
              extend: 'print',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7]
              }
            },
            {
              extend: 'csv',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [0, 1, 2, 3, 4]
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
        "serverSide": false, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "responsive": true,
        language: {
          processing: '<div class="text-primary bg-primary" style="position: relative;z-index:100;overflow: visible;">Processing...</div>'
        },
        // Load data for the table's content from an Ajax source

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [5], //first column / numbering column
            "orderable": false, //set not orderable
          },
          {
            "targets": [],
            "className": "text-center",
          },

        ],
      });
      new $.fn.dataTable.FixedHeader(table);
    });
  </script>
  <script>
    $(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");
  </script>

</body>

</html>