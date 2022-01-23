<?= $this->section('link'); ?>

<!-- SECTION CSS -->
<link rel="stylesheet" href="/assets/css/admin/profil/sejarah.css">

<!-- SECTION JAVASCRIPT -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
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
            <li>Sejarah</li>
        </ul>
    </div>

    <section>
        <label for="sejarah" class="text-blue">Sejarah</label>
        <textarea name="keterangan" id="sejarah" cols="10" rows="10" spellcheck="false"><?= $sejarah[0]['keterangan']; ?></textarea>
        <label for="visi" class="visi">Visi</label>
        <input type="text" id="visi" value="<?= $sejarah[0]['visi']; ?>">
        <input type="hidden" name="misi" id="misi" value="<?= $sejarah[0]['misi']; ?>">
        <label for="editor" class="misi">Misi</label>
        <textarea name="ckeditor" id="ckeditor" cols="30" rows="10" class="text-black"></textarea>
        <button type="submit" class="btn-edit text-white">Edit</button>
    </section>

</div>
<script>
    let editor;
    ClassicEditor
        .create(document.querySelector('#ckeditor'))
        .then(newEditor => {
            editor = newEditor;
            editor.setData($('#misi').val());

        })
        .catch(error => {
            console.error(error);
        });

    $('.btn-edit').click(function() {
        $.ajax({
            url: '/sejarah/updateSejarah',
            type: 'POST',
            data: {
                keterangan: $('#sejarah').val(),
                visi: $('#visi').val(),
                misi: editor.getData()
            },
            success: swal("Data Berhasil diedit!", {
                icon: "success",
            })
        });
    });
</script>

<?= $this->endSection(); ?>