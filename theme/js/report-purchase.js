$("#view,#view_all").on("click",function(){
	
	
    var from_date=document.getElementById("from_date").value.trim();
    var to_date=document.getElementById("to_date").value.trim();
    var supplier_id=document.getElementById("supplier_id").value.trim();
    var payment_status=document.getElementById("payment_status").value.trim();
  
	if(from_date == "")
      {
          toastr["warning"]("Select From Date!");
          document.getElementById("from_date").focus();
          return;
      }
	 
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
        $.post("show_purchase_report",{payment_status:payment_status,supplier_id:supplier_id,view_all:view_all,from_date:from_date,to_date:to_date},function(result){
          //alert(result);
            setTimeout(function() {
             $("#tbodyid").empty().append(result);     
             $(".overlay").remove();
            }, 0);
           }); 
      
	
});

