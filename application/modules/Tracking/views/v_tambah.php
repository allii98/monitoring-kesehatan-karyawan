<div class="container-fluid">
    <div class="block-header">
        <h2><?= $tittle; ?></h2>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Masukkan Data
                    </h2>

                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form action="<?= base_url('Tracking/simpan') ?>" method="POST">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control" name="namaPasien" id="namaPasien" required>
                                            <option selected disabled>Pilih Nama Pasien</option>
                                            <?php foreach ($pasien as $u) : ?>
                                            <option value="<?= $u['id_karyawan'] ?>"><?= $u['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="date" name="tanggal" class="form-control"
                                            placeholder="Tanggal" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="time" name="jam" class="timepicker form-control"
                                            placeholder="Jam">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama"
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="lok" autocomplete="off"
                                            placeholder="Lokasi" required>
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
                                        <input type="text" class="form-control" name="jarak" placeholder="Jarak"
                                            autocomplete="off" required>
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
                                        <input type="text" class="form-control" name="suhu" placeholder="Suhu"
                                            autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="oksigen" autocomplete="off"
                                            placeholder="Oxygen" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn bg-blue waves-effect">Simpan</button>
                                <button type="button" onclick="window.location='<?php echo base_url('Tracking') ?>'"
                                    class="btn bg-black waves-effect waves-light">Kembali</button>
                            </div>
                        </form>
                    </div>
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