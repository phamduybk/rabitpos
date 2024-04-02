<?php
 goto WqHQP; IJ7Qg: ?>
</b><b class="hidden-lg">POS</b></a> <button class="collapsed navbar-toggle"type="button"data-toggle="collapse"data-target="#navbar-collapse"><i class="fa fa-bars"></i></button></div><div class="pull-left collapse navbar-collapse"id="navbar-collapse"><ul class="nav navbar-nav"><?php  goto G44WP; Q01r7: include "\x6d\157\144\x61\154\x73\57\x6d\157\x64\141\x6c\x5f\164\141\142\x6c\x65\56\x70\x68\x70"; goto cDKgI; HbNDf: ?>
:</label><br><span class="text-bold tot_qty"></span></div><div class="text-right col-md-3"><label><?php  goto JfMm1; LgURW: ?>
:<a class="fa cursor-pointer fa-pencil-square-o"data-toggle="modal"data-target="#discount-modal"></a></label><br><span class="text-bold tot_disc"style="font-size:19px;display:none"></span><?php  goto VwkNQ; YqtR_: ?>
"type="hidden"> <input id="show_stock"value="<?php  goto dgSGZ; pC36r: echo $CI->currency("\x3c\x73\x70\141\156\40\x73\x74\171\154\x65\75\42\x66\x6f\156\164\x2d\x73\151\172\145\72\x20\61\71\x70\170\73\x22\x20\143\x6c\141\x73\x73\75\42\x74\x6f\164\137\x67\x72\141\x6e\x64\137\163\x68\x6f\x77\40\164\145\x78\x74\x2d\142\157\x6c\144\42\x3e\74\57\x73\160\x61\x6e\x3e"); goto HjJvb; IRLy8: echo "\x73\150\157\167\137\143\x61\163\150\137\x6d\157\x64\141\154"; goto II3Ki; F2kBW: $query1 = "\x73\145\x6c\145\143\x74\x20\x2a\x20\146\162\157\x6d\x20\x64\142\137\164\x61\x62\x6c\x65\137\164\171\160\x65\40\167\x68\145\x72\145\40\163\x74\141\x74\165\163\75\61"; goto jUO04; bukK5: ?>
users/edit/<?php  goto BzJTp; tpZSJ: if (isset($sales_id) && !empty($sales_id)) { ?>
$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
    $.get("<?php  echo $base_url; ?>
pos/fetch_sales/<?php  echo $sales_id; ?>
",{},function(result){
     // console.log(result);
      result=result.split("<<<###>>>");
      $('#pos-form-tbody').append(result[0]);
      $('#discount_input').val(result[1]);
      $('#discount_type').val(result[2]);
      //$('#customer_id').val(result[3]).select2();
      $('#temp_customer_id').val(result[3]);
      $('#other_charges').val(result[4]);
      $('#sales_date').val(result[5]);
      $("#hidden_rowcount").val(parseFloat($(".items_table tr").length)-1);
      
      $(".overlay").remove();
      //$("#customer_id").trigger("change");
      if(result[5]==1){
        $( "#binvoice" ).prop( "checked", true );
        $('#binvoice').parent('div').addClass('checked');
      }

      final_total();
      adjust_payments();

    });
      //DISABLE THE HOLD BUTTON
      $("#hold_invoice,#show_cash_modal").attr('disabled',true).removeAttr('id');<?php  } goto y1dSi; sUxtv: echo $base_url; goto bukK5; Y8urh: ?>
"><input data-toggle="tooltip" title="Click to Change" id="td_data_'+rowcount+'_11" onclick="show_sales_item_modal('+rowcount+')" name="td_data_'+rowcount+'_11" type="text" class="form-control no-padding pointer min_width" readonly value="'+tax_amt+'"></td>';

        str+='<td id="td_'+rowcount+'_4" class="text-right"><input data-toggle="tooltip" title="Total" id="td_data_'+rowcount+'_4" name="td_data_'+rowcount+'_4" type="text" class="form-control no-padding pointer min_width" readonly value="'+sub_total+'"></td>';/* td_0_4 item sub_total */
        str+='<td id="td_'+rowcount+'_5">'+ remove_btn    +'</td>';/* td_0_5 item gst_amt */

        str+='<input type="hidden" name="tr_item_id_'+rowcount+'" id="tr_item_id_'+rowcount+'" value="'+item_id+'">';
       // str+='<input type="hidden" id="tr_item_per_'+rowcount+'" name="tr_item_per_'+rowcount+'" value="'+gst_per+'">';
        str+='<input type="hidden" id="tr_sales_price_temp_'+rowcount+'" name="tr_sales_price_temp_'+rowcount+'" value="'+sales_price_temp+'">';
        str+='<input type="hidden" id="tr_tax_type_'+rowcount+'" name="tr_tax_type_'+rowcount+'" value="'+tax_type+'">';
        str+='<input type="hidden" id="tr_unit_name_'+rowcount+'" name="tr_unit_name_'+rowcount+'" value="'+unit_name+'">';
        str+='<input type="hidden" id="tr_tax_id_'+rowcount+'" name="tr_tax_id_'+rowcount+'" value="'+tax_id+'">';
        str+='<input type="hidden" id="tr_tax_value_'+rowcount+'" name="tr_tax_value_'+rowcount+'" value="'+tax_value+'">';
        str+='<input type="hidden" id="description_'+rowcount+'" name="description_'+rowcount+'" value="">';
        str+='<input id="item_discount_type_'+rowcount+'" name="item_discount_type_'+rowcount+'" type="hidden" value="'+discount_type+'">';
         str+='<input id="item_discount_input_'+rowcount+'" name="item_discount_input_'+rowcount+'" type="hidden" value="'+discount+'">';
         str+='<input id="item_discount_type_first_'+rowcount+'" name="item_discount_type_first_'+rowcount+'" type="hidden" value="'+discount_type_first+'">';
         str+='<input id="item_discount_input_first_'+rowcount+'" name="item_discount_input_first_'+rowcount+'" type="hidden" value="'+discount_first+'">';

       
         str+='<input type="hidden" id="purchase_price_'+rowcount+'" name="purchase_price_'+rowcount+'" value="'+sales_price+'">';
         str+='<input type="hidden" id="good_price_'+rowcount+'" name="good_price_'+rowcount+'" value="'+good_price+'">';
         str+='<input type="hidden" id="sub_price_'+rowcount+'" name="sub_price_'+rowcount+'" value="0">';
         str+='<input type="hidden" id="guaran_id_'+rowcount+'" name="guaran_id_'+rowcount+'" value="'+guaran_id+'">';
         str+='<input type="hidden" id="code_'+rowcount+'" name="code_'+rowcount+'" value="'+code+'">';

        str+='</tr>';   

    //LEFT SIDE: ADD OR APPEND TO SALES INVOICE TERMINAL
    $('#pos-form-tbody').append(str);

    //LEFT SIDE: INCREMANT ROW COUNT
    $("#hidden_rowcount").val(parseFloat($("#hidden_rowcount").val())+1);
    failed.currentTime = 0;
    failed.play();
    //CALCULATE FINAL TOTAL AND OTHER OPERATIONS
    //final_total();

    make_subtotal(item_id,rowcount);

  }

function update_price(row_id,item_cost){

  //Input
  /*var sales_price=$("#sales_price_"+row_id).val().trim();
  if(sales_price!='' || sales_price==0) {sales_price = parseFloat(sales_price); }

  //Default set from item master
  var item_price=parseFloat($("#tr_sales_price_temp_"+row_id).val().trim());

  if(sales_price<item_cost){
    //toastr["warning"]("Minimum Sales Price is "+item_cost);
    $("#sales_price_"+row_id).parent().addClass('has-error');
  }else{
    $("#sales_price_"+row_id).parent().removeClass('has-error');
  }*/

  make_subtotal($("#tr_item_id_"+row_id).val(),row_id);
}

function set_to_original(row_id,item_cost) {
  return true;
  /*Input*/
  var sales_price=$("#sales_price_"+row_id).val().trim();
  if(sales_price!='' || sales_price==0) {sales_price = parseFloat(sales_price); }

  /*Default set from item master*/
  var item_price=parseFloat($("#tr_sales_price_temp_"+row_id).val().trim());

  if(sales_price<item_cost){
    toastr["success"]("Default Price Set "+item_price);
    $("#sales_price_"+row_id).parent().removeClass('has-error');
    $("#sales_price_"+row_id).val(item_price);
  }
  make_subtotal($("#tr_item_id_"+row_id).val(),row_id);
}


//INCREMENT ITEM
function increment_qty(item_id,rowcount){
  var item_qty=$("#item_qty_"+rowcount).val();
  var stock=$("#td_"+rowcount+"_1").html();

  if(parseFloat(item_qty)<parseFloat(stock)){
    new_item_qty=parseFloat(item_qty)+1;

    if(parseFloat(new_item_qty)>parseFloat(stock)){
      new_item_qty = stock;
    }

    $("#item_qty_"+rowcount).val(parseFloat(new_item_qty).toFixed(0));
  }
  make_subtotal(item_id,rowcount);
}
function increment_no(){
  toastr["warning"]("Không cho phép khi có mã Serial/IMEI");
}

//DECREMENT ITEM
function decrement_qty(item_id,rowcount){
  var item_qty=parseFloat($("#item_qty_"+rowcount).val());
      item_qty = isNaN(item_qty) ? 0 : item_qty;
  var stock= parseFloat($("#td_"+rowcount+"_1").html());
      stock = isNaN(stock) ? 0 : stock;

  if(item_qty<1){
     $("#item_qty_"+rowcount).val((item_qty).toFixed(0));
     toastr["warning"]("Minimum Stock!");
     return;
  }
  if(item_qty<=1){
    $("#item_qty_"+rowcount).val((1).toFixed(0));
    toastr["warning"]("Minimum Stock!");
    return;
  }
  
  $("#item_qty_"+rowcount).val((parseFloat(item_qty)-1).toFixed(0));
  make_subtotal(item_id,rowcount);
}
//LEFT SIDE: IF ITEM QTY CHANGED MANUALLY
function item_qty_input(item_id,rowcount){
  var item_qty=$("#item_qty_"+rowcount).val();
  var stock=$("#td_"+rowcount+"_1").html();
  if(stock==0){
    toastr["warning"]("item Not Available in stock!");
    //return;  
  }
  if(parseFloat(item_qty)>parseFloat(stock)){
    $("#item_qty_"+item_id).val(stock);
    toastr["warning"]("Oops! You have only "+stock+" items in Stock");
   // return;
  }
  if(item_qty==0){
    $("#item_qty_"+rowcount).val(1);
    toastr["warning"]("You must have atlease one Quantity");
    //return; 
  }
  /*else{
    $("#item_qty_"+item_id).val(1);
    toastr["warning"]("You must have atlease one Quantity");
    return; 
  }*/
  make_subtotal(item_id,rowcount);
}

function zero_stock(){
  toastr["error"]("Out of Stock!");
  return;
}
//LEFT SIDE: REMOVE ROW 
function removerow(id){//id=Rowid  
    $("#row_"+id).remove();
    failed.currentTime = 0;
    failed.play();
    final_total();
}

