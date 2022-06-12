<!-- menggunakan file templates pada folder layout -->
<?= $this->extend('layout/templates'); ?>

<!-- membuat section bernama content -->
<?= $this->section('content'); ?>

<!-- Main Sidebar Container -->
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
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11 mt-5 pt-5">
                <div class="row z-depth-3 shadow-lg">
                    <div class="col-sm-4 rounded-left" style="background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
                           background: linear-gradient(to right, #ee5a6f, #f29263);">
                        <div class="card-block text-center text-white mt-5">
                            <div class="profile_picture"><img src="/img/profile/<?= session()->get('foto'); ?>" class="" alt="" width="180"></td>
                            </div>
                            <h2 class="font-weight-bold mt-5"><?= session()->get('nama'); ?></h2>
                            <p>Admin</p>
                        </div>
                    </div>
                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center">Info</h3>
                        <hr class="bg-primary mt-0 w-25">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>
                                        <p class="font-weight-bold">Username</p>
                                    </label>
                                    <input type="text" class="form-control" value="<?= session()->get('username'); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>
                                        <p class="font-weight-bold">Email</p>
                                    </label>
                                    <input type="email" class="form-control" value="<?= session()->get('email'); ?>">
                                </div>
                            </div>
                            <!-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label>
                                        <p class="font-weight-bold">No</p>
                                    </label>
                                    <input type="text" class="form-control" value="<php echo $admin["no_admin"] ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>
                                        <p class="font-weight-bold">Username</p>
                                    </label>
                                    <input type="text" class="form-control" value="<php echo $admin["username_admin"] ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>
                                        <p class="font-weight-bold">Password</p>
                                    </label>
                                    <input type="text" class="form-control" value="<php echo $admin["password_admin"] ?>">
                                </div>
                            </div> -->
                            <!-- </div>
                    		<h4 class="mt-3">Projects</h4>
                    		<hr class="bg-primary">
                   		    <div class="row"> -->
                        </div>
                        <!-- <hr class="bg-primary"> -->
                        <?php if (session()->get('role') == 'admin') { ?>
                            <div class="card-footer d-flex justify-content-center mt-4">
                                <a name="edit" class="btn btn-primary" href="/pengaturanakun/<?= session()->get('id'); ?>">EDIT
                                    DATA</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if (session()->get('role') == 'bendahara' or session()->get('role') == 'warga' or session()->get('role') == 'ketua-rt') { ?>
                <h5 class="mt-4">*hubungi admin untuk melakukan perubahan akun</h5>
            <?php } ?>

        </div>

    </div>
    <!-- /.content -->
</div>

<!-- akhir section -->
<?= $this->endSection(); ?>