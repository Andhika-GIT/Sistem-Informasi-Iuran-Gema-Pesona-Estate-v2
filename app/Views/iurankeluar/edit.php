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
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Iuran keluar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/iurankeluar/<?= $iuran['id']; ?>" method="post" enctype="multipart/form-data">
                            <!-- mencegah jika ada orang lain yang membajak form, form hanya berjalan dihalaman ini -->
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-sm-6  ">
                                        <div class="form-group">
                                            <label>Kode iuran</label> 
                                            <input type="text" class="form-control <= ($validation->hasError('kode_iuran')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan kode iuran keluar" name="kode_iuran" value="<= (old('kode_iuran')) ? old('kode_iuran') : $iuran['kode_iuran_keluar']; ?>" required>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <= $validation->getError('kode_iuran'); ?>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-sm-6  ">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="hidden" name="id" value="<?= $iuran['id']; ?>">
                                            <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" value="<?= (old('nama')) ? old('nama') : $iuran['nama']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control" placeholder="Pembayaran untuk..." name="keterangan" value="<?= (old('keterangan')) ? old('keterangan') : $iuran['keterangan']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6  ">
                                        <div class="form-group">
                                            <label>Tanggal pembayaran</label>
                                            <input type="text" class="form-control datepicker" id="tglIuran" placeholder="Tanggal Pembayaran" name="tanggal" value="<?= (old('tanggal')) ? old('tanggal') : $iuran['tanggal']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Jumlah Pembayaran</label>
                                            <input type="text" class="form-control" placeholder="Jumlah Pembayaran" name="jumlah" value="<?= (old('jumlah')) ? old('jumlah') : $iuran['jumlah']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Metode Pembayaran</label>
                                            <input type="text" class="form-control" placeholder="Metode Pembayaran" name="metode_bayar" value="<?= (old('metode_bayar')) ? old('metode_bayar') : $iuran['metode_bayar']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a onclick=" return confirm('anda yakin ingin kembali'); " href="/iurankeluar" class="btn btn-warning mr-2"> Kembali</a>
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