//MAKE SUBTOTAL
function make_subtotal(item_id,rowcount){
  set_tax_value(rowcount);

   //Find the Tax type and Tax amount
   var tax_type = $("#tr_tax_type_"+rowcount).val();
   var tax_amount = $("#td_data_"+rowcount+"_11").val();

  var sales_price     =$("#sales_price_"+rowcount).val();
  //var gst_per         =$("#tr_item_per_"+rowcount).val();
  var item_qty        =$("#item_qty_"+rowcount).val();

  var tot_sales_price =parseFloat(item_qty)*parseFloat(sales_price);
  //var gst_amt=(tot_sales_price * gst_per)/100;

  var subtotal        =parseFloat(tot_sales_price);
  /*Discounr*/
  var discount_amt    =$("#item_discount_"+rowcount).val();

  subtotal = (tax_type=='Inclusive') ? subtotal : parseFloat(subtotal) + parseFloat(tax_amount);

  subtotal -= parseFloat(discount_amt);
  
  $("#td_data_"+rowcount+"_4").val(parseFloat(subtotal).toFixed(0));
  final_total();
}
function calulate_discount(discount_input,discount_type,total){
  if(discount_type=='in_percentage'){
    return parseFloat((total*discount_input)/100);
  }
  else{//in_fixed
    return parseFloat(discount_input);
  }
}
//LEFT SIDE: FINAL TOTAL
function final_total(){
  var total=0;
  var item_qty=0;
  var rowcount=$("#hidden_rowcount").val();
  var discount_input=$("#discount_input").val();
  var discount_type=$("#discount_type").val();
  var other_charges=parseFloat($("#other_charges").val());
      other_charges = (isNaN(other_charges)) ? parseFloat(0) :other_charges;

  if($(".items_table tr").length>1){
    for(i=0;i<rowcount;i++){
      if(document.getElementById('tr_item_id_'+i)){
       // set_tax_value(i);
      //var tax_amt = parseFloat($("#td_data_"+i+"_11").val());
      item_id=$("#tr_item_id_"+i).val();
      
      total=parseFloat(total)+ + +parseFloat($("#td_data_"+i+"_4").val()).toFixed(0);
      //console.log("==>total="+total);
      //console.log("==>tax_amt="+tax_amt);
     // total+=tax_amt;
      //console.log("==>total="+total);
      item_qty=parseFloat(item_qty)+ + +parseFloat($("#item_qty_"+i).val()).toFixed(0);
      }
    }//for end
  }//items_table
  
  total+=other_charges;
  total =round_off(total);
  
  var discount_amt=0;
  if(total>0){
    var discount_amt=calulate_discount(discount_input,discount_type,total);//return value 
  }


  set_total(item_qty,total,discount_amt,total-discount_amt);
}
function set_total(tot_qty=0, tot_amt=0, tot_disc=0, tot_grand=0){
  $(".tot_qty   ").html(tot_qty);
 $(".tot_amt_show   ").html(formatInteger(tot_amt));
  $(".tot_disc_show  ").html(formatInteger(tot_disc));
  $(".tot_grand_show ").html(formatInteger(tot_grand)); 

  $(".tot_amt   ").html((round_off(tot_amt).toFixed(0)));
  $(".tot_disc  ").html((round_off(tot_disc).toFixed(0)));
  $(".tot_grand ").html((round_off(tot_grand)).toFixed(0)); 
}

function formatInteger(number) {
  // Check if the input is a valid number
  if (isNaN(number)) {
    return 'Invalid Number';
  }

  // Ensure we have an integer by rounding the number
  const roundedNumber = Math.round(number);

  // Convert the rounded number to a string
  const numberString = roundedNumber.toString();

  // Format the integer part with commas as thousands separators
  const formattedInteger = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

  return formattedInteger;
}

//LEFT SIDE: FINAL TOTAL
function adjust_payments(){
  var total=0;
  var item_qty=0;
  var rowcount=$("#hidden_rowcount").val();
  var discount_input=$("#discount_input").val();
  var discount_type=$("#discount_type").val();
  var other_charges=parseFloat($("#other_charges").val());
      other_charges = (isNaN(other_charges)) ? parseFloat(0) :other_charges;

  if($(".items_table tr").length>1){
    for(i=0;i<rowcount;i++){
      if(document.getElementById('tr_item_id_'+i)){
      total=parseFloat(total)+ + +parseFloat($("#td_data_"+i+"_4").val()).toFixed(0);
      item_id=$("#tr_item_id_"+i).val();
      item_qty=parseFloat(item_qty)+ + +parseFloat($("#item_qty_"+i).val()).toFixed(0);
      }
    }//for end
  }//items_table
  total +=other_charges;
  total =round_off(total);
  //Find customers payment

  var payments_row =get_id_value("payment_row_count");
  console.log("payments_row="+payments_row);
  var paid_amount =parseFloat(0);
  for (var i = 1; i <=payments_row; i++) {
    if(document.getElementById("amount_"+i)){
      var amount = parseFloat(get_id_value("amount_"+i));
          amount = isNaN(amount) ? 0 : amount;
          console.log("amount_"+i+"="+amount);
      paid_amount += amount;
    }
  }
  
  //RIGHT SIDE DIV
  var discount_amt=calulate_discount(discount_input,discount_type,total);//return value


  var change_return = 0;
  var balance = total-discount_amt-paid_amount;
  if(balance < 0){
    //console.log("Negative");
    change_return = Math.abs(parseFloat(balance));
    balance = 0;
  }
  
  balance =round_off(balance);
  $(".sales_div_tot_qty  ").html(item_qty);
  $(".sales_div_tot_amt  ").html(Number((round_off(total)).toFixed(0)).toLocaleString());
  $(".sales_div_tot_discount ").html(Number((parseFloat(round_off(discount_amt))).toFixed(0)).toLocaleString()); 
  $(".sales_div_tot_payble ").html(Number((parseFloat(round_off(total-discount_amt))).toFixed(0)).toLocaleString()); 
  $(".sales_div_tot_paid ").html(Number((round_off(paid_amount)).toFixed(0)).toLocaleString());
  $(".sales_div_tot_balance ").html(Number(((parseFloat(round_off(balance))).toFixed(0))).toLocaleString()); 
  
  /**/
  $(".sales_div_change_return ").html(Number((change_return).toFixed(0)).toLocaleString()); 
  
}

function check_same_item(item_id){



  if($(".items_table tr").length>1){
    var rowcount=$("#hidden_rowcount").val();
    for(i=0;i<=rowcount;i++){
            if($("#tr_item_id_"+i).val()==item_id){

              $des_duy = $("#des_duy_"+i).text();
              if( $des_duy == ''){
                increment_qty(item_id,i);
                failed.currentTime = 0;
                failed.play();
                return false;
              }

     
            }
      }//end for
  }
  return true;
}

function check_same_code(item_id,code){

if($(".items_table tr").length>1){
  var rowcount=$("#hidden_rowcount").val();
  for(i=0;i<=rowcount;i++){
          if($("#code_"+i).val()==code){
            failed.currentTime = 0;
            failed.play();
            return false;
          }
    }//end for
}
return true;
}

