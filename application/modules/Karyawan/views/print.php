<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILE KARYAWAN</title>
</head>

<body>
    <?php foreach ($karyawan as $data) : ?>
    <h2>KTP</h2>
    <img src="<?= base_url('assets/uploads/' . $data->ktp) ?>" alt="Trulli" width="500" height="333">
    <h2>KK</h2>
    <img src="<?= base_url('assets/uploads/' . $data->kk) ?>" alt="Trulli" width="500" height="333">
    <h2>BPJS</h2>
    <img src="<?= base_url('assets/uploads/' . $data->bpjs) ?>" alt="Trulli" width="500" height="333">
    <?php endforeach; ?>
</body>

</html>