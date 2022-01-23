<?= $this->section('link'); ?>

<!-- SECTION CSS -->
<link rel="stylesheet" href="/assets/css/admin/post.css">

<!-- SECTION JAVASCRIPT -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<?= $this->endSection(); ?>

<!-- SECTION CONTENT -->
<?= $this->extend('/admin/admin_layout'); ?>
<?= $this->section('content'); ?>

<div class="container text-blue">
    <div class="breadcrumb">
        <ul>
            <li><i class="fas fa-newspaper"></i></li>
            <li>Berita & Pengumuman</li>
        </ul>
    </div>

    <section>
        <button type="button" class="btn-add text-white">Tambah Post</button>
        <table>
            <thead>
                <tr class="text-white">
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul Post</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($posts as $post) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><img src="/assets/img/<?= $post->gambar; ?>" alt="<?= $post->gambar; ?>"></td>
                        <td><?= $post->judul; ?></td>
                        <td><?= ucwords($post->kategori); ?></td>
                        <td>
                            <button type="button" class="btn-view text-white" onclick="viewData(<?= $post->id_post; ?>)">View</button>
                            <button type="button" class="btn-edit text-white" onclick="editData(<?= $post->id_post; ?>)">Edit</button>
                            <button type="button" class="btn-delete text-white" onclick="deleteData('<?= $post->id_post; ?>', '<?= $post->judul; ?>')">Delete</button>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </section>
</div>

<!-- MODAL BOX FOR ADD -->
<div class="modal modal-add">
    <div class="modal-content">
        <form action="/post/addPost" method="POST" enctype="multipart/form-data">
            <button type="button" class="btn-close"><i class="fas fa-times-circle fa-4x text-red"></i></button>
            <img id="previewImg" src="" alt="Tidak ada gambar">
            <input type="file" onchange="previewFile(this);" name="gambar">
            <label for="judul" class="text-blue">Judul</label>
            <input type="text" id="judul" name="judul">

            <label for="tanggal" class="text-blue">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal">

            <label for="kategori" class="text-blue">Kategori</label>
            <input type="text" id="kategori" name="kategori">

            <label for="isi" class="text-blue">Isi Post</label>
            <textarea id="editor" name="isi" rows="4" cols="50"></textarea>
            <button type="submit" class="btn-add-data btn-add text-white">Tambah</button>
        </form>
    </div>
</div>

<!-- MODAL BOX FOR view -->
<div class="modal modal-view text-black">
    <div class="modal-content">
        <button type="button" class="btn-close"><i class="fas fa-times-circle fa-4x text-red"></i></button>
        <img src="" alt="" id="gambar-view">
        <h2 id="judul-view"></h2>
        <span id="tgl-view"><i class="fas fa-calendar-alt"></i></span>
        <p id="isi"></p>
    </div>
</div>

<!-- MODAL BOX FOR EDIT -->
<div class="modal modal-edit">
    <div class="modal-content">
        <form action="/post/updatePost" method="POST" enctype="multipart/form-data">
            <button type="button" class="btn-close"><i class="fas fa-times-circle fa-4x text-red"></i></button>
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="gambar-lama" name="gambar-lama">

            <img id="gambar-edit" src="" alt="Tidak ada gambar">
            <input type="file" onchange="previewEdit(this);" name="gambar" id="input-gambar-edit">

            <label for="judul" class="text-blue">Judul</label>
            <input type="text" id="judul-edit" name="judul">

            <div class="date-loc">
                <div class="date">
                    <label for="tanggal" class="text-blue">Tanggal</label>
                    <input type="date" id="tgl-edit" name="tanggal">
                </div>
                <div class="kategori">
                    <label for="kategori" class="text-blue">Kategori</label>
                    <input type="text" id="kategori" name="kategori">
                </div>
            </div>

            <label for="isi" class="text-blue">Isi Post</label>
            <textarea id="isi-edit" name="isi" rows="4" cols="50"></textarea>
            <button type="submit" class="btn-edit-data btn-edit text-white">Edit</button>
        </form>
    </div>