$(document).ready(function(){
  //FIRST TIME: LOAD

  get_details();

  get_data_details();

  phuc_vu_list();

  var first_div= parseFloat($(".content-wrapper").height());
  var second_div= parseFloat($("section").height());
  var items_table= parseFloat($(".items_table").height());
 // $(".items_table").parent().css("height",(first_div-second_div)+items_table+250);/**/
  //$(".search_div").parent().css("height",((second_div-items_table)>500) ? 500 : (second_div-items_table) );/**/


  //FIRST TIME: SET TOTAL ZERO
  set_total();

  //RIGHT DIV: FILTER INPUT BOX
  $("#search_it").on("keyup",function(){
    search_it();
  });

 //CATEGORY WISE ITEM FETCH FROM SERVER
  var show_only_searched=true;

  $('#category_id').change(function() {
            // Lấy giá trị của option được chọn
            var selectedOption = $(this).find(':selected');

            // Kiểm tra xem option có giá trị hay không
            if (selectedOption.val() !== '') {
               // Lấy giá trị của category_id
               var category_id = selectedOption.val();

               // Lấy giá trị của category_item_id
               var category_item_id = selectedOption.data('parent-id');

               // Hiển thị giá trị của category_id và category_item_id (có thể sử dụng để kiểm tra)
               console.log("Selected category_id: " + category_id);
               console.log("Selected category_item_id: " + category_item_id);

               get_details(null,show_only_searched,category_item_id);
            }
     });

   $("#table_type_id").on("change",function () {
      get_data_details(null,show_only_searched);
  });

  $("#table_kind_id").on("change",function () {
      get_data_details(null,show_only_searched);
  });

  $("#brand_id").on("change",function () {
      get_details(null,show_only_searched);
  });

  $("#kind_id").on("change",function () {
      get_details(null,show_only_searched);
  });

  $("#item_name").on("keyup",function () {
      get_details(null,show_only_searched);
  });

  //DISCOUNT UPDATE
  $(".discount_update").on("click",function () {
      final_total();
      $('#discount-modal').modal('toggle');    
  });



  //RIGHT SIDE: CLEAR SEARCH BOX
 /* $(".show_all").on("click",function(){
    $("#search_it").val('').trigger("keyup");
    $("#category_id").val('').trigger("change");
  });*/

  //Reset Category & brand
  $(".reset_categories").on("click",function(){
      $("#category_id").val('').trigger("change");
  });
  $(".reset_brands").on("click",function(){
      $("#brand_id").val('').trigger("change");
  });
  $(".reset_item_name").on("click",function(){
      $("#item_name").val('');
      $("#brand_id").val('').trigger("change");
  });

  $(".reset_tables").on("click",function(){
    $.ajax({
      url: '<?php  goto RFhwJ; VqvBb: ?>
</tbody></table></div></div></li></div></div></div></div><div class="col-md-7 left-column"><div class="box box-primary"><form class="form-horizontal"id="pos-form"><div class="box-header with-border"style="padding-bottom:0"><div class="row"><div class="col-md-12"><?php  goto uTvFM; KT96h: ?>
</div><div class="bg-gray box-footer"><div class="row"><div class="text-right col-md-3"><label><?php  goto qiYbx; y3ytT: print $category_id; goto Tf7d2; jtWx5: ?>
"type="hidden"><?php  goto xq6qe; y1dSi: ?>
//UPDATE PROCESS END

 // hold_invoice_list();
});//ready() end


function get_item_details(item_id,code){

  $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
  $.post("<?php  goto dIP1A; TTlb7: if (!adddaypos()) { ?>
<input id="max_pos"value="1"type="hidden"><?php  } goto gYSdr; DA5CA: $print_order_type = $this->db->select("\x70\162\x69\156\164\x5f\157\x72\x64\x65\x72\137\164\171\x70\x65")->get("\x64\x62\x5f\x73\151\164\145\x73\145\164\164\151\156\x67\163")->row()->print_order_type; goto i50mq; CyFMy: ?>
</th><th width="10%"class="<?php  goto se2lD; SO_VT: if (is_show_stock()) { ?>
<th width="23%"><?php  echo $this->lang->line("\x69\164\145\155\137\156\x61\155\145"); ?>
</th><th width="10%"><?php  echo $this->lang->line("\x73\164\157\143\x6b"); ?>
</th><?php  } else { ?>
<th width="35%"><?php  echo $this->lang->line("\x69\x74\145\x6d\137\156\141\x6d\145"); ?>
</th><?php  } goto Coxm7; FJChW: ?>
<input id="bank_number"value="<?php  goto xgL12; L20oo: echo $theme_link; goto wfjw7; VMfRq: echo "\74\157\160\x74\151\x6f\156\40\x76\141\x6c\x75\x65\x3d\47\x32\x27\x3e" . "\102\303\xa0\x6e\x20\164\162\341\xbb\221\156\x67" . "\74\57\157\x70\x74\151\157\x6e\x3e"; goto QJUHi; vdG6v: ?>
</select> <span class="input-group-btn"><button class="btn btn-flat text-blue reset_tables"type="button"title="Reset Brand"data-placement="top"data-toggle="tooltip"><i class="fa fa-undo"></i></button></span></div></div></div><div class="row"><div class="col-md-12"><section class="content"><div class="row search_table_div"style="overflow-y:scroll;min-height:100px;height:75vh"></div></section><div class="text-center ajax-load"style="display:none;height:570px"><button class="btn btn-default ajax btn-lrg"type="button"title="Ajax Request"><i class="fa fa-refresh fa-spin"></i> Loading More Data</button></div></div></div></div></div><div class="fade tab-pane"id="tab_hoa_don"><div class="box box-info"><li class="user-body"><div class="row"><div class="text-center col-xs-12"style="max-height:300px;overflow-y:scroll"><table class="table table-bordered"width="100%"><thead><tr><th>ID</th><th>Thời gian</th><th>Tên bàn</th><th>Số tiền</th><th>Hành động</th></tr></thead><tbody id="hold_invoice_list"><?php  goto Zyxvy; p5UEG: echo $SITE_TITLE; goto IJ7Qg; qiYbx: echo $this->lang->line("\161\165\x61\x6e\164\151\x74\x79"); goto HbNDf; gHuMB: ?>
</th><th width="5%"><i class="fa fa-close"></i></th></thead><tbody id="pos-form-tbody"style="font-size:16px;font-weight:700;overflow:scroll"></tbody><tfoot></tfoot></table></div></div></div></div><?php  goto AXIdq; ffVE8: if ($q1->num_rows($q1) > 0) { foreach ($q1->result() as $res1) { echo "\74\x6f\x70\164\151\x6f\156\x20\166\x61\x6c\165\145\75\x27" . $res1->id . "\47\x3e" . $res1->table_type_name . "\74\x2f\x6f\160\164\151\x6f\156\x3e"; } } else { ?>
<option value="">Chưa có nhóm bàn nào</option><?php  } goto lS0uR; cDKgI: ?>
<section class="content"><div class="row"><div class="col-md-5 right-column"><ul class="nav nav-tabs"><li id="tab_phong_ban_li"><a href="#tab_quan_ly_ban"data-toggle="tab">Phòng bàn</a></li><li class="active"id="tab_thuc_don_li"><a href="#tab_mon_an"data-toggle="tab">Thực đơn</a></li><li><a href="#tab_hoa_don"data-toggle="tab">Hóa đơn chờ thanh toán <span class="label label-danger hold_invoice_list_count"><?php  goto fpYjq; cALF2: echo $this->security->get_csrf_hash(); goto MoOD4; fwNK9: ?>
"type="hidden"> <input id="temp_customer_id"value=""type="hidden"name="temp_customer_id"> <input id="price_type"value=""type="hidden"name="price_type"> <input id="percent_decrease"value=""type="hidden"name="percent_decrease"> <input id="discount_type_check"value=""type="hidden"name="discount_type_check"> <input id="discount_check"value=""type="hidden"name="discount_check"> <input id="payment_type_id"value="1"type="hidden"name="payment_type_id"> <input id="sales_invoice_format_id"value="<?php  goto w8dHR; yGV7O: echo $base_url; goto dXAXD; RulCZ: if ($q1->num_rows() > 0) { $count = 0; foreach ($q1->result() as $res1) { $count++; if ($count == 2) { $bank_number = $res1->bank_number; $bank_name = $res1->bank_name; $bank_infor = $res1->bank_infor; $bank_image = $res1->bank_image; $bank_id = $res1->id; } } } else { } goto FJChW; KwNXK: $css = $this->session->userdata("\154\x61\x6e\147\165\141\x67\145") == "\x41\162\141\x62\151\x63" || $this->session->userdata("\x6c\141\x6e\x67\165\141\x67\x65") == "\x55\162\144\165" ? "\155\141\162\147\151\156\x2d\162\x69\x67\150\164\x3a\x20\60\x20\41\151\155\160\x6f\x72\164\141\x6e\x74\73" : ''; goto RoYKi; NbDJt: $q1 = $this->db->query($query1); goto CkNXP; xSDT8: echo $theme_link; goto XHW4J; sVuLj: print ucfirst($this->session->userdata("\x69\156\166\x5f\165\163\145\162\x6e\x61\x6d\x65")); goto gzTbx; B1qK8: echo $theme_link; goto U5RlF; qPx_a: echo $this->lang->line("\x75\x6e\151\164"); goto UeDYi; zJX05: include "\x6d\157\144\x61\154\x73\x2f\155\x6f\144\141\x6c\137\x70\x6f\163\137\163\141\x6c\x65\163\137\151\164\x65\155\x2e\x70\150\x70"; goto Q01r7; XOL3_: echo $discount_input; goto Mb0rI; gYSdr: if (!checkNameDateTable()) { ?>
<input id="max_pos"value="1"type="hidden"><?php  } goto PkGbP; kTqBt: $CI =& get_instance(); goto FJcpK; Rtcxs: ?>
"type="hidden"> <input id="bank_id"value="<?php  goto llN7t; QJUHi: echo "\74\x6f\x70\x74\x69\157\x6e\40\x76\141\154\x75\145\x3d\47\63\x27\76" . "\102\xc3\240\156\x20\304\221\303\xa3\x20\x73\341\xbb\xad\x20\144\341\xbb\245\156\147" . "\x3c\57\x6f\160\x74\151\157\156\76"; goto vdG6v; Tf7d2: ?>
"><?php  goto jUp7V; hVgqW: $discount_input = $this->db->select("\163\x61\x6c\x65\x73\137\x64\151\163\x63\157\x75\x6e\x74")->get("\144\x62\137\x73\x69\164\145\163\x65\164\164\151\x6e\x67\x73")->row()->sales_discount; goto eFKCa; eFKCa: $discount_input = $discount_input == 0 ? '' : $discount_input; goto eSHZJ; LXlo0: if (isset($sales_id)) { $btn_id = "\165\x70\144\x61\164\x65"; $btn_name = "\103\141\x73\150"; ?>
<input id="sales_id"value="<?php  echo $sales_id; ?>
"type="hidden"name="sales_id"><?php  } else { $btn_id = "\163\x61\x76\x65"; $btn_name = "\x43\141\x73\x68"; } goto qhDLj; GAgbT: $q1 = $this->db->query($query1); goto Pumds; iETXO: ?>
dashboard"class="navbar-brand"title="Go to Dashboard!"><b class="hidden-xs"><?php  goto p5UEG; O9WJS: if (get_show_schedule_invoice() == 1) { ?>
<div class="text-right col-sm-3"><label><?php  echo $this->lang->line("\162\145\x66\145\162\x65\156\143\145\137\156\157"); ?>
</div><div class="text-right col-sm-3"><select class="form-control select2"id="schedule_time_id"name="schedule_time_id"style="width:100%"><option value="1">1 Ngày trả hàng</option><option value="3"selected>3 Ngày trả hàng</option><option value="5">5 Ngày trả hàng</option><option value="7">7 Ngày trả hàng</option></select></div><div class="text-right col-sm-3"><input id="schedule_time"name="schedule_time"class="form-control"></div><?php  } goto V3tCh; bvwBM: ?>
</div><div class="text-right col-md-3"><label><?php  goto hJr20; Coxm7: ?>
<th width="15%"><?php  goto FzavA; jUO04: $q1 = $this->db->query($query1); goto FowRz; Pumds: echo "\x3c\157\160\164\151\x6f\156\x20\166\x61\154\165\145\75\x22\x22\x3e\55\55\x4c\x6f\xe1\272\241\151\x20\153\150\xc3\241\x63\150\40\150\xc3\240\156\147\55\55\74\x2f\x6f\160\164\151\157\156\76"; goto cOeNG; rFDEQ: include "\143\157\155\x6d\141\x6e\x2f\143\157\144\145\137\x6a\163\137\x66\157\x72\x6d\56\160\x68\x70"; goto RbLhK; JT6Zi: ?>
pos/get_item_details",{item_id:item_id},function(result){
    console.log(result);
    var item = jQuery.parseJSON(result);

    var obj = {};
    obj['item_id']        = item['id'];
    obj['item_name']      = item['item_name'];
    obj['stock']          = item['stock'];
    obj['sales_price']    = item['sales_price'];
    obj['purchase_price'] = item['purchase_price'];
    obj['good_price']       = item['good_price'];
    obj['tax_id']         = item['tax_id'];
    obj['tax_type']       = item['tax_type'];
    obj['tax']            = item['tax'];
    obj['tax_name']       = item['tax_name'];
    obj['item_tax_amt']   = item['item_tax_amt'];
    obj['discount_type']  = item['discount_type'];
    obj['discount']       = item['discount'];
    obj['unit_name']       = item['unit_name'];
    obj['guaran_id']       = item['guaran_id'];
    obj['code']       = code;
    
    addrow(null,obj);
    $(".overlay").remove();
  });

}

$('#item_search').keypress(function (e) {
 var key = e.which;
 // the enter key code
 if(key == 13){
    $("#item_search").autocomplete('search');
  }
});  

$("#item_search").bind("paste", function(e){
    $("#item_search").autocomplete('search');
} );

$("#item_search").autocomplete({

    source: function(data, cb){
        $.ajax({
          autoFocus:true,
            url: $("#base_url").val()+'items/get_json_items_details',
            method: 'GET',
            dataType: 'json',

            showHintOnFocus: true,
            autoSelect: true, 
            selectInitial :true,
      
            data: {
                name: data.term,
                /*warehouse_id:$("#warehouse_id").val().trim(),*/
            },
            success: function(res){
              //console.log(res);
                var result;
                result = [
                    {
                        //label: 'No Records Found '+data.term,
                        label: 'No Records Found ',
                        value: ''
                    }
                ];

                if (res.length) {
                  
                    result = $.map(res, function(el){
                        return {
                            label: el.item_code +'--[Qty2:'+el.stock+'] --'+ el.label,
                            value: '',
                            id: el.id,
                            item_name: el.value,
                            stock: el.stock,
                            code: el.code,
                           // mobile: el.mobile,
                            //customer_dob: el.customer_dob,
                            //address: el.address,

                        };

                    });
                }
                cb(result);
            }
        });
    },

        response:function(e,ui){
          if(ui.content.length==1){
            $(this).data('ui-autocomplete')._trigger('select', 'autocompleteselect', ui);
            $(this).autocomplete("close");
          }
          //console.log(ui.content[0].id);
        },
        //loader start
        search: function (e, ui) {
          
        },
        select: function (e, ui) { 
         // console.log('inside select');
            //$("#mobile").val(ui.item.mobile)
            //$("#item_search").val(ui.item.value);
            //$("#customer_dob").val(ui.item.customer_dob)
            //$("#address").val(ui.item.address)

            //console.log("stock="+$(this).val()); //Input box value

            if(typeof ui.content!='undefined'){
              //console.log("Autoselected first");
              if(isNaN(ui.content[0].id)){
                return;
              }
              var stock=ui.content[0].stock;
              var item_id=ui.content[0].id;
              var code=ui.content[0].code;

            }
            else{
              //console.log("manual Selected");
              var stock=ui.item.stock;
              var item_id=ui.item.id;
              var code=ui.item.code;
            }
            
            if(parseFloat(stock)==0){
              toastr["error"]("Out of Stock!");
              $("#item_search").val('');
              return;
            }
            //addrow(item_id);
            get_item_details(item_id,code);
            $("#item_search").val('');
            
            
        },   
        //loader end
});


