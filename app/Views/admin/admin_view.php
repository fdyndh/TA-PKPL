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
            <li>Mengelolah Akun</li>
        </ul>
    </div>

    <section>
        <table>
            <tbody>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" id="username" name="username" value="<?= $admin[0]['username']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="text" id="password" name="password" value="<?= $admin[0]['password']; ?>"></td>
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
            url: '/admin/updateData',
            type: 'POST',
            data: {
                username: $("#username").val(),
                password: $("#password").val(),
            },
            success: notyf.success('Data berhasil diupdate!')
        });
    });
</script>

<?= $this->endSection(); ?>