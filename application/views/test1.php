<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Autocomplete with Dynamic Data Load using PHP Ajax</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- <script type="text/javascript" src="typeahead.js"></script> -->
    <script src="http://localhost/ci-invento/theme/dist/js/typeahead.js"></script>  
	<style>
	
	</style>	
</head>
<body>
	<div class="bgcolor">
		<label class="demo-label">Search Country:</label><br/> 
		<input type="text" name="txtCountry" id="txtCountry" class="typeahead"/>
	</div>
</body>
<script>
    $(document).ready(function () {
        $('#txtCountry').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "http://localhost/ci-invento/dropdown/ajaxpro",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                    	console.log(data);
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>
</html>