<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/font-awesome/css/all.css">
    <link rel="stylesheet" href="/assets/css/admin/admin_layout.css">

    <!-- JAVASCRIPT -->


    <!-- SECTION FOR CSS & JAVASCRIPT-->
    <?= $this->renderSection('link'); ?>

    <title>Dashboard</title>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h1 class="text-white">Ace Dev</h1>

        <a href="/dashboard" class="text-white"><i class="fas fa-home fa-sm text-white"></i> Dashboard</a>
        <div class="dropdown">
            <span class="btn-profil text-white"><i class="fas fa-school fa-sm text-white"></i> Profil</span><i class="fas fa-sort-down text-white"></i>
            <div class="dropdown-items">
                <a href="/sejarah" class="text-white">Sejarah</a>
                <a href="/prestasi" class="text-white">Prestasi</a>
                <a href="/guru" class="text-white">Tenaga Pendidikan</a>
            </div>
        </div>
        <a href="/post/" class="text-white"><i class="fas fa-newspaper fa-sm text-white"></i> Berita & Pengumuman</a>
        <a href="/galeri" class="text-white"><i class="fas fa-images fa-sm text-white"></i> Galeri</a>
        <a href="/kontak" class="text-white"><i class="fas fa-address-book fa-sm text-white"></i> Kontak</a>
        <a href="/Admin" class="text-white"><i class="fas fa-user-circle fa-sm text-white"></i> Akun</a>
    </aside>

    <!-- NAVBAR -->
    <nav class="text-blue">
        <div class="menu-hamburger">
            <button id="btn-open" class="text-blue" onclick="openNav()"><i class="fas fa-bars fa-lg"></i></button>
            <h2>Hello Admin</h2>
        </div>
        <a href="/login/logout" class="logout text-blue">Logout<i class="fas fa-sign-out-alt"></i></a>
    </nav>

    <!-- SECTION -->
    <?= $this->renderSection('content'); ?>

    <script src="/assets/js/admin.js"></script>
</body>

</html>