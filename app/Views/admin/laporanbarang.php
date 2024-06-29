<!DOCTYPE html>
<html>

<head>
    <title>Laporan Barang</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;

        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            padding: 20px;
        }

        .header img {
            width: 100px;
            position: absolute;
            left: 20px;
            top: 20px;
        }

        .header .title {
            display: inline-block;
            margin-left: 120px;
        }

        .divider {
            border-bottom: 3px solid black;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .content {
            margin: 20px;
        }

        .footer {
            text-align: right;
            margin-top: 50px;
        }

        .footer .signature {
            display: inline-block;
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        th,
        td {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="<?= $logo_base64 ?>" alt="Logo">
        <div class="title">
            <h3><b>HIMPUNAN MAHASISWA POLITEKNIK NEGERI TANAH LAUT</b></h3>
            <p>Alamat: Jl. A.Yani Km. 06 Desa Panggung, Kalimantan Selatan 70815</p>
            <p>Email: himati@politala.ac.id</p>
        </div>
    </div>
    <div class="divider"></div>
    <div class="content">
        <h2><?= $title ?></h2>
        <p>Berikut ini adalah laporan barang dari tanggal <?= $start_date ?> sampai <?= $end_date ?>:</p>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Tanggal Masuk</th>
                    <th>Kondisi Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($barang as $brg) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $brg['nama_barang']; ?></td>
                        <td><?= $brg['nama_kategori']; ?></td>
                        <td><?= date('d-m-Y', strtotime($brg['tgl_masuk'])); ?></td>
                        <td><?= $brg['kondisi_barang']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</body>

</html>