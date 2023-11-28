
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
	check_field("country_name");
	//check_field("description");
    
	
    if(flag==false)
    {
		toastr["warning"]("You have Missed Something to Fillup!")
		return;
    }

    var this_id=this.id;

    if(this_id=="save")  //Save start
    {


					if(confirm("Do You Wants to Save Record ?")){
						e.preventDefault();
						data = new FormData($('#country-form')[0]);//form name
						/*Check XSS Code*/
						if(!xss_validation(data)){ return false; }
						
						$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
						$("#"+this_id).attr('disabled',true);  //Enable Save or Update button
						$.ajax({
						type: 'POST',
						url: base_url+'country/newcountry',
						data: data,
						cache: false,
						contentType: false,
						processData: false,
						success: function(result){
						//alert(result);
							if(result=="success")
							{
								//alert("Record Saved Successfully!");
								window.location=base_url+"country";
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
							return;
					   }
					   });
				}

				//e.preventDefault


    }//Save end
	else if(this_id=="update"){  //update start

					if(confirm("Do You Wants to Update Record ?")){
						e.preventDefault();
						data = new FormData($('#country-form')[0]);//form name
						/*Check XSS Code*/
						if(!xss_validation(data)){ return false; }
						
						$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
						$("#"+this_id).attr('disabled',true);  //Enable Save or Update button
						$.ajax({
						type: 'POST',
						url: base_url+'country/update_country',
						data: data,
						cache: false,
						contentType: false,
						processData: false,
						success: function(result){
             				//alert(result);
							if(result=="success")
							{
								//toastr["success"]("Record Updated Successfully!");
								window.location=base_url+"country";
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

	} //update end

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
	$.post("country/update_status",{id:id,status:status},function(result){
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
function delete_country(q_id)
{
   if(confirm("Do You Wants to Delete Record ?")){
   	$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
   $.post("country/delete_country",{q_id:q_id},function(result){
   //alert(result);return;
	   if(result=="success")
				{
				  toastr["success"]("Record Deleted Successfully!");
				  $('#example2').DataTable().ajax.reload();
				  success.currentTime = 0; 
				  success.play();
				}
				else if(result=="failed"){
				  toastr["error"]("Failed to Delete .Try again!");
				  failed.currentTime = 0; 
				  failed.play();
				}
				else{
				   toastr["error"]("Error! Something Went Wrong!");
				   failed.currentTime = 0; 
				  failed.play();
				}
				$(".overlay").remove();
				return false;
   });
   }//end confirmation
}
//Delete Record end