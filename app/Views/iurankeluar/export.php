<!-- menggunakan file templates pada folder layout -->
<?= $this->extend('layout/datatables'); ?>

<!-- membuat section bernama content -->
<?= $this->section('content'); ?>
<!-- Main Sidebar Container -->

<body>
    <div class="container">
        <h2><?= $judul; ?></h2>
        <div class="data-tables datatable-dark">

            <table class="table table-striped table-bordered" id="tb">
                <thead>
                    <tr class="text-center">
                        <th style="width: 10px">No</th>
                        <th>Kode Iuran</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Metode Pembayaran</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $hasil = 0; ?>
                    <?php $angka = 1; ?>
                    <?php foreach ($iuran as $p => $iuran) : ?>
                        <tr>
                            <td><?php echo $angka++ ?></td>
                            <td><?php echo $iuran["kode_iuran_keluar"] ?></td>
                            <td><?php echo $iuran["nama"] ?></td>
                            <td><?php echo $iuran["keterangan"] ?></td>
                            <td><?php echo $iuran["tanggal"] ?></td>
                            <td><?php echo $iuran["metode_bayar"] ?></td>
                            <td>Rp. <?php echo number_format($iuran["jumlah"], 0, ',', '.')  ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th style="text-align:right">Total:</th>
                        <th style="text-align:right">RP. <?= number_format($hasil, 0, ',', '.'); ?></th>
                    </tr>
                </tfoot>
                <br>

            </table>
        </div>
    </div>

    <!-- /.content-wrapper -->
    <!-- akhir section -->
    <?= $this->endSection(); ?>