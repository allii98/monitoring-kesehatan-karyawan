<div class="container-fluid">
    <div class="block-header">
        <h2><?= $tittle; ?></h2>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Daftar Karyawan Sakit
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
                                                <th>Jenis Penyakit</th>
                                                <th>Obat</th>
                                                <th>Kondisi Terakhir</th>
                                                <th>Covid 19</th>

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
                                                <td>
                                                    <a href="<?= base_url() ?>Home/detail/<?= $s['id_monitor'] ?>"
                                                        class="btn bg-purple btn-circle waves-effect waves-circle waves-float"><i
                                                            class="material-icons" title="Detail">search</i></a>

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