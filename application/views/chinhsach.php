<!DOCTYPE html>
<html>

<head>
<!-- TABLES CSS CODE -->
<?php include"comman/code_css_form.php"; ?>
<!-- </copy> -->  
</head>

<div class="wrapper">

 <?php include"sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$page_title;?>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info ">
            <div class="box-header with-border">
              <h3 class="box-title">Please Enter Valid Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="currency-form" onkeypress="return event.keyCode != 13;">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
              <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
              <div class="box-body">
				

			<div class="form-group">
            <label for="currency_name" class="col-sm-2 control-label"><?= $this->lang->line('currency_name'); ?><label class="text-danger">*</label></label>
           <div class="col-sm-4">
             <input type="text" class="form-control input-sm" id="currency_name" name="currency_name" placeholder="" onkeyup="shift_cursor(event,'currency_name')" value="<?php print $currency_name; ?>" >
              <span id="currency_name_msg" style="display:none" class="text-danger"></span>
            </div>
      </div>
      <div class="form-group">
            <label for="currency_code" class="col-sm-2 control-label"><?= $this->lang->line('currency_code'); ?></label>
           <div class="col-sm-4">
             <input type="text" class="form-control input-sm" id="currency_code" name="currency_code" placeholder="" onkeyup="shift_cursor(event,'currency_code')" value="<?php print $currency_code; ?>" >
              <span id="currency_code_msg" style="display:none" class="text-danger"></span>
            </div>
      </div>
      <div class="form-group">
            <label for="currency" class="col-sm-2 control-label"><?= $this->lang->line('currency_symbol'); ?><label class="text-danger">*</label></label>
           <div class="col-sm-4">
             <input type="text" class="form-control input-sm" id="currency" name="currency" placeholder="" onkeyup="shift_cursor(event,'currency')" value="<?php print $currency; ?>" >
              <span id="currency_msg" style="display:none" class="text-danger"></span>
            </div>
      </div>


              </div>
            
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->

    </section>

    <section class="content">
               <div class="row">
                  <!-- right column -->
                  <div class="col-md-12">
                     <div class="box">
                        <div class="box-header">
                           <h3 class="box-title"><?= $this->lang->line('currency_codes'); ?></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                           <table class="table table-bordered table-hover " id="report-data" >
                              <thead>
                                 <tr class="bg-blue">
                                    <th>Country</th>
                                    <th>Currency Code</th>
                                    <th>Currency Symbol</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>United Arab Emirates</td>
                                    <td>AED</td>
                                    <td>د.إ</td>
                                 </tr>
                                 <tr>
                                    <td>Afghanistan</td>
                                    <td>AFN</td>
                                    <td>؋</td>
                                 </tr>
                                 <tr>
                                    <td>Netherlands Antilles</td>
                                    <td>ANG</td>
                                    <td>ƒ</td>
                                 </tr>
                                 <tr>
                                    <td>Argentina</td>
                                    <td>ARS</td>
                                    <td>$</td>
                                 </tr>
                                 <tr>
                                    <td>Australia</td>
                                    <td>AUD</td>
                                    <td>$</td>
                                 </tr>
                                 <tr>
                                    <td>Brazil</td>
                                    <td>BRL</td>
                                    <td>R$</td>
                                 </tr>
                                 <tr>
                                    <td>Canada</td>
                                    <td>CAD</td>
                                    <td>$</td>
                                 </tr>
                                 <tr>
                                    <td>Switzerland</td>
                                    <td>CHF</td>
                                    <td>CHF</td>
                                 </tr>
                                 <tr>
                                    <td>China</td>
                                    <td>CNY</td>
                                    <td>¥</td>
                                 </tr>
                                 <tr>
                                    <td>Denmark</td>
                                    <td>DKK</td>
                                    <td>kr</td>
                                 </tr>
                                 <tr>
                                    <td>Algeria</td>
                                    <td>DZD</td>
                                    <td>د.ج</td>
                                 </tr>
                                 <tr>
                                    <td>Egypt</td>
                                    <td>EGP</td>
                                    <td>£</td>
                                 </tr>
                                 <tr>
                                    <td>European Union</td>
                                    <td>EUR</td>
                                    <td>€</td>
                                 </tr>
                                 <tr>
                                    <td>United Kingdom</td>
                                    <td>GBP</td>
                                    <td>£</td>
                                 </tr>
                                 <tr>
                                    <td>Ghana</td>
                                    <td>GHC, GHS</td>
                                    <td>₵</td>
                                 </tr>
                                 <tr>
                                    <td>Hong Kong</td>
                                    <td>HKD</td>
                                    <td>$</td>
                                 </tr>
                                 <tr>
                                    <td>Israel</td>
                                    <td>ILS</td>
                                    <td>₪</td>
                                 </tr>
                                 <tr>
                                    <td>India</td>
                                    <td>INR</td>
                                    <td>₹</td>
                                 </tr>
                                 <tr>
                                    <td>Iraq</td>
                                    <td>IQD</td>
                                    <td>ع.د</td>
                                 </tr>
                                 <tr>
                                    <td>Iran</td>
                                    <td>IRR</td>
                                    <td>﷼</td>
                                 </tr>
                                 <tr>
                                    <td>Jamaica</td>
                                    <td>JMD</td>
                                    <td>J$</td>
                                 </tr>
                                 <tr>
                                    <td>Jordan</td>
                                    <td>JOD</td>
                                    <td>د.ا</td>
                                 </tr>
                                 <tr>
                                    <td>Japan</td>
                                    <td>JPY</td>
                                    <td>¥</td>
                                 </tr>
                                 <tr>
                                    <td>Kenya</td>
                                    <td>KES</td>
                                    <td>KSh</td>
                                 </tr>
                                 <tr>
                                    <td>North Korea</td>
                                    <td>KPW</td>
                                    <td>₩</td>
                                 </tr>
                                 <tr>
                                    <td>South Korea</td>
                                    <td>KRW</td>
                                    <td>₩</td>
                                 </tr>
                                 <tr>
                                    <td>Kuwait</td>
                                    <td>KWD</td>
                                    <td>د.ك</td>
                                 </tr>
                                 <tr>
                                    <td>Libya</td>
                                    <td>LYD</td>
                                    <td>ل.د</td>
                                 </tr>
                                 <tr>
                                    <td>Mexico</td>
                                    <td>MXN</td>
                                    <td>$</td>
                                 </tr>
                                 <tr>
                                    <td>Morocco</td>
                                    <td>MAD</td>
                                    <td>د.م.</td>
                                 </tr>
                                 <tr>
                                    <td>Mauritius</td>
                                    <td>MUR</td>
                                    <td>₨</td>
                                 </tr>
                                 <tr>
                                    <td>Nigeria</td>
                                    <td>NGN</td>
                                    <td>₦</td>
                                 </tr>
                                 <tr>
                                    <td>New Zealand</td>
                                    <td>NZD</td>
                                    <td>$</td>
                                 </tr>
                                 <tr>
                                    <td>Peru</td>
                                    <td>PEN</td>
                                    <td>S/.</td>
                                 </tr>
                                 <tr>
                                    <td>Philippines</td>
                                    <td>PHP</td>
                                    <td>₱</td>
                                 </tr>
                                 <tr>
                                    <td>Paraguay</td>
                                    <td>PYG</td>
                                    <td>₲</td>
                                 </tr>
                                 <tr>
                                    <td>Qatar</td>
                                    <td>QAR</td>
                                    <td>ر.ق</td>
                                 </tr>
                                 <tr>
                                    <td>Romania</td>
                                    <td>RON</td>
                                    <td>lei</td>
                                 </tr>
                                 <tr>
                                    <td>Serbia</td>
                                    <td>RSD</td>
                                    <td>РСД</td>
                                 </tr>
                                 <tr>
                                    <td>Russia</td>
                                    <td>RUB</td>
                                    <td>₽</td>
                                 </tr>
                                 <tr>
                                    <td>Rwanda</td>
                                    <td>RWF</td>
                                    <td>FRw</td>
                                 </tr>
                                 <tr>
                                    <td>Saudi Arabia</td>
                                    <td>SAR</td>
                                    <td>ر.س</td>
                                 </tr>
                                 <tr>
                                    <td>Sudan</td>
                                    <td>SDG</td>
                                    <td>ج.س.</td>
                                 </tr>
                                 <tr>
                                    <td>Sweden</td>
                                    <td>SEK</td>
                                    <td>kr</td>
                                 </tr>
                                 <tr>
                                    <td>Singapore</td>
                                    <td>SGD</td>
                                    <td>$</td>
                                 </tr>
                                 <tr>
                                    <td>Saint Helena</td>
                                    <td>SHP</td>
                                    <td>£</td>
                                 </tr>
                                 <tr>
                                    <td>Syria</td>
                                    <td>SYP</td>
                                    <td>£S</td>
                                 </tr>
                                 <tr>
                                    <td>Thailand</td>
                                    <td>THB</td>
                                    <td>฿</td>
                                 </tr>
                                 <tr>
                                    <td>Tunisia</td>
                                    <td>TND</td>
                                    <td>د.ت</td>
                                 </tr>
                                 <tr>
                                    <td>Turkey</td>
                                    <td>TRY</td>
                                    <td>₺</td>
                                 </tr>
                                 <tr>
                                    <td>Taiwan</td>
                                    <td>TWD</td>
                                    <td>$</td>
                                 </tr>
                                 <tr>
                                    <td>Uganda</td>
                                    <td>UGX</td>
                                    <td>USh</td>
                                 </tr>
                                 <tr>
                                    <td>United States</td>
                                    <td>USD</td>
                                    <td>$</td>
                                 </tr>
                                 <tr>
                                    <td>Venezuela</td>
                                    <td>VES</td>
                                    <td>Bs.</td>
                                 </tr>
                                 <tr>
                                    <td>Central African CFA franc</td>
                                    <td>XAF</td>
                                    <td>FCFA</td>
                                 </tr>
                                 <tr>
                                    <td>Eastern Caribbean dollar</td>
                                    <td>XCD</td>
                                    <td>$</td>
                                 </tr>
                                 <tr>
                                    <td>West African CFA franc</td>
                                    <td>XOF</td>
                                    <td>CFA</td>
                                 </tr>
                                 <tr>
                                    <td>CFP franc</td>
                                    <td>XPF</td>
                                    <td>F</td>
                                 </tr>
                                 <tr>
                                    <td>Yemen</td>
                                    <td>YER</td>
                                    <td>﷼</td>
                                 </tr>
                                 <tr>
                                    <td>South Africa</td>
                                    <td>ZAR</td>
                                    <td>R</td>
                                 </tr>
                              </tbody>

                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
               </div>
            </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
<!-- SOUND CODE -->
<?php include"comman/code_js_sound.php"; ?>
<!-- TABLES CODE -->
<?php include"comman/code_js_form.php"; ?>

<!-- <script src="<?php echo $theme_link; ?>js/currency.js"></script> -->
<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
</body>
</html>
