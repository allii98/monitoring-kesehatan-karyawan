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
                        Daftar Karyawan Sakit
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="<?= base_url('Monitor/tambah') ?>"
                            class="btn btn-primary waves-effect m-r-20">Tambah</a>


                    </ul>
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
                                                <th>Jenis Isolasi</th>
                                                <th>Rumah Sakit</th>
                                                <th>No Kamar</th>
                                                <th>Alamat</th>
                                                <th>#</th>
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
                                                    YES
                                                    <?php } else if ($s['covid'] == 2) { ?>
                                                    NO
                                                    <?php } ?>
                                                </td>
                                                <td><?= $s['jenis_isolasi'] ?></td>
                                                <td><?= $s['rm_sakit'] ?></td>
                                                <td><?= $s['no_kamar'] ?></td>
                                                <td><?= $s['alamat'] ?></td>
                                                <td>
                                                    <a href="<?= base_url() ?>Monitor/updateKaryawanSakit/<?= $s['id_monitor'] ?>"
                                                        class="btn btn-success btn-circle waves-effect waves-circle waves-float"
                                                        title="Update"><i class="material-icons">create</i></a>

                                                    <a href="<?= base_url() ?>Monitor/deleteSakit/<?= $s['id_monitor'] ?>"
                                                        class="btn bg-red btn-circle waves-effect waves-circle waves-float tombol-hapus"
                                                        title="Delete"> <i class="material-icons">delete_sweep</i></a>

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
const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {

    swal.fire(
        "Success!",
        "Data " + flashData + " Disimpan",
        "success",
    );

}

//untuk tombol hapus

$('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data karyawan akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Data karyawan berhasil dihapus!',
                'success'
            )
            document.location.href = href;
        }
    })
});
</script>