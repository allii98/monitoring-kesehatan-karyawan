<div class="container-fluid">
    <div class="block-header">
        <h2><?= $tittle; ?></h2>
    </div>

    <div class="row clearfix">
        <?php foreach ($sakit as $s) : ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Data Karyawan Covid A/N <?= $s['nama'] ?>
                    </h2>

                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form action="<?= base_url('Monitor/updatePostCovid') ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="hidden" value="<?= $s['id_monitor'] ?>" name="id" id="">
                                        <input type="date" class="form-control" name="tgl"
                                            value="<?= date_format(date_create($s['tanggal']), 'Y-m-d'); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" name="jenis_isolasi[]" value="1" id="rawat">
                                    <label for="rawat">Rawat inap</label>&nbsp;&nbsp;
                                    <input type="checkbox" name="jenis_isolasi[]" value="2" id="mandiri">
                                    <label for="mandiri">Isolasi Mandiri</label>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="rm" id="rm"
                                            placeholder="Nama Rumah Sakit" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nok" id="nok"
                                            placeholder="Nomer Kamar" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control" name="jenis_rawat" id="b" required>
                                            <option selected disabled>-Pilih-</option>
                                            <option value="1">Rumah sendiri</option>
                                            <option value="2">Disewakan</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="3" name="alamat" class="form-control no-resize"
                                            placeholder="Alamat..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ktp">KTP, BPJS, KK</label>
                                    <div class="form-line">
                                        <input type="file" name="img" class="form-control">
                                        <input type="hidden" name="ktp2" value="" class="form-control">
                                    </div>
                                </div>

                                <button type="submit" class="btn bg-blue waves-effect">Simpan</button>
                                <button type="button" onclick="window.location='<?php echo base_url('Monitoring') ?>'"
                                    class="btn bg-black waves-effect waves-light">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
$(document).ready(function() {
    // $("#covid").selectpicker("refresh");
    $("#rawat").click(function() {
        $("#b").prop('disabled', true);
        $("#rm").prop('disabled', false);
        $("#nok").prop('disabled', false);
    });
    $("#mandiri").click(function() {
        $("#rm").prop('disabled', true);
        $("#nok").prop('disabled', true);
        $("#b").prop('disabled', false);
    });
});
</script>