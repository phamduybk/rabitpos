<?php
 goto HeBRZ; sKRHc: ?>
"type="hidden"> <input id="temp_customer_id"name="temp_customer_id"value=""type="hidden"><?php  goto sFyIR; h4h4K: if (isset($sales_id)) { $btn_id = "\165\160\144\x61\x74\x65"; $btn_name = "\x43\141\163\x68"; ?>
<input id="sales_id"name="sales_id"value="<?php  echo $sales_id; ?>
"type="hidden"><?php  } else { $btn_id = "\163\x61\x76\145"; $btn_name = "\x43\x61\x73\x68"; } goto nimdn; IhEsa: ?>
"><input data-toggle="tooltip" title="Click to Change" id="td_data_'+rowcount+'_11" onclick="show_sales_item_modal('+rowcount+')" name="td_data_'+rowcount+'_11" type="text" class="form-control no-padding pointer min_width" readonly value="'+tax_amt+'"></td>';

        str+='<td id="td_'+rowcount+'_4" class="text-right"><input data-toggle="tooltip" title="Total" id="td_data_'+rowcount+'_4" name="td_data_'+rowcount+'_4" type="text" class="form-control no-padding pointer min_width" readonly value="'+sub_total+'"></td>';/* td_0_4 item sub_total */
        str+='<td id="td_'+rowcount+'_5">'+ remove_btn    +'</td>';/* td_0_5 item gst_amt */

        str+='<input type="hidden" name="tr_item_id_'+rowcount+'" id="tr_item_id_'+rowcount+'" value="'+item_id+'">';
       // str+='<input type="hidden" id="tr_item_per_'+rowcount+'" name="tr_item_per_'+rowcount+'" value="'+gst_per+'">';
        str+='<input type="hidden" id="tr_sales_price_temp_'+rowcount+'" name="tr_sales_price_temp_'+rowcount+'" value="'+sales_price_temp+'">';
        str+='<input type="hidden" id="tr_tax_type_'+rowcount+'" name="tr_tax_type_'+rowcount+'" value="'+tax_type+'">';
        str+='<input type="hidden" id="tr_tax_id_'+rowcount+'" name="tr_tax_id_'+rowcount+'" value="'+tax_id+'">';
        str+='<input type="hidden" id="tr_tax_value_'+rowcount+'" name="tr_tax_value_'+rowcount+'" value="'+tax_value+'">';
        str+='<input type="hidden" id="description_'+rowcount+'" name="description_'+rowcount+'" value="">';
        str+='<input id="item_discount_type_'+rowcount+'" name="item_discount_type_'+rowcount+'" type="hidden" value="'+discount_type+'">';
         str+='<input id="item_discount_input_'+rowcount+'" name="item_discount_input_'+rowcount+'" type="hidden" value="'+discount+'">';
         str+='<input type="hidden" id="purchase_price_'+rowcount+'" name="purchase_price_'+rowcount+'" value="'+purchase_price+'">';

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
  var item_qty=$("#item_qty_"+item_id).val();
  var stock=$("#td_"+rowcount+"_1").html();

  if(parseFloat(item_qty)<parseFloat(stock)){
    new_item_qty=parseFloat(item_qty)+1;

    if(parseFloat(new_item_qty)>parseFloat(stock)){
      new_item_qty = stock;
    }

    $("#item_qty_"+item_id).val(parseFloat(new_item_qty).toFixed(0));
  }
  make_subtotal(item_id,rowcount);
}
//DECREMENT ITEM
function decrement_qty(item_id,rowcount){
  var item_qty=parseFloat($("#item_qty_"+item_id).val());
      item_qty = isNaN(item_qty) ? 0 : item_qty;
  var stock= parseFloat($("#td_"+rowcount+"_1").html());
      stock = isNaN(stock) ? 0 : stock;

  if(item_qty<1){
     $("#item_qty_"+item_id).val((item_qty).toFixed(0));
     toastr["warning"]("Minimum Stock!");
     return;
  }
  if(item_qty<=1){
    $("#item_qty_"+item_id).val((1).toFixed(0));
    toastr["warning"]("Minimum Stock!");
    return;
  }
  
  $("#item_qty_"+item_id).val((parseFloat(item_qty)-1).toFixed(0));
  make_subtotal(item_id,rowcount);
}
//LEFT SIDE: IF ITEM QTY CHANGED MANUALLY
function item_qty_input(item_id,rowcount){
  var item_qty=$("#item_qty_"+item_id).val();
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
    $("#item_qty_"+item_id).val(1);
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
  var item_qty        =$("#item_qty_"+item_id).val();

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
      item_qty=parseFloat(item_qty)+ + +parseFloat($("#item_qty_"+item_id).val()).toFixed(0);
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
      item_qty=parseFloat(item_qty)+ + +parseFloat($("#item_qty_"+item_id).val()).toFixed(0);
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
              increment_qty(item_id,i);
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
  //get_details();
  //alert($("section").height());//600+
  //alert($(".items_table").height());//29.76
  //alert($(".content-wrapper").height());//629
  get_details();

  var first_div= parseFloat($(".content-wrapper").height());
  var second_div= parseFloat($("section").height());
  var items_table= parseFloat($(".items_table").height());
  $(".items_table").parent().css("height",(first_div-second_div)+items_table+250);/**/
  $(".search_div").parent().css("height",((second_div-items_table)>500) ? 500 : (second_div-items_table) );/**/


  //FIRST TIME: SET TOTAL ZERO
  set_total();

  //RIGHT DIV: FILTER INPUT BOX
  $("#search_it").on("keyup",function(){
    search_it();
  });

 //CATEGORY WISE ITEM FETCH FROM SERVER
  var show_only_searched=true;
  $("#category_id,#brand_id").on("change",function () {
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


  //UPDATE PROCESS START<?php  goto mKJ9B; NQiXX: ?>
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
function get_details(){
  /*$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
  $.post("<?php  goto fRCrp; IvLUp: $discount_input = $discount_input == 0 ? '' : $discount_input; goto SULfu; d_oap: echo $theme_link; goto GBv6E; Qxn1X: ?>
"name=""><i class="fa fa-money"aria-hidden="true"></i> Tiền mặt</button></div><div class="col-sm-3"><button class="btn btn-flat btn-block btn-lg bg-purple shift_a"type="button"title="By Cash & Save [Ctrl+Shift+A]"id="pay_all"name=""><i class="fa fa-money"aria-hidden="true"></i> Trả đủ</button></div></div></div></div></form></div></div><div class="col-md-5"><div class="box box-info"><div class="box-body"><div class="row"><div class="col-md-6"><div class="input-group input-group-md"><select class="form-control select2"id="category_id"name="category_id"style="width:100%"><?php  goto j_qc_; M3MI3: echo $css; goto TvIbt; wCrQg: ?>
plugins/iCheck/icheck.min.js"></script><script src="<?php  goto p86Hp; IJgH3: $q1 = $this->db->query($query1); goto w_lg1; tFDWf: ?>
<div class="row"><div class="col-md-6"><div class="input-group"><span class="input-group-addon"title="Customer"><i class="fa fa-user"></i></span> <select class="form-control select2"id="customer_id"name="customer_id"style="width:100%"></select> <span class="input-group-addon pointer"title="New Customer?"data-target="#customer-modal"data-toggle="modal"><i class="fa fa-lg fa-user-plus text-primary"></i></span></div><span class="customer_points text-success"style="display:none"></span></div><div class="col-md-6"><div class="input-group"><span class="input-group-addon"title="Select Items"><i class="fa fa-barcode"></i></span> <input id="item_search"class="form-control"placeholder="Item name/Barcode/Itemcode [Ctrl+Shift+S]"></div></div></div><br><div class="row"><div class="col-md-12"><div class="form-group"><div class="col-sm-12"style="overflow-y:auto;border:1px solid #337ab7"><table class="table table-bordered items_table table-condensed table-responsive table-striped"style=""><thead class="bg-primary"style="background-color:#f39c12"><th width="30%"><?php  goto gOAsk; HdzP1: echo $this->lang->line("\161\165\x61\156\164\x69\164\x79"); goto jcKHo; IuaOe: echo $this->lang->line("\x74\x6f\164\x61\x6c\x5f\141\x6d\x6f\x75\x6e\164"); goto zVl5S; TvIbt: ?>
"><?php  goto Zqnu_; Id2KX: ?>
</th><th width="25%"><?php  goto HdzP1; EbR4W: ?>
js/ajaxselect/customer_select_ajax.js"></script><script src="<?php  goto nzw_G; TvyjT: if ($CI->is_sms_enabled()) { if (!isset($sales_id)) { $send_sms_checkbox = "\x63\150\x65\x63\153\145\144"; } else { $send_sms_checkbox = ''; } } goto oxspf; b_kop: include "\x63\157\x6d\x6d\141\x6e\x2f\143\x6f\x64\145\137\143\163\163\137\146\x6f\x72\x6d\x2e\160\x68\x70"; goto LIf53; s1aSc: echo $this->lang->line("\x74\x61\x78"); goto UJtWb; j7i4o: ?>
users/edit/<?php  goto aBU2w; bnun0: $CI =& get_instance(); goto Xsd0C; zCbDh: ?>
"><p><?php  goto QFYzZ; tUfYx: ?>
</span></a><ul class="dropdown-menu"><li class="user-header"><img alt="User Image"class="img-circle"src="<?php  goto W1l7_; yPPIJ: ?>
"> <span class="hidden-xs"><?php  goto uoCw_; UGTIa: ?>
"value="<?php  goto eWtNo; ubBRk: ?>
</tbody></table></div></div></ul></li><li class="hidden-xs"id="fullscreen"><a title="Fullscreen On/Off"><i class="fa fa-tv text-white"></i></a></li><li class="text-center"id=""><a href="<?php  goto RD1DZ; CAiFA: ?>
js/modals.js"></script><script src="<?php  goto d_oap; Q3FP_: echo $CI->currency("\74\x73\160\141\156\x20\x73\x74\x79\154\x65\x3d\x22\146\157\x6e\x74\x2d\163\151\172\x65\72\40\61\71\160\170\x3b\42\x20\x63\154\141\163\x73\x3d\42\x74\x6f\x74\137\x61\155\x74\137\163\150\x6f\167\x20\x74\145\170\x74\x2d\142\157\x6c\144\42\x3e\x3c\x2f\163\160\141\156\76\x20"); goto nDei1; GPR80: ?>
<label class="text-danger">*</label></label><div class="col-sm-5"><input id="other_charges"name="other_charges"value="<?php  goto GHBGp; EEMdW: ?>
:</label><br><span class="text-bold tot_qty"></span></div><div class="text-right col-md-3"><label><?php  goto IuaOe; WnnnX: ?>
"type="hidden"> <input id="hidden_rowcount"name="hidden_rowcount"value="0"type="hidden"> <input id="hidden_invoice_id"name="hidden_invoice_id"value=""type="hidden"> <input id="base_url"value="<?php  goto AYnA8; nDei1: ?>
</div><div class="text-right col-md-3"><label><?php  goto yUnfG; cmI5m: echo $base_url; goto g28pg; w0_3e: echo "\74\x6f\x70\x74\151\x6f\156\x20\x76\141\x6c\x75\x65\75\42\x22\x3e\x41\x6c\x6c\x20\x42\x72\x61\156\144\163\74\57\x6f\x70\164\151\157\x6e\x3e"; goto IesdV; nuttx: echo !empty($customer_id) ? $customer_id : ''; goto NQiXX; ju0ZW: echo $this->lang->line("\x6f\x74\x68\145\162\x5f\143\x68\141\x72\x67\145\x73"); goto GPR80; hK499: echo $theme_link; goto EbR4W; LIf53: ?>
<link href="<?php  goto oIrCp; pDvWk: echo $result; goto ubBRk; JdP_a: echo $this->lang->line("\x73\x75\x62\x74\157\164\141\154"); goto yvOSw; ecbKS: echo get_profile_picture(); goto yPPIJ; bBQOB: ?>
</ul></div><div class="navbar-custom-menu"><ul class="nav navbar-nav"><li class="dropdown user user-menu"><a href="#"class="dropdown-toggle"data-toggle="dropdown"title="Click To View Hold Invoices"><span class=""><?php  goto fU6kC; rE9FE: echo date("\x59"); goto OVndx; E8rOp: ?>
:</label><br><span class="text-bold tot_grand"style="font-size:19px;display:none"></span><?php  goto sv5Qp; F6Ypk: ?>
dashboard"title="Dashboard"><i class="fa text-yellow fa-dashboard"></i><b class="hidden-xs"><?php  goto nkRLN; uoCw_: print ucfirst($this->session->userdata("\151\x6e\166\137\165\x73\145\162\156\x61\x6d\145")); goto tUfYx; ikBS1: $query1 = "\x73\145\x6c\145\x63\x74\x20\x2a\x20\146\x72\157\x6d\40\144\x62\137\x62\x72\141\x6e\144\163\40\167\150\x65\162\145\40\x73\x74\141\164\x75\163\75\x31"; goto jbsaK; K76BB: echo $CI->currency("\74\x73\x70\141\x6e\x20\x73\164\x79\x6c\145\75\x22\x66\157\x6e\x74\55\163\151\172\145\x3a\40\61\x39\x70\170\73\42\x20\143\154\141\x73\163\75\x22\x74\x6f\x74\137\x64\x69\x73\x63\x5f\163\150\157\x77\40\x74\145\170\x74\55\x62\157\154\144\x22\x3e\74\x2f\x73\160\141\x6e\x3e"); goto Q3Y5x; h125b: echo $this->lang->line("\x71\165\x61\156\x74\x69\164\171"); goto EEMdW; CpOo8: ?>
plugins/iCheck/square/blue.css"rel="stylesheet"><style type="text/css">.select2-container--default .select2-selection--single{border-radius:0}.table-striped>tbody>tr:nth-of-type(2n+1){background-color:#ede3e3}.table-striped>tbody>tr{background-color:#ddc8c8}.tot_amt,.tot_disc,.tot_grand,.tot_qty{font-size:19px;color:#023763}.pointer{cursor:pointer}.navbar-nav>.user-menu>.dropdown-width-lg{width:350px}.header-custom{background-image:-webkit-gradient(linear,left top,right top,from(#20b9ae),to(#006fd6));color:#fff}.border-custom-bottom{border-bottom:1px solid;padding-top:10px;padding-bottom:5px}.custom-font-size{font-size:22px}.search_item{text-transform:uppercase;font-size:10px;color:#000;text-align:center;text-overflow:hidden;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical}.item_image{min-width:70px;min-height:70px;max-width:70px;max-height:70px}.item_box{border-top:none}.min_width{min-width:70px}</style></head><body class="hold-transition layout-top-nav skin-blue"><script type="text/javascript">"skin-blue"!=theme_skin&&($("body").addClass(theme_skin),$("body").removeClass("skin-blue")),"true"==sidebar_collapse&&$("body").addClass("sidebar-collapse")</script><?php  goto bnun0; jcKHo: ?>
</th><th width="15%"><?php  goto pHi5i; k2PLI: ?>
//UPDATE PROCESS END

 // hold_invoice_list();
});//ready() end


function get_item_details(item_id){

  $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
  $.post("<?php  goto FLMJT; ulbna: ?>
<script src="<?php  goto bSzQe; bSzQe: echo $theme_link; goto wCrQg; XBHNf: if ($CI->permissions("\x73\x61\x6c\x65\163\x5f\x76\151\x65\167")) { ?>
<li class=""><a href="<?php  echo $base_url; ?>
sales"title="View Sales List!"><i class="fa text-yellow fa-list"></i> <span><?php  echo $this->lang->line("\163\141\x6c\145\163\137\154\151\x73\164"); ?>
</span></a></li><?php  } goto lrM6a; jbsaK: $q1 = $this->db->query($query1); goto w0_3e; MssSh: $css = $this->session->userdata("\154\x61\156\x67\165\x61\147\x65") == "\101\x72\x61\142\x69\143" || $this->session->userdata("\x6c\x61\156\x67\165\141\147\x65") == "\125\x72\144\165" ? "\155\x61\x72\x67\151\x6e\55\162\151\x67\150\x74\x3a\x20\x30\x20\41\151\155\160\157\x72\x74\x61\156\x74\x3b" : ''; goto n2nsf; fU6kC: echo $this->lang->line("\x68\x6f\154\x64\x5f\154\x69\x73\164"); goto bMMwz; pHi5i: echo $this->lang->line("\x70\162\151\143\145"); goto mjY6r; fRCrp: echo $base_url; goto CGFID; S6DwA: echo $discount_input; goto CcZFL; QISfp: echo $base_url; goto oGrXh; nimdn: ?>
<div class="text-right col-md-12"><div class="col-sm-3"><button class="btn btn-flat btn-block btn-lg bg-maroon"type="button"title="Hold Invoice [Ctrl+Shift+H]"id="hold_invoice"name=""><i class="fa fa-hand-paper-o"aria-hidden="true"></i> Trả sau</button></div><div class="col-sm-3"><button class="btn btn-flat btn-block btn-lg btn-primary show_payments_modal"type="button"title="Multiple Payments [Ctrl+Shift+M]"id=""name=""><i class="fa fa-credit-card"aria-hidden="true"></i> Bank</button></div><div class="col-sm-3"><button class="btn btn-flat btn-block btn-lg btn-success shift_c"type="button"title="Trả tiền mặt và lưu lại [Ctrl+Shift+C]"id="<?php  goto W8oxT; ulClD: if ($q1->num_rows($q1) > 0) { foreach ($q1->result() as $res1) { echo "\x3c\157\x70\x74\151\157\156\x20\x76\x61\x6c\165\x65\x3d\47" . $res1->id . "\x27\76" . $res1->category_name . "\x3c\57\157\x70\x74\151\157\x6e\76"; } } else { ?>
<option value="">No Records Found</option><?php  } goto mxg5N; oxspf: $other_charges = ''; goto qSvHE; mxg5N: ?>
</select> <span class="input-group-btn"><button class="btn btn-flat text-blue reset_categories"type="button"title="Reset Brand"data-placement="top"data-toggle="tooltip"><i class="fa fa-undo"></i></button></span></div></div><div class="col-md-6"><div class="input-group input-group-md"><select class="form-control select2"id="brand_id"name="brand_id"style="width:100%"><?php  goto ikBS1; XK0G2: ?>
pos/get_item_details",{item_id:item_id},function(result){
    //console.log(result);
    var item = jQuery.parseJSON(result);

    var obj = {};
    obj['item_id']        = item['id'];
    obj['item_name']      = item['item_name'];
    obj['stock']          = item['stock'];
    obj['sales_price']    = item['sales_price'];
    obj['purchase_price'] = item['purchase_price'];
    obj['tax_id']         = item['tax_id'];
    obj['tax_type']       = item['tax_type'];
    obj['tax']            = item['tax'];
    obj['tax_name']       = item['tax_name'];
    obj['item_tax_amt']   = item['item_tax_amt'];
    obj['discount_type']  = item['discount_type'];
    obj['discount']       = item['discount'];
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

            }
            else{
              //console.log("manual Selected");
              var stock=ui.item.stock;
              var item_id=ui.item.id;
            }
            
            if(parseFloat(stock)==0){
              toastr["error"]("Out of Stock!");
              $("#item_search").val('');
              return;
            }
            //addrow(item_id);
            get_item_details(item_id);
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

      //Find the item details
      var item_name = $("#td_data_"+row_id+"_0").html();
      var tax_type = $("#tr_tax_type_"+row_id).val();
      var tax_id = $("#tr_tax_id_"+row_id).val();
      var description = $("#description_"+row_id).val();

      /*Discount*/
      var item_discount_input = $("#item_discount_input_"+row_id).val();
      var item_discount_type = $("#item_discount_type_"+row_id).val();

      //Set to Popup
      $("#item_discount_input").val(item_discount_input);
      $("#item_discount_type").val(item_discount_type).select2();

      $("#popup_item_name").html(item_name);
      $("#popup_tax_type").val(tax_type).select2();
      $("#popup_tax_id").val(tax_id).select2();
      $("#popup_row_id").val(row_id);
      $("#popup_description").val(description);
    }

    function set_info(){
      var row_id = $("#popup_row_id").val();
      var tax_type = $("#popup_tax_type").val();
      var tax_id = $("#popup_tax_id").val();
      var description = $("#popup_description").val();
      var tax_name = ($('option:selected', "#popup_tax_id").attr('data-tax-value'));
      var tax = parseFloat($('option:selected', "#popup_tax_id").attr('data-tax'));

      /*Discounr*/
      var item_discount_input = $("#item_discount_input").val();
      var item_discount_type = $("#item_discount_type").val();

      //Set it into row 
      $("#item_discount_input_"+row_id).val(item_discount_input);
      $("#item_discount_type_"+row_id).val(item_discount_type);

      $("#tr_tax_type_"+row_id).val(tax_type);
      $("#tr_tax_id_"+row_id).val(tax_id);
      $("#description_"+row_id).val(description);
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
      var qty=($("#item_qty_"+item_id).val());
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
$('.search_div').on('scroll', function() {
    if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
        load_next_details();      
    }
});

function load_next_details(){
  var last_id = $(".item_box:last").attr("data-item-id");
  get_details(last_id);
}



function get_details(last_id='',show_only_searched=false){
  $.ajax({
      url: '<?php  goto cmI5m; bKZsH: ?>
</th><th width="10%"class="<?php  goto Ctyuq; lrM6a: if ($CI->permissions("\163\x61\x6c\x65\x73\x5f\141\144\x64")) { ?>
<li class=""><a href="<?php  echo $base_url; ?>
pos"title="Create New POS Invoice"><i class="fa text-yellow fa-calculator"></i> <span><?php  echo $this->lang->line("\156\145\167\137\151\x6e\166\157\x69\x63\x65"); ?>
</span></a></li><?php  } goto cD3dX; qSvHE: ?>
<div class="row"><div class="col-xs-12"><div class="col-md-6"></div><div class="col-md-6"><div class="form-group"><label for="other_charges"class="col-sm-7 control-label"><?php  goto ju0ZW; b1NwN: ?>
"class="btn btn-flat btn-default">Profile</a></div><div class="pull-right"><a href="<?php  goto QISfp; eWtNo: echo $this->security->get_csrf_hash(); goto WnnnX; QFYzZ: print ucfirst($this->session->userdata("\x69\156\x76\x5f\165\163\145\x72\x6e\141\155\145")); goto WMaOg; yAc2s: ?>
</b><b class="hidden-lg">POS</b></a> <button class="collapsed navbar-toggle"type="button"data-toggle="collapse"data-target="#navbar-collapse"><i class="fa fa-bars"></i></button></div><div class="pull-left collapse navbar-collapse"id="navbar-collapse"><ul class="nav navbar-nav"><?php  goto XBHNf; QSNvy: echo $this->security->get_csrf_token_name(); goto UGTIa; zVl5S: ?>
:</label><br><span class="text-bold tot_amt"style="font-size:19px;display:none"></span><?php  goto Q3FP_; IesdV: if ($q1->num_rows($q1) > 0) { foreach ($q1->result() as $res1) { echo "\x3c\157\x70\x74\151\x6f\156\x20\x76\141\154\165\145\x3d\x27" . $res1->id . "\47\76" . $res1->brand_name . "\74\57\157\160\x74\151\x6f\x6e\76"; } } else { ?>
<option value="">No Records Found</option><?php  } goto HFXS8; j3v3Y: ?>
dist/js/bootstrap3-typeahead.min.js"></script><script>//Customer Selection Box Search
         function getCustomerSelectionId() {
           return '#customer_id';
         }

         $(document).ready(function () {

            var customer_id = "<?php  goto nuttx; bMMwz: ?>
</span><span class="hold_invoice_list_count label label-danger"><?php  goto a0aOh; J1YnA: echo $base_url; goto j7i4o; p3iX5: include "\x63\x6f\155\155\x61\156\57\143\x6f\144\145\137\x6a\x73\x5f\163\x6f\x75\x6e\x64\56\x70\x68\160"; goto F6YQu; uMRyh: include "\x6d\157\x64\141\x6c\x73\x2f\155\x6f\x64\x61\154\137\160\x6f\x73\137\x73\x61\154\x65\163\x5f\151\x74\x65\155\56\160\150\160"; goto Xc8z8; PYQ14: echo $base_url; goto ffE81; AQGO8: if (isset($sales_id)) { if ($CI->permissions("\163\141\154\145\x73\137\x61\x64\x64")) { ?>
<div class="pull-right col-md-4"><a href="<?php  echo $base_url; ?>
pos"class="btn btn-primary pull-right">New Invoice</a></div><?php  } } goto zplO4; n2nsf: ?>
<div class="content-wrapper"style="<?php  goto M3MI3; nkRLN: echo $this->lang->line("\x64\x61\163\x68\x62\157\141\x72\x64"); goto lyuON; Soyxk: $discount_input = $this->db->select("\163\x61\x6c\145\x73\x5f\x64\x69\163\143\x6f\165\156\x74")->get("\x64\142\137\163\151\x74\x65\x73\145\164\164\151\156\147\x73")->row()->sales_discount; goto IvLUp; W8oxT: echo "\x73\x68\157\x77\x5f\143\141\163\x68\x5f\155\x6f\144\141\154"; goto Qxn1X; mjY6r: ?>
</th><th width="10%"><?php  goto IeLy3; RD1DZ: echo $base_url; goto F6Ypk; Q3Y5x: ?>
</div><div class="text-right col-md-3"><label><?php  goto QOGH_; lyuON: ?>
</b></a></li><li class="dropdown user user-menu"><a href="#"class="dropdown-toggle"data-toggle="dropdown"><img alt="User Image"class="user-image"src="<?php  goto ecbKS; Ctyuq: echo tax_disable_class(); goto icrDy; oGrXh: ?>
logout"class="btn btn-flat btn-default">Sign out</a></div></li></ul></li></ul></div></div></nav></header><?php  goto MssSh; F6YQu: include "\143\157\155\x6d\141\156\57\143\157\144\145\x5f\x6a\x73\137\146\x6f\x72\x6d\x2e\x70\x68\x70"; goto ulbna; yUnfG: echo $this->lang->line("\164\157\x74\141\154\x5f\144\x69\163\143\157\x75\156\164"); goto x3BPw; sv5Qp: echo $CI->currency("\x3c\x73\x70\x61\156\40\163\164\x79\154\x65\75\x22\x66\157\156\x74\x2d\163\151\172\x65\x3a\40\x31\x39\x70\x78\x3b\x22\40\143\154\x61\x73\163\75\x22\x74\157\x74\137\147\x72\x61\156\x64\137\163\x68\x6f\x77\x20\164\x65\x78\164\x2d\x62\157\154\x64\x22\x3e\74\x2f\x73\x70\141\x6e\x3e"); goto nGfH8; IeLy3: echo $this->lang->line("\x64\151\x73\x63\157\x75\x6e\164"); goto bKZsH; Xsd0C: ?>
<div class="wrapper"><header class="main-header"><nav class="navbar navbar-static-top"><div class="container"><div class="navbar-header"><a href="<?php  goto PYQ14; Xc8z8: ?>
<section class="content"><div class="row"><div class="col-md-7"><div class="box box-primary"><form class="form-horizontal"id="pos-form"><div class="box-header with-border"style="padding-bottom:0"><div class="row"><div class="col-md-12"><div class="col-md-4"><h3 class="text-primary box-title"><i class="fa fa-shopping-cart text-aqua"></i> Sales Invoice</h3></div><?php  goto AQGO8; WMaOg: ?>
<small>Year<?php  goto rE9FE; GBv6E: ?>
js/pos.js"></script><script src="<?php  goto hK499; CcZFL: ?>
"class="form-control"placeholder=""></div></div></div><div class="col-md-6"><div class="box-body"><div class="form-group"><label for="discount_type">Discount Type</label> <select class="form-control"id="discount_type"name="discount_type"><option value="in_percentage">Per%</option><option value="in_fixed">Fixed</option></select></div></div></div></div></div><div class="modal-footer"><button class="btn btn-warning"type="button"data-dismiss="modal">Close</button> <button class="btn btn-primary discount_update"type="button">Update</button></div></div></div></div><div class="box-body"><?php  goto hXdls; CGFID: ?>
pos/get_details",{id:$("#category_id").val()},function(result){
    $(".search_div").html('');
    $(".search_div").html(result);
    $(".overlay").remove();
  });*/
}

//LEFT SIDE: ON CLICK ITEM ADD TO INVOICE LIST
function addrow(id='',item_obj=''){

    //CHECK SAME ITEM ALREADY EXIST IN ITEMS TABLE 

    var item_id = (item_obj=='') ? $('#div_'+id).attr('data-item-id') : item_obj.item_id; 
    var item_check=check_same_item(item_id);
    if(!item_check){return false;}
    var rowcount        =$("#hidden_rowcount").val();//0,1,2...
    
    
    var item_name = (item_obj=='') ? $('#div_'+id).attr('data-item-name') : item_obj.item_name; 

    var stock   =(item_obj=='') ? $('#div_'+id).attr('data-item-available-qty') : item_obj.stock;
        stock     =(parseFloat(stock)).toFixed(0);

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

    var item_cost     =(item_obj=='') ? $('#div_'+id).attr('data-item-cost') : item_obj.purchase_price;  
    var sales_price     =(item_obj=='') ? $('#div_'+id).attr('data-item-sales-price') : item_obj.sales_price ; 
    var sales_price_temp=sales_price;
        sales_price     =(parseFloat(sales_price)).toFixed(0);

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
        quantity       +='<input type="text" value="'+qty+'" class="form-control no-padding text-center min_width" onchange="item_qty_input('+item_id+','+rowcount+')" id="item_qty_'+item_id+'" name="item_qty_'+item_id+'">';
        quantity       +='<span class="input-group-btn"><button onclick="increment_qty('+item_id+','+rowcount+')" type="button" class="btn btn-default btn-flat"><i class="fa fa-plus text-success"></i></button></span></div>';
    var sub_total       =(parseFloat(1)*parseFloat(sales_price)).toFixed(0);//Initial
    var remove_btn      ='<a class="fa fa-fw fa-trash-o text-red" style="cursor: pointer;font-size: 20px;" onclick="removerow('+rowcount+')" title="Delete Item?"></a>';

    var str=' <tr id="row_'+rowcount+'" data-row="0" data-item-id='+item_id+'>';/*item id*/
        str+='<td id="td_'+rowcount+'_0"><a data-toggle="tooltip" title="Click to Change Tax" class="pointer" id="td_data_'+rowcount+'_0" onclick="show_sales_item_modal('+rowcount+')">'+ item_name     +'</a> <i onclick="show_sales_item_modal('+rowcount+')" class="fa fa-edit pointer"></i></td>';/* td_0_0 item name*/ 
        str+='<td id="td_'+rowcount+'_1">'+ stock +'</td>';/* td_0_1 item available qty*/
        str+='<td id="td_'+rowcount+'_2">'+ quantity      +'</td>';/* td_0_2 item available qty*/


            info='<input id="sales_price_'+rowcount+'" onblur="set_to_original('+rowcount+','+item_cost+')" onkeyup="update_price('+rowcount+','+item_cost+')" name="sales_price_'+rowcount+'" type="text" class="form-control no-padding min_width" value="'+sales_price+'">';
        str+='<td id="td_'+rowcount+'_3" class="text-right">'+ info   +'</td>';/* td_0_3 item sales price*/

        /*Discount*/
         info='<input data-toggle="tooltip" title="Click to Change" onclick="show_sales_item_modal('+rowcount+')" id="item_discount_'+rowcount+'" readonly name="item_discount_'+rowcount+'" type="text" class="form-control no-padding min_width pointer" value="0">';
         
        str+='<td id="td_'+rowcount+'_6" class="text-right">'+ info   +'</td>';

        /*Tax amt*/
        str+='<td id="td_'+rowcount+'_11" class="<?php  goto K22B4; zplO4: ?>
</div></div></div><input name="<?php  goto QSNvy; w_lg1: echo "\x3c\157\x70\164\151\x6f\156\40\x76\x61\x6c\x75\x65\75\42\42\76\x41\154\x6c\40\103\x61\x74\x65\x67\157\x72\x69\145\x73\x3c\x2f\157\160\x74\x69\x6f\156\76"; goto ulClD; cD3dX: if ($CI->permissions("\x69\164\x65\x6d\x73\x5f\166\151\145\167")) { ?>
<li class=""><a href="<?php  echo $base_url; ?>
items/"title="View Items List"><i class="fa text-yellow fa-cubes"></i> <span><?php  echo $this->lang->line("\151\164\145\155\x73\137\154\x69\163\x74"); ?>
</span></a></li><?php  } goto bBQOB; gOAsk: echo $this->lang->line("\151\x74\145\x6d\137\156\141\155\145"); goto VeVSt; Zqnu_: include "\155\157\x64\x61\x6c\163\x2f\155\157\x64\141\154\137\143\165\163\x74\157\155\x65\x72\x2e\160\150\x70"; goto uMRyh; nGfH8: ?>
</div></div><div class="row"><?php  goto h4h4K; yvOSw: ?>
</th><th width="5%"><i class="fa fa-close"></i></th></thead><tbody id="pos-form-tbody"style="font-size:16px;font-weight:700;overflow:scroll"></tbody><tfoot></tfoot></table></div></div></div></div><?php  goto SoPOI; AYnA8: echo $base_url; goto sKRHc; oIrCp: echo $theme_link; goto CpOo8; icrDy: ?>
"><?php  goto s1aSc; GHBGp: echo $other_charges; goto n1lXO; HFXS8: ?>
</select> <span class="input-group-btn"><button class="btn btn-flat text-blue reset_brands"type="button"title="Reset Brand"data-placement="top"data-toggle="tooltip"><i class="fa fa-undo"></i></button></span></div></div></div><br><div class="row"><div class="col-md-12"><div class="input-group input-group-md"><input id="item_name"name="item_name"class="form-control"placeholder="Item Name"data-toggle="tooltip"title="Enter Item Name"> <span class="input-group-btn"><button class="btn btn-flat text-blue reset_item_name"type="button"title="Reset Item Name"data-placement="top"data-toggle="tooltip"><i class="fa fa-undo"></i></button></span></div></div></div><div class="row"><div class="col-md-12"><section class="content"><div class="row search_div"style="overflow-y:scroll;min-height:100px;height:500px"></div></section><div class="text-center ajax-load"style="display:none"><button class="btn btn-default ajax btn-lrg"type="button"title="Ajax Request"><i class="fa fa-refresh fa-spin"></i> Loading More Data</button></div></div></div></div></div></div></div></section></div></div><?php  goto p3iX5; SoPOI: $send_sms_checkbox = "\x64\151\163\141\142\154\x65\144"; goto TvyjT; mKJ9B: if (isset($sales_id) && !empty($sales_id)) { ?>
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
      $("#hold_invoice,#show_cash_modal").attr('disabled',true).removeAttr('id');<?php  } goto k2PLI; hZW3M: ?>
</span></a><ul class="dropdown-menu dropdown-width-lg"><li class="user-body"><div class="row"><div class="text-center col-xs-12"style="max-height:300px;overflow-y:scroll"><table class="table table-bordered"width="100%"><thead><tr><th>ID</th><th>Date</th><th>Ref.ID</th><th>Action</th></tr></thead><tbody id="hold_invoice_list"><?php  goto pDvWk; bMOZL: echo $this->lang->line("\163\x74\157\143\x6b"); goto Id2KX; VeVSt: ?>
</th><th width="10%"><?php  goto bMOZL; j_qc_: $query1 = "\163\x65\154\x65\143\164\40\52\40\146\x72\157\155\x20\144\x62\137\x63\x61\x74\145\x67\x6f\162\x79\40\x77\150\x65\x72\145\x20\x73\x74\141\164\x75\163\x3d\x31"; goto IJgH3; QOGH_: echo $this->lang->line("\x67\162\141\x6e\x64\x5f\x74\x6f\164\141\154"); goto E8rOp; FLMJT: echo $base_url; goto XK0G2; SULfu: ?>
<div class="row"><div class="col-md-6"><div class="box-body"><div class="form-group"><label for="discount_input">Discount</label> <input id="discount_input"name="discount_input"value="<?php  goto S6DwA; W1l7_: echo get_profile_picture(); goto zCbDh; a0aOh: echo $tot_count; goto hZW3M; aBU2w: echo $this->session->userdata("\x69\156\166\137\x75\163\x65\162\151\144"); goto b1NwN; rWgI2: ?>
js/fullscreen.js"></script><script src="<?php  goto oqR3e; K22B4: echo tax_disable_class(); goto IhEsa; x3BPw: ?>
:<a class="fa cursor-pointer fa-pencil-square-o"data-toggle="modal"data-target="#discount-modal"></a></label><br><span class="text-bold tot_disc"style="font-size:19px;display:none"></span><?php  goto K76BB; nzw_G: echo $theme_link; goto j3v3Y; sFyIR: include "\x6d\157\144\x61\154\x73\x5f\x70\157\163\137\x70\x61\171\x6d\145\156\x74\57\155\x6f\x64\x61\x6c\x5f\160\x61\x79\155\x65\x6e\x74\163\x5f\155\x75\x6c\x74\x69\x2e\160\x68\x70"; goto CBLLP; n1lXO: ?>
"class="form-control text-right"placeholder="0.00"> <span class="text-danger"style="display:none"id="other_charges_msg"></span></div></div></div></div></div></div><div class="bg-gray box-footer"><div class="row"><div class="text-right col-md-3"><label><?php  goto h125b; p86Hp: echo $theme_link; goto rWgI2; oqR3e: echo $theme_link; goto CAiFA; CBLLP: ?>
<div class="fade modal"id="discount-modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button class="close"type="button"data-dismiss="modal"aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title">Set Discount</h4></div><div class="modal-body"><?php  goto Soyxk; OVndx: ?>
</small></p></li><li class="user-footer"><div class="pull-left"><a href="<?php  goto J1YnA; UJtWb: ?>
</th><th width="15%"><?php  goto JdP_a; Ta7nB: echo $SITE_TITLE; goto yAc2s; ffE81: ?>
dashboard"class="navbar-brand"title="Go to Dashboard!"><b class="hidden-xs"><?php  goto Ta7nB; hXdls: if (isset($sales_id)) { ?>
<div class="row"><div class="col-md-6"><div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input id="sales_date"name="sales_date"value=""class="form-control datepicker pull-right"readonly></div><span class="text-danger"style="display:none"id="sales_date_msg"></span></div></div><br><?php  } goto tFDWf; HeBRZ: ?>
<!doctypehtml><html><head><?php  goto b_kop; g28pg: ?>
pos/get_details',
      type: "post",
      data:{
        last_id       : (!show_only_searched) ? last_id : '',
        id            : $("#category_id").val(),
        item_name  : $("#item_name").val(),
        brand_id  : $("#brand_id").val(),
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
      alert('server not responding...');
  });
}</script></body></html>