$("#item_search").autocomplete({
    source: function(data, cb){
        $.ajax({
        	autoFocus:true,
            url: $("#base_url").val()+'items/get_json_items_details',
            method: 'GET',
            dataType: 'json',
            /*showHintOnFocus: true,
			autoSelect: true, 
			
			selectInitial :true,*/
			
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
                            label: el.item_code +'--'+ el.label,
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
        //loader start
        search: function (e, u) {
        },
        select: function (e, u) { 
        	
            //$("#mobile").val(u.item.mobile)
            //$("#item_search").val(u.item.value);
            //$("#customer_dob").val(u.item.customer_dob)
            //$("#address").val(u.item.address)
            /*if(parseInt(u.item.stock)<=0){
              toastr["warning"](u.item.stock+" Items in Stock!!");
              failed.currentTime = 0; 
              failed.play();
              return false;
            }*/

            var item_id =u.item.id;
            if(restrict_quantity(item_id)){
              return_row_with_data(item_id); 
            }
        },   
        //loader end
});

function return_row_with_data(item_id){
	var base_url=$("#base_url").val().trim();
	var rowcount=$("#hidden_rowcount").val();
	$.post(base_url+"items/return_row_with_data/"+rowcount+"/"+item_id,{},function(result){
        //alert(result);
        $('#sales_table tbody').append(result);
       	$("#hidden_rowcount").val(parseInt(rowcount)+1);
        success.currentTime = 0;
        success.play();
        final_total();
    }); 
}
//INCREMENT ITEM
function increment_qty(rowcount){
  
 /* var flag = restrict_quantity($("#tr_item_id_"+rowcount).val().trim());
  if(!flag){ return false;}*/

  var item_qty=$("#td_data_"+rowcount+"_3").val();
  /*var available_qty=$("#tr_available_qty_"+rowcount+"_13").val();
  if(parseInt(item_qty)<parseInt(available_qty)){*/
    item_qty=parseFloat(item_qty)+1;
    $("#td_data_"+rowcount+"_3").val(item_qty);
 // }
  final_total(rowcount);
}
//DECREMENT ITEM
function decrement_qty(rowcount){
  var item_qty=$("#td_data_"+rowcount+"_3").val();
  if(item_qty<=1){
    $("#td_data_"+rowcount+"_3").val(1);
    return;
  }
  $("#td_data_"+rowcount+"_3").val(parseFloat(item_qty)-1);
  final_total(rowcount);
}

function update_paid_payment_total() {
  var rowcount=$("#paid_amt_tot").attr("data-rowcount");
  var tot=0;
  for(i=1;i<rowcount;i++){
    if(document.getElementById("paid_amt_"+i)){
      tot += parseFloat($("#paid_amt_"+i).html());
    }
  }
  $("#paid_amt_tot").html(tot.toFixed(0));
}


  function restrict_quantity(item_id) {
  	var rowcount=$("#hidden_rowcount").val();
  	var available_qty = 0;
  	var count_item_qty = 0;
  	var selected_item_id = 0;
      for(i=1;i<=rowcount;i++){
        if(document.getElementById("tr_item_id_"+i)){
        	selected_item_id = $("#tr_item_id_"+i).val().trim();
            if(parseInt(item_id)==parseInt(selected_item_id)){
	             available_qty = parseInt($("#tr_available_qty_"+i+"_13").val().trim());
	             count_item_qty += parseInt($("#td_data_"+i+"_3").val().trim());
          }
        }
      }//end for
      if(available_qty!=0 && count_item_qty>=available_qty){
        toastr["warning"]("Only "+available_qty+" Items in Stock!!");
        failed.currentTime = 0; 
        failed.play();
      	return false;
      }
      return true;
  }




$('#preview').on("click",function (e) {
  var base_url=$("#base_url").val().trim();

    var base_url=$("#base_url").val().trim();
  var rowcount=$("#hidden_rowcount").val();
  
  if(parseInt(rowcount)<=1){
    toastr["warning"]("Please Select Items from Search List!!");
    failed.currentTime = 0; 
    failed.play();
    return;
  }
  var this_id=this.id;
        e.preventDefault();
        data = new FormData($('#labels-form')[0]);//form name
        /*Check XSS Code*/
        if(!xss_validation(data)){ return false; }
        
        $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        $("#"+this_id).attr('disabled',true);  //Enable Save or Update button
        $("#preview_data").html('');

        $.ajax({
        type: 'POST',
        url: base_url+'items/preview_labels',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
          $("#preview_data").html('').html(result);
        
          toastr['success']("Prview Success!");

          $("#"+this_id).attr('disabled',false);  //Enable Save or Update button
          $(".overlay").remove();

         }
         });
  
  
});