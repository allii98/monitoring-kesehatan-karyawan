<div class="container-fluid">
    <div class="block-header">
        <h2><?= $tittle; ?></h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Laporan karyawan Covid 19
                    </h2>

                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form id="search-per-employee">
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control" name="nama" id="nama" required>
                                            <option selected disabled>Pilih ID</option>
                                            <?php foreach ($user as $u) : ?>
                                            <option value="<?= $u['kode'] ?>"><?= $u['kode'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

                                <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Proses</button>
                            </div>
                        </form>
                        <div class="col-md-12 result-search">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
// daterangepicker
$(document).ready(function() {


    $('#search-per-employee').on('submit', function(e) {
        e.preventDefault();
        let employeeId = $('#nama').val();
        console.log(employeeId)

        // cek jika karyawan sudah dipilih atau belum
        if (employeeId == null) {

            Swal.fire(
                'Id Karyawan belum dipilih.',
                'Anda harus memilih id karyawan',
                'warning'
            );

            return false;
        }

        // proses pdf
        $.get('<?= base_url("Report/process_per_employee/"); ?>' + employeeId, function(
            response) {
            $('.result-search').html(response);
        });
    });

});
</script>