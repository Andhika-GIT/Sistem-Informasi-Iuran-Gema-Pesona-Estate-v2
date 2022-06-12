<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<!-- notif pesan -->
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show mx-auto text-center" style="max-width: 800px;" role="alert">
        <!-- mencetak isi pesan lewat alert -->
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-md-12">
            <!-- general form elements -->
            <div class="card card-primary p-5">
                <div class="card-header bg-green">
                    <h3 class="text-center "><?= $thread['judul'] ?></h3>
                </div>
                <div class="card-body text-center">
                    <p>
                        Dibuat Oleh : <?= $thread['nama'] ?> ( <span class="text-danger"><?= session()->get('role'); ?></span> )
                    </p>
                    <p class="mb-5"> kategori : <?= $thread['kategori'] ?></p>
                    <p><?= $thread['isi'] ?></p>
                    <img class="text-center" type="application/pdf" src="/forum/<?= $thread['file']; ?>" style="width: 300px;"></img> <br>
                    <a class="btn btn-info mt-5" href="<?= base_url('thread/download/' . $thread['id']); ?>">Unduh Gambar</a>
                    <a class="btn btn-success mt-5" href="<?= base_url('reply/add/' . $thread['id']); ?>">Buat Reply</a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="text-center">
    <h1>REPLY</h1>
</div>
<hr>
<div class="container mt-5" style="margin-bottom: 100px;">
    <?php foreach ($reply->getResultArray() as $r) : ?>
        <div class="row d-flex justify-content-center" style="margin-bottom: 90px;">
            <div class="col-lg-6">
                <div class="row text-justify">
                    <div class="col-md-3 col-sm-12 text-center mb-3 ">
                        <img src="<?= base_url('img/profile/' . $r['foto']); ?>" alt="" width="50px"><br>
                        <small class=""><strong><?= $r['nama']; ?></strong></small><br>
                        <small class=""><strong>( <?= $r['role']; ?> )</strong></small>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <p><?= $r['isi']; ?></p>

                        <?php if (session()->get('id') == $r['id_user']) { ?>
                            <a href="<?= base_url('reply/' . $r['id']); ?>" class="text-warning">edit</a>
                        <?php }  ?>

                        <?php if (session()->get('id') == $r['id_user'] or session()->get('role') == 'bendahara' or session()->get('role') == 'ketua-rt' or session()->get('role') == 'admin') { ?>
                            <a onclick="return confirm('apakah anda yakin?')" href="/reply/hapus/<?= $r['id']; ?>/<?= $thread['id']; ?>" class="text-danger">hapus</a>

                        <?php }  ?>

                    </div>
                </div>
            </div>
        </div>

    <?php endforeach ?>
</div>

</div>
<?= $this->endSection() ?>