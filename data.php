<div class="col-lg-12">
    <h1 class="page-header"><i class="fa fa-folder-open fa-fw"></i> Data Set</h1>
</div>
<div class="col-lg-12">
    <?= pesan($_GET['alert']) ?>
    <?php
    if ($_SESSION['posisi'] == "Administrator") {
    ?>
        <a href="?p=data_form&form=add" class="btn btn-primary"><i class="fa fa-plus-square fa-fw"></i> Tambah Data</a>
    <?php
    } else {
    }
    ?>

    <a href="cetak_data.php?dari=<?=$_POST['dari']?>&sampai=<?= $_POST['sampai']?>" target="_blank" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Cetak Laporan</a>
    <br><br>
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok Sistem</th>
                        <th>Stok Gudang</th>
                        <?php
                        if ($_SESSION['posisi'] == "Administrator") {
                        ?>
                            <th>Aksi</th>
                        <?php
                        } else {
                        }
                        ?>
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
                            <?php
                            if ($_SESSION['posisi'] == "Administrator") {
                            ?>
                                <td>
                                    <center>
                                        <a href="?p=data_form&form=edit&id=<?= $key['iddata'] ?>" class="btn btn-success btn-sm"><i class="fa fa-edit fa-fw"></i></a>
                                        <button type="button" data-toggle="modal" data-target="#data<?= $key['iddata'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-fw"></i></button>
                                    </center>
                                </td>
                            <?php
                            } else {
                            }
                            ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php foreach ($query as $key) { ?>
    <div class="modal fade" id="data<?= $key['iddata'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">
                        <i class="fa fa-fw" aria-hidden="true" title="Copy to use warning">&#xf071</i>
                        Pemberitahuan
                    </h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Menghapus Data "<?= $key['nama'] ?>" ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a href="?p=aksi&form=del_data&id=<?= $key['iddata'] ?>" class="btn btn-primary">Yakin</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>