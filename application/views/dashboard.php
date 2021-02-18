<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-purple">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">Users</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">
                        <?= $user; ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-yellow">
                    <i class="material-icons">face</i>
                </div>
                <div class="content">
                    <div class="text">Karyawan Sakit</div>
                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                        <?= $sakit; ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-red">
                    <i class="material-icons">control_point</i>
                </div>
                <div class="content">
                    <div class="text">Karyawan Positf</div>
                    <div class="number count-to" data-from="0" data-to="117" data-speed="1000" data-fresh-interval="20">
                        <?= $positif; ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-indigo">
                    <i class="material-icons">indeterminate_check_box</i>
                </div>
                <div class="content">
                    <div class="text">Karyawan Negatif</div>
                    <div class="number count-to" data-from="0" data-to="1432" data-speed="1500"
                        data-fresh-interval="20"><?= $negatif; ?></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
    <!-- CPU Usage -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>BAR CHART</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a>
                                </li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else
                                        here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body"><iframe class="chartjs-hidden-iframe"
                        style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="myChart" data='<?= $chart ?>'></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# CPU Usage -->


    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Monitoring suhu karyawan hari ini (<?= date('d-m-Y') ?>)
                    </h2>
                    <!-- <ul class="header-dropdown m-r--5">
                        <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal"
                            data-target="#defaultModal">Tambah</button>

                    </ul> -->
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
                                                <th>Pada Saat Masuk</th>
                                                <th>Petugas</th>
                                                <th>Pada Saat pulang</th>
                                                <th>Petugas</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1;
                                            if (isset($get)) {
                                                foreach ($get as $data) { ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no++ ?></td>
                                                <td><?= $data['tanggal'] ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['masuk'] ?></td>
                                                <td><?= $data['petugas1'] ?></td>
                                                <td><?= $data['keluar'] ?></td>
                                                <td><?= $data['petugas2'] ?></td>

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
var ctx = document.getElementById("myChart").getContext('2d');
var chartData = $("#myChart").attr("data"); //mengambil data chart dari  atribute element chart (data dari controller) 
chartData = JSON.parse(chartData); //parsing json
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember'
        ],
        datasets: [{
                data: chartData.negative,
                label: 'Negatif',
                backgroundColor: '#af90ca'
            },
            {
                data: chartData.positive,
                label: 'Positif',
                backgroundColor: '#c46998'
            }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>