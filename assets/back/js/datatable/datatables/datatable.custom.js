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
  table.ajax.reload();
});