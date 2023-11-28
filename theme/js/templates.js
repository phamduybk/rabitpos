
$('#save,#update').on("click",function (e) {
	var base_url=$("#base_url").val().trim();
    //Initially flag set true
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
	check_field("template_name");	
	check_field("content");	

	
    if(flag==false)
    {

		toastr["warning"]("You have Missed Something to Fillup!")
		return;
    }

    var this_id=this.id;

    if(this_id=="save")  //Save start
    {
					swal({ title: "Are you sure?",icon: "warning",buttons: true,dangerMode: true,}).then((sure) => 
					{
					  if(sure) {//confirmation start
						$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
						$("#"+this_id).attr('disabled',true);  //Enable Save or Update button
						e.preventDefault();
						data = new FormData($('#template-form')[0]);//form name
						$.ajax({
						type: 'POST',
						url: base_url+'templates/newtemplate',
						data: data,
						cache: false,
						contentType: false,
						processData: false,
						success: function(result){
             // alert(result);return;
							if(result=="success")
							{
								//alert("Record Saved Successfully!");
								window.location=base_url+"templates/sms";
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
				} //confirmation sure
				}); //confirmation end

				//e.preventDefault


    }//Save end
	
	else if(this_id=="update")  //Save start
    {
				

					swal({ title: "Are you sure?",icon: "warning",buttons: true,dangerMode: true,}).then((sure) => 
					{
					  if(sure) {//confirmation start
						$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
						$("#"+this_id).attr('disabled',true);  //Enable Save or Update button
						e.preventDefault();
						data = new FormData($('#template-form')[0]);//form name
						$.ajax({
						type: 'POST',
						url: base_url+'templates/update_template',
						data: data,
						cache: false,
						contentType: false,
						processData: false,
						success: function(result){
              //alert(result);return;
							if(result=="success")
							{
								//toastr["success"]("Record Updated Successfully!");
								window.location=base_url+"templates/sms";
							}
							else if(result=="failed")
							{
								toastr["error"]("Sorry! Failed to save Record.Try again!");
							   //alert("Sorry! Failed to save Record.Try again");
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
				} //confirmation sure
				}); //confirmation end

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
	
	$.post("update_status",{id:id,status:status},function(result){
		if(result=="success")
				{
					 toastr["success"]("Status Updated Successfully!");
				  //alert("Status Updated Successfully!");
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
				  //alert("Failed to Update Status.Try again");
				  return false;
				}
				else{
					toastr["error"](result);
				  //alert("Error! Something Went Wrong!");
				  return false;
				}
	});
}
//update status end

//Delete Record start
function delete_template(q_id)
{
	
   swal({ title: "Are you sure?",icon: "warning",buttons: true,dangerMode: true,}).then((sure) => {
  	if(sure) {//confirmation start
   	$(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
   $.post("delete_template",{q_id:q_id},function(result){
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
   } //confirmation sure
  }); //confirmation end
}
//Delete Record end

