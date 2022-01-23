<?= $this->section('link'); ?>

<!-- SECTION CSS -->
<link rel="stylesheet" href="/assets/css/galeri.css">
<link rel="stylesheet" href="/assets/css/lightbox.css">


<!-- SECTION JAVASCRIPT -->
<script src="/assets/js/lightbox.js"></script>



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
            <li>Galeri</li>
        </ul>
    </div>

    <div class="container-galeri">
        <?php foreach ($galeri as $g) : ?>
            <a href="/assets/img/<?= $g['gambar']; ?>" data-title="<?= $g['keterangan']; ?>" data-lightbox="roadtrip">
                <div class="card">
                    <img src="/assets/img/<?= $g['gambar']; ?>">
                    <div class="card-body">
                        <p><?= $g['keterangan']; ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

    </div>
</div>

<script>
</script>

<?= $this->endSection(); ?>