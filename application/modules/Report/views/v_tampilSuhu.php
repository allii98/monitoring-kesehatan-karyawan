<style type="text/css">
.row {
    margin-bottom: 8px;
}
</style>

<div class="col-md-12 text-right">
    <form id="print-suhu-employee">
        <input type="hidden" name="employeeId" value="<?= $employeeId; ?>">
        <input type="hidden" name="startDate" value="<?= $startDate; ?>">
        <input type="hidden" name="endDate" value="<?= $endDate; ?>">
        <button class="btn btn-primary"><i class="fa fa-print"></i> PDF</button>
    </form>
</div>
<br>
<h3 style="text-align: center;">LAPORAN MONITORING SUHU KARYAWAN</h3>
<h4 style="text-align: center;">PERIODE <?= $period; ?></h4>
<br>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                Jumlah Hari Terpilih
            </div>
            <div class="col-md-1">
                <b>:</b>
            </div>
            <div class="col-md-2">
                <?= $days; ?> Hari
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
                            <th>Nama</th>
                            <th>Pada Saat Masuk</th>
                            <th>Petugas</th>
                            <th>Pada Saat Pulang</th>
                            <th>Petugas</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        if (isset($data)) {
                            foreach ($data as $s) { ?>
                        <tr role="row" class="odd">
                            <td><?= $no++ ?></td>
                            <td><?= $s['tanggal'] ?></td>
                            <td><?= $s['nama'] ?></td>
                            <td><?= $s['masuk'] ?></td>
                            <td><?= $s['petugas1'] ?></td>
                            <td><?= $s['keluar'] ?></td>
                            <td><?= $s['petugas2'] ?></td>

                        </tr>
                        <?php }
                        } ?>
                    </tbody>
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



$(document).on('click', '#print-suhu-employee', function(e) {
    e.preventDefault();

    var employeId = $('input[name="employeeId"]').val();
    var startDate = $('input[name="startDate"]').val();
    var endDate = $('input[name="endDate"]').val();

    window.open('<?= base_url("Report/pdf_suhu_employee/"); ?>' + startDate + '/' + endDate + '/' +
        employeId);

});
</script>