$('#save,#update').on("click",function (e) {
	var base_url=$("#base_url").val().trim();
    //Initially flag set true
    var flag=true;

    function check_field(id)
    {

      if(!$("#"+id).val().trim() ) //Also check Others????
        {

            $('#'+id+'_msg').fadeIn(200).show().html('Required Field').addClass('required');
            //$('#'+id).css({'background-color' : '#E8E2E9'});
            flag=false;
        }
        else
        {
             $('#'+id+'_msg').fadeOut(200).hide();
             //$('#'+id).css({'background-color' : '#FFFFFF'});    //White color
        }
    }

   
   
    //Validate Input box or selection box should not be blank or empty
	check_field("item_name");
	check_field("category_id");
	check_field("unit_id");//units of measurments
	check_field("price");
	check_field("alert_qty");

	check_field("tax_id");
	check_field("purchase_price");
	check_field("tax_type");
	//check_field("profit_margin");
	check_field("sales_price");
	
	if(!$.isNumeric($("#alert_qty").val())){
   	toastr["error"]("Miminum Quantity must be a number");
   	$("#alert_qty").focus();
   	return false;
   }

    if(flag==false)
    {
		toastr["warning"]("You have Missed Something to Fillup!");
		return;
    }

    var this_id=this.id;

    if(this_id=="save")  //Save start
    {

					if(confirm("Do You Wants to Save Record ?")){
						e.preventDefault();
						data = new FormData($('#items-form')[0]);//form name
						/*Check XSS Code*/
						if(!xss_validation(data)){ return false; }
						
						$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
						$("#"+this_id).attr('disabled',true);  //Enable Save or Update button
						$.ajax({
						type: 'POST',
						url: 'newitems',
						data: data,
						cache: false,
						contentType: false,
						processData: false,
						success: function(result){
              //alert(result);return;
							if(result=="success")
							{
								//alert("Record Saved Successfully!");
								window.location=base_url+'items';//"items-view.php";
								return;
							}
							else if(result=="failed")
							{
							   toastr["error"]("Sorry! Failed to save Record.Try again!");
							   //	return;
							}
							else
							{
								toastr["error"](result);
								
							}
							$("#"+this_id).attr('disabled',false);  //Enable Save or Update button
							$(".overlay").remove();

					   }
					   });
				}
				return;
				//e.preventDefault


    }//Save end
	
	else if(this_id=="update")  //Save start
    {
				
					if(confirm("Do You Wants to Update Record ?")){
						e.preventDefault();
						data = new FormData($('#items-form')[0]);//form name3
						/*Check XSS Code*/
						if(!xss_validation(data)){ return false; }
						
						$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
						$("#"+this_id).attr('disabled',true);  //Enable Save or Update button
						$.ajax({
						type: 'POST',
						url: base_url+'items/update_items',
						data: data,
						cache: false,
						contentType: false,
						processData: false,
						success: function(result){
              //alert(result);return;
							if(result=="success")
							{
								window.location=base_url+'items';
							}
							else if(result=="failed")
							{
							   toastr["error"]("Sorry! Failed to save Record.Try again!");
							}
							else
							{
								  toastr["error"](result);
							}
							$("#"+this_id).attr('disabled',false);  //Enable Save or Update button
							$(".overlay").remove();
							return;
					   }
					   });
				}

				//e.preventDefault


    }//Save end
	

});


//On Enter Move the cursor to desigtation Id
function shift_cursor(kevent,target){

    if(kevent.keyCode==13){
		$("#"+target).focus();
    }
	
}

//update status start
function update_status(id,status)
{
	
	$.post("items/update_status",{id:id,status:status},function(result){
		if(result=="success")
				{
					 toastr["success"]("Status Updated Successfully!");
				  //alert("Status Updated Successfully!");
				  success.currentTime = 0; 
				  success.play();
				  if(status==0)
				  {
					  status="Inactive";
					  var span_class="label label-danger";
					  $("#span_"+id).attr('onclick','update_status('+id+',1)');
				  }
				  else{
					  status="Active";
					   var span_class="label label-success";
					   $("#span_"+id).attr('onclick','update_status('+id+',0)');
					  }

				  $("#span_"+id).attr('class',span_class);
				  $("#span_"+id).html(status);
				  return false;
				}
				else if(result=="failed"){
					toastr["error"]("Failed to Update Status.Try again!");
				  failed.currentTime = 0; 
				  failed.play();

				  return false;
				}
				else{
					toastr["error"](result);
				  failed.currentTime = 0; 
				  failed.play();
				  return false;
				}
	});
}
//update status end

