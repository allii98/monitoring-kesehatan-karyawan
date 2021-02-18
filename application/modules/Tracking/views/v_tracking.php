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
                        Daftar Tracking
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="<?= base_url('Tracking/tambah') ?>"
                            class="btn btn-primary waves-effect m-r-20">Tambah</a>

                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form action="<?= base_url('Tracking/filter') ?>" method="GET">
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control" name="kode" id="nama" required>
                                            <option selected disabled>Pilih ID</option>
                                            <?php foreach ($kode as $u) : ?>
                                            <option value="<?= $u['kode'] ?>"><?= $u['kode'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

                                <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Filter</button>
                            </div>
                        </form>
                        <div class="col-md-12 result-search">
                        </div>
                    </div>
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
                                                <th>Pasien</th>
                                                <th>Tanggal</th>
                                                <th>jam</th>
                                                <th>Nama</th>
                                                <th>Lokasi</th>
                                                <th>Savety</th>
                                                <th>Jarak</th>
                                                <th>Kondisi Kesehatan</th>
                                                <th>Suhu</th>
                                                <th>Oxygen</th>
                                                <th width="250px">#</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1;
                                            if (isset($tracking)) {
                                                foreach ($tracking as $data) { ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no++ ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['tanggal'] ?></td>
                                                <td><?= $data['jam'] ?></td>
                                                <td><?= $data['nama_tracking'] ?></td>
                                                <td><?= $data['lokasi'] ?></td>
                                                <td><?= $data['savety'] ?></td>
                                                <td><?= $data['jarak'] ?></td>
                                                <td><?= $data['kondisi'] ?></td>
                                                <td><?= $data['suhu'] ?></td>
                                                <td><?= $data['oksigen'] ?></td>
                                                <td>
                                                    <a href="<?= base_url() ?>Tracking/update/<?= $data['id_tracking'] ?>"
                                                        class="btn btn-success btn-circle waves-effect waves-circle waves-float"
                                                        title="Update"><i class="material-icons">create</i></a>
                                                    <a href="<?= base_url() ?>Tracking/delete/<?= $data['id_tracking'] ?>"
                                                        class="btn bg-red btn-circle waves-effect waves-circle waves-float tombol-hapus"
                                                        title="Update"><i class="material-icons">delete_sweep</i></a>


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
        text: "Data Tracking akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Data Tracking ' + flashData + 'dihapus!',
                'success'
            )
            document.location.href = href;
        }
    })
});
</script>