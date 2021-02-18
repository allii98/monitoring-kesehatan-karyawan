<div class="container-fluid">
    <div class="block-header">
        <h2><?= $tittle; ?></h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Laporan Suhu Karyawan
                    </h2>

                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form id="search-per-employee">
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control" name="nama" id="nama" required>
                                            <option selected disabled>Pilih Nama</option>
                                            <?php foreach ($user as $u) : ?>
                                            <option value="<?= $u['id_user'] ?>"><?= $u['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="date" id="" data-name="date" class="form-control">
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

    var startDate;
    var endDate;
    $(function() {
        $('input[name="date"]').daterangepicker({
            opens: 'left',
            locale: {
                format: 'YYYY-MM-DD'
            }
        }, function(start, end) {
            startDate = start.format('YYYY-MM-DD');
            endDate = end.format('YYYY-MM-DD');
        });
    });


    $('#search-per-employee').on('submit', function(e) {
        e.preventDefault();

        let employeeId = $('#nama').val();
        console.log(employeeId)

        // cek jika karyawan sudah dipilih atau belum
        if (employeeId == '') {
            Swal.fire(
                'Nama Karyawan belum di pilih',
                'Anda harus memilih nama karyawan',
                'warning'
            );
            return false;
        }

        // cek jika tanggal sudah dipilih atau belum
        if (startDate == null) {
            Swal.fire(
                'Range tanggal harus dipilih',
                'Anda harus memilih Range tanggal',
                'warning'
            );
            return false;
        }

        if (startDate == endDate) {
            Swal.fire(
                'Range tanggal harus lebih dari 1',
                'Anda harus memilih Range tanggal lebih dari 1',
                'warning'
            );
            return false;
        }

        // proses pdf
        $.get('<?= base_url("Report/process_suhu_employee/"); ?>' + startDate + '/' + endDate + '/' +
            employeeId,
            function(response) {
                $('.result-search').html(response);
            });
    });


});
// mencari data semua akryawan bedasarkan daterange
</script>