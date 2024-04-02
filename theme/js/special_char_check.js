//Special character check  start
//Allow A-z and 1-0
	$('.no_special').keyup(function()
	{
		var yourInput = $(this).val();
		re = /[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(yourInput);
		if(isSplChar)
		{
			var no_spl_char = yourInput.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
		}
	});
//Special character check End

//Allow A-z and 1-0 and No_space
	$('.no_special_no_space').keyup(function()
	{
		var yourInput = $(this).val();
		re = /[`~!@#$%^&*()_|+\-=?;:'",. <>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(yourInput);
		if(isSplChar)
		{
			var no_spl_char = yourInput.replace(/[`~!@#$%^&*()_|+\-=?;:'",. <>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
		}
	});
//Special character check End

//Special character check  start
//Allow A-z
	$('.no_special_and_num').keyup(function()
	{
		var yourInput = $(this).val();
		re = /[`~!@#$%^&*()_|+\-=?;:'",.1234567890<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(yourInput);
		if(isSplChar)
		{
			var no_spl_char = yourInput.replace(/[`~!@#$%^&*()_|+\-=?;:'",.1234567890<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
		}
	});
//Special character check End

//Special character check  start
//Allow 1-0 and space
	$('.no_special_char').keyup(function()
	{
		var yourInput = $(this).val();
		re = /[`~!@#$%^&*()_|+\-=?;:'",.A-z<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(yourInput);
		if(isSplChar)
		{
			var no_spl_char = yourInput.replace(/[`~!@#$%^&*()_|+\-=?;:'",.A-z<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
		}
	});
//Special character check End

//Special character check  start
//allow 1-0
	$('.no_special_char_no_space').keyup(function()
	{
		var yourInput = $(this).val();
		re = /[`~!@#$%^&*()_|+\-=?;:'",.A-z<>\{\} \[\]\\\/]/gi;
		var isSplChar = re.test(yourInput);
		if(isSplChar)
		{
			var no_spl_char = yourInput.replace(/[`~!@#$%^&*()_|+\-=?;:'",.A-z<>\{\} \[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
		}
	});
//Special character check End
//Special character check  start
//allow 1-0 and dot-- for Currency
	$('.only_currency').keyup(function()
	{
		var yourInput = $(this).val();
		re = /[`~!@#$%^&*()_|+\-=?;:'",A-z<>\{\} \[\]\\\/]/gi;
		var isSplChar = re.test(yourInput);
		if(isSplChar)
		{
			var no_spl_char = yourInput.replace(/[`~!@#$%^&*()_|+\-=?;:'",A-z<>\{\} \[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
		}
	});

	$('.only_currency_show').keyup(function()
	{
		var inputValue = $(this).val();

		// Kiểm tra nếu giá trị không trống
		if (inputValue.trim() !== '') {
			// Xóa tất cả ký tự không phải số và dấu chấm
			var sanitizedValue = inputValue.replace(/[^0-9.]/g, '');
	
			// Định dạng số với dấu phẩy
			var formattedValue = parseFloat(sanitizedValue).toLocaleString('en-US', {maximumFractionDigits: 0});
	
			// Cập nhật giá trị trong trường input
			$(this).val(formattedValue);
		}
	});
//Special character check End