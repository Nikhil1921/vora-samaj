"use strict"
const base_url = $("input[name=base_url]").val();

if ($("#login-form").length > 0) {
    $("#login-form").validate({
        rules: {
            mobile: {
                required: true,
                minlength: 10,
                maxlength: 100
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

const getStates = (select) => {
    getItems(select, "state");
    let dependent = $(select).data("dependent");
    if ($("#" + dependent).data('dependent')) getCities(document.getElementById(dependent));
    return;
};

const getCities = (select) => {
    getItems(select, "city");
};

const getItems = (select, get) => {
    let options = `<option value="" disabled selected>Select ${get}</option>`;
    let selected = $(select).data("value");
    let dependent = $(select).data("dependent");
    
    if(select.value)
    {
        $.ajax({
            url: `${base_url}get-${get}`,
            type: 'get',
            data: { id: select.value },
            dataType: 'json',
            cache: false,
            async: false,
            success: function(result) {
                for (let k in result)
                    options += `<option ${result[k].id == selected ? 'selected' : ''} value="${result[k].id}">${result[k].name}</option>`;
            },
            error: function(xhr, ajaxOptions, thrownError) {
                swalShow("error", "Something is not going good. Try again.");
            }
        });
    }
    $("#" + dependent).html(options);
    return;
};

if($('.country').length > 0)
{
    $(".country").each(function (index) {
        getStates(this);
    });
}