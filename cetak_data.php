<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-3 mt-4">
                <img src="assets/img/logo.jpg" width="100%">
            </div>
            <div class="col-9 mt-4">
                <center>
                    <h2>PT.Coca-Cola Amatil Indonesia</h2>
                    <hr>
                    <b>Alamat : Jalan Padang-Bukit Tinggi (km. 22 Desa Duku), Padang Pariaman, Sumatera Barat 25586, Indonesia <br>
                        Tlpn : +62751480300, Website : http://coca-colaamatil.co.id</b>
                    <br><br>
                </center>


            </div>
        </div>
        <h5><div style="text-align: center;">
            Laporan Data : <?= date('F  Y '); ?>
        </div></h5>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok Sistem</th>
                    <th>Stok Gudang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "include/koneksi.php";
                $no = 1;

                if (isset($_GET['dari']) and isset($_GET['sampai'])) {
                    $query = $kon->query("SELECT * FROM dataset WHERE tanggal BETWEEN '$_GET[dari]' AND '$_GET[sampai]' ORDER BY iddata ASC");
                } else {
                    $query = $kon->query("SELECT * FROM dataset ORDER BY iddata ASC");
                }

                foreach ($query as $key) {
                ?>
                    <tr class="odd gradeX">
                        <td><?= $no++ ?></td>
                        <td><?= $key['kode'] ?></td>
                        <td><?= $key['nama'] ?></td>
                        <td>
                            <center><?= $key['stok_sistem'] ?> Unit</center>
                        </td>
                        <td>
                            <center><?= $key['stok_lap'] ?> Unit</center>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="row mt-5">
            <div class="col-8"></div>
            <div class="col-4">
                <center>
                    <b>Padang / <?= date('l, d-m-Y '); ?>
                        <br>Pimpinan
                        <br><br><br><br><br><br><br><br>
                        (Jumadi Sapti)
                    </b>
                    <br><br><br><br>
                </center>
            </div>
        </div>
    </div>
</body>
<script>
    window.print();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>