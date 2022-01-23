<!-- SECTION CSS -->
<?= $this->section('link'); ?>
<link rel="stylesheet" href="/assets/css/berita.css">
<?= $this->endSection(); ?>

<?= $this->extend('layout/main_layout'); ?>
<!-- SECTION CONTENT -->
<?= $this->section('content'); ?>

<div class="container">
    <div class="breadcrumb">
        <ul>
            <li><i class="fas fa-home"></i></li>
            <li><a href="/">Beranda</a></li>
            <li>/</li>
            <li>Berita & Informasi</li>
        </ul>
    </div>
    <div class="row-berita">
        <div class="col-kiri">

            <div class="pengumuman">
                <a href="" class="title-pengumuman">PENGUMUMAN</a>
                <div class="box-pengumuman">
                    <!-- <p>Tidak ada Pengumuman</p> -->
                    <?php foreach ($pengumuman as $value) : ?>
                        <a href="/home/detailBerita/<?= $value['id_post']; ?>" class="text-green"><?= $value['judul']; ?></a>
                    <?php endforeach; ?>
                    <a href="#" class="btn-pengumuman">Lihat Selengkapnya</a>
                </div>
            </div>

            <div class="galeri">
                <a href="/home/galeri" class="title-galeri text-green">GALERI</a>
                <div class="box-galeri">
                    <?php foreach ($galeri as $g) : ?>
                        <div class="frame">
                            <img src="/assets/img/<?= $g['gambar']; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="kontak">
                <a href="/#kontak" class="title-kontak">KONTAK</a>
                <a href="/#kontak" class="icon"><i class="fas fa-envelope fa-lg"></i></a>
                <a href="/#kontak" class="icon"><i class="fas fa-phone-square fa-lg"></i></a>
            </div>

        </div>

        <div class="col-tengah">
            <?php foreach ($post as $key) : ?>
                <div class="card-berita">
                    <a href="/home/detailBerita/<?= $key['id_post']; ?>" class="gambar-berita">
                        <img src="/assets/img/<?= $key['gambar']; ?>" alt="">
                    </a>
                    <a href="/home/detailBerita/<?= $key['id_post']; ?>" class="judul-berita"><?= $key['judul']; ?></a>
                    <p class="isi-berita"><?= $key['isi']; ?></p>
                    <p class="tgl-berita"><?= $key['tanggal']; ?></p>
                </div>
            <?php endforeach; ?>
            <div class="pagination">

            </div>
        </div>

        <div class="col-kanan">
            <a href="" class="title-kalender text-green">KALENDER AKADEMIK</a>
            <div class="box-kalender">
                <p>Tidak ada kalender akademik</p>
                <!-- <?php for ($i = 1; $i <= 3; $i++) : ?>
                    <a href="#" class="tgl text-green">
                        <i class="fas fa-calendar-alt fa-2x"></i>
                        <div class="keterangan">
                            <p><strong>15 Juli 2021</strong></p>
                            <p>Mulai masuk sekolah</p>
                        </div>
                    </a>
                <?php endfor; ?> -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>