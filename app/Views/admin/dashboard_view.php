<?= $this->section('link'); ?>

<!-- SECTION CSS -->
<link rel="stylesheet" href="/assets/css/admin/dashboard.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

<!-- SECTION JAVASCRIPT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<?= $this->endSection(); ?>

<!-- SECTION CONTENT -->
<?= $this->extend('/admin/admin_layout'); ?>
<?= $this->section('content'); ?>

<div class="container text-blue">
    <div class="breadcrumb">
        <ul>
            <li><i class="fas fa-home"></i></li>
            <li>Dashboard</li>
        </ul>
    </div>

    <section>
        <form class="modal-content" method="post" action="/dashboard/updateData" enctype="multipart/form-data">

            <input type="hidden" id="gambar-lama" name="gambar-lama" value="<?= $sambutan[0]['gambar']; ?>">
            <img id="gambar-edit" src="/assets/img/<?= $sambutan[0]['gambar']; ?>" alt="Tidak ada gambar">
            <input type="file" onchange="previewFile(this);" name="gambar" id="input-gambar-edit">

            <label for="nama" class="text-blue">Nama Kepsek</label>
            <input type="text" id="nama" name="nama" value="<?= $sambutan[0]['nama_kepsek']; ?>">

            <label for="lokasi" class="text-blue">Lokasi dan Tanggal</label>
            <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Indonesia" value="<?= $sambutan[0]['lokasi']; ?>">

            <label for="isi" class="text-blue">Kata Sambutan</label>
            <textarea id="kata" name="kata" rows="8" cols="50"><?= $sambutan[0]['kata_sambutan']; ?></textarea>
            <button type="submit" id="btn" class="btn-edit-data btn-edit text-white">Edit</button>
        </form>
    </section>
</div>

<script>
    //NOTIFICATION
    var notyf = new Notyf({
        duration: 4000,
        dismissible: true
    });

    // $(".btn-edit").click(function() {
    //     $.ajax({
    //         url: '/dashboard/updateData',
    //         type: 'POST',
    //         data: {
    //             gambarLama: $("#gambar-lama").val(),
    //             gambar: $("#input-gambar-edit").val(),
    //             kata_sambutan: $("#kata").val(),
    //             lokasi: $("#lokasi").val(),
    //             nama: $("#nama").val()
    //         },
    //         success: notyf.success('Data berhasil diupdate!')
    //     });
    // });

    // FUNCTION PREVIEW GAMBAR
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];
        let namaGambar = $("#input-gambar-edit").val().replace(/C:\\fakepath\\/i, '');
        let extGambar = namaGambar.split(".").pop().toLowerCase();

        if (jQuery.inArray(extGambar, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            swal({
                title: "File yang anda masukkan bukan gambar!",
                text: "Ganti file berformat gambar",
                icon: "info"
            });
            // $("#gambar").attr("src", "");
            console.log(namaGambar);
        } else {
            let sizeImage = document.getElementById("input-gambar-edit").files[0].size;

            //Mengecek apakah size kurang dari 2.5mb
            if (sizeImage > 2500000) {
                swal({
                    title: "Maaf size gambar terlalu besar!",
                    text: "Kompres gambar agar size menjadi kecil :)",
                    icon: "info"
                });
            } else {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#gambar-edit").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }

        }
    };
</script>
<?= $this->endSection(); ?>