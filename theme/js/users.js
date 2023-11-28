/*Email validation code*/
function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}
$("#save,#update").on("click",function(e){
      var base_url=$("#base_url").val().trim();
      var flag=true;
      var this_id=this.id;
      var new_user=document.getElementById("new_user").value.trim();
      var newpass=document.getElementById("pass").value.trim();
      var retypepass=document.getElementById("confirm").value.trim();
      var mobile=document.getElementById("mobile").value.trim();
      var email=document.getElementById("email").value.trim();
      var q_id=document.getElementById("q_id").value.trim();
      var role_id=document.getElementById("role_id").value.trim();
      
      
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
      check_field("new_user");
      check_field("mobile");
      check_field("email");
      check_field("role_id");

      if(this_id=='save'){
        check_field("pass");
        check_field("confirm");
        if(newpass!='' && (newpass!=retypepass))
        {
           toastr["warning"]("Warning! Password Mismatched!");
           return;
        }
      }

      if(this_id=='update'){
        if(newpass!=''){
            if(newpass!=retypepass){
                toastr["warning"]("Warning! Password Mismatched!");
                return;
            }
        } 
      }
      
      
      if(flag==false)
      {
      toastr["warning"]("You have Missed Something to Fillup!")
      return;
      }

      if (email!='' && !validateEmail(email)) {
          $("#email_msg").html("Invalid Email!").show();
          toastr["warning"]("Invalid Email!")
          return false;
      }
      

      if(confirm("Do you wants to update ?")){
        e.preventDefault();
        data = new FormData($('#users-form')[0]);//form name
        /*Check XSS Code*/
        if(!xss_validation(data)){ return false; }
        
        $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        $("#"+this_id).attr('disabled',true);  //Enable Save or Update button
        $.ajax({
        type: 'POST',
        url: base_url+'users/save_or_update',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
      //alert(result);//return;
          if(result=="success")
          {
            window.location=base_url+"users/view";
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
      

        /*if(confirm("Are you sure ?")){
          
          if(!xss_validation(new_user)){ return false; }
          if(!xss_validation(newpass)){ return false; }
          if(!xss_validation(email)){ return false; }
          if(!xss_validation(mobile)){ return false; }
            
          $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            $("#"+this_id).attr('disabled',true);  //Enable Save or Update button
          //Send data form to php
         $.post(base_url+"users/save_or_update",{command:this_id,q_id:q_id,new_user:new_user,newpass:newpass,email:email,mobile:mobile,role_id:role_id},function(result){
			   result=result.trim();
            if(result=="success"){
                window.location=base_url+"users/view";
            }
            else if(result=="failed") {
                toastr["error"]("Sorry! Failed to create New User.Try again!");
            }
            else
            {
                toastr["error"](result);
            }
            $("#"+this_id).attr('disabled',false);  //Enable Save or Update button
            $(".overlay").remove();
        });
       }//confirm()*/
      
});


//On Enter Move the cursor to desigtation Id
function shift_cursor(kevent,target){

    if(kevent.keyCode==13){
		$("#"+target).focus();
    }
	
}


//Active-Inactive the status
function update_status(id,status)
{
    $.post("status_update",{id:id,status:status},function(result){
//alert(result);return;
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

//Delete Record start
function delete_user(q_id)
{
  
   if(confirm("Are you sure ?")){
    $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
   $.post("delete_user",{q_id:q_id},function(result){
   //alert(result);return;
     if(result=="success")
        {
          //toastr["success"]("Record Deleted Successfully!");
          //$('#example2').DataTable().ajax.reload();
          location.reload();
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