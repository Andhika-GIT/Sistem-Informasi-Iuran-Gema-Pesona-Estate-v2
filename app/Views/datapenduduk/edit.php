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
            <div class="row">
                <div class="col-lg-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Penduduk</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/datapenduduk/<?= $penduduk['id_penduduk']; ?>" method="post" enctype="multipart/form-data">
                            <!-- mencegah jika ada orang lain yang membajak form, form hanya berjalan dihalaman ini -->
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6  ">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="hidden" name="id" value="<?= $penduduk['id_penduduk']; ?>">
                                            <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') :  $penduduk["nama_penduduk"]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="form-group ">
                                            <label>Agama</label>
                                            <select class="form-control" name="agama" required>
                                                <option><?= (old('agama')) ? old('agama') : $penduduk["agama"]; ?></option>
                                                <option disabled="disabled"><br></option>
                                                <option>Islam</option>
                                                <option>Kristen</option>
                                                <option>Khatolik</option>
                                                <option>Hindu</option>
                                                <option>Buddha</option>
                                                <option>Khonghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6  ">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" placeholder="Masukkan blok rumah" name="alamat" value="<?= (old('alamat')) ? old('alamat') :  $penduduk["alamat_penduduk"]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="form-group ">
                                            <label>RT</label>
                                            <select class="form-control" name="rt" required>
                                                <option><?= (old('rt')) ? old('rt') :  $penduduk["rt_penduduk"]; ?></option>
                                                <option disabled="disabled"><br></option>
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                                <option>05</option>
                                                <option>06</option>
                                                <option>07</option>
                                                <option>08</option>
                                                <option>09</option>
                                                <option>10</option>
                                                <option>11</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>no Tlp</label>
                                            <input type="number" class="form-control <?= ($validation->hasError('tlp')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan No Tlp" name="tlp" value="<?= (old('tlp')) ? old('tlp') :  $penduduk["no_penduduk"]; ?>" maxlength="13">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('tlp'); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>No Nik</label>
                                            <input type="number" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan No Nik" name="nik" value="<?= (old('nik')) ? old('nik') :  $penduduk["nik_penduduk"]; ?>" maxlength="16" required>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('nik'); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>No KK</label>
                                            <input type="number" class="form-control <?= ($validation->hasError('kk')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan No KK" name="kk" value="<?= (old('kk')) ? old('kk') :  $penduduk["kk_penduduk"]; ?>" maxlength="16" required>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('kk'); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki" <?php echo ($penduduk['jenis_kelamin'] == 'Laki-Laki') ? 'checked' : '' ?> required>
                                                <label class="form-check-label">
                                                    Laki-Laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($penduduk['jenis_kelamin'] == 'Perempuan') ? 'checked' : '' ?> required>
                                                <label class="form-check-label">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-12">	
								<div class="form-group">
									<label>Foto Ktp</label><br>
									<img id="foto" src="images/ < echo $penduduk["ktp_penduduk"] ?>" alt="" width = "150">
                                    <input id="thumbnail" type="file" class="form-control-file" name="poto" required>
								</div>
							</div>	 -->
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a onclick=" return confirm('anda yakin ingin kembali'); " href="/datapenduduk" class="btn btn-warning mr-2"> Kembali</a>
                                <input type="submit" name="submit" class="btn btn-primary" value="Ubah Data"></input>
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