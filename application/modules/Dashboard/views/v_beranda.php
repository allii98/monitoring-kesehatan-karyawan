<div class="container-fluid">
    <div class="block-header">
        <h2><?= $tittle; ?></h2>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('status') ?>"></div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h4 id="info"></h4>
                </div>
                <div class="body">
                    <form>
                        <label for="nama">Nama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control" name="id_user" id="nama" required>
                                    <option selected disabled>Pilih Nama</option>
                                    <?php foreach ($user as $u) : ?>
                                    <option value="<?= $u['id_user'] ?>"><?= $u['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <label for="suhu">Suhu</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="suhu" class="form-control" placeholder="Masukkan Suhu"
                                    autocomplete="off">
                            </div>
                        </div>
                        <label for="petugas">Petugas</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="petugas" name="petugas" class="form-control"
                                    placeholder="Nama Petugas" autocomplete="off">
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div style="text-align: center;">
                                <button type="button" id="masuk"
                                    class="btn btn-primary m-t-15 waves-effect">Masuk</button>
                                <button type="button" id="pulang"
                                    class="btn btn-success m-t-15 waves-effect">Pulang</button>
                            </div>

                        </div>
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
                        Monitoring suhu karyawan hari ini (<?= date('d-m-Y') ?>)
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
                                                <th>Pada Saat Masuk</th>
                                                <th>Petugas</th>
                                                <th>Pada Saat pulang</th>
                                                <th>Petugas</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1;
                                            if (isset($get)) {
                                                foreach ($get as $data) { ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no++ ?></td>
                                                <td><?= $data['tanggal'] ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['masuk'] ?></td>
                                                <td><?= $data['petugas1'] ?></td>
                                                <td><?= $data['keluar'] ?></td>
                                                <td><?= $data['petugas2'] ?></td>

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
    $("#suhu").prop('disabled', true);
    $("#petugas").prop('disabled', true);
    $('#masuk').attr('disabled', true);
    $('#pulang').attr('disabled', true);

});


$('#nama').change(function() {
    var id = this.value;
    // console.log(id);
    $.ajax({
        type: 'post',
        url: '<?= site_url('Dashboard/getisinama'); ?>',
        dataType: "JSON",
        beforeSend: function() {},
        cache: false,
        data: {
            id: this.value
        },
        success: function(data) {
            // console.log(data)
            if (data.status == false) {
                $('#info').empty();
                $('#info').append('<b>Anda belum mengisi data suhu hari ini!</b>');
                $('#masuk').attr('disabled', false);
                $("#suhu").prop('disabled', false);
                $("#petugas").prop('disabled', false);
            } else {
                $('#info').empty();
                $('#info').append('<b>Anda belum mengisi data suhu pulang!</b>');
                $('#masuk').attr('disabled', true);
                $('#pulang').attr('disabled', false);
                $("#suhu").prop('disabled', false);
                $("#petugas").prop('disabled', false);
                if (data.pulang != "") {
                    $('#info').empty();
                    $('#info').append(
                        '<Jangan>Anda telah mengisi suhu Pulang. Jangan lupa patuhi protokol kesehatan!</b>'
                    );
                    $("#suhu").prop('disabled', true);
                    $("#petugas").prop('disabled', true);
                    $('#masuk').attr('disabled', true);
                    $('#pulang').attr('disabled', true);
                }
            }


        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
});

$('#masuk').click(function() {
    var id_user = $('#nama').val();
    var suhu = $('#suhu').val();
    var petugas = $('#petugas').val();
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('Dashboard/suhu_masuk'); ?>",
        dataType: "JSON",
        beforeSend: function() {},
        cache: false,
        data: {
            'id_user': id_user,
            'masuk': suhu,
            'petugas1': petugas,
        },
        success: function(data) {
            swal.fire(
                "Success!",
                "Semoga sehat selalu :)",
                "success",
            );
            setInterval('location.reload()', 100);
        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
});

$('#pulang').click(function() {
    var id_user = $('#nama').val();
    var suhu = $('#suhu').val();
    var petugas = $('#petugas').val();
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('Dashboard/suhu_pulang'); ?>",
        dataType: "JSON",
        beforeSend: function() {},
        cache: false,
        data: {
            'id_user': id_user,
            'keluar': suhu,
            'petugas2': petugas,
        },
        success: function(data) {
            swal.fire(
                "Success!",
                "Jangan Lupa protokol kesehatan :)",
                "success",
            );
            setInterval('location.reload()', 100);
        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
});

// fungsi tampil modal edit
function suhuModalEdit(id_suhu) {
    $("#modal-update").modal();
    var url = "<?= base_url() ?>Dashboard/editsuhu/" + id_suhu;
    // console.log(url);
    $("#modal-edit-container").load(url);
}

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