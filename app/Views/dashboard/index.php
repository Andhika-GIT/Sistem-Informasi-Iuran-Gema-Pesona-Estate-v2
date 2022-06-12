<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class=" text-center mt-3">
        <img class="img-profile rounded-circle" src="<?= base_url('/img/profile/' . session()->get('foto')); ?>" width="130px">
        <h1><?= session()->get('nama'); ?></h1>
        <p class="mt-3">Selamat Datang</p>
    </div>
    <div class="row mt-4">
        <?php if (session()->get('role') == 'warga') { ?>
            <div class="col-sm-6">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header bg-green">
                                <p class="text-center ">Biodata</p>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama" value="<?= $penduduk["nama_penduduk"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Blok Rumah</label>
                                                <input type="text" class="form-control" name="alamat" value="<?= $penduduk["alamat_penduduk"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Rt</label>
                                                <input type="text" class="form-control" name="rt" value="<?= $penduduk["rt_penduduk"]; ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>No HP</label>
                                                <input type="text" class="form-control" name="rt" value="<?= $penduduk["no_penduduk"]; ?>" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-xl-8 col-md-12 mb-4 mt-5">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('iuranmasuk'); ?>">Lihat Iuran yang sudah dibayar</a></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-sign-in-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-12 mb-4 mt-5">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('iurankeluar'); ?>">Lihat Pengeluaran Iuran</a></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-sign-in-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (session()->get('role') == 'bendahara' or session()->get('role') == 'ketua-rt') { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('datapenduduk'); ?>">Data Penduduk</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('iuranmasuk'); ?>">Data Iuran Masuk</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sign-in-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href="<?= base_url('iurankeluar'); ?>">Data Iuran Keluar</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sign-out-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('iurantunggakan'); ?>">Data Iuran Tunggakan</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-credit-card fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (session()->get('role') == 'admin') { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('kelolaakun'); ?>">Kelola Akun</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-credit-card fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
</div>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Andhika Prasetya Nugraha 2021</span>
        </div>
    </div>
</footer>
</div>
</div>
<?= $this->endSection(); ?>