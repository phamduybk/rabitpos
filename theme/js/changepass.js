
$("#save").on("click", function () {

    var currentpass = document.getElementById("current_pass").value.trim();
    var newpass = document.getElementById("pass").value.trim();
    var retypepass = document.getElementById("confirm").value.trim();
    //document.getElementById("change_pass_btn").disabled=true;
    if (currentpass == "") {
        toastr["warning"]("Enter Current Password!");
        document.getElementById("current_pass").focus();
        return;
    }
    if (newpass == "") {
        toastr["warning"]("Please Enter New Password!");
        $("#pass").focus();
        return;
    }
    if (retypepass == "") {
        toastr["warning"]("Please Confirm Password!");
        $("#confirm").focus();
        return;
    }
    if (newpass != retypepass) {
        toastr["error"]("Password Mismatch!");
        document.getElementById("pass").focus();

        //document.getElementById("change_pass_btn").disabled=false;
        return;
    }
    else {

        if (confirm("Are you Sure ?")) {
            /*Check XSS Code*/
            if (!xss_validation(currentpass)) { return false; }
            if (!xss_validation(newpass)) { return false; }

            //Send data form to php
            $.post("password_update", { currentpass: currentpass, newpass: newpass }, function (result) {

                if (result == "success") {
                    toastr["success"]("Password Updated Successfully!");
                    $("#current_pass,#pass,#confirm").val('');
                    success.play();
                    return false;
                }
                else if (result == "failed") {
                    toastr["error"]("Password Not Updated.Try again!");
                    failed.play();
                    return false;
                }
                else {
                    toastr["error"](result);
                    failed.play();
                    return false;
                }

            });
        }

    }
});


//On Enter Move the cursor to desigtation Id
function shift_cursor(kevent, target) {

    if (kevent.keyCode == 13) {
        $("#" + target).focus();
    }

}