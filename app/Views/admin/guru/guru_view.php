<?= $this->section('link'); ?>

<!-- SECTION CSS -->
<link rel="stylesheet" href="/assets/css/admin/guru.css">

<!-- SECTION JAVASCRIPT -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?= $this->endSection(); ?>

<!-- SECTION CONTENT -->
<?= $this->extend('/admin/admin_layout'); ?>
<?= $this->section('content'); ?>

<div class="container text-blue">
    <div class="breadcrumb">
        <ul>
            <li><i class="fas fa-school fa-sm text-blue"></i></li>
            <li>Profil</li>
            <li>/</li>
            <li>Tenaga Pendidikan</li>
        </ul>
    </div>

    <section>
        <button type="button" class="btn-add text-white">Tambah Data</button>
        <table>
            <thead>
                <tr class="text-white">
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Keterangan</>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($guru as $g) : ?>
                    <tr class="row-data">
                        <td><?= $no; ?></td>
                        <td><img src="/assets/img/<?= $g->gambar; ?>" alt="<?= $g->gambar; ?>"></td>
                        <td><?= $g->nama; ?></td>
                        <td><?= $g->jabatan; ?></td>
                        <td>
                            <button type="button" class="btn-view text-white" onclick="viewGaleri(<?= $g->id_guru; ?>)">View</button>
                            <button type="button" class="btn-edit text-white" onclick="editData(<?= $g->id_guru; ?>)">Edit</button>
                            <button type="button" class="btn-delete text-white" onclick="deleteData('<?= $g->id_guru; ?>')">Delete</button>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </section>
</div>

<!-- MODAL BOX FOR ADD -->
<div class="modal modal-form modal-add">
    <div class="modal-content">
        <form method="post" action="/guru/addGuru" id="form" enctype="multipart/form-data">
            <button type="button" class="btn-close"><i class="fas fa-times-circle fa-4x text-red"></i></button>
            <img id="gambar" src="" alt="Tidak ada gambar">
            <input type="file" onchange="previewFile(this);" name="gambar" id="input-gambar">

            <label for="nama" class="text-blue">Nama</label>
            <input type="text" id="nama" name="nama">

            <label for="jabatan" class="text-blue">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan">

            <!-- <label for="tanggal" class="text-blue">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal"> -->

            <button type="submit" id="btn" class="btn-add-data btn-add text-white">Tambah</button>
        </form>
    </div>
</div>

<!-- MODAL BOX FOR view -->
<div class="modal modal-view">
    <img src="" alt="" class="gambar">
    <div class="jabatan">
    </div>
    <!-- <div class="modal-content">
        <button type="button" class="btn-close"><i class="fas fa-times-circle fa-4x text-red"></i></button>
    </div> -->
</div>

<!-- MODAL BOX FOR EDIT -->
<div class="modal modal-form modal-edit">
    <div class="modal-content">
        <form method="post" action="/guru/updateGuru" id="form" enctype="multipart/form-data">
            <button type="button" class="btn-close"><i class="fas fa-times-circle fa-4x text-red"></i></button>
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="gambar-lama" name="gambar-lama">

            <img id="gambar-edit" src="" alt="Tidak ada gambar">
            <input type="file" onchange="previewEdit(this);" name="gambar" id="input-gambar-edit">

            <label for="nama" class="text-blue">Nama</label>
            <input type="text" id="nama" name="nama">

            <label for="jabatan" class="text-blue">jabatan</label>
            <input type="text" id="jabatan" name="jabatan">

            <button type="submit" id="btn" class="btn-edit-data btn-edit text-white">Edit</button>
        </form>
    </div>
</div>

