<style type="text/css">
.row {
    margin-bottom: 8px;
}
</style>

<div class="col-md-12 text-right">
    <form id="print-per-employee">
        <input type="hidden" name="employeeId" value="<?= $employeeId; ?>">

        <button class="btn btn-primary"><i class="fa fa-print"></i> PDF</button>
    </form>
</div>
<br>
<h3 style="text-align: center;">LAPORAN MONITORING KARYAWAN TERPAPAR COVID 19</h3>
<br>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
                NAMA
            </div>
            <div class="col-md-1">
                <b>:</b>
            </div>
            <div class="col-md-2">
                <?= $data[0]['nama']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Jenis Isolasi
            </div>
            <div class="col-md-1">
                <b>:</b>
            </div>
            <div class="col-md-4">
                <?= $data[0]['jenis_isolasi']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Rumah Sakit
            </div>
            <div class="col-md-1">
                <b>:</b>
            </div>
            <div class="col-md-2">
                <?php if ($data[0]['rm_sakit'] === null) { ?>
                <b>-</b>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Kamar
            </div>
            <div class="col-md-1">
                <b>:</b>
            </div>
            <div class="col-md-2">
                <?php if ($data[0]['no_kamar'] === null) { ?>
                <b>-</b>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table2"
                    role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th>NO</th>
                            <th>Tanggal</th>
                            <th>Suhu</th>
                            <th>Oxygen</th>
                            <th>BAB(qty)</th>
                            <th>Batuk</th>
                            <th>Sesak</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        if (isset($data)) {
                            foreach ($data as $s) { ?>
                        <tr role="row" class="odd">
                            <td class="sorting_1"><?= $no++ ?></td>
                            <td><?= $s['tanggal'] ?></td>
                            <td><?= $s['suhu'] ?></td>

                            <td><?= $s['oksigen'] ?></td>
                            <td><?= $s['bab'] ?></td>
                            <td>
                                <?php if ($s['batuk'] == 1) { ?>
                                YES
                                <?php } else if ($s['batuk'] == 2) { ?>
                                NO
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($s['sesak'] == 1) { ?>
                                YES
                                <?php } else if ($s['sesak'] == 2) { ?>
                                NO
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

<script type="text/javascript">
$(document).ready(function() {
    $('#table2').DataTable();
});


/*
 * PRINT PDF
 */

// print per karyawan
$(document).on('click', '#print-per-employee', function(e) {
    e.preventDefault();

    var employeId = $('input[name="employeeId"]').val();

    // console.log(employeId)
    window.open('<?= base_url("Report/pdf_per_employee/"); ?>' + employeId);

});
</script>