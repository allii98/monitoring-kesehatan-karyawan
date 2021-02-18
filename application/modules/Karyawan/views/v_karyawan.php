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
                                                <th style="text-align:center">Tanggal Input</th>
                                                <th style="text-align:center">Nama</th>
                                                <th style="text-align:center">KTP</th>
                                                <th style="text-align:center">KK</th>
                                                <th style="text-align:center">BPJS</th>
                                                <th style="text-align:center">#</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1;
                                            if (isset($karyawan)) {
                                                foreach ($karyawan as $data) { ?>
                                            <tr>
                                                <td style="text-align:center"><?= $no++ ?></td>
                                                <td style="text-align:center"><?= $data->tanggal ?></td>
                                                <td style="text-align:center"><?= $data->nama ?></td>
                                                <td style="text-align:center"><?php if ($data->ktp == "") { ?>
                                                    <p>Tidak Ada Foto</p>
                                                    <?php } else { ?>
                                                    <img src="<?= base_url('assets/uploads/' . $data->ktp) ?>"
                                                        width="60px">
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align:center"><?php if ($data->kk == null) { ?>
                                                    <p>Tidak Ada Foto</p>
                                                    <?php } else { ?>
                                                    <img src="<?= base_url('assets/uploads/' . $data->kk) ?>"
                                                        width="60px">
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align:center"><?php if ($data->bpjs == "") { ?>
                                                    <p>Tidak Ada Foto</p>
                                                    <?php } else { ?>
                                                    <img src="<?= base_url('assets/uploads/' . $data->bpjs) ?>"
                                                        width="60px">
                                                    <?php } ?>
                                                </td>

                                                <td style="text-align: center;">
                                                    <button type="button"
                                                        class="btn btn-success btn-circle waves-effect waves-circle waves-float"
                                                        onclick="ModalEdit('<?= $data->id_karyawan ?>')">
                                                        <i class="material-icons">create</i>
                                                    </button>

                                                    <a href="<?= base_url('Karyawan/pdfdetails/' . $data->id_karyawan) ?>"
                                                        target="_blank"
                                                        class="btn btn-primary btn-circle waves-effect waves-circle waves-float"><i
                                                            class="material-icons">print</i></a>
                                                    <a href="<?= base_url('Karyawan/delete/' . $data->id_karyawan) ?>"
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
                <form action="<?= base_url('Karyawan/simpan') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="hidden" name="nama_user" id="id-user">
                                <input type="hidden" name="kode" id="kode">
                                <select class="form-control" name="nama" id="nama" required>
                                    <option selected disabled>Pilih Nama</option>
                                    <?php foreach ($user as $u) : ?>
                                    <option value="<?= $u['id_user'] ?>"><?= $u['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ktp">KTP, KK, BPJS</label>
                            <div class="form-line">
                                <input type="file" name="userfile[]" multiple="multiple">
                                <input type="hidden" name="foto[]" multiple="multiple">
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


    <!-- Default Size -->
    <div class="modal fade" id="modal-update" tabindex="-1" role="dialog">
        <div class="modal-dialog" id="modal-edit-container">

        </div>
    </div>



</div>

<script>
// fungsi tampil modal edit
function ModalEdit(id_karyawan) {
    $("#modal-update").modal();
    var url = "<?= base_url() ?>Karyawan/edit/" + id_karyawan;
    // console.log(url);
    $("#modal-edit-container").load(url);
}



$('#nama').change(function() {
    var t = this.value;
    console.log(t)
    $.ajax({
        type: 'post',
        url: '<?= site_url('Karyawan/getisikar'); ?>',
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
                var res = opsi.substring(0, 9);
                var formattedDate = new Date();
                var d = formattedDate.getDate();
                var m = formattedDate.getMonth();
                m += 1;
                var y = formattedDate.getFullYear();
                var isi = res + d + m + y
                console.log(isi);
                $('#kode').val(isi);
            });

        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
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