<div class="col-lg-12">
    <h1 class="page-header"><i class="fa fa-cogs fa-fw"></i> Stock Accuracy</h1>
</div>


<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <form method="POST">
                <div class="row">
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="dari">
                    </div>
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="sampai">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success" name="cari">CARI</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-body">
            <a href="cetak_stock_accuracy.php?dari=<?=$_POST['dari']?>&sampai=<?= $_POST['sampai']?>" target="_blank" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Cetak Laporan</a> <br><br>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok Sistem</th>
                        <th>Stok Gudang</th>
                        <th>Stock Accuracy</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (isset($_POST['cari'])) {
                        $query = $kon->query("SELECT * FROM dataset WHERE tanggal BETWEEN '$_POST[dari]' AND '$_POST[sampai]' ORDER BY iddata ASC");
                    } else {
                        $query = $kon->query("SELECT * FROM dataset ORDER BY iddata ASC");
                    }
                    foreach ($query as $key) {
                    ?>
                        <tr class="odd gradeX">
                            <td><?= $no++ ?></td>
                            <td><?= $key['tanggal'] ?></td>
                            <td><?= $key['kode'] ?></td>
                            <td><?= $key['nama'] ?></td>
                            <td>
                                <center><?= $key['stok_sistem'] ?> Unit</center>
                            </td>
                            <td>
                                <center><?= $key['stok_lap'] ?> Unit</center>
                            </td>
                            <td>
                                <center><?= number_format(kali(bagi($key['stok_sistem'], $key['stok_lap']), 100), 2) ?>%</center>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>dsadasdsa