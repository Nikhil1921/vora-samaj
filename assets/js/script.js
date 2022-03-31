"use strict"
const base_url = $("input[name=base_url]").val();

if ($("#login-form").length > 0) {
    $("#login-form").validate({
        rules: {
            mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits: true
            },
            otp: {
                required: true,
                minlength: 4,
                maxlength: 4,
                digits: true
            },
        },
        errorPlacement: function (error, element) {},
        submitHandler: function (form) {
            $.ajax({
                url: $(form).attr('action'),
                type: "POST",
                data: $(form).serialize(),
                dataType: "json",
                cache: false,
                async: false,
                success: function (result) {
                    if(result.status === 'success'){
                        $(form).attr("action", `${base_url}login`);
                        $(form).find("input[name=otp]").attr("disabled", false);
                        $(form).find(":submit").html("Login");
                    }
                    swalShow(result.status, result.message, result.redirect);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swalShow("error", "Something is not going good. Try again.");
                },
            });
        },
    });
}

const swalShow = (icon, title, redirect = null) => {
    Swal.fire({
        title: title,
        icon: icon,
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false,
    }).then(() => {
        if (redirect) {
            window.location.href = redirect;
        }
    });
};

if ($("input[name=error_msg]").val()) swalShow("error", $("input[name=error_msg]").val());
if ($("input[name=success_msg]").val()) swalShow("success", $("input[name=success_msg]").val());