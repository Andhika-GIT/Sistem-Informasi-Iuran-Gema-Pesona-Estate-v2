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
                <div class="col-lg-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-green">
                            <p class="text-center ">Ubah Postingan</p>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/thread/update/<?= $thread['id']; ?>" method="post" enctype="multipart/form-data">
                            <!-- mencegah jika ada orang lain yang membajak form, form hanya berjalan dihalaman ini -->
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <!-- Error Message -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                <p class="font-weight-bold">Judul</p>
                                            </label>
                                            <input type="hidden" name="id" value="<?= $thread['id']; ?>">
                                            <input type="hidden" name="filelama" value="<?= $thread['file']; ?>">
                                            <input name="judul" type="text" class="form-control" value="<?= (old('judul')) ? old('judul') :  $thread["judul"] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                <p class="font-weight-bold">kategori</p>
                                            </label>
                                            <input name="kategori" type="text" class="form-control" value="<?= (old('kategori')) ? old('kategori') :  $thread["kategori"] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                <p class="font-weight-bold">Isi</p>
                                            </label>
                                            <textarea class="form-control" name="isi" rows="10"><?= (old('isi')) ? old('isi') :  $thread["isi"] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="foto" class="">
                                                <p class="font-weight-bold">Upload Gambar</p>
                                            </label>
                                            <div class="col-sm-2">
                                                <img src="/forum/<?= $thread['file']; ?>" alt="" class="img-thumbnail img-preview ">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <!-- menjalan event onchange, yaitu event ketika file berubah -->
                                                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                                        <?= $validation->getError('foto'); ?>
                                                    </div>
                                                    <label class="custom-file-label" for="foto"><?= $thread['file']; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a onclick=" return confirm('anda yakin ingin kembali'); " href="<?= base_url('thread'); ?>" class="btn btn-warning mr-2"> Kembali</a>
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