<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laporan-karyawan-covid19</title>
</head>
<style>
.line-title {
    border: 0;
    border-style: inset;
    border-top: 1px solid #000;
}

.table1 {
    font-family: sans-serif;
    color: #232323;
    border-collapse: collapse;
}

.table1 tr th {
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
}

.table1,
th,
td {

    text-align: center;
    border: 1px solid #999;
    padding: 8px 35px;
}

.table1 tr:hover {
    background-color: #f5f5f5;
}

.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>

<body>
    <h3 style="text-align: center;">LAPORAN MONITORING SUHU KARYAWAN</h3>

    <h4 style="text-align: center;">PERIODE <?= $period; ?></h4>
    <br>
    <br>
    <p style="text-align: left;">Jumlah hari yang dipilih&nbsp;:&nbsp;<?= $days; ?> Hari</p>




    <table class="table1">
        <thead>
            <tr>
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
    </table>

</body>

</html>