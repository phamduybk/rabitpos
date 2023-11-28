//var selectionBoxIdOfItem = $('#item_id');

var base_url = $("#base_url").val();

var url_of_item = base_url+"items/getItems/";

var searchForItem = "Search Name/Code";

$(document).ready(function(){

         let init_item_select2 = (typeof load_item_select2 === 'function') ? load_item_select2() : true;

         //If don't want to initiate item select2 selection box
         if(init_item_select2 == false){
            return true;
         }

         var selectionBoxIdOfItem = $(getItemSelectionId());

         

         selectionBoxIdOfItem.select2({
            allowClear: true,
            ajax: {
                  url: url_of_item,
                  type: "post",
                  dataType: 'json',
                  delay: 250,
                  data: function (params) {
                     return {
                           searchTerm: params.term, // search term
                           store_id:$("#store_id").val(),
                           item_type: getItemType(),
                           category_id: getCategoryId(),
                     };
                  },
                  processResults: function (response) {

                  return {
                     results: response
                  };

                  },
                  cache: false
            },
              placeholder: searchForItem,
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

         //Searching data format
         function formatRepo (repo){

            if (repo.loading) {
               return repo.text;
            }

            return repo.text + " - "+ repo.item_code;
         }

         //Selected data view
         function formatRepoSelection (repo) {

             //$(repo.element).attr("data-mobile", repo.mobile);

              return repo.text;// + " - "+ repo.mobile;
         }
         

});//ready

function getItemType(){
   if($("#item_type")){
      return $("#item_type").val();
   }
   return "";
}
function getCategoryId(){
   if($("#category_id")){
      return $("#category_id").val();
   }
   return "";
}

function autoLoadFirstItem(item_id='') {

      var selectionBoxIdOfItem = $(getItemSelectionId());

      $.ajax({
          type: 'POST',
          url: url_of_item+item_id,
          dataType: 'json',
          delay: 250,
          async: false, // Make the request synchronous
          data:{
            store_id : $("#store_id").val(),
            item_type: getItemType(),
            category_id: getCategoryId(),
          },
          
      }).then(function (serverResponse) {

         //Avoid Pre Selection
         selectionBoxIdOfItem.empty();

         $.each(serverResponse, function(index, item) {


            /**
                   * Pre-Selection of Item
                   * create the option and append to Select2
                   * */
            if(index == 0){
               
                  
                  // var option = new Option(item.text, item.id, true, true);
                  // selectionBoxIdOfItem.append(option).trigger('change');

                   // manually trigger the `select2:select` event
                  /* selectionBoxIdOfItem.trigger({
                       type: 'select2:select',
                       params: {
                           data: serverResponse
                       }
                   });*/


          
            }//if

        });//each


      });//then
}