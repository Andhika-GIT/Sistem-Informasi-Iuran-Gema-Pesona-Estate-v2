<script>
    $(document).ready(function() {
        $('#tb').DataTable({
            dom: 'Bfrtip',
            lengthChange: false,
            buttons: [
                'excel',
                {
                    extend: 'pdfHtml5',
                    footer: true

                },
                {
                    extend: 'print',
                    title: '<div style="text-align:center;"><h1>Daftar Penduduk</h1><br></div>',
                    footer: true


                }
                // {
                //     extend: 'pdfHtml5',
                //     pageSize: 'LEGAL',
                //     exportOptions: {
                //         columns: [0,1,2,3,4,5,6,7,8]
                //     },
                //     customize : function(doc) {
                //         doc.content[1].table.widths = [ '5%', '28%', '10%', '10%', '10%', '7%', '15%','15%','15%'];
                //     }
                // }  
            ],
            "language": {
                "decimal": "",
                "emptyTable": "Data kosong",
                "info": "Menampilkan _START_ sampai _END_ dari total _TOTAL_ data",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Tampilkan _MENU_ data",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "->",
                    "previous": "<-"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }

            },
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp.,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over all pages
                total = api
                    .column(6)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(6).footer()).html(
                    'Rp. ' + pageTotal + ' ( total seluruhnya : Rp. ' + total + ' )'
                );
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tb_hutang').DataTable({
            dom: 'Bfrtip',
            lengthChange: false,
    
            buttons: [
                'excel',
                {
                    extend: 'pdfHtml5',
                    footer: true

                },
                {
                    extend: 'print',
                    title: '<div style="text-align:center;"><h1>Daftar Penduduk</h1><br></div>',
                    footer: true


                }
                // {
                //     extend: 'pdfHtml5',
                //     pageSize: 'LEGAL',
                //     exportOptions: {
                //         columns: [0,1,2,3,4,5,6,7,8]
                //     },
                //     customize : function(doc) {
                //         doc.content[1].table.widths = [ '5%', '28%', '10%', '10%', '10%', '7%', '15%','15%','15%'];
                //     }
                // }  
            ],
            "language": {
                "decimal": "",
                "emptyTable": "Data kosong",
                "info": "Menampilkan _START_ sampai _END_ dari total _TOTAL_ data",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Tampilkan _MENU_ data",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "->",
                    "previous": "<-"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }

            },
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp.,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over all pages
                total = api
                    .column(3)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(3).footer()).html(
                    'Rp. ' + pageTotal + ' ( total seluruhnya : Rp. ' + total + ' )'
                );
            }

        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>