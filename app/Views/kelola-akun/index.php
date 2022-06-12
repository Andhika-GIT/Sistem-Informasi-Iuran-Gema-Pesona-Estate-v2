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
                                    <h3 class=" ">Daftar Akun</h3>
                                    <a type="button" class=" btn btn-primary" href="<?= base_url('/kelolaakun/add'); ?>">
                                        <i class="fas fa-plus"> Tambah Data</i></a>
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
                                        <th>foto</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>role</th>
                                        <!-- <th>Foto Ktp</th> -->
                                        <th width="150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $angka = 1; ?>
                                    <?php foreach ($user as $p => $user) : ?>
                                        <tr>
                                            <td><?php echo $angka++ ?></td>
                                            <td><img src="img/profile/<?php echo $user['foto'] ?>" alt="" width="60"></td>
                                            <td><?php echo $user["nama"] ?></td>
                                            <td class="align-items-center"><?php echo $user["email"] ?></td>
                                            <td><?php echo $user["no"] ?></td>
                                            <td><?php echo $user["username"] ?></td>
                                            <td><?php echo $user["role"] ?></td>
                                            <!-- <td class="text-center"><img src="images/< echo $penduduk['ktp_penduduk']?>" alt = "" width="100"></td> -->
                                            <td align="center">
                                                <div class="btn-group">
                                                    <!-- <a class="btn btn-info btn-sm" href="detailpenduduk.php?id="><i class="fas fa-eye"></i></a> -->
                                                    <a href="/kelolaakun/<?= $user['id']; ?>" class="btn btn-warning">Edit</a>

                                                    <form action="/kelolaakun/<?= $user['id']; ?>" method="POST" class="d-inline">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('apakah anda yakin?')">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
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