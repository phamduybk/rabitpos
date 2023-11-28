$('#update').on("click",function (e) {

	var base_url=$("#base_url").val().trim();
    /*Initially flag set true*/
    var flag=true;

    function check_field(id)
    {

      if(!$("#"+id).val().trim() ) //Also check Others????
        {

            $('#'+id+'_msg').fadeIn(200).show().html('Required Field').addClass('required');
            $('#'+id).css({'background-color' : '#E8E2E9'});
            flag=false;
        }
        else
        {
             $('#'+id+'_msg').fadeOut(200).hide();
             $('#'+id).css({'background-color' : '#FFFFFF'});    //White color
        }
    }


    //Validate Input box or selection box should not be blank or empty
	check_field("site_name");
	check_field("currency");
	
	check_field("category_init");
	check_field("item_init");
	check_field("supplier_init");
	check_field("purchase_init");
	check_field("customer_init");
	check_field("sales_init");
	check_field("expense_init");
	
	if(flag==false)
    {
		toastr["warning"]("You have Missed Something to Fillup!")
		return;
    }

    var this_id=this.id;
			if(confirm("Do you wants to update ?")){
				e.preventDefault();
				data = new FormData($('#site-form')[0]);//form name
				/*Check XSS Code*/
				if(!xss_validation(data)){ return false; }
				
				$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
				$("#"+this_id).attr('disabled',true);  //Enable Save or Update button
				$.ajax({
				type: 'POST',
				url: base_url+'site/update_site',
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				success: function(result){
      //alert(result);//return;
					if(result=="success")
					{
						toastr["success"]("Record Updated Successfully!");
						success.currentTime = 0; 
				  		success.play();
				  		location.reload();
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
					return;
			   }
			   });
		}

				//e.preventDefault


    
	

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
	
	$.post("suppliers/update_status",{id:id,status:status},function(result){
		if(result=="success")
				{
				  toastr["success"]("Record Updated Successfully!");
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
				  return false;
				}
				else{
				  toastr["error"]("Error! Something Went Wrong!");
				  return false;
				}
	});
}
//update status end


//Delete Record start
function delete_suppliers(q_id)
{
	
   if(confirm("Do You Wants to Delete Record ?")){
   	$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
   $.post("suppliers/delete_suppliers",{q_id:q_id},function(result){
   //alert(result);return;
	   if(result=="success")
				{
				  toastr["success"]("Record Deleted Successfully!");
				  $('#example1').DataTable().ajax.reload();
				}
				else if(result=="failed"){
				  toastr["error"]("Failed to Delete .Try again!");
				}
				else{
				  toastr["error"]("Error! Something Went Wrong!");
				}
				$(".overlay").remove();
				return false;
   });
   }//end confirmation
}
//Delete Record end
