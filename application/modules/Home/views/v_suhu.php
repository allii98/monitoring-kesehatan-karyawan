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
                        <label for="suhu">Suhu</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="hidden" name="nama" value="<?= $this->session->userdata('nama'); ?>" id="">
                                <input type="hidden" name="id" value="<?= $this->session->userdata('id'); ?>" id="">
                                <input type="text" id="suhu" name="suhu" class="form-control" placeholder="Suhu"
                                    autocomplete="off" required>
                            </div>
                        </div>
                        <label for="oksigen">Oxygen</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="oksigen" name="oksigen" class="form-control" placeholder="Oxygen"
                                    autocomplete="off" required>
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
                        Data kesehatan anda
                    </h2>

                </div>
                <div class="body">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                                    id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                            <th>NO</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Suhu</th>
                                            <th>Oxygen</th>
                                            <th>BAB(qty)</th>
                                            <th>Batuk</th>
                                            <th>Sesak</th>
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
                                            <td><?= $s['suhu'] ?></td>
                                            <td><?= $s['oksigen'] ?></td>
                                            <td><?= $s['bab'] ?></td>
                                            <td>
                                                <?php if ($s['batuk'] == 1) { ?>
                                                <span class="label bg-red">YES</span>
                                                <?php } else if ($s['batuk'] == 2) { ?>
                                                <span class="label bg-green">NO</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($s['sesak'] == 1) { ?>
                                                <span class="label bg-red">YES</span>
                                                <?php } else if ($s['sesak'] == 2) { ?>
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

<script>
const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {

    swal.fire(
        "Success!",
        "Terimakasih " + flashData + " Cepat Sembuh",
        "success",
    );

}
</script>