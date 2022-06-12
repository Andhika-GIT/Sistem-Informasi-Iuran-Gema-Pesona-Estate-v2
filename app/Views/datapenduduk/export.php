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
                        <th>Nama</th>
                        <th>Agama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>No tlp</th>
                        <th>No Nik</th>
                        <th>No Kk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $angka = 1; ?>
                    <?php foreach ($penduduk as $p => $penduduk) : ?>
                        <tr>
                            <td><?php echo $angka++ ?></td>
                            <td><?php echo $penduduk["nama_penduduk"] ?></td>
                            <td><?php echo $penduduk["agama"] ?></td>
                            <td class="align-items-center"><?php echo $penduduk["jenis_kelamin"] ?></td>
                            <td><?php echo $penduduk["alamat_penduduk"] ?></td>
                            <td><?php echo $penduduk["rt_penduduk"] ?></td>
                            <td><?php echo $penduduk["no_penduduk"] ?></td>
                            <td><?php echo $penduduk["nik_penduduk"] ?></td>
                            <td><?php echo $penduduk["kk_penduduk"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- /.content-wrapper -->
    <!-- akhir section -->
    <?= $this->endSection(); ?>