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
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-green">
                            <p class="text-center ">Tambah Data User</p>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/kelolaakun/simpan" method="post" enctype="multipart/form-data">
                            <!-- mencegah jika ada orang lain yang membajak form, form hanya berjalan dihalaman ini -->
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <!-- Error Message -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">

                                            <label>
                                                <p class="font-weight-bold">Nama user</p>
                                            </label>
                                            <small id="emailHelp" class="form-text text-muted">* Pastikan Nama Sesuai Dengan Data Penduduk</small>
                                            <input name="nama" type="text" class="form-control" value="<?= old('nama') ?>" autofocus required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                <p class="font-weight-bold">Email user</p>
                                            </label>
                                            <input name="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= old('email') ?>" required>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                <p class="font-weight-bold">No hp</p>
                                            </label>
                                            <input name="no" type="text" class="form-control <?= ($validation->hasError('no')) ? 'is-invalid' : ''; ?>" value="<?= old('no') ?>" required>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('no'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                <p class="font-weight-bold">Username</p>
                                            </label>
                                            <input name="username" type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= old('username') ?>" required>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('username'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                <p class="font-weight-bold">Password</p>
                                            </label>
                                            <input name="password" type=" text" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" value="<?= old('password') ?>" required>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group ">
                                            <label>Role</label>
                                            <small id="emailHelp" class="form-text text-muted">* Pilih Role Atau Level User</small>
                                            <select class="form-control" name="role" required>
                                                <option disabled selected></option>
                                                <option>warga</option>
                                                <option>bendahara</option>
                                                <option>ketua-rt</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="foto" class="">
                                                <p class="font-weight-bold">Upload Foto</p>
                                            </label>
                                            <div class="col-sm-2">
                                                <img src="/img/profile/default.png" alt="" class="img-thumbnail img-preview ">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <!-- menjalan event onchange, yaitu event ketika file berubah -->
                                                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                                        <?= $validation->getError('foto'); ?>
                                                    </div>
                                                    <label class="custom-file-label" for="foto">pilih gambar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a onclick=" return confirm('anda yakin ingin kembali'); " href="admin.php" class="btn btn-warning mr-2"> Kembali</a>
                                <input type="submit" name="submit" class="btn btn-primary" value="simpan"></input>
                            </div>
                        </form>
                    </div>
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