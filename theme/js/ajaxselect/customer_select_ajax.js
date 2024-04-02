//var selectionBoxId = $('#customer_id');

var base_url = $("#base_url").val();

var url_ = base_url + "customers/getCustomers/";

var searchFor = "Search Name/Mobile";

$(document).ready(function () {

   let init_customer_select2 = (typeof load_customer_select2 === 'function') ? load_customer_select2() : true;

   //If don't want to initiate customer select2 selection box
   if (init_customer_select2 == false) {
      return true;
   }

   var selectionBoxId = $(getCustomerSelectionId());



   selectionBoxId.select2({
      allowClear: true,
      ajax: {
         url: url_,
         type: "post",
         dataType: 'json',
         delay: 1000,
         data: function (params) {

            var type_id = $("#type_id_select").val();

            return {
               searchTerm: params.term, // search term
               type_id: type_id
            };
         },
         processResults: function (response) {

            return {
               results: response
            };
            rmatRepo
         },
         cache: false
      },
      placeholder: searchFor,
      minimumInputLength: 0,
      templateResult: formatRepo,
      templateSelection: formatRepoSelection,
      current: testFun,

   });

   function testFun(element, callback) {
      var data = [];
      $(element.val()).each(function () {

         data.push({ id: this, text: this });
      });
      callback(data);

   }

   //After selection event
   selectionBoxId.on('select2:select', function (e) {
      if (e.params != undefined) {
         var selectedOption = e.params.data;

         console.log("selectionBoxId=======" + JSON.stringify(selectedOption));
         capnhapGiaChoBang(selectedOption);
         updateAllData(); 

      }
   });



   //Searching data format
   function formatRepo(repo) {

      if (repo.loading) {
         return repo.text;
      }

      if ((repo.mobile != '' && repo.mobile != null)) {
         if (repo.type_name != null && repo.type_name != '') {
            return repo.text + " - " + repo.mobile + " - " + repo.type_name;
         } else {
            return repo.text + " - " + repo.mobile;
         }
      } else {
         return repo.text;
      }
   }

   //Selected data view
   var count = 0;

});//ready

function formatRepoSelection(repo) {

   if (repo.loading) {
      return repo.text;
   }

   if ((repo.mobile != '' && repo.mobile != null)) {
      if (repo.type_name != null && repo.type_name != '') {
         var sodu = parseFloat(repo.sales_due).toFixed(0) > 0 ? 'Tài khoản nợ: ' + parseFloat(repo.sales_due).toFixed(0) : 'Số dư :' + parseFloat(-repo.sales_due).toFixed(0);
         return repo.text + " - " + repo.mobile + " - " + repo.type_name;
      } else {
         return repo.text + " - " + repo.mobile;
      }
   } else {
      return repo.text;
   }

}

function updateAllData() {
   /*  var table = document.getElementById("pos-form-tbody");
    var rowCount = table.getElementsByTagName("tr").length; */
   var rowCount = $("#hidden_rowcount").val();

   var price_type = $('#price_type').val();
   var item_discount_input = $("#discount_check").val();
   var item_discount_type = $("#discount_type_check").val();

   item_discount_input = (isNaN(item_discount_input)) ? parseFloat(0) : item_discount_input;

   for (var row_id = 0; row_id < rowCount; row_id++) {


      var price = parseFloat($("#purchase_price_" + row_id).val()).toFixed(0);

      if (price_type == '1') {
         price = parseFloat($("#good_price_" + row_id).val()).toFixed(0);
      }
      $("#sales_price_" + row_id).val(price);

      if (item_discount_input > 0) {
         //item_discount
         $("#item_discount_input_" + row_id).val(item_discount_input);
         $("#item_discount_type_" + row_id).val(item_discount_type);
      } else {
         //tra ve gia trị ban đầu
         $("#item_discount_input_" + row_id).val($("#item_discount_input_first_" + row_id).val());
         $("#item_discount_type_" + row_id).val($("#item_discount_type_first_" + row_id).val());
      }

      var item_id = $("#tr_item_id_" + row_id).val();
      make_subtotal(item_id, row_id);
   }
}


function autoLoadFirstCustomer(customer_id = '') {

   var selectionBoxId = $(getCustomerSelectionId());

   $.ajax({
      type: 'POST',
      url: url_ + customer_id,
      dataType: 'json',
      delay: 250,
      async: false, // Make the request synchronous

   }).then(function (serverResponse) {

      $.each(serverResponse, function (index, customer) {

         if (index == 0) {

            /**
             * Pre-Selection of Customer
             * create the option and append to Select2
             * */
            //  var option = new Option(customer.text, customer.id, true, true);

            console.log('customer='+JSON.stringify(customer));

            capnhapGiaChoBang(customer);
            updateAllData();

            var option = new Option(formatRepoSelection(customer), customer.id, true, true);
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

function capnhapGiaChoBang(repo) {
   if (repo.text != '' && repo.text != null)
      console.log("capnhapGiaChoBang=======" + repo.text);

   if ((repo.percent_decrease != '' && repo.percent_decrease != null)) {
      $('#percent_decrease').val(repo.percent_decrease);
   } else {
      $('#percent_decrease').val('0');
   }
   if ((repo.price_type != '' && repo.price_type != null)) {
      $('#price_type').val(repo.price_type);
   } else {
      $('#price_type').val('0');
   }

   if ((repo.discount_type != '' && repo.discount_type != null)) {
      $("#discount_type_check").val(repo.discount_type);
   }

   if ((repo.discount != '' && repo.discount != null)) {
      $("#discount_check").val(repo.discount);
   } else {
      $("#discount_check").val('0');
   }


   if ((repo.mobile != '' && repo.mobile != null)) {
      if (repo.type_name != null && repo.type_name != '') {
         if (repo.sales_due != null && repo.sales_due != '') {
            var sodu = parseFloat(repo.sales_due).toFixed(0) > 0 ? 'Tài khoản nợ: ' + parseFloat(repo.sales_due).toFixed(0) : 'Số dư :' + parseFloat(-repo.sales_due).toFixed(0);
            $('#customer_view').val(repo.text + " - " + repo.mobile + "\n" + "Loại khách hàng: " + repo.type_name + "\n" + sodu);
         } else {
            $('#customer_view').val(repo.text + " - " + repo.mobile + "\n" + "Loại khách hàng: " + repo.type_name );
         }
      } else {
         $('#customer_view').val(repo.text + " - " + repo.mobile);
      }
   } else {
      $('#customer_view').val(repo.text);
   }
}