$("#view,#view_all").on("click",function(){
	
    var to_date=document.getElementById("to_date").value.trim();
    var item_id=document.getElementById("item_id").value.trim();
  	 
  	 if(to_date == "")
        {
            toastr["warning"]("Select To Date!");
            document.getElementById("to_date").focus();
            return;
        }
	  
	      if(this.id=="view_all"){
          var view_all='yes';
        }
        else{
          var view_all='no';
        }
      	   
        $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        $.post("show_expired_items_report",{item_id:item_id,view_all:view_all,to_date:to_date},function(result){
          //alert(result);
            setTimeout(function() {
             $("#tbodyid").empty().append(result);     
             $(".overlay").remove();
            }, 0);
           }); 
     
	
});