//Delete Record start
function delete_items(q_id)
{
	
   if(confirm("Do You Wants to Delete Record ?")){
   	$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
    $.post($("#base_url").val()+"items/delete_items",{q_id:q_id},function(result){
   //alert(result);return;
	   if(result=="success")
				{
				  toastr["success"]("Record Deleted Successfully!");
				  $('#example2').DataTable().ajax.reload();
				}
				else if(result=="failed"){
				  toastr["error"]("Failed to Delete .Try again!");
				}
				else{
				   toastr["error"](result);
				}
				$(".overlay").remove();
				return false;
   });
   }//end confirmation
}
//Delete Record end
function multi_delete(){
	//var base_url=$("#base_url").val().trim();
    var this_id=this.id;
    
		if(confirm("Are you sure ?")){
			$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
			$("#"+this_id).attr('disabled',true);  //Enable Save or Update button
			
			data = new FormData($('#table_form')[0]);//form name
			$.ajax({
			type: 'POST',
			url: $("#base_url").val()+'items/multi_delete',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			success: function(result){
				result=result.trim();
  //alert(result);return;
				if(result=="success")
				{
					toastr["success"]("Record Deleted Successfully!");
					success.currentTime = 0; 
				  	success.play();
					$('#example2').DataTable().ajax.reload();
					$(".delete_btn").hide();
					$(".group_check").prop("checked",false).iCheck('update');
				}
				else if(result=="failed")
				{
				   toastr["error"]("Sorry! Failed to save Record.Try again!");
				   failed.currentTime = 0; 
				   failed.play();
				}
				else
				{
					toastr["error"](result);
					failed.currentTime = 0; 
				  	failed.play();
				}
				$("#"+this_id).attr('disabled',false);  //Enable Save or Update button
				$(".overlay").remove();
		   }
		   });
	}
	//e.preventDefault
}

//CALCULATED PURCHASE PRICE
function calculate_purchase_price(){
	var price = (isNaN(parseFloat($("#price").val().trim()))) ? 0 :parseFloat($("#price").val().trim()); 
	var tax = (isNaN(parseFloat($('option:selected', "#tax_id").attr('data-tax')))) ? 0 :parseFloat($('option:selected', "#tax_id").attr('data-tax')); 
	tax = parseFloat(tax);

	var tax_type = $("#tax_type").val();
	var purchase_price =parseFloat(0);
		price =parseFloat(price);

	console.log('tax='+tax);
	if(tax_type=='Inclusive'){
			purchase_price =price;
	}
	else{
		purchase_price = (price + (price*tax)/parseFloat(100));
	}
	//$("#purchase_price").val( (price + (price*tax)/parseFloat(100)).toFixed(decimals));
	
	$("#purchase_price").val(purchase_price.toFixed(0));
	//calculate_sales_price();

	//$("#purchase_price").val( (price + (price*tax)/parseFloat(100)).toFixed(0));
	//calculate_sales_price();
}
$("#price").keyup(function(event) {
	calculate_purchase_price();
	calculate_sales_price();
});
$("#tax_id").on("change",function(event) {
	calculate_purchase_price();
});

//CALCUALATED SALES PRICE
function calculate_sales_price(){
	var price = get_float_type_data("#price");
	var profit_margin = get_float_type_data("#profit_margin");

	var profit_amt = parseFloat((profit_margin/100) * price);

	var sales_price = price + profit_amt;

	$("#sales_price").val(sales_price.toFixed(0));
	//calculate_profit_margin();
	calculate_final_price();
}
$("#tax_type").on("change",function(event) {
	calculate_purchase_price();
	calculate_final_price();
});
$("#profit_margin").keyup(function(event) {
	calculate_sales_price();
});

//END
function calculate_final_price(){
	var tax_type = $("#tax_type").val();
	var sales_price = $("#sales_price").val();
	sales_price = parseFloat(sales_price);
	var tax = (isNaN(parseFloat($('option:selected', "#tax_id").attr('data-tax')))) ? 0 :parseFloat($('option:selected', "#tax_id").attr('data-tax')); 
	tax = parseFloat(tax);
	//console.log("tax_type="+tax_type);
	var tot = (tax_type=='Inclusive') ? 0 : calculate_exclusive(sales_price,tax);
	$("#final_price").val(parseFloat(sales_price) + parseFloat(tot));
}
//CALCULATE PROFIT MARGIN PERCENTAGE
function calculate_profit_margin(){
	var price = (isNaN(parseFloat($("#price").val().trim()))) ? 0 :parseFloat($("#price").val().trim()); 
	var sales_price = (isNaN(parseFloat($("#sales_price").val().trim()))) ? 0 :parseFloat($("#sales_price").val().trim()); 	
	var profit_margin = (sales_price-price);
	var profit_margin = (price>0) ? (profit_margin/price)*parseFloat(100) : profit_margin;
	$("#profit_margin").val(profit_margin.toFixed(0));
}
$("#sales_price").keyup(function(event) {
	calculate_profit_margin();
	calculate_final_price();
});
//END

function delete_stock_entry(entry_id){
 if(confirm("Do You Wants to Delete Record ?")){
    var base_url=$("#base_url").val().trim();
    $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
   $.post(base_url+"items/delete_stock_entry",{entry_id:entry_id,item_id:$("#q_id").val()},function(result){
   //alert(result);//return;
   result=result.trim();
     if(result=="success")
        { 
          location.reload(true);
        }
        else if(result=="failed"){
          toastr["error"]("Failed to Delete .Try again!");
          failed.currentTime = 0; 
          failed.play();
        }
        else{
          toastr["error"](result);
          failed.currentTime = 0; 
          failed.play();
        }
        $(".overlay").remove();
   });
   }//end confirmation   
  }