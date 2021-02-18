<div class="container-fluid">
    <div class="block-header">
        <h2><?= $tittle; ?></h2>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('status') ?>"></div>
    <div class="flash-dataa" data-flashdata="<?= $this->session->flashdata('status2') ?>"></div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Daftar Karyawan
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal"
                            data-target="#defaultModal">Tambah</button>

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
                                                <th style="text-align:center">No</th>
                                                <th style="text-align:center">Nama</th>
                                                <th style="text-align:center">Username</th>
                                                <th style="text-align:center">level</th>
                                                <th style="text-align:center">#</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1;
                                            if (isset($user)) {
                                                foreach ($user as $data) { ?>
                                            <tr>
                                                <td style="text-align:center"><?= $no++ ?></td>
                                                <td style="text-align:center"><?= $data->user_nama ?></td>
                                                <td style="text-align:center"><?= $data->username ?></td>
                                                <td style="text-align:center">
                                                    <?php if ($data->level == 10) { ?>
                                                    Admin
                                                    <?php } else if ($data->level == 2) { ?>
                                                    Manager
                                                    <?php } else if ($data->level == 3) { ?>
                                                    Karyawan sakit
                                                    <?php } ?>
                                                </td>

                                                <td style="text-align: center;">
                                                    <button type="button"
                                                        class="btn btn-success btn-circle waves-effect waves-circle waves-float"
                                                        data-toggle="modal" data-target="#update<?= $data->user_id ?>">
                                                        <i class="material-icons">create</i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn bg-lime btn-circle waves-effect waves-circle waves-float"
                                                        data-toggle="modal" data-target="#pw<?= $data->user_id ?>">
                                                        <i class="material-icons">vpn_key</i>
                                                    </button>

                                                    <a href="<?= base_url('User/delete/' . $data->user_id) ?>"
                                                        class="btn btn-danger btn-circle waves-effect waves-circle waves-float tombol-hapus"><i
                                                            class="material-icons">delete_sweep</i></a>
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

<div class="container-fluid">

    <!-- Default Size -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah data karyawan</h4>
                </div>
                <form action="<?= base_url('User/simpan') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="hidden" name="nama_user" id="id-user">
                                <select class="form-control" name="nama" id="nama" required>
                                    <option selected disabled>Pilih Nama</option>
                                    <?php foreach ($usr as $u) : ?>
                                    <option value="<?= $u['id_user'] ?>"><?= $u['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="username" name="username" class="form-control"
                                    placeholder="Username" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">

                                <select class="form-control" name="level" id="" required>
                                    <option selected disabled>Pilih Level</option>
                                    <option value="10">Admin</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Karyawan Sakit</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" id="pw" name="pw" class="form-control" placeholder="Password"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">Simpan</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php foreach ($user as $d) : ?>
    <div class="modal fade" id="update<?= $d->user_id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Update data karyawan</h4>
                </div>
                <form action="<?= base_url('User/update') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="hidden" name="id" value="<?= $d->user_id ?>" id="">
                                <input type="text" id="nama" name="nama" class="form-control"
                                    value="<?= $d->user_nama ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="username" name="username" class="form-control"
                                    value="<?= $d->username ?>" autocomplete="off" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success waves-effect">Update</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>


    <?php foreach ($user as $d) : ?>
    <div class="modal fade" id="pw<?= $d->user_id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Ubah password karyawan</h4>
                </div>
                <form action="<?= base_url('User/updatePW') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="hidden" name="id" value="<?= $d->user_id ?>" id="">
                                <input type="password" id="pw" name="pw_new" class="form-control"
                                    placeholder="Password Baru" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" id="pw_con" name="pw_con" class="form-control"
                                    placeholder="Konfirmasi Password" autocomplete="off" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success waves-effect">Update</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

</div>

<script>
$('#nama').change(function() {
    $.ajax({
        type: 'post',
        url: '<?= site_url('User/getisikar'); ?>',
        data: {
            id: this.value
        },
        success: function(response) {
            // $('#id-user').val('');
            data = JSON.parse(response);
            $.each(data, function(index, value) {
                var opsi = value.nama;
                console.log(opsi)
                $('#id-user').val(opsi);

            });

        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
});


const flashData = $('.flash-data').data('flashdata');
const flashData2 = $('.flash-dataa').data('flashdata');
// console.log(flashData);

if (flashData) {

    swal.fire(
        "Success!",
        "Data " + flashData + " Disimpan",
        "success",
    );

}

if (flashData2) {

    swal.fire(
        "Gagal!",
        "Password " + flashData + " Sama!",
        "warning",
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