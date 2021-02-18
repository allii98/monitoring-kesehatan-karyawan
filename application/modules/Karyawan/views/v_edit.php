<?php foreach ($karyawan as $d) : ?>
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Update data karyawan</h4>
    </div>
    <form action="<?= base_url('Karyawan/update') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <div class="form-line">
                    <input type="hidden" name="nama_user" value="<?= $d->nama ?>" id="user">
                    <input type="hidden" name="id" value="<?= $d->id_karyawan ?>">
                    <input type="hidden" name="id_user" value="<?= $d->id_user ?>">
                    <select class="form-control" name="nama" id="name" required>
                        <option selected disabled>Pilih Nama</option>
                        <?php foreach ($user as $u) : ?>
                        <option <?= $u['id_user'] == $d->id_user  ? "selected" : "" ?> value="<?= $u['id_user'] ?>">
                            <?= $u['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ktp">KTP, KK, BPJS</label>
                <div class="form-line">
                    <input type="file" name="userfile[]" multiple="multiple">
                    <input type="hidden" name="ktp" value="<?= $d->ktp ?>">
                    <input type="hidden" name="kk" value="<?= $d->kk ?>">
                    <input type="hidden" name="bpjs" value="<?= $d->bpjs ?>">
                </div>
            </div>


        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect">Update</button>
            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
        </div>
    </form>
</div>
<?php endforeach; ?>

<script>
$('#name').change(function() {
    $.ajax({
        type: 'post',
        url: '<?= site_url('Karyawan/getisikar'); ?>',
        data: {
            id: this.value
        },
        success: function(response) {
            // $('#id-user').val('');
            data = JSON.parse(response);
            $.each(data, function(index, value) {
                var opsi = value.nama;
                console.log(opsi)
                $('#user').val(opsi);

            });

        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
});
</script>