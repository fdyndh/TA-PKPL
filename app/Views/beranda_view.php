<?= $this->section('link'); ?>

<!-- SECTION CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/beranda.css">

<!-- SECTION JAVASCRIPT -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<?= $this->endSection(); ?>

<?= $this->extend('layout/main_layout'); ?>

<!-- SECTION CONTENT -->
<?= $this->section('content'); ?>

<div class="banner">
	<img src="/assets/img/sekolah.jpeg" alt="Halaman Sekolah">
</div>

<div class="container" data-aos-duration="1000">
	<h1 class="title title-kepsek text-green" data-aos="fade-right" data-aos-duration="1000">Sambutan Kepala Sekolah</h1>
	<div class="kepsek" data-aos="fade-right">
		<?php foreach ($sambutan as $key) :
		?>
			<p>" <?= $key['kata_sambutan']; ?> "</p>
			<div class="gambar-kepsek" data-aos="fade-up">
				<img src="/assets/img/<?= $key['gambar']; ?>" alt="Kepala Sekolah">
			</div>
	</div>
	<ul data-aos="fade-up">
		<li><?= $key['lokasi']; ?></li>
		<li>Kepala Sekolah</li>
		<li><?= $key['nama_kepsek']; ?></li>
	</ul>
<?php endforeach; ?>

<h1 class="title title-berita text-green" data-aos="fade-up">Berita & Infomasi Sekolah</h1>

<div class="container-berita">
	<?php if (empty($post)) {
		echo "<p class='tidak-ada'>Tidak Ada</p>";
	} else {
		foreach ($post as $p) : ?>
			<a href="s" class="card" data-aos="zoom-in" data-aos-duration="1000">
				<div class="gambar-berita">
					<img src="/assets/img/<?= $p['gambar']; ?>" alt="">
				</div>
				<p class="judul-berita text-green"><?= $p['judul']; ?></p>
				<p class="isi-berita text-black"><?= $p['isi']; ?></p>
				<p class="tgl-berita text-grey"><?= $p['tanggal']; ?></p>
			</a>
	<?php endforeach;
	} ?>
</div>
<a href="#" class="btn-berita text-white">Lihat Semua Berita</a>

<h1 class="title title-prestasi text-green" data-aos="fade-left" data-aos-duration="1000">Prestasi Sekolah</h1>
<div class="list-prestasi" data-aos="fade-right" data-aos-duration="1000">
	<?php if (empty($prestasi)) {
		echo "<p class='tidak-ada'>Tidak Ada</p>";
	} else {
		foreach ($prestasi as $p) : ?>
			<a href="/home/profil/prestasi" class="card-prestasi">
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
<a href="/home/profil/prestasi" class="btn-prestasi text-white">Lihat Selengkapnya</a>

<!-- <h1 class="title title-ektrakulikuler">Ekstrakulikuler</h1> -->
</div>

<div id="funfact" class="funfact text-white">
	<div class="card-funfact">
		<i class="fas fa-user fa-3x"></i>
		<p class="count">226</p>
		<p>Siswa</p>
	</div>
	<div class="card-funfact">
		<i class="fas fa-users fa-3x"></i>
		<p class="count">36</p>
		<p>Guru</p>
	</div>
	<div class="card-funfact">
		<i class="fas fa-school fa-3x"></i>
		<p class="count">12</p>
		<p>Kelas</p>
	</div>
	<div class="card-funfact">
		<i class="fas fa-trophy fa-3x"></i>
		<p class="count">12</p>
		<p>Juara</p>
	</div>
</div>

<div class="container-tp">
	<h1 class="title-tp text-green">Tenaga Pendidikan</h1>
	<div class="box-tp" data-aos="fade-up">
		<?php foreach ($guru as $g) : ?>
			<div class="card-tp text-green">
				<img src="/assets/img/<?= $g['gambar']; ?>" alt="">
				<p class="nama"><?= $g['nama']; ?></p>
				<p><?= $g['jabatan']; ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<div id="kontak" class="container-address text-green">
	<div class="denah" data-aos="fade-right" data-aos-duration="1000">
		<h1>Denah</h1>
		<div class="peta" id="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3733946241646!2d117.21691431409913!3d-0.8556750355477638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df41e5fc281cc97%3A0x955656b225e6cd84!2sSD%20012%20Muara%20Jawa!5e0!3m2!1sid!2sid!4v1618334390683!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
	</div>
	<div class="kontak" data-aos="fade-left" data-aos-duration="1000">
		<h1>Kontak</h1>
		<div class="alamat">
			<i class="fas fa-map-marker-alt fa-lg"></i>
			<span><?= $kontak[0]['alamat']; ?></span>
		</div>
		<div class="buka">
			<i class="fas fa-clock fa-lg"></i>
			<span><?= $kontak[0]['jam_open']; ?></span>
		</div>
		<div class="mail">
			<i class="fas fa-envelope fa-lg"></i>
			<span><?= $kontak[0]['mail']; ?></span>
		</div>
		<div class="telpon">
			<i class="fas fa-phone-square fa-lg"></i>
			<span><?= $kontak[0]['telepon']; ?></span>
		</div>
	</div>
</div>

<!-- JAVASCRIPT -->
<script>
	AOS.init({
		// Global settings:
		disable: 'mobile',
		once: true
	});
</script>

<!-- END SECTION -->
<?= $this->endSection(); ?>