<!DOCTYPE html>
<html>

<head>
   <!-- TABLES CSS CODE -->
   <?php include "comman/code_css_form.php"; ?>
   <!-- </copy> -->

</head>

<body class="hold-transition skin-blue sidebar-mini">


   <div class="wrapper">

      <?php include "sidebar.php"; ?>

      <!-- Content Wrapper. Contains page content -->


      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <h1>
               <?= $page_title; ?>
               <small></small>
            </h1>
            <ol class="breadcrumb">
               <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
               <li class="active">
                  <?= $page_title; ?>
               </li>
            </ol>
         </section>



         <section class="content">

            <!-- BAR CHART -->
            <div class="box box-success">
               <div class="box-header with-border">
                  <h3 class="box-title text-uppercase">
                     Biểu đồ doanh thu và lợi nhuận trong 30 ngày
                  </h3>

                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                           class="fa fa-times"></i></button>
                  </div>
               </div>
               <div class="box-body">
                  <div class="chart">
                     <canvas id="barChart" style="height:230px"></canvas>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>

            <!-- BAR CHART -->
            <div class="box box-success">
               <div class="box-header with-border">
                  <h3 class="box-title text-uppercase">
                     Biểu đồ doanh thu và lợi nhuận trong 24 tháng
                  </h3>

                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                           class="fa fa-times"></i></button>
                  </div>
               </div>
               <div class="box-body">
                  <div class="chart">
                     <canvas id="barChart2" style="height:230px"></canvas>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>

            <!-- /.box -->

            <div class="row">
               <div class="col-md-12">
                  <div class="box box-primary">
                     <div class="box-body table-responsive no-padding">
                        <div class="form-group col-md-4">
                           <label for="to_date">Select Date</label>

                           <div class="input-group">
                              <button type="button" class="btn btn-default pull-right " id="pl-daterange-btn"
                                 name="pl-daterange-btn">
                                 <span>
                                    <i class="fa fa-calendar"></i> Select Date Range
                                 </span>
                                 <i class="fa fa-caret-down"></i>
                              </button>
                           </div>

                           <span id="sku_msg" style="display:none" class="text-danger"></span>
                        </div>

                        <!-- Inside -->
                     </div>
                  </div>
               </div>
               <!-- left column -->


               <div class="col-md-6">
                  <div class="box box-primary">
                     <div class="box-header">
                        <?php $this->load->view('components/export_btn', array('tableId' => 'report-data')); ?>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-hover " id="report-data">
                           <!-- Total Opening Stock -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('opening_stock'); ?>
                              </td>
                              <td class="text-right text-bold opening_stock_price">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2" class="text-bold font-italic text-primary">
                                 <?= $this->lang->line('purchase'); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_purchase'); ?>
                              </td>
                              <td class="text-right text-bold pur_total">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase Tax -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_purchase_tax'); ?>
                              </td>
                              <td class="text-right text-bold purchase_tax_amt">
                                 <?php echo $CI->currency(number_format((0), 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase Other Charges -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_other_charges_of_purchase'); ?>
                              </td>
                              <td class="text-right text-bold pur_other_charges_amt">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase Doscount -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_discount_on_purchase'); ?>
                              </td>
                              <td class="text-right text-bold purchase_discount_amt">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase Paid Amount -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('paid_amount'); ?>
                              </td>
                              <td class="text-right text-bold text-success purchase_paid_amount">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase Due -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('purchase_due'); ?>
                              </td>
                              <td class="text-right text-bold text-danger purchase_due_total">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2" class="text-bold font-italic text-primary">
                                 <?= $this->lang->line('purchase_return'); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase Return -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_purchase_return'); ?>
                              </td>
                              <td class="text-right text-bold pur_return_total">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase return Tax -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_purchase_return_tax'); ?>
                              </td>
                              <td class="text-right text-bold purchase_return_tax_amt">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase return Other Charges -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_other_charges_of_purchase_return'); ?>
                              </td>
                              <td class="text-right text-bold pur_return_other_charges_amt">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase return Doscount -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_discount_on_purchase_return'); ?>
                              </td>
                              <td class="text-right text-bold purchase_return_discount_amt">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase Return Paid Amount -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('paid_amount'); ?>
                              </td>
                              <td class="text-right text-bold text-success purchase_return_paid_amount">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Purchase returns Due -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('purchase_return_due'); ?>
                              </td>
                              <td class="text-right text-bold text-danger purchase_return_due_total">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                        </table>
                     </div>
                     <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
               </div>
               <div class="col-md-6">
                  <div class="box">
                     <div class="box-header">
                        <?php $this->load->view('components/export_btn', array('tableId' => 'report-data-4')); ?>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-hover " id="report-data-4">
                           <!-- Total Expenses -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_expense'); ?>
                              </td>
                              <td class="text-right text-bold exp_total">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2" class="text-bold font-italic text-primary">
                                 <?= $this->lang->line('sales'); ?>
                              </td>
                           </tr>
                           <!-- Total Sales -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_sales'); ?>
                              </td>
                              <td class="text-right text-bold sal_total">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Sales Tax -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_sales_tax'); ?>
                              </td>
                              <td class="text-right text-bold sales_tax_amt">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Sales Other Charges -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_other_charges_of_sales'); ?>
                              </td>
                              <td class="text-right text-bold sal_other_charges_amt">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Sales Doscount -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_discount_on_sales'); ?>
                              </td>
                              <td class="text-right text-bold sales_discount_amt">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Sales Paid Amount -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('paid_amount'); ?>
                              </td>
                              <td class="text-right text-bold text-success sales_paid_amount">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Sales Due -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('sales_due'); ?>
                              </td>
                              <td class="text-right text-bold text-danger sales_due_total">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2" class="text-bold font-italic text-primary">
                                 <?= $this->lang->line('sales_return'); ?>
                              </td>
                           </tr>
                           <!-- Total sales Return -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_sales_return'); ?>
                              </td>
                              <td class="text-right text-bold sal_return_total">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total sales return Tax -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_sales_return_tax'); ?>
                              </td>
                              <td class="text-right text-bold sales_return_tax_amt">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Sales return Other Charges -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_other_charges_of_sales_return'); ?>
                              </td>
                              <td class="text-right text-bold sal_return_other_charges_amt">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Sales return Doscount -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('total_discount_on_sales_return'); ?>
                              </td>
                              <td class="text-right text-bold sales_return_discount_amt">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Sales return Paid Amount -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('paid_amount'); ?>
                              </td>
                              <td class="text-right text-bold text-success sales_return_paid_amount">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Sales Return Due -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('sales_return_due'); ?>
                              </td>
                              <td class="text-right text-bold text-danger sales_return_due_total">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                        </table>
                     </div>
                     <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
               </div>
               <!-- right column -->
               <div class="col-md-6">
                  <div class="box">
                     <div class="box-header">
                        <?php $this->load->view('components/export_btn', array('tableId' => 'report-data-2')); ?>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-hover " id="report-data-2">
                           <!-- Total Gross Profit -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('gross_profit'); ?>
                              </td>
                              <td class="text-right text-bold gross_profit">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                           <!-- Total Net Profit -->
                           <tr>
                              <td>
                                 <?= $this->lang->line('net_profit'); ?>
                              </td>
                              <td class="text-right text-bold tot_net_profit">
                                 <?php echo $CI->currency(number_format(0, 0, '.', '')); ?>
                              </td>
                           </tr>
                        </table>
                     </div>
                     <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
               </div>

            </div>
            <div class="row">
               <!-- left column -->
               <div class="col-md-12">
                  <div class="box">
                     <div class="box-header">
                        <?= form_open('#', array('class' => 'form-horizontal', 'id' => 'profit-loss-report', 'enctype' => 'multipart/form-data', 'method' => 'POST')); ?>
                        <input type="hidden" id="base_url" value="<?php echo $base_url;
                        ; ?>">
                        <div class="form-group">
                           <label for="to_date" class="col-sm-2 control-label">Select Date</label>
                           <div class="col-sm-3">
                              <div class="input-group">
                                 <button type="button" class="btn btn-default pull-right daterange-btn"
                                    name="pl2-daterange-btn" id="pl2-daterange-btn">
                                    <span>
                                       <i class="fa fa-calendar"></i> Select Date Range
                                    </span>
                                    <i class="fa fa-caret-down"></i>
                                 </button>
                              </div>
                           </div>

                           <!-- Your Code -->
                        </div>
                        <?= form_close(); ?>



                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">

                           <div class="col-md-12">
                              <!-- Custom Tabs -->
                              <div class="nav-tabs-custom">

                                 <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">
                                          <?= $this->lang->line('item_wise_profit'); ?>
                                       </a></li>
                                    <li><a href="#tab_2" data-toggle="tab">
                                          <?= $this->lang->line('invoice_wise_profit'); ?>
                                       </a></li>
                                 </ul>
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                       <div class="row">
                                          <!-- right column -->
                                          <div class="col-md-12">
                                             <!-- form start -->
                                             <input type="hidden" id="base_url" value="<?php echo $base_url;
                                             ; ?>">
                                             <?php $this->load->view('components/export_btn', array('tableId' => 'profit_by_item_table')); ?>
                                             <br><br>
                                             <div class="table-responsive">
                                                <table class="table table-bordered table-hover "
                                                   id="profit_by_item_table">
                                                   <thead>
                                                      <tr class='bg-blue'>
                                                         <th style="">#</th>
                                                         <th style="">
                                                            <?= $this->lang->line('item_name'); ?>
                                                         </th>
                                                         <th style="">
                                                            <?= $this->lang->line('sales_quantity'); ?>
                                                         </th>
                                                         <th style="">
                                                            <?= $this->lang->line('sales_price'); ?>
                                                         </th>
                                                         <th style="">
                                                            <?= $this->lang->line('purchase_price'); ?>
                                                         </th>
                                                         <th style="">
                                                            <?= $this->lang->line('gross_profit'); ?>
                                                         </th>
                                                         <!-- <th style=""><?= $this->lang->line('purchase_return_quantity'); ?></th>
                                                <th style=""><?= $this->lang->line('purchase_return_price'); ?>(+)</th>
                                                <th style=""><?= $this->lang->line('sales_return_quantity'); ?></th>
                                                <th style=""><?= $this->lang->line('sales_return_price'); ?>(-)</th> -->
                                                         <!-- <th style=""><?= $this->lang->line('net_profit'); ?></th> -->
                                                      </tr>
                                                   </thead>
                                                   <tbody id="tbodyid">

                                                   </tbody>
                                                </table>
                                             </div>
                                             <!-- /.box-body -->
                                          </div>
                                          <!--/.col (right) -->
                                       </div>
                                       <!-- /.row -->
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="tab_2">
                                       <div class="row">
                                          <div class="col-md-12">

                                             <div class="alert alert-info text-left">
                                                <p>
                                                   <strong>Note:</strong>
                                                   Item Wise & Invoice wise Reports total Gross Profit may worries,
                                                   Invoice wise Report deducts Discount on Invoice.
                                                </p>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="row">
                                          <!-- right column -->
                                          <div class="col-md-12">
                                             <!-- form start -->
                                             <input type="hidden" id="base_url" value="<?php echo $base_url;
                                             ; ?>">
                                             <?php $this->load->view('components/export_btn', array('tableId' => 'profit_by_invoice_table')); ?>

                                             <br><br>
                                             <div class="table-responsive">
                                                <table class="table table-bordered table-hover "
                                                   id="profit_by_invoice_table">
                                                   <thead>
                                                      <tr class='bg-blue'>
                                                         <th style="">#</th>
                                                         <th style="">
                                                            <?= $this->lang->line('invoice_no'); ?>
                                                         </th>
                                                         <th style="">
                                                            <?= $this->lang->line('sales_date'); ?>
                                                         </th>
                                                         <th style="">
                                                            <?= $this->lang->line('customer_name'); ?>
                                                         </th>
                                                         <th style="">
                                                            <?= $this->lang->line('sales_price'); ?>
                                                         </th>
                                                         <th style="">
                                                            <?= $this->lang->line('purchase_price'); ?>
                                                         </th>
                                                         <th style="">
                                                            <?= $this->lang->line('invoice_discount'); ?>
                                                         </th>
                                                         <th style="">
                                                            <?= $this->lang->line('gross_profit'); ?>
                                                         </th>

                                                      </tr>
                                                   </thead>
                                                   <tbody id="tbodyid">

                                                   </tbody>
                                                </table>
                                             </div>
                                             <!-- /.box-body -->
                                          </div>
                                          <!--/.col (right) -->
                                       </div>
                                       <!-- /.row -->
                                    </div>
                                    <!-- /.tab-pane -->

                                 </div>
                                 <!-- /.tab-content -->
                              </div>
                              <!-- nav-tabs-custom -->
                           </div>
                           <!-- /.col -->

                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>

               </div>

         </section>

      </div>
      <!-- /.content-wrapper -->

      <?php

      //Bar chart information
      $sales_date = '';
      $total_revenue = '';
      $total_profit = '';



      $q3 = $this->db->query("SELECT
          all_dates.date AS sales_date,
          COALESCE(SUM(db_salesitems.total_cost), 0) AS total_revenue,
          COALESCE(SUM(db_salesitems.total_cost - db_salesitems.purchase_price * db_salesitems.sales_qty), 0) AS total_profit
      FROM (
          SELECT CURDATE() - INTERVAL n DAY AS date
          FROM (
              SELECT 0 AS n UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION
              SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION
              SELECT 10 UNION SELECT 11 UNION SELECT 12 UNION SELECT 13 UNION SELECT 14 UNION
              SELECT 15 UNION SELECT 16 UNION SELECT 17 UNION SELECT 18 UNION SELECT 19 UNION
              SELECT 20 UNION SELECT 21 UNION SELECT 22 UNION SELECT 23 UNION SELECT 24 UNION
              SELECT 25 UNION SELECT 26 UNION SELECT 27 UNION SELECT 28 UNION SELECT 29
          ) AS numbers
      ) AS all_dates
      LEFT JOIN db_sales ON DATE(db_sales.sales_date) = all_dates.date
      LEFT JOIN db_salesitems ON db_sales.id = db_salesitems.sales_id
      GROUP BY sales_date
      ORDER BY sales_date DESC");

      /*      $result = $q3->result();

           foreach ($result as $row) {
              $date_series[] = $row['sales_date'];
              $total_revenue[] = $row['total_revenue'];
              $total_profit[] = $row['total_profit'];
           } */

      // Kiểm tra xem truy vấn đã thành công hay chưa
      if ($q3) {
         // Lấy kết quả truy vấn dưới dạng mảng
         $result_array = $q3->result_array();

         // Hiển thị dữ liệu hoặc xử lý theo nhu cầu
      
         foreach ($result_array as $row) {
            $mang1[$row['sales_date']] = intval($row['total_revenue'] / 1000);
            $mang2[$row['sales_date']] = intval($row['total_profit'] / 1000);

         }
         $today = strtotime(date("Y-m-d"));
         for ($i = 0; $i <= 30; $i++) {
            $previous_date = date("Y-m-d", strtotime("-$i days", $today));
            if ($i == 1) {
               $sales_date = '\'Hôm nay\',\'Hôm qua\'';
            } else {
               $sales_date = $sales_date . ",'" . $previous_date . "'";
            }

            if (isset($mang1[$previous_date])) {
               $total_revenue = $total_revenue . "," . $mang1[$previous_date];
            } else {
               $total_revenue = $total_revenue . "," . '0';
            }

            if (isset($mang2[$previous_date])) {
               $total_profit = $total_profit . "," . $mang2[$previous_date];
            } else {
               $total_profit = $total_profit . "," . '0';
            }

         }

         $total_revenue = substr($total_revenue, 1);
         $total_profit = substr($total_profit, 1);

         // echo 'duy' . $sales_date;
         // echo 'duy2' . $total_revenue;
         // echo 'duy3' . $total_profit;
      }

      $sales_date2 = '';
      $total_revenue2 = '';
      $total_profit2 = '';

      $q4 = $this->db->query("SELECT
      DATE_FORMAT(all_dates.date, '%Y-%m') AS sales_month,
      COALESCE(SUM(db_salesitems.total_cost), 0) AS total_revenue2,
      COALESCE(SUM(db_salesitems.total_cost - db_salesitems.purchase_price * db_salesitems.sales_qty), 0) AS total_profit2
  FROM (
      SELECT CURDATE() - INTERVAL n MONTH AS date
      FROM (
          SELECT 0 AS n UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION
          SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION
          SELECT 10 UNION SELECT 11 UNION SELECT 12 UNION SELECT 13 UNION SELECT 14 UNION
          SELECT 15 UNION SELECT 16 UNION SELECT 17 UNION SELECT 18 UNION SELECT 19 UNION
          SELECT 20 UNION SELECT 21 UNION SELECT 22 UNION SELECT 23
      ) AS numbers
  ) AS all_dates
  LEFT JOIN db_sales ON DATE_FORMAT(db_sales.sales_date, '%Y-%m') = DATE_FORMAT(all_dates.date, '%Y-%m')
  LEFT JOIN db_salesitems ON db_sales.id = db_salesitems.sales_id
  GROUP BY sales_month
  ORDER BY sales_month DESC");


      if ($q4) {
         // Lấy kết quả truy vấn dưới dạng mảng
         $result_array = $q4->result_array();

         // Hiển thị dữ liệu hoặc xử lý theo nhu cầu
      
         foreach ($result_array as $row) {

            $sales_date2 = $sales_date2 . ",'" . $row['sales_month'] . "'";
            $total_revenue2 = $total_revenue2 . "," . intval($row['total_revenue2'] / 1000);
            $total_profit2 = $total_profit2 . "," . intval($row['total_profit2'] / 1000);
         }

         $sales_date2 = substr($sales_date2, 1);
         $total_revenue2 = substr($total_revenue2, 1);
         $total_profit2 = substr($total_profit2, 1);

         echo 'duy' . $sales_date2;
         echo 'duy2' . $total_revenue2;
         echo 'duy3' . $total_profit2;
      }

      ?>
      <!-- ############################# GRAPHS END############################## -->


      <?php include "footer.php"; ?>


      <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
   </div>
   <!-- ./wrapper -->

   <!-- SOUND CODE -->
   <?php include "comman/code_js_sound.php"; ?>
   <!-- TABLES CODE -->
   <?php include "comman/code_js_form.php"; ?>
   <!-- TABLE EXPORT CODE -->
   <?php include "comman/code_js_export.php"; ?>

   <script>
      function get_reports(report_type, table_name) {
         $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
         var base_url = $("#base_url").val();
         return $.post(base_url + 'reports/' + report_type, {
            from_date: get_start_date('pl2-daterange-btn'),
            to_date: get_end_date('pl2-daterange-btn')
         }, function (result) {
            //console.log(result);
            $("#" + table_name + " tbody").html(result);
            $(".overlay").remove();
         });
      }

      function get_all_reports() {
         get_reports('get_profit_by_item', 'profit_by_item_table');
         get_reports('get_profit_by_invoice', 'profit_by_invoice_table');
      }
      jQuery(document).ready(function ($) {
         get_pl_values();
         get_all_reports();
      });

      function get_pl_values() {
         var base_url = $("#base_url").val();
         $.post(base_url + "reports/get_profit_loss_report", {
            from_date: get_start_date('pl-daterange-btn'),
            to_date: get_end_date('pl-daterange-btn')
         }, function (result) {
            var data = jQuery.parseJSON(result);
            $.each(data, function (index, element) {
               $("." + index).html(element);
            });
         });
      }

      /*Date Range picker event 1*/
      $('#pl-daterange-btn').on('apply.daterangepicker', function (ev, picker) {
         console.log("pl-daterange-btn");
         get_pl_values();
      });
      /*end*/
      /*Date Range picker event 2*/
      $('#pl2-daterange-btn').on('apply.daterangepicker', function (ev, picker) {
         console.log("pl2-daterange-btn");
         get_all_reports();
      });
      /*end*/

      $(function () {
         var start = moment().subtract(29, 'days');
         var end = moment();

         function cb(start, end) {
            $('.daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('#pl-daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
         }
         cb(start, end);

      });



      //Date picker 1
      $('#pl-daterange-btn').daterangepicker({
         ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
         },
         startDate: moment().subtract(29, 'days'),
         endDate: moment()
      },
         function (start, end) {

            $('#pl-daterange-btn span').html(start.format('<?php echo strtoupper($VIEW_DATE); ?>') + ' - ' + end.format('<?php echo strtoupper($VIEW_DATE); ?>'))
         }
      );


      $(function () {

         var barChartData = {
            labels: [<?php echo $sales_date; ?>],
            datasets: [
               {
                  label: "Doanh thu (x 1.000đ)",
                  fillColor: "rgba(210, 214, 222, 1)",
                  strokeColor: "rgba(210, 214, 222, 1)",
                  pointColor: "rgba(210, 214, 222, 1)",
                  pointStrokeColor: "#c1c7d1",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(220,220,220,1)",
                  data: [<?php echo $total_revenue; ?>]
               },
               {
                  label: "Lợi nhuận (x 1.000đ)",
                  fillColor: "rgba(60,141,188,0.9)",
                  strokeColor: "rgba(60,141,188,0.8)",
                  pointColor: "#3b8bba",
                  pointStrokeColor: "rgba(60,141,188,1)",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(60,141,188,1)",
                  data: [<?php echo $total_profit; ?>]
               }
            ]
         };

         var barChartCanvas = $("#barChart").get(0).getContext("2d");

         // Định dạng số trong mảng dữ liệu

         var barChart = new Chart(barChartCanvas);
         barChartData.datasets[1].fillColor = "#00a65a";
         barChartData.datasets[1].strokeColor = "#00a65a";
         barChartData.datasets[1].pointColor = "#00a65a";
         var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
         };

         barChartOptions.datasetFill = false;
         barChart.Bar(barChartData, barChartOptions);





         var barChartData2 = {
            labels: [<?php echo $sales_date2; ?>],
            datasets: [
               {
                  label: "Doanh thu (x 1.000đ)",
                  fillColor: "rgba(210, 214, 222, 1)",
                  strokeColor: "rgba(210, 214, 222, 1)",
                  pointColor: "rgba(210, 214, 222, 1)",
                  pointStrokeColor: "#c1c7d1",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(220,220,220,1)",
                  data: [<?php echo $total_revenue2; ?>]
               },
               {
                  label: "Lợi nhuận (x 1.000đ)",
                  fillColor: "rgba(60,141,188,0.9)",
                  strokeColor: "rgba(60,141,188,0.8)",
                  pointColor: "#3b8bba",
                  pointStrokeColor: "rgba(60,141,188,1)",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(60,141,188,1)",
                  data: [<?php echo $total_profit2; ?>]
               }
            ]
         };

         var barChartCanvas2 = $("#barChart2").get(0).getContext("2d");

         // Định dạng số trong mảng dữ liệu

         var barChart2 = new Chart(barChartCanvas2);
         barChartData2.datasets[1].fillColor = "#00a65a";
         barChartData2.datasets[1].strokeColor = "#00a65a";
         barChartData2.datasets[1].pointColor = "#00a65a";
         var barChartOptions2 = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
         };

         barChartOptions2.datasetFill = false;
         barChart2.Bar(barChartData2, barChartOptions2);
      });
      //End
   </script>


   <!-- Make sidebar menu hughlighter/selector -->
   <script>
      $(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");
   </script>

   <!-- ChartJS 1.0.1 -->
   <script src="<?php echo $theme_link; ?>plugins/chartjs/Chart.min.js"></script>


</body>

</html>