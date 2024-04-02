



//On Enter Move the cursor to desigtation Id
function shift_cursor(kevent, target) {

	if (kevent.keyCode == 13) {
		$("#" + target).focus();
	}

}

//update status start
function update_status(id, status) {

	$.post("update_status", { id: id, status: status }, function (result) {
		if (result == "success") {
			toastr["success"]("Status Updated Successfully!");
			//alert("Status Updated Successfully!");
			success.currentTime = 0;
			success.play();
			if (status == 0) {
				status = "Inactive";
				var span_class = "label label-danger";
				$("#span_" + id).attr('onclick', 'update_status(' + id + ',1)');
			}
			else {
				status = "Active";
				var span_class = "label label-success";
				$("#span_" + id).attr('onclick', 'update_status(' + id + ',0)');
			}

			$("#span_" + id).attr('class', span_class);
			$("#span_" + id).html(status);
			return false;
		}
		else if (result == "failed") {
			toastr["error"]("Failed to Update Status.Try again!");
			failed.currentTime = 0;
			failed.play();

			return false;
		}
		else {
			toastr["error"](result);
			failed.currentTime = 0;
			failed.play();
			return false;
		}
	});
}
//update status end


function update_step_get(id, status) {

	var base_url = $("#base_url").val().trim();
	var urlCall = base_url + "kitchen/update_step";
	var step = "PROCESS";
	var stepShow = "Đã nhận";

	if (status == 1) {
		step = "PROCESS";
	} else if (status == 0) {
		step = "INIT";
	}

	$.post(urlCall, { id: id, step: step }, function (result) {
		if (result == "success") {
			//toastr["success"]("Status Updated Successfully!");
			//alert("Status Updated Successfully!");
			success.currentTime = 0;
			success.play();
			if (step == 'INIT') {
				$("#span_" + id).attr('onclick', 'update_step_get(' + id + ',1)');
				$("#span_" + id).attr('class', "label label-danger");
				$("#span_" + id).html('Chưa nhận');

				$("#span2_" + id).html('');

			}
			else if (step == 'PROCESS') {
				var span_class = "label label-success";
				$("#span_" + id).attr('onclick', 'update_step_get(' + id + ',0)');
				$("#span_" + id).attr('class', span_class);
				$("#span_" + id).html('Đã nhận');


				$("#span2_" + id).attr('onclick', 'update_step_done(' + id + ',1)');
				$("#span2_" + id).attr('class', "label label-danger");
				$("#span2_" + id).html('Chưa xong');

			} else {

			}


			return false;
		}
		else if (result == "failed") {
			toastr["error"]("Failed to Update Status.Try again!");
			failed.currentTime = 0;
			failed.play();

			return false;
		}
		else {
			toastr["error"](result);
			failed.currentTime = 0;
			failed.play();
			return false;
		}
	});

}


function update_step_done(id, status) {

	var base_url = $("#base_url").val().trim();
	var urlCall = base_url + "kitchen/update_step";
	var step = "PROCESS";

	if (status == 1) {
		step = "DONE";
	} else if (status == 0) {
		step = "PROCESS";
	}

	$.post(urlCall, { id: id, step: step }, function (result) {
		if (result == "success") {
			//toastr["success"]("Status Updated Successfully!");
			//alert("Status Updated Successfully!");
			success.currentTime = 0;
			success.play();
			if (step == 'PROCESS') {
				$("#span2_" + id).attr('onclick', 'update_step_done(' + id + ',1)');
				$("#span2_" + id).attr('class', "label label-danger");
				$("#span2_" + id).html("Chưa xong");

				$("#span_" + id).attr('onclick', 'update_step_get(' + id + ',0)');
				$("#span_" + id).attr('class', "label label-success");
				$("#span_" + id).html('Đã nhận');
			}
			else {
				$("#span2_" + id).attr('onclick', 'update_step_done(' + id + ',0)');
				$("#span2_" + id).attr('class', "label label-success");
				$("#span2_" + id).html("Đã xong");

				//an di
				$("#span_" + id).html('');

			}

		
			return false;
		}
		else if (result == "failed") {
			toastr["error"]("Failed to Update Status.Try again!");
			failed.currentTime = 0;
			failed.play();

			return false;
		}
		else {
			toastr["error"](result);
			failed.currentTime = 0;
			failed.play();
			return false;
		}
	});

}