<script>
    $('.modal').css("height", "100vh"); //MENAMBAHKAN ATRIBUT HEIGHT PADA MODAL BOX

    $('.modal-view').hide(); //HIDE MODAL-VIEW 

    // BUTTON CLOSE MODAL BOX
    $('.btn-close').click(function() {
        $('.modal').fadeOut(500); //CLOSE MODAL
    });

    // BUTTON CLOSE MODAL BOX ADD
    $('.modal-form').hide(); //HIDE MODAL-ADD
    $('.btn-close').click(function() {
        $('.modal-add').fadeOut(500);
    });

    //BUTTON FOR ADD DATA
    $('.btn-add').click(function() {
        $('.modal-add').fadeIn(500); // OPEN MODAL-ADD
    });


    // FUNCTION PREVIEW GAMBAR
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];
        let namaGambar = $("#input-gambar").val().replace(/C:\\fakepath\\/i, '');
        let extGambar = namaGambar.split(".").pop().toLowerCase();
        // $('.modal').css("height", "");

        //  Jika mengklik .modal maka akan menutup modal
        // $('.modal').click(function() {
        //     $('.modal').fadeOut();
        // });

        if (jQuery.inArray(extGambar, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            swal({
                title: "File yang anda masukkan bukan gambar!",
                text: "Ganti file berformat gambar",
                icon: "info"
            });
            $("#gambar").attr("src", "");
        } else {
            let sizeImage = document.getElementById("input-gambar").files[0].size;

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
                    $("#gambar").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }

        }
    };


    // FUNCTION PREVIEW EDIT GAMBAR
    function previewEdit(input) {
        var file = $("#input-gambar-edit").get(0).files[0];
        let namaGambar = $("#input-gambar-edit").val().replace(/C:\\fakepath\\/i, '');
        let extGambar = namaGambar.split(".").pop().toLowerCase();
        //$('.modal').css("height", "");

        if (jQuery.inArray(extGambar, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            swal({
                title: "File yang anda masukkan bukan gambar!",
                text: "Ganti file berformat gambar",
                icon: "info"
            });
            $("#gambar-edit").attr("src", "");
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

    //FUNCTION EDIT DATA
    function editData(data) {
        $('.modal-edit').fadeIn(500); //OPEN MODAL-VIEW
        var id = data;

        //MENAMPILKAN ISI DATA
        $.ajax({
            url: '/guru/viewGuru',
            type: 'POST',
            data: {
                id_guru: id
            },
            success: function(result) {
                let dataRow = JSON.parse(result);
                $('.modal-edit #id').val(dataRow.id_guru);
                $('.modal-edit #gambar-edit').attr("src", "/assets/img/" + dataRow.gambar);
                $('.modal-edit #gambar-edit').attr("alt", dataRow.gambar);
                $('.modal-edit #gambar-lama').val(dataRow.gambar);
                $('.modal-edit #nama').val(dataRow.nama);
                $('.modal-edit #jabatan').val(dataRow.jabatan);
            }
        });
    }


    //Function VIEW DATA
    function viewGaleri(id) {
        $('.modal-view').fadeIn(500); //OPEN MODAL-VIEW
        $.ajax({
            url: '/guru/viewGuru',
            type: 'POST',
            data: {
                id_galeri: id
            },
            success: function(result) {
                let dataRow = JSON.parse(result);
                $('.modal-view .gambar').attr("src", "/assets/img/" + dataRow.gambar);
                $('.modal-view .gambar').attr("alt", dataRow.gambar);
                $('.modal-view .jabatan').html(dataRow.jabatan);
            }
        });
    };

    //Function DELETE DATA
    function deleteData(id) {
        swal({
                title: "Apakah anda yakin menghapus data?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                //  JIKA USER MENEKAN TOMBOL DELETE MAKA AKAN MENAMPILKAN NOTIF "Data Berhasil dihapus!"
                if (willDelete) {
                    $.ajax({
                        url: '/guru/deleteGuru',
                        type: 'POST',
                        data: {
                            id_guru: id
                        },
                        success: function() {
                            swal("Data Berhasil dihapus!", {
                                icon: "success",
                            }).then((deleted) => {
                                if (deleted) {
                                    location.reload();
                                } else {
                                    location.reload();
                                }
                            });
                        }
                    });

                }
            });
    }
</script>
<?= $this->endSection(); ?>