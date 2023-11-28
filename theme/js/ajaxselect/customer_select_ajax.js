//var selectionBoxId = $('#customer_id');

var base_url = $("#base_url").val();

var url_ = base_url+"customers/getCustomers/";

var searchFor = "Search Name/Mobile";

$(document).ready(function(){

         let init_customer_select2 = (typeof load_customer_select2 === 'function') ? load_customer_select2() : true;

         //If don't want to initiate customer select2 selection box
         if(init_customer_select2 == false){
            return true;
         }

         var selectionBoxId = $(getCustomerSelectionId());

         selectionBoxId.select2({
            allowClear: true,
            ajax: {
                  url: url_,
                  type: "post",
                  dataType: 'json',
                  delay: 250,
                  data: function (params) {
                     return {
                           searchTerm: params.term, // search term
                     };
                  },
                  processResults: function (response) {

                  return {
                     results: response
                  };

                  },
                  cache: false
            },
              placeholder: searchFor,
              minimumInputLength: 0,
              templateResult: formatRepo ,
              templateSelection: formatRepoSelection,
              current : testFun,

         });

         function testFun(element, callback){
            var data = [];
             $(element.val()).each(function () {
               data.push({id: this, text: this});

             });
             callback(data);

         }

         //After selection event
         selectionBoxId.on('select2:select', function(e) {
            if(e.params!=undefined){
                  var selectedOption = e.params.data;
                  // Customize behavior when an option is selected
                  previous_due = selectedOption.previous_due;

                  tot_advance = selectedOption.tot_advance;


            }
           });



         //Searching data format
         function formatRepo (repo){

            if (repo.loading) {
               return repo.text;
            }

            return (repo.mobile!='' && repo.mobile!=null) ? repo.text +" - "+ repo.mobile : repo.text;
         }

         //Selected data view
         function formatRepoSelection (repo) {

             //$(repo.element).attr("data-mobile", repo.mobile);

              return repo.text;// + " - "+ repo.mobile;
         }
         

});//ready


function autoLoadFirstCustomer(customer_id='') {

      var selectionBoxId = $(getCustomerSelectionId());

      $.ajax({
          type: 'POST',
          url: url_+customer_id,
          dataType: 'json',
          delay: 250,
          async: false, // Make the request synchronous
          
      }).then(function (serverResponse) {

         $.each(serverResponse, function(index, customer) {

            if(index == 0){
               
                  /**
                   * Pre-Selection of Customer
                   * create the option and append to Select2
                   * */
                   var option = new Option(customer.text, customer.id, true, true);
                   selectionBoxId.append(option).trigger('change');

                   // manually trigger the `select2:select` event
                   selectionBoxId.trigger({
                       type: 'select2:select',
                       params: {
                           data: serverResponse
                       }
                   });

          
            }//if

        });//each

      });//then
}