//DATEPICKER INITIALIZATION
$('#order_date,#delivery_date,#cheque_date').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      todayHighlight: true
    });
    $('#customer_dob,#birthday_person_dob').datepicker({
      calendarWeeks: true,
      todayHighlight: true,
      autoclose: true,
      format: 'dd-mm-yyyy',
      startView: 2
    });
    
    //Datemask dd-mm-yyyy
    //$("#customer_dob,#birthday_person_dob").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});

    //Timepicker
    /*$('.timepicker').timepicker({
      showInputs: false,
    });*/

    //Sale Items Modal Operations Start
    function show_sales_item_modal(row_id){
      $('#sales_item').modal('toggle');
      //$("#popup_tax_id").select2();

      //Find the item details unit_name
      var item_name = $("#td_data_"+row_id+"_0").html();
      var tax_type = $("#tr_tax_type_"+row_id).val();
      var unit_name = $("#tr_unit_name_"+row_id).val();
      var tax_id = $("#tr_tax_id_"+row_id).val();
      var description = $("#description_"+row_id).val();
      var reference_no = $("#reference_no_" + row_id).val();

      /*Discount*/
      var item_discount_input = $("#item_discount_input_"+row_id).val();
      var item_discount_type = $("#item_discount_type_"+row_id).val();

       //set checkbox ve mac dinh
       console.log("Mã jQuery đã được thực thi."); // Kiểm tra xem mã jQuery được thực thi hay không

// Loop qua tất cả các checkbox có class "item-checkbox"
$('.item-checkbox').each(function() {
    // Đặt thuộc tính "checked" của checkbox về false
   // $(this).prop('checked', false);
    $(this).prop('checked', false).iCheck('update');
});

       //check khach hang vip
       var price_type=parseFloat($("#price_type").val());
       
       $("#type_price_type").val(price_type).select2();
       

       var discount_check=parseFloat($("#discount_check").val());
       discount_check = (isNaN(discount_check)) ? parseFloat(0) :discount_check;
      if(discount_check>0){
        item_discount_type = $("#discount_type_check").val()
        item_discount_input = discount_check;
      }

      //Set to Popup
      $("#item_discount_input").val(item_discount_input);
      $("#item_discount_type").val(item_discount_type).select2();

      $("#popup_item_name").html(item_name);
      $("#popup_tax_type").val(tax_type).select2();
      $("#popup_tax_id").val(tax_id).select2();
      $("#popup_row_id").val(row_id);
      $("#popup_description").val(description);

    

  
      console.log(unit_name);
      if(unit_name == 'giờ'||unit_name == 'phút'|| unit_name == 'Giờ'||unit_name == 'Phút'|| unit_name == 'GIỜ'||unit_name == 'PHÚT'){

        $("#type_show_time").val(unit_name);
        console.log("unit_name==");
        $("#form_start_date").show();
        $("#form_end_date").show();


        let now = new Date();
      let currentTime =
      String(now.getHours()).padStart(2, "0") +
        ":" +
      String(now.getMinutes()).padStart(2, "0");
        $("#end_date").val(currentTime);
       
      } else {
        console.log("unit_name!=");
        $("#form_start_date").hide();
        $("#form_end_date").hide();
        $("#type_show_time").val("0");
      }

      let now = new Date();
      let currentTime =
      String(now.getHours()).padStart(2, "0") +
        ":" +
      String(now.getMinutes()).padStart(2, "0");

      if (reference_no == undefined) {
      $("#start_date").val(currentTime);
        } else {
       $("#start_date").val(reference_no);
      }


    }

    function tinhSoPhut(time1, time2) {
    // Tách giờ và phút từ chuỗi thời gian
    var splitTime1 = time1.split(":");
    var splitTime2 = time2.split(":");

    // Chuyển đổi giờ và phút thành số nguyên
    var hour1 = parseInt(splitTime1[0]);
    var minute1 = parseInt(splitTime1[1]);

    var hour2 = parseInt(splitTime2[0]);
    var minute2 = parseInt(splitTime2[1]);

    // Chuyển đổi thành timestamp để so sánh ngày
    var date1 = new Date();
    date1.setHours(hour1, minute1, 0); // Đặt giờ và phút cho ngày hiện tại

    var date2 = new Date();
    date2.setHours(hour2, minute2, 0); // Đặt giờ và phút cho ngày hiện tại

    // Nếu thời điểm 2 sau thời điểm 1 thì cộng 1 ngày vào date2
    if (date2 < date1) {
        date2.setDate(date2.getDate() + 1);
    }

    // Tính toán số phút khác nhau
    var difference = date2.getTime() - date1.getTime();
    var soPhut = difference / (1000 * 60); // Chuyển đổi từ milliseconds sang phút

    return soPhut;
}

    function calculateSubPrice(row_id) {
        var total = 0;
        var des = '';
        // Lặp qua tất cả các checkbox đã chọn
        $('.item-checkbox:checked').each(function() {
            // Lấy giá trị price của từng checkbox và cộng vào tổng
            var price = parseFloat($(this).data('item-price'));
            total += price;
            if(des == ''){
              des =$(this).data('item-name');
            } else {
              des = des +","+$(this).data('item-name');
            }
          

            console.log('des='+des);
        }); 
        // Cập nhật giá trị subtotal vào ô input
        $('#sub_price_'+row_id).val(total.toFixed(0));

        var price = parseFloat($("#sales_price_"+row_id).val())+ total;
        $("#sales_price_"+row_id).val(price);

        console.log('des_final='+des);
        $("#description_"+row_id).val(des);
        $("#des_duy_"+row_id).text(des);
    }

    function set_info(){

      var row_id = $("#popup_row_id").val();
      var tax_type = $("#popup_tax_type").val();
      var tax_id = $("#popup_tax_id").val();
      var type_price_type = $("#type_price_type").val();
   //   alert('type_price_type='+type_price_type);
      var description = $("#popup_description").val();
      var tax_name = ($('option:selected', "#popup_tax_id").attr('data-tax-value'));
      var tax = parseFloat($('option:selected', "#popup_tax_id").attr('data-tax'));

      var type_show_time = $("#type_show_time").val();


      var type_price_type = $("#type_price_type").val();

    

      //1 la gia origin 
      if(type_price_type=='1'){
        var price = parseFloat($("#good_price_"+row_id).val()).toFixed(0);
        if(price != 0 && price != '0' && price != undefined && price != ''){
          $("#sales_price_"+row_id).val(price);
        } else {
           price = parseFloat($("#purchase_price_"+row_id).val()).toFixed(0);
           $("#sales_price_"+row_id).val(price);
        }
       
      } else {
        var price = parseFloat($("#purchase_price_"+row_id).val()).toFixed(0);
        $("#sales_price_"+row_id).val(price);
      }

     // alert ('type_price_type='+type_price_type+"|price="+price);
    

      if(type_show_time== "giờ"||type_show_time== "Giờ"||type_show_time== "GIỜ"){
        //alert(type_show_time+"|"+start_date+"-"+end_date);
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var soPhut = tinhSoPhut(start_date, end_date);
       // alert(type_show_time+"|"+start_date+"-"+end_date+"="+soPhut);
       var item_id=$("#tr_item_id_"+row_id).val();
        $("#item_qty_"+row_id).val(parseFloat(soPhut/60).toFixed(2));

        description = start_date+ '-'+end_date;
        $("#description_"+row_id).val(description);
      } else if(type_show_time== "phút"||type_show_time== "Phút"||type_show_time== "PHÚT"){
        //alert(type_show_time+"|"+start_date+"-"+end_date);
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var soPhut = tinhSoPhut(start_date, end_date);
       // alert(type_show_time+"|"+start_date+"-"+end_date+"="+soPhut);
       var item_id=$("#tr_item_id_"+row_id).val();
        $("#item_qty_"+row_id).val(parseFloat(soPhut).toFixed(0));
        description = start_date+ '-'+end_date;
        $("#description_"+row_id).val(description);
      } 

      calculateSubPrice(row_id);


      /*Discounr*/
      var item_discount_input = $("#item_discount_input").val();
      var item_discount_type = $("#item_discount_type").val();

      //Set it into row 
      $("#item_discount_input_"+row_id).val(item_discount_input);
      $("#item_discount_type_"+row_id).val(item_discount_type);

      $("#tr_tax_type_"+row_id).val(tax_type);
      $("#tr_tax_id_"+row_id).val(tax_id);
      
      $("#tr_tax_value_"+row_id).val(tax);//%
      //$("#td_data_"+row_id+"_12").html(tax_type+" "+tax_name);
      
      var item_id=$("#tr_item_id_"+row_id).val();
      make_subtotal(item_id,row_id);
      //calculate_tax(row_id);
      $('#sales_item').modal('toggle');
    }
    function set_tax_value(row_id){
      //get the sales price of the item
      var tax_type = $("#tr_tax_type_"+row_id).val();
      var tax = $("#tr_tax_value_"+row_id).val(); //%
      var item_id=$("#tr_item_id_"+row_id).val();
      var qty=($("#item_qty_"+row_id).val());
          qty = (isNaN(qty)) ? 0 :qty;

      var sales_price = parseFloat($("#sales_price_"+row_id).val());
          sales_price = (isNaN(sales_price)) ? 0 :sales_price;
          sales_price = sales_price * qty;

      /*Discount*/
      var item_discount_type = $("#item_discount_type_"+row_id).val();
      var item_discount_input = parseFloat($("#item_discount_input_"+row_id).val());
          item_discount_input = (isNaN(item_discount_input)) ? 0 :item_discount_input;
      
      //Calculate discount      
      var discount_amt=(item_discount_type=='Percentage') ? ((sales_price) * item_discount_input)/100 : (item_discount_input*qty);
     
      sales_price-=parseFloat(discount_amt);

      var tax_amount = (tax_type=='Inclusive') ? calculate_inclusive(sales_price,tax) : calculate_exclusive(sales_price,tax);
      
      $("#item_discount_"+row_id).val(discount_amt);
      $("#td_data_"+row_id+"_11").val(tax_amount);
    }
    //Sale Items Modal Operations End</script><script>$(function(){$("input").iCheck({checkboxClass:"icheckbox_square-blue",radioClass:"iradio_square-blue",increaseArea:"20%"})})</script><script type="text/javascript">shortcut.add("Ctrl+Shift+m",function(t){t.preventDefault(),$(".show_payments_modal").trigger("click")},{type:"keydown",propagate:!0,target:document}),shortcut.add("Ctrl+Shift+h",function(t){t.preventDefault(),$("#hold_invoice").trigger("click")},{type:"keydown",propagate:!0,target:document}),shortcut.add("Ctrl+Shift+c",function(t){t.preventDefault(),$(".shift_c").trigger("click")},{type:"keydown",propagate:!0,target:document}),shortcut.add("Ctrl+Shift+a",function(t){t.preventDefault(),$(".shift_a").trigger("click")},{type:"keydown",propagate:!0,target:document}),shortcut.add("Ctrl+Shift+s",function(t){t.preventDefault(),$("#item_search").focus()},{type:"keydown",propagate:!0,target:document})</script><script>//Reset Tooltip
