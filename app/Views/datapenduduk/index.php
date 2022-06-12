<!-- menggunakan file templates pada folder layout -->
<?= $this->extend('layout/templates'); ?>

<!-- membuat section bernama content -->
<?= $this->section('content'); ?>
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <!-- <div class="col-sm-6">
            <a href="halamantambahpenduduk.php" class="btn btn-primary float-right"><i class="fas fa-plus"> Tambah Data</i></a>
          </div>/.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-10 card-title">
                                    <h3 class=" ">Daftar Penduduk</h3>
                                    <?php if (session()->get('role') == 'bendahara' or session()->get('role') == 'ketua-rt') { ?>
                                        <a type="button" class=" btn btn-success mr-1" href="<?= base_url('/datapenduduk/export'); ?>" target="_blank">
                                            <i class="fas fa-file-export"></i> Ekspor/Cetak Data</i></a>
                                        <a type="button" class=" btn btn-primary" href="<?= base_url('/datapenduduk/add'); ?>">
                                            <i class="fas fa-plus"> Tambah Data</i></a>
                                    <?php }  ?>
                                </div>
                                <!-- modal tombol tambah data    -->
                                <!-- <php include('tambahpenduduk.php') ?> -->
                                <!-- <form action="" class="form-inline d-flex justify-content-end" method="get">
                        <input type="text" class="form-control" placeholder="search.." name="cari">
                        <button class="btn btn-outline-success my-2 my-sm-0 " type="submit"><i class="fas fa-search"></i></button>
                        <a type="button" class="btn btn-success ml-3" value="kembali" href="datapenduduk.php">Reset</a>
                    </form> -->
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- jika ditemukan session flash yang bernama pesan -->
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <!-- mencetak isi pesan lewat alert -->
                                    <?= session()->getFlashdata('pesan'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>


                            <table class="table table-striped table-bordered table-responsive-lg" id="tb">
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
                                        <!-- <th>Foto Ktp</th> -->
                                        <?php if (session()->get('role') == 'bendahara' or session()->get('role') == 'ketua-rt' or session()->get('role') == 'admin') { ?>
                                            <th width="150px">Aksi</th>
                                        <?php }  ?>

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
                                            <!-- <td class="text-center"><img src="images/< echo $penduduk['ktp_penduduk']?>" alt = "" width="100"></td> -->
                                            <?php if (session()->get('role') == 'bendahara' or session()->get('role') == 'ketua-rt' or session()->get('role') == 'admin') { ?>
                                                <td align="center">
                                                    <div class="btn-group">
                                                        <!-- <a class="btn btn-info btn-sm" href="detailpenduduk.php?id="><i class="fas fa-eye"></i></a> -->
                                                        <a href="/datapenduduk/<?= $penduduk['id_penduduk']; ?>" class="btn btn-warning">Edit</a>

                                                        <form action="/datapenduduk/<?= $penduduk['id_penduduk']; ?>" method="POST" class="d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('apakah anda yakin?')">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            <?php }  ?>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <!-- /.card -->

                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <!-- akhir section -->
    <?= $this->endSection(); ?>