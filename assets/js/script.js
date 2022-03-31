"use strict"
const base_url = $("input[name=base_url]").val();
const getOtp = (mobile) => {
    if (mobile.value.length === 10) {
        $(mobile).attr('readonly', true);
        $.ajax({
            url: `${base_url}send-sms`,
            type: "POST",
            data: {mobile: mobile.value},
            dataType: "json",
            cache:false,
            async:false,
            success: function (result) {
                
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $(mobile).attr("readonly", false);
                alert("Something is not going good. Try again.");
            },
        })
    }else{
        $(mobile).attr("readonly", false);
    }
};