</div>

<!-- <script src="/ckfinder/ckeditor5-ckfinder/src/ckfinder.js"></script> -->
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    //BUTTON VIEW, OPEN MODAL BOX ADD
    $('.btn-add').click(function() {
        $('.modal-add').fadeIn(500);
        $('.modal').css("height", "100vh"); //MENAMBAHKAN ATRIBUT HEIGHT PADA MODAL BOX
    })

    // BUTTON CLOSE MODAL BOX ADD
    $('.modal-add').hide();
    $('.btn-close').click(function() {
        $('.modal-add').fadeOut(500);
    });

    // BUTTON TAMBAH DATA POST
    $('.btn-add-data').click(function() {
        $('#result').append(editor.getData());
    });

    function previewFile(input) {
        $('.modal').css("height", "");
        var file = $("input[type=file]").get(0).files[0];
        console.log(file);
        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }


    //Function VIEW DATA
    $('.modal-view').hide(); //OPEN MODAL-VIEW
    function viewData(data) {
        $('.modal').css("height", ""); //MENAMBAHKAN ATRIBUT HEIGHT PADA MODAL BOX
        $('.modal-view').fadeIn(500); //OPEN MODAL-VIEW
        $.ajax({
            url: '/post/viewPost',
            type: 'POST',
            data: {
                id_post: data
            },
            success: function(result) {
                let dataRow = JSON.parse(result);
                $('.modal-view #gambar-view').attr("src", "/assets/img/" + dataRow.gambar);
                $('.modal-view #gambar-view').attr("alt", dataRow.gambar);
                $('.modal-view #judul-view').html(dataRow.judul);
                $('.modal-view #tgl-view').append(dataRow.tanggal);
                $('.modal-view #isi').html(dataRow.isi);
            }
        });
    };

    // BUTTON CLOSE MODAL BOX EDIT
    $('.modal-edit').hide();
    // $('.modal-edit').css("height", "100vh");

    var editor;

    ClassicEditor
        .create(document.querySelector('#isi-edit'))
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });


    //FUNCTION EDIT DATA
    function editData(data) {
        $('.modal-edit').fadeIn(500); //OPEN MODAL-VIEW
        $('.modal').css("height", "");
        var id = data;

        //MENAMPILKAN ISI DATA
        $.ajax({
            url: '/post/viewPost',
            type: 'POST',
            data: {
                id_post: id
            },
            success: function(result) {
                let dataRow = JSON.parse(result);
                $('.modal-edit #id').val(dataRow.id_post);
                $('.modal-edit #gambar-lama').val(dataRow.gambar);
                $('.modal-edit #gambar-edit').attr("src", "/assets/img/" + dataRow.gambar);
                $('.modal-edit #gambar-edit').attr("alt", dataRow.gambar);
                $('.modal-edit #judul-edit').val(dataRow.judul);
                $('.date #tgl-edit').val(dataRow.tanggal);
                $('.kategori #kategori').val(dataRow.kategori);
                editor.setData(dataRow.isi);
            }
        });
    }

    // FUNCTION PREVIEW GAMBAR
    function previewEdit(input) {
        var file = $("#input-gambar-edit").get(0).files[0];
        let namaGambar = $("#input-gambar-edit").val().replace(/C:\\fakepath\\/i, '');
        let extGambar = namaGambar.split(".").pop().toLowerCase();
        $('.modal').css("height", "");

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

    //Function DELETE DATA
    function deleteData(id, judul) {
        swal({
                title: "Apakah anda yakin menghapus data?",
                text: "Judul : " + judul,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                //  JIKA USER MENEKAN TOMBOL DELETE MAKA AKAN MENAMPILKAN NOTIF "Data Berhasil dihapus!"
                if (willDelete) {
                    $.ajax({
                        url: '/post/deletePost',
                        type: 'POST',
                        data: {
                            id_post: id
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

    $('.btn-close').click(function() {
        $('.modal').fadeOut(500);
    });
</script>

<?= $this->endSection(); ?>