function reset_tooltip() {
  $('[data-toggle="tooltip"]').tooltip("destroy");
  $('[data-toggle="tooltip"]').tooltip(); // re-enabling 
}
/* $('.search_div').on('scroll', function() {
    if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
        load_next_details();      
    }
}); */

function load_next_details(){
  var last_id = $(".last_id:last").val();
 // var last_id = $("#last_id").val();
  get_details(last_id);
}


function get_details(last_id='',show_only_searched=false, category_item_id =''){
  
  $.ajax({
      url: '<?php  goto yBfBk; gzTbx: ?>
</span></a><ul class="dropdown-menu"><li class="user-header"><img alt="User Image"class="img-circle"src="<?php  goto AdswG; Mb0rI: ?>
"name="discount_input"class="form-control"placeholder=""></div></div></div><div class="col-md-6"><div class="box-body"><div class="form-group"><label for="discount_type">Discount Type</label> <select class="form-control"id="discount_type"name="discount_type"><option value="in_percentage">Per%</option><option value="in_fixed">Fixed</option></select></div></div></div></div></div><div class="modal-footer"><button class="btn btn-warning"type="button"data-dismiss="modal">Close</button> <button class="btn btn-primary discount_update"type="button">Update</button></div></div></div></div><div class="box-body3"><?php  goto oixn_; ImCew: ?>
<small>Year<?php  goto rUQjT; lS0uR: ?>
</select> <span class="input-group-btn"><button class="btn btn-flat text-blue reset_tables"type="button"title="Xóa trạng thái bàn giữ"data-placement="top"data-toggle="tooltip"><i class="fa fa-undo"></i></button></span></div></div><div class="col-md-6"><div class="input-group input-group-md"><select class="form-control select2"id="table_kind_id"name="table_kind_id"style="width:100%"><?php  goto rSHw8; II3Ki: ?>
"name=""><i class="fa fa-money"aria-hidden="true"></i> Tiền mặt</button></div><div class="col-sm-3"><button class="btn btn-flat btn-block btn-lg bg-purple shift_a"type="button"title="By Cash & Save [Ctrl+Shift+A]"id="pay_all"name=""><i class="fa fa-money"aria-hidden="true"></i> Trả đủ</button></div></div></div></div></form></div></div></div></section></div></div><?php  goto fhRFM; kL9oZ: $query1 = "\163\x65\x6c\145\x63\164\40\52\x20\146\162\x6f\155\x20\144\x62\137\x62\162\141\x6e\144\163\x20\x77\x68\145\x72\145\x20\163\x74\x61\164\x75\163\x3d\61"; goto NbDJt; V3tCh: ?>
</div><div class="row"><?php  goto LXlo0; UeDYi: ?>
</th><th width="15%"><?php  goto d5iOw; jUp7V: $query1 = "\x53\x45\x4c\105\x43\124\x20\x2a\x20\106\x52\117\x4d\x20\x64\142\x5f\143\x61\164\145\147\157\162\x79\x20\127\110\x45\x52\x45\40\163\x74\141\x74\x75\x73\75\61"; goto KQWR8; XoMp2: echo $base_url; goto fwNK9; DAOC7: ?>
"type="hidden"> <input id="bank_image"value="<?php  goto C2qvy; RGlYD: echo $base_url; goto BafWX; rSHw8: echo "\x3c\x6f\x70\164\151\x6f\156\x20\166\x61\154\x75\145\75\42\42\76\x2d\55\x54\x72\341\xba\241\x6e\x67\40\x74\150\xc3\241\x69\40\x62\xc3\240\156\55\55\x3c\x2f\x6f\160\164\x69\157\x6e\x3e"; goto V0Uux; Ieus5: ?>
plugins/iCheck/square/blue.css"rel="stylesheet"><style type="text/css">.select2-container--default .select2-selection--single{border-radius:0}.table-striped>tbody>tr:nth-of-type(2n+1){background-color:#ede3e3}.table-striped>tbody>tr{background-color:#ddc8c8}.tot_amt,.tot_disc,.tot_grand,.tot_qty{font-size:19px;color:#023763}.pointer{cursor:pointer}.navbar-nav>.user-menu>.dropdown-width-lg{width:350px}.header-custom{background-image:-webkit-gradient(linear,left top,right top,from(#20b9ae),to(#006fd6));color:#fff}.border-custom-bottom{border-bottom:1px solid;padding-top:10px;padding-bottom:5px}.custom-font-size{font-size:22px}.search_item{text-transform:uppercase;font-size:10px;color:#000;text-align:center;text-overflow:hidden;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical}.item_image{min-width:70px;min-height:70px;max-width:70px;max-height:70px}.item_box{border-top:none}.min_width{min-width:70px}.box-body2{height:100%}.box-body3{height:70vh}.box-body4{height:80px}.main-table{height:100%}.box-primary{height:70vh}.orange-table-border{border:1px solid #3c8dbc;border-radius:2px;padding:2px;margin:2px;margin:5dp;width:215px;font-family:Helvetica,sans-serif;background-color:#fff;color:#000}.grid-view{display:grid;grid-template-columns:repeat(5,1fr)}.grid-item{text-align:center;margin:10px}.ripple{position:relative;overflow:hidden}.ripple-container{position:absolute;border-radius:50%;background:rgba(255,165,0,.3);transform:scale(0);animation:ripple-animation .6s linear}.white-checkbox{background-color:#fff;padding:5px;border:1px solid #ddd;border-radius:5px}@keyframes ripple-animation{to{transform:scale(5);opacity:0}}.right-column{height:84vh}.left-column{height:74vh}.form-horizontal{height:64vh}.tab-content{height:85vh}.tab-pane{height:100%}.box-info{height:100%}</style></head><body class="hold-transition layout-top-nav skin-blue"><script type="text/javascript">"skin-blue"!=theme_skin&&($("body").addClass(theme_skin),$("body").removeClass("skin-blue")),"true"==sidebar_collapse&&$("body").addClass("sidebar-collapse")</script><?php  goto kTqBt; H14Xv: ?>
";
            
            autoLoadFirstCustomer(customer_id);

         });

         //Customer Selection Box Search - END

  $("#other_charges").keyup(function(event) {
    final_total();
  });
  //RIGHT SIT DIV:-> FILTER ITEM INTO THE ITEMS LIST
  function search_it(){
  
  var input = $("#search_it").val().trim();
  var item_count=$(".search_div .search_item").length;
  var error_count=item_count;
  for(i=0; i<item_count; i++){
    
    if($("#item_"+i).html().toUpperCase().indexOf(input.toUpperCase())>-1){
    
      $("#item_"+i).show();
      $("#item_parent_"+i).show();
    }
    else{
    
     $("#item_"+i).hide();
     $("#item_parent_"+i).hide();
     error_count--;
    }
    if(error_count==0){
      $(".error_div").show();
    }
    else{
      $(".error_div").hide();
    }
    
  }
  }


//REMOTELY FETCH THE ALL ITEMS OR CATEGORY WISE ITEMS.

function chooseTable(id='',table_name=''){

//CHECK SAME ITEM ALREADY EXIST IN ITEMS TABLE 

var item_name =  $('#table_'+id).attr('data-item-name') ; 
var item_id=  $('#table_'+id).attr('data-item-id') ; 
var status = $('#table_'+id).attr('data-item-status') ;
var room = $('#table_'+id).attr('data-item-room') ;
//alert( item_id +"-"+item_name);

if($("#hidden_table_edit").val()==1){

  var hidden_table_id = $("#hidden_table_id").val();

  swal({ title: "Bạn có chắc chắn muốn đổi bàn cũ sang : " + item_name, icon: "warning", buttons: true, dangerMode: true, }).then((sure) => {
					if (sure) {//confirmation start
						holdMonAn(item_id, item_name, hidden_table_id,false);
					} //confirmation sure
				}); //confirmation end
} else {
  $("#hidden_table_id").val(item_id);

  $("#table_show_name").html(item_name+"/"+room); 


  var tableIcon = $('#table_item_click_i');
  if(status==0){
    tableIcon.removeClass('text-success').addClass('text-fail');
  } 

  $('a[href="#tab_mon_an"]').tab('show');
}


}


//LEFT SIDE: ON CLICK ITEM ADD TO INVOICE LIST
function addrow(id='',item_obj=''){

    //CHECK SAME ITEM ALREADY EXIST IN ITEMS TABLE 

    var item_id = (item_obj=='') ? $('#div_'+id).attr('data-item-id') : item_obj.item_id; 
    var code   =(item_obj=='') ? $('#div_'+id).attr('data-code') : item_obj.code; 
    var item_name = (item_obj=='') ? $('#div_'+id).attr('data-item-name') : item_obj.item_name; 

    if(!code.length>0){
      var item_check=check_same_item(item_id);
      if(!item_check){
      return false;}
    } else {
      //check trung code
      var check_same= check_same_code(item_id,code);
      if(!check_same){
      return false;}

      item_name = item_name +" ("+code+")";
    }
  
    var rowcount        =$("#hidden_rowcount").val();//0,1,2...
    
    
   

    var stock   =(item_obj=='') ? $('#div_'+id).attr('data-item-available-qty') : item_obj.stock;
        stock     =(parseFloat(stock)).toFixed(0);

        if($("#show_stock").val()==0){
          stock = 999999999999;
        }
        //data-item-unit-name
    var unit_name = (item_obj=='') ? $('#div_'+id).attr('data-item-unit-name') : item_obj.unit_name;

    var tax_type   =(item_obj=='') ? $('#div_'+id).attr('data-item-tax-type') : item_obj.tax_type;  
    var tax_id   =(item_obj=='') ? $('#div_'+id).attr('data-item-tax-id') : item_obj.tax_id;  
    var tax_value   =(item_obj=='') ? $('#div_'+id).attr('data-item-tax-value') : item_obj.tax;

    var tax_name   =(item_obj=='') ? $('#div_'+id).attr('data-item-tax-name'):item_obj.tax_name;  
    var tax_amt   =(item_obj=='') ? $('#div_'+id).attr('data-item-tax-amt') : item_obj.item_tax_amt; 
    var purchase_price   =(item_obj=='') ? $('#div_'+id).attr('data-purchase_price') : item_obj.purchase_price; 
    //var gst_per         =$('#div_'+id).attr('data-item-tax-per');
    //var gst_amt         =$('#div_'+id).attr('data-item-gst-amt');
    var discount_type   =(item_obj=='') ? $('#div_'+id).attr('data-discount_type') :item_obj.discount_type; 
    var discount   =(item_obj=='') ? $('#div_'+id).attr('data-discount') : item_obj.discount; 
    var guaran_id   =(item_obj=='') ? $('#div_'+id).attr('data-guaran_id') : item_obj.guaran_id; 

   

    //check hien tai de cap nhap
/*     var percent_decrease=parseFloat($("#percent_decrease").val());
      percent_decrease = (isNaN(percent_decrease)) ? parseFloat(0) :percent_decrease;
      if(percent_decrease>0){
        discount_type = 'in_percentage';
        discount = percent_decrease;
      } */

      var discount_type_first = discount_type;
      var discount_first = discount;
      var item_discount_input = $("#discount_check").val();
      var item_discount_type = $("#discount_type_check").val();
      item_discount_input = (isNaN(item_discount_input)) ? parseFloat(0) :item_discount_input;

      if(item_discount_input>0){
        discount_type = item_discount_type;
        discount = item_discount_input;
      }



    var item_cost     =(item_obj=='') ? $('#div_'+id).attr('data-item-cost') : item_obj.purchase_price;  
    var sales_price     =(item_obj=='') ? $('#div_'+id).attr('data-item-sales-price') : item_obj.sales_price ; 
    var sales_price_temp=sales_price;
        sales_price     =(parseFloat(sales_price)).toFixed(0);
   var good_price  =(item_obj=='') ? $('#div_'+id).attr('data-good_price') : item_obj.good_price; 

   //check neu type = 1 thi lay theo gia tot

   if($('#price_type').val()=='1'){
    sales_price = good_price;
   }

   if(good_price==0 || good_price == '0' ||good_price == undefined){
    good_price = sales_price;
   }

   if(purchase_price == 0 || purchase_price == '0' ||purchase_price == undefined){
    purchase_price= sales_price;
   }


    if(stock>0){
      if(stock>1){
        qty = 1;
      }
      else{
        qty = stock;
      }
    }
    else{
      zero_stock();return;
    }
    var quantity        ='<div class="input-group input-group-sm"><span class="input-group-btn"><button onclick="decrement_qty('+item_id+','+rowcount+')" type="button" class="btn btn-default btn-flat"><i class="fa fa-minus text-danger"></i></button></span>';
        quantity       +='<input type="text" value="'+qty+'" class="form-control no-padding text-center min_width" onchange="item_qty_input('+item_id+','+rowcount+')" id="item_qty_'+rowcount+'" name="item_qty_'+rowcount+'">';
        if(!code.length>0){
        quantity       +='<span class="input-group-btn"><button onclick="increment_qty('+item_id+','+rowcount+')" type="button" class="btn btn-default btn-flat"><i class="fa fa-plus text-success"></i></button></span></div>';
        } else {
          quantity       +='<span class="input-group-btn"><button onclick="increment_no()" type="button" class="btn btn-default btn-flat"><i class="fa fa-plus text-success"></i></button></span></div>';
 
        }

    var sub_total       =(parseFloat(1)*parseFloat(sales_price)).toFixed(0);//Initial
    var remove_btn      ='<a class="fa fa-fw fa-trash-o text-red" style="cursor: pointer;font-size: 20px;" onclick="removerow('+rowcount+')" title="Delete Item?"></a>';

    var str=' <tr id="row_'+rowcount+'" data-row="0" data-item-id='+item_id+'>';/*item id*/

      
       if(guaran_id>0){
        str+='<td id="td_'+rowcount+'_0"><a data-toggle="tooltip" title="Click to Change Tax!" class="pointer" id="td_data_'+rowcount+'_0" onclick="show_sales_item_modal('+rowcount+')">'+ item_name     +'</a> <i class="fa fa-shield"></i> <i onclick="show_sales_item_modal('+rowcount+')" class="fa fa-edit pointer"></i><br/><span id="des_duy_'+rowcount+'"></span></td>';/* td_0_0 item name*/ 
       } else {
        str+='<td id="td_'+rowcount+'_0"><a data-toggle="tooltip" title="Click to Change Tax!" class="pointer" id="td_data_'+rowcount+'_0" onclick="show_sales_item_modal('+rowcount+')">'+ item_name     +'</a> <i onclick="show_sales_item_modal('+rowcount+')" class="fa fa-edit pointer"></i><br/><span id="des_duy_'+rowcount+'"></span></td>';/* td_0_0 item name*/ 
       }
       if($("#show_stock").val()==1){
           str+='<td id="td_'+rowcount+'_1">'+ stock +'</td>';/* td_0_1 item available qty*/
       } else {
        str+='<td  id="td_'+rowcount+'_1" style = "display:none;">'+ stock +'</td>';/* td_0_1 item available qty*/
       }

        str+='<td id="td_'+rowcount+'_2">'+ quantity      +'</td>';/* td_0_2 item available qty*/
        str+='<td id="td_'+rowcount+'_2">'+ unit_name    +'</td>';/* td_0_2 item available qty*/

            info='<input id="sales_price_'+rowcount+'" onblur="set_to_original('+rowcount+','+item_cost+')" onkeyup="update_price('+rowcount+','+item_cost+')" name="sales_price_'+rowcount+'" type="text" class="form-control no-padding min_width" value="'+sales_price+'">';
        str+='<td id="td_'+rowcount+'_3" class="text-right">'+ info   +'</td>';/* td_0_3 item sales price*/

        /*Discount*/
         info='<input data-toggle="tooltip" title="Click to Change" onclick="show_sales_item_modal('+rowcount+')" id="item_discount_'+rowcount+'" readonly name="item_discount_'+rowcount+'" type="text" class="form-control no-padding min_width pointer" value="0">';
         
        str+='<td id="td_'+rowcount+'_6" class="text-right">'+ info   +'</td>';

        /*Tax amt*/
        str+='<td id="td_'+rowcount+'_11" class="<?php  goto KRgMo; raVqV: echo $this->lang->line("\x73\165\142\x74\157\164\141\154"); goto gHuMB; d5iOw: echo $this->lang->line("\160\162\x69\143\145"); goto x0e47; V3MWo: $query1 = "\x73\145\154\x65\143\164\x20\x2a\x20\146\162\x6f\155\x20\x64\x62\x5f\x74\x79\x70\x65\x73\40\x77\x68\x65\x72\x65\40\163\164\141\164\x75\x73\75\x31"; goto GAgbT; llN7t: echo $bank_id; goto YqtR_; wfjw7: ?>
dist/js/bootstrap3-typeahead.min.js"></script><script>//Customer Selection Box Search
         function getCustomerSelectionId() {
           return '#customer_id';
         }

         $(document).ready(function () {

            var customer_id = "<?php  goto fWEcR; a8jdE: echo $base_url; goto KLGf6; uTvFM: if (isset($sales_id)) { if ($CI->permissions("\163\x61\154\145\163\x5f\141\144\x64")) { ?>
<div class="pull-right col-md-4"><a href="<?php  echo $base_url; ?>
pos"class="btn btn-primary pull-right">New Invoice</a></div><?php  } } goto S0Un5; XHW4J: ?>
js/pos.js"></script><script src="<?php  goto fW2cw; SLLLe: ?>
</ul></div><div class="navbar-custom-menu"><ul class="nav navbar-nav"><li class="hidden-xs"id="fullscreen"><a title="Fullscreen On/Off"><i class="fa fa-arrows-alt text-white"></i></a></li><li class="text-center"id=""><a href="<?php  goto a8jdE; hJr20: echo $this->lang->line("\x74\x6f\164\141\154\x5f\144\x69\x73\143\157\165\x6e\x74"); goto LgURW; l_qDr: echo $bank_name; goto ioAL1; RoYKi: ?>
<div class="content-wrapper"style="<?php  goto zWAd0; JfMm1: echo $this->lang->line("\164\x6f\x74\x61\154\x5f\141\155\x6f\x75\x6e\x74"); goto FjHSI; l0TBS: echo get_profile_picture(); goto nXvaE; se2lD: echo tax_disable_class(); goto rZ4Eo; YjwDJ: ?>
"> <input id="hidden_rowcount"value="0"type="hidden"name="hidden_rowcount"> <input id="hidden_invoice_id"value=""type="hidden"name="hidden_invoice_id"> <input id="hidden_table_id"value=""type="hidden"name="hidden_table_id"> <input id="hidden_table_edit"value=""type="hidden"name="hidden_table_edit"> <input id="base_url"value="<?php  goto XoMp2; BafWX: ?>
logout"class="btn btn-flat btn-default">Sign out</a></div></li></ul></li></ul></div></div></nav></header><?php  goto KwNXK; LLLO8: ?>
"class="btn btn-flat btn-default">Profile</a></div><div class="pull-right"><a href="<?php  goto RGlYD; kyCPK: ?>
"type="hidden"> <input id="print_order_type"value="<?php  goto DA5CA; cOeNG: if ($q1->num_rows($q1) > 0) { foreach ($q1->result() as $res1) { echo "\x3c\157\160\164\151\157\156\x20\166\x61\x6c\165\x65\75\47" . $res1->id . "\47\76" . $res1->type_name . "\74\57\x6f\x70\x74\151\157\x6e\x3e"; } } else { ?>
<option value="">No Records Found</option><?php  } goto zpVJc; d5yM3: echo $this->lang->line("\144\x69\x73\x63\157\x75\x6e\x74"); goto CyFMy; L3caN: ?>
</select> <span class="input-group-btn"><button class="btn btn-flat text-blue reset_brands"type="button"title="Reset Brand"data-placement="top"data-toggle="tooltip"><i class="fa fa-undo"></i></button></span></div></div></div><br><div class="row"><div class="col-md-6"><div class="input-group input-group-md"><select class="form-control select2"id="kind_id"name="kind_id"style="width:100%"><?php  goto sTLy8; i50mq: echo $print_order_type; goto jtWx5; xYNJu: echo $CI->currency("\x3c\x73\160\141\156\40\x73\164\x79\154\x65\75\x22\146\157\156\x74\55\x73\151\x7a\x65\x3a\40\61\x39\160\x78\x3b\42\40\x63\154\141\x73\x73\75\x22\x74\x6f\164\x5f\x61\155\164\137\163\150\x6f\167\40\164\145\170\x74\55\142\x6f\x6c\144\42\x3e\74\x2f\163\160\141\156\76\x20"); goto bvwBM; psitP: ?>
</div><div class="text-right col-md-3"><label><?php  goto Qw4DU; Qmb1z: ?>
"type="hidden"> <input id="bank_name"value="<?php  goto l_qDr; Qw4DU: echo $this->lang->line("\147\162\x61\x6e\x64\137\164\157\164\141\154"); goto hjmWY; bLEjY: ?>
</select> <span class="input-group-btn"><button class="btn btn-flat text-blue reset_categories"type="button"title="Reset Brand"data-placement="top"data-toggle="tooltip"><i class="fa fa-undo"></i></button></span></div></div><div class="col-md-6"><div class="input-group input-group-md"><select class="form-control select2"id="brand_id"name="brand_id"style="width:100%"><?php  goto kL9oZ; RbLhK: ?>
<script src="<?php  goto B1qK8; IWvrV: include "\143\157\155\155\141\156\x2f\143\x6f\x64\x65\137\x63\x73\x73\x5f\x66\157\x72\155\x2e\x70\x68\160"; goto O1qic; VwkNQ: echo $CI->currency("\x3c\163\x70\141\156\40\163\x74\x79\154\x65\x3d\42\x66\157\156\x74\x2d\163\x69\172\x65\x3a\40\61\x39\x70\170\x3b\42\x20\x63\x6c\x61\x73\x73\x3d\x22\x74\157\164\x5f\x64\151\163\143\137\x73\x68\157\x77\x20\x74\x65\170\x74\x2d\142\x6f\154\144\42\76\74\x2f\x73\160\141\x6e\76"); goto psitP; nIze2: ?>
table/reset_tables',
      type: "post",
      data: {
        table_type_id: $("#table_type_id").val(),
        table_kind_id: $("#table_kind_id").val(),
      },
      beforeSend: function () {
        $('.ajax-load').show();
      }
    }).done(function (data) {
         get_data_details();
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
      alert('server not responding...');
    });
  });


  //UPDATE PROCESS START<?php  goto tpZSJ; fhRFM: include "\143\157\x6d\x6d\141\x6e\x2f\143\157\144\x65\137\x6a\x73\x5f\x73\157\165\156\144\x2e\160\x68\160"; goto rFDEQ; cywEf: echo $theme_link; goto U4ghn; O1qic: ?>
