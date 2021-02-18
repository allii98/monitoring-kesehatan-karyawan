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
                    <?php foreach ($sakit as $d) : ?>
                    <div class="row clearfix">
                        <form action="<?= base_url('Monitor/updatePost') ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="col-sm-12">

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="tanggal" name="tanggal" class="form-control"
                                            value="<?= date_format(date_create($d['tanggal']), 'Y-m-d'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="hidden" name="id" value="<?= $d['id_monitor'] ?>" id="">
                                        <input type="hidden" name="" value="<?= $d['id_karyawan'] ?>" id="">
                                        <input type="hidden" name="nama_user" id="nama-user">
                                        <select class=" form-control" name="nama" id="nama" required>
                                            <option selected disabled>Pilih Nama</option>
                                            <?php foreach ($user as $u) : ?>
                                            <option <?= $u['id_karyawan'] == $d['id_karyawan'] ? "selected" : "" ?>
                                                value="<?= $u['id_karyawan'] ?>"><?= $u['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                </div>
                                <label for="jn">Apakah anda memiliki gejala dibawah ini?</label>
                                <br>
                                <div class="form-group">

                                    <div class="demo-checkbox">
                                        <input type="checkbox" name="jenis_penyakit[]" value="1"
                                            <?= $d['jenis_penyakit'] == "demam" ? "checked" : ""  ?> id="a">
                                        <label for="a">Demam</label>
                                        <input type="checkbox" name="jenis_penyakit[]" value="2"
                                            <?= $d['jenis_penyakit'] == "batuk kering" ? "checked" : ""  ?> id="b">
                                        <label for="b">Batuk kering</label>
                                        <input type="checkbox" name="jenis_penyakit[]" value="3"
                                            <?= $d['jenis_penyakit'] == "pegal-pegal" ? "checked" : ""  ?> id="c">
                                        <label for="c">Pegal-pegal</label>
                                        <input type="checkbox" name="jenis_penyakit[]" value="4"
                                            <?= $d['jenis_penyakit'] == "sakit tenggorokan" ? "checked" : ""  ?> id="d">
                                        <label for="d">Sakit tenggorokan</label>
                                        <input type="checkbox" name="jenis_penyakit[]" value="5"
                                            <?= $d['jenis_penyakit'] == "pilek" ? "checked" : ""  ?> id="e">
                                        <label for="e">Pilek</label>
                                        <input type="checkbox" name="jenis_penyakit[]" value="6"
                                            <?= $d['jenis_penyakit'] == "lemas" ? "checked" : ""  ?> id="f">
                                        <label for="f">Lemas/letih</label>
                                        <input type="checkbox" name="jenis_penyakit[]" value="7"
                                            <?= $d['jenis_penyakit'] == "sakit kepala" ? "checked" : ""  ?> id="g">
                                        <label for="g">Sakit kepala</label>
                                        <input type="checkbox" name="jenis_penyakit[]" value="8"
                                            <?= $d['jenis_penyakit'] == "sesak nafas" ? "checked" : ""  ?> id="h">
                                        <label for="h">Sesak nafas</label>
                                        <input type="checkbox" name="jenis_penyakit[]" value="9"
                                            <?= $d['jenis_penyakit'] == "lainnya" ? "checked" : ""  ?> id="i">
                                        <label for="i">lainnya</label>
                                        <input type="text" id="lain" name="lain" value="<?= $d['isi_lainnya'] ?>"
                                            class="form-control" placeholder="Sebutkan jika memilih lainnya"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="obat">Obat</label>
                                    <div class="form-line">
                                        <textarea class="ckeditor" name="obat" id="ckedtor"><?= $d['obat'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="vitamin" name="vitamin" class="form-control"
                                            placeholder="Vitamin/Suplemen" value="<?= $d['vitamin'] ?>"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="form-line">
                                        <input type="text" id="kondisi" name="kondisi" class="form-control"
                                            placeholder="Kondisi Terakhir" value="<?= $d['kondisi'] ?>"
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="covid">Apakah Covid 19?</label>
                                    <div class="form-line">

                                        <select class=" form-control" name="covid" id="covid" required>
                                            <?php $cv = $this->input->post('covid') ? $this->input->post('covid') : $d['covid'] ?>
                                            <option value="1">Yes</option>
                                            <option value="2" <?= $cv == 2 ? 'selected' : null  ?>>No</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="jenis_isolasi[]" value="1"
                                        <?= $d['jenis_isolasi'] == "rawat inap" ? "checked" : ""  ?> id="rawat">
                                    <label for="rawat">Rawat inap</label>
                                    <input type="checkbox" name="jenis_isolasi[]" value="1"
                                        <?= $d['jenis_isolasi'] == "isolasi mandiri" ? "checked" : ""  ?> id="mandiri">
                                    <label for="mandiri">Isolasi Mandiri</label>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control" name="jenis_rawat" id="jn-rawat">
                                            <?php $rw = $this->input->post('jenis_rawat') ? $this->input->post('jenis_rawat') : $d['isi_isolasi_m'] ?>
                                            <option value="1">Rumah sendiri</option>
                                            <option value="2" <?= $rw == 'rumah sendiri' ? 'selected' : null  ?>>
                                                Disewakan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?= $d['rm_sakit'] ?>" name="rm"
                                            id="rm" autocomplete="off" placeholder="Nama Rumah Sakit">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?= $d['no_kamar'] ?>" name="nok"
                                            id="nok" placeholder="Nomer Kamar" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="3" name="alamat" class="form-control no-resize"
                                            placeholder="Alamat..."><?= $d['alamat'] ?></textarea>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="ktp">KTP, BPJS, KK</label>
                                    <div class="form-line">
                                        <input type="file" name="userfile[]" multiple="multiple">
                                    </div>
                                </div> -->

                                <button type="submit" class="btn bg-blue waves-effect">Update</button>
                                <button type="button" class="btn bg-black waves-effect waves-light"
                                    onclick="window.location='<?php echo base_url('Monitor') ?>'">Kembali</button>

                            </div>
                            <!-- <div class="col-sm-6">
                                
                            </div> -->
                        </form>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#i").click(function() {
        $("#lain").prop('required', true);
    });
    // $("#covid").("refresh");
    $("#rawat").click(function() {
        // var a = this.value;
        // console.log(a);
        $("#jn-rawat").prop('disabled', true);
        $("#rm").prop('disabled', false);
        $("#nok").prop('disabled', false);
    });
    $("#mandiri").click(function() {
        $("#rm").prop('disabled', true);
        $("#nok").prop('disabled', true);
        $("#jn-rawat").prop('disabled', false);
    });
});

$('#nama').change(function() {
    $.ajax({
        type: 'post',
        url: '<?= site_url('Monitor/getisinama'); ?>',
        data: {
            id: this.value
        },
        success: function(response) {
            // console.log(response)
            data = JSON.parse(response);
            $.each(data, function(index, value) {
                var opsi = value.nama;
                var res = opsi.substring(0, 9);
                var formattedDate = new Date();
                var d = formattedDate.getDate();
                var m = formattedDate.getMonth();
                m += 1;
                var y = formattedDate.getFullYear();
                var isi = res + d + m + y
                console.log(isi);
                $('#nama-user').val(isi);
            });

        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
});
</script>