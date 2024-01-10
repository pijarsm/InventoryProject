<div class="col-lg-12">
    <h1 class="page-header"><i class="fa fa-cogs fa-fw"></i> Stock Accuracy</h1>
    <a href="cetak_mining.php" target="_blank" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Cetak Laporan</a> <br><br>
</div>

<?php
mysqli_query($kon, "TRUNCATE TABLE hasil");

?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Informasi Data Set</h4>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
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
                    $no = 1;
                    $query = $kon->query("SELECT * FROM dataset ORDER BY iddata ASC");
                    foreach ($query as $key) {
                        $stok_sistem[] = $key['stok_sistem'];
                        $stok_lap[] = $key['stok_lap'];
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
                    <tr>
                        <td colspan="3">
                            <center>MINIMUM</center>
                        </td>
                        <td>
                            <center><?= min($stok_sistem) ?></center>
                        </td>
                        <td>
                            <center><?= min($stok_lap) ?></center>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <center>MAXIMUM</center>
                        </td>
                        <td>
                            <center><?= max($stok_sistem) ?></center>
                        </td>
                        <td>
                            <center><?= max($stok_lap) ?></center>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Normalisasi</h4>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok Sistem</th>
                        <th>Stok Gudang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $min_stok_sistem = min($stok_sistem);
                    $max_stok_sistem = max($stok_sistem);
                    $min_stok_lap = min($stok_lap);
                    $max_stok_lap = max($stok_lap);
                    foreach ($query as $key) {
                        $kode  = $key['kode'];
                        $nama  = $key['nama'];
                        $rss  = normalisasi($key['stok_sistem'], $max_stok_sistem, $min_stok_sistem);
                        $rsl  = normalisasi($key['stok_lap'], $max_stok_lap, $min_stok_lap);
                        $acc = number_format(kali(bagi($key['stok_sistem'], $key['stok_lap']), 100), 2);
                        $hasil_normalisasi[] = array(
                            "kode" => $kode,
                            "nama" => $nama,
                            "rss" => $rss,
                            "rsl" => $rsl,
                            "acc" => $acc
                        );
                    ?>
                        <tr class="odd gradeX">
                            <td><?= $key['kode'] ?></td>
                            <td><?= $key['nama'] ?></td>
                            <td>
                                <center><?= $rss ?></center>
                            </td>
                            <td>
                                <center><?= $rsl ?></center>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$random_keys = array_rand($hasil_normalisasi, 4); // mengambil 2 kunci acak dari $hasil_normalisasi
foreach ($random_keys as $key) {
    $ran_rss[] = $hasil_normalisasi[$key]['rss'];
    $ran_rsl[] = $hasil_normalisasi[$key]['rsl'];
}
?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Itersasi 1</h4>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Cost 1</th>
                        <th>Cost 2</th>
                        <th>Kedetakatan</th>
                        <th>Cluster</th>
                        <th>Stock Accuracy</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tot_ked_1 = 0;
                    foreach ($hasil_normalisasi as $key) {
                        $iterasix_1 = cost($ran_rss[0], $key['rss'], $ran_rsl[0], $key['rsl']);
                        $iterasiy_1 = cost($ran_rss[1], $key['rss'], $ran_rss[1], $key['rsl']);
                        if ($iterasiy_1 > $iterasix_1) {
                            $kedekatan = $iterasix_1;
                            $cluster = "Cluster 1";
                        } else {
                            $kedekatan = $iterasiy_1;
                            $cluster = "Cluster 2";
                        }
                        $tot_ked_1 += $kedekatan;
                    ?>
                        <tr class="odd gradeX">
                            <td><?= $key['kode'] ?></td>
                            <td><?= $key['nama'] ?></td>
                            <td>
                                <center><?= $iterasix_1 ?></center>
                            </td>
                            <td>
                                <center><?= $iterasiy_1 ?></center>
                            </td>
                            <td>
                                <center><?= $kedekatan ?></center>
                            </td>
                            <td>
                                <center><?= $cluster ?></center>
                            </td>
                            <td>
                                <center><?= $key['acc'] ?>%</center>
                            </td>
                        </tr>
                    <?php
                        mysqli_query($kon, "INSERT INTO hasil (kode, nama, stok_sistem, stok_lap, kedekatan, cluster) 
                            VALUES ('$key[kode]', '$key[nama]','$iterasix_1','$iterasiy_1','$kedekatan','$cluster')");
                    }
                    ?>
                    <tr>
                        <td colspan="4">
                            <center>Total Kedekatan</center>
                        </td>
                        <td align="center"><?= $tot_ked_1 ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Itersasi 2</h4>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Cost 1</th>
                        <th>Cost 2</th>
                        <th>Kedetakatan</th>
                        <th>Cluster</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tot_ked_2 = 0;
                    foreach ($hasil_normalisasi as $key) {
                        $iterasix_2 = cost($ran_rss[2], $key['rss'], $ran_rsl[2], $key['rsl']);
                        $iterasiy_2 = cost($ran_rss[3], $key['rss'], $ran_rss[3], $key['rsl']);
                        if ($iterasiy_2 > $iterasix_2) {
                            $kedekatan_1 = $iterasix_2;
                            $cluster_1 = "Cluster 1";
                        } else {
                            $kedekatan_1 = $iterasiy_2;
                            $cluster_1 = "Cluster 2";
                        }

                        $tot_ked_2 += $kedekatan_1;
                    ?>
                        <tr class="odd gradeX">
                            <td><?= $key['kode'] ?></td>
                            <td><?= $key['nama'] ?></td>
                            <td>
                                <center><?= $iterasix_2 ?></center>
                            </td>
                            <td>
                                <center><?= $iterasiy_2 ?></center>
                            </td>
                            <td>
                                <center><?= $kedekatan_1 ?></center>
                            </td>
                            <td>
                                <center><?= $cluster_1 ?></center>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4">
                            <center>Total Kedekatan</center>
                        </td>
                        <td align="center"><?= $tot_ked_2 ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
if ($tot_ked_1 > $tot_ked_2) {
    $akhir  = $tot_ked_1 . " - " . $tot_ked_2 . " = " . kurang($tot_ked_1, $tot_ked_2);
} else {
    $akhir  = $tot_ked_2 . " - " . $tot_ked_1 . " = " . kurang($tot_ked_2, $tot_ked_1);
}
?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Menghitung Total Simpangan </h4>
        </div>
        <div class="panel-body">
            <h4>Rumus : Iterasi 1 - Iterasi 2 <br>
                Hasil : <?= $akhir ?>
            </h4>
            <hr>
            <center>
                <h3>Jadi Hasil Pengelompokan Diiperoleh Pada Iterasi 1. </h3>
            </center>
            <hr>
        </div>
    </div>
</div>