<link href="<?php  goto I9ma4; BzJTp: echo $this->session->userdata("\x69\x6e\x76\x5f\x75\163\145\162\x69\144"); goto LLLO8; PkGbP: include "\x6d\157\144\x61\x6c\x73\137\x70\157\x73\x5f\x70\x61\x79\x6d\x65\156\x74\57\155\157\x64\141\154\137\160\x61\171\x6d\145\x6e\164\163\137\155\x75\154\x74\x69\56\160\150\x70"; goto yitmB; yjOR7: echo $bank_infor; goto DAOC7; ebZbj: ?>
</th><th width="15%"><?php  goto raVqV; rUQjT: echo date("\131"); goto qdjO_; mhFIH: echo "\74\x6f\x70\164\x69\x6f\156\40\166\x61\x6c\165\x65\x3d\x22\42\76\x2d\55\124\x68\165\xe1\273\231\x63\x20\164\303\xad\156\x68\55\55\x3c\x2f\157\x70\x74\151\157\156\76"; goto v43nQ; v43nQ: if ($q1->num_rows($q1) > 0) { foreach ($q1->result() as $res1) { echo "\74\157\160\x74\x69\x6f\156\40\x76\141\x6c\165\x65\75\47" . $res1->id . "\x27\x3e" . $res1->kind_name . "\74\x2f\x6f\160\164\x69\x6f\156\76"; } } else { ?>
<option value="">No Records Found</option><?php  } goto zEWQK; KtwtW: print $category_item_id; goto V3jqw; tGrvX: echo $theme_link; goto I1LyK; AXIdq: $send_sms_checkbox = "\x64\151\x73\141\x62\x6c\x65\144"; goto MiXGE; eSHZJ: ?>
<div class="row"><div class="col-md-6"><div class="box-body"><div class="form-group"><label for="discount_input">Discount</label> <input id="discount_input"value="<?php  goto XOL3_; Vvvmw: $q1 = $this->db->query($query1); goto mhFIH; FowRz: echo "\x3c\157\x70\164\x69\x6f\x6e\40\166\141\x6c\165\x65\75\42\x22\76\55\x2d\116\150\303\263\x6d\x20\142\xc3\240\156\55\x2d\x3c\x2f\x6f\x70\164\x69\x6f\156\x3e"; goto ffVE8; kgGs9: ?>
"type="hidden"><?php  goto TTlb7; qhDLj: ?>
<div class="text-right col-md-12"><div class="col-sm-3"><button class="btn btn-flat btn-block btn-lg bg-maroon"type="button"title="Order Invoice [Ctrl+Shift+H]"id="order_invoice"name=""><i class="fa fa-hand-paper-o"aria-hidden="true"></i> Đặt món</button></div><div class="col-sm-3"><button class="btn btn-flat btn-block btn-lg btn-primary show_payments_modal"type="button"title="Multiple Payments [Ctrl+Shift+M]"id=""name=""><i class="fa fa-credit-card"aria-hidden="true"></i> Bank</button></div><div class="col-sm-3"><button class="btn btn-flat btn-block btn-lg btn-success shift_c"type="button"title="Trả tiền mặt và lưu lại [Ctrl+Shift+C]"id="<?php  goto IRLy8; SND4V: ?>
pos/get_details',
      type: "post",
      data:{
        last_id       : (!show_only_searched) ? last_id : '',
        id            : $("#category_id").val(),
        category_item_id: category_item_id,
        item_name  : $("#item_name").val(),
        brand_id  : $("#brand_id").val(),
        kind_id  : $("#kind_id").val(),
      },
      beforeSend: function(){
          $('.ajax-load').show();
      }
  }).done(function(data){
      $('.ajax-load').hide();
      
      if(data=='') {
        $(".error_div").show();
      }
      else{
        $(".error_div").hide();
      }


      if(show_only_searched){
        $(".search_div").html('');
      }
      $(".search_div").append(data);
      reset_tooltip();
  }).fail(function(jqXHR, ajaxOptions, thrownError){
     // alert('server not responding...');
  });
}

