<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SECTION CSS -->
    <?= $this->section('link'); ?>
    <link rel="stylesheet" href="/assets/css/profil.css">
    <?= $this->endSection('css'); ?>

</head>

<body>
    <!-- SECTION --> -->
    <?= $this->extend('layout/main_layout'); ?>
    <?= $this->section('content'); ?>

    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><i class="fas fa-home"></i></li>
                <li><a href="#">Beranda</a></li>
                <li>/</li>
                <li>Profil Sekolah</li>
            </ul>
        </div>
        <div class="gambar-sekolah">
            <img src="/assets/img/halaman.jpeg" alt="sekolah">
        </div>
        <div class="profil-sekolah">
            <h2>SEJARAH SEKOLAH</h2>
            <p><?= $keterangan[0]; ?></p>

            <h2>VISI DAN MISI</h2>
            <h3>Visi</h3>
            <p><?= $visi[0]; ?></p>
            <h3>Misi</h3>
            <?= $misi[0]; ?>
        </div>
    </div>

    <!-- END SECTION -->
    <?= $this->endSection(); ?>
</body>

</html>