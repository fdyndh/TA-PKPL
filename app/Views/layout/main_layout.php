<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/main_layout.css">
    <link rel="stylesheet" href="/assets/font-awesome/css/all.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->

    <!-- SCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- SECTION FOR CSS & JAVASCRIPT-->
    <?= $this->renderSection('link'); ?>

    <title><?= $title; ?></title>
</head>

<body>

    <nav class="navbar">
        <div class="container-navbar">
            <h3 class="text-green">SDN 012 MUARA JAWA</h3>
            <div class="menu">
                <i class="fas fa-times-circle fa-lg" onclick="closeMenu()"></i>
                <a href="/home/beranda" class="first-link">Beranda</a>
                <div class="dropdown">
                    <a>Profil<i class="fas fa-angle-down fa-sm"></i></a>
                    <div class="dropdown-menu">
                        <a href="/home/profil/s" class="text-green">Sejarah</a>
                        <a href="/home/profil/prestasi" class="text-green">Prestasi</a>
                        <a href="/home/profil/guru" class="text-green">Tenaga Pendidikan</a>
                    </div>
                </div>
                <a href="/home/berita">Berita</a>
                <!-- <a href="/guru">Guru</a> -->
                <a href="/home/galeri">Galeri</a>
                <a class="/home/kontak" href="/#kontak">Kontak</a>
                <div class="search-box">
                    <input type="text" placeholder="Search">
                    <button type="submit" class="fas fa-search"></i></button>
                </div>
            </div>
            <i class="fas fa-bars fa-lg" onclick="openMenu()"></i>
        </div>
    </nav>

</body>

<!-- SECTION -->
<?= $this->renderSection('content'); ?>

<footer class="footer">
    <p>Copyright© 2021 | Designed by <span>Ace Dev</span></p>
    <p>Term Service | Privacy Police</p>
</footer>


<script>
    //FUNCTION UNTUK NAVBAR MOBILE
    function openMenu() {
        document.querySelector(".container-navbar .menu").style.width = "14rem";
    }

    function closeMenu() {
        document.querySelector(".menu").style.width = "";
    }

    //SHRINK NAVBAR
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            document.querySelector(".navbar").style.paddingTop = "0";
            document.querySelector(".navbar").style.paddingBottom = "0";
        } else {
            document.querySelector(".navbar").style.paddingTop = "10px";
            document.querySelector(".navbar").style.paddingBottom = "10px";
        }
    }


    // FUNCTION UNTUK SMOOTH SCROLL KONTAK
    $('.kontak').click(function(e) {

        var linkHref = $(this).attr("href");
        var idElement = linkHref.substr(linkHref.indexOf("#"));
        $('html, body').animate({
            scrollTop: $(idElement).offset().top
        }, 800, function() {
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location = idElement;
        });
    });
</script>

</html>