function get_data_details(last_id='',show_only_searched=false, category_item_id =''){
  $(".search_table_div").html('');
  $.ajax({
      url: '<?php  goto yGV7O; yBfBk: echo $base_url; goto SND4V; o4kFz: ?>
<label class="text-danger">*</label></label><div class="col-sm-5"><input id="other_charges"value="<?php  goto orDpr; dIP1A: echo $base_url; goto JT6Zi; wjgZP: ?>
"><?php  goto JHngZ; xq6qe: $q1 = $this->db->query("\x73\x65\x6c\145\143\164\x20\52\x20\146\162\x6f\x6d\x20\144\142\137\160\141\171\155\x65\156\164\164\x79\160\x65\163\x20\x77\150\145\x72\145\40\163\164\x61\164\165\163\x3d\61"); goto RulCZ; vU_5j: ?>
</th><th width="10%"><?php  goto qPx_a; dgSGZ: if (is_show_stock()) { echo 1; } else { echo 0; } goto kgGs9; NS0Jw: echo $phuc_vu_count; goto Kn7Gm; S0Un5: ?>
</div></div></div><input value="<?php  goto cALF2; zEWQK: ?>
</select> <span class="input-group-btn"><button class="btn btn-flat text-blue reset_brands"type="button"title="Reset Brand"data-placement="top"data-toggle="tooltip"><i class="fa fa-undo"></i></button></span></div></div><div class="col-md-6"><div class="input-group input-group-md"><input id="item_name"name="item_name"class="form-control"data-toggle="tooltip"title="Enter Item Name"placeholder="Item Name"> <span class="input-group-btn"><button class="btn btn-flat text-blue reset_item_name"type="button"title="Reset Item Name"data-placement="top"data-toggle="tooltip"><i class="fa fa-undo"></i></button></span></div></div></div><div class="row"><div class="col-md-12 main-table"><section class="content"><div class="row search_div"style="overflow-y:scroll;min-height:100px;height:72vh"></div></section><div class="text-center ajax-load"style="display:none;height:10vh"><button class="btn btn-default ajax btn-lrg"type="button"title="Ajax Request"><i class="fa fa-refresh fa-spin"></i> Loading More Data</button></div></div></div></div></div></div><div class="fade tab-pane"id="tab_quan_ly_ban"><div class="box box-info"><div class="row"><div class="col-md-6"><div class="input-group input-group-md"><select class="form-control select2"id="table_type_id"name="table_type_id"style="width:100%"><?php  goto F2kBW; RbY6u: ?>
</b></a></li><li class="dropdown user user-menu"><a href="#"class="dropdown-toggle"data-toggle="dropdown"><img alt="User Image"class="user-image"src="<?php  goto l0TBS; PaWql: $other_charges = ''; goto KT96h; K5jD4: ?>
</tbody></table></div></div></li></div></div><div class="fade tab-pane"id="tab_phuc_vu"><div class="box box-info"><li class="user-body"><div class="row"><div class="text-center col-xs-12"style="max-height:300px;overflow-y:scroll"><table class="table table-bordered"width="100%"><thead><tr><th>Vị trí</th><th>Tên</th><th>Số lượng</th><th>Số tiền</th><th>Trạng thái</th><th>Hành động</th></tr></thead><tbody id="phuc_vu_list"><?php  goto d4ASb; rZ4Eo: ?>
"><?php  goto Va6K4; zWAd0: echo $css; goto wjgZP; fWEcR: echo !empty($customer_id) ? $customer_id : ''; goto H14Xv; yjJy9: if ($q1->num_rows($q1) > 0) { foreach ($q1->result() as $res1) { echo "\74\157\160\164\x69\157\x6e\40\x76\141\x6c\165\145\75\47" . $res1->id . "\x27\76" . $res1->brand_name . "\74\57\x6f\x70\164\x69\157\x6e\x3e"; } } else { ?>
<option value="">No Records Found</option><?php  } goto L3caN; V0Uux: echo "\x3c\157\x70\x74\151\x6f\156\40\166\141\x6c\165\145\x3d\x27\61\47\76" . "\124\341\272\xa5\x74\40\x63\xe1\xba\243\x20\142\xc3\xa0\x6e" . "\74\x2f\157\160\164\151\x6f\156\x3e"; goto VMfRq; e6iux: ?>
js/ajaxselect/customer_select_ajax.js"></script><script src="<?php  goto L20oo; FjHSI: ?>
:</label><br><span class="text-bold tot_amt"style="font-size:19px;display:none"></span><?php  goto xYNJu; sTLy8: $query1 = "\163\x65\154\x65\x63\x74\x20\52\40\146\162\157\155\40\x64\142\137\x6b\151\x6e\144\163\x20\167\x68\145\162\x65\40\163\x74\x61\164\x75\x73\75\x31"; goto Vvvmw; I1LyK: ?>
js/modals.js"></script><script src="<?php  goto xSDT8; Igx0q: echo $base_url; goto iETXO; FJcpK: ?>
<div class="wrapper"><header class="main-header"><nav class="navbar navbar-static-top"><div class="container"><div class="navbar-header"><a href="<?php  goto Igx0q; FzavA: echo $this->lang->line("\x71\x75\141\156\164\151\164\171"); goto vU_5j; w8dHR: echo get_invoice_format_id(); goto kyCPK; hjmWY: ?>
:</label><br><span class="text-bold tot_grand"style="font-size:19px;display:none"></span><?php  goto pC36r; vJ1bY: print ucfirst($this->session->userdata("\151\x6e\x76\137\165\163\145\x72\x6e\141\x6d\x65")); goto ImCew; ecPBg: echo $this->security->get_csrf_token_name(); goto YjwDJ; MiXGE: if ($CI->is_sms_enabled()) { if (!isset($sales_id)) { $send_sms_checkbox = "\143\x68\x65\x63\x6b\x65\x64"; } else { $send_sms_checkbox = ''; } } goto PaWql; G44WP: if ($CI->permissions("\163\141\154\145\163\137\166\151\145\x77")) { ?>
<li class=""><a href="<?php  echo $base_url; ?>
sales"title="View Sales List!"><i class="fa text-yellow fa-list"></i> <span><?php  echo $this->lang->line("\163\141\154\x65\163\137\x6c\x69\163\164"); ?>
</span></a></li><?php  } goto xjo81; V3jqw: ?>
"name="category_item_id"class="form-control"style="display:none"placeholder=""> <select class="form-control select2"id="category_id"name="category_id"style="width:100%"value="<?php  goto y3ytT; JHngZ: include "\x6d\x6f\144\x61\x6c\163\x2f\x6d\x6f\144\141\154\137\143\x75\163\164\157\155\x65\x72\x2e\x70\x68\x70"; goto zJX05; orDpr: echo $other_charges; goto dWo7A; EXPjT: ?>
"><p><?php  goto vJ1bY; KQWR8: $q1 = $this->db->query($query1); goto jESWa; qdjO_: ?>
</small></p></li><li class="user-footer"><div class="pull-left"><a href="<?php  goto sUxtv; fpYjq: echo $tot_count; goto iIyPU; iIyPU: ?>
</span></a></li><li id="tab_phuc_vu_li"><a href="#tab_phuc_vu"data-toggle="tab">Chờ phục vụ <span class="label label-danger phuc_vu_list_count"><?php  goto NS0Jw; KLGf6: ?>
dashboard"title="Dashboard"><i class="fa text-yellow fa-dashboard"></i><b class="hidden-xs"><?php  goto Gepl3; Gepl3: echo $this->lang->line("\x64\x61\163\x68\142\157\x61\162\x64"); goto RbY6u; RFhwJ: echo $base_url; goto nIze2; Ba23w: echo $this->lang->line("\157\x74\150\x65\x72\x5f\x63\150\141\x72\147\x65\163"); goto o4kFz; xgL12: echo $bank_number; goto Qmb1z; WqHQP: ?>
<!doctypehtml><html><head><?php  goto IWvrV; fW2cw: echo $theme_link; goto e6iux; Va6K4: echo $this->lang->line("\x74\141\170"); goto ebZbj; ioAL1: ?>
"type="hidden"> <input id="bank_infor"value="<?php  goto yjOR7; HjJvb: ?>
</div></div><div class="row"><div class="col-sm-3"><div class="form-group"><label for="other_charges"class="col-sm-7 control-label"><?php  goto Ba23w; C2qvy: echo $bank_image; goto Rtcxs; gOPhq: ?>
<div class="row"><div class="col-md-6"><br><div class="input-group input-group-md"><select class="form-control select2"id="type_id_select"name="type_id_select"style="width:100%"><?php  goto V3MWo; jESWa: if ($q1->num_rows($q1) > 0) { echo "\x3c\157\160\x74\x69\x6f\156\x20\x76\x61\x6c\165\145\75\x22\x22\x3e\x2d\55\x44\x61\x6e\150\40\x6d\341\273\xa5\143\x2d\55\74\57\157\x70\164\x69\157\x6e\76"; foreach ($q1->result() as $res1) { echo "\x3c\x6f\160\164\151\157\x6e\x20\166\141\154\x75\145\x3d\x27" . $res1->id . "\x27\x3e" . $res1->category_name . "\74\x2f\157\x70\164\x69\x6f\156\76"; $query2 = "\x53\105\x4c\105\x43\x54\x20\52\x20\106\122\x4f\115\x20\144\x62\137\143\x61\x74\145\x67\x6f\162\x79\137\x69\164\x65\155\x20\127\110\105\x52\105\x20\163\x74\141\164\x75\163\x3d\x31\x20\x41\x4e\104\x20\143\x61\164\x65\x67\x6f\162\x79\x5f\151\144\x20\x3d\40{$res1->id}"; $q2 = $this->db->query($query2); if ($q2->num_rows($q2) > 0) { foreach ($q2->result() as $res2) { $category_item_id = $res2->id; echo "\74\x6f\160\164\x69\x6f\156\x20\x76\x61\x6c\165\x65\75\x27" . $res1->id . "\47\40\x64\141\x74\x61\x2d\160\141\x72\x65\156\164\55\151\x64\x3d\47" . $res2->id . "\47\76\x26\x6e\142\163\x70\x3b\x26\x6e\x62\163\x70\x3b\x26\x6e\x62\x73\160\73" . $res2->category_item_name . "\74\57\x6f\x70\x74\x69\x6f\156\76"; } } } } else { echo "\74\157\x70\164\x69\157\156\40\166\x61\154\165\x65\75\x22\42\76\116\x6f\40\122\145\143\x6f\x72\x64\x73\x20\106\x6f\x75\x6e\144\74\57\157\160\164\151\157\x6e\x3e"; } goto bLEjY; oixn_: if (isset($sales_id)) { ?>
<div class="row"><div class="col-md-6"><div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input id="sales_date"value=""name="sales_date"class="form-control datepicker pull-right"readonly></div><span class="text-danger"style="display:none"id="sales_date_msg"></span></div></div><br><?php  } goto gOPhq; AdswG: echo get_profile_picture(); goto EXPjT; zpVJc: ?>
</select> <span class="input-group-btn"><button class="btn btn-flat text-blue reset_brands"type="button"title="Reset Brand"data-placement="top"data-toggle="tooltip"><i class="fa fa-undo"></i></button></span></div></div><div class="col-md-6"><textarea class="form-control"id="customer_view"readonly style="min-height:30px;height:80px;padding-bottom:5px"></textarea></div></div><div class="row"style="padding:5px"><div class="col-md-6"><div class="input-group"><span class="input-group-addon"title="Tìm kiếm bằng tên hoặc sdt khách hàng"><i class="fa fa-user"></i></span> <select class="form-control select2"id="customer_id"name="customer_id"style="width:100%"></select> <span class="input-group-addon pointer"title="New Customer?"data-target="#customer-modal"data-toggle="modal"><i class="fa fa-lg fa-user-plus text-primary"></i></span></div><span class="text-success customer_points"style="display:none"></span></div><div class="col-md-6"><div class="input-group"><span class="input-group-addon"title="Select Items"><i class="fa fa-barcode"></i></span> <input id="item_search"class="form-control"placeholder="Item name/Barcode/Itemcode [Ctrl+Shift+S]"></div></div></div><br><div class="row"><div class="col-md-12"><div class="col-md-4"id="table_item_click"><i class="fa fa-users text-success"id="table_item_click_i"></i> <label id="table_show_name"></label></div><div class="form-group"><div class="col-sm-12"style="overflow-y:scroll;min-height:100px;height:50vh"><table class="table table-bordered items_table table-condensed table-responsive table-striped"style=""><thead class="bg-primary"style="background-color:#f39c12"><?php  goto SO_VT; Zyxvy: echo $result; goto K5jD4; KRgMo: echo tax_disable_class(); goto Y8urh; CkNXP: echo "\74\157\x70\x74\x69\x6f\156\40\x76\x61\154\165\x65\75\x22\x22\76\x2d\x2d\116\150\303\xa3\156\40\x68\x69\xe1\xbb\x87\x75\55\x2d\74\57\x6f\x70\164\x69\x6f\156\76"; goto yjJy9; x0e47: ?>
</th><th width="10%"><?php  goto d5yM3; MoOD4: ?>
"type="hidden"name="<?php  goto ecPBg; nXvaE: ?>
"> <span class="hidden-xs"><?php  goto sVuLj; I9ma4: echo $theme_link; goto Ieus5; yitmB: ?>
<div class="fade modal"id="discount-modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button class="close"type="button"data-dismiss="modal"aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title">Set Discount</h4></div><div class="modal-body"><?php  goto hVgqW; xjo81: if ($CI->permissions("\x69\164\x65\155\163\x5f\x76\151\145\x77")) { ?>
<li class=""><a href="<?php  echo $base_url; ?>
items/"title="View Items List"><i class="fa text-yellow fa-cubes"></i> <span><?php  echo $this->lang->line("\151\164\145\x6d\163\x5f\154\x69\x73\x74"); ?>
</span></a></li><?php  } goto SLLLe; dWo7A: ?>
"name="other_charges"class="form-control text-right"style="width:80px"placeholder="0"> <span class="text-danger"style="display:none"id="other_charges_msg"></span></div></div></div><?php  goto O9WJS; d4ASb: echo $result1; goto VqvBb; Kn7Gm: ?>
</span></a></li></ul><div class="tab-content"><div class="fade tab-pane active in"id="tab_mon_an"><div class="box box-info"><div class="box-body2"><div class="row"><div class="col-md-6"><div class="input-group input-group-md"><input id="category_item_id"value="<?php  goto KtwtW; U4ghn: ?>
js/fullscreen.js"></script><script src="<?php  goto tGrvX; U5RlF: ?>
plugins/iCheck/icheck.min.js"></script><script src="<?php  goto cywEf; dXAXD: ?>
table/get_data_details',
      type: "post",
      data:{
        table_type_id  : $("#table_type_id").val(),
        table_kind_id  : $("#table_kind_id").val(),
      },
      beforeSend: function(){
          $('.ajax-load').show();
      }
  }).done(function(data){
      $('.ajax-load').hide();
      
      if(data=='') {
        $(".error_div").show();
      }
      else{
        $(".error_div").hide();
      }

      if(show_only_searched){
        $(".search_table_div").html('');
      }
      $(".search_table_div").append(data);
      //reset_tooltip();
  }).fail(function(jqXHR, ajaxOptions, thrownError){
     // alert('server not responding...');
  });
}</script><script>$(document).ready(function () {
        var salesInvoiceFormatId = parseInt($('#sales_invoice_format_id').val());

        if (salesInvoiceFormatId !== 3) {
            $('#tab_phuc_vu_li').hide();
        }
        // Kiểm tra giá trị và ẩn tab nếu không phù hợp
        if (salesInvoiceFormatId !== 2 && salesInvoiceFormatId !== 3) {
            $('#tab_phong_ban_li').html('<a data-toggle="tab" href="#tab_quan_ly_ban">Hàng đợi</a>');
            $('#tab_thuc_don_li').html('<a data-toggle="tab" href="#tab_mon_an">Sản phẩm</a>');
            $('#order_invoice').html('<i class="fa fa-hand-paper-o" aria-hidden="true"></i>Thanh toán sau');
        }
         

    });

  $(document).on('click', function(event) {
    const $target = $(event.target);
    const { left, top, width, height } = $target[0].getBoundingClientRect();

    const size = Math.max(width, height);
    const x = event.clientX - left - size / 2;
    const y = event.clientY - top - size / 2;

    const $rippleElement = $('<div class="ripple-container"></div>');
    $rippleElement.css({
        width: `${size}px`,
        height: `${size}px`,
        left: `${x}px`,
        top: `${y}px`
    });

    $target.append($rippleElement);

    setTimeout(() => $rippleElement.remove(), 600);
});</script><script>$(function(){$("#schedule_time_id").val("3");var e=new Date;e.setDate(e.getDate()+3);var t=e.getDate()+"/"+l(e.getMonth()+1)+"/"+e.getFullYear();function l(e){return e<10?"0"+e:e}$("#schedule_time").val(t),$("#schedule_time").datepicker({dateFormat:"dd/mm/yy"}),$("#schedule_time_id").change(function(){var e=$(this).val(),t=new Date;t.setDate(t.getDate()+parseInt(e));var a=t.getDate()+"/"+l(t.getMonth()+1)+"/"+t.getFullYear();$("#schedule_time").val(a)})})</script></body></html>