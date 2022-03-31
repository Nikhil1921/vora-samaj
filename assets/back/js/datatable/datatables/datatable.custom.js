var url = $("#base_url").val();
var dataTableUrl = $("input[name='dataTableUrl']").val();

var table = $('.datatable').DataTable({
    "pagingType": "full_numbers",
    /*"lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    dom: 'Bfrtip',
    buttons: [
        'pageLength',
        {
            extend: 'print',
            footer: true,
            exportOptions: {
                columns: ':visible'
            },
        },
        {
            extend: 'csv',
            footer: true,
            exportOptions: {
                columns: ':visible'
            },
        },
        'colvis'
    ],
    columnDefs: [ {
        targets: -1,
        visible: false
    } ],*/
    "processing": true,
    "serverSide": true,
    'language': {
        'loadingRecords': '&nbsp;',
        'processing': 'Processing',
        'paginate': {
            'first': 'First',
            'next': '<i class="fa fa-arrow-circle-right"></i>',
            'previous': '<i class="fa fa-arrow-circle-left"></i>',
            'last': 'Last'
        }
    },
    "order": [],
    "ajax": {
        url: dataTableUrl,
        type: "GET",
        data: function(data) {
            data.kacheri = $("select[name='kacheri-change']").val();
        },
        complete: function(response) {},
    },
    "columnDefs": [{
        "targets": "target",
        "orderable": false,
    }, ]
});

$("select[name=kacheri-change]").change(() => {
  
});

function makeLive(id, is_live) {
    $.ajax({
        url: `${url}members/make-live`,
        type: "POST",
        data: { id: id, is_live: is_live },
        cache: false,
        dataType: "JSON",
        async: false,
        beforeSend: function () {
            $(".loader-wrapper").fadeIn();
        },
        complete: function () {
            $(".loader-wrapper").fadeOut();
        },
        success: function (result) {
            if(result.error === true) table.ajax.reload();
            flash_msg(
              result.error === true ? "Error" : "Success",
              result.message,
              result.error === true ? "danger" : "success"
            );
        },
        error: function (xhr, ajaxOptions, thrownError) {
            table.ajax.reload();
            flash_msg("Error", "Something is not going good. Try again.", "danger");
        },
    });
}