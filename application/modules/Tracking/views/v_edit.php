<div class="container-fluid">
    <div class="block-header">
        <h2><?= $tittle; ?></h2>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Update Data
                    </h2>

                </div>
                <div class="body">
                    <?php foreach ($track as $d) : ?>
                    <div class="row clearfix">
                        <form action="<?= base_url('Tracking/updatePost') ?>" method="POST">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="hidden" name="id" value="<?= $d['id_tracking'] ?>" id="">
                                        <input type="hidden" name="" value="<?= $d['id_karyawan'] ?>" id="">
                                        <select class="form-control" name="namaPasien" id="namaPasien" required>
                                            <option selected disabled>Pilih Nama Pasien</option>
                                            <?php foreach ($pasien as $u) : ?>
                                            <option <?= $u['id_karyawan'] == $d['id_karyawan']  ? "selected" : "" ?>
                                                value="<?= $u['id_karyawan'] ?>"><?= $u['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="date" name="tanggal"
                                            value="<?= date_format(date_create($d['tanggal']), 'Y-m-d'); ?>"
                                            class="form-control" placeholder="Tanggal" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="time"
                                            value="<?= date_format(date_create($d['jam']), 'H:i:s'); ?>" name="jam"
                                            class="timepicker form-control" placeholder="Jam">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?= $d['nama_tracking'] ?>"
                                            name="nama" placeholder="Nama" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?= $d['lokasi'] ?>" name="lok"
                                            autocomplete="off" placeholder="Lokasi" required>
                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control" name="savety" id="" required>
                                            <option selected disabled>Savety</option>
                                            <option value="1">Masker</option>
                                            <option value="2">Faceshield</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?= $d['jarak'] ?>" name="jarak"
                                            placeholder="Jarak" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control" name="kondisi" id="" required>
                                            <option selected disabled>Kondisi Kesehatan</option>
                                            <option value="1">flue</option>
                                            <option value="2">demam</option>
                                            <option value="3">batuk</option>
                                            <option value="4">sesak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?= $d['suhu'] ?>" name="suhu"
                                            placeholder="Suhu" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?= $d['oksigen'] ?>"
                                            name="oksigen" autocomplete="off" placeholder="Oxygen" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn bg-green waves-effect">Update</button>
                                <button type="button" onclick="window.location='<?php echo base_url('Tracking') ?>'"
                                    class="btn bg-black waves-effect waves-light">Kembali</button>
                            </div>
                        </form>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(function() {
    $('#time').bootstrapMaterialDatePicker({
        date: false,
        format: 'HH:mm'
    });
    $('#date').bootstrapMaterialDatePicker({
        time: false
    });
});
</script>