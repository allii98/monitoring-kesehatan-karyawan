<div class="container-fluid">
    <div class="block-header">
        <h2><?= $tittle; ?></h2>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('status') ?>"></div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Masukkan data
                    </h2>

                </div>
                <div class="body">
                    <form action="<?= base_url('Home/simpan') ?>" method="POST">
                        <div class="col-md-12">
                            <label for="email_address">Tanggal</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal"
                                        onfocus="(this.type='date')" required>
                                </div>
                            </div>
                            <label for="nama">Nama</label>
                            <div class="form-group">
                                <div class="form-line">

                                    <select class="selectpicker form-control" name="nama" id="nama" required>
                                        <option selected disabled>Pilih Nama</option>
                                        <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u['id_user'] ?>"><?= $u['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <label for="jn">Apakah anda memiliki gejala dibawah ini?</label>
                            <br>
                            <div class="form-group">

                                <div class="demo-checkbox">
                                    <input type="checkbox" name="jenis_penyakit[]" value="1" id="a">
                                    <label for="a">Demam</label>
                                    <input type="checkbox" name="jenis_penyakit[]" value="2" id="b">
                                    <label for="b">Batuk kering</label>
                                    <input type="checkbox" name="jenis_penyakit[]" value="3" id="c">
                                    <label for="c">Pegal-pegal</label>
                                    <input type="checkbox" name="jenis_penyakit[]" value="4" id="d">
                                    <label for="d">Sakit tenggorokan</label>
                                    <input type="checkbox" name="jenis_penyakit[]" value="5" id="e">
                                    <label for="e">Pilek</label>
                                    <input type="checkbox" name="jenis_penyakit[]" value="6" id="f">
                                    <label for="f">Lemas/letih</label>
                                    <input type="checkbox" name="jenis_penyakit[]" value="7" id="g">
                                    <label for="g">Sakit kepala</label>
                                    <input type="checkbox" name="jenis_penyakit[]" value="8" id="h">
                                    <label for="h">Sesak nafas</label>
                                    <input type="checkbox" name="jenis_penyakit[]" value="9" id="i">
                                    <label for="i">lainnya</label>
                                    <input type="text" id="lain" name="lain" class="form-control"
                                        placeholder="Sebutkan jika memilih lainnya" autocomplete="off">
                                </div>
                            </div>
                            <label for="obat">Obat</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="obat" name="obat" class="form-control" placeholder="Obat"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <label for="kondisi">Kondisi Terakhir</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="kondisi" name="kondisi" class="form-control"
                                        placeholder="Kondisi Terakhir" autocomplete="off" required>
                                </div>
                            </div>
                            <label for="covid">Apakah Covid19 ?</label>
                            <div class="form-group">
                                <div class="form-line">

                                    <select class="selectpicker form-control" name="covid" id="covid" required>
                                        <option selected disabled>-Pilih-</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" id="tampil-covid">


                        </div>


                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Daftar Karyawan Sakit Hari ini (<?= date('d-m-Y') ?>)
                    </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable"
                                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr role="row">
                                                <th>NO</th>
                                                <th>Tanggal</th>
                                                <th>Nama</th>
                                                <th>Jenis Penyakit</th>
                                                <th>Obat</th>
                                                <th>Kondisi Terakhir</th>
                                                <th>Covid 19</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1;
                                            if (isset($sakit)) {
                                                foreach ($sakit as $s) { ?>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?= $no++ ?></td>
                                                <td><?= $s['tanggal'] ?></td>
                                                <td><?= $s['nama'] ?></td>
                                                <td><?= $s['jenis_penyakit'] ?></td>
                                                <td><?= $s['obat'] ?></td>
                                                <td><?= $s['kondisi'] ?></td>
                                                <td>
                                                    <?php if ($s['covid'] == 1) { ?>
                                                    <span class="label bg-red">YES</span>
                                                    <?php } else if ($s['covid'] == 2) { ?>
                                                    <span class="label bg-green">NO</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
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
});
$('#covid').change(function() {

    var covid = this.value;
    console.log(covid);


    if (covid == 1) {
        $('#tampil-covid').html(`
        <label for="suhu">Suhu</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="suhu" name="suhu" class="form-control" placeholder="Suhu"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <label for="oksigen">Oxygen</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="oksigen" name="oksigen" class="form-control"
                                        placeholder="Oxygen" autocomplete="off" required>
                                </div>
                            </div>
                            <label for="bab">BAB(qty)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="bab" name="bab" class="form-control" autocomplete="off"
                                        required>
                                </div>
                            </div>

                            <label for="batuk">Batuk</label>
                            <div class="form-group">
                                <div class="form-line">

                                    <select class="form-control" name="batuk" id="batuk" required>
                                        <option selected disabled>-Pilih-</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>

                                </div>
                            </div>
                            <label for="sesak">Sesak</label>
                            <div class="form-group">
                                <div class="form-line">

                                    <select class="form-control" name="sesak" id="sesak" required>
                                        <option selected disabled>-Pilih-</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>

                                </div>
                            </div>
                            <label for="sesak">Sesak</label>
                            <div class="form-group">
                                <div class="form-line">

                                    <select class="form-control" name="sesak" id="sesak" required>
                                        <option selected disabled>-Pilih-</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>

                                </div>
                            </div>

                          
        `);
    }
});


const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {

    swal.fire(
        "Success!",
        "Data " + flashData + " Disimpan",
        "success",
    );

}
</script>