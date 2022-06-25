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
                    /* if(result.status === 'success'){
                        $(form).attr("action", `${base_url}login`);
                        $(form).find("input[name=otp]").attr("disabled", false);
                        $(form).find(":submit").html("Login");
                    } */
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

if($('.tree').length > 0)
{
    var originalUl = document.getElementsByClassName("tree")[0].firstElementChild;
    
    const getParent = (parent_id) => {
        $.ajax({
            url: `${base_url}members/getParent`,
            type: 'get',
            data: { parent_id: parent_id },
            dataType: 'json',
            cache: false,
            async: false,
            success: function(result) {
                if(result){
                    let newUl = document.createElement("ul");
                    let newLi = document.createElement("li");
                    let anchor = document.createElement("a");
                    anchor.href = "javascript:;";
                    anchor.innerHTML = result.name;
                    newLi.appendChild(anchor);
                    newLi.appendChild(originalUl);
                    newUl.appendChild(newLi);
                    originalUl = newUl;
                    
                    if(result.parent_id !== 0)
                        getParent(result.parent_id);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                swalShow("error", "Something is not going good. Try again.");
            }
        });
    };
    
    getParent($(".tree").data("parent"));
    
    $(".tree").html(originalUl);
}

function printDiv(){
        var contents = $("#card").html();
        contents = contents.replace('<button onclick="printDiv()">Download</button>', "");
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title></title>');
        frameDoc.document.write('</head><body>');
        //Append the external CSS file.
        frameDoc.document.write('<link href="'+base_url+'assets/css/style.css" rel="stylesheet" type="text/css" />');
        //Append the DIV contents.
        frameDoc.document.write(contents);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
}

const copyAddress = (checkBox) => {
    if ($(checkBox).is(":checked") === true) {
        $("#cur_house_no").val($("#res_house_no").val());
        $("#cur_building_name").val($("#res_building_name").val());
        $("#cur_area").val($("#res_area").val());
        $("#cur_address1").val($("#res_address1").val());
        $("#cur_address2").val($("#res_address2").val());
        $("#cur_country").val($("#res_country").val());
        $("#cur_country").trigger("change");
        $("#cur_state").val($("#res_state").val());
        $("#cur_city").val($("#res_city").val());
    } else return;
};

const getForgotForm = () => {
    $.ajax({
        url: `${base_url}forgot`,
        type: 'get',
        success: function(result) {
            $("#forms").html(result);
            $("#passwordModal").modal();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            swalShow("error", "Something is not going good. Try again.");
        }
    });
};

const formSubmit = (form) => {
    
    $.ajax({
        url: $(form).attr('action'),
        type: $(form).attr('method'),
        data: $(form).serialize(),
        dataType: 'json',
        cache: false,
        async: false,
        success: function(result) {
            if (result.status === false)
                $(`#error-messages`).html(result.message);
            else
                getForgotForm();
                return true;
        },
        error: function(xhr, ajaxOptions, thrownError) {
            swalShow("error", "Something is not going good. Try again.");
        }
    });

    return true;
};

$(document).on("submit", "#forgot-form", (e) => {
    e.preventDefault();

    formSubmit(document.getElementById("forgot-form"));
});