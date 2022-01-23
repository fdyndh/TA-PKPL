<?= $this->section('link'); ?>

<!-- SECTION CSS -->
<link rel="stylesheet" href="/assets/css/guru.css">

<!-- SECTION JAVASCRIPT -->

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
            <li>Profil</li>
            <li>/</li>
            <li>Tenaga Pendidikan</li>
        </ul>
    </div>

    <div class="guru">
        <div class="row">
            <?php foreach ($guru as $g) : ?>
                <div class="coloumn">
                    <div class="card">
                        <img src="/assets/img/<?= $g['gambar']; ?>" alt="">
                        <div class="keterangan">
                            <p><?= $g['nama']; ?></p>
                            <span><?= $g['jabatan']; ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>