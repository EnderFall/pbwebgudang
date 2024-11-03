<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css') ?>">
    <title>Gudang</title>
    <style>
        table, thead, tbody, tr, td, th {
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

   
    <!-- Table Display -->
    <table id="tabelb">
        <thead>
            <tr>
                <th width="3%">No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th width="5%">Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php $ms = 1; ?>
            <?php foreach ($anjas as $value): ?>
                <tr>
                    <td><?= $ms++ ?></td>
                    <td><?= $value->kode_brg ?></td>
                    <td><?= $value->nama_brg ?></td>
                    <td><?= $value->stok ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
