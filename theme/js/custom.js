/*Check XSS Code*/
function xss_validation(data) {
	if(typeof data=='object'){
		for (var value of data.values()) {
		   if(typeof value!='object' && (value.trim()!='' && value.indexOf("<script>") != -1)){
		   	toastr["error"]("Failed!! to Continue! XSS Code found as Input!");
		   	return false;
		   }
		}
		return true;
	}
	else{
		if(typeof value!='object' && (data.trim()!='' && data.indexOf("<script>") != -1)){
		   	toastr["error"]("Failed!! to Continue! XSS Code found as Input!");
		   	return false;
		}
		return true;
	}
}
//end
function calculate_inclusive(amount,tax){
	amount = parseFloat(amount);
	tax = parseFloat(tax);
 	return (amount * tax / (100+ tax)).toFixed(0);//By tally
}
function calculate_exclusive(amount,tax){
	amount = parseFloat(amount);
	tax = parseFloat(tax);
	return ((amount*tax)/parseFloat(100)).toFixed(0);
}
function app_number_format(num=0){
	return num.toLocaleString('en-US', {minimumFractionDigits: 1, maximumFractionDigits: 2});
}
function get_float_type_data(location=''){
  var res = $(location).val();
  return (isNaN(parseFloat(res))) ? parseFloat(0) : parseFloat(res);
 }