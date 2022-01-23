<?= $this->section('link'); ?>

<!-- SECTION CSS -->
<link rel="stylesheet" href="/assets/css/admin/kontak.css">
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
            <li><i class="fas fa-address-book"></i></li>
            <li>Kontak</li>
        </ul>
    </div>

    <section>
        <table>
            <tbody>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td><input type="text" id="alamat" name="alamat" value="<?= $kontak[0]['alamat']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="jamopen">Jam Operasional</label></td>
                    <td><input type="text" id="jamopen" name="jamopen" value="<?= $kontak[0]['jam_open']; ?>"></td>
                </tr>
                <tr>
                    <td><label for=" mail">Mail</label></td>
                    <td><input type="text" id="mail" name="mail" value="<?= $kontak[0]['mail']; ?>"></td>
                </tr>
                <tr>
                    <td><label for=" telepon">Telepon</label></td>
                    <td><input type="text" id="telepon" name="telepon" value="<?= $kontak[0]['telepon']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="button" class="btn-edit text-white">Update</button></td>
                </tr>
            </tbody>
        </table>
    </section>
</div>

<script>
    //NOTIFICATION
    var notyf = new Notyf({
        duration: 4000,
        dismissible: true
    });

    $(".btn-edit").click(function() {
        $.ajax({
            url: '/kontak/updateData',
            type: 'POST',
            data: {
                alamat: $("#alamat").val(),
                jam_open: $("#jamopen").val(),
                mail: $("#mail").val(),
                telepon: $("#telepon").val()
            },
            success: notyf.success('Data berhasil diupdate!')
        });
    });
</script>

<?= $this->endSection(); ?>