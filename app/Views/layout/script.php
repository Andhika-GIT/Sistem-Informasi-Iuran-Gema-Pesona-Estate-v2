<!-- Main Footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- <script src="asset/js/sb-admin-2.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<!-- <script src="<= base_url('js/adminlte.min.js'); ?>"></script> -->
<!-- Core plugin JavaScript-->
<script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<!-- include dari asset -->
<script src="<?= base_url('js/sb-admin-2.min.js'); ?>"></script>
<script src="<?= base_url('dataTables/datatables.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tb').DataTable({
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
                    'Total Dari Search : Rp. ' + pageTotal + ' | total Seluruhnya : Rp. ' + total
                );
            }


        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tb_hutang').DataTable({
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
                    'Total Dari Search : Rp. ' + pageTotal + ' | total Seluruhnya : Rp. ' + total
                );
            }


        });
    });
</script>
<script src="<?= base_url('plugins/datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- jQuery -->
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>
<script>
    // membuat function yang akan dipanggil di create.php
    function previewImg() {
        // membuat variabel javascript yang akan mengambil id dan class pada create.php
        const sampul = document.querySelector('#foto');
        const sampulLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        // menganti nama label dengan nama file sampul yang dikirim(sampul.files[0])
        sampulLabel.textContent = sampul.files[0].name;

        // membuat variabel fileSampul sebagai pembaca file
        const fileSampul = new FileReader();
        // file sampul akan mengambil alamat penyimpanan gambar yang dikirim
        fileSampul.readAsDataURL(sampul.files[0]);

        // ketika filesampul berjalan, akan menjalan fungsi event
        fileSampul.onload = function(e) {
            // menganti source default image preview dengan image/gambar yang dikirim
            imgPreview.src = e.target.result;
        }
    }
</script>
</body>

</html>