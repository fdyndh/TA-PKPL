<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SECTION CSS -->
    <?= $this->section('link'); ?>

    <link rel="stylesheet" href="/assets/css/prestasi.css">

    <?= $this->endSection(); ?>

</head>

<body>
    <!-- SECTION -->
    <?= $this->extend('layout/main_layout'); ?>
    <?= $this->section('content'); ?>

    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><i class="fas fa-home"></i></li>
                <li><a href="/beranda">Beranda</a></li>
                <li>/</li>
                <li>Profil</li>
                <li>/</li>
                <li>Prestasi Sekolah</li>
            </ul>
        </div>

        <div class="list-prestasi">
            <?php if (empty($prestasi)) {
                echo "<p class='tidak-ada'>Tidak Ada</p>";
            } else {
                foreach ($prestasi as $p) : ?>
                    <a href="g" class="card-prestasi">
                        <img src="/assets/img/prestasi-default.jpg" alt="Prestasi">
                        <div class="card-body">
                            <h2 class="text-green"><?= $p['judul']; ?></h2>
                            <i class="fa fa-calendar-alt text-grey"></i>
                            <span class="tgl-prestasi"><?= $p['tanggal']; ?></span>
                            <i class="fa fa-map-marker-alt text-grey"></i><span><?= $p['lokasi']; ?></span>
                            <p class="text-black"><?= $p['keterangan']; ?></p>
                        </div>
                    </a>
            <?php endforeach;
            } ?>
        </div>

    </div>

    <!-- END SECTION -->
    <?= $this->endSection(); ?>
</body>

<footer class="footer">
    <p>Copyright© 2021 | Designed by <span>Ace Dev</span></p>
    <p>Term Service | Privacy Police</p>
</footer>

</html>