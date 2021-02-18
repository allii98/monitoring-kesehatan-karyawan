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
    <h3 style="text-align: center;">LAPORAN MONITORING KARYAWAN TERPAPAR COVID 19</h3>
    <br>
    <br>
    <p style="text-align: left;">NAMA&nbsp;:&nbsp;<?= $data[0]['nama']; ?></p>
    <p style="text-align: left;">Jenis Isolasi&nbsp;:&nbsp;<?= $data[0]['jenis_isolasi']; ?></p>
    <p style="text-align: left;">Rumah Sakit&nbsp;:&nbsp;<?php if ($data[0]['rm_sakit'] === null) { ?>
        <b>-</b>
        <?php } else { ?>
        <?= $data[0]['rm_sakit'] ?>
        <?php } ?>
    </p>
    <p style="text-align: left;">Kamar&nbsp;:&nbsp;<?php if ($data[0]['no_kamar'] === null) { ?>
        <b>-</b>
        <?php } else { ?>
        <?= $data[0]['no_kamar'] ?>
        <?php } ?>
    </p>



    <table class="table1">
        <thead>
            <tr>
                <th>NO</th>
                <th>Tanggal</th>
                <th>Suhu</th>
                <th>Oxygen</th>
                <th>BAB(qty)</th>
                <th>Batuk</th>
                <th>Sesak</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1;
            if (isset($data)) {
                foreach ($data as $s) { ?>
            <tr role="row" class="odd">
                <td class="sorting_1"><?= $no++ ?></td>
                <td><?= $s['tanggal'] ?></td>
                <td><?= $s['suhu'] ?></td>

                <td><?= $s['oksigen'] ?></td>
                <td><?= $s['bab'] ?></td>
                <td>
                    <?php if ($s['batuk'] == 1) { ?>
                    YES
                    <?php } else if ($s['batuk'] == 2) { ?>
                    NO
                    <?php } ?>
                </td>
                <td>
                    <?php if ($s['sesak'] == 1) { ?>
                    YES
                    <?php } else if ($s['sesak'] == 2) { ?>
                    NO
                    <?php } ?>
                </td>
            </tr>
            <?php }
            } ?>
        </tbody>
    </table>

</body>

</html>