<?= $this->section('link'); ?>
<!-- SECTION CSS -->
<link rel="stylesheet" href="/assets/css/detail_berita.css">
<!-- SECTION JAVASCRIPT -->
<?= $this->endSection(); ?>

<?= $this->extend('layout/main_layout'); ?>

<!-- SECTION CONTENT -->
<?= $this->section('content'); ?>

<div class="container">

    <div class="breadcrumb">
        <ul>
            <li><i class="fas fa-home text-green"></i></li>
            <li><a href="#" class="text-green">Beranda</a></li>
            <li class="text-green">/</li>
            <li><a href="#" class="text-green">Berita & Informasi</a></li>
            <li class="text-green">/</li>
            <li class="text-green">
                <?= $post['judul']; ?>
            </li>
        </ul>
    </div>

    <section class="container-berita">

        <div class="col-kanan">
            <img src="/assets/img/<?= $post['gambar']; ?>" alt="">
            <span class="tgl-berita text-grey"><?= $post['tanggal']; ?></span>
            <h2 class="text-green"><?= $post['judul']; ?></h2>
            <p class="isi-berita"><?= $post['isi']; ?></p>
        </div>

        <div class="col-kiri">
            <h3 class="text-green">Berita Lainnya</h3>
            <?php foreach ($otherPost as $value) : ?>
                <div class="side-post">
                    <a href="/home/detailBerita/<?= $value['id_post']; ?>" class="gambar">
                        <img src="/assets/img/<?= $value['gambar']; ?>" alt="">
                    </a>
                    <a href="" class="judul-post text-green"><?= $value['judul']; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>